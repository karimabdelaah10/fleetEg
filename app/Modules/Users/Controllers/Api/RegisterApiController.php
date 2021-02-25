<?php

namespace App\Modules\Users\Controllers\Api;

use App\Modules\BaseApp\Controllers\BaseApiController;
use App\Modules\BaseApp\Enums\ResourceTypes;
use App\Modules\Users\Jobs\SendConfirmationEMail;
use App\Modules\Users\Requests\Api\ConfirmRequest;
use App\Modules\Users\Requests\Api\PreRegisterRequest;
use App\Modules\Users\Requests\Api\RegisterRequest;
use App\Modules\Users\Transformers\UserAuthTransformer;
use App\Modules\Users\User;
use App\Modules\Users\UserEnums;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Swis\JsonApi\Client\Interfaces\ParserInterface;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterApiController extends BaseApiController
{
    public $parserInterface;

    public function __construct(ParserInterface $parserInterface)
    {
        $this->parserInterface = $parserInterface;
        $this->user = Auth::guard('api')->user();
    }

    public function preRegister(PreRegisterRequest $request) {

        //parse data from jsonapi request body
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();

        $column = $request->mobile_number ? 'mobile_number' : 'email';
        $dataRecord = $data->mobile_email;
        if (!$dataRecord){
            $dataRecord = $data->mobile_number;
        }
        $userData = [
            'type' => UserEnums::CUSTOMER ,
            $column => $dataRecord,
            'confirmed' => 0
        ];

        $user = User::create($userData);

        //TODO:: scenario should change after getting sms gateway credentials and email
        if ($column == 'mobile_number') {
            $user->confirm_token = substr($user->mobile_number, -4);
            $user->save();

        } else { //email case
            $user->confirm_token = mt_rand(1111, 9999);
            $user->save();

            SendConfirmationEMail::dispatch($user);
        }

        return $this->successResponse([
            'meta' => [
                'message' => trans('app.confirmation code has been sent to your email')
            ]
        ]);

    }

    public function register(RegisterRequest $request)
    {
        //parse data from jsonapi request body
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();

        $userData = [
            'first_name' => $data->first_name,
            'last_name' => $data->last_name,
            'password' => $data->password
        ];

        $user = User::findOrFail($this->user->id);

        $user->update($userData);

        $meta = [
            'message' => trans('app.Registered Successfully'),
            'token' => JWTAuth::fromUser($user)
        ];

        //send data to transformer
        return $this->transformDataModInclude($user->fresh(), '', new UserAuthTransformer(), ResourceTypes::USER, $meta);

    }

    public function confirm(ConfirmRequest $request) {

        //parse data from jsonapi request body
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();

        $column = $request->mobile_number ? 'mobile_number' : 'email';
        $dataRecord = $data->mobile_email;


        if (!$dataRecord){
            $dataRecord = $data->mobile_number;
        }

        $user = User::where($column , $dataRecord)
            ->where('confirm_token' , $data->code)
            ->first();

        if ($user) {

            $user->confirm_token = null;
            $user->confirmed = 1;
            $user->save();

            $include = '';
            $meta = [
                'message' => trans('app.Confirmed Successfully'),
                'token' => JWTAuth::fromUser($user),
            ];

            return $this->successResponse(['meta' => $meta]);
        } else {
            return $this->errorResponse( trans('app.Invalid Code'), 422);
        }

    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    public function handleProviderCallback()
    {
        $providerUser = Socialite::driver('facebook')
            ->fields(['name', 'first_name', 'last_name', 'email', 'gender', 'verified', 'link'])
            ->stateless()
            ->user();

        // check if user exists
        $user = User::where('email', $providerUser->getEmail())->first();

        // register the user if it doesnt exists
        if (is_null($user)) {
            User::create([
                'name' => $providerUser->user['first_name'] . ' ' . $providerUser->user['last_name'],
                'email' => $providerUser->getEmail(),
                'type' => UserEnums::CUSTOMER,
                'confirmed' => true,
                'is_active' => true,
            ]);
        }

        $errorArray = [];

        if (!$user->confirmed) {
            $errorArray[] = [
                'status' => 422,
                'title' => trans('api.login_failed'),
                'detail' => trans("api.This account is not confirmed"),
            ];
        }

        if (!$user->is_active) {
            $errorArray[] = [
                'status' => 422,
                'title' => trans('api.login_failed'),
                'detail' => trans("api.This account is banned"),
            ];
        }

        if ($errorArray) {
            throw new HttpResponseException(response()->json(["errors" => $errorArray], 422));
        } else {
            $meta = [
                'message' => trans('app.Thanks please start adding your mobile number'),
                'token' => JWTAuth::fromUser($user)
            ];

            //send data to transformer
            return $this->transformDataModInclude($user, '', new UserAuthTransformer(), ResourceTypes::USER,
                $meta);
        }
    }
}

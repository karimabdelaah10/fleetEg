<?php

namespace App\Modules\Users\Controllers\Api;

use App\Jobs\SyncData;
use App\Modules\BaseApp\Controllers\BaseApiController;
use App\Modules\BaseApp\Enums\ResourceTypes;
use App\Modules\Integration\Enums\IntegrationEnum;
use App\Modules\Users\Transformers\UserAuthTransformer;
use App\Modules\Users\User;
use App\Modules\Users\UserEnums;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Swis\JsonApi\Client\Interfaces\ParserInterface;
use Tymon\JWTAuth\Facades\JWTAuth;

class SocialLoginController extends BaseApiController
{
    public $parserInterface;

    public function __construct(ParserInterface $parserInterface)
    {
        $this->parserInterface = $parserInterface;
    }

    public function socialRegister($provider , Request $request){
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();

        if ($provider == 'apple'){
            if (empty($data->email)){
                $errorArray[] = [
                    'status' => 422,
                    "title"=> "email",
                    "detail" => trans("validation.required" , ["attribute" => "data.attributes.email"])
                ];
                throw new HttpResponseException(response()->json(["errors" => $errorArray], 422));
            }
            $email          = $data->email;
            $first_name     = $data->first_name;
            $last_name      = $data->last_name;
            $provider_id    = $data->token;

            $user = User::where("email", $email)
                ->where('type' , UserEnums::CUSTOMER)
                ->first();

        }
        else{
            try{
                $socialUser = Socialite::driver($provider)
                    ->stateless()
//                ->fields(['name', 'first_name', 'last_name', 'email'])
                    ->userFromToken($data->token);
            }catch (\Exception $exception) {
//                return $exception->getMessage();
                return $this->errorResponse(trans('app.Unauthorized action Please Use a Valid Token'),401);
            }

            $email =  $socialUser->getEmail();
            $first_name     =  @$socialUser->user['first_name'] ?? $socialUser->user['name'];
            $last_name      =  @$socialUser->user['last_name'] ?? '';
            $provider_id      = $socialUser->id;


            $user = User::where("{$provider}_id", $socialUser->id)
                ->where('type' , UserEnums::CUSTOMER)
                ->first();
        }


        // register the user if it doesnt exists
        if (is_null($user)) {
            if ( $email && User::where('email' , $email)->exists()){
                $errorArray[] = [
                    'status' => 422,
                    "title"=> "email",
                    "detail" => trans("validation.unique" , ["attribute" => "email"])
                ];
                throw new HttpResponseException(response()->json(["errors" => $errorArray], 422));
            }

            $user = User::create([
                'email' => $email,
                'type' => UserEnums::CUSTOMER ,
                'first_name' =>$first_name,
                'last_name' => $last_name,
                'confirmed' => true,
                'is_active' => true,
                "{$provider}_id" =>$provider_id
            ]);
        }
        $user->user_status = 'confirmed';
        $include = '';
        $meta = [
            'token' => JWTAuth::fromUser($user),
            'language' => (string) ($row->language ?? config('app.locale')),
        ];
        // to Sync  User Loans
        SyncData::dispatch(IntegrationEnum::LOANS , $user->id);
        //send data to transformer
        return $this->transformDataModInclude($user, '', new UserAuthTransformer(), ResourceTypes::USER, $meta);
    }
}

<?php

namespace App\Modules\Users\Controllers\Api;

use App\Jobs\SyncData;
use App\Modules\BaseApp\Controllers\BaseApiController;
use App\Modules\BaseApp\Enums\ResourceTypes;
use App\Modules\BaseApp\Requests\BaseApiTokenRequest;
use App\Modules\Integration\Enums\IntegrationEnum;
use App\Modules\Users\Jobs\SendConfirmationEMail;
use App\Modules\Users\Mail\ResetPassword;
use App\Modules\Users\Models\Devices;
use App\Modules\Users\Requests\Api\ForgetPasswordRequest;
use App\Modules\Users\Requests\Api\LoginRequest;
use App\Modules\Users\Requests\Api\MobileResetPasswordRequest;
use App\Modules\Users\Requests\Api\ResetPasswordRequest;
use App\Modules\Token;
use App\Modules\Users\Transformers\UserAuthTransformer;
use App\Modules\Users\User;
use Carbon\Carbon;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Swis\JsonApi\Client\Interfaces\ParserInterface;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class AuthApiController extends BaseApiController
{
    public $parserInterface;
    public $module;
    public $user;

    public function __construct(ParserInterface $parserInterface)
    {
        $this->parserInterface = $parserInterface;
        $this->module='Users::auth';
        $this->user = Auth::guard('api')->user();

    }

    public function login(LoginRequest $request)
    {
        //parse data from jsonapi request body
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();
        $errorArray = [];

        // the field used for login
        $column = $request->mobile_number ? 'mobile_number' : 'email';
        $dataRecord = $data->mobile_email;
        if (!$dataRecord){
            $dataRecord = $data->mobile_number;
        }

        $row = User::where($column, $dataRecord)->first();

        if (!$row) {
            $errorArray[] = [
                'status' => 422,
                'title' => trans('api.login_failed'),
                'detail' => trans("api.data did not match any records"),
            ];
            throw new HttpResponseException(response()->json(["errors" => $errorArray], 422));
        }

        if (!$row->confirmed) {
            $errorArray[] = [
                'status' => 422,
                'title' => trans('api.login_failed'),
                'detail' => trans("api.This account is not confirmed"),
            ];
        }
        if (!$row->is_active) {
            $errorArray[] = [
                'status' => 422,
                'title' => trans('api.login_failed'),
                'detail' => trans("api.This account is banned"),
            ];
        }
        if (!Hash::check(trim($data->password), $row->password)) {
            $errorArray[] = [
                'status' => 422,
                'title' => trans('api.login_failed'),
                'detail' => trans("api.Password Invalid"),
            ];
        }
        if ($errorArray) {
            throw new HttpResponseException(response()->json(["errors" => $errorArray], 422));
        } else {
            if ($token = auth()->attempt([
                $column => $dataRecord,
                'password' => $data->password
            ])) {

                $include = '';
                $meta = [
                    'token' => JWTAuth::fromUser($row),
                    'language' => (string) ($row->language ?? config('app.locale')),
                ];
                // to Sync  User Loans
                SyncData::dispatch(IntegrationEnum::LOANS , $row->id);
                //send data to transformer
                return $this->transformDataModInclude($row, '', new UserAuthTransformer(), ResourceTypes::USER, $meta);
            } else {
                $errorArray[] = [
                    'status' => 422,
                    'title' => trans('api.login_failed'),
                    'detail' => trans("api.something went wrong, please try again"),
                ];
                throw new HttpResponseException(response()->json(["errors" => $errorArray], 422));
            }
        }
    }

    public function logout(BaseApiTokenRequest $request)
    {
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();

        if ($data['device_id']){
            Devices::where('device_id' , $data['device_id'])->delete();
        }

        $token = JWTAuth::getToken();
        JWTAuth::invalidate($token);
        return response()->json(
            [
                "meta" => [
                    'message' => trans('api.Successfully Logged Out')
                ]
            ]
        );
    }

    public function sendResetPasswordToken(ForgetPasswordRequest $request)
    {

        //parse data from jsonapi request body
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();

        $column = $request->mobile_number ? 'mobile_number' : 'email';
        $dataRecord = $data->mobile_email;
        if (!$dataRecord){
            $dataRecord = $data->mobile_number;
        }

        $user = User::where($column, $dataRecord)->first();
        if(!$user){
            $errorArray[] = [
                'status' => 422,
                'title' => trans('api.notFound'),
                'detail' => trans("api.Email or Mobile number does not match any account"),
            ];
            throw new HttpResponseException(response()->json(["errors" => $errorArray], 422));
        }

        if (!empty($user->first_name)){  // forget password scenario
            if (!$user->confirmed == 1) {
                $errorArray[] = [
                    'status' => 422,
                    'title' => trans('api.Account Not Confirmed'),
                    'detail' => trans("api.Account Not Confirmed"),
                ];
                throw new HttpResponseException(response()->json(["errors" => $errorArray], 422));
            }
            $token  = mt_rand(1111, 9999);
            $minuteAgoToken =Token::where("user_id",$user->id)
                ->where('created_at' , '>=', now()->subMinute())->first();
            if (!empty($minuteAgoToken)){
                return $this->errorResponse(trans('app.too many attempts please try again after 1 minutes') , 422);
            }
            $data = ["token"=>$token,'user'=>$user];
            if($column == "email"){
                Mail::to($request->email)->send(new ResetPassword($data));
            }else{
                $token = substr($user->mobile_number, -4);
            }
            Token::where("user_id",$user->id)->delete();

            Token::create(["user_id"=>$user->id,"token"=>$token]);
        }else{                      // registration scenario
            if ($user->confirm_token == null ){
                $user->confirm_token = mt_rand(1111, 9999);
                $user->save();
            }
            SendConfirmationEMail::dispatch($user);
        }

        return $this->successResponse([
            "meta" => [
                "message"=> ($column == 'email')?trans("app.email with reset link sent for you"):trans("app.An SMS OTP token has ben sent to your mobile number")
            ]
        ]);
    }

    public function resetPassword(ResetPasswordRequest $request,$token)
    {
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();

        $tokenRecord = Token::where('token',$token)->first();
        if(!$tokenRecord){
            $errorArray[] = [
                'status' => 422,
                'title' => trans('api.notFound'),
                'detail' => trans("api.Token Invalid"),
            ];
            throw new HttpResponseException(response()->json(["errors" => $errorArray], 422));
        }

        $updatePassword = User::findOrFail($tokenRecord->user_id);
        if (!$updatePassword->confirmed == 1) {
            $errorArray[] = [
                'status' => 422,
                'title' => trans('api.Account Not Confirmed'),
                'detail' => trans("api.Account Not Confirmed"),
            ];
            throw new HttpResponseException(response()->json(["errors" => $errorArray], 422));
        }
        $updatePassword->password = $data->password;
        // $updatePassword->confirmed = 1;
        if($updatePassword->save()){
            $tokenRecord->delete();
            return $this->successResponse([
                "meta" => [
                    "message" => trans("app.Account password has been reset Successfully")
                ]
            ]);
        }

    }

    private function checkTokenExpiration($token)
    {
        $diffInSeconds = Carbon::now()->diffInSeconds($token->created_at);
        if ($diffInSeconds > (int) env("TOKEN_EXPIRATION")) {
            return false;
        }
        return true;
    }

    public function mobileValidatePasswordToken($token)
    {
        $tokenRecord = Token::where('token',$token)->first();
        if(!$tokenRecord){
            $errorArray[] = [
                'status' => 422,
                'title' => trans('api.notFound'),
                'detail' => trans("api.Token Invalid"),
            ];
            throw new HttpResponseException(response()->json(["errors" => $errorArray], 422));
        }

        $user = User::where('id',$tokenRecord->user_id)->first();
        if(!$user){
            $errorArray[] = [
                'status' => 422,
                'title' => trans('api.notFound'),
                'detail' => trans("api.Token Invalid"),
            ];
            throw new HttpResponseException(response()->json(["errors" => $errorArray], 422));
        }

        if (!$user->confirmed) {
            $errorArray[] = [
                'status' => 422,
                'title' => trans('api.Account Not Confirmed'),
                'detail' => trans("api.Account Not Confirmed"),
            ];
            throw new HttpResponseException(response()->json(["errors" => $errorArray], 422));
        }

        $tokenRecord->delete();
        $meta = [
            'token' => JWTAuth::fromUser($user),
            'language' => (string) ($user->language ?? config('app.locale')),
        ];
        //send data to transformer
        return $this->transformDataModInclude($user, '', new UserAuthTransformer(), ResourceTypes::USER, $meta);

    }

    public function mobileResetPassword(MobileResetPasswordRequest $request)
    {
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();

        $user =  Auth::guard('api')->user();
        if (!$user) {
            $errorArray[] = [
                'status' => 422,
                'title' => trans('api.notFound'),
                'detail' => trans("api.Token Invalid"),
            ];
            throw new HttpResponseException(response()->json(["errors" => $errorArray], 422));
        }

      if (!$user->confirmed == 1) {
            $errorArray[] = [
                'status' => 422,
                'title' => trans('api.Account Not Confirmed'),
                'detail' => trans("api.Account Not Confirmed"),
            ];
            throw new HttpResponseException(response()->json(["errors" => $errorArray], 422));
        }

        if ($data->old_password) {
            if (!Hash::check($data->old_password, $this->user->password)) {
                return $this->errorResponse(trans("app.Failed To Change Password , old password is invalid"), 401);
            }
        }
        $user->password = $data->password;
        if ($user->save()) {
            return $this->successResponse([
                "meta" => [
                    "message" => trans("app.Account password has been reset Successfully")
                ]
            ]);
        }
    }

    public function refresh()
    {
        try {
            if (JWTAuth::parseToken()->authenticate()) {
                $newToken = JWTAuth::parseToken()->refresh();
                $meta = [
                    'token' => $newToken,
                ];
                //send data to transformer
                return $this->transformDataModInclude(JWTAuth::user(), '', new UserAuthTransformer(), ResourceTypes::USER, $meta);
            }
        } catch (TokenExpiredException $e) {
            $newToken = JWTAuth::parseToken()->refresh();
            $meta = [
                'token' => $newToken,
            ];
            //send data to transformer
            return $this->transformDataModInclude(JWTAuth::setToken($newToken)->toUser(), '', new UserAuthTransformer(), ResourceTypes::USER, $meta);
        }
    }
  }

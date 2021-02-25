<?php

namespace App\Modules\Users\Controllers\Api;

use App\Modules\Users\Models\Devices;
use App\Modules\Users\Requests\Api\updateFcmTokenRequest;
use App\Modules\Users\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Swis\JsonApi\Client\Interfaces\ParserInterface;
use App\Modules\BaseApp\Controllers\BaseApiController;
use App\Modules\Users\Requests\Api\ChangePasswordRequest;
use App\Modules\Users\Requests\Api\UpdateLanguageRequest;

class UserApiController extends BaseApiController
{
    public $parserInterface;
    protected $user;

    public function __construct(ParserInterface $parserInterface)
    {
        $this->parserInterface = $parserInterface;
        $this->user = Auth::guard('api')->user();
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        //parse data from jsonapi request body
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();

        if (Hash::check($data->old_password, $this->user->password)) {
            //Change the password
            $this->user->update(['password' => $data->password]);

            return $this->successResponse([
                'meta'  => [
                    'message' => trans('api.Password changed successfully.')
                ]
            ]);
        }

        return $this->errorResponse(trans('api.Old password doesnt match authenticated user password.'));
    }

    public function updateLanguage(UpdateLanguageRequest $request)
    {
        //parse data from jsonapi request body
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();

        $this->user->update([
                'language' => $data->language,
            ]);

        return $this->successResponse([
                'meta'  => [
                    'message' => trans('api.Language updated successfully.'),
                    'language'  => $this->user->language ?? config('app.locale')
                ]
            ]);
    }

    public function updateFcmToken(updateFcmTokenRequest $request)
    {
        //parse data from jsonapi request body
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();

        $recorde['user_id']         = $this->user->id;
        $recorde['device_id']     = $data['device_id'];
        $recorde['device_type']     = $data['device_type'];
        $recorde['fcm_token']       = $data['fcm_token'];

        User::find($this->user->id)->update(['language' => $data['language']]);

        Devices::updateOrCreate([
            'user_id'   => $this->user->id,
            'device_id' => $recorde['device_id']
        ],
            $recorde
        );


        return $this->successResponse([
            'meta'  => [
                'message' => trans('users.Device Added Successfully'),
            ]
        ]);
    }
}

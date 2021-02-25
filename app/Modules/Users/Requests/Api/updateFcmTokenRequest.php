<?php

namespace App\Modules\Users\Requests\Api;

use App\Modules\Users\Enums\UserEnum;
use Illuminate\Validation\Rule;
use App\Modules\BaseApp\Requests\BaseApiTokenDataRequest;

class updateFcmTokenRequest extends BaseApiTokenDataRequest
{
    public function rules()
    {
        return [
            'device_type' => 'required|'.Rule::in(UserEnum::deviceTypes()),
            'fcm_token'   => 'required',
            'language'    => 'required',
            'device_id'    => 'required'
        ];
    }
}

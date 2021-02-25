<?php

namespace App\Modules\Users\Requests\Api;

use App\Modules\BaseApp\Requests\BaseApiParserRequest;
use App\Modules\Users\UserEnums;
use Illuminate\Validation\Rule;

class MobileResetPasswordRequest extends BaseApiParserRequest
{
    public function rules()
    {
        return [
            "attributes.old-password" =>"nullable",
            "attributes.password"             =>  [
                'regex:/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[~@#\$%\^&\*_\-\+=`|{}:;!\.\?\"()\[\]]).{8,25})$/',
                "confirmed"
            ],
        ];
    }
    public function messages()
    {
        return[
            'password.regex' => trans('validation.password invalid regex'),
        ];
    }
}

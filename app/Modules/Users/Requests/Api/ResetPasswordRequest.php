<?php

namespace App\Modules\Users\Requests\Api;

use App\Modules\BaseApp\Requests\BaseApiTokenDataRequest;

class ResetPasswordRequest extends BaseApiTokenDataRequest
{
    public function rules()
    {
        return [
        'password' => ['required', 'regex:/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[~@#\$%\^&\*_\-\+=`|{}:;!\.\?\"()\[\]]).{8,25})$/', 'confirmed']
        ];
    }
    public function messages()
    {
        return[
            'password.regex' => trans('validation.password invalid regex'),
        ];
    }

}

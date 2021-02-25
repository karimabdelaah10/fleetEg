<?php

namespace App\Modules\Users\Requests\Api;

use App\Modules\BaseApp\Requests\BaseApiDataRequest;

class LoginRequest extends BaseApiDataRequest
{
    public function rules()
    {
        return [
            "mobile_email" => "required",
            "password" => "required",
        ];
    }

    protected function prepareForValidation()
    {

        $mobileOrEmail = $this->validationData()['mobile_email'];

        if ($mobileOrEmail) {
            if (filter_var($mobileOrEmail, FILTER_VALIDATE_EMAIL) !== false) {
                $this->merge([
                    'email' =>  $mobileOrEmail
                ]);
            } else {
                $this->addError('mobile_email', trans('app.Invalid Email'));
            }
        }
    }
}

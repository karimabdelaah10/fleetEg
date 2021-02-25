<?php

namespace App\Modules\Users\Requests\Api;

use App\Modules\BaseApp\Requests\BaseApiTokenDataRequest;

class ForgetPasswordRequest extends BaseApiTokenDataRequest
{
    public function rules()
    {
        return [
            "mobile_email" => "required"
        ];
    }

    public function prepareForValidation()
    {

        $mobileOrEmail = $this->validationData()['mobile_email'];

        if ($mobileOrEmail) {
            // case email
            if (filter_var($mobileOrEmail, FILTER_VALIDATE_EMAIL) !== false) {
                $this->merge([
                    'email' =>  $mobileOrEmail
                ]);
            }else{
                $this->addError('mobile_email', trans('app.Invalid Email'));
            }
        }
    }


}

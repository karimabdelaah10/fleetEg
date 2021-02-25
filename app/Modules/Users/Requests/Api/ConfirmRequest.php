<?php

namespace App\Modules\Users\Requests\Api;

use App\Rules\Mobile;
use Illuminate\Validation\Rule;
use App\Modules\BaseApp\Requests\BaseApiDataRequest;

class ConfirmRequest extends BaseApiDataRequest
{
    public function rules()
    {
        return [
            "mobile_email" => "required",
            'code' => 'required'
        ];
    }

    protected function prepareForValidation()
    {
        if (array_key_exists( 'mobile_email', $this->validationData())){
            $data = $this->json()->all();

            $mobileOrEmail = $this->validationData()['mobile_email'];

            if ($mobileOrEmail) {
                // case email
                if (filter_var($mobileOrEmail, FILTER_VALIDATE_EMAIL) !== false) {
                    $data['data']['attributes']['email'] = $mobileOrEmail;
                    $data['email'] = $mobileOrEmail;
                    $this->merge($data);
                } else {
                    $this->addError('mobile_email', trans('app.Invalid Email'));
                }
            }
        }
    }
}

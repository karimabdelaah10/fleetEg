<?php

namespace App\Modules\Users\Requests\Api;

use App\Modules\Users\User;
use App\Rules\Mobile;
use Illuminate\Validation\Rule;
use App\Modules\BaseApp\Requests\BaseApiDataRequest;

class PreRegisterRequest extends BaseApiDataRequest
{
    public function rules()
    {
        return [
            "mobile_email" => "required",
            'email' => [
                'nullable',
                Rule::unique('users')->where(function ($query) {
                    return $query->where('deleted_at', null)->where("confirmed",1);
                }),
                'email'
            ],
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
                    //To Avoid Dublicating not confirmed emails
                    User::where('email' , $mobileOrEmail)->where("confirmed",0)->forceDelete();
                } else {
                    $this->addError('mobile_email', trans('app.Invalid Email'));
                }
            }
        }
    }
    public function messages()
    {
        return [
            'email.unique' => trans('validation.email unique')
        ];
    }
}

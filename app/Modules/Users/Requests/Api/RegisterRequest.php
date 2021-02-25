<?php

namespace App\Modules\Users\Requests\Api;

use App\Modules\BaseApp\Requests\BaseApiTokenDataRequest;
use App\Rules\Mobile;
use Illuminate\Validation\Rule;

class RegisterRequest extends BaseApiTokenDataRequest
{
    public function rules()
    {
        return [
            'first_name' => 'required|regex:/^[\pL\s\d]+$/u|max:191|min:3',
            'last_name' => 'required|regex:/^[\pL\s\d]+$/u|max:191|min:3',
//            "mobile_email" => "required",
//            'email' => [
//                'nullable',
//                Rule::unique('users')->where(function ($query) {
//                    return $query->where('deleted_at', null);
//                }),
//                'email'
//            ],
//            'mobile_number' => [
//                'nullable',
//                Rule::unique('users')->where(function ($query) {
//                    return $query->where('deleted_at', null);
//                }),
//                new Mobile
//            ],
//            'password' => ['required', 'min:8', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 'confirmed']
//            'password' => ['required','min:8','regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/','confirmed']
        'password' => ['required',
                'regex:/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[~@#\$%\^&\*_\-\+=`|{}:;!\.\?\"()\[\]]).{8,25})$/',
                'confirmed']
        ];
    }

    public function prepareForValidation()
    {
//        if (array_key_exists( 'mobile_email', $this->validationData())){
//            $data = $this->json()->all();
//
//            $mobileOrEmail = $this->validationData()['mobile_email'];
//
//            if ($mobileOrEmail) {
//                // case email
//                if (filter_var($mobileOrEmail, FILTER_VALIDATE_EMAIL) !== false) {
//                    $data['data']['attributes']['email'] = $mobileOrEmail;
//                    $data['email'] = $mobileOrEmail;
//                    $this->merge($data);
//                } else if (checkMobile($mobileOrEmail)) {
//                    $data['data']['attributes']['mobile_number'] = $mobileOrEmail;
//                    $data['mobile_number'] = $mobileOrEmail;
//                    $this->merge($data);
//                } else {
//                    $this->addError('mobile_email', trans('app.Invalid Email'));
//                }
//            }
//        }
    }
    public function messages()
    {
        return [
            'password.regex' => trans('validation.password invalid regex'),
        ];
    }
}

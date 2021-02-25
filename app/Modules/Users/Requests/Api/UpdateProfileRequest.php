<?php

namespace App\Modules\Users\Requests\Api;

use App\Modules\BaseApp\Requests\BaseApiParserRequest;
use App\Modules\BaseApp\Requests\BaseApiTokenDataRequest;
use App\Modules\Users\UserEnums;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends BaseApiTokenDataRequest
{
    public function rules()
    {
        $id = Auth::guard('api')->user()->id;
        return [
            "first_name"           =>  "required|min:2",
            "last_name"            =>  "required|min:2",
//            "attributes.email"                =>  "required|min:3|unique:users,email,".$id,
            "language"             =>  "nullable|max:2",
            "mobile_number"        =>  "nullable|size:11",
            "password"             =>  [
                "required_with:attributes.old_password,attributes.password_confirmation",
                'regex:/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[~@#\$%\^&\*_\-\+=`|{}:;!\.\?\"()\[\]]).{8,25})$/',
                "confirmed"
            ],

            "old_password"   =>  "required_with:attributes.password,attributes.password_confirmation",

//            "relationships.customer.data.marital_status"            =>  "required",
//            "relationships.customer.data.nationality_id"            =>  ["required",Rule::exists("countries","id")],
//            "relationships.customer.data.national_id"            =>  "required|size:14",
//
//            "relationships.customer.data.work_type"             =>  ["required",Rule::in(UserEnums::customerWorkTypes())],
//            "relationships.customer.data.job_title"            =>  "required|min:3",
//            "relationships.customer.data.company_name"     =>  "required_unless:relationships.customer.data.work_type,self_employed|min:3",
//            "relationships.customer.data.company_address"  =>  "required_unless:relationships.customer.data.work_type,self_employed",
//             "relationships.customer.data.net_income"            =>  "required_if:relationships.customer.data.work_type,employed",
//            "relationships.customer.data.additional_monthly_income"  =>  "required_if:relationships.customer.data.work_type,employed",
//            "relationships.customer.data.work_field"            =>  "required_if:relationships.customer.data.work_type,self_employed",

//            "relationships.customer.data.national_id_image_front"            =>  "required|exists:garbage_media,id",
//            "relationships.customer.data.employment_document"   =>  "required|exists:garbage_media,id",
//            "relationships.customer.data.utility_bill"   =>  "required|exists:garbage_media,id",

        ];
    }

    public function messages()
    {
        return[
            'password.regex' => trans('validation.password invalid regex'),
        ];
    }
}

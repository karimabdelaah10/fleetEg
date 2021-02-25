<?php

namespace App\Modules\Users\Requests\Api;

use App\Modules\BaseApp\Requests\BaseApiTokenDataRequest;
use App\Modules\Users\Enums\CustomersEnum;
use App\Modules\Users\UserEnums;
use Illuminate\Validation\Rule;

class CompleteProfileSecondStepRequest extends BaseApiTokenDataRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "work_type"             =>  ["required",Rule::in(UserEnums::customerWorkTypes())],
            "job_title"            =>   ["required_if:work_type,".UserEnums::CORPORATE.",".UserEnums::EMPLOYED,"min:3"],
            "company_name"     =>  ["required_if:work_type,".UserEnums::CORPORATE.",".UserEnums::EMPLOYED,"min:3"],
            "company_address"  =>  ["required_if:work_type,".UserEnums::CORPORATE.",".UserEnums::EMPLOYED],
//            "employment_document"   =>  ["required_if:work_type,".UserEnums::CORPORATE,"exists:garbage_media,id"],
//            "utility_bill"   =>  ["required_if:work_type,".UserEnums::CORPORATE,"exists:garbage_media,id"],

            "net_income"  => ["required_if:work_type,".UserEnums::EMPLOYED , 'numeric'],
            "additional_monthly_income" => ["required_if:work_type,".UserEnums::EMPLOYED, 'numeric'],
//            "hr_document" => ["required_if:work_type,".UserEnums::EMPLOYED,"exists:garbage_media,id"],

            "work_field" => ["required_if:work_type,".UserEnums::SELF_EMPLOYED],
//            "income_proof" => ["required_if:work_type,".UserEnums::SELF_EMPLOYED,"exists:garbage_media,id"],
        ];
    }
    public function messages()
    {
        return[
            'min' =>trans('validation.min')
        ];
    }
}

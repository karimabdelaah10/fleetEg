<?php

namespace App\Modules\Users\Requests\Api;

use App\Modules\BaseApp\Requests\BaseApiTokenDataRequest;
use App\Modules\Users\Enums\CustomersEnum;
use Illuminate\Validation\Rule;

class CompleteProfileFirstStepRequest extends BaseApiTokenDataRequest
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
            "gender_id"           =>  "required|exists:options,id",
            "marital_status"           =>  "required|exists:options,id",
            "nationality_id"           =>  "required|exists:countries,id",
            "national_id"           =>  [
                "digits:14",
                "required_if:passport_number,null" ,
                "regex:/^(?!^0+$)([a-zA-Z0-9]{6,10}|\d{14})$/"
            ],
            "passport_number"       =>'required_if:national_id,null'
//            "national_id_image_front"           =>  "required|exists:garbage_media,id",
        ];
    }
}

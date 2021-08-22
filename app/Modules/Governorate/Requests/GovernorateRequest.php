<?php

namespace App\Modules\Governorate\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GovernorateRequest extends FormRequest
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
        $rules =  [
            'title'=>'required',
            'shipping_coast'=>'required',
        ];


        return $rules;
    }
}

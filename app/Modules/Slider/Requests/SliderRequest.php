<?php

namespace App\Modules\Slider\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'link'=>'nullable|url',
            'image' =>   'required|mimes:png,jpg,jpeg'
        ];
        if ($this->route('id')) {
            $rules['image'] =  'nullable|mimes:png,jpg,jpeg';
        }

        return $rules;
    }
}

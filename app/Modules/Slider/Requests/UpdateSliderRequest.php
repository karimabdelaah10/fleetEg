<?php

namespace App\Modules\Slider\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
            'title:en'=>'required|min:3',
            'title:ar'=>'required|min:3',
            'description:en'=>'required|min:3',
            'description:ar'=>'required|min:3',
            "link:ar"  =>  'required',
            "link:en"  =>  'required',
            'image' =>   'image|mimes:png,jpg,jpeg'
        ];
    }
}

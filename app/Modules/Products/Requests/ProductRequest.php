<?php

namespace App\Modules\Products\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rules=  [
            'category_id' =>'required|exists:categories,id',
            'title' =>'required',
            'price' =>'required',
            'commission' =>'required',
            'media_url' =>'required',
            'image' =>'required',
        ];
        if ($this->route('id')){
            $rules['image']='nullable';
        }
        return $rules;
    }
}

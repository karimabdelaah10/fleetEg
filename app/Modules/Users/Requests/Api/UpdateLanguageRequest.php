<?php

namespace App\Modules\Users\Requests\Api;

use Illuminate\Validation\Rule;
use App\Modules\BaseApp\Requests\BaseApiTokenDataRequest;

class UpdateLanguageRequest extends BaseApiTokenDataRequest
{
    public function rules()
    {
        return [
            'language' => 'required',
        ];
    }
}

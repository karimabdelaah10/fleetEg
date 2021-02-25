<?php

namespace App\Modules\Users\Requests\Api;

use App\Modules\BaseApp\Requests\BaseApiParserRequest;
use App\Modules\BaseApp\Requests\BaseApiTokenDataRequest;
use App\Modules\Users\UserEnums;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProfilePictureRequest extends BaseApiTokenDataRequest
{
    public function rules()
    {
        return [
            "profile_picture"  =>  "required|exists:garbage_media,id",
        ];
    }
}

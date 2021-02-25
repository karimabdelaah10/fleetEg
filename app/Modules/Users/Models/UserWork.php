<?php

namespace App\Modules\Users\Models;

use App\Modules\BaseApp\BaseModel;
use App\Modules\BaseApp\Traits\HasAttach;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserWork extends BaseModel
{

    use SoftDeletes,HasAttach;

    protected $table = "user_work";

    protected $fillable = ["type","title","company_name","company_address","user_id"];
}

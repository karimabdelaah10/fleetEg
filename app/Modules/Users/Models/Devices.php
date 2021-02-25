<?php

namespace App\Modules\Users\Models;

use App\Modules\BaseApp\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Devices extends BaseModel
{
    protected $table ='devices';
    protected $fillable = ['user_id' , 'device_type' , 'fcm_token' , 'device_id'];
}

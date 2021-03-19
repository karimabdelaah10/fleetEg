<?php

namespace App\Modules\Notification;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table ='notifications';
    protected $fillable =['description' ,'to' ,'user_id' ,'related_element_id' ,'related_element_type'];
}

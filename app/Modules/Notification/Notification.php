<?php

namespace App\Modules\Notification;

use App\Modules\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table ='notifications';
    protected $fillable =['description' ,'to' ,'user_id' ,'related_element_id' ,'related_element_type'];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}

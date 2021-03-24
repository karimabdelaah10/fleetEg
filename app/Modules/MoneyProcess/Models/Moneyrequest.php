<?php

namespace App\Modules\MoneyProcess\Models;

use App\Modules\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moneyrequest extends Model
{
    protected $table='moneyrequests';
    protected $fillable=[
        'user_id',
        'available_balance',
        'requested_amount',
        'status'
    ];
    use HasFactory;

    public function getData()
    {
        return $this;
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function scopeFiltered($query)
    {
        if (request()->status && request()->status !='all'){
            $query->where('status' , request()->status);
        }
        return $query;
    }


}

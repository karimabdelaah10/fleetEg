<?php

namespace App\Modules\MoneyProcess\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymentmethod extends Model
{
    use HasFactory;
    protected $table ='paymentmethods';
    protected $fillable= [
        'user_id' ,
        'default',
        'type',
        'bank_account_number',
        'e_wallet_number',
        'e_wallet_provider',
        'national_id',
    ];

}

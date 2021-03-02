<?php

namespace App\Modules\MoneyProcess\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'user_id',
        'available_balance_before_transaction',
        'available_balance_after_transaction',
        'amount',
        'transaction_type'
    ];
}

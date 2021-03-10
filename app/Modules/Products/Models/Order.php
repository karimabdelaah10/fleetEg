<?php

namespace App\Modules\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable=[
        'customer_name',
        'customer_mobile_number',
        'customer_area',
        'customer_address',
        'shipping_note',
        'store_name',
        'total_price',
        'governorate_id',
        'user_id'
    ];

    public function orderProducts()
    {
        return $this->belongsToMany(Product::class , 'orderproducts');
    }
}

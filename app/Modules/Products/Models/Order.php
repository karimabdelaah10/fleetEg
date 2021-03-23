<?php

namespace App\Modules\Products\Models;

use App\Modules\Governorate\Models\Governorate;
use App\Modules\Users\User;
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
        'status',
        'shipping_note',
        'store_name',
        'total_price',
        'governorate_id',
        'user_id'
    ];

    public function getData()
    {
        return $this;
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
    public function governorate()
    {
        return $this->belongsTo(Governorate::class , 'governorate_id');
    }

    public function orderProducts()
    {
        return $this->belongsToMany(Product::class , 'orderproducts')->withPivot(
    'product_id',
            'amount',
            'detail',
        );
    }

}

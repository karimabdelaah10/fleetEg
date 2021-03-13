<?php

namespace App\Modules\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderproduct extends Model
{
    use HasFactory;
    protected $table='orderproducts';
    protected $fillable=[
        'product_id',
        'order_id',
        'amount',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class , 'product_id');
    }
    public function details()
    {
        return $this->hasMany(Orderproductdetail::class);
    }
}

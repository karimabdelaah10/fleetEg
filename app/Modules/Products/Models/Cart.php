<?php

namespace App\Modules\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table ='carts';
    protected $fillable =[
        'user_id',
        'product_id',
        'price' ,
        'image' ,
        'commission' ,
        'amount' ,
        'spec_value_id' ,
        'inner_spec_value_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class , 'product_id');
    }
}

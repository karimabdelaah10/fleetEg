<?php

namespace App\Modules\Products\Models;

use App\Modules\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favouriteproduct extends Model
{
    use HasFactory;
    protected $table= 'favouriteproducts';
    protected $fillable= ['product_id' , 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

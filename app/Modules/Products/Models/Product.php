<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table ='products';
    protected $fillable =['title' ,'is_active' ,'price' ,'discount' ,'2pc_discount','plus_2pc_discount','category_id'];

}

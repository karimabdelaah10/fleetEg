<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productspec extends Model
{
    use HasFactory;
    protected $table='productspecs';
    protected $fillable =['stock' ,'product_id','spec_value_id'];

}

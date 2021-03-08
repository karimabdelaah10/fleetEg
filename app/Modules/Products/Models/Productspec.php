<?php

namespace App\Modules\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productspec extends Model
{
    use HasFactory;
    protected $table='productspecs';
    protected $fillable =['product_id','spec_id'];

}

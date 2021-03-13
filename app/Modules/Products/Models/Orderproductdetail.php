<?php

namespace App\Modules\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderproductdetail extends Model
{
    use HasFactory;
    protected $table='orderproductdetails';
    protected $fillable=[
        'orderproduct_id',
        'spec_value_id',
        'detail'
    ];

    public function specValue()
    {
        return $this->belongsTo(Specvalue::class , 'spec_value_id');
    }
}

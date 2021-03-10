<?php

namespace App\Modules\Governorate\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    use HasFactory;
    protected $table ='governorates';
    protected $fillable =['title' ,'is_active'];

    public function getData()
    {
        return $this;
    }

    public function scopeActive($query)
    {
        return $query->where('is_Active' , 1);
    }
}

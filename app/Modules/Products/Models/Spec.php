<?php

namespace App\Modules\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    use HasFactory;
    protected $table ='specs';
    protected $fillable =['title','is_active'];

    public function scopeActive($query)
    {
        return $query->where('is_active', '=', 1);
    }

    public function specsvalues()
    {
        return $this->hasMany(Specvalue::class , 'spec_id');
    }
    public function getData()
    {
        return $this;
    }

}

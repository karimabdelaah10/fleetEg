<?php

namespace App\Modules\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specvalue extends Model
{
    use HasFactory;
    protected $table ='specvalues';
    protected $fillable= ['title' ,'is_active' ,'spec_id'];

    public function spec()
    {
        return $this->belongsTo(Spec::class , 'spec_id');
    }
    public function getData()
    {
        return $this;
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', '=', 1);
    }

}

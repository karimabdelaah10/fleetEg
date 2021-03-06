<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specvalue extends Model
{
    use HasFactory;
    protected $table ='specvalues';
    protected $fillable= ['title' ,'is_active' ,'spec_id' ,'category_id'];
}

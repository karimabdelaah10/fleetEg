<?php

namespace App\Modules\Products\Models;

use App\Modules\BaseApp\Traits\HasAttach;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory ,HasAttach;

    protected $table ='products';
    protected $fillable =['title' ,'is_active' ,
        'price' ,'commission','discount' ,'two_pc_discount',
        'plus_two_pc_discount','category_id' ,'media_url','image'];

    protected static $attachFields = [
        'image' => [
            'sizes' => ['small' => 'resize,300x300', 'large' => 'resize,600x600'],
            'path' => 'storage/uploads'
        ],
    ];
    public function getData()
    {
        return $this;
    }

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function specs()
    {
        return $this->belongsToMany(Spec::class,
            'productspecs')->withPivot('id');
    }
}

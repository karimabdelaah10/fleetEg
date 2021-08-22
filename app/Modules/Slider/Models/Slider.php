<?php

namespace App\Modules\Slider\Models;
use App\Modules\BaseApp\BaseModel;
use App\Modules\BaseApp\Traits\HasAttach;

class Slider extends BaseModel
{
    use HasAttach;
    ///////////////////////////// has translation
    protected $table = "sliders";

    protected static $attachFields = [
        'image' => [
            'sizes' => ['small' => 'crop,400x300', 'large' => 'resize,800x600'],
            'path' => 'storage/uploads'
        ],
    ];
    // To Share this info with import from excel class
    // to upload image with the same dimensions
    public static $attachFieldsAttributes =[
        'sizes' => ['small' => 'resize,235x100', 'large' => 'resize,1520x650'],
        'path' => 'storage/uploads'
    ];
    protected $fillable = [
        'description',
        "link",
        'is_active',
        'image'
    ];

    public $useTranslationFallback = true;


    public function scopeActive($query)
    {
        return $query->where('is_active', '=', 1);
    }

    public function getData()
    {
        return $this;
    }
    public function getImageAttribute($value)
    {
        if (!empty($value)){
            return image($value , 'large');
        }
        return  'https://via.placeholder.com';
    }
    public function getLinkAttribute($value)
    {
        if (!empty($value)){
            return $value ;
        }
        return  '#';
    }
}

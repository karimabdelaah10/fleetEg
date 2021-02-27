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
            'sizes' => ['small' => 'crop,400x300', 'large' => 'resize,1520x650'],
            'path' => 'storage/uploads'
        ],
    ];
    // To Share this info with import from excel class
    // to upload image with the same dimensions
    public static $attachFieldsAttributes =[
        'sizes' => ['small' => 'crop,400x300', 'large' => 'resize,1520x650'],
        'path' => 'storage/uploads'
    ];
    protected $fillable = ['is_active','image' ,'index'];

    protected $translatedAttributes = [
        'title',
        'description',
        "link",
        "meta_title",
        "meta_keywords",
        "meta_description"
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

}

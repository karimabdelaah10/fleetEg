<?php


namespace App\Modules\Slider\Models;
use App\Modules\BaseApp\BaseModel;

class SliderTranslation extends BaseModel
{
    public $timestamps = false;
    protected $table = 'sliders_translations';
    protected $fillable = [
        'title',
        'description',
        'link',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
}

<?php

namespace App\Modules\Products\Models;

use App\Modules\BaseApp\Traits\HasAttach;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory ,HasAttach;

    protected $table ='products';
    protected $fillable =['title' ,'description','is_active' ,
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

    public function scopeFiltered($query)
    {
        $query->Active();
        if (request()->search_key && !empty(request()->search_key)){
            $query->where('title' ,'like',  '%'.request()->search_key.'%');
//            ->orWhere('description' ,'like', '%"' . request()->search_key . '"%');
        }
        if (request()->selected_category && request()->selected_category != 'all'){
            $query->where('category_id' , request()->selected_category);
        }
        if (request()->selected_price && request()->selected_price != 'all'){
            switch (request()->selected_price){
                case ('l-100'):
                    $query->where('price' , '<=' ,100);
                break;
                case ('f-100-t-500'):
                    $query->where('price' , '>' ,100);
                    $query->where('price' , '<=' ,500);
                break;
                case ('f-500-t-1000'):
                    $query->where('price' , '>' ,500);
                    $query->where('price' , '<=' ,1000);
                break;
                default:
                    $query->where('price' , '>' ,1000);
                    break;
            }
        }
        return $query;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active' , 1);
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

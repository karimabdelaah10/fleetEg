<?php

namespace App\Modules\Products\Models;

use App\Modules\Governorate\Models\Governorate;
use App\Modules\Users\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable=[
        'customer_name',
        'customer_mobile_number',
        'customer_area',
        'customer_address',
        'status',
        'shipping_note',
        'store_name',
        'total_price',
        'total_commission',
        'governorate_id',
        'user_id'
    ];

    public function getData()
    {
        return $this;
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
    public function governorate()
    {
        return $this->belongsTo(Governorate::class , 'governorate_id');
    }

    public function orderProducts()
    {
        return $this->belongsToMany(Product::class , 'orderproducts')->withPivot(
    'product_id',
            'amount',
            'detail',
        );
    }

    public function scopeFiltered($query)
    {
        if (request()->search_key && !empty(request()->search_key)){
            $query->where('id' , request()->search_key)
                 ->orWhereHas('governorate', function($q) {
                     $q->where('title' ,'like', '%'.request()->search_key.'%');
                 })
                ->orWhereHas('orderProducts', function($q) {
                     $q->where('title' ,'like', '%'.request()->search_key.'%');
                     $q->where('description' ,'like', '%'.request()->search_key.'%');
                 })
                ->orWhereHas('user', function($q) {
                    $q->where('name' ,'like', '%'.request()->search_key.'%');
                })
            ;
        }
        if (request()->status && request()->status != 'all'){
            $query->where('status' , request()->status);
        }
        if (request()->query('from')){
            $query->where('created_at' ,'>=', Carbon::parse(request()->query('from'))->format('Y-m-d')." 00:00:00");
        }
        if (request()->query('to')){
            $query->where('created_at' ,'<=', Carbon::parse(request()->query('to'))->format('Y-m-d')." 23:59:59");
        }
        return $query;
    }


}

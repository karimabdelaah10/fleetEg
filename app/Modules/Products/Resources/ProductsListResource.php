<?php

namespace App\Modules\Products\Resources;

use App\Modules\Products\Models\Favouriteproduct;
use App\Modules\Users\Enums\UserEnum;
use App\Modules\Users\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductsListResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($item) {
            return [
            'id' => (int)$item->id,
            'title' => $item->title,
            'description' => $item->description,
            'is_active' => $item->is_active,
            'is_favourite' => $this->is_favourite($item->id),
            'price' => (int)$item->price,
            'commission' => (int)$item->commission,
            'discount' => $item->discount,
            'two_pc_discount' => (int)$item->two_pc_discount,
            'plus_two_pc_discount' => (int)$item->plus_two_pc_discount,
            'image' => image($item->image , 'large'),
            'media_url' => $item->media_url,
            'category_id' => $item->category_id,
            'category' => @$item->category->title ?? ' ',
            'one_product_url' => $this->one_product_url($item->id),
            'created_at' => Carbon::parse($item->created_at)->format('Y-m-d'),
            'updated_at' => Carbon::parse($item->updated_at)->format('Y-m-d'),
            ];

        });

    }
    public function is_favourite($product_id)
    {
        if (auth()->id()){
            $row = Favouriteproduct::where([['product_id' , $product_id],
                ['user_id', auth()->id()]])->first();
            if ($row){
                return true;
            }
        }
        return  false;
    }

    public function one_product_url($product_id)
    {
        if (auth()->user()) {
            $user =User::find(auth()->id());
            if ($user->getRawOriginal('type') == UserEnum::CUSTOMER) {
                return url('/customer-product/view', $product_id);
            } elseif ($user->getRawOriginal('type') == UserEnum::CUSTOMER) {
                return url('/product/view', $product_id);
            }
        }
        return '';
    }
}

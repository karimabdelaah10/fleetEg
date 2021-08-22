<?php

namespace App\Modules\Products\Resources;

use App\Modules\Products\Models\Favouriteproduct;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SpecsListResource extends ResourceCollection
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
            'is_active' => $item->is_active,
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
}

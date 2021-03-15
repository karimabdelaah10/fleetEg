<?php

namespace App\Modules\Products\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (int)$this->id,
            'title' => $this->title,
            'description' => $this->description,
            'is_active' => $this->is_active,
            'price' => (int)$this->price,
            'commission' => (int)$this->commission,
            'discount' => $this->discount,
            'two_pc_discount' => (int)$this->two_pc_discount,
            'plus_two_pc_discount' => (int)$this->plus_two_pc_discount,
            'image' => image($this->image , 'large'),
            'media_url' => $this->media_url,
            'category_id' => $this->category_id,
            'category' => @$this->category->title,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d'),
        ];

    }
}

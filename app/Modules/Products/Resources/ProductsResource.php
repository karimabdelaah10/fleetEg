<?php

namespace App\Modules\Products\Resources;

use App\Modules\Products\Models\Favouriteproduct;
use App\Modules\Products\Models\Productspecvalue;
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
//        dd(auth()->user());
        $array= [
            'id' => (int)$this->id,
            'title' => $this->title,
            'description' => $this->description,
            'is_active' => $this->is_active,
            'is_favourite' => $this->is_favourite($this->id),
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
        $array['specs'] =$this->getSpecs();
        return  $array;

    }

    public function getSpecs()
    {
        $specs=[];
        $specs_values=[];
        if (!empty($this->specs)){
            foreach ($this->specs as $spec){
                $this->specsvalues= $this->specsvalues->where('spec_id' ,$spec->id);
                    if (!empty($this->specsvalues)){
                        foreach ($this->specsvalues as $specsvalue){
                            $spec_value_record =[
                                'id'            => $specsvalue->id,
                                'title'         => $specsvalue->title,
                                'stock'         => @$specsvalue->pivot->stock,
                                'image'         =>  image($specsvalue->pivot->image , 'large') ,
                                'is_active'     =>$specsvalue->is_active,
                                'pivot_id'         => @$specsvalue->pivot->id,
                            ];
                            array_push($specs_values , $spec_value_record);
                        }
                    }
                $spec_record =[
                    'id'            => $spec->id,
                    'title'         => $spec->title,
                    'is_active'     =>$spec->is_active,
                    'specs_values'  =>$specs_values
                ];
                array_push($specs , $spec_record);
                $specs_values=[];
            }
        }
        return $specs;
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

<?php

namespace App\Modules\Products\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Products\Models\Category;
use App\Modules\Products\Models\Favouriteproduct;
use App\Modules\Products\Models\Product;
use App\Modules\Products\Models\Spec;
use App\Modules\Products\Models\Specvalue;
use App\Modules\Products\Requests\CategoryRequest;
use App\Modules\Products\Resources\ProductsResourcePagination;
use App\Modules\Users\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsApiController extends Controller {

    public $model;
    public $views;
    public $module,$module_url ,$title;

    public function __construct(Product $model) {
        $this->model = $model;
    }

    public function getFilteredProducts($user_id) {
       $user= User::findOrFail($user_id);
       Auth::login($user);
     $products =  $this->model->Filtered()->with('category')->orderBy("id","DESC")->paginate(request('per_page'));
     return new ProductsResourcePagination($products);
    }

    public function favProduct(Request $request)
    {
     $row=  Favouriteproduct::where([['product_id', $request->product_id],['user_id',$request->user_id]])->first();
        if ($row){
            $row->delete();
        }else{
            Favouriteproduct::create($request->all());
        }

        return [
            'status' => 200,
            'message'=>'Done'
        ];
    }

    public function getFavouriteProducts($user_id)
    {
        $user= User::findOrFail($user_id);
        Auth::login($user);
        $product_ids= Favouriteproduct::where('user_id', $user_id)->pluck('product_id');
        $products =  $this->model->Filtered()->whereIn('id' ,$product_ids)->with('category')->orderBy("id","DESC")->paginate(request('per_page'));
        return new ProductsResourcePagination($products);

    }
}

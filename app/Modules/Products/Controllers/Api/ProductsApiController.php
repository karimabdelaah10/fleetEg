<?php

namespace App\Modules\Products\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Products\Models\Cart;
use App\Modules\Products\Models\Favouriteproduct;
use App\Modules\Products\Models\Product;
use App\Modules\Products\Models\Productspecvalue;
use App\Modules\Products\Models\Spec;
use App\Modules\Products\Resources\ProductsResource;
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
        $data=[];
        try {
            $user= User::findOrFail($user_id);
            Auth::login($user);
             $products =  $this->model->Filtered()
                 ->whereHas('specsvalues')
                 ->with('category')
                 ->orderBy("id","DESC")
                 ->paginate(request('per_page'));
                $data =new ProductsResourcePagination($products);
                return custome_response(200 ,$data , '' ,[]);
            }catch(\Exception $e){
            $title = trans('app.wrong action');
            $message = trans('app.wrong action message');
            if (env('APP_DEBUG')){
                $message = $e->getMessage();
                $message .='    in '.$e->getFile();
                $message .='    line '.$e->getLine();
            }
            return custome_response(500 ,$data , $title.'     '.$message ,[]);

        }
    }

    public function favProduct(Request $request)
    {
        $data=[];
        try {
            $row=  Favouriteproduct::where([['product_id', $request->product_id],['user_id',$request->user_id]])->first();
            if ($row){
                $row->delete();
            }else{
                Favouriteproduct::create($request->all());
            }
        return custome_response(200 ,$data , '' ,[]);
        }catch(\Exception $e) {
            $title = trans('app.wrong action');
            $message = trans('app.wrong action message');
            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
                $message .= '    in ' . $e->getFile();
                $message .= '    line ' . $e->getLine();
            }
            return custome_response(500, $data, $title.'  '.$message, []);
        }
    }

    public function getFavouriteProducts($user_id)
    {
        $data=[];
        try {
            $user= User::findOrFail($user_id);
            Auth::login($user);
            $product_ids= Favouriteproduct::where('user_id', $user_id)
                ->pluck('product_id');
            $products =  $this->model->Filtered()
                ->whereHas('specsvalues')
                ->whereIn('id' ,$product_ids)
                ->with('category')
                ->orderBy("id","DESC")
                ->paginate(request('per_page'));
            $data =new ProductsResourcePagination($products);

        return custome_response(200 ,$data , '' ,[]);
        }catch(\Exception $e) {
            $title = trans('app.wrong action');
            $message = trans('app.wrong action message');
            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
                $message .= '    in ' . $e->getFile();
                $message .= '    line ' . $e->getLine();
            }
            return custome_response(500, $data, $title.'  '.$message, []);
        }
    }

    public function getView($product_id)
    {
        $data=[];
        try {
            $user= User::findOrFail(\request()->user_id);
            Auth::login($user);
            $product =  $this->model->findOrFail($product_id);
            $data =new ProductsResource($product);

            return custome_response(200 ,$data , '' ,[]);
        }catch(\Exception $e) {
            $title = trans('app.wrong action');
            $message = trans('app.wrong action message');
            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
                $message .= '    in ' . $e->getFile();
                $message .= '    line ' . $e->getLine();
            }
            return custome_response(500, $data, $title.'  '.$message, []);
        }
    }

    public function getInnerSpecValues($parent_spec_value_id)
    {
        $data=[];
        try {
            $specs_values_list=[];
            $specsIds =Productspecvalue::where('parent_spec_value_id' ,$parent_spec_value_id)
                ->where('product_id', \request()->product_id)
                ->pluck('spec_id');
            $specs =  Spec::whereIn('id' , $specsIds)->with('productspecsvalues')->get();

            if (!empty($specs)){
                foreach ($specs as $spec){
                    $inner_spec_values = $spec->productspecsvalues->where('parent_spec_value_id' ,$parent_spec_value_id)->where('product_id', \request()->product_id);
                    if (!empty($inner_spec_values)){
                        foreach ($inner_spec_values as $inner_spec_value){
                            $spec_value_record =[
                                'id'            => @$inner_spec_value->id,
                                'value_id'      => @$inner_spec_value->value->id,
                                'title'         => @$inner_spec_value->value->title,
                                'stock'         => @$inner_spec_value->stock,
                                'image'         =>  image(@$inner_spec_value->image , 'large') ,
                            ];
                            array_push($specs_values_list , $spec_value_record);
                        }
                    }
                    $spec_record =[
                        'id'            => $spec->id,
                        'title'         => $spec->title,
                        'is_active'     => $spec->is_active,
                        'specs_values'  => $specs_values_list
                    ];


                    array_push($data , $spec_record);
                    $specs_values_list=[];
                }
            }
            return custome_response(200 ,$data , '' ,[]);
        }catch(\Exception $e) {
            $title = trans('app.wrong action');
            $message = trans('app.wrong action message');
            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
                $message .= '    in ' . $e->getFile();
                $message .= '    line ' . $e->getLine();
            }
            return custome_response(500, $data, $title.'  '.$message, []);
        }
    }

    public function addProductToCart(Request  $request)
    {
        $data=[];
        try {
            $data = Cart::create($request->all());
            return custome_response(200 ,$data , '' ,[]);
        }catch(\Exception $e) {
            $title = trans('app.wrong action');
            $message = trans('app.wrong action message');
            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
                $message .= '    in ' . $e->getFile();
                $message .= '    line ' . $e->getLine();
            }
            return custome_response(500, $data, $title.'  '.$message, []);
        }

    }
}

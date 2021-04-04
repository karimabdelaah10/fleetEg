<?php

namespace App\Modules\Products\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\BaseApp\Enums\GeneralEnum;
use App\Modules\MoneyProcess\Models\Moneyrequest;
use App\Modules\Products\Enums\OrdersEnum;
use App\Modules\Products\Models\Cart;
use App\Modules\Products\Models\Favouriteproduct;
use App\Modules\Products\Models\Order;
use App\Modules\Products\Models\Product;
use App\Modules\Products\Models\Productspecvalue;
use App\Modules\Products\Models\Spec;
use App\Modules\Products\Resources\ProductsResource;
use App\Modules\Products\Resources\ProductsResourcePagination;
use App\Modules\Users\Enums\UserEnum;
use App\Modules\Users\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartsApiController extends Controller {

    public $model;
    public $views;
    public $module,$module_url ,$title;

    public function __construct(Cart $model) {
        $this->model = $model;
    }

    public function index($user_id) {
        $data=[];
        try {


            $response = [];
            $product_discounts=[];
            $product_discounts_details=[];

            $trans=[
                'my_cart' => trans('carts.my_carts'),
                'total' => trans('carts.total'),
                'checkout' => trans('carts.checkout'),
                'shipping_coast'=>trans('governorate.shipping_coast')
            ];
            $carts = Cart::where('user_id' ,$user_id)
                ->with(['innerSpecValue','specValue','product'])
                ->get();

            if (count($carts)){
                foreach ($carts as $cart){
                    if ($cart->product->discount){
                        if (!empty($product_discounts[$cart->product_id])){
                            $product_discounts[$cart->product_id]['amount'] += $cart->amount;
                        }else{
                            $product_discounts[$cart->product_id] =[
                                'amount' =>$cart->amount,
                                'two_pc_discount'=>$cart->product->two_pc_discount,
                                'plus_two_pc_discount'=>$cart->product->plus_two_pc_discount,
                                'product_title'=>$cart->product->title,

                            ];
                        }
                    }
                }
            }
            if (count($product_discounts)){
                foreach ($product_discounts as $one_product_discount){
                    if ($one_product_discount['amount'] == 2){
                        $recorde =[
                            'discount'  =>$one_product_discount['two_pc_discount'],
                            'product_title'=>$one_product_discount['product_title']
                        ];
                    }elseif ($one_product_discount['amount'] > 2 ){
                        $recorde =[
                            'discount'  =>$one_product_discount['plus_two_pc_discount'],
                            'product_title'=>$one_product_discount['product_title']
                        ];
                    }
                    if (isset($recorde)){
                        array_push($product_discounts_details , $recorde);
                    }
                }
            }
            $data['data'] = $carts;
            $data['trans'] = $trans;
            $data['product_discounts'] = $product_discounts;
            $data['product_discounts_details'] = $product_discounts_details;
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
    public function delete($product_id) {
        $data=[];
        try {
            Cart::findOrFail($product_id)->delete();
            return custome_response(200 ,[] , [] ,[]);
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
    public function checkout(Request $request)
    {
        $data=[];
        try {
            $carts = Cart::where('user_id' ,$request->user_id)
                ->with(['innerSpecValue','specValue','product'])
                ->get();
            if (count($carts)){
                $newOrder =  Order::create($request->all());
                $products=[];
                foreach ($carts as $cart){
                    $detail='';
                    $spec_value_id='';
                    if (isset($cart->specValue)){
                        $detail=$cart->specValue->title;
                        $spec_value_id =$cart->spec_value_id;
                    }
                    if (isset($cart->innerSpecValue)){
                        $detail = $detail.' , '.$cart->innerSpecValue->title;
                        $spec_value_id =$cart->inner_spec_value_id;
                    }
                    $product_spec_value=Productspecvalue::
                    where('product_id',  $cart->product_id)
                        ->where('spec_value_id' , $spec_value_id)
                        ->first();
                    $product_spec_value->decrement('stock', $cart->amount);

                    $record =[
                        'product_id' =>$cart->product_id,
                        'amount' =>$cart->amount,
                        'detail' => $detail,
                        'product_spec_value_id' => $product_spec_value->id
                    ];
                    array_push($products , $record);
                }
                $newOrder->orderProducts()->attach($products);
                Cart::where('user_id' ,$request->user_id)->delete();
                //Todo to send notification to admin about new order
                $description=trans('notifications.notification_new_order_txt');
                $to= UserEnum::ADMIN;
                $related_element_id = $newOrder->id;
                $related_element_type = Order::class;
                create_new_notification($description , $to , $newOrder->user_id ,$related_element_id ,$related_element_type);
            }
            return custome_response(200 ,[] , [] ,[]);
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
    public function getOrdersNumbers($user_id)
    {
        $data=[];
        try {
            $trans=OrdersEnum::ordersStatusesForSelector();
            $data =[
                GeneralEnum::UNDER_REVIEW => Order::where('user_id' , $user_id)->where('status' , GeneralEnum::UNDER_REVIEW)->count(),
                GeneralEnum::WITH_SHIPPING_COMPANY => Order::where('user_id' , $user_id)->where('status' , GeneralEnum::WITH_SHIPPING_COMPANY)->count(),
                GeneralEnum::NO_ANSWER => Order::where('user_id' , $user_id)->where('status' , GeneralEnum::NO_ANSWER)->count(),
                GeneralEnum::NOT_SERIOUS => Order::where('user_id' , $user_id)->where('status' , GeneralEnum::NOT_SERIOUS)->count(),
                GeneralEnum::REFUSED => Order::where('user_id' , $user_id)->where('status' , GeneralEnum::REFUSED)->count(),
                GeneralEnum::RETURNED_TO_STOCK => Order::where('user_id' , $user_id)->where('status' , GeneralEnum::RETURNED_TO_STOCK)->count(),
                GeneralEnum::DELIVERED => Order::where('user_id' , $user_id)->where('status' , GeneralEnum::DELIVERED)->count(),
            ];
            return custome_response(200 ,$data , '' ,[
                'trans'=>$trans
            ]);
        }
        catch(\Exception $e) {
            $title = trans('app.wrong action');
            $message = trans('app.wrong action message');
            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
                $message .= '    in ' . $e->getFile();
                $message .= '    line ' . $e->getLine();
            }
            return custome_response(500, $data,  $title. '   '.$message, []);
        }
    }
}

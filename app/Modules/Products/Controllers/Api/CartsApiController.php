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

      $response['data'] = $carts;
      $response['trans'] = $trans;
      $response['product_discounts'] = $product_discounts;
      $response['product_discounts_details'] = $product_discounts_details;
            return  $response;
    }
    public function delete($product_id) {
      Cart::findOrFail($product_id)->delete();
      return  'Done';
    }

    public function checkout(Request $request)
    {
//        return $request->all();
        $carts = Cart::where('user_id' ,$request->user_id)
            ->with(['innerSpecValue','specValue','product'])
            ->get();

        if (count($carts)){
            $newOrder =  Order::create($request->all());
            $products=[];
            foreach ($carts as $cart){
                $detail='';
                if (isset($cart->specValue)){
                    $detail =$cart->specValue->title;
                }
                if (isset($cart->innerSpecValue)){
                    $detail = $detail.' , '.$cart->innerSpecValue->title;
                }
                $record =[
                    'product_id' =>$cart->product_id,
                    'amount' =>$cart->amount,
                    'detail' => $detail
                ];
                array_push($products , $record);
            }
        }

        $newOrder->orderProducts()->attach($products);

        Cart::where('user_id' ,$request->user_id)->delete();
        //Todo to send notification to admin about new order
        $description=trans('notifications.notification_new_order_txt');
        $to= UserEnum::ADMIN;
        $related_element_id = $newOrder->id;
        $related_element_type = Order::class;
        create_new_notification($description , $to , null ,$related_element_id ,$related_element_type);
        return'done';

    }

    public function getOrdersNumbers($user_id)
    {
        $trans=OrdersEnum::ordersStatusesForSelector();
         $data =[
             GeneralEnum::IN_STOCK => Order::where('user_id' , $user_id)->where('status' , GeneralEnum::IN_STOCK)->count(),
             GeneralEnum::UNDER_REVIEW => Order::where('user_id' , $user_id)->where('status' , GeneralEnum::UNDER_REVIEW)->count(),
             GeneralEnum::PENDING => Order::where('user_id' , $user_id)->where('status' , GeneralEnum::PENDING)->count(),
             GeneralEnum::DELIVERED => Order::where('user_id' , $user_id)->where('status' , GeneralEnum::DELIVERED)->count(),
             GeneralEnum::WITH_SHIPPING_COMPANY => Order::where('user_id' , $user_id)->where('status' , GeneralEnum::WITH_SHIPPING_COMPANY)->count(),
         ];

         return [
             'data' =>$data,
             'trans' =>$trans
         ];
    }
}

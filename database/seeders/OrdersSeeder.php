<?php

namespace Database\Seeders;

use App\Modules\Governorate\Models\Governorate;
use App\Modules\Products\Enums\OrdersEnum;
use App\Modules\Products\Models\Order;
use App\Modules\Products\Models\Orderproduct;
use App\Modules\Products\Models\Product;
use App\Modules\Products\Models\Productspecvalue;
use App\Modules\Products\Models\Specvalue;
use App\Modules\Users\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orderproducts')->delete();
        DB::table('orders')->delete();

        $faker =Faker::create('ar_JO');
        $orders =[];
        for ($i=0; $i<30 ;$i++){
            $products=[];
              for ($e =0; $e< 5 ;$e++){
                  $product = Product::whereHas('specsvalues')->inRandomOrder()->first();
                  $product_spec_value =Productspecvalue::where('product_id' , $product->id)->inRandomOrder()->first();
                  if ($product_spec_value->parent_spec_value_id){
                      $details =$product_spec_value->parent->value->title . ',' .$details =$product_spec_value->value->title;
                  }else{
                      $details =$product_spec_value->value->title;
                  }
                  array_push($products ,  [
                    'id' => $product->id ,
                    'amount' =>$faker->numberBetween(1,10),
                    'detail'=> $details,
                    'product_spec_value_id'=>$product_spec_value->id,
                ]);
            }
                array_push($orders ,[
                'customer_name'=>$faker->name,
                'customer_mobile_number'=>$faker->phoneNumber,
                'customer_area'=>$faker->city,
                'customer_address'=>$faker->address,
                'shipping_note'=>$faker->paragraph,
                'store_name'=>$faker->company,
                'status' =>OrdersEnum::ordersStatuses()[array_rand(OrdersEnum::ordersStatuses())],
                'total_price'=>$faker->numberBetween(100,1000),
                'governorate_id'=>Governorate::inRandomOrder()->first()->id,
                'user_id'=>User::Customer()->inRandomOrder()->first()->id,
                'products'=>$products,
            ]);
        }
        foreach ($orders as $order){
            $products = $order['products'];
            $order =Arr::except($order, ['products']);
            $newOrder = Order::create($order);
            foreach ($products as $product){
                Orderproduct::create([
                    'order_id' =>$newOrder->id,
                    'product_id'=> $product['id'],
                    'amount' =>$product['amount'],
                    'detail' =>$product['detail'],
                    'product_spec_value_id' => $product['product_spec_value_id']
                ]);
            }
        }
    }
}

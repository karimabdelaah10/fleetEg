<?php

namespace Database\Seeders;

use App\Models\User;
use App\Modules\Governorate\Models\Governorate;
use App\Modules\Products\Enums\OrdersEnum;
use App\Modules\Products\Models\Order;
use App\Modules\Products\Models\Orderproduct;
use App\Modules\Products\Models\Orderproductdetail;
use App\Modules\Products\Models\Product;
use App\Modules\Products\Models\Specvalue;
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
        for ($i =0; $i< 10 ;$i++){
            array_push($orders ,             [
                'customer_name'=>$faker->name,
                'customer_mobile_number'=>$faker->phoneNumber,
                'customer_area'=>$faker->city,
                'customer_address'=>$faker->address,
                'shipping_note'=>$faker->paragraph,
                'store_name'=>$faker->company,
                'status' =>OrdersEnum::ordersStatuses()[array_rand(OrdersEnum::ordersStatuses())],
                'total_price'=>$faker->numberBetween(100,1000),
                'governorate_id'=>Governorate::all()->random()->id,
                'user_id'=>User::all()->random()->id,
                'products'=>[
                    [
                        'id' => Product::all()->random()->id ,
                        'amount' =>$faker->numberBetween(1,10),
                        'detail'=> Specvalue::all()->random()->title. ' , '. Specvalue::all()->random()->title
                    ],
                    [
                        'id' => Product::all()->random()->id ,
                        'amount' =>$faker->numberBetween(1,10),
                        'detail'=> Specvalue::all()->random()->title. ' , '. Specvalue::all()->random()->title
                    ],
                    [
                        'id' => Product::all()->random()->id ,
                        'amount' =>$faker->numberBetween(1,10),
                        'detail'=> Specvalue::all()->random()->title. ' , '. Specvalue::all()->random()->title
                    ],
                    [
                        'id' => Product::all()->random()->id ,
                        'amount' =>$faker->numberBetween(1,10),
                        'detail'=> Specvalue::all()->random()->title. ' , '. Specvalue::all()->random()->title
                    ],
                    [
                        'id' => Product::all()->random()->id ,
                        'amount' =>$faker->numberBetween(1,10),
                        'detail'=> Specvalue::all()->random()->title. ' , '. Specvalue::all()->random()->title
                    ],
                ],
            ]
        );
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
                    'detail' =>$product['detail']
                ]);
            }
        }
    }
}

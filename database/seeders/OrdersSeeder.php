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
        DB::table('orderproductdetails')->delete();
        DB::table('orderproducts')->delete();
        DB::table('orders')->delete();

        $faker =Faker::create('en_US');
        $orders =[
            [
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
                        'details'=>[
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                        ],
                    ]
                ],
            ],

            [
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
                        'details'=>[
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                        ],
                    ]
                ],
            ],

            [
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
                        'details'=>[
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                        ],
                    ]
                ],
            ],

            [
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
                        'details'=>[
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                        ],
                    ]
                ],
            ],

            [
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
                        'details'=>[
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                        ],
                    ]
                ],
            ],

            [
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
                        'details'=>[
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                        ],
                    ]
                ],
            ],

            [
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
                        'details'=>[
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                        ],
                    ]
                ],
            ],

            [
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
                        'details'=>[
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                        ],
                    ]
                ],
            ],

            [
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
                        'details'=>[
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                        ],
                    ]
                ],
            ],

            [
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
                        'details'=>[
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                        ],
                    ]
                ],
            ],

            [
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
                        'details'=>[
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                        ],
                    ]
                ],
            ],

            [
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
                        'details'=>[
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                        ],
                    ]
                ],
            ],

            [
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
                        'details'=>[
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                        ],
                    ]
                ],
            ],

            [
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
                        'details'=>[
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                        ],
                    ]
                ],
            ],

            [
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
                        'details'=>[
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                        ],
                    ]
                ],
            ],

            [
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
                        'details'=>[
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                        ],
                    ]
                ],
            ],

            [
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
                        'details'=>[
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                        ],
                    ]
                ],
            ],

            [
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
                        'details'=>[
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                        ],
                    ]
                ],
            ],

            [
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
                        'details'=>[
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                            Specvalue::all()->random()->id,
                        ],
                    ]
                ],
            ],

        ];

        foreach ($orders as $order){
            $products = $order['products'];
            $order =Arr::except($order, ['products']);
            $newOrder = Order::create($order);
            foreach ($products as $product){
               $orderProduct= Orderproduct::create([
                    'order_id' =>$newOrder->id,
                    'product_id'=> $product['id'],
                    'amount' =>$product['amount']
                ]);
               foreach ($product['details'] as $spec_value_id){
                   Orderproductdetail::create([
                       'orderproduct_id'=> $orderProduct->id,
                       'spec_value_id' =>$spec_value_id
                   ]);
               }
            }
        }
    }
}

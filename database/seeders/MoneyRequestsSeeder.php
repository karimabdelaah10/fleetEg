<?php

namespace Database\Seeders;

use App\Modules\MoneyProcess\Enums\MoneyProcessEnum;
use App\Modules\MoneyProcess\Models\Moneyrequest;
use App\Modules\Users\Enums\UserEnum;
use App\Modules\Users\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MoneyRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $available_balance=[10000 , 11000 , 12000 ,13000 ,14000 ,15000];
        $requested_amount =[1000 , 2000 , 3000 , 4000 ,5000];
        $requests = [
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>$available_balance[array_rand($available_balance)],
                'requested_amount'     =>$requested_amount[array_rand($requested_amount)],
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>$available_balance[array_rand($available_balance)],
                'requested_amount'     =>$requested_amount[array_rand($requested_amount)],
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>$available_balance[array_rand($available_balance)],
                'requested_amount'     =>$requested_amount[array_rand($requested_amount)],
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>$available_balance[array_rand($available_balance)],
                'requested_amount'     =>$requested_amount[array_rand($requested_amount)],
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>$available_balance[array_rand($available_balance)],
                'requested_amount'     =>$requested_amount[array_rand($requested_amount)],
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>$available_balance[array_rand($available_balance)],
                'requested_amount'     =>$requested_amount[array_rand($requested_amount)],
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>$available_balance[array_rand($available_balance)],
                'requested_amount'     =>$requested_amount[array_rand($requested_amount)],
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>$available_balance[array_rand($available_balance)],
                'requested_amount'     =>$requested_amount[array_rand($requested_amount)],
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>$available_balance[array_rand($available_balance)],
                'requested_amount'     =>$requested_amount[array_rand($requested_amount)],
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>$available_balance[array_rand($available_balance)],
                'requested_amount'     =>$requested_amount[array_rand($requested_amount)],
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>$available_balance[array_rand($available_balance)],
                'requested_amount'     =>$requested_amount[array_rand($requested_amount)],
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],

        ];

        foreach ($requests as $request){
            User::find($request['user_id'])->update(['available_balance'=>$request['available_balance']]);
            Moneyrequest::create($request);
        }
    }
}

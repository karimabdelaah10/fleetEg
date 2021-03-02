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

        $requests = [
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>9000,
                'requested_amount'     =>2000,
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>9000,
                'requested_amount'     =>2000,
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>9000,
                'requested_amount'     =>2000,
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>9000,
                'requested_amount'     =>2000,
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>9000,
                'requested_amount'     =>2000,
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>9000,
                'requested_amount'     =>2000,
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>9000,
                'requested_amount'     =>2000,
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>9000,
                'requested_amount'     =>2000,
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>9000,
                'requested_amount'     =>2000,
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>9000,
                'requested_amount'     =>2000,
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],
            [
                'user_id'              => User::all()->random()->id,
                'available_balance'    =>9000,
                'requested_amount'     =>2000,
                'status'               =>MoneyProcessEnum::moneyRequestStatuses()[array_rand(MoneyProcessEnum::moneyRequestStatuses())],
            ],

        ];

        foreach ($requests as $request){
            Moneyrequest::create($request);
        }
    }
}

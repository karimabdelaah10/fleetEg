<?php

namespace Database\Seeders;

use App\Modules\Users\Enums\AdminEnum;
use App\Modules\Users\Enums\UserEnum;
use App\Modules\Users\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = [
            [
                'name'              =>'super admin',
                'type'              =>UserEnum::SUPER_ADMIN,
                'address'           =>'sadat city',
                'email'             =>'karimabdelaah@gmail.com',
                'mobile_number'     =>'010000'.rand(11111, 99999),
                'password'          =>'password',
            ],
            [
                'name'              =>'product admin',
                'type'              =>UserEnum::ADMIN,
                'admin_type'        =>AdminEnum::PRODUCT_ADMIN,
                'address'           =>'sadat city',
                'email'             =>'product_admin@admin.com',
                'mobile_number'     =>'010000'.rand(11111, 99999),
                'password'          =>'password',
            ],
            [
                'name'              =>'financial admin',
                'type'              =>UserEnum::ADMIN,
                'admin_type'        =>AdminEnum::FINANCIAL_ADMIN,
                'address'           =>'sadat city',
                'email'             =>'financial_admin@admin.com',
                'mobile_number'     =>'010000'.rand(11111, 99999),
                'password'          =>'password',
            ],
            [
                'name'              =>'user user',
                'type'              =>UserEnum::CUSTOMER,
                'address'           =>'sadat city',
                'email'             =>'user@user.com',
                'mobile_number'     =>'010000'.rand(11111, 99999),
                'password'          =>'password',
            ],
            [
                'name'              =>'user1 user1',
                'type'              =>UserEnum::CUSTOMER,
                'address'           =>'sadat city',
                'email'             =>'user1@user.com',
                'mobile_number'     =>'010000'.rand(11111, 99999),
                'password'          =>'password',
            ],
            [
                'name'              =>'user2 user2',
                'type'              =>UserEnum::CUSTOMER,
                'address'           =>'sadat city',
                'email'             =>'user2@user.com',
                'mobile_number'     =>'010000'.rand(11111, 99999),
                'password'          =>'password',
            ],
            [
                'name'              =>'user3 user3',
                'type'              =>UserEnum::CUSTOMER,
                'address'           =>'sadat city',
                'email'             =>'user3@user.com',
                'mobile_number'     =>'010000'.rand(11111, 99999),
                'password'          =>'password',
            ],
            [
                'name'              =>'user4 user4',
                'type'              =>UserEnum::CUSTOMER,
                'address'           =>'sadat city',
                'email'             =>'user4@user.com',
                'mobile_number'     =>'010000'.rand(11111, 99999),
                'password'          =>'password',
            ],
            [
                'name'              =>'user5 user5',
                'type'              =>UserEnum::CUSTOMER,
                'address'           =>'sadat city',
                'email'             =>'user5@user.com',
                'mobile_number'     =>'010000'.rand(11111, 99999),
                'password'          =>'password',
            ],

        ];

        foreach ($users as $user){
            User::create($user);
        }
    }
}

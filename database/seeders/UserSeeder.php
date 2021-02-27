<?php

namespace Database\Seeders;

use App\Modules\Users\Enums\UserEnum;
use App\Modules\Users\User;
use Illuminate\Database\Seeder;
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
        $users = [
            [
                'name'              =>'karim abdelaah',
                'type'              =>UserEnum::SUPER_ADMIN,
                'address'           =>'sadat city',
                'email'             =>'karimabdelaah@gmail.com',
                'mobile_number'     =>'01091811793',
                'password'          =>'password',
            ],
            [
                'name'              =>'admin admin',
                'type'              =>UserEnum::ADMIN,
                'address'           =>'sadat city',
                'email'             =>'admin@admin.com',
                'mobile_number'     =>'01091811792',
                'password'          =>'password',
            ],
            [
                'name'              =>'user user',
                'type'              =>UserEnum::CUSTOMER,
                'address'           =>'sadat city',
                'email'             =>'customer@customer.com',
                'mobile_number'     =>'01091811791',
                'password'          =>'password',
            ],
        ];

        foreach ($users as $user){
            User::create($user);
        }
    }
}

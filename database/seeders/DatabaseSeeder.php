<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
//        $this->call(MoneyRequestsSeeder::class);
        $this->call(GovernorateSeeder::class);
//        $this->call(CategoriesSeeder::class);
//        $this->call(SpecsSeeder::class);
        $this->call(ConfigSeeder::class);
//        $this->call(OrdersSeeder::class);
    }
}

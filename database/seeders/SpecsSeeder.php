<?php

namespace Database\Seeders;

use App\Modules\Products\Models\Spec;
use Illuminate\Database\Seeder;

class SpecsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specs=[
            [
                'title'=>'مقاسات',
                'is_active'=>1
            ],
            [
                'title'=>'الوان',
                'is_active'=>1
            ],
            [
                'title'=>'الموديل',
                'is_active'=>1
            ]
        ];
        foreach ($specs as $spec){
            Spec::create($spec);
        }
    }
}

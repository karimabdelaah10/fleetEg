<?php

namespace Database\Seeders;

use App\Modules\Products\Models\Spec;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specs')->delete();

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

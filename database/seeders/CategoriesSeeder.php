<?php

namespace Database\Seeders;

use App\Modules\Products\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $categories=[
            [
                'title'=>'احذيه رجالى',
                'is_active'=>1
            ],
            [
                'title'=>'احذيه اطفالى',
                'is_active'=>1
            ],
            [
                'title'=>'احذيه حريمى',
                'is_active'=>1
            ],
            [
                'title'=>'ملايس رجالى',
                'is_active'=>1
            ],
            [
                'title'=>'ملابس اطقالى',
                'is_active'=>1
            ],
            [
                'title'=>'ملابس حريم',
                'is_active'=>1
            ],
            [
                'title'=>'هواتف ذكيه',
                'is_active'=>1
            ],
            [
                'title'=>'الكترونيات',
                'is_active'=>1
            ],
            [
                'title'=>'اكسسوارات رجالى',
                'is_active'=>1
            ],
            [
                'title'=>'اكسسوارات حريمى',
                'is_active'=>1
            ]
        ];
        foreach ($categories as $category){
            Category::create($category);
        }
    }
}

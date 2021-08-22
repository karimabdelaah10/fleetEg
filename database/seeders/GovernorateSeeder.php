<?php

namespace Database\Seeders;

use App\Modules\Governorate\Models\Governorate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('governorates')->delete();

        $g = [  [
                    "title" => "القاهرة",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "الجيزة",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "الأسكندرية",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "الدقهلية",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "البحر الأحمر",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "البحيرة",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "الفيوم",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "الغربية",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "الإسماعلية",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "المنوفية",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "المنيا",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "القليوبية",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "الوادي الجديد",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "السويس",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "اسوان",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "اسيوط",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "بني سويف",
                "is_active" => 0
                ],
                [
                    "title" => "بورسعيد",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "دمياط",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "الشرقية",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "جنوب سيناء",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "كفر الشيخ",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "مطروح",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "الأقصر",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "قنا",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "شمال سيناء",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ],
                [
                    "title" => "سوهاج",
                    "shipping_coast" => rand(10 , 100),
                    "is_active" => 0
                ]
        ];
        foreach ($g as $ele){
            Governorate::create($ele);
        }
    }
}

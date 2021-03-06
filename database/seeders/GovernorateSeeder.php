<?php

namespace Database\Seeders;

use App\Modules\Governorate\Models\Governorate;
use Illuminate\Database\Seeder;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $g = [  [
                    "title" => "القاهرة",
                    "is_active" => 0
                ],
                [
                    "title" => "الجيزة",
                    "is_active" => 0
                ],
                [
                    "title" => "الأسكندرية",
                    "is_active" => 0
                ],
                [
                    "title" => "الدقهلية",
                    "is_active" => 0
                ],
                [
                    "title" => "البحر الأحمر",
                    "is_active" => 0
                ],
                [
                    "title" => "البحيرة",
                    "is_active" => 0
                ],
                [
                    "title" => "الفيوم",
                    "is_active" => 0
                ],
                [
                    "title" => "الغربية",
                    "is_active" => 0
                ],
                [
                    "title" => "الإسماعلية",
                    "is_active" => 0
                ],
                [
                    "title" => "المنوفية",
                    "is_active" => 0
                ],
                [
                    "title" => "المنيا",
                    "is_active" => 0
                ],
                [
                    "title" => "القليوبية",
                    "is_active" => 0
                ],
                [
                    "title" => "الوادي الجديد",
                    "is_active" => 0
                ],
                [
                    "title" => "السويس",
                    "is_active" => 0
                ],
                [
                    "title" => "اسوان",
                    "is_active" => 0
                ],
                [
                    "title" => "اسيوط",
                    "is_active" => 0
                ],
                [
                    "title" => "بني سويف",
                "is_active" => 0
                ],
                [
                    "title" => "بورسعيد",
                    "is_active" => 0
                ],
                [
                    "title" => "دمياط",
                    "is_active" => 0
                ],
                [
                    "title" => "الشرقية",
                    "is_active" => 0
                ],
                [
                    "title" => "جنوب سيناء",
                    "is_active" => 0
                ],
                [
                    "title" => "كفر الشيخ",
                    "is_active" => 0
                ],
                [
                    "title" => "مطروح",
                    "is_active" => 0
                ],
                [
                    "title" => "الأقصر",
                    "is_active" => 0
                ],
                [
                    "title" => "قنا",
                    "is_active" => 0
                ],
                [
                    "title" => "شمال سيناء",
                    "is_active" => 0
                ],
                [
                    "title" => "سوهاج",
                    "is_active" => 0
                ]
        ];
        foreach ($g as $ele){
            Governorate::create($ele);
        }
    }
}

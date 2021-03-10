<?php

namespace Database\Seeders;

use App\Modules\Config\Enums\ConfigsEnum;
use App\Modules\Config\Models\Config;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configs=[
        [
            'title'=>ConfigsEnum::FACEBOOK_URL,
            'value'=>'https://www.facebook.com/'
        ],
        [
            'title'=>ConfigsEnum::YOUTUBE_URL,
            'value'=>'https://www.youtube.com/'
        ],
        [
            'title'=>ConfigsEnum::EMAIL,
            'value'=>'mail@mail.com'
        ],
        [
            'title'=>ConfigsEnum::MOBILE_NUMBER,
            'value'=>'010000'.rand(11111, 99999)
        ],
        [
            'title'=>ConfigsEnum::WHATSAPP_NUMBER,
            'value'=>'010000'.rand(11111, 99999)
        ],
        ];
        foreach ($configs as $config){
            Config::create($config);
        }
    }
}

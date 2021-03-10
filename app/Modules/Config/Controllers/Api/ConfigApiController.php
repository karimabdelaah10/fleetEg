<?php


namespace App\Modules\Config\Controllers\Api;


use App\Modules\Config\Models\Config;

class ConfigApiController
{

    public function getConfigByTitle()
    {

       return Config::pluck('value' ,'title');
    }
}

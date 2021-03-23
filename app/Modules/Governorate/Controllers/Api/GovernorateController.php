<?php

namespace App\Modules\Governorate\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Governorate\Models\Governorate;
use App\Modules\Governorate\Requests\GovernorateRequest;

class GovernorateController extends Controller {

    public $model;
    public $views;
    public $module,$module_url ,$title;

    public function __construct(Governorate $model) {

        $this->model = $model;
    }

    public function getIndex() {
        return  $this->model->Active()->orderBy('id' , 'desc')->get();
        }

}

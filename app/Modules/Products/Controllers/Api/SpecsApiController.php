<?php

namespace App\Modules\Products\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Products\Models\Category;
use App\Modules\Products\Models\Spec;
use App\Modules\Products\Models\Specvalue;
use App\Modules\Products\Requests\CategoryRequest;

class SpecsApiController extends Controller {

    public $model;
    public $views;
    public $module,$module_url ,$title;

    public function __construct(Spec $model) {
        $this->model = $model;
    }

    public function getSpecsValues($id) {
     return Specvalue::where('spec_id' , $id)->Active()->orderBy('id','desc')->get();
    }
    public function index() {
       return $this->model->Active()->orderBy('id','desc')->get();
    }
}

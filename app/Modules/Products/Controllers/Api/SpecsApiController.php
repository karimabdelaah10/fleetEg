<?php

namespace App\Modules\Products\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Products\Models\Category;
use App\Modules\Products\Models\Favouriteproduct;
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
        $data=[];
        try {
            $data= Specvalue::where('spec_id' , $id)->Active()->orderBy('id','desc')->get();

            return custom_response(200 ,$data , '' ,[]);
        }catch(\Exception $e) {
            $title = trans('app.wrong action');
            $message = trans('app.wrong action message');
            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
                $message .= '    in ' . $e->getFile();
                $message .= '    line ' . $e->getLine();
            }
            return custom_response(500, $data, $title.'  '.$message, []);
        }
    }
    public function index() {
        $data=[];
        try {
            $data = $this->model->Active()->orderBy('id','desc')->get();
            return custom_response(200 ,$data , '' ,[]);
        }catch(\Exception $e) {
            $title = trans('app.wrong action');
            $message = trans('app.wrong action message');
            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
                $message .= '    in ' . $e->getFile();
                $message .= '    line ' . $e->getLine();
            }
            return custom_response(500, $data, $title.'  '.$message, []);
        }

    }
}

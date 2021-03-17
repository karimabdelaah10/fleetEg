<?php

namespace App\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\BaseApp\Enums\GeneralEnum;
use App\Modules\Products\Models\Order;
use App\Modules\Slider\Models\Slider;
use App\Modules\Users\User;

class DashboardController extends Controller {

    public $model;
    public $views;
    public $module;

    public function __construct() {
        $this->views = 'Dashboard';
//        $this->title = trans('app.Slider');
//        $this->model = $model;
//        $this->rules = $model->rules;
    }

    public function getIndex() {
        if (is_user()){
            $user = User::findOrFail(auth()->id());
            $data['bannars']=Slider::Active()->get();
            $user_orders =Order::where('user_id' , auth()->id());
            $data['numbers'] =$this;
            $data['numbers']->delivered_orders = $user_orders->where('status' ,GeneralEnum::DELIVERED)->count();
            $data['numbers']->pending_orders = $user_orders->where('status' ,GeneralEnum::PENDING)->count();
            $data['numbers']->favourite_products = $user->favourite_products->count();
            return view($this->views . '::customer_index' , $data);
        }elseif (is_admin()){

        }
        return view($this->views . '::index');
    }

}

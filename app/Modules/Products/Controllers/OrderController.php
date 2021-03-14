<?php

namespace App\Modules\Products\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\BaseApp\Enums\GeneralEnum;
use App\Modules\MoneyProcess\Enums\MoneyProcessEnum;
use App\Modules\Products\Enums\OrdersEnum;
use App\Modules\Products\Models\Order;
use App\Modules\Products\Requests\OrderRequest;
use App\Modules\Users\User;

class OrderController extends Controller {

    public $model;
    public $views;
    public $module,$module_url ,$title;

    public function __construct(Order $model) {
        $this->module = 'orders';
        $this->module_url = '/orders';
        $this->views = 'Products::orders';
        $this->title = trans('app.orders');
        $this->model = $model;
    }

    public function getIndex() {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row']=$this->model;
        $data['row']->is_active = 1;
        $data['page_title'] = trans('app.list') . " " . $this->title;
        $data['page_description'] = trans('orders.page description');
        $data['rows'] = $this->model->getData()->orderBy("id","DESC")->paginate(request('per_page'));
        return view($this->views . '.index', $data);
    }

    public function getView($id) {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row'] = $this->model->findOrFail($id);
        $data['page_title'] = trans('app.view') . " " . $this->title;
        $data['page_description'] =  trans('app.list') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        return view($this->views . '.view', $data);
    }
    public function getEdit($id) {
//        authorize('edit-' . $this->module);
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['page_title'] = trans('app.edit') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        $data['statuses'] = OrdersEnum::ordersStatusesForSelector();
//        return $data['statuses'];
        $data['row'] = $this->model->findOrFail($id);
        return view($this->views . '.edit', $data);
    }

    public function postEdit(OrderRequest $request , $id) {
//        authorize('edit-' . $this->module);
        $row = $this->model->findOrFail($id);
        if ($row->update($request->all())) {
            if ($row->status == GeneralEnum::DELIVERED){
               $user= User::findOrFail($row->user_id);
                // Todo To add this process to transactions db
                createTransaction($row->user_id , $user->available_balance ,
                    $user->available_balance + $row->total_price ,
                    $row->total_price , MoneyProcessEnum::New_ORDER_PRICE);

                $user->increment('available_balance',$row->total_price);
            }
            flash(trans('app.update successfully'))->success();
            return back();
        }
    }

}

<?php

namespace App\Modules\MoneyProcess\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Modules\BaseApp\Enums\GeneralEnum;
use App\Modules\MoneyProcess\Enums\MoneyProcessEnum;
use App\Modules\MoneyProcess\Models\Moneyrequest;
use App\Modules\MoneyProcess\Models\Paymentmethod;
use App\Modules\MoneyProcess\Models\Transaction;
use App\Modules\Users\Enums\UserEnum;
use App\Modules\Users\User;
use Illuminate\Http\Request;


class MoneyRequestsController extends Controller {

    public $model,$views,$module ,$title,$module_url;

    public function __construct(Moneyrequest $model) {
        $this->module = 'Money Request';
        $this->module_url = '/customer-money-request';
        $this->views = 'MoneyProcess::customer.money_request';
        $this->title = trans('app.money requests');
        $this->model = $model;
    }

    public function getIndex() {
//        authorize('view-' . $this->module);
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row']=$this->model;
        $data['row']->is_active = 1;
        $data['page_title'] = trans('app.list') . ' ' . $this->title;
        $data['page_description'] = trans('moneyrequest.your money requests list');
        $data['rows'] = $this->model->getData()->where('user_id',auth()->id())->orderBy('id','desc')->paginate(request('per_page'));
        return view($this->views . '.index' , $data);
    }

    public function getCreate() {
//        authorize('edit-' . $this->module);
        $data['module'] = $this->module;
        $data['views'] = $this->views;
        $data['page_title'] = trans('app.add') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        $data['row'] = $this->model;

        $payments_count = Paymentmethod::where('user_id' , auth()->id())->where('default', 1)->count();
        if (!$payments_count){
            flash(trans('paymentmethods.select default payment method first'));
            return back();
        }
        return view($this->views . '.create', $data);
    }

    public function postCreate(Request $request) {
        $payments_count = Paymentmethod::where('user_id' , auth()->id())->where('default', 1)->count();
        if (!$payments_count){
            flash(trans('paymentmethods.select default payment method first'));
            return back();
        }
//        authorize('edit-' . $this->module);
        if ($request->requested_amount > auth()->user()->available_balance){
            flash(trans('app.insufficient balance'))->error();
            return back();
        }
        $record =[
            'requested_amount'=>$request->requested_amount,
            'user_id' => auth()->id(),
            'available_balance' => auth()->user()->available_balance
        ];
        if ($row = $this->model->create($record)) {
            //Todo to add this to notification (to alert admin that he has new request)
            $description=trans('notifications.notification_new_money_request_txt');
            $to= UserEnum::ADMIN;
            $related_element_id = $row->id;
            $related_element_type = Moneyrequest::class;
            create_new_notification($description , $to , auth()->id() ,$related_element_id ,$related_element_type);
            flash(trans('app.created successfully'))->success();
            return redirect($this->module_url);
        }
    }


    public function getEdit($id) {
//        authorize('edit-' . $this->module);
        $data['module'] = $this->module;
        $data['views'] = $this->views;
        $data['page_title'] = trans('app.edit') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module];
        $data['row'] = $this->model->findOrFail($id);
        if ($data['row']->status == GeneralEnum::TRANSFORMED){
            flash(trans('app.'. GeneralEnum::TRANSFORMED));
            return back();
        }
        return view($this->views . '.edit', $data);
    }

    public function postEdit(Request $request , $id) {
//        authorize('edit-' . $this->module);
        $row = $this->model->findOrFail($id);
        if ($request->requested_amount > auth()->user()->available_balance){
            flash(trans('app.insufficient balance'))->error();
            return back();
        }
        if ($row->update($request->all())) {
            //Todo to add this to notification (to alert admin that he has new request)
            $description=trans('notifications.notification_edit_money_request_txt');
            $to= UserEnum::ADMIN;
            $related_element_id = $row->id;
            $related_element_type = Moneyrequest::class;
            create_new_notification($description , $to , auth()->id() ,$related_element_id ,$related_element_type);

            flash(trans('app.update successfully'))->success();
            return redirect($this->module_url);
        }
    }


    public function getDelete ($id) {
//        authorize('edit-' . $this->module);
        $row = $this->model->findOrFail($id);
        if ($row->delete()) {
            flash(trans('app.deleted successfully'))->success();
            return redirect($this->module_url);
        }
    }


}

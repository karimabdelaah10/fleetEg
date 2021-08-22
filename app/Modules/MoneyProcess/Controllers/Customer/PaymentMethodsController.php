<?php

namespace App\Modules\MoneyProcess\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Modules\BaseApp\Enums\GeneralEnum;
use App\Modules\MoneyProcess\Enums\MoneyProcessEnum;
use App\Modules\MoneyProcess\Models\Moneyrequest;
use App\Modules\MoneyProcess\Models\Paymentmethod;
use App\Modules\MoneyProcess\Models\Transaction;
use App\Modules\Users\User;
use Illuminate\Http\Request;


class PaymentMethodsController extends Controller {

    public $model,$views,$module ,$title,$module_url;

    public function __construct(Paymentmethod $model) {
        $this->module = 'Payment Methods';
        $this->module_url = '/customer-payment-methods';
        $this->views = 'MoneyProcess::customer.payment_methods';
        $this->title = trans('app.payment methods');
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
        $data['page_description'] = trans('paymentmethods.your payment methods list');
        $data['rows'] = $this->model->where('user_id' ,auth()->id())->orderBy('id','desc')->paginate(request('per_page'));
        return view($this->views . '.index' , $data);
    }

    public function getCreate() {
//        authorize('edit-' . $this->module);
        $data['module'] = $this->module;
        $data['views'] = $this->views;
        $data['page_title'] = trans('app.add') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        $data['row'] = $this->model;
        $data['row']->user =auth()->user();
        $data['row']->trans =[
            'method' => trans('paymentmethods.method'),
            'select_method' => trans('paymentmethods.select payment method'),
            'bank_account_number' => trans('paymentmethods.bank_account_number'),
            'e_wallet_number' => trans('paymentmethods.e_wallet_number'),
            'national_id' => trans('paymentmethods.national_id'),
        ];
        return view($this->views . '.create', $data);
    }

    public function postCreate(Request $request) {

        if ($row = $this->model->create($request->all())) {
            flash(trans('app.created successfully'))->success();
            return redirect($this->module_url);
        }
    }

    public function getDelete($id) {
//        authorize('delete-' . $this->module);
        $row = $this->model->findOrFail($id);
        $row->delete();
        flash()->success(trans('app.deleted successfully'));
        return back();
    }

}

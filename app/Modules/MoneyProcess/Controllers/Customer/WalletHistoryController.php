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


class WalletHistoryController extends Controller {

    public $model,$views,$module ,$title,$module_url;

    public function __construct(Transaction $model) {
        $this->module = 'Wallet History';
        $this->module_url = '/customer-wallet-history';
        $this->views = 'MoneyProcess::customer.wallet_history';
        $this->title = trans('app.wallet history');
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
        $data['page_description'] = trans('wallethistory.page description');
        $data['rows'] = $this->model->where('user_id' ,auth()->id())
            ->orderBy('id','desc')->paginate(request('per_page'));
        return view($this->views . '.index' , $data);
    }

}

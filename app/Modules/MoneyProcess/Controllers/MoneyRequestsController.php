<?php

namespace App\Modules\MoneyProcess\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\BaseApp\Enums\GeneralEnum;
use App\Modules\MoneyProcess\Enums\MoneyProcessEnum;
use App\Modules\MoneyProcess\Models\Moneyrequest;
use App\Modules\MoneyProcess\Models\Transaction;
use App\Modules\Users\User;
use Illuminate\Http\Request;


class MoneyRequestsController extends Controller {

    public $model,$views,$module ,$title,$module_url;

    public function __construct(Moneyrequest $model) {
        $this->module = 'Money Request';
        $this->module_url = '/money-request';
        $this->views = 'MoneyProcess::money_request';
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
        $data['page_description'] = trans('moneyrequest.page description');
        $data['rows'] = $this->model->getData()->orderBy('id','desc')->paginate(request('per_page'));
        return view($this->views . '.index' , $data);
    }

    public function getEdit($id) {
//        authorize('edit-' . $this->module);
        $data['module'] = $this->module;
        $data['views'] = $this->views;
        $data['statuses'] = MoneyProcessEnum::moneyRequestStatusesForSelector();
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
        if ($row->update($request->all())) {
            if ($row->status == GeneralEnum::TRANSFORMED){
                $new_available_balance = $row->user->available_balance - $row->requested_amount;
                // Todo To add this process to transactions db
                createTransaction($row->user_id , $row->user->available_balance , $new_available_balance ,$row->requested_amount ,MoneyProcessEnum::MONEY_REQUEST);
                $row->user->update([
                    'available_balance' =>$new_available_balance
                ]);

            }
            flash(trans('app.update successfully'))->success();
            return redirect($this->module_url);
        }
    }


}

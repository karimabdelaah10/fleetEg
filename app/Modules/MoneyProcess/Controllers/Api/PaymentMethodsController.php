<?php

namespace App\Modules\MoneyProcess\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\BaseApp\Enums\GeneralEnum;
use App\Modules\MoneyProcess\Enums\MoneyProcessEnum;
use App\Modules\MoneyProcess\Enums\PaymentMethodEnum;
use App\Modules\MoneyProcess\Models\Moneyrequest;
use App\Modules\MoneyProcess\Models\Paymentmethod;
use App\Modules\MoneyProcess\Models\Transaction;
use App\Modules\Products\Enums\OrdersEnum;
use App\Modules\Products\Models\Order;
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
    public function getCreateMethods($user_id){

        $data=[];
        try {
            $data=[];
            $used_methods =Paymentmethod::where('user_id' , $user_id)->pluck('type')->toArray();
            $all_methods =PaymentMethodEnum::paymentMethodsTypesSelectorApi();
            if (!empty($used_methods)){
                if (!empty($all_methods)){
                    foreach ($all_methods as $method){
                        if (!in_array($method['id'] , $used_methods)){
                            array_push($data , $method);
                        }
                    }
                }
            }else{
                $data = $all_methods;
            }
            return custom_response(200 ,$data , '' ,[]);
        }
        catch(\Exception $e) {
            $title = trans('app.wrong action');
            $message = trans('app.wrong action message');
            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
                $message .= '    in ' . $e->getFile();
                $message .= '    line ' . $e->getLine();
            }
            return custom_response(500, $data,  $title. '   '.$message, []);
        }
    }

    public function updateDefaultMethod($method_id)
    {
        $data=[];
        try {
            $data  = Paymentmethod::findOrFail($method_id);
            Paymentmethod::where('user_id' , $data->user_id)->update([
                'default' =>0
            ]);
            $data->update([
                'default' =>1
            ]);
            return custom_response(200 ,$data , '' ,[]);
        }
        catch(\Exception $e) {
            $title = trans('app.wrong action');
            $message = trans('app.wrong action message');
            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
                $message .= '    in ' . $e->getFile();
                $message .= '    line ' . $e->getLine();
            }
            return custom_response(500, $data,  $title. '   '.$message, []);
        }
    }
}

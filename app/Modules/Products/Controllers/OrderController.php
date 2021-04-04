<?php

namespace App\Modules\Products\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\BaseApp\Enums\GeneralEnum;
use App\Modules\MoneyProcess\Enums\MoneyProcessEnum;
use App\Modules\Products\Enums\OrdersEnum;
use App\Modules\Products\Exports\OrdersExports;
use App\Modules\Products\Imports\OrdersImport;
use App\Modules\Products\Models\Order;
use App\Modules\Products\Models\Productspecvalue;
use App\Modules\Products\Requests\OrderRequest;
use App\Modules\Users\Enums\UserEnum;
use App\Modules\Users\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        $data['rows'] = $this->model->whereIn('id',get_product_admin_orders())
            ->Filtered()
            ->orderBy("id","DESC")
            ->paginate(request('per_page'));
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
        if (in_array($data['row']->status ,OrdersEnum::ordersFinalsStatuses())){
            return back();
        }
        return view($this->views . '.view', $data);
    }
    public function getEdit($id) {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['page_title'] = trans('app.edit') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        $data['statuses'] = OrdersEnum::ordersStatusesForSelector();
        $data['row'] = $this->model->findOrFail($id);
        return view($this->views . '.edit', $data);
    }

    public function postEdit(OrderRequest $request , $id) {
        $row = $this->model->findOrFail($id);
        if ($row->update($request->all())) {
            if ($row->status == GeneralEnum::DELIVERED){
               $user= User::findOrFail($row->user_id);
                // Todo To add this process to transactions db
                createTransaction($row->user_id , $user->available_balance ,
                    $user->available_balance + $row->total_commission ,
                    $row->total_commission , MoneyProcessEnum::New_ORDER_PRICE);

                //Todo to send notification to admin about order delivered
                $description=trans('notifications.notification_order_delivered_txt');
                $to= UserEnum::CUSTOMER;
                $related_element_id = $id;
                $related_element_type = Order::class;
                create_new_notification($description , $to , $row->user_id ,$related_element_id ,$related_element_type);
                $user->increment('available_balance',$row->total_commission);
            }
            elseif ($row->status == GeneralEnum::NOT_SERIOUS || $row->status == GeneralEnum::RETURNED_TO_STOCK){
                //Todo to increase amount again
                if (count($row->orderProducts)){
                    foreach ($row->orderProducts as $product){
                        $product_spec_value=Productspecvalue::findOrFail($product->pivot->product_spec_value_id);
                        $product_spec_value->increment('stock' , $product->amount);
                    }
                }
            }
            flash(trans('app.update successfully'))->success();
            return back();
        }
    }

    public function export()
    {
        $data = $this->model->whereIn('id',get_product_admin_orders())
            ->Filtered()
            ->orderBy("id","DESC")->get();
        ob_end_clean(); ob_start();                            // Fix In Export File
        return Excel::download(new OrdersExports($data),
            now().'orders.xlsx');
   }

    public function getImportPage()
    {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row'] = $this->model;
        $data['page_title'] = trans('app.view') . " " . $this->title;
        $data['page_description'] =  trans('app.list') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        return view($this->views . '.import', $data);
    }
    public function postImportPage(Request $request)
    {
        Excel::import(new OrdersImport(), $request->file);
        flash(trans('app.update successfully'))->success();
        return back();
    }
}

<?php

namespace App\Modules\Products\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Modules\BaseApp\Enums\GeneralEnum;
use App\Modules\MoneyProcess\Enums\MoneyProcessEnum;
use App\Modules\Products\Controllers\Api\CartsApiController;
use App\Modules\Products\Enums\OrdersEnum;
use App\Modules\Products\Models\Cart;
use App\Modules\Products\Models\Order;
use App\Modules\Products\Requests\OrderRequest;
use App\Modules\Users\User;

class OrderController extends Controller {

    public $model;
    public $views;
    public $module,$module_url ,$title;

    public function __construct(Order $model) {
        $this->module = 'orders';
        $this->module_url = '/customer-orders/';
        $this->views = 'Products::customer.orders';
        $this->title = trans('app.orders');
        $this->model = $model;
    }

    public function getIndex(){
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['rows'] = $this->model->where('user_id' , auth()->id())
            ->orderBy('id' , 'desc')->paginate(request('per_page'));
        $data['page_title'] = trans('app.view') . " " . $this->title;
        $data['page_description'] =  trans('app.list') . " " . $this->title;
//        $data['breadcrumb'] = [$this->title => $this->module_url];
        return view($this->views . '.index', $data);
    }
    public function getView($id) {
        $data['module'] = $this->module;
        $data['module_url'] = $this->module_url;
        $data['views'] = $this->views;
        $data['row'] = $this->model->findOrFail($id);
        if ($data['row']->user_id != auth()->id()){
            return back();
        }
        $data['page_title'] = trans('app.view') . " " . $this->title;
        $data['page_description'] =  trans('app.list') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => $this->module_url];
        return view($this->views . '.view', $data);
    }

    public function getCheckout()
    {
        $data['breadcrumb'] = [
            $this->title => $this->module_url,
        ];
        $data['row']= $this->model;
        $data['row']->user=auth()->user();
        $data['row']->trans=[
            'orders_cart' =>trans('orders.cart'),
            'orders_cart_products' =>trans('orders.cart_products'),
            'orders_customer_details' =>trans('orders.customer_details'),
            'remove_product_from_cart' =>trans('orders.remove_product_from_cart'),
            'amount' =>trans('orders.amount'),
            'product_price' =>trans('orders.product_price'),
            'product_commission' =>trans('products.commission'),
            'price_details' =>trans('orders.price_details'),
            'total_price' =>trans('orders.total_price'),
            'total_product_price' =>trans('orders.total_product_price'),
            'product_discount' =>trans('orders.product_discount'),
            'complete_order' =>trans('orders.complete_order'),
            'customer_details' =>trans('orders.customer_details'),
            'customer_name' =>trans('orders.customer_name'),
            'customer_mobile_number' =>trans('orders.customer_mobile_number'),
            'customer_area' =>trans('orders.customer_area'),
            'governorate' =>trans('orders.governorate'),
            'customer_address' =>trans('orders.customer_address'),
            'shipping_notes' =>trans('orders.shipping_notes'),
            'checkout' =>trans('carts.checkout'),
            'shipping_coast' =>trans('governorate.shipping_coast'),
            'order_saved_title' =>trans('orders.order_saved_title'),
            'order_saved_message' =>trans('orders.order_saved_message'),
            'just_now' => trans('app.just_now'),
        ];
        if(!Cart::where('user_id' , auth()->id())->count()){
            flash(trans('orders.empty_cart_error_message'))->error();
            return redirect('/customer-orders/');
        }
        $data['page_title'] = trans('orders.check_out_page_title');
        return view($this->views . '.checkout' , $data);
    }


}

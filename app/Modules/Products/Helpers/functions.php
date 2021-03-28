<?php

use App\Modules\BaseApp\Enums\GeneralEnum;
use App\Modules\Products\Models\Order;
use App\Modules\Products\Models\Orderproduct;
use App\Modules\Users\Enums\AdminEnum;
use App\Modules\Users\Enums\UserEnum;
use App\Modules\Users\User;

if (! function_exists('get_status_for_blade')) {
    function get_status_for_blade($status)
    {
     switch ($status){
         case GeneralEnum::PENDING :
             return '<span class="badge badge-pill badge-danger mr-1">'.trans('app.'.GeneralEnum::PENDING).'</span>';
             break;

         case GeneralEnum::UNDER_REVIEW :
             return '<span class="badge badge-pill badge-warning mr-1">'.trans('app.'.GeneralEnum::UNDER_REVIEW).'</span>';
             break;

         case GeneralEnum::IN_STOCK :
             return '<span class="badge badge-pill badge-dark mr-1">'.trans('app.'.GeneralEnum::IN_STOCK).'</span>';
             break;

         case GeneralEnum::WITH_SHIPPING_COMPANY :
             return '<span class="badge badge-pill badge-light-danger mr-1">'.trans('app.'.GeneralEnum::WITH_SHIPPING_COMPANY).'</span>';
             break;

         default:
             return '<span class="badge badge-pill badge-success mr-1">'.trans('app.'.GeneralEnum::DELIVERED).'</span>';
        }
    }
}


if (! function_exists('get_product_admin_orders')) {
    function get_product_admin_orders()
    {
        $user = User::findOrFail(auth()->id());
        if ($user->getRawOriginal('type') == UserEnum::ADMIN &&
            $user->getRawOriginal('admin_type') == AdminEnum::PRODUCT_ADMIN){
            $product_ids = $user->products->pluck('id');
            $order_ids=Orderproduct::whereIn('product_id',$product_ids)
                ->pluck('order_id')
            ->unique();
            return $order_ids;
        }elseif($user->getRawOriginal('type') == UserEnum::SUPER_ADMIN){
            return Order::all()->pluck('id');
        }
    }
}



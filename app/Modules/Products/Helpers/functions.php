<?php

use App\Modules\BaseApp\Enums\GeneralEnum;

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





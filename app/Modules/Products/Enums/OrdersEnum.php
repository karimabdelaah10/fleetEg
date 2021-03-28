<?php

namespace App\Modules\Products\Enums;

use App\Modules\BaseApp\Enums\GeneralEnum;

abstract class OrdersEnum
{

    public static function ordersFinalsStatuses()
    {
        return [
            GeneralEnum::NOT_SERIOUS,
            GeneralEnum::RETURNED_TO_STOCK,
            GeneralEnum::DELIVERED
        ];
    }

    public static function ordersStatuses()
    {
        return [
            GeneralEnum::UNDER_REVIEW,                 // -- from stock
            GeneralEnum::WITH_SHIPPING_COMPANY,
            GeneralEnum::NO_ANSWER,
            GeneralEnum::NOT_SERIOUS,
            GeneralEnum::REFUSED,
            GeneralEnum::RETURNED_TO_STOCK,
            GeneralEnum::DELIVERED
        ];
    }
    public static function ordersStatusesForSelector()
    {
        return [
            GeneralEnum::UNDER_REVIEW => trans('app.'.GeneralEnum::UNDER_REVIEW),
            GeneralEnum::WITH_SHIPPING_COMPANY  => trans('app.'.GeneralEnum::WITH_SHIPPING_COMPANY),
            GeneralEnum::NO_ANSWER  => trans('app.'.GeneralEnum::NO_ANSWER),
            GeneralEnum::NOT_SERIOUS  => trans('app.'.GeneralEnum::NOT_SERIOUS),
            GeneralEnum::REFUSED  => trans('app.'.GeneralEnum::REFUSED),
            GeneralEnum::RETURNED_TO_STOCK  => trans('app.'.GeneralEnum::RETURNED_TO_STOCK),
            GeneralEnum::DELIVERED  => trans('app.'.GeneralEnum::DELIVERED)
        ];
    }
}


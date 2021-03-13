<?php

namespace App\Modules\Products\Enums;

use App\Modules\BaseApp\Enums\GeneralEnum;

abstract class OrdersEnum
{


    public static function ordersStatuses()
    {
        return [GeneralEnum::PENDING, GeneralEnum::UNDER_REVIEW ,
            GeneralEnum::WITH_SHIPPING_COMPANY,GeneralEnum::IN_STOCK,GeneralEnum::DELIVERED
        ];
    }
    public static function ordersStatusesForSelector()
    {
        return [GeneralEnum::PENDING  => trans('app.'.GeneralEnum::PENDING),
            GeneralEnum::UNDER_REVIEW => trans('app.'.GeneralEnum::UNDER_REVIEW),
            GeneralEnum::IN_STOCK  => trans('app.'.GeneralEnum::IN_STOCK),
            GeneralEnum::WITH_SHIPPING_COMPANY  => trans('app.'.GeneralEnum::WITH_SHIPPING_COMPANY),
            GeneralEnum::DELIVERED  => trans('app.'.GeneralEnum::DELIVERED)
        ];
    }
}

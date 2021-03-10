<?php

namespace App\Modules\Products\Enums;

use App\Modules\BaseApp\Enums\GeneralEnum;

abstract class OrdersEnum
{


    public static function ordersStatuses()
    {
        return [GeneralEnum::PENDING, GeneralEnum::UNDER_REVIEW ,
            GeneralEnum::WITH_SHIPPING_COMPANY,GeneralEnum::IN_STOCK
        ];
    }
}

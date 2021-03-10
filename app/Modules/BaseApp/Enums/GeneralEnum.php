<?php

namespace App\Modules\BaseApp\Enums;

abstract class GeneralEnum
{
    const PENDING = 'pending',
          UNDER_REVIEW='under_review',
          TRANSFORMED='transformed',
          WITH_SHIPPING_COMPANY='with_shipping_company',
          DELIVERED ='delivered',
          IN_STOCK='in_stock'
    ;

}

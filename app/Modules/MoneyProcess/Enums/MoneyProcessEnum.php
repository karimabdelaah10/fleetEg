<?php

namespace App\Modules\MoneyProcess\Enums;

use App\Modules\BaseApp\Enums\GeneralEnum;

abstract class MoneyProcessEnum
{

    const MONEY_REQUEST = 'money request';
    public static function moneyRequestStatuses()
    {
        return [GeneralEnum::PENDING, GeneralEnum::UNDER_REVIEW , GeneralEnum::TRANSFORMED];
    }
    public static function moneyRequestStatusesForSelector()
    {
        return [GeneralEnum::PENDING  => trans('app.'.GeneralEnum::PENDING),
            GeneralEnum::UNDER_REVIEW => trans('app.'.GeneralEnum::UNDER_REVIEW),
            GeneralEnum::TRANSFORMED  => trans('app.'.GeneralEnum::TRANSFORMED)];
    }
}

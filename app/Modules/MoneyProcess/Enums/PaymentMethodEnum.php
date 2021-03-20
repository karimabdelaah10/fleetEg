<?php

namespace App\Modules\MoneyProcess\Enums;

abstract class PaymentMethodEnum
{

    const BANK_ACCOUNT = 'bank_account',
            BANK_ACCOUNT_NUMBER='bank_account_number',
        E_WALLET = 'e_wallet',
        E_WALLET_NUMBER='e_wallet_number',
        POST = 'post',
        NATIONAL_ID='national_id',
        CASH = 'cash'
;
    public static function paymentMethodsTypes(): array
    {
        return [self::BANK_ACCOUNT,
            self::E_WALLET ,
            self::POST ,
            self::CASH ,
        ];
    }
    public static function paymentMethodsTypesSelector(): array
    {
        return [
            [
                self::BANK_ACCOUNT  => trans('paymentmethods.'.self::BANK_ACCOUNT)
            ],
            [
            self::E_WALLET => trans('paymentmethods.'.self::E_WALLET),
            ],
            [
            self::POST  => trans('paymentmethods.'.self::POST),
            ],
            [
            self::CASH  => trans('paymentmethods.'.self::CASH)
            ]
        ];
    }
    public static function paymentMethodsTypesSelectorApi(): array
    {
        return [
            [
                'id' =>self::BANK_ACCOUNT,
                'title'=> trans('paymentmethods.'.self::BANK_ACCOUNT)
            ],
            [
                'id'=>self::E_WALLET ,
                'title'=> trans('paymentmethods.'.self::E_WALLET),
            ],
            [
                'id'=> self::POST,
                'title'=> trans('paymentmethods.'.self::POST),
            ],
            [
                'id'=>self::CASH,
                'title'=> trans('paymentmethods.'.self::CASH)
            ]
        ];
    }
}

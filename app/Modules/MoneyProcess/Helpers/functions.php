<?php

use App\Modules\BaseApp\Enums\GeneralEnum;
use App\Modules\MoneyProcess\Enums\MoneyProcessEnum;
use App\Modules\MoneyProcess\Enums\PaymentMethodEnum;
use App\Modules\MoneyProcess\Models\Transaction;

if (! function_exists('getMethodInfo')) {
    function getMethodInfo($element)
    {
        $value='';
        switch ($element->type) {
            case PaymentMethodEnum::BANK_ACCOUNT :
                $value = '<span class="badge badge-pill badge-warning mr-1">'
                    .trans('paymentmethods.'.PaymentMethodEnum::BANK_ACCOUNT_NUMBER).'</span> : '.@$element->bank_account_number ;
                break;
            case PaymentMethodEnum::POST :
                $value = '<span class="badge badge-pill badge-warning mr-1">'
                    .trans('paymentmethods.'.PaymentMethodEnum::NATIONAL_ID).'</span> : '.@$element->national_id ;
                break;
                case PaymentMethodEnum::E_WALLET :
                    $value = '<span class="badge badge-pill badge-warning mr-1">'
                        .trans('paymentmethods.'.PaymentMethodEnum::E_WALLET_NUMBER).'</span> : '.@$element->e_wallet_number ;
                    break;
            default:
                $value = '' ;
        }
        return $value;

    }
}
if (! function_exists('getRequestStatus')) {
    function getRequestStatus($status)
    {
        switch ($status) {
            case GeneralEnum::PENDING :
                return '<span class="badge badge-pill badge-warning mr-1">'.trans('app.'.GeneralEnum::PENDING).'</span>';
                break;
            case GeneralEnum::UNDER_REVIEW:
                return '<span class="badge badge-pill badge-primary mr-1">'.trans('app.'.GeneralEnum::UNDER_REVIEW).'</span>';
                break;
            default:
                return '<span class="badge badge-pill badge-success mr-1">'.trans('app.'.GeneralEnum::TRANSFORMED).'</span>';
        }

    }
}
if (! function_exists('createTransaction')) {
    function createTransaction($user_id ,$available_balance_before_transaction , $available_balance_after_transaction , $amount ,$transaction_type ){
        Transaction::create([
            'user_id'=>$user_id,
            'available_balance_before_transaction' =>$available_balance_before_transaction,
            'available_balance_after_transaction'  =>$available_balance_after_transaction,
            'amount'                               =>$amount,
            'transaction_type' => $transaction_type
        ]);

    }
}

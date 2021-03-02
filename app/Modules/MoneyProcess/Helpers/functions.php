<?php

use App\Modules\BaseApp\Enums\GeneralEnum;
use App\Modules\MoneyProcess\Enums\MoneyProcessEnum;
use App\Modules\MoneyProcess\Models\Transaction;

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
if (! function_exists('getRequestStatus')) {
    function createTransaction($user_id ,$available_balance_before_transaction , $available_balance_after_transaction , $amount ,$transaction_type ){
        Transaction::create([
            'user_id'=>$row->user_id,
            'available_balance_before_transaction' =>$row->user->available_balance,
            'available_balance_after_transaction'  =>$new_available_balance,
            'amount'                               =>$row->requested_amount,
            'transaction_type' => MoneyProcessEnum::MONEY_REQUEST
        ]);

    }
}

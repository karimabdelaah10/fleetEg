<?php

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect',
        'localeViewPath' ,'auth','IsCustomer']
], function () {
    Route::group(['prefix' => 'customer-money-request' , 'as' => 'customer-money-request.'], function () {
        Route::get('/', 'Customer\MoneyRequestsController@getIndex');

        Route::get('/create-request/', 'Customer\MoneyRequestsController@getCreate');
        Route::post('/create-request/', 'Customer\MoneyRequestsController@postCreate');

        Route::get('/edit/{id}', 'Customer\MoneyRequestsController@getEdit');
        Route::post('/edit/{id}', 'Customer\MoneyRequestsController@postEdit');

        Route::get('/delete/{id}', 'Customer\MoneyRequestsController@getDelete')->name('delete');

    });

    Route::group(['prefix' => 'customer-payment-methods' , 'as' => 'customer-payment-methods.'], function () {
        Route::get('/', 'Customer\PaymentMethodsController@getIndex');
        Route::get('/create/', 'Customer\PaymentMethodsController@getCreate');
        Route::post('/create/', 'Customer\PaymentMethodsController@postCreate');

        Route::get('/edit/{id}', 'Customer\PaymentMethodsController@getEdit');
        Route::post('/edit/{id}', 'Customer\PaymentMethodsController@postEdit');

        Route::get('/delete/{id}', 'Customer\PaymentMethodsController@getDelete')->name('delete');

    });

    Route::group(['prefix' => 'customer-wallet-history' , 'as' => 'customer-wallet-history.'], function () {
        Route::get('/', 'Customer\WalletHistoryController@getIndex');
    });
});

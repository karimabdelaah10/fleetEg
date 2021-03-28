<?php

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect',
        'localeViewPath' ,'auth','IsAdmin','IsFinancialAdmin']
], function () {
    Route::group(['prefix' => 'money-request' , 'as' => 'money-request.'], function () {
        Route::get('/', 'MoneyRequestsController@getIndex');

        Route::get('/edit/{id}', 'MoneyRequestsController@getEdit');
        Route::post('/edit/{id}', 'MoneyRequestsController@postEdit');
    });
});

<?php
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect',
        'localeViewPath' ,'auth','IsCustomer']
], function () {
    Route::group(['prefix' => 'products' , 'as' => 'products.'], function () {
        Route::get('/all', 'Customer\ProductController@getIndex');
    });
});

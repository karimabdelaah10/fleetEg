<?php
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect',
        'localeViewPath' ,'auth','IsCustomer']
], function () {
    Route::group(['prefix' => 'product' , 'as' => 'product.'], function () {
        Route::get('/all', 'Customer\ProductController@getIndex');
        Route::get('/view/{id}', 'Customer\ProductController@getView');
        Route::get('/favourite-list', 'Customer\ProductController@getFavouriteProducts');
    });

    Route::group(['prefix' => 'customer-orders' , 'as' => 'customer-orders.'], function () {
        Route::get('/', 'Customer\OrderController@getIndex');
        Route::get('/checkout', 'Customer\OrderController@getCheckout');
    });

});

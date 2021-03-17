<?php
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect',
        'localeViewPath' ,'auth','IsCustomer']
], function () {
    Route::group(['prefix' => 'product' , 'as' => 'product.'], function () {
        Route::get('/all', 'Customer\ProductController@getIndex');
        Route::get('/favourite-list', 'Customer\ProductController@getFavouriteProducts');
    });
});

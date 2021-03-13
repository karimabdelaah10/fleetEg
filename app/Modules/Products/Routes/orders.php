<?php
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'auth']
], function () {
    Route::group(['prefix' => 'orders' , 'as' => 'orders.'], function () {
        Route::get('/', 'OrderController@getIndex');

        Route::get('/edit/{id}', 'OrderController@getEdit');
        Route::put('/edit/{id}', 'OrderController@postEdit');

        Route::get('/view/{id}', 'OrderController@getView');
    });
});

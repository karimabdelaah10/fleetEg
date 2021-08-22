<?php
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect',
        'localeViewPath' ,'auth','IsAdmin','IsProductAdmin']
], function () {
    Route::group(['prefix' => 'orders' , 'as' => 'orders.'], function () {
        Route::get('/', 'OrderController@getIndex');

        Route::get('/edit/{id}', 'OrderController@getEdit')->middleware('ProductAdminOrdersIds');
        Route::post('/edit/{id}', 'OrderController@postEdit')->middleware('ProductAdminOrdersIds');

        Route::get('/view/{id}', 'OrderController@getView')->middleware('ProductAdminOrdersIds');

        Route::get('/export', 'OrderController@export');
        Route::get('/import', 'OrderController@getImportPage');
        Route::post('/import', 'OrderController@postImportPage');
    });
});

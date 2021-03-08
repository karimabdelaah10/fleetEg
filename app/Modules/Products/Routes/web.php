<?php
include_once ('categories.php');
include_once ('specs.php');
include_once ('specsvalues.php');
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'auth']
], function () {
    Route::group(['prefix' => 'products' , 'as' => 'products.'], function () {
        Route::get('/', 'ProductController@getIndex');

        Route::get('/create', 'ProductController@getCreate');
        Route::post('/create', 'ProductController@postCreate');
//
        Route::get('/edit/{id}', 'ProductController@getEdit');
        Route::put('/edit/{id}', 'ProductController@postEdit');
//
//        Route::get('/view/{id}', 'ProductController@getView');
        Route::get('/delete/{id}', 'ProductController@getDelete')->name('delete');
    });
});

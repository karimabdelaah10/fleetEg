<?php
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect',
        'localeViewPath' ,'auth','IsAdmin','IsSuperAdmin']
], function () {
    Route::group(['prefix' => 'categories' , 'as' => 'categories.'], function () {
        Route::get('/', 'CategoryController@getIndex');

        Route::get('/create', 'CategoryController@getCreate');
        Route::post('/create', 'CategoryController@postCreate');

        Route::get('/edit/{id}', 'CategoryController@getEdit');
        Route::post('/edit/{id}', 'CategoryController@postEdit');

        Route::get('/view/{id}', 'CategoryController@getView');
        Route::get('/delete/{id}', 'CategoryController@getDelete')->name('delete');
    });
});

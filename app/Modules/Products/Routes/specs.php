<?php
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect',
        'localeViewPath' ,'auth','IsAdmin']
], function () {
    Route::group(['prefix' => 'specs' , 'as' => 'specs.'], function () {
        Route::get('/', 'SpecsController@getIndex');

        Route::get('/create', 'SpecsController@getCreate');
        Route::post('/create', 'SpecsController@postCreate');

        Route::get('/edit/{id}', 'SpecsController@getEdit');
        Route::put('/edit/{id}', 'SpecsController@postEdit');

        Route::get('/view/{id}', 'SpecsController@getView');
        Route::get('/delete/{id}', 'SpecsController@getDelete')->name('delete');
    });
});

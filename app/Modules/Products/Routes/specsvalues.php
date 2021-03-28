<?php
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect',
        'localeViewPath' ,'auth','IsAdmin','IsSuperAdmin']
], function () {
    Route::group(['prefix' => 'specvalues' , 'as' => 'specvalues.'], function () {
        Route::get('/', 'SpecsValuesController@getIndex');

        Route::get('/create', 'SpecsValuesController@getCreate');
        Route::post('/create', 'SpecsValuesController@postCreate');

        Route::get('/edit/{id}', 'SpecsValuesController@getEdit');
        Route::post('/edit/{id}', 'SpecsValuesController@postEdit');

        Route::get('/view/{id}', 'SpecsValuesController@getView');
        Route::get('/delete/{id}', 'SpecsValuesController@getDelete')->name('delete');
    });
});

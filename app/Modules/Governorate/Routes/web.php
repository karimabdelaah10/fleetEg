<?php
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect',
        'localeViewPath' ,'auth','IsAdmin']
], function () {
    Route::group(['prefix' => 'governorates', 'as' => 'governorates.'], function () {
        Route::get('/', 'GovernorateController@getIndex');

        Route::get('/create', 'GovernorateController@getCreate');
        Route::post('/create', 'GovernorateController@postCreate');

        Route::get('/edit/{id}', 'GovernorateController@getEdit');
        Route::put('/edit/{id}', 'GovernorateController@postEdit');

//    Route::get('/view/{id}', 'GovernorateController@getView');
        Route::get('/delete/{id}', 'GovernorateController@getDelete')->name('delete');
    });
});

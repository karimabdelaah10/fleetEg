<?php

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'auth']
], function () {
    Route::group(['prefix' => 'admins'], function () {
        Route::get('/', '\App\Modules\Users\Controllers\AdminsController@getIndex');

        Route::get('/create', '\App\Modules\Users\Controllers\AdminsController@getCreate');
        Route::post('/create', '\App\Modules\Users\Controllers\AdminsController@postCreate')->name('admins.create');

        Route::get('/edit/{id}', '\App\Modules\Users\Controllers\AdminsController@getEdit');
        Route::put('/edit/{id}', '\App\Modules\Users\Controllers\AdminsController@postEdit')
            ->name('users.putUser');

        Route::get('/view/{id}', '\App\Modules\Users\Controllers\AdminsController@getView')
            ->name('users.view');

        Route::get('/delete/{id}', '\App\Modules\Users\Controllers\AdminsController@getDelete')
            ->name('users.delete');
    });
});

<?php

include_once 'profile.php';
include_once 'admin.php';
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'auth']
], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', '\App\Modules\Users\Controllers\UsersController@getIndex')->name('users');

        Route::get('/create', '\App\Modules\Users\Controllers\UsersController@getCreate');
        Route::post('/create', '\App\Modules\Users\Controllers\UsersController@postCreate')->name('users.create');

        Route::get('/edit/{id}', '\App\Modules\Users\Controllers\UsersController@getEdit');
        Route::put('/edit/{id}', '\App\Modules\Users\Controllers\UsersController@postEdit')
            ->name('users.putUser');

        Route::get('/view/{id}', '\App\Modules\Users\Controllers\UsersController@getView')
            ->name('users.view');

        Route::get('/delete/{id}', '\App\Modules\Users\Controllers\UsersController@getDelete')
            ->name('users.delete');
    });
});

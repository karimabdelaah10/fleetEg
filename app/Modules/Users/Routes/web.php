<?php

include_once 'profile.php';
include_once 'admin.php';
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect',
        'localeViewPath' ,'auth','IsAdmin']
], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', '\App\Modules\Users\Controllers\UsersController@getIndex')->name('users');

        Route::get('/verify_all', '\App\Modules\Users\Controllers\UsersController@verifyAll');

        Route::get('/create', '\App\Modules\Users\Controllers\UsersController@getCreate');
        Route::post('/create', '\App\Modules\Users\Controllers\UsersController@postCreate')->name('users.create');

        Route::get('/edit/{id}', '\App\Modules\Users\Controllers\UsersController@getEdit');
        Route::put('/edit/{id}', '\App\Modules\Users\Controllers\UsersController@postEdit')
            ->name('users.putUser');

        Route::get('/view/{id}', '\App\Modules\Users\Controllers\UsersController@getView')
            ->name('users.view');

        Route::get('/delete/{id}', '\App\Modules\Users\Controllers\UsersController@getDelete')
            ->name('users.delete');

        Route::get('/money-requests/{id}', '\App\Modules\Users\Controllers\UsersController@getMoneyRequests');
        Route::get('/orders/{user_id}', '\App\Modules\Users\Controllers\UsersController@getOrders');
        Route::get('/order/{order_id}', '\App\Modules\Users\Controllers\UsersController@getOrderDetails');

    });
});

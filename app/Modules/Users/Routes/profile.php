<?php

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'auth']
], function () {
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'ProfileController@getIndex')->name('profile.index');

        Route::get('/edit', 'ProfileController@getEdit')->name('profile.edit');
        Route::post('/edit', 'ProfileController@postEdit')->name('profile.edit');
        Route::post('/change-password', 'ProfileController@changePassword')->name('profile.changePassword');

    });
});

<?php
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'auth']
], function () {
Route::get('/', 'DashboardController@getIndex')->name('dashboard');
    });

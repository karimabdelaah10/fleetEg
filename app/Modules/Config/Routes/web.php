
<?php

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'auth']
], function () {
    Route::group(['prefix' => 'configs' , 'as' => 'configs.'], function () {
        Route::get('/edit', 'ConfigController@getEdit');
        Route::put('/edit', 'ConfigController@postEdit');
  });
});

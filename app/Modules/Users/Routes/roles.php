<?php

Route::group(['prefix' => 'roles'], function () {
    Route::get('/', 'RolesController@getIndex');

    Route::get('/create', 'RolesController@getCreate');
    Route::post('/create', 'RolesController@postCreate');

    Route::get('/edit/{id}', 'RolesController@getEdit');
    Route::put('/edit/{id}', 'RolesController@postEdit');

    Route::get('/view/{id}', 'RolesController@getView');
    Route::get('/delete/{id}', 'RolesController@getDelete');
    Route::get('/export', 'RolesController@getExport');
});

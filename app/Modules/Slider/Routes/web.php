<?php
Route::group(['middleware'=>'auth','prefix' => 'slider' , 'as' => 'slider.'], function () {
    Route::get('/', 'SliderController@getIndex');

    Route::post('/create', 'SliderController@postCreate');

    Route::get('/edit/{id}', 'SliderController@getEdit');
    Route::put('/edit/{id}', 'SliderController@postEdit');

//    Route::get('/view/{id}', 'SliderController@getView');
    Route::get('/delete/{id}', 'SliderController@getDelete')->name('delete');
});

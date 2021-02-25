<?php

Route::group(['prefix' => 'sliders' , 'as' => 'sliders.'], function () {
    Route::get('/', 'Api\SliderApiController@index')->name('sliders.listAll');
});

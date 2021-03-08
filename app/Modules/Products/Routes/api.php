<?php


    Route::group(['prefix' => 'specs' , 'as' => 'specs.'], function () {
        Route::get('/', 'Api\SpecsApiController@index');
        Route::get('/specs_values/{id}', 'Api\SpecsApiController@getSpecsValues');
    });

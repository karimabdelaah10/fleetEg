<?php
Route::group(['prefix' => 'specs' , 'as' => 'specs.'], function () {
    Route::get('/', 'Api\SpecsApiController@index');
    Route::get('/specs_values/{id}', 'Api\SpecsApiController@getSpecsValues');
});

Route::group([
//    'middleware'=>'auth',
    'prefix' => 'products' , 'as' => 'products.'], function () {
    Route::get('/', 'Api\ProductsApiController@getFilteredProducts');
});

<?php
Route::group(['prefix' => 'specs' , 'as' => 'specs.'], function () {
    Route::get('/', 'Api\SpecsApiController@index');
    Route::get('/specs_values/{id}', 'Api\SpecsApiController@getSpecsValues');
});

Route::group([
//    'middleware'=>'auth',
    'prefix' => 'products' , 'as' => 'products.'], function () {
    Route::get('/{user_id}', 'Api\ProductsApiController@getFilteredProducts');
    Route::get('/view/{product_id}', 'Api\ProductsApiController@getView');
    Route::get('/inner-spec-values/{parent_spec_value_id}', 'Api\ProductsApiController@getInnerSpecValues');
    Route::get('/get-favourite-products/{user_id}', 'Api\ProductsApiController@getFavouriteProducts');
    Route::post('/fav', 'Api\ProductsApiController@favProduct');
});

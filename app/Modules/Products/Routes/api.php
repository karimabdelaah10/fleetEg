<?php
Route::group(['prefix' => 'specs' , 'as' => 'specs.'], function () {
    Route::get('/', 'Api\SpecsApiController@index');
    Route::get('/specs_values/{id}', 'Api\SpecsApiController@getSpecsValues');
});
Route::group(['prefix' => 'carts' , 'as' => 'carts.'], function () {
    Route::get('/get-user-carts/{user_id}', 'Api\CartsApiController@index');
    Route::get('/delete/{user_id}', 'Api\CartsApiController@delete');
    Route::post('/checkout', 'Api\CartsApiController@checkout');
    Route::get('/orders_number/{user_id}', 'Api\CartsApiController@getOrdersNumbers');
});

Route::group([
    'prefix' => 'products' , 'as' => 'products.'], function () {
    Route::get('get-filtered-products/{user_id}', 'Api\ProductsApiController@getFilteredProducts');
    Route::get('/view/{product_id}', 'Api\ProductsApiController@getView');
    Route::get('/inner-spec-values/{parent_spec_value_id}', 'Api\ProductsApiController@getInnerSpecValues');
    Route::get('/get-favourite-products/{user_id}', 'Api\ProductsApiController@getFavouriteProducts');
    Route::post('/fav', 'Api\ProductsApiController@favProduct');
    Route::post('/add-to-cart/', 'Api\ProductsApiController@addProductToCart');
    Route::get('/add-to-cart/', 'Api\ProductsApiController@addProductToCart');
});

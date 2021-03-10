<?php
include_once ('categories.php');
include_once ('specs.php');
include_once ('specsvalues.php');
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'auth']
], function () {
    Route::group(['prefix' => 'products' , 'as' => 'products.'], function () {
        Route::get('/', 'ProductController@getIndex');

        Route::get('/create', 'ProductController@getCreate');
        Route::post('/create', 'ProductController@postCreate');
//
        Route::get('/edit/{id}', 'ProductController@getEdit');
        Route::put('/edit/{id}', 'ProductController@postEdit');
//
        Route::get('/view/{id}', 'ProductController@getView');
        Route::get('/delete/{id}', 'ProductController@getDelete')->name('delete');


        Route::get('/add_products_spec/{product_id}', 'ProductController@getAddProductSpec');
        Route::post('/add_products_spec/{product_id}', 'ProductController@postAddProductSpec');

        Route::get('/delete_products_spec/{product_spec_id}', 'ProductController@getDeleteProductSpec');
        Route::get('/view_product_spec_values/{product_spec_id}', 'ProductController@getViewProductSpecValues');
        Route::get('/add_products_spec_value/{product_spec_id}', 'ProductController@getAddProductSpecValue');

        Route::post('/add_products_spec_value/{product_spec_id}', 'ProductController@postAddProductSpecValue');
        Route::get('/delete_products_spec_value/{product_spec_value_id}', 'ProductController@getDeleteProductSpecValue');


        Route::get('/view_product_spec_values_inner/{product_spec_value_id}', 'ProductController@getViewProductSpecValuesInner');
        Route::get('/add_product_spec_values_inner/{product_spec_value_id}', 'ProductController@getAddProductSpecValueInner');
        Route::post('/add_product_spec_values_inner/{product_spec_value_id}', 'ProductController@postAddProductSpecValueInner');

        //        Route::post('/add_products_spec/{product_id}', 'ProductController@postAddProductSpec');

    });
});

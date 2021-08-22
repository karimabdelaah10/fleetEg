<?php
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect',
        'localeViewPath' ,'auth','IsAdmin','IsProductAdmin']
], function () {
    Route::group(['prefix' => 'product' , 'as' => 'product.'], function () {
        Route::get('/', 'ProductController@getIndex');

        Route::get('/create', 'ProductController@getCreate')->middleware('IsSuperAdmin');
        Route::post('/create', 'ProductController@postCreate')->middleware('IsSuperAdmin');

        Route::get('/edit/{id}', 'ProductController@getEdit')->middleware('ProductAdminIds');
        Route::post('/edit/{id}', 'ProductController@postEdit')->middleware('ProductAdminIds');

        Route::get('/view/{id}', 'ProductController@getView')->middleware('ProductAdminIds');
        Route::get('/delete/{id}', 'ProductController@getDelete')
            ->name('delete')->middleware('IsSuperAdmin');




        Route::get('/add_products_spec/{product_id}', 'ProductController@getAddProductSpec');
        Route::post('/add_products_spec/{product_id}', 'ProductController@postAddProductSpec');

        Route::get('/delete_products_spec/{product_spec_id}', 'ProductController@getDeleteProductSpec');
        Route::get('/view_product_spec_values/{product_spec_id}', 'ProductController@getViewProductSpecValues');
        Route::get('/add_products_spec_value/{product_spec_id}', 'ProductController@getAddProductSpecValue');

        Route::post('/add_products_spec_value/{product_spec_id}', 'ProductController@postAddProductSpecValue');
        Route::get('/edit_products_spec_value/{product_spec_value_id}', 'ProductController@getEditProductSpecValue');
        Route::post('/edit_products_spec_value/{product_spec_value_id}', 'ProductController@postEditProductSpecValue');
        Route::get('/delete_products_spec_value/{product_spec_value_id}', 'ProductController@getDeleteProductSpecValue');


        Route::get('/view_product_spec_values_inner/{product_spec_value_id}', 'ProductController@getViewProductSpecValuesInner');
        Route::get('/add_product_spec_values_inner/{product_spec_value_id}', 'ProductController@getAddProductSpecValueInner');
        Route::post('/add_product_spec_values_inner/{product_spec_value_id}', 'ProductController@postAddProductSpecValueInner');

        //        Route::post('/add_products_spec/{product_id}', 'ProductController@postAddProductSpec');

    });});

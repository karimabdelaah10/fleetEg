<?php
Route::group(['prefix' => 'payment_methods' , 'as' => 'payment_methods.'], function () {
    Route::get('/{user_id}', 'Api\PaymentMethodsController@getCreateMethods');
    Route::get('/update_default/{method_id}', 'Api\PaymentMethodsController@updateDefaultMethod');
});

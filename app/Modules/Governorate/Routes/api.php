<?php
Route::group(['prefix' => 'governorates' , 'as' => 'governorates.'], function () {
    Route::get('/', 'Api\GovernorateController@getIndex');
});

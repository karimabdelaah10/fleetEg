<?php
Route::group(['prefix' => 'notifications' , 'as' => 'notifications.'], function () {
    Route::get('/{user_id}', 'Api\NotificationsController@getUserNotification');
    Route::get('/delete/{user_id}', 'Api\NotificationsController@deleteAllNotifications');
});

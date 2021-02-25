<?php
Route::group(['prefix' => 'auth'] , function (){
    Route::post('/login', 'Api\AuthApiController@login');
    Route::post('/logout', 'Api\AuthApiController@logout');

    Route::post('refresh', 'Api\AuthApiController@refresh');

    Route::post('/register', 'Api\RegisterApiController@register');
    Route::post('/pre-register', 'Api\RegisterApiController@preRegister');
    Route::post('/social/{provider}', 'Api\SocialLoginController@socialRegister');
    Route::post('/confirm', 'Api\RegisterApiController@confirm');

    Route::post('/reset-password','Api\AuthApiController@sendResetPasswordToken');
    Route::post('/reset-password/{token}','Api\AuthApiController@resetPassword');

    Route::post('/mobile/reset-password-validate/{token}','Api\AuthApiController@mobileValidatePasswordToken');
    Route::post('/mobile/reset-password/','Api\AuthApiController@mobileResetPassword');
});


Route::group(['prefix' => 'profile'] , function (){
    Route::get('/', 'Api\ProfileApiController@getProfile');
    Route::put('/update', 'Api\ProfileApiController@updateProfile');
    Route::put('/update-profile-picture', 'Api\ProfileApiController@updateProfilePicture');

     Route::put('/complete-first-step','Api\ProfileApiController@completeProfileFirstStep');
     Route::put('/complete-second-step','Api\ProfileApiController@completeProfileSecondStep');

    Route::post('/update-fcm-token', 'Api\UserApiController@updateFcmToken');
    Route::post('/update-language', 'Api\UserApiController@updateLanguage');
    Route::post('/change-password', 'Api\UserApiController@changePassword');
});

Route::group(['prefix' => 'tamweel-users'] , function (){
    Route::get('/', 'Api\TamweelUsersAPIController@listUsers');
    Route::get('testMail','Api\TamweelUsersAPIController@testMail');


});




<?php

include_once 'profile.php';
include_once 'admin.php';
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect',
        'localeViewPath' ,'auth','IsAdmin','IsSuperAdmin',]
], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', '\App\Modules\Users\Controllers\UsersController@getIndex')->name('users');

        Route::get('/verify_all', '\App\Modules\Users\Controllers\UsersController@verifyAll');

        Route::get('/create', '\App\Modules\Users\Controllers\UsersController@getCreate');
        Route::post('/create', '\App\Modules\Users\Controllers\UsersController@postCreate')->name('users.create');

        Route::get('/edit/{id}', '\App\Modules\Users\Controllers\UsersController@getEdit');
        Route::post('/edit/{id}', '\App\Modules\Users\Controllers\UsersController@postEdit')
            ->name('users.putUser');

        Route::get('/view/{id}', '\App\Modules\Users\Controllers\UsersController@getView')
            ->name('users.view');

        Route::get('/delete/{id}', '\App\Modules\Users\Controllers\UsersController@getDelete')
            ->name('users.delete');

        Route::get('/money-requests/{id}', '\App\Modules\Users\Controllers\UsersController@getMoneyRequests');
        Route::get('/orders/{user_id}', '\App\Modules\Users\Controllers\UsersController@getOrders');
        Route::get('/order/{order_id}', '\App\Modules\Users\Controllers\UsersController@getOrderDetails');

    });
});



Route::get('/testmail', function (){
    try {
//        \Mail::send('Users::emails.auth.confirm1', [],
//            function ($mail) {
//            $subject = trans('email.Confirmation Code') . " - " . appName();
//            $mail->to('karimabdelaah@gmail.com' ,'karim abdelaah')
//                ->subject('Test Mail');
//        });

        $to_name = 'Karim Abdelaah';
        $to_email = \request()->to_mail ?? 'karimabdelaah@gmail.com';
        $from_name = 'aff.circle';
        $from_email = \request()->from_mail ??  'aff.circle.site@gmail.com';
        $subject = 'Laravel Test Mail';
        $data = [
                'name'=>'karim',
                'body' => 'A test mail'
                ];
        \Mail::send('Users::emails.auth.confirm1',
            $data, function($message) use ($from_email , $from_name , $to_name, $to_email , $subject) {
            $message->to($to_email, $to_name)
                     ->subject($subject);
        $message->from($from_email , $from_name);
        });

     return 'Sent';
    } catch (\Throwable $e) {
        dd($e->getMessage());
        \Log::error($e);
    }
});

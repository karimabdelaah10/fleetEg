<?php
Route::get('/', 'DashboardController@getIndex')->middleware(['auth'])->name('dashboard');

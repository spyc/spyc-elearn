<?php


Route::get('/', 'HomeController@index');

Route::get('account.login', 'AccountController@login');
Route::post('account.login', 'AccountController@auth');

Route::resource('users', 'ConsoleController');

<?php


Route::get('/', 'HomeController@index');

Route::get('account.login', 'Auth\\AccountController@login');
Route::post('account.login', 'Auth\\AccountController@auth');

Route::resource('users', 'ConsoleController');

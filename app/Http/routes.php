<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
        'as' => 'home',
        'uses' => 'HomeController@index'
]);

Route::get('env', [
    'as' => 'about',
    'uses' => 'HomeController@environment'
]);

Route::get('bug/list', [
    'as' => 'bug.list',
    'uses' => 'BugController@all'
]);

Route::resource('bug', 'BugController');

Route::group(['prefix' => 'auth'], function()
{
    Route::get('login', [
        'as' => 'auth.login',
        'uses' => 'Auth\AuthController@getLogin'
    ]);

    Route::post('login', 'Auth\AuthController@postLogin');

    Route::get('logout', [
        'as' => 'auth.logout',
        'uses' => 'Auth\AuthController@getLogout'
    ]);
});

Route::group(['prefix' => 'ajax'], function()
{
    Route::group(['prefix' => 'bug'], function ()
    {
       Route::get('color', [
           'as' => 'ajax.bug.color',
           'uses' => 'Ajax\BugController@colors'
       ]);
    });
});
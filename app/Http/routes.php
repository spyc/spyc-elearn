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


Route::group(['prefix' => 'library'], function()
{
    Route::get('/', ['as' => 'library.home', function()
    {
        return view('library.home');
    }]);

    Route::get('/news', [
        'as' => 'library.news.list',
        'uses' => 'LibraryController@news'
    ]);

    Route::get('/news/{id}', [
        'as' => 'library.news.view',
        'uses' => 'LibraryController@showNews'
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

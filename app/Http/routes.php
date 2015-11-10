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

if (env('APP_DEBUG')) {
    Route::group(['prefix' => 'debug'], function () {
        Route::get('session', function (\Illuminate\Http\Request $request) {
            dd($request->session());
        });
    });
}

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

Route::get('env', [
    'as' => 'about',
    'uses' => 'HomeController@environment'
]);

Route::get('policy', [
    'as' => 'policy',
    'uses' => 'HomeController@policy'
]);

Route::get('terms', [
    'as' => 'terms',
    'uses' => 'HomeController@terms'
]);

Route::get('bug/list', [
    'as' => 'bug.list',
    'uses' => 'BugController@all'
]);

Route::resource('bug', 'BugController');


Route::get('doc/{docs?}', [
    'as' => 'doc',
    'uses' => 'HomeController@doc'
])->where([
    'docs' => '[a-zA-Z0-9\%\/]+\.md'
]);

Route::get('countdown', [
    'as' => 'countdown',
    'uses' => 'HomeController@countdown'
]);

Route::group(['prefix' => config('saml2_settings.routesPrefix')], function () {

    Route::get('login', [
        'as' => 'auth.login',
        'uses' => 'Auth\AuthController@login'
    ]);

    Route::get('logout', [
        'as' => 'auth.logout',
        'uses' => 'Auth\AuthController@logout'
    ]);

    Route::get('metadata', [
        'as' => 'saml_metadata',
        'uses' => 'Auth\AuthController@metadata'
    ]);

    Route::post('acs', [
        'as' => 'saml_acs',
        'uses' => 'Auth\AuthController@acs'
    ]);

    Route::get('sls', [
        'as' => 'saml_sls',
        'uses' => 'Auth\AuthController@sls'
    ]);

});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [
        'as' => 'admin.home',
        'uses' => 'AdminController@dashboard'
    ]);

    Route::get('communities', [
        'as' => 'admin.communities',
        'uses' => 'AdminController@community'
    ]);
});

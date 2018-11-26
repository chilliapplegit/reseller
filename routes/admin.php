<?php

/*
|--------------------------------------------------------------------------
| Application Admin Routes
|--------------------------------------------------------------------------
*/

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'namespace' => 'Admin',
], function () {
    Route::get(
        '/login', 
        ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']
    );

    Route::post(
        '/login', 
        ['as' => 'login', 'uses' => 'Auth\LoginController@login']
    );

    Route::get(
        '/orders', 
        ['as' => 'orders', 'uses' => 'HomeController@show']
    );

    Route::post(
        '/logout', 
        ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']
    );
});


<?php

/*
|--------------------------------------------------------------------------
| Application Admin Routes
|--------------------------------------------------------------------------
*/

Route::group([
    'as' => 'reseller.',
    'prefix' => 'reseller/auth',
    'namespace' => 'Reseller',
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
        '/dashboard', 
        ['as' => 'dashboard', 'uses' => 'DashboardController@index']
    );

    Route::get(
        '/order/{id}', 
        ['as' => 'dashboard', 'uses' => 'DashboardController@orderDetails']
    );

    Route::post(
        '/logout', 
        ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']
    );
});

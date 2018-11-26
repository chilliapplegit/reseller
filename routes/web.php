<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('reseller');
Route::get('/shoppingcart', 'ShoppingCartController@index')->name('shoppingcart');
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::get('/reseller/{code}', 'HomeController@resellerProducts');
Route::get('/{reseller}/product/{product}', 'HomeController@addToCartProduct')->name('addToCart');

Auth::routes();

Route::get('/home', 'DashbordController@index')->name('home');
Route::get('/orderdetails/{orderId}', 'DashbordController@orderDetails')->name('orderDetails');

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

Route::get('/', 'ProductController@index');
Route::get('/addcart/{id}', 'ProductController@addToCart');
Route::get('/viewcart', 'ProductController@showCart');
Route::get('/removeCart/{id}', 'ProductController@removeCart');






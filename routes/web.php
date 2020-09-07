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

Route::get('/', function () {
    return view('welcome');
});


Route::get('add/{id}', 'ShopController@add');

Route::delete('remove/{id}', 'ShopController@remove');

Route::get('shop/delete', 'ShopController@delete');

Route::get('shop/cart', 'ShopController@cart');

Route::resource('shop', 'ShopController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

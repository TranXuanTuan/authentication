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

// Auth::routes();
Route::get('/login', 'LoginController@getLogin')->name('login');
Route::post('/login','LoginController@postLogin');

Route::get('/register','RegisterController@getRegister')->name('register');
Route::post('/register','RegisterController@postRegister');

// Auth::routes();

Route::get('/','HomeController@getIndex');
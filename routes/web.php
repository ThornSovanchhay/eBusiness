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

Route::get('/', 'HomeController@index');

Route::view('login', 'login')->name('login');
// register route
Route::get('register', 'RegisterController@index');
Route::post('register/save', 'RegisterController@save');
// login
Route::get('front-login', 'LoginController@index');
Route::get('front-logout', 'LoginController@logout');
Route::post('front-login/dologin', 'LoginController@do_login');

Route::get('post/{id}', 'HomeController@post');
Route::post('comment/save', 'HomeController@save_comment');
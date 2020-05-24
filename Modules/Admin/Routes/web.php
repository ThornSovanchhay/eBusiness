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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index');
    // slideshow route
    Route::resource('slide', 'SlideShowController')
        ->except(['show','destroy']);
    Route::get('slide/delete/{id}', 'SlideShowController@delete')
        ->name('slide.delete');
    Route::get('logout', 'AuthenticateController@logout');
    Route::post('login', 'AuthenticateController@login');
    // about route
    Route::get('about', 'AboutController@index');
    Route::get('about/edit/{id}', 'AboutController@edit');
    Route::post('about/update', 'AboutController@update');
    // file manager
    Route::view('fileman', 'admin::fileman');
    // route service
    Route::resource('service', 'ServiceController')
        ->except(['show', 'destroy']);
    Route::get('service/delete/{id}', 'ServiceController@delete')
        ->name('service.delete');
    // team route
    Route::resource('team', 'TeamController')
        ->except(['destroy', 'show']);
    Route::get('team/delete/{id}', 'TeamController@delete')
        ->name('team.delete');
    Route::resource('category', 'CategoryController')
        ->except(['destroy', 'show']);
    Route::get('category/delete/{id}', 'CategoryController@delete')
        ->name('category.delete');
    Route::resource('portfolio', 'PortfolioController')
        ->except(['destroy', 'show']);
    Route::get('portfolio/delete/{id}', 'PortfolioController@delete')
        ->name('portfolio.delete');
    Route::resource('post', 'PostController')
        ->except(['show', 'destroy']);
        
    Route::get('post/delete/{id}', 'PostController@delete')
        ->name('post.delete');
    Route::get('post/detail/{id}', 'PostController@detail')
        ->name('post.detail');
});

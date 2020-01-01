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

//use Illuminate\Routing\Route;

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/article/post', 'articlecontroller@post');

Route::post('/article', 'articlecontroller@store');

Route::get('/article/{id}', 'articlecontroller@show');

Route::post('/message/post', 'messagecontroller@create');

Route::get('/google/auth', 'SocialiteController@redirectToProvider');
Route::get('/google/auth/callback', 'SocialiteController@handleProviderCallback');

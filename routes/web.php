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
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Environment\Console;

Auth::routes();

Route::get('/', 'HomeController@index');

Route::redirect('/home', '/');
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/article/post', 'messagecontroller@post');

Route::post('/article', 'messagecontroller@store')->name('posts');

Route::get('/edit/{id}', 'messagecontroller@edit')->where('id', "^([0-9]){1,4}$");

Route::post('/edit', 'messagecontroller@updates');

Route::get('/dashboard', 'messagecontroller@dashboard');

Route::get('/article/{id}', 'articlecontroller@show')->where('id', "^([0-9]){1,4}$")->name('show');

Route::post('/message/post', 'messagecontroller@create');

Route::get('/google/auth', 'SocialiteController@redirectToProvider');
Route::get('/google/auth/callback', 'SocialiteController@handleProviderCallback');


Route::get('image/{filename}', function($filename)
{
    $file_path = 'file/'. $filename;
    
    return Storage::download($filename);
    if (file_exists($filename))
    {
        // return Response::download($file_path, $filename, [
        //     'Content-Length: '. filesize($file_path)
        // ]);
    }
    else
    {
        exit('Requested file does not exist on our server!');
    }
})
->where('filename', "^([a-z]|[A-Z]|_){1,15}.(png|jpg|gif|svg)$");


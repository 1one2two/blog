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
use SebastianBergmann\Environment\Console;

Auth::routes();

Route::get('/', 'HomeController@index');

Route::redirect('/home', '/');
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/article/post', 'messagecontroller@post');

Route::post('/article', 'articlecontroller@store')->name('posts');

Route::get('/edit/{id}', 'articlecontroller@edit');

Route::post('/edit', 'articlecontroller@updates');

Route::get('/article/{id}', 'articlecontroller@show')->name('show');

Route::post('/message/post', 'messagecontroller@create');

Route::get('/google/auth', 'SocialiteController@redirectToProvider');
Route::get('/google/auth/callback', 'SocialiteController@handleProviderCallback');


Route::get('download/{filename}', function($filename)
{
    $file_path = 'file/'. $filename;
    if (file_exists($file_path))
    {
        return Response::download($file_path, $filename, [
            'Content-Length: '. filesize($file_path)
        ]);
    }
    else
    {
        exit('Requested file does not exist on our server!');
    }
})
->where('filename', '[A-Za-z0-9\-\_\.]+');


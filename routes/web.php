<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/edit', function () {
//     return view('posts.edit');
// });

// Route::get('/index', function () {
//     return view('posts.index');
// });

// Route::get('/show', function () {
//     return view('posts.show');
// });

Route::get(’/comments, ‘CommentController@index’)->name(‘comments.index’);
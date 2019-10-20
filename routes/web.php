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
Route::get('/test', function () {
    $test = 4 * 8;
    return ($test);
});
Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/post/{id}', 'PostController@show')->name('post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

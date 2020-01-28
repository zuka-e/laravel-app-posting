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

Auth::routes(['verify' => true]); # メール確認を利用する

Route::get('/', 'HomeController@index')->name('root');

Route::resource('users', 'UserController')->only(['show', 'edit', 'update']);

Route::resource('posts', 'PostController');

Route::resource('comments', 'CommentController');

// Route::get('mail', function () { # 送信メールプレビューURL
//     $user = App\Models\User::find(1);
//     return (new App\Notifications\ResetPasswordNotification($user))
//                 ->toMail($user);
// });

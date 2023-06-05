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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
// Loginページ表示。
Route::get('/login', 'Auth\LoginController@login')->name('login');
// ログイン処理。
Route::post('/login', 'Auth\LoginController@login');

// 新規登録用viewページ表示。
Route::get('/register', 'Auth\RegisterController@registerView');
// ユーザー新規登録処理。
Route::post('/register', 'Auth\RegisterController@register');

// 登録完了用viewページ表示。
Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top', 'PostsController@index');

Route::get('/profile', 'UsersController@profile');

Route::get('/search', 'UsersController@index');

Route::get('/follow-list', 'PostsController@index');
Route::get('/follower-list', 'PostsController@index');

//ログアウト機能
Route::get('/logout', 'Auth\LoginController@logout');

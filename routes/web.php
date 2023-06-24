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

// use App\Http\Controllers\PostsController;

//ログアウト中のページ
//Loginページ表示
Route::get('/login', 'Auth\LoginController@login')->name('login');
// ログイン処理
Route::post('/login', 'Auth\LoginController@login');

// 新規登録用viewページ表示
Route::get('/register', 'Auth\RegisterController@registerView');
//ユーザー新規登録処理
Route::post('/register', 'Auth\RegisterController@register');

//登録完了用viewページ表示
Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン後に表示するページにアクセス制限をかける(ミドルウェア)
Route::group(['middleware' => ['auth']],function () {

//ログイン後のページ表示
Route::get('/top', 'PostsController@index');

//プロフィールページ表示
Route::get('/profile', 'UsersController@profile');

//検索ページ表示
Route::get('/search', 'UsersController@search');

//フォローリスト・フォロワーリスト表示
Route::get('/follow-list', 'FollowsController@followList');
Route::get('/follower-list', 'FollowsController@followerList');

});

//ログアウト機能
Route::get('/logout', 'Auth\LoginController@logout');

//新規投稿機能
Route::post('/post/create', 'PostsController@createPost');

//投稿削除機能
Route::get('/post/{id}/delete', 'PostsController@deletePost');

// 投稿更新機能
Route::post('/post/update', 'PostsController@updatePost');

// ユーザー検索機能
Route::post('/search', 'UsersController@searchUser');

// フォロー解除機能
Route::get('/user/{id}/unfollow', 'FollowsController@unfollow');

// フォロー機能
Route::post('/user/{id}/follow', 'FollowsController@follow');

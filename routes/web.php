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

Route::group(['middleware' => ['auth']], function(){
    Route::get('/', 'PostController@index'); //一覧画面
    Route::get('/posts/create', 'PostController@create'); //投稿作成画面
    Route::get('/posts/{post}/edit', 'PostController@edit'); //投稿編集画面
    Route::put('/posts/{post}', 'PostController@update'); //編集操作
    Route::get('/posts/{post}', 'PostController@show'); //投稿詳細画面
    Route::post('/posts', 'PostController@store'); //投稿保存操作
    Route::delete('/posts/{post}', 'PostController@delete'); //投稿削除
    Route::get('/cute/{post}', 'PostController@cute');//かわいいボタン
    Route::get('/cool/{post}', 'PostController@cool');//かっこいいボタン
    Route::get('/weird/{post}', 'PostController@weird');//きもいボタン
    Route::get('/categories/{category}', 'CategoryController@index'); //カテゴリー一覧画面
    Route::get('/mypage', 'UserController@index');//マイページ画面
    Route::get('/mypage/edit', 'UserController@edit');//ユーザー情報編集画面
    Route::put('/mypage', 'UserController@update');//ユーザー情報編集操作
    Route::post('/users/{user}/follow', 'UserController@follow');//フォロー機能
    Route::post('/users/{user}/unfollow', 'UserController@unfollow');//アンフォロー機能
    Route::get('/users/{user}', 'UserController@show');//ユーザーページ画面
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

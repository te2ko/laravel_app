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
//この関数の第一引数にはアドレス部分にパラメータとして受け取れる。'/oo/{パラメータ}'
  Route::get('/', function () {
 //     //viewsフォルダの中にあるwelcomeフォルダを読み込んだものを返している。
      return view('welcome');
  });
//todoでアクセスしてきたときのCRUD関係の処理がすべて登録できる。
Route::resource('todo','TodoController');
Auth::routes();
//->name('home');->ルートにに名前をつけている。route:listの名前のところに記載される ミドルウェアを利用するときはRoute::getの後にメソッドチェーンで結んでいく今回はコントローラー側で書いている
Route::get('/home', 'HomeController@index')->name('home');


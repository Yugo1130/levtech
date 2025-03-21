<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ルーティングで直接Viewファイルを指定
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function() {
//     return view('posts.index');
// });

// PostController の index メソッドを実行する
// ルーティングでControllerを呼び出し、Controllerからデータを受け渡す形でViewを呼び出す
Route::get('/', [PostController::class, 'index']);

// ブログ投稿作成画面表示用ルーティング
// Route::get('/posts/{post}', [PostController::class ,'show']);より上に書かないと、{post}にcreateが入ってしまい予期しない動作が発生する。
Route::get('/posts/create', [PostController::class, 'create']);

// '/posts/{対象データのID}'にGetリクエストが来たら、PostControllerのshowメソッドを実行する
// {post}はルートパラメーター
Route::get('/posts/{post}', [PostController::class ,'show']);

Route::post('/posts', [PostController::class, 'store']);

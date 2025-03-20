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

// ルーティングでControllerを呼び出し、Controllerからデータを受け渡す形でViewを呼び出す
Route::get('/', [PostController::class, 'index']);

//Laravel のルーティング設定で、「/posts にアクセスしたときに PostController の index メソッドを実行する」 というルールを定義
Route::get('posts', [PostController::class, 'index']);

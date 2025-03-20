<?php
//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のPostクラスをインポートしている。
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(post $post) //インポートしたPostをインスタンス化して$postとして使用。
    {
        //sqlの確認用
        // $test = $post->orderBy('updated_at', 'DESC')->limit(2)->toSql(); //確認用に追加
        // dd($test); //確認用に追加

        // $post->get()はpostsテーブル内のすべてのデータを取得し、結果をCollection（Laravelのデータ管理クラス）として返す。
        // SELECT * FROM posts;と同じ。
        // return $post->get();
        
        // blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
        // with以降をつけることで、posts.indexのデータを表示するときに、Viewにデータ（posts）を一緒に渡すことができる。
        // 変数名 => 値
        // return view('posts.index')->with(['posts' => $post->getByLimit()]);
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
}

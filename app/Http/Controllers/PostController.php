<?php
//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のPostクラスをインポートしている。
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post) //インポートしたPostをインスタンス化して$postとして使用。
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
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit(5)]);
    }

    public function create()
    {
        return view('posts.create');
    }
    
    // 特定IDのpostを表示する
    // @params Object Post // 引数の$postはid=1のPostインスタンス
    // @return Reposnse post view
    public function show(Post $post)
    {
        //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
        // すべてのデータを取得するわけではないので->get()は不要。
        return view('posts.show')->with(['post' => $post]);
    }

    public function store(Request $request, Post $post)
    {
        // name="post[title]", name="post[body]"のように配列の場合は以下のように記述
        // $inputは[ 'title' => 'タイトル', 'body' => '本文' ]のような配列型式になる。
        $input = $request['post'];
        // Postインスタンスのプロパティを受け取ったキーで上書き
        // saveを行うことで、MySQLへのINSERT分が実行される
        // 以下の3行を1行で行う
        // $post->title = $input["title"];
        // $post->body = $input["body"];
        // $post->save();
        // ただし、この書き方をするのであれば、Postクラスに$fillableを定義する必要がある。
        $post->fill($input)->save();
        // 保存処理が終わると、保存したpostのIDを含んだURLにリダイレクトされる。
        return redirect('/posts/' . $post->id);
    }
}

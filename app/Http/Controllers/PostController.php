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
        return $post->get();
    }
}

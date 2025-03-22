<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <a href='/posts/create'>create</a>
        <div class='posts'>
            <!-- $post->get()のデータ（データベースのpostsテーブル内の全レコード）をforループで全件処理 -->
            @foreach ($posts as $post)
                <div class='post'>
                    <!-- h2 class='title'>Title</h2> -->
                    <!-- <h2 class='title'>{{ $post->title }}</h2> -->
                    <!-- 指定したアドレスへのリンク -->
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <!-- <p class='body'>This is a sample body.</p> -->
                    <p class='body'>{{ $post->body }}</p>
                    <!-- deletePost関数が特定のタグにアクセスするためにid属性がある。 -->
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <!-- button type="submit"だと確認せずに送信される。以下のようにすると、deletePost関数でsubmitが呼ばれた際に送信される。 -->
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form>
                </div>
            @endforeach
        </div>

        <div class='paginate'>
            {{ $posts-> links() }}
        </div>

        <script>
            function deletePost(id) {
                // 厳格モード有効
                'use strict';

                // confirm()でダイアログ出力
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>
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
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts-> links() }}
        </div>
    </body>
</html>
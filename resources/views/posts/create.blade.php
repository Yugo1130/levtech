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
        <!-- action属性はリクエストを送信するURI、method属性はHTTPリクエストのメソッドを指定 -->
        <form action="/posts" method="POST">
            <!-- CSRF（なりすましリクエスト）対策 -->
            @csrf
            <div class="title">
                <h2>Title</h2>
                <!-- inputは1行だけ、textareaにすると複数行OK -->
                <!-- placeholderはテキストボックスに薄い文字で表示されるガイド -->
                <input type="text" name="post[title]" placeholder="タイトル"/>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="今日も一日お疲れさまでした。"></textarea>
            </div>
            <!-- inputタグが追加されているForm領域の送信を実行 -->
            <input type="submit" value="保存"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
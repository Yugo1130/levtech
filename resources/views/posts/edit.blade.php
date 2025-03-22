<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>編集画面</h1>
        <!-- action属性はリクエストを送信するURI、method属性はHTTPリクエストのメソッドを指定 -->
        <!-- PUTでリクエストを行いたいが、Formタグのmethod属性ではサポートされていない -->
        <form action="/posts/{{ $post->id }}" method="POST">
            <!-- CSRF（なりすましリクエスト）対策 -->
            @csrf
            @method('PUT')
            <div class="content_title">
                <h2>タイトル</h2>
                <!-- inputは1行だけ、textareaにすると複数行OK -->
                <!-- placeholderはテキストボックスに薄い文字で表示されるガイド -->
                <input type="text" name="post[title]" value="{{ $post->title }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="content_body">
                <h2>本文</h2>
                <textarea name="post[body]">{{ $post->body }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <!-- inputタグが追加されているForm領域の送信を実行 -->
            <input type="submit" value="保存"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
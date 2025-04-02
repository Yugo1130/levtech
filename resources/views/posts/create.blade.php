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
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                <!-- エラーメッセージの出力、エラー発生時、再度表示された画面で入力項目が空になることを防ぐため、valueに"{{ old('post.title') }}"を指定する。-->
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            
            <!-- カテゴリ選択プルダウン -->
            <div class="category">
                <h2>Category</h2>
                <select name="post[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="今日も一日お疲れさまでした。">{{ old('post.body') }}</textarea>
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
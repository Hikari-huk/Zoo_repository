<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1>投稿詳細ページ</h1>
        <h2 class="title">
            ユーザ名
        </h2>
        <div class="content">
            <div class="image">
                <img src=" {{ asset("storage/$post->images_url")}}">  
            </div>
        </div>
        <p>カテゴリー:<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></p>
        <div class="footer">
            <p class="edit">[<a href="/posts/{{ $post->id }}/edit">編集</a>]</p>
            <a href="/">一覧ページへ戻る</a>
        </div>
    </body>
</html>
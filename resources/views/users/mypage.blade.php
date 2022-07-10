<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>マイページ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1>{{ Auth::user()->name }}さんのマイページ</h1>
        <div class="content">
            @if(isset( Auth::user()->profile ))
                <p>プロフィール：{{ Auth::user()->profile }}</p>
            @else
                <p>プロフィールはまだ設定されていません。</p>
            @endif
            <p>好みのカテゴリ：{{ Auth::user()->category->name }}</p>
        </div>
        <div class="posts">
            @foreach($posts as $post)
                <p>
                    {{ $post }}
                </p>
            @endforeach
        </div>
        <div class="footer">
            <p class="edit">[<a href="/mypage/edit">編集</a>]</p>
            <a href="/">トップページへ戻る</a>
        </div>
    </body>
</html>
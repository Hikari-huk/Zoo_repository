<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ユーザーページ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1>{{ $user->name }}さん</h1>
        @if($user->followers()->where('following_id', Auth::id())->exists())
            <form action="/users/{{ $user->id }}/unfollow" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">フォローを外す</button>
            </form>
        @else
            <form action="/users/{{ $user->id }}/follow" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">フォローする</button>
            </form>
        @endif
        <div class="content">
            @if(isset( $user->profile ))
                <p>プロフィール：{{ $user->profile }}</p>
            @else
                <p>プロフィールはまだ設定されていません。</p>
            @endif
            <p>好みのカテゴリ：{{ $user->category->name }}</p>
            <p>フォロー：{{ count($follows) }}人，フォロワー：{{ count($followers) }}人</p>
        </div>
        <div class="posts">
            @foreach($posts as $post)
                <p>
                    {{ $post }}
                </p>
            @endforeach
        </div>
        <div class="footer">
            <a href="/">トップページへ戻る</a>
        </div>
    </body>
</html>
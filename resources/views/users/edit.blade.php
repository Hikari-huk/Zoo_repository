<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>マイページ</title>
    </head>
    <body>
        <h1 class="title">ユーザー情報編集画面</h1>
        <div class="content">
            <form action="/mypage" method="POST">
                @csrf
                @method('PUT')
                <div class='user__profile'>
                    <h2>プロフィール</h2>
                    <input type='text' name='user[profile]' value="{{  Auth::user()->profile }}">
                </div>
                <input type="submit" value="保存">
            </form>
        </div>
    </body>
</html>
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>レバテックチーム開発</h1>
        <h2>投稿作成ページ</h2>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class='image'>
                <input type="file" name="post[images_url]">
            </div>
            <div class=size>
                <h2>サイズ</h2>
                <input type="text" name="post[size_mm]" placeholder="サイズ[mm]"/>
            </div>
            <div class="caption">
                <h2>説明</h2>
                <textarea name="post[caption]" placeholder="今日も1日お疲れさまでした。"></textarea>
                <p class="caption__error" style="color:red">{{ $errors->first('post.caption') }}</p>
            </div>
            <div class="hash">
                <h2>ハッシュタグ</h2>
                <input type="text" name="post[hashtags]" placeholder="hashtags"/>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">戻る</a>]</div>
    </body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/top.css')}}">
    </head>
    <body>
    
        <h1>レバテックチーム開発</h1>
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <input type="submit" value="ログアウト">
        </form>
        <h2>投稿一覧ページ</h2>
        <div class='posts'>
            @foreach($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        タイトル：<a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p class='body'>本文：{{ $post->body}}</p>
                    <p>カテゴリー:<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}"  method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" onClick="deletePost({{$post->id}});">削除</button> {{--script内に定義したdeletePostを使用している--}}
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <div>
            [<a href='/posts/create'>新規作成</a>]

        @extends("layouts/app")
        @section("content")
        <div class="wrapper">
            <div class='posts'>
                @foreach($posts as $post)
                    <div class='post'>
                        <a href="/show/{{ $post->id }}">
                            <img src="{{$post->images_url}}">
                        </a>
                    </div>
                @endforeach
            </div>
            
            <div class="create">
                <a href='/create'>+</a>
            </div>
            
            <nav class="footer-nav">
                <ul class="nav-list">
                    <li>
                        <a class="toppage" href="/">トップページ</a>
                    </li>
                    <li>
                        <a class="mypage" href="/mypage">マイページ</a>  {{--<a href="/mypage/{{$user->id}}">--}}
                    </li>
                    <li>
                        <a class="search" href="/search">検索</a>
                    </li>
                    <li>
                        <a class="ranking" href="/ranking">ランキング</a>
                    </li>
                </ul>
            </nav>
        </div>
    </body>
    @endsection
</html>
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
        @extends("layouts/app")
        @section("content")
        <div class="wrapper">
            <div class='posts'>
                @foreach($posts as $post)
                    <div class='post'>
                        <a href="/show/{{ $post->id }}">
                            <img src="{{asset('storage/'.$post->images_url)}}">
                        </a>
                    </div>
                @endforeach
            </div>
            
            <div class="create">
                <a href='posts/create'>+</a>
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
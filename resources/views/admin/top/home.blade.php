<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>辞書サイトトップページ</title>
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
        <link href="{{ asset('css/top.css') }}" rel ="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row row-title">
                <h1>辞書サイトトップページ</h1>
            </div>
            @foreach ($posts as $post)
            <div class="row row-big">
                <a href="{{ action('Admin\WordController@dictionary_master',['id'=>$post->id,'name'=>$post->name]) }}">{{$post->name}}</a>
            </div>
            @endforeach
        </div>
    </body>
</html>
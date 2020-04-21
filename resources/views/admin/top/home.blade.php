@extends('layouts.top')
@section('title', '辞書サイトトップページ')
@section('content')
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
@endsection
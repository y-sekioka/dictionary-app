@extends('layouts.top')
@section('title', '辞書サイトトップページ')
@section('content')
    <body>
        <div class="container">
            <div class="row row-title">
                <h1>辞書サイトトップページ</h1>
            </div>
            @if(count($posts) > 0))
                @foreach ($posts as $post)
                    <div class="row row-big">
                        <a href="{{ action('Admin\WordController@dictionary_master',['id'=>$post->id,'name'=>$post->name]) }}">{{$post->name}}</a>
                    </div>
                @endforeach
            @else
                <h2>まだあなたの辞書が登録されてされていないようです！</h2>
                <h3>下記の手順に従って辞書を登録してください。</h3>
                <p>①<a href="{{ action('Admin\CategoryController@get_dictionary')}}">「辞書登録」</a>にて辞書を登録。</p>
                <p>②<a href="{{ action('Admin\CategoryController@get_main_category')}}">「メインカテゴリ登録」</a>にて辞書に属するカテゴリを登録</p>
                <p>③<a href="{{ action('Admin\CategoryController@get_sub_category')}}">「サブカテゴリ登録」</a>にて更に細かいカテゴリを登録してください。</p>
                <p>①②③を終えると、「単語登録」より単語を辞書に登録する事ができます！</p>
            @endif
        </div>
    </body>
@endsection

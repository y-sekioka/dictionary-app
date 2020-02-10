@extends('layouts.thirdLayer')
@section("title","{$data_name}")
@section('content')
    <div class="container">
        <h2>{{$dictionary_name}}</h2>
        @foreach ($posts as $post)
        <div class="row row-big">
            <a href="{{ action('Admin\WordController@index_master',['id'=>$post->id,'name'=>$post->name,'dictionary_id'=>$dictionary_id,'dictionary_name'=>$dictionary_name]) }}">{{$post->name}}</a>
        </div>
        @endforeach
    </div>
@endsection
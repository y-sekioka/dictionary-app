@extends('layouts.secondLayer')
@section("title","{$data_name}")
@section('content')
    <div class="container">
        @foreach ($posts as $post)
        <div class="row row-big">
            <a href="{{ action('Admin\WordController@main_category_master',['id'=>$post->id,'name'=>$post->name,'dictionary_id'=>$data_id,'dictionary_name'=>$data_name]) }}">{{$post->name}}</a>
        </div>
        @endforeach
    </div>
@endsection
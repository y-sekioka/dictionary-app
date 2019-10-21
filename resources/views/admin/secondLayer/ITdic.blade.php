@extends('layouts.secondLayer')
@section('title', 'IT辞書')
@section('content')
    <div class="container">
        <div class="row row-title">
            <h1>IT用語</h1>
        </div>
        <div class="row row-big">
            <a href="{{ action('Admin\WordController@php_index') }}">PHP用語一覧</a>
        </div>
        <div class="row row-big">
            <a href="{{ action('Admin\WordController@index') }}">登録単語一覧</a>
        </div>
    </div>
@endsection
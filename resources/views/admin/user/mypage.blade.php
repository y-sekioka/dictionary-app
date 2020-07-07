@extends('layouts.user')
@section("title", "マイページ")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="profile_group">
                    <div class="profile_title">ユーザー名</div>
                    <div class="profile_element">{{$auth->name}}</div>
                </div><br>
                <div class="profile_group">
                    <div class="profile_title">メールアドレス</div>
                    <div class="profile_element">{{$auth->email}}</div>
                </div><br>
                <div class="profile_group">
                    <div class="profile_title">カラーテーマ</div>
                    <div class="profile_element">{{$auth->theme}}</div>
                </div><br>
                <a  class="link-font" href="{{ action('Admin\UserController@edit') }}">ユーザー情報編集</a>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.category')
@section('title','メインカテゴリ登録')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>メインカテゴリ登録</h2>
                <form action="{{ action('Admin\CategoryController@main_category') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="main_category_label">メインカテゴリ名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="dictionary_id_label">辞書ID</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="dictionary_id" value="">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="追加">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 max-auto">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th width=20%>id</th>
                            <th width=30%>メインカテゴリ名</th>
                            <th width=20%>辞書id</th>
                            <th width=20%>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ str_limit($post->id, 100) }}</td>
                                <td>{{ str_limit($post->name,100) }}</td>
                                <td>{{ str_limit($post->dictionary_id,100) }}</td>
                                <td>
                                    <div>
                                        <a href="{{ action('Admin\CategoryController@main_category_delete', ['id' => $post->id]) }}">削除</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row" style = float:right;>
            <div class="col-md-8 max-auto">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th width=10%>id</th>
                            <th width=20%>辞書名</th>
                            <th width=10%>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dictionary_posts as $dictionary_post)
                            <tr>
                                <td>{{ str_limit($dictionary_post->id, 100) }}</td>
                                <td>{{ str_limit($dictionary_post->name,100) }}</td>
                                <td>
                                    <div>
                                        <a href="{{ action('Admin\CategoryController@dictionary_delete', ['id' => $dictionary_post->id]) }}">削除</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
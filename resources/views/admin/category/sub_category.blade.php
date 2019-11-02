@extends('layouts.category')
@section('title','サブカテゴリ登録')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>サブカテゴリ登録</h2>
                <form action="{{ action('Admin\CategoryController@sub_category') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="sub_category_label">サブカテゴリ名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="main_category_id_label">メインカテゴリID</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="main_category_id" value="">
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
                            <th width=30%>サブカテゴリ名</th>
                            <th width=20%>メインカテゴリid</th>
                            <th width=20%>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ str_limit($post->id, 100) }}</td>
                                <td>{{ str_limit($post->name,100) }}</td>
                                <td>{{ str_limit($post->main_category_id,100) }}</td>
                                <td>
                                    <div>
                                        <a href="{{ action('Admin\CategoryController@sub_category_delete', ['id' => $post->id]) }}">削除</a>
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
                            <th width=20%>メインカテゴリ名</th>
                            <th width=10%>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($main_posts as $main_post)
                            <tr>
                                <td>{{ str_limit($main_post->id, 100) }}</td>
                                <td>{{ str_limit($main_post->name,100) }}</td>
                                <td>
                                    <div>
                                        <a href="{{ action('Admin\CategoryController@main_category_delete', ['id' => $main_post->id]) }}">削除</a>
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
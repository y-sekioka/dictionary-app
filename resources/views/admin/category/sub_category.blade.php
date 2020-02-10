@extends('layouts.category')
@section('title','サブカテゴリ登録')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
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
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" value="" placeholder="サブカテゴリ名">
                        </div>
                    </div>
                    <div class="form-group row col-md-8">
                        <select class="form-control" name="main_category_id">
                            <option value="">属する分類を選択してください</option>
                                @foreach($main_posts as $main_post)
                                    <option value="{{ $main_post->id }}">{{ $main_post->name }}</option>
                                @endforeach
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary" value="追加">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
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
        <div class="row">
            <div class="col-md-8">
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
        <div category_link>
            <a href="{{ action('Admin\CategoryController@get_dictionary')}}">辞書カテゴリへ</a>
        </div>
    </div>
@endsection
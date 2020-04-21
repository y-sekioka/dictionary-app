@extends('layouts.category')
@section('title','辞書登録')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>辞書登録</h2>
                <form action="{{ action('Admin\CategoryController@dictionary') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="" placeholder="辞書名">
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
                            <th width=10%>id</th>
                            <th width=20%>辞書名</th>
                            <th width=10%>user_id</th>
                            <th width=10%>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ str_limit($post->id, 100) }}</td>
                                <td>{{ str_limit($post->name,100) }}</td>
                                <td>{{ str_limit($post->user_id,100) }}</td>
                                <td>
                                    <div>
                                        <a href="{{ action('Admin\CategoryController@dictionary_delete', ['id' => $post->id]) }}">削除</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div category_link>
                <a href="{{ action('Admin\CategoryController@get_main_category')}}">メインカテゴリへ</a>
        </div>
    </div>
@endsection
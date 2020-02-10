@extends('layouts.admin')
@section('title', '登録済みの単語一覧')
@section('content')
    <div class="container">
        <div class="row">
            <h2>登録済みの単語一覧</h2>
        </div>
        <div class="row">
            <div col-md-4>
                    <a href="{{ action('Admin\WordController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\WordController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">単語名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                    
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>    
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th width="10%">ID</th>
                        <th width="20%">単語名</th>
                        <th width="40%">説明</th>
                        <th width="10%">type</th>
                        <th width="10%">type2</th>
                        <th width="10%">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $word)
                        <tr>
                            <td>{{ str_limit($word->id,100) }}</td>
                            <td>{{ str_limit($word->word, 100) }}</td>
                            <td>{{ str_limit($word->explain, 300) }}</td>
                            <td>{{ str_limit($word->type,100)}} </td>
                            <td>{{ str_limit($word->type2,100) }}</td>
                            <td>
                                <div>
                                    <a href="{{ action('Admin\WordController@edit', ['id' => $word->id]) }}">編集</a>
                                </div>
                                <div>
                                    <a href="{{ action('Admin\WordController@delete', ['id' => $word->id]) }}">削除</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                <tbody>
            </table>
        </div>
    </div>
@endsection
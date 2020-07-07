@extends('layouts.admin')
@section("title", "{$data_name}一覧")
@section('content')
<div class="container">
    <div class="row">
        <div col-md-4>
            <a href="{{ action('Admin\WordController@add') }}" role="button" class="btn btn-primary">新規作成</a>
        </div>
    </div>
    <br>
    <div class="row">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th width="20%">単語名</th>
                    <th width="50%">説明</th>
                    <th width="10%">操作</th>
                </tr>
                    </thead>
            <tbody>
                @foreach ($posts as $word)
                    <tr>
                        <td>{{ str_limit($word->word, 100) }}</td>
                        <td>{!! nl2br(e($word->explain)) !!}</td>
                        <td>
                            <div>
                                <a href="{{ action('Admin\WordController@edit', ['id' => $word->id]) }}">編集</a>
                            </div>
                            <div>
                                <a href="{{ action('Admin\WordController@delete', [
                                    'id' => $data_id,
                                    'name' => $data_name,
                                    'dictionary_id' => $dictionary_id,
                                    'dictionary_name' => $dictionary_name,
                                    'word_id' => $word->id
                                ]) }}">削除</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            <tbody>
        </table>
    </div>
</div>
@endsection
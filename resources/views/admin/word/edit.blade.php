@extends('layouts.admin')
@section('title','単語編集')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <h2>単語編集</h2>
                    <form action = "{{ action('Admin\WordController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                            <label class="col-md-2" for="word_label">単語名</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="word" value="{{ $word_form->word }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2" for="explain_label">説明</label>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="6" name="explain">{{ $word_form->explain }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2" for="type_label">分類</label>
                            <div class="col-md-10">
                                <select class="parent" name="type" id= "main">
                                    <option value="">単語の分類を選択してください</option>
                                        @foreach($main_categories as $main_category)
                                            <option value="{{ $main_category->id }}">{{ $main_category->name }}</option>
                                        @endforeach
                                </select>
                                    
                                <select class="children" name="type2" id= "sub">
                                    <option value="">単語の詳細な分類を選択してください</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                                <input type="hidden" name="id"value="{{ $word_form->id }}">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-primary" value="追加">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
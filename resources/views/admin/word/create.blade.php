@extends('layouts.admin')
@section('title', '単語登録')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <h2>単語登録</h2>
                    <form action="{{ action('Admin\WordController@create') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
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
                                <input type="text" class="form-control" name="word" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2" for="explain_label">説明</label>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="6" name="explain"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2" for="type_label">分類</label>
                            <div class="col-md-10">
                                <select class="parent" name="type">
                                    <option value="">単語の分類を選択してください</option>
                                        @foreach($types as $type)
                                            <option value="{{ $type }}">{{ $type }}</option>
                                        @endforeach
                                </select>
                                <select class="children" name="type2">
                                    <option value="">単語の詳細な分類を選択してください</option>
                                        @if($type == "プログラミング言語"){
                                            <option value="php">PHP用語</option>
                                            <option value="その他">その他</option>
                                            break;
                                        } elseif($type == "その他"{
                                            <option value="その他B">その他B</option>
                                            break;
                                        } else{
                                            <option value="">---</option>
                                            break;
                                        }
                                        @endif
                                </select>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="追加">
                    </form>
                </div>
            </div>
        </div>
@endsection

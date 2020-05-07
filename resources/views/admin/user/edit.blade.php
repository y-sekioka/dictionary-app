@extends('layouts.user')
@section('title', 'ユーザー情報編集')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action = "{{ route('user.update', $auth->id)}}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                            <label class="col-md-2" for="user_label">ユーザー名</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name" value="{{ $auth->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2" for="email_label">メールアドレス</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="email" value="{{ $auth->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2" for="theme_label">カラーテーマ</label>
                            <div class="col-md-6">
                                <input id="yellow" type="radio" class="form-control @error('theme') is-invalid @enderror" name="theme" value="yellow" required autocomplete="color_theme" autofocus>
                                <label for="yellow">yellow</label>
                                <input id="white" type="radio" class="form-control @error('theme') is-invalid @enderror" name="theme" value="white" required autocomplete="color_theme" autofocus>
                                <label for="white">white</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                                <input type="hidden" name="id"value="{{ $auth->id }}">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-primary" value="編集">
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
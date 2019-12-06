<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>辞書サイトトップページ</title>
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
        <link href="{{ asset('css/top.css') }}" rel ="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row row-title">
                <h1>辞書サイトトップページ</h1>
            </div>
            <div class="row row-big">
                <a href="{{ action('Admin\WordController@second') }}">IT辞書へ</a>
            </div>
            <div class="row">
                <form action="{{ action('Admin\WordController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-4">IT辞書の<br>単語名</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                            {{ csrf_field() }}
                        </div>
                    
                        <div class="col-md-2">
                        <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
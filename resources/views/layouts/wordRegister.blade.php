<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れる。 --}}
        <title>@yield('title')</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script>
            $(function(){
                $("#main").on('change',function(){
                    var mainId = $(this).val();
                    $.ajax({
                    beforeSend: function(jqXHR) {
                        return jqXHR.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
                    },
                    url:'create/json1',
                    dataType:'json',
                    type:'POST',
                    data:{
                        "mainId": mainId
                    },
                }).done(function(data,jqXHR){
                    //サブカテゴリの更新
                    $('#sub').html("<option value=''>単語の詳細な分類を選択してください</option>");
                   console.log(data);
                   $.each(data,function(i,val){
                       $('#sub').append($("<option>").val(val.id).text(val.name));
                   });
                }).fail(function (jqXHR, status, error) {
                    //通信失敗時のエラーをログに出力
                    console.log(error);
                });
            });
        });
        </script>
        <script>//フラッシュメッセージをフェードアウト
            $(function(){
                $('.flash_message_white').fadeOut(3000);
            });
        </script>
        <link rel="dns-prefetch" href= "https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/admin.css') }}" rel ="stylesheet">
    </head>
    <body>
        <div id="app">
           {{-- 画面上部に表示するナビゲーションバー。 --}}
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ action('Admin\WordController@second') }}">IT辞典</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ action('Admin\WordController@top') }}">トップページへ</a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                        </ul>
                    </div>
                </div>
            </nav>
            {{-- ここまでナビゲーションバー --}}

            <main class="py-4">
                {{-- コンテンツをここに入れる --}}
                @yield('content')
            </main>
        </div>
    </body>
</html>
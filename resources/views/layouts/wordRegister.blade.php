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
        <script src="{{ asset('js/tabindex.js') }}" defer></script>
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
    <body style="background-image: url('/css/img/{{Auth::user()->theme}}.jpg');">
        <div id="app">
           {{-- 画面上部に表示するナビゲーションバー。 --}}
           <nav class="navbar navbar-expand-md navbar-laravel global_nav">
            <div class="container">
                <a class="navbar-brand" href="{{ action('Admin\WordController@top') }}">{{"My辞書"}}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto nav-items">
                        <li class="nav-item">
                            <a class="nav-link nav-border" href="{{ action('Admin\WordController@top') }}">トップページへ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-border" href="{{ action('Admin\WordController@add') }}">単語登録へ</a>
                        </li>
                        <li class="nav-item nav-border nav-link dropdwn">カテゴリ登録へ
                            <ul class="drop_menu">
                                <li><a class="nav-link nav-category" href="{{ action('Admin\CategoryController@get_dictionary')}}">辞書登録</a></li>
                                <li><a class="nav-link nav-category" href="{{ action('Admin\CategoryController@get_main_category')}}">メインカテゴリ登録</a></li>
                                <li><a class="nav-link nav-category" href="{{ action('Admin\CategoryController@get_sub_category')}}">サブカテゴリ登録</a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('login') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
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
        {{-- script --}}
        <script src="{{ asset('js/app.js') }}" defer></script>
        {{-- PC版サイトにてカテゴリ登録のドロップダウンを表示させる --}}
        <script> $(function(){
        $('.dropdwn').hover(function(){
            $("ul:not(:animated)", this).slideDown();
        }, function(){
            $('.drop_menu',this).slideUp();
        });
    });
        </script>
        {{-- モバイル版サイトにてカテゴリ登録のスライドダウンを表示させる --}}
        <script> $(function(){
            $('.dropdwn').click(function(){
                $("ul:not(:animated)", this).slideToggle(200);
            });
        });
        </script>
        @yield('script')
    </body>
</html>
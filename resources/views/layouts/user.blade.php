<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        <link rel="dns-prefetch" href= "https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/admin.css') }}" rel ="stylesheet">
        <link href="{{ asset('css/user.css') }}" rel ="stylesheet">
        <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    </head>
    <body style="background-image: url('/css/img/{{Auth::user()->theme}}.jpg');">
        <div id="app">
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
                                <ul class="drop_menu dropdwn_space">
                                    <li><a class="nav-link nav-category" href="{{ action('Admin\CategoryController@get_dictionary')}}">辞書登録</a></li>
                                    <li><a class="nav-link nav-category" href="{{ action('Admin\CategoryController@get_main_category')}}">メインカテゴリ登録</a></li>
                                    <li><a class="nav-link nav-category" href="{{ action('Admin\CategoryController@get_sub_category')}}">サブカテゴリ登録</a></li>
                                </ul>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="py-4">
                {{-- コンテンツをここに入れる --}}
                @yield('content')
            </main>
        </div>
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
    </body>
</html>
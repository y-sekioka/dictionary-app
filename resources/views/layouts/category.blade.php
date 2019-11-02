<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel ="stylesheet">
</head>
<body>
    <div id="app">
        {{-- 画面上部に表示するナビゲーションバーです。 --}}
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
             {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
             @yield('content')
         </main>
     </div>
</body>
</html>
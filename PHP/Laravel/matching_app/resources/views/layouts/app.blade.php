<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- jQuery -->
    <script src="{{ asset('js/jquery-3.6.4.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- popper JS -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
</head>
<body>
<div id="app">
    <div class="tbg">
        <div class="theader">
            <!-- .navbar-expand-md：中サイズデバイス以上で、ナビゲーションバーをフル幅に拡張 -->
            <!-- .navbar-light：ナビゲーションバーを明るい背景色にします。 -->
            <!-- .bg-white：背景色を白色に設定 -->
            <nav class="navbar navbar-expand-md navbar-light bg-white">
                <!-- .container：固定幅のコンテナを作成 -->
                <div class="container"> 
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <!-- .navbar-nav：ナビゲーションバー内のリスト要素を水平に配置し、アイテム間の余白を追加 -->
                        <!-- .mr-auto：左側に寄せる -->
                        <ul class="navbar-nav mr-auto">
                            @auth
                                <!-- .nav-item：ナビゲーションバー内のアイテムを示す -->
                                <li class="nav-item">
                                    <!-- .nav-link：ナビゲーションバー内のアイテムのリンクを表す -->
                                    <a id="logout-link" class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket fa-3x"></i>
                                    </a>
                                    <form id="logout-form" method="POST" action="{{ route('logout') }}" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @endauth
                        </ul>

                        <!-- .navbar-nav：ナビゲーションバー内のリスト要素を水平に配置し、アイテム間の余白を追加 -->
                        <!-- .mx-auto：中央に寄せる -->
                        <ul class="navbar-nav mx-auto">
                            <!-- .nav-item：ナビゲーションバー内のアイテムを示す -->
                            <li class="nav-item">
                                <a class="navbar-brand" href="{{ url('/myPage') }}">
                                    <img class="logo_img" src="https://cdn.worldvectorlogo.com/logos/hitotsuyama-racing.svg"  alt="logo" title="logo" style="width: 250px; height: 65px;">
                                </a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <!-- .navbar-nav：ナビゲーションバー内のリスト要素を水平に配置し、アイテム間の余白を追加 -->
                        <!-- .ml-auto：右側に寄せる -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <!-- .nav-item：ナビゲーションバー内のアイテムを示す -->
                                    <li class="nav-item">
                                        <!-- .nav-link：ナビゲーションバー内のアイテムのリンクを表す -->
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('auth.login.title') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <!-- .nav-item：ナビゲーションバー内のアイテムを示す -->
                                    <li class="nav-item">
                                        <!-- .nav-link：ナビゲーションバー内のアイテムのリンクを表す -->
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('auth.register.title') }}</a>
                                    </li>
                                @endif
                            @else
                                <!-- .nav-item：ナビゲーションバー内のアイテムを示す -->
                                <li class="nav-item">
                                    <!-- .nav-link：ナビゲーションバー内のアイテムのリンクを表す -->
                                    <a class="nav-link" href="{{ route('matches.index') }}">
                                        <i class="fa fa-comments fa-3x" aria-hidden="true"></i>
                                    </a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        @if (session('flash_message'))
            <div class="flash_message bg-success text-center py-3 my-0">
                {{ session('flash_message') }}
            </div>
        @endif

        <div class="tbgwrap">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
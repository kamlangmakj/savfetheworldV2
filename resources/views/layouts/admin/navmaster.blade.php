<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') - SAV'FE THE WORLD</title>
    <link rel="shortcut icon" href="{{ url('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ url('favicon.ico') }}" type="image/x-icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/03d35952e5.js" crossorigin="anonymous"></script>
    <!-- Google Font: Prompt -->
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"
         style="z-index: 999;position: fixed;left: 0;top: 0;width: 100%;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ url('img/logobig_white.png') }}" alt="Savfetheworld Logo" class="brand-image "
                     style="opacity: .8; height: 40px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ url('/login') }}"
                           class="nav-link navbarStyle @if(Request::is('login')) active @endif">{{ __('เข้าสู่ระบบ [USER]') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/register') }}"
                           class="nav-link navbarStyle @if(Request::is('register')) active @endif">{{ __('สมัครสมาชิก [USER]') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin') }}"
                           class="nav-link navbarStyle @if(Request::is('admin*')) active @endif">{{ __('เข้าสู่ระบบ [ADMIN]') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>

<!-- Jquery-3.4.1 -->
<script src="{{ url('js/jquery-3.4.1.slim.js') }}"></script>
<!-- Popper -->
<script src="{{ url('js/popper.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ url('js/bootstrap.js') }}"></script>
<!-- Main -->
<script src="{{ url('js/main.js') }}"></script>
</body>
</html>

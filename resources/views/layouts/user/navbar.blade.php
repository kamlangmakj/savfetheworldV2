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
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/03d35952e5.js" crossorigin="anonymous"></script>
    <link href="{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Google Font: Prompt -->
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
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
                    <li class="nav-item" style="margin-top: auto; margin-bottom: auto;">
                        <a href="{{ url('/') }}" class="nav-link navbar @if(Request::is('/')) active @endif">หน้าแรก</a>
                    </li>
                    <li class="nav-item" style="margin-top: auto; margin-bottom: auto;">
                        <a href="{{ url('/activity') }}"
                           class="nav-link navbar @if(Request::is('activity*')) active @endif">กิจกรรม</a>
                    </li>
                    <li class="nav-item" style="margin-top: auto; margin-bottom: auto;">
                        <a href="{{ url('/reward') }}"
                           class="nav-link navbar @if(Request::is('reward*')) active @endif">ของรางวัล</a>
                    </li>

                    {{--                    <li class="nav-item">--}}
                    {{--                        <a href="{{ url('/about') }}" class="nav-link navbarStyle @if(Request::is('about*')) active @endif">เกี่ยวกับเรา</a>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="nav-item">--}}
                    {{--                        <a href="{{ url('/contact') }}" class="nav-link navbarStyle @if(Request::is('contact*')) active @endif">ติดต่อเรา</a>--}}
                    {{--                    </li>--}}
                    @guest
                        <li class="nav-item dropdown">
                            {{csrf_field()}}
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                สมาชิก
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('login') }}">เข้าสู่ระบบ</a>
                                <a class="dropdown-item" href="{{ route('register') }}">สมัครสมาชิก</a>
                            </div>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link navbar" href="{{ route('login') }}">{{ __('เข้าสู่ระบบ') }}</a>--}}
{{--                        </li>--}}
                        @if (Route::has('register'))
{{--                            <a class="nav-link navbar" href="{{ route('register') }}">{{ __('สมัครสมาชิก') }}</a>--}}
                        @endif
                        @else

                        <li class="nav-item" style="margin-top: auto; margin-bottom: auto;">
                            <a href="#" class="nav-link">
                                <label class="mt-2" style="font-weight: bold">
                                    <i class="nav-icon fas fa-bell"></i>
                                    <span class="badge badge-info right" style="background-color: red;">
                                         0
                                     </span>
                                </label>
                            </a>
                        </li>

                        <li class="nav-item" style="margin-top: auto; margin-bottom: auto;">
                            <label class="mt-2" style="font-weight: bold">
                                <span class="badge badge-info right" style="background-color: #2BC685;">
{{--                                    <i class="nav-icon fas fa-star"></i>--}}
                                     แต้มสะสม {{ Auth::user()->point }} แต้ม
                                 </span>
                            </label>
                        </li>

                        <li class="nav-item dropdown">
                            {{csrf_field()}}
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img class="image-profile-login"
                                     src="/{{ Auth::user()->image }}"/> {{ Auth::user()->name }} <span
                                        class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/profile') }}">โปรไฟล์ของฉัน</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('ออกจากระบบ') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

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
<!-- sweetalert2 -->
<script src="{{ url('js/sweetalert2.min.js') }}"></script>
<!-- Contact -->
<script src="{{ url('js/contact.js') }}"></script>
<!-- Main -->
<script src="{{ url('js/main.js') }}"></script>

<script>
    $('#btnCheck').on('click',function () {
        var data=$('#number').val();
        var data2=$('#number2').val();

        console.log(data2);

        if(data == data2){
            Swal.fire(
                'รหัสยืนยันถูกต้อง',
                'ยืนยันการเข้าร่วมกิจกรรมเรียบร้อยแล้ว',
                'success'
            )
        }
        else {
            Swal.fire(
                'รหัสยืนยันผิดพลาด',
                'กรุณากรอกใหม่อีกครั้งเพื่อยืนยันการเข้าร่วมกิจกรรม',
                'error'
            )
        }
    })
</script>


</body>
</html>

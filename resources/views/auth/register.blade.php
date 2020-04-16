{{--@extends('layouts.app')--}}
@extends('layouts.user.navmaster')
@section('title', 'Register')

@section('content')
    <div class="container" style="margin-top: 60px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('สมัครสมาชิก [USER]') }}</div>

                    <div class="card-body">
                        <form id="regForm" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-4 text-center">
                                <div class="row">
                                    <div class="col-3">
                                        <span class="step mb-2">1</span>
                                        <p style="color:#000;">ขั้นตอนที่ 1</p>
                                    </div>
                                    <div class="col-3">
                                        <span class="step mb-2">2</span>
                                        <p style="color:#000;">ขั้นตอนที่ 2</p>
                                    </div>
                                    <div class="col-3">
                                        <span class="step mb-2">3</span>
                                        <p style="color:#000;">ขั้นตอนที่ 3</p>
                                    </div>
                                    <div class="col-3">
                                        <span class="step mb-2">4</span>
                                        <p style="color:#000;">ขั้นตอนที่ 4</p>
                                    </div>
                                </div>

                            </div>

                            <div class="tab">
                                <div class="form-group row">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name') }}" required autocomplete="name" autofocus
                                               oninput="this.className">

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right">{{ __('อีเมล') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password"
                                               required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm"
                                           class="col-md-4 col-form-label text-md-right">{{ __('ยืนยันรหัสผ่าน') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>

                            <div class="tab">
                                <div class="form-group row">
                                    <label for="phone"
                                           class="col-md-4 col-form-label text-md-right">{{ __('เบอร์โทรศัพท์') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="phone"
                                               value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{--                            <div class="form-group row mb-0">--}}
                            {{--                                <div class="col-md-6 offset-md-4">--}}
                            {{--                                    <button type="submit" class="btn-savfe btn-main-savfe">--}}
                            {{--                                        {{ __('สมัครสมาชิก') }}--}}
                            {{--                                    </button>--}}
                            {{--                                    @if (Route::has('password.request'))--}}
                            {{--                                        <a class="btn btn-link-savfe " href="{{ route('login') }}">--}}
                            {{--                                            {{ __('เป็นสมาชิกอยู่แล้ว?') }}--}}
                            {{--                                        </a>--}}
                            {{--                                    @endif--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            <div style="overflow:auto;">
                                <div class="mt-3" style="float:right;">
                                    <button type="button" id="prevBtn" class="btn-savfe" onclick="nextPrev(-1)">
                                        ย้อนกลับ
                                    </button>
                                    <button type="button" id="nextBtn" class="btn-savfe btn-main-savfe"
                                            onclick="nextPrev(1)">ต่อไป
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

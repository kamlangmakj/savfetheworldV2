@extends('layouts.user.navbar')
@section('title', 'Profile')
@section('content')
    <div class="container" style="margin-top: 80px;">
        {{csrf_field()}}
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 38px; font-weight: bold">โปรไฟล์ของฉัน</p>
                        @include('layouts.user.title_savfe')
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="#" style="color: #2BC685;font-size: 36px;float: right"><i class="fas fa-calendar-alt"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row p-4" style="border: 1px solid #acacac;border-radius: 6px">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 text-center">
                    <img class="image-profile" src="/{{ Auth::user()->image }}" />
                </div>
                <div class="profile-content-savfe col-12 col-sm-12 col-md-8 col-lg-8">
                    <h5 class="mt-2">ชื่อผู้ใช้งาน : {{ Auth::user()->name }}</h5>
                    <p style="color: #acacac">id : user-{{ Auth::user()->id }}</p>
                    <h3 style="color: #2BC685;font-weight: bold">แต้มสะสม : {{ Auth::user()->point }}</h3>
                    <a style="width: 100%" href="{{ url('profile/edit',Auth::user()->id ) }}" class="btn btn-warning mt-3"><i class="fas fa-cog"></i> แก้ไขโปรไฟล์</a>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="container">--}}
{{--        <h1>สวัสดี {{ Auth::user()->name }}</h1>--}}
{{--        <p>{{ Auth::user()->id }}</p>--}}
{{--    </div>--}}
    @include('layouts.user.footer_savfe')
@endsection


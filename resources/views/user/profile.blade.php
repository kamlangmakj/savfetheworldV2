@extends('layouts.user.navbar')
@section('title', 'Profile')
@section('content')
    <div class="container" style="margin-top: 80px;">
        {{csrf_field()}}
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-8 col-sm-8 col-md-6 col-lg-6">
                        <p style="font-size: 24px; font-weight: bold">โปรไฟล์ของฉัน</p>
                        @include('layouts.user.title_savfe')
                    </div>
                    {{--                    <div class="col-4 col-sm-4 col-md-6 col-lg-6">--}}
                    {{--                        <a href="#" style="color: #2BC685;font-size: 36px;float: right"><i class="fas fa-calendar-alt"></i></a>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row p-4" style="border: 1px solid #acacac;border-radius: 6px">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 text-center">
                    <img class="image-profile" src="/{{ Auth::user()->image }}"/>
                </div>
                <div class="profile-content-savfe col-12 col-sm-12 col-md-8 col-lg-8">
                    <h3 class="mt-2">{{ Auth::user()->name }}</h3>
                    <p style="color: #acacac">id : user-{{ Auth::user()->id }}</p>
                    <label class="mt-2" style="font-weight: bold;font-size: 24px;text-align: center">
                        <span class="badge badge-info p-3" style="border-radius:50px;width:100%;background-color: #2BC685;">
                             แต้มสะสม {{ Auth::user()->point }} แต้ม
                         </span>
                    </label>
                    <a style="width: 100%" href="{{ url('profile/edit',Auth::user()->id ) }}"
                       class="btn btn-light mt-3" style="background-color: #acacac!important;"><i class="fas fa-cog"></i> แก้ไขโปรไฟล์</a>
                </div>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 mt-3">
                <div class="card cardHover1">
                    <a href="{{url('profile/join_activities_history')}}">
                        <div class="card-body mt-5 mb-5">
                            <i class="far fa-calendar-alt mb-5" style="font-size: 48px;"></i><br>กิจกรรมที่บันทึกไว้
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 mt-3">
                <div class="card cardHover2">
                    <a href="{{url('profile/get_rewards_history')}}">
                        <div class="card-body mt-5 mb-5">
                            <i class="far fa-star mb-5" style="font-size: 48px;"></i><br>ของรางวัลที่บันทึกไว้
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 mt-3">
                <div class="card cardHover3">
                    <a href="{{url('profile/join_activities_history')}}">
                        <div class="card-body mt-5 mb-5">
                            <i class="fa fa-calendar-alt mb-5" style="font-size: 48px;"></i><br>ประวัติการร่วมกิจกรรม
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 mt-3">
                <div class="card cardHover4">
                    <a href="{{url('profile/get_rewards_history')}}">
                        <div class="card-body mt-5 mb-5">
                            <i class="fas fa-star mb-5" style="font-size: 48px;"></i><br>ประวัติการแลกของรางวัล
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.user.footer_savfe')
@endsection


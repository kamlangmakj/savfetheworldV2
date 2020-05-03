@extends('layouts.user.navbar')
@section('title', 'Activity')
@section('content')
    <div class="container" style="margin-top: 80px;">
        <div class="row">
            <div class="container">
                <div class="row">
                    @guest
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <p style="font-size: 24px; font-weight: bold">กิจกรรมที่น่าสนใจ</p>
                            @include('layouts.user.title_savfe')
                        </div>
                    @else
                        <div class="col-8 col-sm-8 col-md-10 col-lg-10">
                            <p style="font-size: 24px; font-weight: bold">กิจกรรมที่น่าสนใจ</p>
                            @include('layouts.user.title_savfe')
                        </div>
                        <div class="col-4 col-sm-4 col-md-2 col-lg-2">
                            <a class="btn " href="{{ url('/profile/save_activities_history') }}" style="color: #2BC685;font-size: 36px;float: right">
                                <i class="fas fa-calendar-alt"></i><sup><span class="badge badge-info right"
                                                                              style="margin-left:-12px;background-color: #FF0000;font-size: 15px;">{{$saveActivitiesCount}}</span></sup>
                            </a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>

            </ol>
            <div class="carousel-inner">
                @foreach($slides1 as $key => $slide1)
                    <div class="carousel-item {{$key == 0 ? 'active' : null}}">
                        <img src="{{ $slide1->image }}" class="d-block w-100">
                        <div class="layer">
                        </div>
                        <div class="carousel-caption d-none d-md-block" style="text-shadow: 0 0 3px #000;">
                            <h1 style="font-weight: bold">{{ $slide1->name }}</h1>
                            <h4 style="font-weight: bold">ได้รับแต้ม {{ $slide1->point }} แต้ม</h4>
                            <label>เริ่มวันที่ {{Carbon\Carbon::parse($slide1->started_date)->addYear(543)->translatedFormat('d M Y')}}
                                - {{Carbon\Carbon::parse($slide1->expired_date)->addYear(543)->translatedFormat('d M Y')}}</label>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

{{--    <div class="container mt-5">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12 col-sm-12 col-md-12 col-lg-12">--}}
{{--                <p style="font-size: 24px;">กิจกรรมพิเศษ</p>--}}
{{--                @include('layouts.user.title_savfe')--}}
{{--            </div>--}}
{{--        </div>--}}



{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-6 col-md-6" style="background-color: red;width: 100%;height: 600px;">--}}

{{--                </div>--}}
{{--                <div class="col-lg-6 col-md-6" style="width: 100%;height: 600px">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-12 col-md-12" style="background-color: green;width: 100%;height: 300px">--}}

{{--                        </div>--}}
{{--                        <div class="col-lg-12 col-md-12" style="background-color: blue;width: 100%;height: 300px;">--}}

{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="container mt-5">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12 col-sm-12 col-md-12 col-lg-12">--}}
{{--                <p style="font-size: 24px;">กิจกรรมพิเศษ</p>--}}
{{--                @include('layouts.user.title_savfe')--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            @foreach($contents_1 as $content_1)--}}
{{--                <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">--}}
{{--                    <div class="card">--}}
{{--                        <a href="{{ url('/activity_detail',$content_1->id ) }}" style="text-decoration: none;">--}}
{{--                            <img class="card-img-top" src="{{ $content_1->image }}" alt="Card image cap"--}}
{{--                                 style="height: 200px">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row mt-2 mb-2">--}}
{{--                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">--}}
{{--                                        <small class="card-text" style="color: red;font-weight: bold;"><i--}}
{{--                                                    class="fas fa-hourglass-half"></i>--}}
{{--                                            เหลือเวลาอีก {{Carbon\Carbon::parse($content_1->expired_date)->shortRelativeToOtherDiffForHumans()}}--}}
{{--                                        </small>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">--}}
{{--                                        <small style="color: #acacac"><i class="fas fa-history"></i>--}}
{{--                                            อัปเดตเมื่อ {{Carbon\Carbon::parse($content_1->updated_at)->diffForHumans()}}--}}
{{--                                        </small>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-12 col-md-6 col-lg-12">--}}
{{--                                        <small class="card-text"--}}
{{--                                               style="color: #acacac;">{{Carbon\Carbon::parse($content_1->started_date)->addYear(543)->translatedFormat('d M y')}}--}}
{{--                                            - {{Carbon\Carbon::parse($content_1->expired_date)->addYear(543)->translatedFormat('d M y')}}</small>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h3 style="font-weight: bold;color: #000000"--}}
{{--                                    class="card-title title-content-savfe">{{ $content_1->name }}</h3>--}}
{{--                                <h6 class="card-text" style="color: #2BC685;font-weight: bold;">--}}
{{--                                    ได้รับแต้ม {{ $content_1->point }} แต้ม</h6>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        <hr>--}}
{{--    </div>--}}

    <div class="section-header text-center mt-5">
        <div>
            <h4>หมวดหมู่กิจกรรม</h4>
        </div>
        <hr style="width: 20%; border: 1px solid #2BC685;">
    </div>
    <div class="container mt-5 mb-5">
        <ul class="nav nav-pills mb-3 col-12 text-center" id="pills-tab" role="tablist">
            <li class="nav-item col-6 col-sm-6 col-md-2 offset-md-2 col-lg-2 offset-lg-2">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#tab0" role="tab"
                   aria-selected="true">ทั้งหมด</a>
            </li>
            <li class="nav-item col-6 col-sm-6 col-md-2 col-lg-2">
                <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#tab1" role="tab" aria-selected="true">ป่าไม้</a>
            </li>
            <li class="nav-item col-6 col-sm-6 col-md-2 col-lg-2">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#tab2" role="tab"
                   aria-selected="false">ทะเล</a>
            </li>
            <li class="nav-item col-6 col-sm-6 col-md-2 col-lg-2">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#tab3" role="tab"
                   aria-selected="false">ชุมชน</a>
            </li>
        </ul>

        <div class="tab-content mt-5" id="pills-tabContent">
            <div class="tab-pane fade show active" id="tab0" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row mt-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <p style="font-size: 24px;">กิจกรรมล่าสุด</p>
                                @include('layouts.user.title_savfe')
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <a href="{{url('activity_news_detail/latest')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                                    <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($contents_2 as $activitie)
                                @if($activitie == true)
                                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                        <div class="card event">
                                            <a href="{{ url('/activity_detail',$activitie->id ) }}"
                                               style="text-decoration: none;">
                                                @if ($activitie->joinActivities->count() == $activitie->amount)
                                                    <div class="budget-full">
                                                        เต็ม
                                                    </div>
                                                @endif
                                                <div class="card-img-wrapper">
                                                    <img src="{{ $activitie->image }}"
                                                         alt="Card image cap">
                                                </div>
                                                <div class="card-body">
                                                    @if($activitie->category_types_activity->id < 11)
                                                    <small class="sub-title-forest">{{$activitie->category_types_activity->name}}</small>
                                                        @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                                            <small class="sub-title-sea">{{$activitie->category_types_activity->name}}</small>
                                                        @else
                                                            <small class="sub-title-country">{{$activitie->category_types_activity->name}}</small>
                                                    @endif
                                                    <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>
                                                    <label class="date">
                                                        {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                                        - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                                    </label>

                                                    <p class="text-content">{{$activitie->short_detail}}</p>
                                                    <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <small class="text-muted">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        {{$activitie->province->PROVINCE_NAME}}
                                                    </small>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                @endif
                            @endforeach
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <p style="font-size: 24px;">กิจกรรมยอดนิยม</p>
                                @include('layouts.user.title_savfe')
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <a href="{{url('activity_news_detail/popular')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                                    <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($contents_3 as $activitie)
                                @if($activitie == true)
                                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                        <div class="card event">
                                            <a href="{{ url('/activity_detail',$activitie->id ) }}"
                                               style="text-decoration: none;">
                                                @if ($activitie->joinActivities->count() == $activitie->amount)
                                                    <div class="budget-full">
                                                        เต็ม
                                                    </div>
                                                @endif
                                                <div class="card-img-wrapper">
                                                    <img src="{{ $activitie->image }}"
                                                         alt="Card image cap">
                                                </div>
                                                <div class="card-body">
                                                    @if($activitie->category_types_activity->id < 11)
                                                        <small class="sub-title-forest">{{$activitie->category_types_activity->name}}</small>
                                                    @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                                        <small class="sub-title-sea">{{$activitie->category_types_activity->name}}</small>
                                                    @else
                                                        <small class="sub-title-country">{{$activitie->category_types_activity->name}}</small>
                                                    @endif
                                                    <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>
                                                    <label class="date">
                                                        {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                                        - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                                    </label>

                                                    <p class="text-content">{{$activitie->short_detail}}</p>
                                                    <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <small class="text-muted">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        {{$activitie->province->PROVINCE_NAME}}
                                                    </small>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                @endif
                            @endforeach
                        </div>
                        <hr>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <p style="font-size: 24px;">กิจกรรมที่มีแต้มสะสมมากที่สุด</p>
                                @include('layouts.user.title_savfe')
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <a href="{{url('activity_news_detail/mostpoints')}}"
                                   style="color: #2BC685;float: right">ดูทั้งหมด <i
                                            class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($contents_4 as $activitie)
                                @if($activitie == true)
                                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                        <div class="card event">
                                            <a href="{{ url('/activity_detail',$activitie->id ) }}"
                                               style="text-decoration: none;">
                                                @if ($activitie->joinActivities->count() == $activitie->amount)
                                                    <div class="budget-full">
                                                        เต็ม
                                                    </div>
                                                @endif
                                                <div class="card-img-wrapper">
                                                    <img src="{{ $activitie->image }}"
                                                         alt="Card image cap">
                                                </div>
                                                <div class="card-body">
                                                    @if($activitie->category_types_activity->id < 11)
                                                        <small class="sub-title-forest">{{$activitie->category_types_activity->name}}</small>
                                                    @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                                        <small class="sub-title-sea">{{$activitie->category_types_activity->name}}</small>
                                                    @else
                                                        <small class="sub-title-country">{{$activitie->category_types_activity->name}}</small>
                                                    @endif
                                                    <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>
                                                    <label class="date">
                                                        {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                                        - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                                    </label>

                                                    <p class="text-content">{{$activitie->short_detail}}</p>
                                                    <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <small class="text-muted">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        {{$activitie->province->PROVINCE_NAME}}
                                                    </small>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                @endif
                            @endforeach
                        </div>
                        <hr>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab1" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row mt-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <p style="font-size: 24px;">กิจกรรมล่าสุด</p>
                                @include('layouts.user.title_savfe')
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <a href="{{url('activity_news_detail/forest-latest')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                                    <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($contents_2_2 as $activitie)
                                @if($activitie == true)
                                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                        <div class="card event">
                                            <a href="{{ url('/activity_detail',$activitie->id ) }}"
                                               style="text-decoration: none;">
                                                @if ($activitie->joinActivities->count() == $activitie->amount)
                                                    <div class="budget-full">
                                                        เต็ม
                                                    </div>
                                                @endif
                                                <div class="card-img-wrapper">
                                                    <img src="{{ $activitie->image }}"
                                                         alt="Card image cap">
                                                </div>
                                                <div class="card-body">
                                                    @if($activitie->category_types_activity->id < 11)
                                                        <small class="sub-title-forest">{{$activitie->category_types_activity->name}}</small>
                                                    @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                                        <small class="sub-title-sea">{{$activitie->category_types_activity->name}}</small>
                                                    @else
                                                        <small class="sub-title-country">{{$activitie->category_types_activity->name}}</small>
                                                    @endif
                                                    <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>
                                                    <label class="date">
                                                        {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                                        - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                                    </label>

                                                    <p class="text-content">{{$activitie->short_detail}}</p>
                                                    <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <small class="text-muted">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        {{$activitie->province->PROVINCE_NAME}}
                                                    </small>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                @endif
                            @endforeach
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <p style="font-size: 24px;">กิจกรรมยอดนิยม</p>
                                @include('layouts.user.title_savfe')
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <a href="{{url('activity_news_detail/forest-popular')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                                    <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($contents_3_2 as $activitie)
                                @if($activitie == true)
                                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                        <div class="card event">
                                            <a href="{{ url('/activity_detail',$activitie->id ) }}"
                                               style="text-decoration: none;">
                                                @if ($activitie->joinActivities->count() == $activitie->amount)
                                                    <div class="budget-full">
                                                        เต็ม
                                                    </div>
                                                @endif
                                                <div class="card-img-wrapper">
                                                    <img src="{{ $activitie->image }}"
                                                         alt="Card image cap">
                                                </div>
                                                <div class="card-body">
                                                    @if($activitie->category_types_activity->id < 11)
                                                        <small class="sub-title-forest">{{$activitie->category_types_activity->name}}</small>
                                                    @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                                        <small class="sub-title-sea">{{$activitie->category_types_activity->name}}</small>
                                                    @else
                                                        <small class="sub-title-country">{{$activitie->category_types_activity->name}}</small>
                                                    @endif
                                                    <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>
                                                    <label class="date">
                                                        {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                                        - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                                    </label>

                                                    <p class="text-content">{{$activitie->short_detail}}</p>
                                                    <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <small class="text-muted">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        {{$activitie->province->PROVINCE_NAME}}
                                                    </small>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                @endif
                            @endforeach
                        </div>
                        <hr>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <p style="font-size: 24px;">กิจกรรมที่มีแต้มสะสมมากที่สุด</p>
                                @include('layouts.user.title_savfe')
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <a href="{{url('activity_news_detail/forest-mostpoints')}}"
                                   style="color: #2BC685;float: right">ดูทั้งหมด <i
                                            class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($contents_4_2 as $activitie)
                                @if($activitie == true)
                                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                        <div class="card event">
                                            <a href="{{ url('/activity_detail',$activitie->id ) }}"
                                               style="text-decoration: none;">
                                                @if ($activitie->joinActivities->count() == $activitie->amount)
                                                    <div class="budget-full">
                                                        เต็ม
                                                    </div>
                                                @endif
                                                <div class="card-img-wrapper">
                                                    <img src="{{ $activitie->image }}"
                                                         alt="Card image cap">
                                                </div>
                                                <div class="card-body">
                                                    @if($activitie->category_types_activity->id < 11)
                                                        <small class="sub-title-forest">{{$activitie->category_types_activity->name}}</small>
                                                    @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                                        <small class="sub-title-sea">{{$activitie->category_types_activity->name}}</small>
                                                    @else
                                                        <small class="sub-title-country">{{$activitie->category_types_activity->name}}</small>
                                                    @endif
                                                    <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>
                                                    <label class="date">
                                                        {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                                        - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                                    </label>

                                                    <p class="text-content">{{$activitie->short_detail}}</p>
                                                    <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <small class="text-muted">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        {{$activitie->province->PROVINCE_NAME}}
                                                    </small>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                @endif
                            @endforeach
                        </div>
                        <hr>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row mt-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <p style="font-size: 24px;">กิจกรรมล่าสุด</p>
                                @include('layouts.user.title_savfe')
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <a href="{{url('activity_news_detail/sea-latest')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                                    <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($contents_2_3 as $activitie)
                                @if($activitie == true)
                                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                        <div class="card event">
                                            <a href="{{ url('/activity_detail',$activitie->id ) }}"
                                               style="text-decoration: none;">
                                                @if ($activitie->joinActivities->count() == $activitie->amount)
                                                    <div class="budget-full">
                                                        เต็ม
                                                    </div>
                                                @endif
                                                <div class="card-img-wrapper">
                                                    <img src="{{ $activitie->image }}"
                                                         alt="Card image cap">
                                                </div>
                                                <div class="card-body">
                                                    @if($activitie->category_types_activity->id < 11)
                                                        <small class="sub-title-forest">{{$activitie->category_types_activity->name}}</small>
                                                    @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                                        <small class="sub-title-sea">{{$activitie->category_types_activity->name}}</small>
                                                    @else
                                                        <small class="sub-title-country">{{$activitie->category_types_activity->name}}</small>
                                                    @endif
                                                    <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>
                                                    <label class="date">
                                                        {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                                        - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                                    </label>

                                                    <p class="text-content">{{$activitie->short_detail}}</p>
                                                    <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <small class="text-muted">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        {{$activitie->province->PROVINCE_NAME}}
                                                    </small>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                @endif
                            @endforeach
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <p style="font-size: 24px;">กิจกรรมยอดนิยม</p>
                                @include('layouts.user.title_savfe')
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <a href="{{url('activity_news_detail/sea-popular')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                                    <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($contents_3_3 as $activitie)
                                @if($activitie == true)
                                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                        <div class="card event">
                                            <a href="{{ url('/activity_detail',$activitie->id ) }}"
                                               style="text-decoration: none;">
                                                @if ($activitie->joinActivities->count() == $activitie->amount)
                                                    <div class="budget-full">
                                                        เต็ม
                                                    </div>
                                                @endif
                                                <div class="card-img-wrapper">
                                                    <img src="{{ $activitie->image }}"
                                                         alt="Card image cap">
                                                </div>
                                                <div class="card-body">
                                                    @if($activitie->category_types_activity->id < 11)
                                                        <small class="sub-title-forest">{{$activitie->category_types_activity->name}}</small>
                                                    @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                                        <small class="sub-title-sea">{{$activitie->category_types_activity->name}}</small>
                                                    @else
                                                        <small class="sub-title-country">{{$activitie->category_types_activity->name}}</small>
                                                    @endif
                                                    <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>
                                                    <label class="date">
                                                        {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                                        - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                                    </label>

                                                    <p class="text-content">{{$activitie->short_detail}}</p>
                                                    <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <small class="text-muted">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        {{$activitie->province->PROVINCE_NAME}}
                                                    </small>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                @endif
                            @endforeach
                        </div>
                        <hr>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <p style="font-size: 24px;">กิจกรรมที่มีแต้มสะสมมากที่สุด</p>
                                @include('layouts.user.title_savfe')
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <a href="{{url('activity_news_detail/sea-mostpoints')}}"
                                   style="color: #2BC685;float: right">ดูทั้งหมด <i
                                            class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($contents_4_3 as $activitie)
                                @if($activitie == true)
                                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                        <div class="card event">
                                            <a href="{{ url('/activity_detail',$activitie->id ) }}"
                                               style="text-decoration: none;">
                                                @if ($activitie->joinActivities->count() == $activitie->amount)
                                                    <div class="budget-full">
                                                        เต็ม
                                                    </div>
                                                @endif
                                                <div class="card-img-wrapper">
                                                    <img src="{{ $activitie->image }}"
                                                         alt="Card image cap">
                                                </div>
                                                <div class="card-body">
                                                    @if($activitie->category_types_activity->id < 11)
                                                        <small class="sub-title-forest">{{$activitie->category_types_activity->name}}</small>
                                                    @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                                        <small class="sub-title-sea">{{$activitie->category_types_activity->name}}</small>
                                                    @else
                                                        <small class="sub-title-country">{{$activitie->category_types_activity->name}}</small>
                                                    @endif
                                                    <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>
                                                    <label class="date">
                                                        {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                                        - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                                    </label>

                                                    <p class="text-content">{{$activitie->short_detail}}</p>
                                                    <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <small class="text-muted">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        {{$activitie->province->PROVINCE_NAME}}
                                                    </small>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                @endif
                            @endforeach
                        </div>
                        <hr>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row mt-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <p style="font-size: 24px;">กิจกรรมล่าสุด</p>
                                @include('layouts.user.title_savfe')
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <a href="{{url('activity_news_detail/country-latest')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                                    <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($contents_2_4 as $activitie)
                                @if($activitie == true)
                                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                        <div class="card event">
                                            <a href="{{ url('/activity_detail',$activitie->id ) }}"
                                               style="text-decoration: none;">
                                                @if ($activitie->joinActivities->count() == $activitie->amount)
                                                    <div class="budget-full">
                                                        เต็ม
                                                    </div>
                                                @endif
                                                <div class="card-img-wrapper">
                                                    <img src="{{ $activitie->image }}"
                                                         alt="Card image cap">
                                                </div>
                                                <div class="card-body">
                                                    @if($activitie->category_types_activity->id < 11)
                                                        <small class="sub-title-forest">{{$activitie->category_types_activity->name}}</small>
                                                    @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                                        <small class="sub-title-sea">{{$activitie->category_types_activity->name}}</small>
                                                    @else
                                                        <small class="sub-title-country">{{$activitie->category_types_activity->name}}</small>
                                                    @endif
                                                    <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>
                                                    <label class="date">
                                                        {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                                        - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                                    </label>

                                                    <p class="text-content">{{$activitie->short_detail}}</p>
                                                    <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <small class="text-muted">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        {{$activitie->province->PROVINCE_NAME}}
                                                    </small>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                @endif
                            @endforeach
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <p style="font-size: 24px;">กิจกรรมยอดนิยม</p>
                                @include('layouts.user.title_savfe')
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <a href="{{url('activity_news_detail/country-popular')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                                    <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($contents_3_4 as $activitie)
                                @if($activitie == true)
                                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                        <div class="card event">
                                            <a href="{{ url('/activity_detail',$activitie->id ) }}"
                                               style="text-decoration: none;">
                                                @if ($activitie->joinActivities->count() == $activitie->amount)
                                                    <div class="budget-full">
                                                        เต็ม
                                                    </div>
                                                @endif
                                                <div class="card-img-wrapper">
                                                    <img src="{{ $activitie->image }}"
                                                         alt="Card image cap">
                                                </div>
                                                <div class="card-body">
                                                    @if($activitie->category_types_activity->id < 11)
                                                        <small class="sub-title-forest">{{$activitie->category_types_activity->name}}</small>
                                                    @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                                        <small class="sub-title-sea">{{$activitie->category_types_activity->name}}</small>
                                                    @else
                                                        <small class="sub-title-country">{{$activitie->category_types_activity->name}}</small>
                                                    @endif
                                                    <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>
                                                    <label class="date">
                                                        {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                                        - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                                    </label>

                                                    <p class="text-content">{{$activitie->short_detail}}</p>
                                                    <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <small class="text-muted">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        {{$activitie->province->PROVINCE_NAME}}
                                                    </small>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                @endif
                            @endforeach
                        </div>
                        <hr>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <p style="font-size: 24px;">กิจกรรมที่มีแต้มสะสมมากที่สุด</p>
                                @include('layouts.user.title_savfe')
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                <a href="{{url('activity_news_detail/country-mostpoints')}}"
                                   style="color: #2BC685;float: right">ดูทั้งหมด <i
                                            class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($contents_4_4 as $activitie)
                                @if($activitie == true)
                                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                        <div class="card event">
                                            <a href="{{ url('/activity_detail',$activitie->id ) }}"
                                               style="text-decoration: none;">
                                                @if ($activitie->joinActivities->count() == $activitie->amount)
                                                    <div class="budget-full">
                                                        เต็ม
                                                    </div>
                                                @endif
                                                <div class="card-img-wrapper">
                                                    <img src="{{ $activitie->image }}"
                                                         alt="Card image cap">
                                                </div>
                                                <div class="card-body">
                                                    @if($activitie->category_types_activity->id < 11)
                                                        <small class="sub-title-forest">{{$activitie->category_types_activity->name}}</small>
                                                    @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                                        <small class="sub-title-sea">{{$activitie->category_types_activity->name}}</small>
                                                    @else
                                                        <small class="sub-title-country">{{$activitie->category_types_activity->name}}</small>
                                                    @endif
                                                    <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>
                                                    <label class="date">
                                                        {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                                        - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                                    </label>

                                                    <p class="text-content">{{$activitie->short_detail}}</p>
                                                    <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <small class="text-muted">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        {{$activitie->province->PROVINCE_NAME}}
                                                    </small>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                @endif
                            @endforeach
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.user.footer_savfe')

@endsection


@extends('layouts.user.navbar')
@section('title', 'Home')
@section('content')
    <div class="image-bg">
    </div>
    <div class="container" style="margin-top: 80px">
        <h6 class="text-center" style="color: #fff">ยินดีต้อนรับเข้าสู่</h6>
        <h1 class="text-center" style="font-size:48px;font-weight: bold;color: #fff">SAV'FE THE WORLD</h1>

        <div class="row mt-5" style="color: #FFFFFF">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                <h5>เวลา</h5>
                <div class="time">
                    <h3 id="time"></h3>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">
                <h5>วัน เดือน ปี</h5>
                <div class="date">
                    <h3 id="dayndate"></h3>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="text-center col-6 col-sm-6 col-md-6 col-lg-3 mt-2">
                <div class="card" style="background-color: #2BC685;color: #fff;">
                    <div class="card-body mt-5 mb-3">
                        <h6 class="card-text"><small class="text">ผู้ใช้งานทั้งหมด</small></h6>
                        <p class="card-text" style="font-size: 52px;font-weight: bold">{{$users->count()}}</p>
                    </div>
                </div>
            </div>
            <div class="text-center col-6 col-sm-6 col-md-6 col-lg-3 mt-2">
                <div class="card" style="background-color: #2BC685;color: #fff;">
                    <div class="card-body mt-5 mb-3">
                        <h6 class="card-text"><small class="text">กิจกรรมทั้งหมด</small></h6>
                        <p class="card-text" style="font-size: 52px;font-weight: bold">{{$activities->count()}}</p>
                    </div>
                </div>
            </div>
            <div class="text-center col-6 col-sm-6 col-md-6 col-lg-3 mt-2">
                <div class="card" style="background-color: #2BC685;color: #fff;">
                    <div class="card-body mt-5 mb-3">
                        <h6 class="card-text"><small class="text">ของรางวัลทั้งหมด</small></h6>
                        <p class="card-text" style="font-size: 52px;font-weight: bold">{{$rewards->count()}}</p>
                    </div>
                </div>
            </div>
            <div class="text-center col-6 col-sm-6 col-md-6 col-lg-3 mt-2">
                <div class="card" style="background-color: #2BC685;color: #fff;">
                    <div class="card-body mt-5 mb-3">
                        <h6 class="card-text"><small class="text">ของรางวัลที่ถูกแลก</small></h6>
                        <p class="card-text" style="font-size: 52px;font-weight: bold">{{$tracking_rewards->count()}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 mb-5">
            <div class="col-4" style="text-align: right">
                <a href="#"><img src="{{ url('img/facebook.png') }}" style="height: 50px;padding: 0 20px"></a>
            </div>
            <div class="col-4" style="text-align: center">
                <a href="#"><img src="{{ url('img/twitter.png') }}" style="height: 50px;padding: 0 20px"></a>
            </div>
            <div class="col-4" style="text-align: left">
                <a href="#"><img src="{{ url('img/instagram.png') }}" style="height: 50px;padding: 0 20px"></a>
            </div>
        </div>
    </div>

    <div class="container start-box">
        <div class="row">
            <div class="container">
                <div>
                    <p style="font-size: 24px;">กิจกรรมที่น่าสนใจ</p>
                    @include('layouts.user.title_savfe')
                </div>

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
                                <label>เริ่มวันที่ {{Carbon\Carbon::parse($slide1->started_date)->addYear(543)->translatedFormat('d M Y')}} - {{Carbon\Carbon::parse($slide1->expired_date)->addYear(543)->translatedFormat('d M Y')}}</label>
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
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div>
            <p style="font-size: 24px; font-weight: bold">กิจกรรมแนะนำ</p>
            @include('layouts.user.title_savfe')
        </div>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @guest
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#tab1" role="tab" aria-selected="true">กิจกรรมเร็วๆนี้</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#tab4" role="tab" aria-selected="false">กิจกรรมที่จบไปแล้ว</a>
                </li>

            @else
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#tab1" role="tab" aria-selected="true">กิจกรรมเร็วๆนี้</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#tab2" role="tab" aria-selected="false">กิจกรรมใกล้เคียงคุณ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#tab3" role="tab" aria-selected="false">กิจกรรมที่ตรงกับคุณ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#tab4" role="tab" aria-selected="false">กิจกรรมที่จบไปแล้ว</a>
                </li>
            @endguest
        </ul>
        <hr>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row mt-3">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">เริ่มภายในวันนี้</p>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('activity_tabs_detail/today')}}" style="color: #2BC685;float: right">ดูทั้งหมด <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                วันนี้วันที่ {{$today}}
                <div class="row">
                    @foreach($tab1_contents_1 as $tab1_content_1)
                        @if($tab1_content_1->started_date > $today)
                            <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                                <div class="card">
                                    <img class="card-img-top" src="{{ $tab1_content_1->image }}" alt="Card image cap" style="height: 200px">
                                    <div class="card-body">
                                        <div class="row mt-2 mb-2">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
{{--                                                <small style="color: #acacac"><i class="fas fa-clock"></i> อัปเดตเมื่อ {{$tab1_content_1->updated_at->addYear(543)->translatedFormat('d M Y H:m น.')}}</small>--}}
                                                <small style="color: #acacac"><i class="fas fa-clock"></i> สร้างเมื่อ {{Carbon\Carbon::parse($tab1_content_1->created_at)->diffForHumans()}}</small>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                {{-- <label>{{Carbon\Carbon::parse($content1->started_date)->diffForHumans()}} - {{$content1->expired_date}}</label>--}}
                                                <label>{{Carbon\Carbon::parse($tab1_content_1->started_date)->addYear(543)->translatedFormat('d M Y')}} - {{Carbon\Carbon::parse($tab1_content_1->expired_date)->addYear(543)->translatedFormat('d M Y')}}</label>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                @if ($tab1_content_1->joinActivities->count() < $tab1_content_1->amount)
                                                    <small class="card-text" style="color: #2BC685;font-weight: bold;"><i class="fas fa-user-clock"></i> จำนวนคนเข้าร่วม {{$tab1_content_1->joinActivities->count()}}/{{$tab1_content_1->amount}} คน</small>
                                                @else
                                                    <small class="card-text" style="color: red;font-weight: bold;"><i class="fas fa-user-times"></i> จำนวนคนเต็มแล้ว {{$tab1_content_1->joinActivities->count()}}/{{$tab1_content_1->amount}} คน</small>
                                                @endif
                                            </div>
                                        </div>
                                        <h3 style="font-weight: bold;" class="card-title title-content-savfe">{{$tab1_content_1->name}}</h3>
                                        <p class="card-text content-savfe">{{$tab1_content_1->detail}}</p>
                                        <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม {{$tab1_content_1->point}} แต้ม</h6>
                                    </div>
                                    <div class="card-footer text-center">
                                        <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                                    </div>
                                </div>
                            </div>
                        @else
                        @endif
                    @endforeach
                </div>
                <hr>

                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">เริ่มภายในสัปดาห์นี้</p>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('activity_tabs_detail/thisweek')}}" style="color: #2BC685;float: right">ดูทั้งหมด <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>

                ตั้งแต่วันที่ {{$startWeek}} - {{$endWeek}}
                <div class="row">
                    @foreach($tab1_contents_2 as $tab1_content_2)
                        @if($tab1_content_2->started_date > $startWeek || $tab1_content_1->start_date < $endWeek)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <img class="card-img-top" src="{{ $tab1_content_2->image }}" alt="Card image cap" style="height: 200px">
                                <div class="card-body">
                                    <div class="row mt-2 mb-2">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <small style="color: #acacac"><i class="fas fa-clock"></i> สร้างเมื่อ {{Carbon\Carbon::parse($tab1_content_2->created_at)->diffForHumans()}}</small>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            {{-- <label>{{Carbon\Carbon::parse($content1->started_date)->diffForHumans()}} - {{$content1->expired_date}}</label>--}}
                                            <label>{{Carbon\Carbon::parse($tab1_content_2->started_date)->addYear(543)->translatedFormat('d M Y')}} - {{Carbon\Carbon::parse($tab1_content_2->expired_date)->addYear(543)->translatedFormat('d M Y')}}</label>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            @if ($tab1_content_2->joinActivities->count() < $tab1_content_2->amount)
                                                <small class="card-text" style="color: #2BC685;font-weight: bold;"><i class="fas fa-user-clock"></i> จำนวนคนเข้าร่วม {{$tab1_content_2->joinActivities->count()}}/{{$tab1_content_2->amount}} คน</small>
                                            @else
                                                <small class="card-text" style="color: red;font-weight: bold;"><i class="fas fa-user-times"></i> จำนวนคนเต็มแล้ว {{$tab1_content_2->joinActivities->count()}}/{{$tab1_content_2->amount}} คน</small>
                                            @endif
                                        </div>
                                    </div>
                                    <h3 style="font-weight: bold;" class="card-title title-content-savfe">{{$tab1_content_2->name}}</h3>
                                    <p class="card-text content-savfe">{{$tab1_content_2->detail}}</p>
                                    <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม {{$tab1_content_2->point}} แต้ม</h6>
                                </div>
                                <div class="card-footer text-center">
                                    <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                                </div>
                            </div>
                        </div>
                        @else
                        @endif
                    @endforeach
                </div>
                <hr>

                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">เริ่มภายในเดือนนี้</p>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('activity_tabs_detail/thismonth')}}" style="color: #2BC685;float: right">ดูทั้งหมด <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>

                ตั้งแต่วันที่ {{$startMonth}} - {{$endMonth}}
                <div class="row">
                    @foreach($tab1_contents_3 as $tab1_content_3)
                        @if($tab1_content_3->started_date > $startMonth || $tab1_content_1->start_date < $endMonth)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <img class="card-img-top" src="{{ $tab1_content_3->image }}" alt="Card image cap" style="height: 200px">
                                <div class="card-body">
                                    <div class="row mt-2 mb-2">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <small style="color: #acacac"><i class="fas fa-clock"></i> สร้างเมื่อ {{Carbon\Carbon::parse($tab1_content_3->created_at)->diffForHumans()}}</small>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            {{-- <label>{{Carbon\Carbon::parse($content1->started_date)->diffForHumans()}} - {{$content1->expired_date}}</label>--}}
                                            <label>{{Carbon\Carbon::parse($tab1_content_3->started_date)->addYear(543)->translatedFormat('d M Y')}} - {{Carbon\Carbon::parse($tab1_content_3->expired_date)->addYear(543)->translatedFormat('d M Y')}}</label>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            @if ($tab1_content_3->joinActivities->count() < $tab1_content_3->amount)
                                                <small class="card-text" style="color: #2BC685;font-weight: bold;"><i class="fas fa-user-clock"></i> จำนวนคนเข้าร่วม {{$tab1_content_3->joinActivities->count()}}/{{$tab1_content_3->amount}} คน</small>
                                            @else
                                                <small class="card-text" style="color: red;font-weight: bold;"><i class="fas fa-user-times"></i> จำนวนคนเต็มแล้ว {{$tab1_content_3->joinActivities->count()}}/{{$tab1_content_3->amount}} คน</small>
                                            @endif
                                        </div>
                                    </div>
                                    <h3 style="font-weight: bold;" class="card-title title-content-savfe">{{$tab1_content_3->name}}</h3>
                                    <p class="card-text content-savfe">{{$tab1_content_3->detail}}</p>
                                    <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม {{$tab1_content_3->point}} แต้ม</h6>
                                </div>
                                <div class="card-footer text-center">
                                    <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                                </div>
                            </div>
                        </div>
                        @else
                        @endif
                    @endforeach
                </div>
                <hr>
            </div>
            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="mt-3">
                    <p style="font-size: 20px; font-weight: bold">กิจกรรมที่ใกล้เคียงคุณเพียง 1 กิโลเมตร</p>
                </div>
                <div class="row">
                    <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="card">
                            <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap" style="height: 200px">
                            <div class="card-body">
                                <div class="row mt-2 mb-2">
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>14 ธ.ค. 2563</label>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">
                                        <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>
                                    </div>
                                </div>
                                <h3 style="font-weight: bold;" class="card-title">asdasd</h3>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม 5000 แต้ม</h6>
                            </div>
                            <div class="card-footer text-center">
                                <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="mt-3">
                    <p style="font-size: 20px; font-weight: bold">กิจกรรมที่ตรงกับความชอบของคุณ 100%</p>
                </div>
                <div class="row">
                    <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="card">
                            <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap" style="height: 200px">
                            <div class="card-body">
                                <div class="row mt-2 mb-2">
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>14 ธ.ค. 2563</label>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">
                                        <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>
                                    </div>
                                </div>
                                <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม 5000 แต้ม</h6>
                            </div>
                            <div class="card-footer text-center">
                                <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="card">
                            <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap" style="height: 200px">
                            <div class="card-body">
                                <div class="row mt-2 mb-2">
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>14 ธ.ค. 2563</label>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">
                                        <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>
                                    </div>
                                </div>
                                <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม 5000 แต้ม</h6>
                            </div>
                            <div class="card-footer text-center">
                                <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="card">
                            <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap" style="height: 200px">
                            <div class="card-body">
                                <div class="row mt-2 mb-2">
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>14 ธ.ค. 2563</label>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">
                                        <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>
                                    </div>
                                </div>
                                <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม 5000 แต้ม</h6>
                            </div>
                            <div class="card-footer text-center">
                                <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="card">
                            <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap" style="height: 200px">
                            <div class="card-body">
                                <div class="row mt-2 mb-2">
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>14 ธ.ค. 2563</label>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">
                                        <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>
                                    </div>
                                </div>
                                <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม 5000 แต้ม</h6>
                            </div>
                            <div class="card-footer text-center">
                                <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                            </div>
                        </div>
                    </div>

                </div>
                <hr>
            </div>
            <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row mt-3">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">จบไปแล้วเมื่อวานนี้</p>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('activity_tabs_detail/yesterday')}}" style="color: #2BC685;float: right">ดูทั้งหมด <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                เมื่อวันที่ {{$yesterday}}
                <div class="row">

                    @foreach($tab4_contents_1 as $tab4_content_1)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <img class="card-img-top" src="{{ $tab4_content_1->image }}" alt="Card image cap" style="height: 200px">
                                <div class="card-body">
                                    <div class="row mt-2 mb-2">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <small style="color: #acacac"><i class="fas fa-clock"></i> จบเมื่อ {{Carbon\Carbon::parse($tab4_content_1->expired_date)->diffForHumans()}}</small>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            {{-- <label>{{Carbon\Carbon::parse($content1->started_date)->diffForHumans()}} - {{$content1->expired_date}}</label>--}}
                                            <label>{{Carbon\Carbon::parse($tab4_content_1->started_date)->addYear(543)->translatedFormat('d M Y')}} - {{Carbon\Carbon::parse($tab4_content_1->expired_date)->addYear(543)->translatedFormat('d M Y')}}</label>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            @if ($tab4_content_1->joinActivities->count() < $tab4_content_1->amount)
                                                <small class="card-text" style="color: #2BC685;font-weight: bold;"><i class="fas fa-user-clock"></i> จำนวนคนเข้าร่วม {{$tab4_content_1->joinActivities->count()}}/{{$tab4_content_1->amount}} คน</small>
                                            @else
                                                <small class="card-text" style="color: red;font-weight: bold;"><i class="fas fa-user-times"></i> จำนวนคนเต็มแล้ว {{$tab4_content_1->joinActivities->count()}}/{{$tab4_content_1->amount}} คน</small>
                                            @endif
                                        </div>
                                    </div>
                                    <h3 style="font-weight: bold;" class="card-title title-content-savfe">{{$tab4_content_1->name}}</h3>
                                    <p class="card-text content-savfe">{{$tab4_content_1->detail}}</p>
                                    <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม {{$tab4_content_1->point}} แต้ม</h6>
                                </div>
                                <div class="card-footer text-center">
                                    <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

                <div class="row mt-5">
                    <div class="col-8 col-sm-8 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">จบไปแล้วในช่วง 7 วัน</p>
                    </div>
                    <div class="col-4 col-sm-4 col-md-6 col-lg-6">
                        <a href="{{url('activity_tabs_detail/end7days')}}" style="color: #2BC685;float: right">ดูทั้งหมด <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>

                ตั้งแต่เมื่อวันที่ {{$nowDate}} - {{$yesterday}}
                <div class="row">
                    @foreach($tab4_contents_2 as $tab4_content_2)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <img class="card-img-top" src="{{ $tab4_content_2->image }}" alt="Card image cap" style="height: 200px">
                                <div class="card-body">
                                    <div class="row mt-2 mb-2">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <small style="color: #acacac"><i class="fas fa-clock"></i> จบเมื่อ {{Carbon\Carbon::parse($tab4_content_2->expired_date)->diffForHumans()}}</small>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            {{--                                                <label>{{Carbon\Carbon::parse($content1->started_date)->diffForHumans()}} - {{$content1->expired_date}}</label>--}}
                                            <label>{{Carbon\Carbon::parse($tab4_content_2->started_date)->addYear(543)->translatedFormat('d M Y')}}  - {{Carbon\Carbon::parse($tab4_content_2->expired_date)->addYear(543)->translatedFormat('d M Y')}}</label>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            @if ($tab4_content_2->joinActivities->count() < $tab4_content_2->amount)
                                                <small class="card-text" style="color: #2BC685;font-weight: bold;"><i class="fas fa-user-clock"></i> จำนวนคนเข้าร่วม {{$tab4_content_2->joinActivities->count()}}/{{$tab4_content_2->amount}} คน</small>
                                            @else
                                                <small class="card-text" style="color: red;font-weight: bold;"><i class="fas fa-user-times"></i> จำนวนคนเต็มแล้ว {{$tab4_content_2->joinActivities->count()}}/{{$tab4_content_2->amount}} คน</small>
                                            @endif
                                        </div>
                                    </div>
                                    <h3 style="font-weight: bold;" class="card-title title-content-savfe">{{$tab4_content_2->name}}</h3>
                                    <p class="card-text content-savfe">{{$tab4_content_2->detail}}</p>
                                    <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม {{$tab4_content_2->point}} แต้ม</h6>
                                </div>
                                <div class="card-footer text-center">
                                    <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

                <div class="row mt-5">
                    <div class="col-8 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">จบไปแล้วในช่วง 14 วัน</p>
                    </div>
                    <div class="col-4 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('activity_tabs_detail/end14days')}}" style="color: #2BC685;float: right">ดูทั้งหมด <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>

                ตั้งแต่เมื่อวันที่ {{$nowMonth}} - {{$yesterday}}

                <div class="row">
                    @foreach($tab4_contents_3 as $tab4_content_3)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <img class="card-img-top" src="{{ $tab4_content_3->image }}" alt="Card image cap" style="height: 200px">
                                <div class="card-body">
                                    <div class="row mt-2 mb-2">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <small style="color: #acacac"><i class="fas fa-clock"></i> จบเมื่อ {{Carbon\Carbon::parse($tab4_content_3->expired_date)->diffForHumans()}}</small>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            {{-- <label>{{Carbon\Carbon::parse($content1->started_date)->diffForHumans()}} - {{$content1->expired_date}}</label>--}}
                                            <label>{{Carbon\Carbon::parse($tab4_content_3->started_date)->addYear(543)->translatedFormat('d M Y')}} - {{Carbon\Carbon::parse($tab4_content_3->expired_date)->addYear(543)->translatedFormat('d M Y')}}</label>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            @if ($tab4_content_3->joinActivities->count() < $tab4_content_3->amount)
                                                <small class="card-text" style="color: #2BC685;font-weight: bold;"><i class="fas fa-user-clock"></i> จำนวนคนเข้าร่วม {{$tab4_content_3->joinActivities->count()}}/{{$tab4_content_3->amount}} คน</small>
                                            @else
                                                <small class="card-text" style="color: red;font-weight: bold;"><i class="fas fa-user-times"></i> จำนวนคนเต็มแล้ว {{$tab4_content_3->joinActivities->count()}}/{{$tab4_content_3->amount}} คน</small>
                                            @endif
                                        </div>
                                    </div>
                                    <h3 style="font-weight: bold;" class="card-title title-content-savfe">{{$tab4_content_3->name}}</h3>
                                    <p class="card-text content-savfe">{{$tab4_content_3->detail}}</p>
                                    <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม {{$tab4_content_3->point}} แต้ม</h6>
                                </div>
                                <div class="card-footer text-center">
                                    <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>
            </div>
        </div>
    </div>
    @include('layouts.user.footer_savfe')
@endsection





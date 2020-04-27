@extends('layouts.user.navbar')
@section('title', 'Home')
@section('content')
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" style="margin-top:40px;">
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

{{--    {{str_random(6)}}--}}


    <div class="homepage-wrapper" id="bg-forest">
        <div class="container mt-5 mb-5">
            <div class="row mt-3">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <p style="font-size: 24px; font-weight: bold">ป่าไม้</p>
                    @include('layouts.user.title_savfe')

                    <p style="font-size: 16px">ป่าไม้ เป็นทรัพยากรธรรมชาติที่มีความสำคัญอย่างยิ่งต่อสิ่งมีชีวิต
                        ไม่ว่าจะเป็นมนุษย์หรือสัตว์อื่น ๆ เพราะป่าไม้มีประโยชน์ทั้งการเป็นแหล่งวัตถุดิบของปัจจัยสี่ คือ
                        อาหาร เครื่องนุ่งห่ม ที่อยู่อาศัยและยารักษาโรคสำหรับมนุษย์</p>

                    <a class="viewall_btn" href="{{url('activity_tabs_detail/forest')}}">
                        ดูทั้งหมด <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
                {{--$activities--}}
                @foreach($activities_forest as $activitie)
                    @if($activitie == true)
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 mt-3">
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
                                        <small class="sub-title-forest">{{$activitie->category_types_activity->name}}</small>
                                        <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>
                                        <label class="date">
                                            {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                            - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                        </label>

                                        <p class="text-content">{{$activitie->detail}}</p>
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
        </div>
    </div>


    <div class="homepage-wrapper" id="bg-sea">
        <div class="container mt-5 mb-5">
            <div class="row mt-3">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <p style="font-size: 24px; font-weight: bold">ทะเล</p>
                    @include('layouts.user.title_savfe')

                    <p style="font-size: 16px">ทะเล เป็นระบบที่เชื่อมกันระหว่างผืนน้ำมหาสมุทรน้ำเค็มบนโลก
                        ถือเป็นมหาสมุทรโลก หรือแยกเป็นมหาสมุทรหลาย ๆ แห่ง ทะเลบรรเทาภูมิอากาศของโลก
                        และมีบทบาทสำคัญในวัฏจักรน้ำ และวัฏจักรคาร์บอน</p>

                    <a class="viewall_btn" href="{{url('activity_tabs_detail/sea')}}">
                        ดูทั้งหมด <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
                @foreach($activities_sea as $activitie)
                    @if($activitie == true)
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 mt-3">
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
                                        <small class="sub-title-sea">{{$activitie->category_types_activity->name}}</small>
                                        <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>
                                        <label class="date">
                                            {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                            - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                        </label>

                                        <p class="text-content">{{$activitie->detail}}</p>
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
        </div>
    </div>

    <div class="homepage-wrapper" id="bg-country">
        <div class="container mt-5 mb-5">
            <div class="row mt-3">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <p style="font-size: 24px; font-weight: bold">ชุมชน</p>
                    @include('layouts.user.title_savfe')

                    <p style="font-size: 16px">
                        ชุมชนนั้นมีข้อจำกัดในแง่มุมความเข้าใจเกี่ยวกับความสัมพันธ์ทางด้านของ สังคม
                        วัฒนธรรม และยังรวมไปถึงทรัพยากรธรรมชาติ</p>

                    <a class="viewall_btn" href="{{url('activity_tabs_detail/country')}}">
                        ดูทั้งหมด <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
                @foreach($activities_country as $activitie)
                    @if($activitie == true)
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 mt-3">
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
                                        <small class="sub-title-country">{{$activitie->category_types_activity->name}}</small>
                                        <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>
                                        <label class="date">
                                            {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                            - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                        </label>

                                        <p class="text-content">{{$activitie->detail}}</p>
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
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#tab1" role="tab"
                       aria-selected="true">กิจกรรมเร็วๆนี้</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#tab4" role="tab"
                       aria-selected="false">กิจกรรมที่จบไปแล้ว</a>
                </li>

            @else
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#tab1" role="tab"
                       aria-selected="true">กิจกรรมเร็วๆนี้</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#tab2" role="tab"
                       aria-selected="false">กิจกรรมใกล้เคียงคุณ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#tab3" role="tab"
                       aria-selected="false">กิจกรรมที่ตรงกับคุณ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#tab4" role="tab"
                       aria-selected="false">กิจกรรมที่จบไปแล้ว</a>
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
                        <a href="{{url('activity_tabs_detail/today')}}" style="color: #2BC685;float: right">ดูทั้งหมด <i
                                    class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                วันนี้วันที่ {{$today}}
                <div class="row">
                    @foreach($tab1_contents_1 as $activitie)
                        @if($activitie == true)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mt-4">
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
                                    </a>
                                    <div class="card-body">
                                        @if($activitie->category_types_activity->id < 11)
                                            <small class="sub-title-forest"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                            <small class="sub-title-sea"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @else
                                            <small class="sub-title-country"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @endif
                                        <div class="text-center"
                                             style="background-color: #ca3829;width: 80px;height: 80px;">
                                            <label class="date"
                                                   style="font-size: 42px;color: #fff;margin-bottom: -1.5em;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d')}}
                                            </label>
                                            <small class="date" style="font-size: 16px;color: #fff;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('M y')}}
                                            </small>
                                        </div>
                                        <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>
                                        <label class="date">
                                            {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                            - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                        </label>
                                        <p class="text-content">{{$activitie->detail}}</p>
                                        <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                    </div>
                                    <div class="card-footer text-center">
                                        <small class="text-muted">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{$activitie->province->PROVINCE_NAME}}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @else
                        @endif
                    @endforeach
                </div>
                {{--                <div class="row">--}}
                {{--                    @foreach($tab1_contents_1 as $activitie)--}}
                {{--                        @if($activitie == true)--}}
                {{--                            <div class="col-3 col-sm-6 col-md-3 col-lg-3 mt-4">--}}
                {{--                                <div class="card event">--}}
                {{--                                    <a href="{{ url('/activity_detail',$activitie->id ) }}"--}}
                {{--                                       style="text-decoration: none;">--}}
                {{--                                        @if ($activitie->joinActivities->count() == $activitie->amount)--}}
                {{--                                            <div class="budget-full">--}}
                {{--                                                เต็ม--}}
                {{--                                            </div>--}}
                {{--                                        @endif--}}
                {{--                                        <div class="card-img-wrapper">--}}
                {{--                                            <img src="{{ $activitie->image }}"--}}
                {{--                                                 alt="Card image cap">--}}
                {{--                                        </div>--}}
                {{--                                        <div class="card-body">--}}
                {{--                                            @if($activitie->category_types_activity->id < 11)--}}
                {{--                                                <small class="sub-title-forest">{{$activitie->category_types_activity->name}}</small>--}}
                {{--                                            @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )--}}
                {{--                                                <small class="sub-title-sea">{{$activitie->category_types_activity->name}}</small>--}}
                {{--                                            @else--}}
                {{--                                                <small class="sub-title-country">{{$activitie->category_types_activity->name}}</small>--}}
                {{--                                            @endif--}}
                {{--                                            <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>--}}
                {{--                                            <label class="date">--}}
                {{--                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}--}}
                {{--                                                - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}--}}
                {{--                                            </label>--}}

                {{--                                            <p class="text-content">{{$activitie->detail}}</p>--}}
                {{--                                            <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>--}}
                {{--                                        </div>--}}
                {{--                                        <div class="card-footer text-center">--}}
                {{--                                            <small class="text-muted">--}}
                {{--                                                <i class="fas fa-map-marker-alt"></i>--}}
                {{--                                                {{$activitie->province->PROVINCE_NAME}}--}}
                {{--                                            </small>--}}
                {{--                                        </div>--}}
                {{--                                    </a>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        @else--}}
                {{--                        @endif--}}
                {{--                    @endforeach--}}
                {{--                </div>--}}

                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">เริ่มภายในสัปดาห์นี้</p>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('activity_tabs_detail/thisweek')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                            <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>

                ตั้งแต่วันที่ {{$startWeek}} - {{$endWeek}}
                <div class="row">
                    @foreach($tab1_contents_2 as $activitie)
                        @if($activitie == true)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mt-4">
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
                                    </a>
                                    <div class="card-body">
                                        @if($activitie->category_types_activity->id < 11)
                                            <small class="sub-title-forest"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                            <small class="sub-title-sea"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @else
                                            <small class="sub-title-country"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @endif
                                        <div class="text-center"
                                             style="background-color: #ca3829;width: 80px;height: 80px;">
                                            <label class="date"
                                                   style="font-size: 42px;color: #fff;margin-bottom: -1.5em;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d')}}
                                            </label>
                                            <small class="date" style="font-size: 16px;color: #fff;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('M y')}}
                                            </small>
                                        </div>
                                        <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>
                                        <label class="date">
                                            {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                            - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                        </label>
                                        <p class="text-content">{{$activitie->detail}}</p>
                                        <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                    </div>
                                    <div class="card-footer text-center">
                                        <small class="text-muted">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{$activitie->province->PROVINCE_NAME}}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @else
                        @endif
                    @endforeach
                </div>
                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">เริ่มภายในเดือนนี้</p>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('activity_tabs_detail/thismonth')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                            <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>

                ตั้งแต่วันที่ {{$startMonth}} - {{$endMonth}}
                <div class="row">
                    @foreach($tab1_contents_3 as $activitie)
                        @if($activitie == true)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mt-4">
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
                                    </a>
                                    <div class="card-body">
                                        @if($activitie->category_types_activity->id < 11)
                                            <small class="sub-title-forest"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                            <small class="sub-title-sea"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @else
                                            <small class="sub-title-country"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @endif
                                        <div class="text-center"
                                             style="background-color: #ca3829;width: 80px;height: 80px;">
                                            <label class="date"
                                                   style="font-size: 42px;color: #fff;margin-bottom: -1.5em;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d')}}
                                            </label>
                                            <small class="date" style="font-size: 16px;color: #fff;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('M y')}}
                                            </small>
                                        </div>
                                        <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>
                                        <label class="date">
                                            {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                            - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                        </label>
                                        <p class="text-content">{{$activitie->detail}}</p>
                                        <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                    </div>
                                    <div class="card-footer text-center">
                                        <small class="text-muted">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{$activitie->province->PROVINCE_NAME}}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @else
                        @endif
                    @endforeach
                </div>
            </div>
{{--            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="pills-home-tab">--}}
{{--                <div class="mt-3">--}}
{{--                    <p style="font-size: 20px; font-weight: bold">กิจกรรมที่ใกล้เคียงคุณเพียง 1 กิโลเมตร</p>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">--}}
{{--                        <div class="card">--}}
{{--                            <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap"--}}
{{--                                 style="height: 200px">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row mt-2 mb-2">--}}
{{--                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">--}}
{{--                                        <label>14 ธ.ค. 2563</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">--}}
{{--                                        <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>--}}
{{--                                <p class="card-text">This is a wider card with supporting text below as a natural--}}
{{--                                    lead-in to additional content.</p>--}}
{{--                                <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม--}}
{{--                                    5000 แต้ม</h6>--}}
{{--                            </div>--}}
{{--                            <div class="card-footer text-center">--}}
{{--                                <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">--}}
{{--                        <div class="card">--}}
{{--                            <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap"--}}
{{--                                 style="height: 200px">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row mt-2 mb-2">--}}
{{--                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">--}}
{{--                                        <label>14 ธ.ค. 2563</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">--}}
{{--                                        <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>--}}
{{--                                <p class="card-text">This is a wider card with supporting text below as a natural--}}
{{--                                    lead-in to additional content.</p>--}}
{{--                                <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม--}}
{{--                                    5000 แต้ม</h6>--}}
{{--                            </div>--}}
{{--                            <div class="card-footer text-center">--}}
{{--                                <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">--}}
{{--                        <div class="card">--}}
{{--                            <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap"--}}
{{--                                 style="height: 200px">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row mt-2 mb-2">--}}
{{--                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">--}}
{{--                                        <label>14 ธ.ค. 2563</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">--}}
{{--                                        <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>--}}
{{--                                <p class="card-text">This is a wider card with supporting text below as a natural--}}
{{--                                    lead-in to additional content.</p>--}}
{{--                                <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม--}}
{{--                                    5000 แต้ม</h6>--}}
{{--                            </div>--}}
{{--                            <div class="card-footer text-center">--}}
{{--                                <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">--}}
{{--                        <div class="card">--}}
{{--                            <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap"--}}
{{--                                 style="height: 200px">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row mt-2 mb-2">--}}
{{--                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">--}}
{{--                                        <label>14 ธ.ค. 2563</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">--}}
{{--                                        <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>--}}
{{--                                <p class="card-text">This is a wider card with supporting text below as a natural--}}
{{--                                    lead-in to additional content.</p>--}}
{{--                                <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม--}}
{{--                                    5000 แต้ม</h6>--}}
{{--                            </div>--}}
{{--                            <div class="card-footer text-center">--}}
{{--                                <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <hr>--}}
{{--            </div>--}}
{{--            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="pills-home-tab">--}}
{{--                <div class="mt-3">--}}
{{--                    <p style="font-size: 20px; font-weight: bold">กิจกรรมที่ตรงกับความชอบของคุณ 100%</p>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">--}}
{{--                        <div class="card">--}}
{{--                            <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap"--}}
{{--                                 style="height: 200px">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row mt-2 mb-2">--}}
{{--                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">--}}
{{--                                        <label>14 ธ.ค. 2563</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">--}}
{{--                                        <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>--}}
{{--                                <p class="card-text">This is a wider card with supporting text below as a natural--}}
{{--                                    lead-in to additional content.</p>--}}
{{--                                <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม--}}
{{--                                    5000 แต้ม</h6>--}}
{{--                            </div>--}}
{{--                            <div class="card-footer text-center">--}}
{{--                                <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">--}}
{{--                        <div class="card">--}}
{{--                            <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap"--}}
{{--                                 style="height: 200px">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row mt-2 mb-2">--}}
{{--                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">--}}
{{--                                        <label>14 ธ.ค. 2563</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">--}}
{{--                                        <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>--}}
{{--                                <p class="card-text">This is a wider card with supporting text below as a natural--}}
{{--                                    lead-in to additional content.</p>--}}
{{--                                <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม--}}
{{--                                    5000 แต้ม</h6>--}}
{{--                            </div>--}}
{{--                            <div class="card-footer text-center">--}}
{{--                                <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">--}}
{{--                        <div class="card">--}}
{{--                            <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap"--}}
{{--                                 style="height: 200px">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row mt-2 mb-2">--}}
{{--                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">--}}
{{--                                        <label>14 ธ.ค. 2563</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">--}}
{{--                                        <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>--}}
{{--                                <p class="card-text">This is a wider card with supporting text below as a natural--}}
{{--                                    lead-in to additional content.</p>--}}
{{--                                <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม--}}
{{--                                    5000 แต้ม</h6>--}}
{{--                            </div>--}}
{{--                            <div class="card-footer text-center">--}}
{{--                                <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">--}}
{{--                        <div class="card">--}}
{{--                            <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap"--}}
{{--                                 style="height: 200px">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row mt-2 mb-2">--}}
{{--                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">--}}
{{--                                        <label>14 ธ.ค. 2563</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">--}}
{{--                                        <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>--}}
{{--                                <p class="card-text">This is a wider card with supporting text below as a natural--}}
{{--                                    lead-in to additional content.</p>--}}
{{--                                <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม--}}
{{--                                    5000 แต้ม</h6>--}}
{{--                            </div>--}}
{{--                            <div class="card-footer text-center">--}}
{{--                                <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <hr>--}}
{{--            </div>--}}
            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row mt-3">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">กิจกรรมใกล้เคียงคุณ</p>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('activity_tabs_detail/yesterday')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                            <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                เมื่อวันที่ {{$yesterday}}
                <div class="row">

                    @foreach($tab4_contents_1 as $activitie)
                        @if($activitie == true)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mt-4">
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
                                    </a>
                                    <div class="card-body">
                                        @if($activitie->category_types_activity->id < 11)
                                            <small class="sub-title-forest"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                            <small class="sub-title-sea"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @else
                                            <small class="sub-title-country"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @endif
                                        <div class="text-center"
                                             style="background-color: #ca3829;width: 80px;height: 80px;">
                                            <label class="date"
                                                   style="font-size: 42px;color: #fff;margin-bottom: -1.5em;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d')}}
                                            </label>
                                            <small class="date" style="font-size: 16px;color: #fff;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('M y')}}
                                            </small>
                                        </div>
                                        <h5 class="card-title title-content-savfe">{{$activitie->name}} <small
                                                    style="color: red">(จบไปแล้ว)</small></h5>
                                        <label class="date">
                                            {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                            - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                        </label>
                                        <p class="text-content">{{$activitie->detail}}</p>
                                        <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                    </div>
                                    <div class="card-footer text-center">
                                        <small class="text-muted">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{$activitie->province->PROVINCE_NAME}}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @else
                        @endif
                    @endforeach
                </div>

                <div class="row mt-5">
                    <div class="col-8 col-sm-8 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">จบไปแล้วในช่วง 7 วัน</p>
                    </div>
                    <div class="col-4 col-sm-4 col-md-6 col-lg-6">
                        <a href="{{url('activity_tabs_detail/end7days')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                            <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>

                ตั้งแต่เมื่อวันที่ {{$nowDate}} - {{$yesterday}}
                <div class="row">
                    @foreach($tab4_contents_2 as $activitie)
                        @if($activitie == true)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mt-4">
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
                                    </a>
                                    <div class="card-body">
                                        @if($activitie->category_types_activity->id < 11)
                                            <small class="sub-title-forest"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                            <small class="sub-title-sea"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @else
                                            <small class="sub-title-country"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @endif
                                        <div class="text-center"
                                             style="background-color: #ca3829;width: 80px;height: 80px;">
                                            <label class="date"
                                                   style="font-size: 42px;color: #fff;margin-bottom: -1.5em;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d')}}
                                            </label>
                                            <small class="date" style="font-size: 16px;color: #fff;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('M y')}}
                                            </small>
                                        </div>
                                        <h5 class="card-title title-content-savfe">{{$activitie->name}} <small
                                                    style="color: red">(จบไปแล้ว)</small></h5>
                                        <label class="date">
                                            {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                            - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                        </label>
                                        <p class="text-content">{{$activitie->detail}}</p>
                                        <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                    </div>
                                    <div class="card-footer text-center">
                                        <small class="text-muted">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{$activitie->province->PROVINCE_NAME}}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @else
                        @endif
                    @endforeach
                </div>

                <div class="row mt-5">
                    <div class="col-8 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">จบไปแล้วในช่วง 14 วัน</p>
                    </div>
                    <div class="col-4 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('activity_tabs_detail/end14days')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                            <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>

                ตั้งแต่เมื่อวันที่ {{$nowMonth}} - {{$yesterday}}

                <div class="row">
                    @foreach($tab4_contents_3 as $activitie)
                        @if($activitie == true)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mt-4">
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
                                    </a>
                                    <div class="card-body">
                                        @if($activitie->category_types_activity->id < 11)
                                            <small class="sub-title-forest"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                            <small class="sub-title-sea"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @else
                                            <small class="sub-title-country"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @endif
                                        <div class="text-center"
                                             style="background-color: #ca3829;width: 80px;height: 80px;">
                                            <label class="date"
                                                   style="font-size: 42px;color: #fff;margin-bottom: -1.5em;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d')}}
                                            </label>
                                            <small class="date" style="font-size: 16px;color: #fff;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('M y')}}
                                            </small>
                                        </div>
                                        <h5 class="card-title title-content-savfe">{{$activitie->name}} <small
                                                    style="color: red">(จบไปแล้ว)</small></h5>
                                        <label class="date">
                                            {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                            - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                        </label>
                                        <p class="text-content">{{$activitie->detail}}</p>
                                        <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                    </div>
                                    <div class="card-footer text-center">
                                        <small class="text-muted">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{$activitie->province->PROVINCE_NAME}}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @else
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row mt-3">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">กิจกรรมที่ตรงกับคุณ</p>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('activity_tabs_detail/today')}}" style="color: #2BC685;float: right">ดูทั้งหมด <i
                                    class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                วันนี้วันที่ {{$today}}
                <div class="row">
                    @foreach($tab1_contents_1 as $activitie)
                        @if($activitie == true)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mt-4">
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
                                    </a>
                                    <div class="card-body">
                                        @if($activitie->category_types_activity->id < 11)
                                            <small class="sub-title-forest"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                            <small class="sub-title-sea"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @else
                                            <small class="sub-title-country"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @endif
                                        <div class="text-center"
                                             style="background-color: #ca3829;width: 80px;height: 80px;">
                                            <label class="date"
                                                   style="font-size: 42px;color: #fff;margin-bottom: -1.5em;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d')}}
                                            </label>
                                            <small class="date" style="font-size: 16px;color: #fff;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('M y')}}
                                            </small>
                                        </div>
                                        <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>
                                        <label class="date">
                                            {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                            - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                        </label>
                                        <p class="text-content">{{$activitie->detail}}</p>
                                        <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                    </div>
                                    <div class="card-footer text-center">
                                        <small class="text-muted">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{$activitie->province->PROVINCE_NAME}}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @else
                        @endif
                    @endforeach
                </div>
                {{--                <div class="row">--}}
                {{--                    @foreach($tab1_contents_1 as $activitie)--}}
                {{--                        @if($activitie == true)--}}
                {{--                            <div class="col-3 col-sm-6 col-md-3 col-lg-3 mt-4">--}}
                {{--                                <div class="card event">--}}
                {{--                                    <a href="{{ url('/activity_detail',$activitie->id ) }}"--}}
                {{--                                       style="text-decoration: none;">--}}
                {{--                                        @if ($activitie->joinActivities->count() == $activitie->amount)--}}
                {{--                                            <div class="budget-full">--}}
                {{--                                                เต็ม--}}
                {{--                                            </div>--}}
                {{--                                        @endif--}}
                {{--                                        <div class="card-img-wrapper">--}}
                {{--                                            <img src="{{ $activitie->image }}"--}}
                {{--                                                 alt="Card image cap">--}}
                {{--                                        </div>--}}
                {{--                                        <div class="card-body">--}}
                {{--                                            @if($activitie->category_types_activity->id < 11)--}}
                {{--                                                <small class="sub-title-forest">{{$activitie->category_types_activity->name}}</small>--}}
                {{--                                            @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )--}}
                {{--                                                <small class="sub-title-sea">{{$activitie->category_types_activity->name}}</small>--}}
                {{--                                            @else--}}
                {{--                                                <small class="sub-title-country">{{$activitie->category_types_activity->name}}</small>--}}
                {{--                                            @endif--}}
                {{--                                            <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>--}}
                {{--                                            <label class="date">--}}
                {{--                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}--}}
                {{--                                                - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}--}}
                {{--                                            </label>--}}

                {{--                                            <p class="text-content">{{$activitie->detail}}</p>--}}
                {{--                                            <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>--}}
                {{--                                        </div>--}}
                {{--                                        <div class="card-footer text-center">--}}
                {{--                                            <small class="text-muted">--}}
                {{--                                                <i class="fas fa-map-marker-alt"></i>--}}
                {{--                                                {{$activitie->province->PROVINCE_NAME}}--}}
                {{--                                            </small>--}}
                {{--                                        </div>--}}
                {{--                                    </a>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        @else--}}
                {{--                        @endif--}}
                {{--                    @endforeach--}}
                {{--                </div>--}}

                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">เริ่มภายในสัปดาห์นี้</p>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('activity_tabs_detail/thisweek')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                            <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>

                ตั้งแต่วันที่ {{$startWeek}} - {{$endWeek}}
                <div class="row">
                    @foreach($tab1_contents_2 as $activitie)
                        @if($activitie == true)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mt-4">
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
                                    </a>
                                    <div class="card-body">
                                        @if($activitie->category_types_activity->id < 11)
                                            <small class="sub-title-forest"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                            <small class="sub-title-sea"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @else
                                            <small class="sub-title-country"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @endif
                                        <div class="text-center"
                                             style="background-color: #ca3829;width: 80px;height: 80px;">
                                            <label class="date"
                                                   style="font-size: 42px;color: #fff;margin-bottom: -1.5em;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d')}}
                                            </label>
                                            <small class="date" style="font-size: 16px;color: #fff;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('M y')}}
                                            </small>
                                        </div>
                                        <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>
                                        <label class="date">
                                            {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                            - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                        </label>
                                        <p class="text-content">{{$activitie->detail}}</p>
                                        <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                    </div>
                                    <div class="card-footer text-center">
                                        <small class="text-muted">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{$activitie->province->PROVINCE_NAME}}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @else
                        @endif
                    @endforeach
                </div>
                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">เริ่มภายในเดือนนี้</p>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('activity_tabs_detail/thismonth')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                            <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>

                ตั้งแต่วันที่ {{$startMonth}} - {{$endMonth}}
                <div class="row">
                    @foreach($tab1_contents_3 as $activitie)
                        @if($activitie == true)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mt-4">
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
                                    </a>
                                    <div class="card-body">
                                        @if($activitie->category_types_activity->id < 11)
                                            <small class="sub-title-forest"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                            <small class="sub-title-sea"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @else
                                            <small class="sub-title-country"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @endif
                                        <div class="text-center"
                                             style="background-color: #ca3829;width: 80px;height: 80px;">
                                            <label class="date"
                                                   style="font-size: 42px;color: #fff;margin-bottom: -1.5em;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d')}}
                                            </label>
                                            <small class="date" style="font-size: 16px;color: #fff;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('M y')}}
                                            </small>
                                        </div>
                                        <h5 class="card-title title-content-savfe">{{$activitie->name}}</h5>
                                        <label class="date">
                                            {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                            - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                        </label>
                                        <p class="text-content">{{$activitie->detail}}</p>
                                        <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                    </div>
                                    <div class="card-footer text-center">
                                        <small class="text-muted">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{$activitie->province->PROVINCE_NAME}}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @else
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row mt-3">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">จบไปแล้วเมื่อวานนี้</p>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('activity_tabs_detail/yesterday')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                            <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                เมื่อวันที่ {{$yesterday}}
                <div class="row">

                    @foreach($tab4_contents_1 as $activitie)
                        @if($activitie == true)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mt-4">
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
                                    </a>
                                    <div class="card-body">
                                        @if($activitie->category_types_activity->id < 11)
                                            <small class="sub-title-forest"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                            <small class="sub-title-sea"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @else
                                            <small class="sub-title-country"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @endif
                                        <div class="text-center"
                                             style="background-color: #ca3829;width: 80px;height: 80px;">
                                            <label class="date"
                                                   style="font-size: 42px;color: #fff;margin-bottom: -1.5em;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d')}}
                                            </label>
                                            <small class="date" style="font-size: 16px;color: #fff;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('M y')}}
                                            </small>
                                        </div>
                                        <h5 class="card-title title-content-savfe">{{$activitie->name}} <small
                                                    style="color: red">(จบไปแล้ว)</small></h5>
                                        <label class="date">
                                            {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                            - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                        </label>
                                        <p class="text-content">{{$activitie->detail}}</p>
                                        <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                    </div>
                                    <div class="card-footer text-center">
                                        <small class="text-muted">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{$activitie->province->PROVINCE_NAME}}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @else
                        @endif
                    @endforeach
                </div>

                <div class="row mt-5">
                    <div class="col-8 col-sm-8 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">จบไปแล้วในช่วง 7 วัน</p>
                    </div>
                    <div class="col-4 col-sm-4 col-md-6 col-lg-6">
                        <a href="{{url('activity_tabs_detail/end7days')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                            <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>

                ตั้งแต่เมื่อวันที่ {{$nowDate}} - {{$yesterday}}
                <div class="row">
                    @foreach($tab4_contents_2 as $activitie)
                        @if($activitie == true)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mt-4">
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
                                    </a>
                                    <div class="card-body">
                                        @if($activitie->category_types_activity->id < 11)
                                            <small class="sub-title-forest"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                            <small class="sub-title-sea"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @else
                                            <small class="sub-title-country"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @endif
                                        <div class="text-center"
                                             style="background-color: #ca3829;width: 80px;height: 80px;">
                                            <label class="date"
                                                   style="font-size: 42px;color: #fff;margin-bottom: -1.5em;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d')}}
                                            </label>
                                            <small class="date" style="font-size: 16px;color: #fff;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('M y')}}
                                            </small>
                                        </div>
                                        <h5 class="card-title title-content-savfe">{{$activitie->name}} <small
                                                    style="color: red">(จบไปแล้ว)</small></h5>
                                        <label class="date">
                                            {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                            - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                        </label>
                                        <p class="text-content">{{$activitie->detail}}</p>
                                        <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                    </div>
                                    <div class="card-footer text-center">
                                        <small class="text-muted">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{$activitie->province->PROVINCE_NAME}}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @else
                        @endif
                    @endforeach
                </div>

                <div class="row mt-5">
                    <div class="col-8 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">จบไปแล้วในช่วง 14 วัน</p>
                    </div>
                    <div class="col-4 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('activity_tabs_detail/end14days')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                            <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>

                ตั้งแต่เมื่อวันที่ {{$nowMonth}} - {{$yesterday}}

                <div class="row">
                    @foreach($tab4_contents_3 as $activitie)
                        @if($activitie == true)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mt-4">
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
                                    </a>
                                    <div class="card-body">
                                        @if($activitie->category_types_activity->id < 11)
                                            <small class="sub-title-forest"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @elseif($activitie->category_types_activity->id > 10 && $activitie->category_types_activity->id < 17 )
                                            <small class="sub-title-sea"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @else
                                            <small class="sub-title-country"
                                                   style="float: right;">{{$activitie->category_types_activity->name}}</small>
                                        @endif
                                        <div class="text-center"
                                             style="background-color: #ca3829;width: 80px;height: 80px;">
                                            <label class="date"
                                                   style="font-size: 42px;color: #fff;margin-bottom: -1.5em;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d')}}
                                            </label>
                                            <small class="date" style="font-size: 16px;color: #fff;">
                                                {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('M y')}}
                                            </small>
                                        </div>
                                        <h5 class="card-title title-content-savfe">{{$activitie->name}} <small
                                                    style="color: red">(จบไปแล้ว)</small></h5>
                                        <label class="date">
                                            {{Carbon\Carbon::parse($activitie->started_date)->addYear(543)->translatedFormat('d M y')}}
                                            - {{Carbon\Carbon::parse($activitie->expired_date)->addYear(543)->translatedFormat('d M y')}}
                                        </label>
                                        <p class="text-content">{{$activitie->detail}}</p>
                                        <h6 class="text-point"> ได้รับแต้ม {{$activitie->point}} แต้ม</h6>
                                    </div>
                                    <div class="card-footer text-center">
                                        <small class="text-muted">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{$activitie->province->PROVINCE_NAME}}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @else
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="homepage-wrapper" id="bg-about">
        <div class="container mb-5">
            <div class="section-header text-center" style="margin: 55px 0;">
                <div>
                    <h4>SAV'FE THE WORLD มีอะไรบ้าง?</h4>
                    <p>ทำความรู้จัก SAV'FE THE WORLD กันเถอะ</p>
                </div>
                <hr style="width: 20%; border: 1px solid #2BC685;">
            </div>
            <div class="row p-3">

                <div class="col-12 col-sm-12 col-md-4 col-lg-4" style="width: 100%;height: 200px;">
                    <i class="fas fa-calendar-alt" style="font-size: 39px;color: #b0c647;"></i>
                    <h4 style="margin-top: 20px">เข้าร่วม/สะสมแต้ม</h4>
                    <h6>เข้าร่วมกิจกรรมที่หลากหลายและสะสมแต้มเพื่อนำไปแลกของรางวัล</h6>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4" style="width: 100%;height: 200px;">
                    <i class="fas fa-star" style="font-size: 39px;color: #F3D034;"></i>
                    <h4 style="margin-top: 20px">แลกของรางวัล</h4>
                    <h6>ยิ่งรวมกิจกรรมเยอะๆยิ่งได้รับแต้มสะสมเพื่อนำไปแลกของรางวัลและปลดล็อคสถิติต่างๆ</h6>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4" style="width: 100%;height: 200px;">
                    <i class="fas fa-globe-asia" style="font-size: 39px;color: #5888C6;"></i>
                    <h4 style="margin-top: 20px">Safe & Save</h4>
                    <h6>เป็นส่วนหนึ่งในการส่งเสริมการเข้าร่วมกิจกรรม รวมไปถึงได้ช่วยอนุรักษ์ธรรมชาติและสิ่งแวดล้อม</h6>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.user.footer_savfe')
@endsection











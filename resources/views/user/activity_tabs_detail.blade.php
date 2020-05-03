@extends('layouts.user.navbar')
@section('title', 'Activities Tabs Detail')
@section('content')
    <div class="container" style="margin-top: 80px;">
        {{csrf_field()}}
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p style="font-size: 24px; font-weight: bold">{{$header}}</p>

                        @include('layouts.user.title_savfe')
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($activities as $activitie)
                @if($activitie == true)
                    <div class="col-3 col-sm-6 col-md-3 col-lg-3">
                        <div class="card event">
                            <a href="{{ url('/activity_detail',$activitie->id ) }}"
                               style="text-decoration: none;">
                                @if ($activitie->joinActivities->count() == $activitie->amount)
                                    <div class="budget-full">
                                        เต็ม
                                    </div>
                                @endif
                                <div class="card-img-wrapper">
                                    <img src="{{ url($activitie->image) }}"
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

{{--        <div class="row">--}}
{{--            @foreach($activities as $activity)--}}
{{--                @if ($activity->joinActivities->count() < $activity->amount)--}}
{{--                    <div class="mt-3 col-12 col-sm-12 col-md-12 col-lg-12">--}}
{{--                        <div class="card">--}}
{{--                            <div class="row no-gutters">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <a href="{{ url('/activity_detail',$activity->id ) }}"--}}
{{--                                       style="text-decoration: none;">--}}
{{--                                        <img class="card-img-top" src="{{ url($activity->image) }}" alt="Card image cap"--}}
{{--                                             style="height: 300px">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-8">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <label style="color:#000;">{{Carbon\Carbon::parse($activity->started_date)->addYear(543)->translatedFormat('d M Y')}}--}}
{{--                                            - {{Carbon\Carbon::parse($activity->expired_date)->addYear(543)->translatedFormat('d M Y')}}</label>--}}
{{--                                        <br>--}}
{{--                                        @if ($activity->joinActivities->count() < $activity->amount)--}}
{{--                                            <small class="card-text" style="color: #2BC685;font-weight: bold;"><i--}}
{{--                                                        class="fas fa-user-clock"></i>--}}
{{--                                                จำนวนคนเข้าร่วม {{$activity->joinActivities->count()}}--}}
{{--                                                /{{$activity->amount}} คน</small>--}}
{{--                                        @else--}}
{{--                                            <small class="card-text" style="color: red;font-weight: bold;"><i--}}
{{--                                                        class="fas fa-user-times"></i>--}}
{{--                                                จำนวนคนเต็มแล้ว</small>--}}
{{--                                        @endif--}}
{{--                                        <h5 style="font-weight: bold;color:#000;"--}}
{{--                                            class="card-title title-content-savfe">{{$activity->name}}</h5>--}}
{{--                                        <small class="p-1" style="color:#2BC685;width: auto;height: 20px;border: 1px solid #2BC685;border-radius:6px;">{{$activity->category_types_activity->name}}</small>--}}
{{--                                        --}}{{--                                        @if($activity->category_types_activities <= 10)--}}
{{--                                        --}}{{--                                            <small class="p-1" style="color:#B0C547;width: auto;height: 20px;border: 1px solid #B0C547;border-radius:6px;">{{$activity->category_types_activity->name}}</small>--}}
{{--                                        --}}{{--                                        @elseif($activity->category_types_activities >=11)--}}
{{--                                        --}}{{--                                            <small class="p-1" style="color:#5888C6;width: auto;height: 20px;border: 1px solid #5888C6;border-radius:6px;">{{$activity->category_types_activity->name}}</small>--}}
{{--                                        --}}{{--                                        @elseif($activity->category_types_activities >=17)--}}
{{--                                        --}}{{--                                            <small class="p-1" style="color:#F3D034;width: auto;height: 20px;border: 1px solid #F3D034;border-radius:6px;">{{$activity->category_types_activity->name}}</small>--}}
{{--                                        --}}{{--                                        @else--}}
{{--                                        --}}{{--                                        @endif--}}
{{--                                        <label--}}
{{--                                                class="text-muted"><i--}}
{{--                                                    class="fas fa-map-marker-alt"></i> {{$activity->province->PROVINCE_NAME}}--}}
{{--                                        </label>--}}
{{--                                        <p class="card-text content-savfe" style="color:#000;">{{$activity->detail}}</p>--}}
{{--                                        <h6 class="card-text" style="color: #2BC685;font-weight: bold;">--}}
{{--                                            ได้รับแต้ม {{$activity->point}} แต้ม</h6>--}}
{{--                                        @if ($header == 'เริ่มภายในวันนี้' || $header == 'เริ่มภายในสัปดาห์นี้' || $header == 'เริ่มภายในเดือนนี้')--}}
{{--                                            <small class="text-muted"><i class="fas fa-clock"></i>--}}
{{--                                                สร้างเมื่อ {{Carbon\Carbon::parse($activity->created_at)->diffForHumans()}}--}}
{{--                                            </small>--}}
{{--                                        @elseif ($header == 'จบไปแล้วเมื่อวานนี้' || $header == 'จบไปแล้วในช่วง 7 วัน' || $header == 'จบไปแล้วในช่วง 14 วัน')--}}
{{--                                            <small class="text-muted"><i class="fas fa-clock"></i>--}}
{{--                                                จบเมื่อ {{Carbon\Carbon::parse($activity->expired_date)->diffForHumans()}}--}}
{{--                                            </small>--}}
{{--                                        @else--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @else--}}
{{--                    <div class="mt-3 col-12 col-sm-12 col-md-12 col-lg-12">--}}
{{--                        <div class="card" style="opacity: 0.4">--}}
{{--                            <div class="row no-gutters">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <a href="{{ url('/activity_detail',$activity->id ) }}"--}}
{{--                                       style="text-decoration: none;">--}}
{{--                                        <img class="card-img-top" src="{{ url($activity->image) }}" alt="Card image cap"--}}
{{--                                             style="height: 300px">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-8">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <label style="color:#000;">{{Carbon\Carbon::parse($activity->started_date)->addYear(543)->translatedFormat('d M Y')}}--}}
{{--                                            - {{Carbon\Carbon::parse($activity->expired_date)->addYear(543)->translatedFormat('d M Y')}}</label>--}}
{{--                                        <br>--}}
{{--                                        @if ($activity->joinActivities->count() < $activity->amount)--}}
{{--                                            <small class="card-text" style="color: #2BC685;font-weight: bold;"><i--}}
{{--                                                        class="fas fa-user-clock"></i>--}}
{{--                                                จำนวนคนเข้าร่วม {{$activity->joinActivities->count()}}--}}
{{--                                                /{{$activity->amount}} คน</small>--}}
{{--                                        @else--}}
{{--                                            <small class="card-text" style="color: red;font-weight: bold;"><i--}}
{{--                                                        class="fas fa-user-times"></i>--}}
{{--                                                จำนวนคนเต็มแล้ว</small>--}}
{{--                                        @endif--}}
{{--                                        <h5 style="font-weight: bold;color:#000;"--}}
{{--                                            class="card-title title-content-savfe">{{$activity->name}}</h5>--}}
{{--                                        <small class="p-1" style="color:#2BC685;width: auto;height: 20px;border: 1px solid #2BC685;border-radius:6px;">{{$activity->category_types_activity->name}}</small>--}}

{{--                                        <label--}}
{{--                                                class="text-muted"><i--}}
{{--                                                    class="fas fa-map-marker-alt"></i> {{$activity->province->PROVINCE_NAME}}--}}
{{--                                        </label>--}}
{{--                                        <p class="card-text content-savfe" style="color:#000;">{{$activity->detail}}</p>--}}
{{--                                        <h6 class="card-text" style="color: #2BC685;font-weight: bold;">--}}
{{--                                            ได้รับแต้ม {{$activity->point}} แต้ม</h6>--}}
{{--                                        @if ($header == 'เริ่มภายในวันนี้' || $header == 'เริ่มภายในสัปดาห์นี้' || $header == 'เริ่มภายในเดือนนี้')--}}
{{--                                            <small class="text-muted"><i class="fas fa-clock"></i>--}}
{{--                                                สร้างเมื่อ {{Carbon\Carbon::parse($activity->created_at)->diffForHumans()}}--}}
{{--                                            </small>--}}
{{--                                        @elseif ($header == 'จบไปแล้วเมื่อวานนี้' || $header == 'จบไปแล้วในช่วง 7 วัน' || $header == 'จบไปแล้วในช่วง 14 วัน')--}}
{{--                                            <small class="text-muted"><i class="fas fa-clock"></i>--}}
{{--                                                จบเมื่อ {{Carbon\Carbon::parse($activity->expired_date)->diffForHumans()}}--}}
{{--                                            </small>--}}
{{--                                        @else--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}

{{--                --}}{{--                <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">--}}
{{--                --}}{{--                    <div class="card">--}}
{{--                --}}{{--                        <a href="{{ url('/activity_detail',$activity->id ) }}" style="text-decoration: none;">--}}
{{--                --}}{{--                            <img class="card-img-top" src="{{ url($activity->image) }}" alt="Card image cap"--}}
{{--                --}}{{--                                 style="height: 200px">--}}
{{--                --}}{{--                            <div class="card-body">--}}
{{--                --}}{{--                                <div class="row mt-2 mb-2">--}}
{{--                --}}{{--                                    @if ($header == 'เริ่มภายในวันนี้' || $header == 'เริ่มภายในสัปดาห์นี้' || $header == 'เริ่มภายในเดือนนี้')--}}
{{--                --}}{{--                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">--}}
{{--                --}}{{--                                            <small style="color: #acacac"><i class="fas fa-clock"></i>--}}
{{--                --}}{{--                                                สร้างเมื่อ {{Carbon\Carbon::parse($activity->created_at)->diffForHumans()}}--}}
{{--                --}}{{--                                            </small>--}}
{{--                --}}{{--                                        </div>--}}
{{--                --}}{{--                                    @elseif ($header == 'จบไปแล้วเมื่อวานนี้' || $header == 'จบไปแล้วในช่วง 7 วัน' || $header == 'จบไปแล้วในช่วง 14 วัน')--}}
{{--                --}}{{--                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">--}}
{{--                --}}{{--                                            <small style="color: #acacac"><i class="fas fa-clock"></i>--}}
{{--                --}}{{--                                                จบเมื่อ {{Carbon\Carbon::parse($activity->expired_date)->diffForHumans()}}--}}
{{--                --}}{{--                                            </small>--}}
{{--                --}}{{--                                        </div>--}}
{{--                --}}{{--                                    @else--}}
{{--                --}}{{--                                    @endif--}}
{{--                --}}{{--                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">--}}
{{--                --}}{{--                                        --}}{{----}}{{-- <label>{{Carbon\Carbon::parse($content1->started_date)->diffForHumans()}} - {{$content1->expired_date}}</label>--}}
{{--                --}}{{--                                        <label style="color:#000;">{{Carbon\Carbon::parse($activity->started_date)->addYear(543)->translatedFormat('d M Y')}}--}}
{{--                --}}{{--                                            - {{Carbon\Carbon::parse($activity->expired_date)->addYear(543)->translatedFormat('d M Y')}}</label>--}}
{{--                --}}{{--                                    </div>--}}
{{--                --}}{{--                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">--}}
{{--                --}}{{--                                        @if ($activity->joinActivities->count() < $activity->amount)--}}
{{--                --}}{{--                                            <small class="card-text" style="color: #2BC685;font-weight: bold;"><i--}}
{{--                --}}{{--                                                        class="fas fa-user-clock"></i>--}}
{{--                --}}{{--                                                จำนวนคนเข้าร่วม {{$activity->joinActivities->count()}}--}}
{{--                --}}{{--                                                /{{$activity->amount}} คน</small>--}}
{{--                --}}{{--                                        @else--}}
{{--                --}}{{--                                            <small class="card-text" style="color: red;font-weight: bold;"><i--}}
{{--                --}}{{--                                                        class="fas fa-user-times"></i>--}}
{{--                --}}{{--                                                จำนวนคนเต็มแล้ว</small>--}}
{{--                --}}{{--                                        @endif--}}
{{--                --}}{{--                                    </div>--}}
{{--                --}}{{--                                </div>--}}
{{--                --}}{{--                                <h5 style="font-weight: bold;color:#000;"--}}
{{--                --}}{{--                                    class="card-title title-content-savfe">{{$activity->name}}</h5>--}}
{{--                --}}{{--                                <p class="card-text content-savfe" style="color:#000;">{{$activity->detail}}</p>--}}
{{--                --}}{{--                                <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">--}}
{{--                --}}{{--                                    ได้รับแต้ม {{$activity->point}} แต้ม</h6>--}}
{{--                --}}{{--                            </div>--}}
{{--                --}}{{--                            <div class="card-footer text-center">--}}
{{--                --}}{{--                                <small class="text-muted"><i--}}
{{--                --}}{{--                                            class="fas fa-map-marker-alt"></i> {{$activity->province->PROVINCE_NAME}}--}}
{{--                --}}{{--                                </small>--}}
{{--                --}}{{--                            </div>--}}
{{--                --}}{{--                        </a>--}}
{{--                --}}{{--                    </div>--}}
{{--                --}}{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}

    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                {{ $activities->links() }}
            </div>
        </div>
    </div>

    @include('layouts.user.footer_savfe')

@endsection


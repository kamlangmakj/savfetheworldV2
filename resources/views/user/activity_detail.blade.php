@extends('layouts.user.navbar')
@section('title', 'Activities Detail')
@section('content')
    <div class="container" style="margin-top: 80px;">
        {{csrf_field()}}
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p style="font-size: 38px; font-weight: bold">รายละเอียดกิจกรรม</p>

                        @include('layouts.user.title_savfe')
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="mt-3 col-12">
                    <div class="card">
                        <img class="card-img-top" src="{{ url($activity->image) }}" alt="Card image cap">
                        <div class="card-body">
                            <div class="row mt-2 mb-2">
                                <div class="row col-12">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                        <small style="color: #acacac"><i class="fas fa-clock"></i> สร้างเมื่อ {{Carbon\Carbon::parse($activity->created_at)->diffForHumans()}}</small>
{{--                                        <small style="color: #acacac"><i class="fas fa-history"></i> อัปเดตเมื่อ {{Carbon\Carbon::parse($activity->updated_at)->diffForHumans()}}</small>--}}
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 detail-savfe-align">
                                        @if ($activity->joinActivities->count() < $activity->amount)
                                            <small class="card-text" style="color: #2BC685;font-weight: bold;"><i class="fas fa-user-clock"></i> จำนวนคนเข้าร่วม {{$activity->joinActivities->count()}}/{{$activity->amount}} คน</small>
                                        @else
                                            <small class="card-text" style="color: red;font-weight: bold;"><i class="fas fa-user-times"></i> จำนวนคนเต็มแล้ว {{$activity->joinActivities->count()}}/{{$activity->amount}} คน</small>
                                        @endif
                                    </div>
{{--                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">--}}
{{--                                        <small style="color: #acacac"><i class="fas fa-clock"></i> สร้างเมื่อ {{Carbon\Carbon::parse($activity->created_at)->diffForHumans()}}</small>--}}
{{--                                    </div>--}}
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                                    <h4>{{Carbon\Carbon::parse($activity->started_date)->addYear(543)->translatedFormat('d M Y')}} - {{Carbon\Carbon::parse($activity->expired_date)->addYear(543)->translatedFormat('d M Y')}}</h4>
                                </div>
                                <div class="row col-12 mt-2">
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                        <h6 class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</h6>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 detail-savfe-align">
                                        <h6 class="card-text" style="color: #2BC685;font-weight: bold;">ได้รับ {{$activity->point}} แต้ม</h6>
                                    </div>
                                </div>

                            </div>
                            <h1 style="font-weight: bold;" class="card-title mt-3 mb-3">{{$activity->name}}</h1>
                            <p class="card-text">{{$activity->detail}}</p>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-3" style="text-align: center">
                                @guest
                                    <button type="button" class="btn-savfe btn-main-savfe btn-secondary" disabled>กรุณาเข้าสู่ระบบก่อน</button>
                                @else
                                    @if ($activity->joinActivities->count() < $activity->amount)
                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">เข้าร่วมกิจกรรม</button>
                                        <a href="/activity" class="btn-savfe btn-main-savfe btn-secondary">ไปดูกิจกรรมอื่นๆ</a>
                                    @else
                                        <button type="button" class="btn-savfe btn-main-savfe btn-secondary" disabled>เข้าร่วมกิจกรรม</button>
                                        <a href="/activity" class="btn-savfe btn-main-savfe">ไปดูกิจกรรมอื่นๆ</a>
                                    @endif
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    @include('layouts.user.footer_savfe')
@endsection


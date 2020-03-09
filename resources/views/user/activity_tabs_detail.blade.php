@extends('layouts.user.navbar')
@section('title', 'Activities Tabs Detail')
@section('content')
    <div class="container" style="margin-top: 80px;">
        {{csrf_field()}}
        <div class="row">
            <div class="container">
                <div class="row">
                        <div class="col-12">
                            <p style="font-size: 38px; font-weight: bold">{{$header}}</p>

                            @include('layouts.user.title_savfe')
                        </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($activities as $activity)
                <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <a href="{{ url('/activity_detail',$activity->id ) }}" style="text-decoration: none;">
                            <img class="card-img-top" src="{{ url($activity->image) }}" alt="Card image cap" style="height: 200px">
                            <div class="card-body">
                                <div class="row mt-2 mb-2">
                                    @if ($header == 'เริ่มภายในวันนี้' || $header == 'เริ่มภายในสัปดาห์นี้' || $header == 'เริ่มภายในเดือนนี้')
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <small style="color: #acacac"><i class="fas fa-clock"></i> สร้างเมื่อ {{Carbon\Carbon::parse($activity->created_at)->diffForHumans()}}</small>
                                    </div>
                                        @elseif ($header == 'จบไปแล้วเมื่อวานนี้' || $header == 'จบไปแล้วในช่วง 7 วัน' || $header == 'จบไปแล้วในช่วง 14 วัน')
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                <small style="color: #acacac"><i class="fas fa-clock"></i> จบเมื่อ {{Carbon\Carbon::parse($activity->expired_date)->diffForHumans()}}</small>
                                            </div>
                                    @else
                                        @endif
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        {{-- <label>{{Carbon\Carbon::parse($content1->started_date)->diffForHumans()}} - {{$content1->expired_date}}</label>--}}
                                        <label style="color:#000;">{{Carbon\Carbon::parse($activity->started_date)->addYear(543)->translatedFormat('d M Y')}} - {{Carbon\Carbon::parse($activity->expired_date)->addYear(543)->translatedFormat('d M Y')}}</label>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        @if ($activity->joinActivities->count() < $activity->amount)
                                            <small class="card-text" style="color: #2BC685;font-weight: bold;"><i class="fas fa-user-clock"></i> จำนวนคนเข้าร่วม {{$activity->joinActivities->count()}}/{{$activity->amount}} คน</small>
                                        @else
                                            <small class="card-text" style="color: red;font-weight: bold;"><i class="fas fa-user-times"></i> จำนวนคนเต็มแล้ว {{$activity->joinActivities->count()}}/{{$activity->amount}} คน</small>
                                        @endif
                                    </div>
                                </div>
                                <h3 style="font-weight: bold;color:#000;" class="card-title title-content-savfe" >{{$activity->name}}</h3>
                                <p class="card-text content-savfe" style="color:#000;">{{$activity->detail}}</p>
                                <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม {{$activity->point}} แต้ม</h6>
                            </div>
                            <div class="card-footer text-center">
                                <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

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


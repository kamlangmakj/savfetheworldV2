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
                        <img class="card-img-top" src="{{ url($activity->image) }}" alt="Card image cap" style="height: 200px">
                        <div class="card-body">
                            <div class="row mt-2 mb-2">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <small style="color: #acacac"><i class="fas fa-history"></i> อัปเดตเมื่อ {{Carbon\Carbon::parse($activity->updated_at)->diffForHumans()}}</small>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <label>{{Carbon\Carbon::parse($activity->started_date)->addYear(543)->translatedFormat('d M Y')}} - {{Carbon\Carbon::parse($activity->expired_date)->addYear(543)->translatedFormat('d M Y')}}</label>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    @if ($activity->joinActivities->count() < $activity->amount)
                                        <small class="card-text" style="color: #2BC685;font-weight: bold;"><i class="fas fa-user-clock"></i> จำนวนคนเข้าร่วม {{$activity->joinActivities->count()}}/{{$activity->amount}} คน</small>
                                    @else
                                        <small class="card-text" style="color: red;font-weight: bold;"><i class="fas fa-user-times"></i> จำนวนคนเต็มแล้ว {{$activity->joinActivities->count()}}/{{$activity->amount}} คน</small>
                                    @endif
                                </div>
                            </div>
                            <h3 style="font-weight: bold;" class="card-title title-content-savfe">{{$activity->name}}</h3>
                            <p class="card-text content-savfe">{{$activity->detail}}</p>
                            <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม {{$activity->point}} แต้ม</h6>
                        </div>
                        <div class="card-footer text-center">
                            <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                        </div>
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


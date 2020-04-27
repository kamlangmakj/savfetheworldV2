@extends('layouts.user.navbar')
@section('title', 'Confirm Join')
@section('content')
    <div class="container" style="margin-top: 80px;">
        {{csrf_field()}}
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p style="font-size: 24px; font-weight: bold">ยืนยันการเข้าร่วมกิจกรรม</p>

                        @include('layouts.user.title_savfe')
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-12 col-sm-12 col-md-9 col-lg-9">
                <div class="card">
                    <img class="card-img-top" src="{{ url($join_activity->activity->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <div class="row mt-2 mb-2">
                            <div class="row col-12">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <small style="color: #acacac"><i class="fas fa-clock"></i>
                                        สร้างเมื่อ {{Carbon\Carbon::parse($join_activity->activity->created_at)->diffForHumans()}}
                                    </small>
                                    {{--                                        <small style="color: #acacac"><i class="fas fa-history"></i> อัปเดตเมื่อ {{Carbon\Carbon::parse($activity->updated_at)->diffForHumans()}}</small>--}}
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-right">
                                    <small class="p-1" style="color:#2BC685;width: auto;height: 20px;border: 1px solid #2BC685;border-radius:6px;">{{$join_activity->activity->category_types_activity->name}}</small>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                                <h6>{{Carbon\Carbon::parse($join_activity->activity->started_date)->addYear(543)->translatedFormat('d M Y')}}
                                    - {{Carbon\Carbon::parse($join_activity->activity->expired_date)->addYear(543)->translatedFormat('d M Y')}}</h6>
                            </div>
                        </div>
                        <h3 style="font-weight: bold;" class="card-title mt-3 mb-3">{{$join_activity->activity->name}} </h3>
                        <br>
                        <h5 class="card-text"><i class="fas fa-book"></i> รายละเอียด</h5>
                        <p class="card-text">{{ $join_activity->activity->detail }}</p>
                    </div>
                </div>
            </div>
            <div class="mt-3 col-12 col-sm-12 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center">
{{--                                    <img class="card-img-top"--}}
{{--                                         src=" {{  url('https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://127.0.0.1:8000/check_confirm_join',$join_activity->id )}}"--}}
{{--                                         style="height: 100%;width: 100%">--}}
                                    <img class="card-img-top"

                                         src=" {{ url('https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://www.savfetheworld.com/check_confirm_join/'.$join_activity->id)}}"
                                         style="height: 100%;width: 100%">
                                    <br>
                                    <small style="color: red">***QR CODE สำหรับให้แอดมินยืนยันการเข้าร่วมกิจกรรม</small>
                                </div>
                                <hr>
                                <small style="color: #000">
                                    <i class="fas fa-map-marker-alt"></i> สถานที่ {{$join_activity->activity->address}}
                                </small>
                                <br>
                                <small style="color: #000">
                                    <i class="fas fa-phone"></i> ติดต่อ +669 1765 9890
                                </small>
                                <br>
                                <small style="color: #000">
                                    <i class="fas fa-user"></i> ชื่อผู้จัด {{$join_activity->activity->agent}}
                                </small>
                                <br>
                                <small style="color: #000">
                                    <i class="fas fa-calendar-check"></i> วันที่เริ่ม {{Carbon\Carbon::parse($join_activity->activity->started_date)->addYear(543)->translatedFormat('d M Y')}}
                                </small>
                                <br>
                                <small style="color: #000">
                                    <i class="fas fa-calendar-times"></i> วันที่จบ {{Carbon\Carbon::parse($join_activity->activity->expired_date)->addYear(543)->translatedFormat('d M Y')}}
                                </small>
                                <br>
                                <small style="color: #2BC685"><i class="fas fa-star"></i> ได้รับแต้ม {{$join_activity->activity->point}} แต้ม
                                </small>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <div class="col-12">
                            <small style="color: #acacac"><i class="fas fa-map-marker-alt" style="color: #acacac"></i>
                                {{$join_activity->activity->province->PROVINCE_NAME}}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




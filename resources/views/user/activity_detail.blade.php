@extends('layouts.user.navbar')
@section('title', 'Activities Detail')
@section('content')
    <div class="container" style="margin-top: 80px;">
        {{csrf_field()}}
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p style="font-size: 24px; font-weight: bold">รายละเอียดกิจกรรม</p>

                        @include('layouts.user.title_savfe')
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-12 col-sm-12 col-md-9 col-lg-9">
                <div class="card">
                    <img class="card-img-top" src="{{ url($activity->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <div class="row mt-2 mb-2">
                            <div class="row col-12">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <small style="color: #acacac"><i class="fas fa-clock"></i>
                                        สร้างเมื่อ {{Carbon\Carbon::parse($activity->created_at)->diffForHumans()}}
                                    </small>
                                    {{--                                        <small style="color: #acacac"><i class="fas fa-history"></i> อัปเดตเมื่อ {{Carbon\Carbon::parse($activity->updated_at)->diffForHumans()}}</small>--}}
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-right">
                                    @if($activity->category_types_activity->id < 11)
                                        <small class="sub-title-forest">{{$activity->category_types_activity->name}}</small>
                                    @elseif($activity->category_types_activity->id > 10 && $activity->category_types_activity->id < 17 )
                                        <small class="sub-title-sea">{{$activity->category_types_activity->name}}</small>
                                    @else
                                        <small class="sub-title-country">{{$activity->category_types_activity->name}}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                                <h6>{{Carbon\Carbon::parse($activity->started_date)->addYear(543)->translatedFormat('d M Y')}}
                                    - {{Carbon\Carbon::parse($activity->expired_date)->addYear(543)->translatedFormat('d M Y')}}</h6>
                            </div>
                        </div>
                        <h3 style="font-weight: bold;" class="card-title mt-3 mb-3">{{$activity->name}} </h3>
                        <br>
                        <h5 class="card-text"><i class="fas fa-book"></i> รายละเอียด</h5>
                        {!! $activity->detail !!}

                    </div>
                </div>
            </div>
            <div class="mt-3 col-12 col-sm-12 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <small style="color: #000">
                                    <i class="fas fa-map-marker-alt"></i> สถานที่ {{$activity->address}}
                                </small>
                                <br>
                                <small style="color: #000">
                                    <i class="fas fa-phone"></i> ติดต่อ +669 1765 9890
                                </small>
                                <br>
                                <small style="color: #000">
                                    <i class="fas fa-user"></i> ชื่อผู้จัด {{$activity->agent}}
                                </small>
                                <br>
                                <small style="color: #000">
                                    <i class="fas fa-calendar-check"></i> วันที่เริ่ม {{Carbon\Carbon::parse($activity->started_date)->addYear(543)->translatedFormat('d M Y')}}
                                </small>
                                <br>
                                <small style="color: #000">
                                    <i class="fas fa-calendar-times"></i> วันที่จบ {{Carbon\Carbon::parse($activity->expired_date)->addYear(543)->translatedFormat('d M Y')}}
                                </small>
                                <br>
                                @if ($activity->joinActivities->count() < $activity->amount)
                                    <small class="card-text" style="color: #2BC685;font-weight: bold;"><i
                                                class="fas fa-user-clock"></i>
                                        จำนวนคนเข้าร่วม {{$activity->joinActivities->count()}}/{{$activity->amount}}
                                        คน</small>
                                @else
                                    <small class="card-text" style="color: red;font-weight: bold;"><i
                                                class="fas fa-user-times"></i>
                                        จำนวนคนเต็มแล้ว</small>
                                @endif
                                <br>
                                <small style="color: #2BC685"><i class="fas fa-star"></i> ได้รับแต้ม {{$activity->point}} แต้ม
                                </small>
                                <div class="form">
                                    <form method="post" role="form" class="contactForm mb-3" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-3" style="text-align: center">
                                            @guest
                                                <button type="button" class="btn-savfe btn-main-savfe btn-secondary" disabled>
                                                    กรุณาเข้าสู่ระบบก่อน
                                                </button>
                                                <br>
                                                <small style="color: red">(จึงจะเข้าร่วมกิจกรรมได้)</small>
                                            @else
                                                @if($isJoin)
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                            data-target="#editModal_{{$activity->id}}"><i class="fas fa-times"></i>
                                                        ยกเลิกการเข้าร่วม
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal_{{$activity->id}}" tabindex="-1" role="dialog"
                                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ยกเลิกการเข้าร่วมกิจกรรม</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    คุณต้องการยกเลิกการเข้าร่วมกิจกรรม ใช่หรือไม่?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก
                                                                    </button>
                                                                    <form role="form"
                                                                          action="{{ url('profile/join_activities_history') }}"
                                                                          method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <button type="submit" class="btn-savfe btn-main-savfe">ยืนยัน
                                                                        </button>
                                                                        <input type="hidden" name="join_activities_id"
                                                                               value="{{$activity->id}}">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($activity->joinActivities->count() < $activity->amount)
                                                    <button type="button" class="btn-savfe btn-main-savfe text-center"
                                                            data-toggle="modal" data-target="#editModal_{{$activity->id}}">
                                                        เข้าร่วมกิจกรรม
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal_{{$activity->id}}" tabindex="-1"
                                                         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ยืนยันการเข้าร่วมกิจกรรม</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    คุณต้องการยืนยันการเข้าร่วมกิจกรรม ใช่หรือไม่?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก
                                                                    </button>
                                                                    <form role="form" action="{{ url('activity_detail') }}"
                                                                          method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="activities_id"
                                                                               value="{{$activity->id}}">
                                                                        <button type="submit" class="btn-savfe btn-main-savfe">ยืนยัน
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                            disabled>เข้าร่วมกิจกรรม
                                                    </button>

                                                @endif
                                            @endguest
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <div class="col-12">
                            <small style="color: #acacac"><i class="fas fa-map-marker-alt" style="color: #acacac"></i>
                                {{$activity->province->PROVINCE_NAME}}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                <p style="font-size: 24px;">กิจกรรมแนะนำ</p>
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
    @include('layouts.user.footer_savfe')
@endsection


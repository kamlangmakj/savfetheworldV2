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
            <div class="mt-3 col-12 col-sm-12 col-md-9 col-lg-9">
                <div class="card">
                    <img class="card-img-top" src="{{ url($activity->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <div class="row mt-2 mb-2">
                            <div class="row col-12">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <small style="color: #acacac"><i class="fas fa-clock"></i>
                                        สร้างเมื่อ {{Carbon\Carbon::parse($activity->created_at)->diffForHumans()}}
                                    </small>
                                    {{--                                        <small style="color: #acacac"><i class="fas fa-history"></i> อัปเดตเมื่อ {{Carbon\Carbon::parse($activity->updated_at)->diffForHumans()}}</small>--}}
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 detail-savfe-align">
                                    @if ($activity->joinActivities->count() < $activity->amount)
                                        <small class="card-text" style="color: #2BC685;font-weight: bold;"><i
                                                    class="fas fa-user-clock"></i>
                                            จำนวนคนเข้าร่วม {{$activity->joinActivities->count()}}/{{$activity->amount}}
                                            คน</small>
                                    @else
                                        <small class="card-text" style="color: red;font-weight: bold;"><i
                                                    class="fas fa-user-times"></i>
                                            จำนวนคนเต็มแล้ว {{$activity->joinActivities->count()}}/{{$activity->amount}}
                                            คน</small>
                                    @endif
                                </div>
                                {{--                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">--}}
                                {{--                                        <small style="color: #acacac"><i class="fas fa-clock"></i> สร้างเมื่อ {{Carbon\Carbon::parse($activity->created_at)->diffForHumans()}}</small>--}}
                                {{--                                    </div>--}}
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                                <h4>{{Carbon\Carbon::parse($activity->started_date)->addYear(543)->translatedFormat('d M Y')}}
                                    - {{Carbon\Carbon::parse($activity->expired_date)->addYear(543)->translatedFormat('d M Y')}}</h4>
                            </div>
                            <div class="row col-12 mt-2">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</h6>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 detail-savfe-align">
                                    <h6 class="card-text" style="color: #2BC685;font-weight: bold;">
                                        ได้รับ {{$activity->point}} แต้ม</h6>
                                </div>
                            </div>

                        </div>
                        <h1 style="font-weight: bold;" class="card-title mt-3 mb-3">{{$activity->name}}</h1>
                        <h4 class="card-text">รายละเอียด</h4>
                        <p class="card-text">{{$activity->detail}}</p>
                        <h4 class="card-text">กำหนดการ</h4>
                        <p class="card-text">
                            06.00 น. พร้อมกัน ณ จุดลงทะเบียนที่ 1 (ปั๊ม ปตท. สนามเป้า)<br>
                            06.30 น. ล้อหมุน ขึ้นทางด่วน มุ่งหน้าสู่ ถนนพระราม 2<br>
                            07.00 น. รับสมาชิก ณ จุดลงทะเบียนที่ 2  ด้านหน้าห้าง Big C Rama2 (ตรงข้าม Central Rama 2)<br>
                            07.30 น. เดินทางมุ่งหน้าสู่ ตำบลคลองโคน อำเภอเมือง จังหวัดสมุทรสงคราม<br>
                            08.30 น. ฟังการบรรยาย “ประโยชน์ของป่าชายเลน และวิธีการปลูกป่าชายเลน” โดยวิทยากรรับเชิญ<br>
                            09.00 น. แบ่งสมาชิก (ทีมละ 15 คน ลงเรือ เดินทางสู่ พื้นที่แปลงปลูกป่าชายเลน<br>
                            (ควรนุ่งกางเกงขาสั้น เพื่อความสะดวกในการทำกิจกรรม)<br>
                            09.30 น. ปฏิบัติภาระกิจ ปลูกป่าชายเลน<br>
                            11.00 น. เดินทางกลับ “ศูนย์ศึกษาธรรมชาติป่าชายเลนคลองโคน”<br>
                            11.30 น. อาบน้ำ ชำระล้างร่างกาย ผลัดเปลี่ยนเสื้อผ้าให้เรียบร้อย<br>
                            12.00 น. รับประทานอาหารกลางวันร่วมกัน ใต้ร่มไม้โกงกาง<br>
                            13.30 น. สรุปกิจกรรมเยาวชนจิตอาสาร่วมอนุรักษ์สิ่งแวดล้อม “ปลูกป่าชายเลน” ร่วมกัน<br>
                            14.30 น. เดินทางมุ่งหน้าสู่ “ค่ายบางกุ้ง”<br>
                            15.00 น. กราบนมัสการ “หลวงพ่อนิลมณี” @ โบสถ์ปรกโพธิ์<br>
                            15.30 น. มุ่งหน้าสู่ “วัดภุมรินทร์กุฏีทอง”<br>
                            16.00 น. แวะซื้อของฝาก และรับประทานอาหารเย็น (ตามอัธยาศัย) @ “ตลาดน้ำอัมพวา”<br>
                            18.00 น. พร้อมกันที่จุดนัดหมาย<br>
                            20.00 น. เดินทางกลับถึงกรุงเทพมหานคร โดยสวัสดิภาพ
                        </p>
                        <small class="card-text">
                            ***หมายเหตุ : ทีมงานฯ ขอสงวนสิทธิการเปลี่ยนแปลงกำหนดการตามความเหมาะสม ทั้งนี้ จะพิจารณาเรื่องความปลอดภัยและการรักษาเวลาเป็นสำคัญ
                        </small>
                    </div>
                </div>
            </div>
            <div class="mt-3 col-12 col-sm-12 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <small style="color: #000">
                                    สถานที่ : {{$activity->address}}
                                </small>
                                <br>
                                <small style="color: #000">
                                    ติดต่อ : +669 1765 9890
                                </small>
                                <br>
                                <small style="color: #000">
                                    ชื่อผู้จัด : {{$activity->agent}}
                                </small>
                                <br>
                                <small style="color: #000">
                                    วันที่เริ่มกิจกรรม
                                    : {{Carbon\Carbon::parse($activity->started_date)->addYear(543)->translatedFormat('d M Y')}}
                                </small>
                                <br>
                                <small style="color: #000">
                                    วันที่จบกิจกรรม
                                    : {{Carbon\Carbon::parse($activity->expired_date)->addYear(543)->translatedFormat('d M Y')}}
                                </small>
                                <br>
                                @if ($activity->joinActivities->count() < $activity->amount)
                                    <small class="card-text" style="font-weight: bold;">
                                        จำนวนคนเข้าร่วม : {{$activity->joinActivities->count()}}/{{$activity->amount}}
                                        คน</small>
                                @else
                                    <small class="card-text" style="color: red;font-weight: bold;">
                                        จำนวนคนเต็มแล้ว {{$activity->joinActivities->count()}}/{{$activity->amount}}
                                        คน</small>
                                @endif
                                <br>
                                <small style="color: #000">
                                    ได้รับแต้ม : {{$activity->point}} แต้ม
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
                                                            data-target="#editModal"><i class="fas fa-times"></i>
                                                        ยกเลิกการเข้าร่วม
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
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
                                                                        <button type="submit" class="btn btn-primary">ยืนยัน
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
                                                                        <button type="submit" class="btn btn-primary">ยืนยัน
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
                                กรุงเทพมหานคร
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.user.footer_savfe')
@endsection


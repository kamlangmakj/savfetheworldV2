@extends('layouts.user.navbar')
@section('title', 'Check Confirm Join')
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
                                    <small class="p-1"
                                           style="color:#2BC685;width: auto;height: 20px;border: 1px solid #2BC685;border-radius:6px;">{{$join_activity->activity->category_types_activity->name}}</small>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                                <h6>{{Carbon\Carbon::parse($join_activity->activity->started_date)->addYear(543)->translatedFormat('d M Y')}}
                                    - {{Carbon\Carbon::parse($join_activity->activity->expired_date)->addYear(543)->translatedFormat('d M Y')}}</h6>
                            </div>
                        </div>
                        <h3 style="font-weight: bold;"
                            class="card-title mt-3 mb-3">{{$join_activity->activity->name}} </h3>
                        <br>
                        <h5 class="card-text"><i class="fas fa-book"></i> รายละเอียด</h5>
                        <p class="card-text">{{$join_activity->activity->detail}}</p>
                        <h5 class="card-text"><i class="fas fa-clock"></i> กำหนดการ</h5>
                        <p class="card-text">
                            06.00 น. พร้อมกัน ณ จุดลงทะเบียนที่ 1 (ปั๊ม ปตท. สนามเป้า)<br>
                            06.30 น. ล้อหมุน ขึ้นทางด่วน มุ่งหน้าสู่ ถนนพระราม 2<br>
                            07.00 น. รับสมาชิก ณ จุดลงทะเบียนที่ 2 ด้านหน้าห้าง Big C Rama2 (ตรงข้าม Central Rama 2)<br>
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
                            ***หมายเหตุ : ทีมงานฯ ขอสงวนสิทธิการเปลี่ยนแปลงกำหนดการตามความเหมาะสม ทั้งนี้
                            จะพิจารณาเรื่องความปลอดภัยและการรักษาเวลาเป็นสำคัญ
                        </small>
                    </div>
                </div>
            </div>
            <div class="mt-3 col-12 col-sm-12 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center">

                                    <div class="col-12 text-center">

                                        @if($join_activity->status_id != 1)
                                            <i class="fas fa-check-circle" style="font-size: 64px;color: #2BC685"></i>
                                            <h6 style="margin-top: 30px">คุณได้ยืนยันการเข้าร่วมกิจกรรมเรียบร้อยแล้ว</h6>
                                            @else
                                            <h5>กรอกรหัสยืนยัน</h5>
{{--                                            {{$join_activity->activity->number}}--}}
                                            {{--            {{str_random(6)}}--}}
                                            <br>
                                            <form role="form" action="{{ url('check_confirm_join',$join_activity->id) }}" method="post" enctype="multipart/form-data">
                                                {{csrf_field()}}
{{--                                                status_id:{{$join_activity->status_id}}--}}
                                                <input type="hidden" name="id"
                                                       value="{{$join_activity->id}}">
                                                <input type="text" class="form-control text-center"
                                                       placeholder="กรอกรหัสยืนยัน 6 หลัก" id="number" name="number">
                                                <input type="text" class="form-control text-center"
                                                       placeholder="กรอกรหัสยืนยัน 6 หลัก" id="number2" name="number2"
                                                       value="{{$join_activity->activity->number}}" style="display: none">

                                                <div class="mt-2">
                                                    <button type="submit" class="btn-savfe btn-main-savfe" id="btnCheck"
                                                            style="width: 100%;">
                                                        ยืนยัน
                                                    </button>
                                                </div>
                                            </form>
                                        @endif
                                    </div>

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
                                    <i class="fas fa-calendar-check"></i>
                                    วันที่เริ่ม {{Carbon\Carbon::parse($join_activity->activity->started_date)->addYear(543)->translatedFormat('d M Y')}}
                                </small>
                                <br>
                                <small style="color: #000">
                                    <i class="fas fa-calendar-times"></i>
                                    วันที่จบ {{Carbon\Carbon::parse($join_activity->activity->expired_date)->addYear(543)->translatedFormat('d M Y')}}
                                </small>
                                <br>
                                <small style="color: #2BC685"><i class="fas fa-star"></i>
                                    ได้รับแต้ม {{$join_activity->activity->point}} แต้ม
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




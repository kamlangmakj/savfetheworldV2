@extends('layouts.admin.master')

@section('title', 'Activities')

@section('header')
    <div class="row mb-2 mt-4">
        <div class="col-sm-6">
            <h5 class="m-0 text-dark">Create Activity - สร้างกิจกรรม</h5>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('admin/activities') }}">Activities</a></li>
                <li class="breadcrumb-item active">Create Activity</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #F1F2F2; height: 80px">
                    <h3 class="card-title text-bold mt-3">สร้างกิจกรรม</h3>
                </div>

                <!-- /.card-header -->
                <form role="form" action="{{ url('admin/activities/create') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">ชื่อกิจกรรม</label>
                                        <input type="text" class="form-control" placeholder="ชื่อ" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">ชื่อผู้จัด</label>
                                        <input type="text" class="form-control" placeholder="ชื่อผู้จัด" name="agent">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">หมวดหมู่กิจกรรม</label>
                                        <select type="text" class="form-control" placeholder="หมวดหมู่กิจกรรม" name="category_types_activities_id">
                                            <option value="">เลือกหมวดหมู่กิจกรรม</option>
                                            <optgroup label="ป่าไม้">
                                                <option value="1" data-cat="1">ป่าดิบชื้น</option>
                                                <option value="2" data-cat="1">ป่าดิบแล้ง</option>
                                                <option value="3" data-cat="1">ป่าดิบเขา</option>
                                                <option value="4" data-cat="1">ป่าสนเขา</option>
                                                <option value="5" data-cat="1">ป่าชายเลน</option>
                                                <option value="6" data-cat="1">ป่าพรุหรือป่าบึงน้ำจืด</option>
                                                <option value="7" data-cat="1">ป่าชายหาด</option>
                                                <option value="8" data-cat="1">ป่าเบญจพรรณ</option>
                                                <option value="9" data-cat="1">ป่าเต็งรัง</option>
                                                <option value="10" data-cat="1">ป่าหญ้า</option>
                                            </optgroup>
                                            <optgroup label="ทะเล">
                                                <option value="11" data-cat="2">ชายฝั่งหิน</option>
                                                <option value="12" data-cat="2">หาดทราย</option>
                                                <option value="13" data-cat="2">ลากูน</option>
                                                <option value="14" data-cat="2">ที่ราบน้ำขึ้นถึง</option>
                                                <option value="15" data-cat="2">พรุ</option>
                                                <option value="16" data-cat="2">เนินทราย</option>
                                            </optgroup>
                                            <optgroup label="ชุมชน">
                                                <option value="17" data-cat="3">ชุมชนเมือง</option>
                                                <option value="18" data-cat="3">ชุมชนชนบท</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="name">วันเริ่มกิจกรรม</label>
                                            <input type="date" class="form-control" name="started_date">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="name">วันจบกิจกรรม</label>
                                            <input type="date" class="form-control" name="expired_date">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="name">จำนวนคนที่เข้าร่วม</label>
                                            <input type=number class="form-control" value="1" name="amount">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="name">แต้ม</label>
                                            <input type=number class="form-control" value="1000" name="point">
                                        </div>
                                    </div>
                                </div>



                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleInputFile">เลือกรูปภาพ</label>
                                        <div class="mb-2">
                                            <img style="max-height:300px;" id="blah" src="http://placehold.it/300" alt="your image" />
                                        </div>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image" onchange="readURL(this);">
                                                <label class="custom-file-label" for="exampleInputFile" name="image">เลือกรูปภาพ</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">อัปโหลด</span>
                                            </div>
                                        </div>
                                        <script>
                                            function readURL(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();

                                                    reader.onload = function (e) {
                                                        $('#blah')
                                                            .attr('src', e.target.result);
                                                    };

                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">รายละเอียดกิจกรรม</label>
                                        <textarea rows="10" type="text" class="form-control" placeholder="รายละเอียดกิจกรรม" name="detail"></textarea>
                                    </div>
{{--                                    <div class="form-group">--}}
{{--                                        <label for="name">รายละเอียดกิจกรรม</label>--}}
{{--                                        <textarea id="txtEditor" rows="20" type="text" class="form-control" placeholder="รายละเอียดของรางวัล" name="detail"></textarea>--}}
{{--                                    </div>--}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">ที่อยู่</label>
                                <textarea rows="3" type="text" class="form-control" placeholder="ที่อยู่" name="address"></textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="name">ภูมิภาค</label>
                                    <select name="geography_id" class="form-control">
                                        <option value="">เลือกภูมิภาค</option>
                                        <option value="1">ภาคเหนือ</option>
                                        <option value="2">ภาคกลาง</option>
                                        <option value="3">ภาคตะวันออกเฉียงเหนือ</option>
                                        <option value="4">ภาคตะวันตก</option>
                                        <option value="5">ภาคตะวันออก</option>
                                        <option value="6">ภาคใต้</option>
                                    </select>
                                </div>

                                <div class="form-group col-6">
                                    <div class="form-group">
                                        <label for="name">จังหวัด</label>
                                        <select name="province_id" class="form-control">
                                            <option value="">เลือกจังหวัด</option>
                                            <option value="1">กรุงเทพมหานคร</option>
                                            <option value="2">สมุทรปราการ</option>
                                            <option value="3">นนทบุรี</option>
                                            <option value="4">ปทุมธานี</option>
                                            <option value="5">พระนครศรีอยุธยา</option>
                                            <option value="6">อ่างทอง</option>
                                            <option value="7">ลพบุรี</option>
                                            <option value="8">สิงห์บุรี</option>
                                            <option value="9">ชัยนาท</option>
                                            <option value="10">สระบุรี</option>
                                            <option value="11">ชลบุรี</option>
                                            <option value="12">ระยอง</option>
                                            <option value="13">จันทบุรี</option>
                                            <option value="14">ตราด</option>
                                            <option value="15">ฉะเชิงเทรา</option>
                                            <option value="16">ปราจีนบุรี</option>
                                            <option value="17">นครนายก</option>
                                            <option value="18">สระแก้ว</option>
                                            <option value="19">นครราชสีมา</option>
                                            <option value="20">บุรีรัมย์</option>
                                            <option value="21">สุรินทร์</option>
                                            <option value="22">ศรีสะเกษ</option>
                                            <option value="23">อุบลราชธานี</option>
                                            <option value="24">ยโสธร</option>
                                            <option value="25">ชัยภูมิ</option>
                                            <option value="26">อำนาจเจริญ</option>
                                            <option value="27">หนองบัวลำภู</option>
                                            <option value="28">ขอนแก่น</option>
                                            <option value="29">อุดรธานี</option>
                                            <option value="30">เลย</option>
                                            <option value="31">หนองคาย</option>
                                            <option value="32">มหาสารคาม</option>
                                            <option value="33">ร้อยเอ็ด</option>
                                            <option value="34">กาฬสินธุ์</option>
                                            <option value="35">สกลนคร</option>
                                            <option value="36">นครพนม</option>
                                            <option value="37">มุกดาหาร</option>
                                            <option value="38">เชียงใหม่</option>
                                            <option value="39">ลำพูน</option>
                                            <option value="40">ลำปาง</option>
                                            <option value="41">อุตรดิตถ์</option>
                                            <option value="42">แพร่</option>
                                            <option value="43">น่าน</option>
                                            <option value="44">พะเยา</option>
                                            <option value="45">เชียงราย</option>
                                            <option value="46">แม่ฮ่องสอน</option>
                                            <option value="47">นครสวรรค์</option>
                                            <option value="48">อุทัยธานี</option>
                                            <option value="49">กำแพงเพชร</option>
                                            <option value="50">ตาก</option>
                                            <option value="51">สุโขทัย</option>
                                            <option value="52">พิษณุโลก</option>
                                            <option value="53">พิจิตร</option>
                                            <option value="54">เพชรบูรณ์</option>
                                            <option value="55">ราชบุรี</option>
                                            <option value="56">กาญจนบุรี</option>
                                            <option value="57">สุพรรณบุรี</option>
                                            <option value="58">นครปฐม</option>
                                            <option value="59">สมุทรสาคร</option>
                                            <option value="60">สมุทรสงคราม</option>
                                            <option value="61">เพชรบุรี</option>
                                            <option value="62">ประจวบคีรีขันธ์</option>
                                            <option value="63">นครศรีธรรมราช</option>
                                            <option value="64">กระบี่</option>
                                            <option value="65">พังงา</option>
                                            <option value="66">ภูเก็ต</option>
                                            <option value="67">สุราษฎร์ธานี</option>
                                            <option value="68">ระนอง</option>
                                            <option value="69">ชุมพร</option>
                                            <option value="70">สงขลา</option>
                                            <option value="71">สตูล</option>
                                            <option value="72">ตรัง</option>
                                            <option value="73">พัทลุง</option>
                                            <option value="74">ปัตตานี</option>
                                            <option value="75">ยะลา</option>
                                            <option value="76">นราธิวาส</option>
                                            <option value="77">บึงกาฬ</option>
                                        </select>
                                    </div>
                                </div>

{{--                                <div class="form-group col-6" style="margin-top: -20px;">--}}
{{--                                    <label for="name">อำเภอ</label>--}}
{{--                                    <select name="province" class="form-control">--}}
{{--                                        <option value="">เลือกอำเภอ</option>--}}
{{--                                        <option value="ภาคเหนือ">เขตพระนคร</option>--}}
{{--                                        <option value="ภาคกลาง">เขตดุสิต</option>--}}
{{--                                        <option value="ภาคตะวันออกเฉียงเหนือ">เขตหนองจอก</option>--}}
{{--                                        <option value="ภาคตะวันตก">เขตบางรัก</option>--}}
{{--                                        <option value="ภาคตะวันออก">เขตบางเขน</option>--}}
{{--                                        <option value="ภาคใต้">เขตบางกะปิ</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}

{{--                                <div class="form-group col-6" style="margin-top: -20px;">--}}
{{--                                    <label for="name">ตำบล</label>--}}
{{--                                    <select name="province" class="form-control">--}}
{{--                                        <option value="">เลือกตำบล</option>--}}
{{--                                        <option value="ภาคเหนือ">พระบรมมหาราชวัง</option>--}}
{{--                                        <option value="ภาคกลาง">วังบูรพาภิรมย์</option>--}}
{{--                                        <option value="ภาคตะวันออกเฉียงเหนือ">วัดราชบพิธ</option>--}}
{{--                                        <option value="ภาคตะวันตก">สำราญราษฎร์</option>--}}
{{--                                        <option value="ภาคตะวันออก">ศาลเจ้าพ่อเสือ</option>--}}
{{--                                        <option value="ภาคใต้">เสาชิงช้า</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}

{{--                                <div class="form-group col-6">--}}
{{--                                    <label for="name">รหัสไปรษณีย์</label>--}}
{{--                                    <select name="province" class="form-control">--}}
{{--                                        <option value="">เลือกรหัสไปรษณีย์</option>--}}
{{--                                        <option value="10000">10000</option>--}}
{{--                                        <option value="10001">10001</option>--}}
{{--                                        <option value="10002">10002</option>--}}
{{--                                        <option value="10002">10002</option>--}}
{{--                                        <option value="10003">10003</option>--}}
{{--                                        <option value="10004">10004</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer"><a class="btn btn-danger" href="{{ url('admin/activities') }}"><i class="fas fa-arrow-alt-circle-left"></i> ย้อนกลับ</a>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-calendar-plus"></i> สร้างกิจกรรม</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

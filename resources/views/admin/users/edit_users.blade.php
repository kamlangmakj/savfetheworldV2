@extends('layouts.admin.master')

@section('title', 'Users')

@section('header')
    <div class="row mb-2 mt-4">
        <div class="col-sm-6">
            <h5 class="m-0 text-dark">Edit User - แก้ไขข้อมูลผู้ใช้งาน</h5>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">Users</a></li>
                <li class="breadcrumb-item active">Edit User</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #F1F2F2; height: 80px">
                    <h3 class="card-title text-bold mt-3">แก้ไขข้อมูลผู้ใช้งาน</h3>
                </div>

                <!-- /.card-header -->
                <form role="form" action="{{ url('admin/users/edit') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">ชื่อผู้ใช้งาน</label>
                                        <input type="text" class="form-control" placeholder="ชื่อ" name="name"
                                               value="{{ $user->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">อีเมล</label>
                                        <label type="text" class="form-control" placeholder="ชื่อ"
                                               name="email">{{ $user->email }}</label>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="name">เพศ</label>
                                            <select class="form-control" name="gender">
                                                <option value="ชาย" @if($user->gender == "ชาย") selected @endif>เพศชาย
                                                </option>
                                                <option value="หญิง" @if($user->gender == "หญิง") selected @endif>
                                                    เพศหญิง
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="name">วัน/เดือน/ปีเกิด</label>
                                            <input type="date" class="form-control" name="birth_date"
                                                   value="{{ $user->birth_date }}">
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="name">เบอร์โทรศัพท์</label>
                                            <input type="text" class="form-control" name="phone"
                                                   value="{{ $user->phone }}">
                                        </div>

                                        {{--                                        <div class="form-group col-6">--}}
                                        {{--                                            <label for="name">ระดับผู้ใช้งาน</label>--}}
                                        {{--                                            <input type="text" class="form-control" placeholder="ชื่อ" name="role" value="{{ $user->role }}">--}}
                                        {{--                                        </div>--}}
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleInputFile">เลือกรูปภาพ</label>
                                        <div class="mb-2">
                                            <img style="max-height:300px;" id="blah" src="/{{ $user->image }}"
                                                 alt="your image"/>
                                        </div>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                       name="image" onchange="readURL(this);">
                                                <label class="custom-file-label"
                                                       for="exampleInputFile">{{ $user->image }}</label>
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
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">ที่อยู่</label>
                                <textarea rows="3" type="text" class="form-control" placeholder="ที่อยู่"
                                          name="address">{{ $user->address }}</textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="name">ภูมิภาค</label>
                                    <select name="geography_id" class="form-control">
                                        <option value="1" @if($user->geography_id == 1) selected @endif>ภาคเหนือ</option>
                                        <option value="2" @if($user->geography_id == 2) selected @endif>ภาคกลาง</option>
                                        <option value="3" @if($user->geography_id == 3) selected @endif>ภาคตะวันออกเฉียงเหนือ</option>
                                        <option value="4" @if($user->geography_id == 4) selected @endif>ภาคตะวันตก</option>
                                        <option value="5" @if($user->geography_id == 5) selected @endif>ภาคตะวันออก</option>
                                        <option value="6" @if($user->geography_id == 6) selected @endif>ภาคใต้</option>
                                    </select>
                                </div>

                                <div class="form-group col-6">
                                    <div class="form-group">
                                        <label for="name">จังหวัด</label>
                                        <select name="province_id" class="form-control">
                                            <option value="1" @if($user->province_id == 1) selected @endif>กรุงเทพมหานคร</option>
                                            <option value="2" @if($user->province_id == 2) selected @endif>สมุทรปราการ</option>
                                            <option value="3" @if($user->province_id == 3) selected @endif>นนทบุรี</option>
                                            <option value="4" @if($user->province_id == 4) selected @endif>ปทุมธานี</option>
                                            <option value="5" @if($user->province_id == 5) selected @endif>พระนครศรีอยุธยา</option>
                                            <option value="6" @if($user->province_id == 6) selected @endif>อ่างทอง</option>
                                            <option value="7" @if($user->province_id == 7) selected @endif>ลพบุรี</option>
                                            <option value="8" @if($user->province_id == 8) selected @endif>สิงห์บุรี</option>
                                            <option value="9" @if($user->province_id == 9) selected @endif>ชัยนาท</option>
                                            <option value="10" @if($user->province_id == 10) selected @endif>สระบุรี</option>
                                            <option value="11" @if($user->province_id == 11) selected @endif>ชลบุรี</option>
                                            <option value="12" @if($user->province_id == 12) selected @endif>ระยอง</option>
                                            <option value="13" @if($user->province_id == 13) selected @endif>จันทบุรี</option>
                                            <option value="14" @if($user->province_id == 14) selected @endif>ตราด</option>
                                            <option value="15" @if($user->province_id == 15) selected @endif>ฉะเชิงเทรา</option>
                                            <option value="16" @if($user->province_id == 16) selected @endif>ปราจีนบุรี</option>
                                            <option value="17" @if($user->province_id == 17) selected @endif>นครนายก</option>
                                            <option value="18" @if($user->province_id == 18) selected @endif>สระแก้ว</option>
                                            <option value="19" @if($user->province_id == 19) selected @endif>นครราชสีมา</option>
                                            <option value="20" @if($user->province_id == 20) selected @endif>บุรีรัมย์</option>
                                            <option value="21" @if($user->province_id == 21) selected @endif>สุรินทร์</option>
                                            <option value="22" @if($user->province_id == 22) selected @endif>ศรีสะเกษ</option>
                                            <option value="23" @if($user->province_id == 23) selected @endif>อุบลราชธานี</option>
                                            <option value="24" @if($user->province_id == 24) selected @endif>ยโสธร</option>
                                            <option value="25" @if($user->province_id == 25) selected @endif>ชัยภูมิ</option>
                                            <option value="26" @if($user->province_id == 26) selected @endif>อำนาจเจริญ</option>
                                            <option value="27" @if($user->province_id == 27) selected @endif>หนองบัวลำภู</option>
                                            <option value="28" @if($user->province_id == 28) selected @endif>ขอนแก่น</option>
                                            <option value="29" @if($user->province_id == 29) selected @endif>อุดรธานี</option>
                                            <option value="30" @if($user->province_id == 30) selected @endif>เลย</option>
                                            <option value="31" @if($user->province_id == 31) selected @endif>หนองคาย</option>
                                            <option value="32" @if($user->province_id == 32) selected @endif>มหาสารคาม</option>
                                            <option value="33" @if($user->province_id == 33) selected @endif>ร้อยเอ็ด</option>
                                            <option value="34" @if($user->province_id == 34) selected @endif>กาฬสินธุ์</option>
                                            <option value="35" @if($user->province_id == 35) selected @endif>สกลนคร</option>
                                            <option value="36" @if($user->province_id == 36) selected @endif>นครพนม</option>
                                            <option value="37" @if($user->province_id == 37) selected @endif>มุกดาหาร</option>
                                            <option value="38" @if($user->province_id == 38) selected @endif>เชียงใหม่</option>
                                            <option value="39" @if($user->province_id == 39) selected @endif>ลำพูน</option>
                                            <option value="40" @if($user->province_id == 40) selected @endif>ลำปาง</option>
                                            <option value="41" @if($user->province_id == 41) selected @endif>อุตรดิตถ์</option>
                                            <option value="42" @if($user->province_id == 42) selected @endif>แพร่</option>
                                            <option value="43" @if($user->province_id == 43) selected @endif>น่าน</option>
                                            <option value="44" @if($user->province_id == 44) selected @endif>พะเยา</option>
                                            <option value="45" @if($user->province_id == 45) selected @endif>เชียงราย</option>
                                            <option value="46" @if($user->province_id == 46) selected @endif>แม่ฮ่องสอน</option>
                                            <option value="47" @if($user->province_id == 47) selected @endif>นครสวรรค์</option>
                                            <option value="48" @if($user->province_id == 48) selected @endif>อุทัยธานี</option>
                                            <option value="49" @if($user->province_id == 49) selected @endif>กำแพงเพชร</option>
                                            <option value="50" @if($user->province_id == 50) selected @endif>ตาก</option>
                                            <option value="51" @if($user->province_id == 51) selected @endif>สุโขทัย</option>
                                            <option value="52" @if($user->province_id == 52) selected @endif>พิษณุโลก</option>
                                            <option value="53" @if($user->province_id == 53) selected @endif>พิจิตร</option>
                                            <option value="54" @if($user->province_id == 54) selected @endif>เพชรบูรณ์</option>
                                            <option value="55" @if($user->province_id == 55) selected @endif>ราชบุรี</option>
                                            <option value="56" @if($user->province_id == 56) selected @endif>กาญจนบุรี</option>
                                            <option value="57" @if($user->province_id == 57) selected @endif>สุพรรณบุรี</option>
                                            <option value="58" @if($user->province_id == 58) selected @endif>นครปฐม</option>
                                            <option value="59" @if($user->province_id == 59) selected @endif>สมุทรสาคร</option>
                                            <option value="60" @if($user->province_id == 60) selected @endif>สมุทรสงคราม</option>
                                            <option value="61" @if($user->province_id == 61) selected @endif>เพชรบุรี</option>
                                            <option value="62" @if($user->province_id == 62) selected @endif>ประจวบคีรีขันธ์</option>
                                            <option value="63" @if($user->province_id == 63) selected @endif>นครศรีธรรมราช</option>
                                            <option value="64" @if($user->province_id == 64) selected @endif>กระบี่</option>
                                            <option value="65" @if($user->province_id == 65) selected @endif>พังงา</option>
                                            <option value="66" @if($user->province_id == 66) selected @endif>ภูเก็ต</option>
                                            <option value="67" @if($user->province_id == 67) selected @endif>สุราษฎร์ธานี</option>
                                            <option value="68" @if($user->province_id == 68) selected @endif>ระนอง</option>
                                            <option value="69" @if($user->province_id == 69) selected @endif>ชุมพร</option>
                                            <option value="70" @if($user->province_id == 70) selected @endif>สงขลา</option>
                                            <option value="71" @if($user->province_id == 71) selected @endif>สตูล</option>
                                            <option value="72" @if($user->province_id == 72) selected @endif>ตรัง</option>
                                            <option value="73" @if($user->province_id == 73) selected @endif>พัทลุง</option>
                                            <option value="74" @if($user->province_id == 74) selected @endif>ปัตตานี</option>
                                            <option value="75" @if($user->province_id == 75) selected @endif>ยะลา</option>
                                            <option value="76" @if($user->province_id == 76) selected @endif>นราธิวาส</option>
                                            <option value="77" @if($user->province_id == 77) selected @endif>บึงกาฬ</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-6" style="margin-top: -20px;">
                                    <label for="name">อำเภอ</label>
                                    <select name="province" class="form-control">
                                        <option value="">เลือกอำเภอ</option>
                                        <option value="ภาคเหนือ">เขตพระนคร</option>
                                        <option value="ภาคกลาง">เขตดุสิต</option>
                                        <option value="ภาคตะวันออกเฉียงเหนือ">เขตหนองจอก</option>
                                        <option value="ภาคตะวันตก">เขตบางรัก</option>
                                        <option value="ภาคตะวันออก">เขตบางเขน</option>
                                        <option value="ภาคใต้">เขตบางกะปิ</option>
                                    </select>
                                </div>

                                <div class="form-group col-6" style="margin-top: -20px;">
                                    <label for="name">ตำบล</label>
                                    <select name="province" class="form-control">
                                        <option value="">เลือกตำบล</option>
                                        <option value="ภาคเหนือ">พระบรมมหาราชวัง</option>
                                        <option value="ภาคกลาง">วังบูรพาภิรมย์</option>
                                        <option value="ภาคตะวันออกเฉียงเหนือ">วัดราชบพิธ</option>
                                        <option value="ภาคตะวันตก">สำราญราษฎร์</option>
                                        <option value="ภาคตะวันออก">ศาลเจ้าพ่อเสือ</option>
                                        <option value="ภาคใต้">เสาชิงช้า</option>
                                    </select>
                                </div>

                                <div class="form-group col-6">
                                    <label for="name">รหัสไปรษณีย์</label>
                                    <select name="province" class="form-control">
                                        <option value="">เลือกรหัสไปรษณีย์</option>
                                        <option value="10000">10000</option>
                                        <option value="10001">10001</option>
                                        <option value="10002">10002</option>
                                        <option value="10002">10002</option>
                                        <option value="10003">10003</option>
                                        <option value="10004">10004</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a class="btn btn-danger" href="{{ url('admin/users') }}"><i
                                    class="fas fa-arrow-alt-circle-left"></i> ย้อนกลับ</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal"><i
                                    class="fas fa-save"></i> บันทึกการแก้ไข
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            บันทึกการแก้ไขข้อมูลผู้ใช้งาน</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        คุณต้องการบันทึกการแก้ไขข้อมูลผู้ใช้งาน ใช่หรือไม่?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก
                                        </button>
                                        <button type="submit" class="btn btn-primary">บันทึก</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection




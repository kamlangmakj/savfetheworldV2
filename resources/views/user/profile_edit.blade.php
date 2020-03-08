@extends('layouts.user.navbar')
@section('title', 'Profile')
@section('content')
    <div class="container" style="margin-top: 80px;">
        {{csrf_field()}}
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p style="font-size: 38px; font-weight: bold">แก้ไขโปรไฟล์</p>
                        @include('layouts.user.title_savfe')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <form role="form" action="{{ url('/profile/edit') }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name">ชื่อผู้ใช้งาน</label>
                                            <input type="text" class="form-control" placeholder="ชื่อ" name="name" value="{{ $user->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">อีเมล</label>
                                            <label type="text" class="form-control" placeholder="ชื่อ" name="email">{{ $user->email }}</label>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="name">เพศ</label>
                                                <select class="form-control" name="gender">
                                                    <option value="ชาย" @if($user->gender == "ชาย") selected @endif>เพศชาย</option>
                                                    <option value="หญิง" @if($user->gender == "หญิง") selected @endif>เพศหญิง</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="name">วัน/เดือน/ปีเกิด</label>
                                                <input type="date" class="form-control" name="age" value="2020-02-04">
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="name">เบอร์โทรศัพท์</label>
                                                <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
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
                                                <img style="max-height:300px;" id="blah" src="/{{ $user->image }}" alt="your image" />
                                            </div>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="image" onchange="readURL(this);">
                                                    <label class="custom-file-label" for="exampleInputFile">{{ $user->image }}</label>
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
                                    <textarea rows="3" type="text" class="form-control" placeholder="ที่อยู่" name="address"></textarea>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="name">ภูมิภาค</label>
                                        <select name="province" class="form-control">
                                            <option value="">เลือกภูมิภาค</option>
                                            <option value="ภาคเหนือ">ภาคเหนือ</option>
                                            <option value="ภาคกลาง">ภาคกลาง</option>
                                            <option value="ภาคตะวันออกเฉียงเหนือ">ภาคตะวันออกเฉียงเหนือ</option>
                                            <option value="ภาคตะวันตก">ภาคตะวันตก</option>
                                            <option value="ภาคตะวันออก">ภาคตะวันออก</option>
                                            <option value="ภาคใต้">ภาคใต้</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6">
                                        <div class="form-group">
                                            <label for="name">จังหวัด</label>
                                            <select name="province" class="form-control">
                                                <option value="">เลือกจังหวัด</option>
                                                <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                                                <option value="กระบี่">กระบี่ </option>
                                                <option value="กาญจนบุรี">กาญจนบุรี </option>
                                                <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
                                                <option value="กำแพงเพชร">กำแพงเพชร </option>
                                                <option value="ขอนแก่น">ขอนแก่น</option>
                                                <option value="จันทบุรี">จันทบุรี</option>
                                                <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
                                                <option value="ชัยนาท">ชัยนาท </option>
                                                <option value="ชัยภูมิ">ชัยภูมิ </option>
                                                <option value="ชุมพร">ชุมพร </option>
                                                <option value="ชลบุรี">ชลบุรี </option>
                                                <option value="เชียงใหม่">เชียงใหม่ </option>
                                                <option value="เชียงราย">เชียงราย </option>
                                                <option value="ตรัง">ตรัง </option>
                                                <option value="ตราด">ตราด </option>
                                                <option value="ตาก">ตาก </option>
                                                <option value="นครนายก">นครนายก </option>
                                                <option value="นครปฐม">นครปฐม </option>
                                                <option value="นครพนม">นครพนม </option>
                                                <option value="นครราชสีมา">นครราชสีมา </option>
                                                <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
                                                <option value="นครสวรรค์">นครสวรรค์ </option>
                                                <option value="นราธิวาส">นราธิวาส </option>
                                                <option value="น่าน">น่าน </option>
                                                <option value="นนทบุรี">นนทบุรี </option>
                                                <option value="บึงกาฬ">บึงกาฬ</option>
                                                <option value="บุรีรัมย์">บุรีรัมย์</option>
                                                <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
                                                <option value="ปทุมธานี">ปทุมธานี </option>
                                                <option value="ปราจีนบุรี">ปราจีนบุรี </option>
                                                <option value="ปัตตานี">ปัตตานี </option>
                                                <option value="พะเยา">พะเยา </option>
                                                <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
                                                <option value="พังงา">พังงา </option>
                                                <option value="พิจิตร">พิจิตร </option>
                                                <option value="พิษณุโลก">พิษณุโลก </option>
                                                <option value="เพชรบุรี">เพชรบุรี </option>
                                                <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
                                                <option value="แพร่">แพร่ </option>
                                                <option value="พัทลุง">พัทลุง </option>
                                                <option value="ภูเก็ต">ภูเก็ต </option>
                                                <option value="มหาสารคาม">มหาสารคาม </option>
                                                <option value="มุกดาหาร">มุกดาหาร </option>
                                                <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
                                                <option value="ยโสธร">ยโสธร </option>
                                                <option value="ยะลา">ยะลา </option>
                                                <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
                                                <option value="ระนอง">ระนอง </option>
                                                <option value="ระยอง">ระยอง </option>
                                                <option value="ราชบุรี">ราชบุรี</option>
                                                <option value="ลพบุรี">ลพบุรี </option>
                                                <option value="ลำปาง">ลำปาง </option>
                                                <option value="ลำพูน">ลำพูน </option>
                                                <option value="เลย">เลย </option>
                                                <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                                                <option value="สกลนคร">สกลนคร</option>
                                                <option value="สงขลา">สงขลา </option>
                                                <option value="สมุทรสาคร">สมุทรสาคร </option>
                                                <option value="สมุทรปราการ">สมุทรปราการ </option>
                                                <option value="สมุทรสงคราม">สมุทรสงคราม </option>
                                                <option value="สระแก้ว">สระแก้ว </option>
                                                <option value="สระบุรี">สระบุรี </option>
                                                <option value="สิงห์บุรี">สิงห์บุรี </option>
                                                <option value="สุโขทัย">สุโขทัย </option>
                                                <option value="สุพรรณบุรี">สุพรรณบุรี </option>
                                                <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                                                <option value="สุรินทร์">สุรินทร์ </option>
                                                <option value="สตูล">สตูล </option>
                                                <option value="หนองคาย">หนองคาย </option>
                                                <option value="หนองบัวลำภู">หนองบัวลำภู </option>
                                                <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                                                <option value="อุดรธานี">อุดรธานี </option>
                                                <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
                                                <option value="อุทัยธานี">อุทัยธานี </option>
                                                <option value="อุบลราชธานี">อุบลราชธานี</option>
                                                <option value="อ่างทอง">อ่างทอง </option>
                                                <option value="อื่นๆ">อื่นๆ</option>
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
                            <a class="btn btn-danger" href="{{ url('profile') }}"><i class="fas fa-arrow-alt-circle-left"></i> ย้อนกลับ</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#editModal"><i class="fas fa-save"></i> บันทึกการแก้ไข</button>
                            <!-- Modal -->
                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">บันทึกการแก้ไขข้อมูลผู้ใช้งาน</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            คุณต้องการบันทึกการแก้ไขข้อมูลผู้ใช้งาน ใช่หรือไม่?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
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
    </div>
@endsection




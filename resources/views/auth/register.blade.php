{{--@extends('layouts.app')--}}
@extends('layouts.user.navmaster')
@section('title', 'Register')

@section('content')
    <div class="container" style="margin-top: 60px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('สมัครสมาชิก [USER]') }}</div>

                    <div class="card-body">
                        <form id="regForm" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-4 text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <span class="step mb-2">1</span>
                                        <p style="color:#000;">ข้อมูลสมาชิก</p>
                                    </div>
                                    <div class="col-4">
                                        <span class="step mb-2">2</span>
                                        <p style="color:#000;">ข้อมูลทั่วไป</p>
                                    </div>
                                    <div class="col-4">
                                        <span class="step mb-2">3</span>
                                        <p style="color:#000;">ข้อมูลความสนใจ</p>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="tab">
                                <div class="form-group row">
                                    <div class="col-12 text-center">
                                        <h3>ข้อมูลสมาชิก</h3>
                                        <hr style="width: 20%; border: 1px solid #2BC685;">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name') }}" required autocomplete="name" autofocus
                                               oninput="this.className" placeholder="ชื่อของคุณ">

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right">{{ __('อีเมล') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email"
                                               placeholder="อีเมลของคุณ">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password"
                                               required autocomplete="new-password" placeholder="รหัสผ่านของคุณ">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm"
                                           class="col-md-4 col-form-label text-md-right">{{ __('ยืนยันรหัสผ่าน') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required autocomplete="new-password"
                                               placeholder="ยืนยันรหัสผ่านของคุณ">
                                    </div>
                                </div>
                            </div>

                            <div class="tab">
                                <div class="form-group row">
                                    <div class="col-12 text-center">
                                        <h3>ข้อมูลทั่วไป</h3>
                                        <hr style="width: 20%; border: 1px solid #2BC685;">
                                    </div>
                                </div>
                                {{--                                <div class="form-group row">--}}
                                {{--                                    <label for="image"--}}
                                {{--                                           class="col-md-4 col-form-label text-md-right">{{ __('เลือกรูปโปรไฟล์') }}</label>--}}

                                {{--                                    <div class="col-md-6">--}}
                                {{--                                        <img style="max-height:300px;" id="blah" src="http://placehold.it/300"--}}
                                {{--                                             alt="your image"/>--}}
                                {{--                                        <div class="input-group mt-3">--}}
                                {{--                                            <div class="custom-file">--}}
                                {{--                                                <input type="file" class="custom-file-input" id="exampleInputFile"--}}
                                {{--                                                       name="image" onchange="readURL(this);">--}}
                                {{--                                                <label class="custom-file-label" for="exampleInputFile" name="image">เลือกรูปภาพ</label>--}}
                                {{--                                            </div>--}}
                                {{--                                            <div class="input-group-append">--}}
                                {{--                                                <span class="input-group-text" id="">อัปโหลด</span>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                        <script>--}}
                                {{--                                            function readURL(input) {--}}
                                {{--                                                if (input.files && input.files[0]) {--}}
                                {{--                                                    var reader = new FileReader();--}}

                                {{--                                                    reader.onload = function (e) {--}}
                                {{--                                                        $('#blah')--}}
                                {{--                                                            .attr('src', e.target.result);--}}
                                {{--                                                    };--}}

                                {{--                                                    reader.readAsDataURL(input.files[0]);--}}
                                {{--                                                }--}}
                                {{--                                            }--}}
                                {{--                                        </script>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}

                                <div class="form-group row">
                                    <label for="address"
                                           class="col-md-4 col-form-label text-md-right">{{ __('ที่อยู่') }}</label>

                                    <div class="col-md-6">
                                        <textarea rows="3" type="text"
                                                  class="form-control @error('address') is-invalid @enderror"
                                                  name="address"
                                                  value="{{ old('address') }}" required autocomplete="address" autofocus
                                                  oninput="this.className" placeholder="ที่อยู่ของคุณ"></textarea>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="geography_id"
                                           class="col-md-4 col-form-label text-md-right">{{ __('ภูมิภาค') }}</label>

                                    <div class="col-md-6">
                                        <select name="geography_id"
                                                class="form-control @error('geography_id') is-invalid @enderror"
                                                name="geography_id"
                                                value="{{ old('geography_id') }}" required autocomplete="geography_id"
                                                autofocus
                                                oninput="this.className">
                                            <option value="1">ภาคเหนือ</option>
                                            <option value="2">ภาคกลาง</option>
                                            <option value="3">ภาคตะวันออกเฉียงเหนือ</option>
                                            <option value="4">ภาคตะวันตก</option>
                                            <option value="5">ภาคตะวันออก</option>
                                            <option value="6">ภาคใต้</option>
                                        </select>

                                        @error('geography_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="province_id"
                                           class="col-md-4 col-form-label text-md-right">{{ __('จังหวัด') }}</label>

                                    <div class="col-md-6">
                                        <select name="province_id"
                                                class="form-control @error('province_id') is-invalid @enderror"
                                                name="province_id"
                                                value="{{ old('province_id') }}" required autocomplete="province_id"
                                                autofocus
                                                oninput="this.className">
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

                                        @error('province_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="gender"
                                           class="col-md-4 col-form-label text-md-right">{{ __('เพศ') }}</label>

                                    <div class="col-md-6">
                                        {{--                                        <input id="gender" type="text"--}}
                                        {{--                                               class="form-control @error('gender') is-invalid @enderror" name="gender"--}}
                                        {{--                                               value="{{ old('gender') }}" required autocomplete="gender" autofocus placeholder="เพศของคุณ">--}}
                                        <select name="gender"
                                                class="form-control @error('gender') is-invalid @enderror"
                                                name="gender"
                                                value="{{ old('gender') }}" required autocomplete="gender"
                                                autofocus
                                                oninput="this.className">
                                            <option value="ชาย">ชาย</option>
                                            <option value="หญิง">หญิง</option>
                                        </select>

                                        @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="birth_date"
                                           class="col-md-4 col-form-label text-md-right">{{ __('วันเกิด') }}</label>

                                    <div class="col-md-6">
                                        <input id="birth_date" type="date"
                                               class="form-control @error('birth_date') is-invalid @enderror"
                                               name="birth_date"
                                               value="{{ old('birth_date') }}" required autocomplete="gender" autofocus>

                                        @error('birth_date')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone"
                                           class="col-md-4 col-form-label text-md-right">{{ __('เบอร์โทรศัพท์') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="text"
                                               class="form-control @error('phone') is-invalid @enderror" name="phone"
                                               value="{{ old('phone') }}" required autocomplete="phone" autofocus
                                               placeholder="เบอร์โทรศัพท์ของคุณ">

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="tab">
                                <div class="form-group row">
                                    <div class="col-12 text-center">
                                        <h3>ข้อมูลความสนใจ</h3>
                                        <hr style="width: 20%; border: 1px solid #2BC685;">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-4 col-form-label text-md-right">เลือกความสนใจ</div>
                                    <div class="col-md-6">
                                        <div class="form-check mt-2">
                                            <div>
                                                <label class="form-check-label" for="gridCheck1">
                                                    หมวดหมู่ป่าไม้
                                                </label>
                                            </div>
                                            <div style="margin-top: 10px">
                                                <input class="form form-check-input" type="checkbox" id="gridCheck1" name="register_favorite_type[]" value="1">
                                                <label class="form-check-label" for="gridCheck1">
                                                    ป่าดิบชื้น
                                                </label>
                                            </div>
                                            <div style="margin-top: 10px">
                                                <input class="form form-check-input" type="checkbox" id="gridCheck1" name="register_favorite_type[]" value="2">
                                                <label class="form-check-label" for="gridCheck1">
                                                    ป่าดิบแล้ง
                                                </label>
                                            </div>
                                            <div style="margin-top: 10px">
                                                <input class="form form-check-input" type="checkbox" id="gridCheck1" name="register_favorite_type[]" value="3">
                                                <label class="form-check-label" for="gridCheck1">
                                                    ป่าดิบเขา
                                                </label>
                                            </div>
                                            <div style="margin-top: 10px">
                                                <input class="form form-check-input" type="checkbox" id="gridCheck1" name="register_favorite_type[]" value="4">
                                                <label class="form-check-label" for="gridCheck1">
                                                    ป่าสนเขา
                                                </label>
                                            </div>
                                            <div style="margin-top: 10px">
                                                <input class="form form-check-input" type="checkbox" id="gridCheck1" name="register_favorite_type[]" value="5">
                                                <label class="form-check-label" for="gridCheck1">
                                                    ป่าชายเลน
                                                </label>
                                            </div>
                                            <div style="margin-top: 10px">
                                                <input class="form form-check-input" type="checkbox" id="gridCheck1" name="register_favorite_type[]" value="6">
                                                <label class="form-check-label" for="gridCheck1">
                                                    ป่าพรุหรือป่าบึงน้ำจืด
                                                </label>
                                            </div>
                                            <div style="margin-top: 10px">
                                                <input class="form form-check-input" type="checkbox" id="gridCheck1" name="register_favorite_type[]" value="7">
                                                <label class="form-check-label" for="gridCheck1">
                                                    ป่าชายหาด
                                                </label>
                                            </div>
                                            <div style="margin-top: 10px">
                                                <input class="form form-check-input" type="checkbox" id="gridCheck1" name="register_favorite_type[]" value="8">
                                                <label class="form-check-label" for="gridCheck1">
                                                    ป่าเบญจพรรณ
                                                </label>
                                            </div>
                                            <div style="margin-top: 10px">
                                                <input class="form form-check-input" type="checkbox" id="gridCheck1" name="register_favorite_type[]" value="9">
                                                <label class="form-check-label" for="gridCheck1">
                                                    ป่าเต็งรัง
                                                </label>
                                            </div>
                                            <div style="margin-top: 10px">
                                                <input class="form form-check-input" type="checkbox" id="gridCheck1" name="register_favorite_type[]" value="10">
                                                <label class="form-check-label" for="gridCheck1">
                                                    ป่าหญ้า
                                                </label>
                                            </div>

                                            <hr>

                                            <div style="margin-top: 20px">
                                                <label class="form-check-label" for="gridCheck1">
                                                    หมวดหมู่ทะเล
                                                </label>
                                            </div>
                                            <div style="margin-top: 10px">
                                                <input class="form form-check-input" type="checkbox" id="gridCheck1" name="register_favorite_type[]" value="11">
                                                <label class="form-check-label" for="gridCheck1">
                                                    ชายฝั่งหิน
                                                </label>
                                            </div>
                                            <div style="margin-top: 10px">
                                                <input class="form form-check-input" type="checkbox" id="gridCheck1" name="register_favorite_type[]" value="12">
                                                <label class="form-check-label" for="gridCheck1">
                                                    หาดทราย
                                                </label>
                                            </div>
                                            <div style="margin-top: 10px">
                                                <input class="form form-check-input" type="checkbox" id="gridCheck1" name="register_favorite_type[]" value="13">
                                                <label class="form-check-label" for="gridCheck1">
                                                    ลากูน
                                                </label>
                                            </div>
                                            <div style="margin-top: 10px">
                                                <input class="form form-check-input" type="checkbox" id="gridCheck1" name="register_favorite_type[]" value="14">
                                                <label class="form-check-label" for="gridCheck1">
                                                    ที่ราบน้ำขึ้นถึง
                                                </label>
                                            </div>
                                            <div style="margin-top: 10px">
                                                <input class="form form-check-input" type="checkbox" id="gridCheck1" name="register_favorite_type[]" value="15">
                                                <label class="form-check-label" for="gridCheck1">
                                                    พรุ
                                                </label>
                                            </div>
                                            <div style="margin-top: 10px">
                                                <input class="form form-check-input" type="checkbox" id="gridCheck1" name="register_favorite_type[]" value="16">
                                                <label class="form-check-label" for="gridCheck1">
                                                    เนินทราย
                                                </label>
                                            </div>

                                            <hr>

                                            <div style="margin-top: 20px">
                                                <label class="form-check-label" for="gridCheck1">
                                                    หมวดชุมชน
                                                </label>
                                            </div>
                                            <div style="margin-top: 10px">
                                                <input class="form form-check-input" type="checkbox" id="gridCheck1" name="register_favorite_type[]" value="17">
                                                <label class="form-check-label" for="gridCheck1">
                                                    ชุมชนเมือง
                                                </label>
                                            </div>
                                            <div style="margin-top: 10px">
                                                <input class="form form-check-input" type="checkbox" id="gridCheck1" name="register_favorite_type[]" value="18">
                                                <label class="form-check-label" for="gridCheck1">
                                                    ชุมชนชนบท
                                                </label>
                                            </div>
                                        </div>

                                        @error('favorite_type')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{--                            <div class="form-group row mb-0">--}}
                            {{--                                <div class="col-md-6 offset-md-4">--}}
                            {{--                                    <button type="submit" class="btn-savfe btn-main-savfe">--}}
                            {{--                                        {{ __('สมัครสมาชิก') }}--}}
                            {{--                                    </button>--}}
                            {{--                                    @if (Route::has('password.request'))--}}
                            {{--                                        <a class="btn btn-link-savfe " href="{{ route('login') }}">--}}
                            {{--                                            {{ __('เป็นสมาชิกอยู่แล้ว?') }}--}}
                            {{--                                        </a>--}}
                            {{--                                    @endif--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            <div style="overflow:auto;">
                                <div class="mt-3" style="float:right;">
                                    <a class="btn btn-link-savfe " href="{{ route('login') }}">
                                        {{ __('เป็นสมาชิกอยู่แล้ว?') }}
                                    </a>
                                    <button type="button" id="prevBtn" class="btn-savfe" onclick="nextPrev(-1)">
                                        ย้อนกลับ
                                    </button>
                                    <button type="button" id="nextBtn" class="btn-savfe btn-main-savfe"
                                            onclick="nextPrev(1)">ต่อไป
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

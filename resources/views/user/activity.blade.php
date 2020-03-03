@extends('layouts.user.navbar')
@section('title', 'Activity')
@section('content')
    <div class="container" style="margin-top: 80px;">
        <div class="row">
            <div class="container">
                <div class="row">
                    @guest
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                            <p style="font-size: 38px; font-weight: bold">กิจกรรมที่น่าสนใจ</p>
                            @include('layouts.user.title_savfe')
                        </div>
                    @else
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                            <p style="font-size: 38px; font-weight: bold">กิจกรรมที่น่าสนใจ</p>
                            @include('layouts.user.title_savfe')
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                            <a href="#" style="color: #2BC685;font-size: 36px;float: right"><i class="fas fa-calendar-alt"></i></a>
                        </div>
                    @endguest

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="input-group col-12 col-sm-12 col-md-8 offset-md-2 col-lg-8 offset-lg-2">
                <input class="form-control" type="text" name="search" id="search" placeholder="ค้นหา ID, ชื่อกิจกรรม" aria-label="Search">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-text1"><i class="fas fa-search text-grey" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
    </div>



    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <p style="font-size: 24px;">กิจกรรมพิเศษ</p>
                @include('layouts.user.title_savfe')
            </div>
        </div>

        <div class="row">
            <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card">
                    <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap" style="height: 200px">
                    <div class="card-body">
                        <div class="row mt-2 mb-2">
                            <div class="col-sm-12 col-md-6 col-lg-12">
                                <small class="card-text" style="color: red;font-weight: bold;">เหลือเวลา 23:59:00 น.</small>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-12">
                                <small class="card-text" style="color: #acacac;">วันที่ 14-18 ธ.ค. 2563</small>
                            </div>
                        </div>
                        <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>
                        <h6 class="card-text" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม 5000 แต้ม</h6>
                    </div>
                </div>
            </div>
            <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card">
                    <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap" style="height: 200px">
                    <div class="card-body">
                        <div class="row mt-2 mb-2">
                            <div class="col-sm-12 col-md-6 col-lg-12">
                                <small class="card-text" style="color: red;font-weight: bold;">เหลือเวลา 23:59:00 น.</small>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-12">
                                <small class="card-text" style="color: #acacac;">วันที่ 14-18 ธ.ค. 2563</small>
                            </div>
                        </div>
                        <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>
                        <h6 class="card-text" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม 5000 แต้ม</h6>
                    </div>
                </div>
            </div>
            <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card">
                    <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap" style="height: 200px">
                    <div class="card-body">
                        <div class="row mt-2 mb-2">
                            <div class="col-sm-12 col-md-6 col-lg-12">
                                <small class="card-text" style="color: red;font-weight: bold;">เหลือเวลา 23:59:00 น.</small>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-12">
                                <small class="card-text" style="color: #acacac;">วันที่ 14-18 ธ.ค. 2563</small>
                            </div>
                        </div>
                        <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>
                        <h6 class="card-text" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม 5000 แต้ม</h6>
                    </div>
                </div>
            </div>
            <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card">
                    <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap" style="height: 200px">
                    <div class="card-body">
                        <div class="row mt-2 mb-2">
                            <div class="col-sm-12 col-md-6 col-lg-12">
                                <small class="card-text" style="color: red;font-weight: bold;">เหลือเวลา 23:59:00 น.</small>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-12">
                                <small class="card-text" style="color: #acacac;">วันที่ 14-18 ธ.ค. 2563</small>
                            </div>
                        </div>
                        <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>
                        <h6 class="card-text" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม 5000 แต้ม</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-header text-center mt-5">
        <div>
            <h4>หมวดหมู่กิจกรรม</h4>
        </div>
        <hr style="width: 20%; border: 1px solid #2BC685;">

        <div class="row col-6 offset-3 mt-5">

            <a class="btn-savfe btn-main-savfe col-sm-3 col-md-3 col-lg-3" href="#" role="button"><h6 class="card-text" style="color: #fff; text-decoration: underline">ทั้งหมด</h6></a>
            <a class="btn-savfe col-sm-3 col-md-3 col-lg-3" href="#" role="button"><h6 class="card-text" style="color: #000;">ป่าไม้</h6></a>
            <a class="btn-savfe col-sm-3 col-md-3 col-lg-3" href="#" role="button"><h6 class="card-text" style="color: #000;">ทะเล</h6></a>
            <a class="btn-savfe col-sm-3 col-md-3 col-lg-3" href="#" role="button"><h6 class="card-text" style="color: #000;">ชุมชน</h6></a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                    <p style="font-size: 24px;">กิจกรรมล่าสุด</p>
                    @include('layouts.user.title_savfe')
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                    <a href="#" style="color: #2BC685;float: right">ดูทั้งหมด <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap" style="height: 200px">
                        <div class="card-body">
                            <div class="row mt-2 mb-2">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label>14 ธ.ค. 2563</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">
                                    <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>
                                </div>
                            </div>
                            <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                            <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม 5000 แต้ม</h6>
                        </div>
                        <div class="card-footer text-center">
                            <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                        </div>
                    </div>
                </div>
                <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap" style="height: 200px">
                        <div class="card-body">
                            <div class="row mt-2 mb-2">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label>14 ธ.ค. 2563</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">
                                    <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>
                                </div>
                            </div>
                            <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                            <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม 5000 แต้ม</h6>
                        </div>
                        <div class="card-footer text-center">
                            <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                        </div>
                    </div>
                </div>
                <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap" style="height: 200px">
                        <div class="card-body">
                            <div class="row mt-2 mb-2">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label>14 ธ.ค. 2563</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">
                                    <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>
                                </div>
                            </div>
                            <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                            <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม 5000 แต้ม</h6>
                        </div>
                        <div class="card-footer text-center">
                            <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                        </div>
                    </div>
                </div>
                <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap" style="height: 200px">
                        <div class="card-body">
                            <div class="row mt-2 mb-2">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label>14 ธ.ค. 2563</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">
                                    <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>
                                </div>
                            </div>
                            <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                            <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม 5000 แต้ม</h6>
                        </div>
                        <div class="card-footer text-center">
                            <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="container">
            <div class="row">

                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                    <p style="font-size: 24px;">กิจกรรมยอดนิยม</p>
                    @include('layouts.user.title_savfe')
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                    <a href="#" style="color: #2BC685;float: right">ดูทั้งหมด <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap" style="height: 200px">
                        <div class="card-body">
                            <div class="row mt-2 mb-2">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label>14 ธ.ค. 2563</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">
                                    <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>
                                </div>
                            </div>
                            <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                            <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม 5000 แต้ม</h6>
                        </div>
                        <div class="card-footer text-center">
                            <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                        </div>
                    </div>
                </div>
                <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap" style="height: 200px">
                        <div class="card-body">
                            <div class="row mt-2 mb-2">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label>14 ธ.ค. 2563</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">
                                    <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>
                                </div>
                            </div>
                            <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                            <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม 5000 แต้ม</h6>
                        </div>
                        <div class="card-footer text-center">
                            <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                        </div>
                    </div>
                </div>
                <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap" style="height: 200px">
                        <div class="card-body">
                            <div class="row mt-2 mb-2">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label>14 ธ.ค. 2563</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">
                                    <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>
                                </div>
                            </div>
                            <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                            <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม 5000 แต้ม</h6>
                        </div>
                        <div class="card-footer text-center">
                            <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                        </div>
                    </div>
                </div>
                <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap" style="height: 200px">
                        <div class="card-body">
                            <div class="row mt-2 mb-2">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label>14 ธ.ค. 2563</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">
                                    <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>
                                </div>
                            </div>
                            <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                            <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม 5000 แต้ม</h6>
                        </div>
                        <div class="card-footer text-center">
                            <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                    <p style="font-size: 24px;">กิจกรรมที่มีแต้มสะสมมากที่สุด</p>
                    @include('layouts.user.title_savfe')
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                    <a href="#" style="color: #2BC685;float: right">ดูทั้งหมด <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap" style="height: 200px">
                        <div class="card-body">
                            <div class="row mt-2 mb-2">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label>14 ธ.ค. 2563</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">
                                    <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>
                                </div>
                            </div>
                            <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                            <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม 5000 แต้ม</h6>
                        </div>
                        <div class="card-footer text-center">
                            <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                        </div>
                    </div>
                </div>
                <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap" style="height: 200px">
                        <div class="card-body">
                            <div class="row mt-2 mb-2">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label>14 ธ.ค. 2563</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">
                                    <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>
                                </div>
                            </div>
                            <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                            <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม 5000 แต้ม</h6>
                        </div>
                        <div class="card-footer text-center">
                            <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                        </div>
                    </div>
                </div>
                <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap" style="height: 200px">
                        <div class="card-body">
                            <div class="row mt-2 mb-2">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label>14 ธ.ค. 2563</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">
                                    <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>
                                </div>
                            </div>
                            <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                            <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม 5000 แต้ม</h6>
                        </div>
                        <div class="card-footer text-center">
                            <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                        </div>
                    </div>
                </div>
                <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ url('img/bg.jpg') }}" alt="Card image cap" style="height: 200px">
                        <div class="card-body">
                            <div class="row mt-2 mb-2">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label>14 ธ.ค. 2563</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">
                                    <label style="color: #2BC685;"><i class="fas fa-user"></i> 10/10</label>
                                </div>
                            </div>
                            <h3 style="font-weight: bold;" class="card-title">หัวข้อกิจกรรม</h3>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                            <h6 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ได้รับแต้ม 5000 แต้ม</h6>
                        </div>
                        <div class="card-footer text-center">
                            <small class="text-muted"><i class="fas fa-map-marker-alt"></i> กรุงเทพมหานคร</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('layouts.user.footer_savfe')

@endsection


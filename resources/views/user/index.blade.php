@extends('layouts.user.navbar')
@section('title', 'Home')
@section('content')
    <div class="image-bg">
    </div>
    <div class="container" style="margin-top: 80px">
        <h6 class="text-center" style="color: #fff">ยินดีต้อนรับเข้าสู่</h6>
        <h1 class="text-center" style="font-size:48px;font-weight: bold;color: #fff">SAV'FE THE WORLD</h1>

        <div class="row mt-5" style="color: #FFFFFF">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                <h5>เวลา</h5>
                <div class="time">
                    <h3 id="time"></h3>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right">
                <h5>วัน เดือน ปี</h5>
                <div class="date">
                    <h3 id="dayndate"></h3>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="text-center col-6 col-sm-6 col-md-6 col-lg-3 mt-2">
                <div class="card" style="background-color: #2BC685;color: #fff;">
                    <div class="card-body mt-5 mb-3">
                        <h6 class="card-text"><small class="text">ผู้ใช้งานทั้งหมด</small></h6>
                        <p class="card-text" style="font-size: 52px;font-weight: bold">{{$users->count()}}</p>
                    </div>
                </div>
            </div>
            <div class="text-center col-6 col-sm-6 col-md-6 col-lg-3 mt-2">
                <div class="card" style="background-color: #2BC685;color: #fff;">
                    <div class="card-body mt-5 mb-3">
                        <h6 class="card-text"><small class="text">กิจกรรมทั้งหมด</small></h6>
                        <p class="card-text" style="font-size: 52px;font-weight: bold">{{$activities->count()}}</p>
                    </div>
                </div>
            </div>
            <div class="text-center col-6 col-sm-6 col-md-6 col-lg-3 mt-2">
                <div class="card" style="background-color: #2BC685;color: #fff;">
                    <div class="card-body mt-5 mb-3">
                        <h6 class="card-text"><small class="text">ของรางวัลทั้งหมด</small></h6>
                        <p class="card-text" style="font-size: 52px;font-weight: bold">{{$rewards->count()}}</p>
                    </div>
                </div>
            </div>
            <div class="text-center col-6 col-sm-6 col-md-6 col-lg-3 mt-2">
                <div class="card" style="background-color: #2BC685;color: #fff;">
                    <div class="card-body mt-5 mb-3">
                        <h6 class="card-text"><small class="text">ของรางวัลที่ถูกแลก</small></h6>
                        <p class="card-text" style="font-size: 52px;font-weight: bold">14</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 mb-5">
            <div class="col-4" style="text-align: right">
                <a href="#"><img src="{{ url('img/facebook.png') }}" style="height: 50px;padding: 0 20px"></a>
            </div>
            <div class="col-4" style="text-align: center">
                <a href="#"><img src="{{ url('img/twitter.png') }}" style="height: 50px;padding: 0 20px"></a>
            </div>
            <div class="col-4" style="text-align: left">
                <a href="#"><img src="{{ url('img/instagram.png') }}" style="height: 50px;padding: 0 20px"></a>
            </div>
        </div>
    </div>

    <div class="container start-box">
        <div class="row">
            <div class="container">
                <div>
                    <p style="font-size: 24px;">กิจกรรมที่น่าสนใจ</p>
                </div>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner slideHeight">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ url('img/bg.jpg') }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ url('img/bg.jpg') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ url('img/bg.jpg') }}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div>
            <p style="font-size: 24px; font-weight: bold">กิจกรรมแนะนำ</p>
        </div>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @guest
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#tab1" role="tab" aria-selected="true">กิจกรรมเร็วๆนี้</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#tab4" role="tab" aria-selected="false">กิจกรรมที่จบไปแล้ว</a>
                </li>

            @else
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#tab1" role="tab" aria-selected="true">กิจกรรมเร็วๆนี้</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#tab2" role="tab" aria-selected="false">กิจกรรมใกล้เคียงคุณ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#tab3" role="tab" aria-selected="false">กิจกรรมที่ตรงกับคุณ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#tab4" role="tab" aria-selected="false">กิจกรรมที่จบไปแล้ว</a>
                </li>
            @endguest
        </ul>
        <hr>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="mt-3">
                    <p style="font-size: 20px; font-weight: bold">กิจกรรมที่กำลังจะเกิดขึ้นอีก 1 วันข้างหน้า</p>
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
                    <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3" >
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
                <hr>
            </div>
            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="mt-3">
                    <p style="font-size: 20px; font-weight: bold">กิจกรรมที่ใกล้เคียงคุณเพียง 1 กิโลเมตร</p>
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
                <hr>
            </div>
            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="mt-3">
                    <p style="font-size: 20px; font-weight: bold">กิจกรรมที่ตรงกับความชอบของคุณ 100%</p>
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
                <hr>
            </div>
            <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="mt-3">
                    <p style="font-size: 20px; font-weight: bold">กิจกรรมที่จบไปแล้วก่อนหน้านี้ 1 วัน</p>
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
                <hr>
            </div>
        </div>
    </div>

    @include('layouts.user.footer_savfe')
@endsection





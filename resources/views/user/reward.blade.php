@extends('layouts.user.navbar')
@section('title', 'Reward')
@section('content')

    <div class="container" style="margin-top: 80px;">
        <div class="row">
            <div class="container">
                <div class="row">
                    @guest
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <p style="font-size: 24px; font-weight: bold">ของรางวัลทั้งหมด</p>
                            @include('layouts.user.title_savfe')
                        </div>
                    @else
                        <div class="col-8 col-sm-8 col-md-10 col-lg-10">
                            <p style="font-size: 24px; font-weight: bold">ของรางวัลทั้งหมด</p>
                            @include('layouts.user.title_savfe')
                        </div>

                        <div class="col-4 col-sm-4 col-md-2 col-lg-2">
                            <a class="btn " href="{{ url('/profile/save_rewards_history') }}" style="color: #2BC685;font-size: 36px;float: right">
                                <i class="fas fa-star"></i><sup><span class="badge badge-info right"
                                                                      style="margin-left:-12px;background-color: #FF0000;font-size: 15px;">{{$saveRewardsCount}}</span></sup>
                            </a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>

    {{--    <div class="container">--}}
    {{--        <div class="row">--}}
    {{--            <div class="input-group col-12 col-sm-12 col-md-8 offset-md-2 col-lg-8 offset-lg-2">--}}
    {{--                <input class="form-control" type="text" name="search" id="search" placeholder="ค้นหา ID, ชื่อของรางวัล" aria-label="Search">--}}
    {{--                <div class="input-group-append">--}}
    {{--                    <span class="input-group-text" id="basic-text1"><i class="fas fa-search text-grey" aria-hidden="true"></i></span>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner">
                @foreach($slides1 as $key => $slide1)
                    <div class="carousel-item {{$key == 0 ? 'active' : null}}">
                        <img src="{{ $slide1->image }}" class="d-block w-100">
                        @if ($slide1->quantity > 0)
                            <div class="layer">
                            </div>
                        @else
                            <div class="layer-red">
                            </div>
                        @endif

                        <div class="carousel-caption d-none d-md-block" style="text-shadow: 0 0 3px #000;">
                            <h1 style="font-weight: bold">{{ $slide1->name }}</h1>
                            <h4 style="font-weight: bold">ใช้แต้ม {{ $slide1->point }} แต้ม</h4>
                            @if ($slide1->quantity > 0)
                                <label class="card-text"
                                       style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$slide1->quantity}}
                                    ชิ้น </label>
                            @else
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


{{--    <div class="container mt-5">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12 col-sm-12 col-md-12 col-lg-12">--}}
{{--                <p style="font-size: 24px;">ของรางวัลพิเศษ</p>--}}
{{--                @include('layouts.user.title_savfe')--}}
{{--            </div>--}}
{{--        </div>--}}



{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-6 col-md-6" style="background-color: red;width: 100%;height: 600px;">--}}

{{--                </div>--}}
{{--                <div class="col-lg-6 col-md-6" style="width: 100%;height: 600px">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-12 col-md-12" style="background-color: green;width: 100%;height: 300px">--}}

{{--                        </div>--}}
{{--                        <div class="col-lg-12 col-md-12" style="background-color: blue;width: 100%;height: 300px;">--}}

{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

    <div class="section-header text-center mt-5">
        <div>
            <h4>หมวดหมู่ของรางวัล</h4>
        </div>
        <hr style="width: 20%; border: 1px solid #2BC685;">
    </div>

    <div class="container mt-5 mb-5">
        <ul class="nav nav-pills mb-3 col-12 text-center" id="pills-tab" role="tablist">
            <li class="nav-item col-6 col-sm-6 col-md-3 col-lg-2">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#tab0" role="tab"
                   aria-selected="true">ทั้งหมด</a>
            </li>
            <li class="nav-item col-6 col-sm-6 col-md-3 col-lg-2">
                <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#tab1" role="tab" aria-selected="true">บัตรของขวัญ</a>
            </li>
            <li class="nav-item col-6 col-sm-6 col-md-3 col-lg-2">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#tab2" role="tab"
                   aria-selected="false">บัตรเติมน้ำมัน</a>
            </li>
            <li class="nav-item col-6 col-sm-6 col-md-3 col-lg-2">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#tab3" role="tab"
                   aria-selected="false">ส่วนลดค่าที่พัก</a>
            </li>
            <li class="nav-item col-6 col-sm-6 col-md-3 col-lg-2">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#tab4" role="tab"
                   aria-selected="false">ส่วนลดค่าอาหาร</a>
            </li>
            <li class="nav-item col-6 col-sm-6 col-md-3 col-lg-2">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#tab5" role="tab"
                   aria-selected="false">อื่นๆ</a>
            </li>
        </ul>

        <div class="tab-content mt-5" id="pills-tabContent">
            <div class="tab-pane fade show active" id="tab0" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">ของรางวัลล่าสุด</p>
                        @include('layouts.user.title_savfe')
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('reward_news_detail/latest')}}" style="color: #2BC685;float: right">ดูทั้งหมด <i
                                    class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="row">
                    @foreach($contents_1 as $reward)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card reward">
                                @if ($reward->quantity == 0)
                                    <div class="budget-full">
                                        หมด
                                    </div>
                                @endif
                                <div class="card-img-wrapper">
                                    <img src="{{ url($reward->image) }}"
                                         alt="{{ $reward->name }}">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title title-reward">{{ $reward->name }}</h6>
                                    @if ($reward->quantity > 0)
                                        <small class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}}
                                            ชิ้น </small>
                                    @else
                                        <small class="card-text" style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</small>
                                    @endif
                                </div>
                                <div class="form">
                                    <form method="post" role="form" class="contactForm mb-3"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="text-center">
                                            @guest
                                                <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                        disabled>กรุณาเข้าสู่ระบบก่อน
                                                </button>
                                                <br>
                                                <small style="color: red">(จึงจะแลกของรางวัลได้)</small>
                                            @else
                                                @if ($reward->quantity <= 0 || Auth::user()->point < $reward->point)
                                                    <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                            disabled>แลกของรางวัล
                                                    </button>
                                                @else
                                                    {{--                                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">แลกของรางวัล</button>--}}
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn-savfe btn-main-savfe text-center"
                                                            data-toggle="modal"
                                                            data-target="#editModal_{{$reward->id}}">แลกของรางวัล
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal_{{$reward->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ยืนยันการแลกของรางวัล</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">ที่อยู่สำหรับรับของรางวัล</label>
                                                                        <br>
                                                                        <small style="color: red" for="name">***โปรดอย่าลืมใส่เบอร์โทรศัพท์สำหรับติดต่อด้วย</small>
                                                                        <textarea rows="3" type="text"
                                                                                  class="form-control"
                                                                                  placeholder="กรอกที่อยู่และเบอร์โทรศัพท์ของคุณ"
                                                                                  name="address"></textarea>
                                                                    </div>

                                                                    <h4 style="color: red">ใช้แต้ม {{$reward->point}}
                                                                        แต้ม</h4>
                                                                    แต้มสะสมของคุณ {{Auth::user()->point}}
                                                                    - {{$reward->point}} =
                                                                    คงเหลือ {{Auth::user()->point - $reward->point}}
                                                                    แต้ม
                                                                    <br>
                                                                    คุณต้องการยืนยันการแลกของรางวัล ใช่หรือไม่?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก
                                                                    </button>
                                                                    <form role="form" action="{{ url('reward') }}"
                                                                          method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="rewards_id"
                                                                               value="{{$reward->id}}">
                                                                        <button type="submit"
                                                                                class="btn-savfe btn-main-savfe">
                                                                            ยืนยัน
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endguest
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer ">
                                    <a href="{{ url('/reward_detail',$reward->id ) }}" >
                                        <h4 class="text-point">
                                            <i class="fas fa-star"></i> {{$reward->point}} <i class="fas fa-angle-right"></i></h4></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">ของรางวัลยอดนิยม</p>
                        @include('layouts.user.title_savfe')
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('reward_news_detail/popular')}}" style="color: #2BC685;float: right">ดูทั้งหมด <i
                                    class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="row">
                    @foreach($contents_1  as $reward)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card reward">
                                @if ($reward->quantity == 0)
                                    <div class="budget-full">
                                        หมด
                                    </div>
                                @endif
                                <div class="card-img-wrapper">
                                    <img src="{{ url($reward->image) }}"
                                         alt="{{ $reward->name }}">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title title-reward">{{ $reward->name }}</h6>
                                    @if ($reward->quantity > 0)
                                        <small class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}}
                                            ชิ้น </small>
                                    @else
                                        <small class="card-text" style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</small>
                                    @endif
                                </div>
                                <div class="form">
                                    <form method="post" role="form" class="contactForm mb-3"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="text-center">
                                            @guest
                                                <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                        disabled>กรุณาเข้าสู่ระบบก่อน
                                                </button>
                                                <br>
                                                <small style="color: red">(จึงจะแลกของรางวัลได้)</small>
                                            @else
                                                @if ($reward->quantity <= 0 || Auth::user()->point < $reward->point)
                                                    <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                            disabled>แลกของรางวัล
                                                    </button>
                                                @else
                                                    {{--                                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">แลกของรางวัล</button>--}}
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn-savfe btn-main-savfe text-center"
                                                            data-toggle="modal"
                                                            data-target="#editModal_{{$reward->id}}">แลกของรางวัล
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal_{{$reward->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ยืนยันการแลกของรางวัล</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">ที่อยู่สำหรับรับของรางวัล</label>
                                                                        <br>
                                                                        <small style="color: red" for="name">***โปรดอย่าลืมใส่เบอร์โทรศัพท์สำหรับติดต่อด้วย</small>
                                                                        <textarea rows="3" type="text"
                                                                                  class="form-control"
                                                                                  placeholder="กรอกที่อยู่และเบอร์โทรศัพท์ของคุณ"
                                                                                  name="address"></textarea>
                                                                    </div>

                                                                    <h4 style="color: red">ใช้แต้ม {{$reward->point}}
                                                                        แต้ม</h4>
                                                                    แต้มสะสมของคุณ {{Auth::user()->point}}
                                                                    - {{$reward->point}} =
                                                                    คงเหลือ {{Auth::user()->point - $reward->point}}
                                                                    แต้ม
                                                                    <br>
                                                                    คุณต้องการยืนยันการแลกของรางวัล ใช่หรือไม่?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก
                                                                    </button>
                                                                    <form role="form" action="{{ url('reward') }}"
                                                                          method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="rewards_id"
                                                                               value="{{$reward->id}}">
                                                                        <button type="submit"
                                                                                class="btn-savfe btn-main-savfe">
                                                                            ยืนยัน
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endguest
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer ">
                                    <a href="{{ url('/reward_detail',$reward->id ) }}" >
                                        <h4 class="text-point">
                                            <i class="fas fa-star"></i> {{$reward->point}} <i class="fas fa-angle-right"></i></h4></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">ของรางวัลที่ใช้แต้มน้อยที่สุด</p>
                        @include('layouts.user.title_savfe')
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('reward_news_detail/lesspoints')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                            <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="row">
                    @foreach($contents_3  as $reward)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card reward">
                                @if ($reward->quantity == 0)
                                    <div class="budget-full">
                                        หมด
                                    </div>
                                @endif
                                <div class="card-img-wrapper">
                                    <img src="{{ url($reward->image) }}"
                                         alt="{{ $reward->name }}">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title title-reward">{{ $reward->name }}</h6>
                                    @if ($reward->quantity > 0)
                                        <small class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}}
                                            ชิ้น </small>
                                    @else
                                        <small class="card-text" style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</small>
                                    @endif
                                </div>
                                <div class="form">
                                    <form method="post" role="form" class="contactForm mb-3"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="text-center">
                                            @guest
                                                <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                        disabled>กรุณาเข้าสู่ระบบก่อน
                                                </button>
                                                <br>
                                                <small style="color: red">(จึงจะแลกของรางวัลได้)</small>
                                            @else
                                                @if ($reward->quantity <= 0 || Auth::user()->point < $reward->point)
                                                    <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                            disabled>แลกของรางวัล
                                                    </button>
                                                @else
                                                    {{--                                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">แลกของรางวัล</button>--}}
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn-savfe btn-main-savfe text-center"
                                                            data-toggle="modal"
                                                            data-target="#editModal_{{$reward->id}}">แลกของรางวัล
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal_{{$reward->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ยืนยันการแลกของรางวัล</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">ที่อยู่สำหรับรับของรางวัล</label>
                                                                        <br>
                                                                        <small style="color: red" for="name">***โปรดอย่าลืมใส่เบอร์โทรศัพท์สำหรับติดต่อด้วย</small>
                                                                        <textarea rows="3" type="text"
                                                                                  class="form-control"
                                                                                  placeholder="กรอกที่อยู่และเบอร์โทรศัพท์ของคุณ"
                                                                                  name="address"></textarea>
                                                                    </div>

                                                                    <h4 style="color: red">ใช้แต้ม {{$reward->point}}
                                                                        แต้ม</h4>
                                                                    แต้มสะสมของคุณ {{Auth::user()->point}}
                                                                    - {{$reward->point}} =
                                                                    คงเหลือ {{Auth::user()->point - $reward->point}}
                                                                    แต้ม
                                                                    <br>
                                                                    คุณต้องการยืนยันการแลกของรางวัล ใช่หรือไม่?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก
                                                                    </button>
                                                                    <form role="form" action="{{ url('reward') }}"
                                                                          method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="rewards_id"
                                                                               value="{{$reward->id}}">
                                                                        <button type="submit"
                                                                                class="btn-savfe btn-main-savfe">
                                                                            ยืนยัน
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endguest
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer ">
                                    <a href="{{ url('/reward_detail',$reward->id ) }}" >
                                        <h4 class="text-point">
                                            <i class="fas fa-star"></i> {{$reward->point}} <i class="fas fa-angle-right"></i></h4></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

            </div>

            <div class="tab-pane fade" id="tab1" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">ของรางวัลล่าสุด</p>
                        @include('layouts.user.title_savfe')
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('reward_news_detail/latest')}}" style="color: #2BC685;float: right">ดูทั้งหมด <i
                                    class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="row">
                    @foreach($contents_1_1  as $reward)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card reward">
                                @if ($reward->quantity == 0)
                                    <div class="budget-full">
                                        หมด
                                    </div>
                                @endif
                                <div class="card-img-wrapper">
                                    <img src="{{ url($reward->image) }}"
                                         alt="{{ $reward->name }}">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title title-reward">{{ $reward->name }}</h6>
                                    @if ($reward->quantity > 0)
                                        <small class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}}
                                            ชิ้น </small>
                                    @else
                                        <small class="card-text" style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</small>
                                    @endif
                                </div>
                                <div class="form">
                                    <form method="post" role="form" class="contactForm mb-3"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="text-center">
                                            @guest
                                                <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                        disabled>กรุณาเข้าสู่ระบบก่อน
                                                </button>
                                                <br>
                                                <small style="color: red">(จึงจะแลกของรางวัลได้)</small>
                                            @else
                                                @if ($reward->quantity <= 0 || Auth::user()->point < $reward->point)
                                                    <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                            disabled>แลกของรางวัล
                                                    </button>
                                                @else
                                                    {{--                                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">แลกของรางวัล</button>--}}
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn-savfe btn-main-savfe text-center"
                                                            data-toggle="modal"
                                                            data-target="#editModal_{{$reward->id}}">แลกของรางวัล
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal_{{$reward->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ยืนยันการแลกของรางวัล</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">ที่อยู่สำหรับรับของรางวัล</label>
                                                                        <br>
                                                                        <small style="color: red" for="name">***โปรดอย่าลืมใส่เบอร์โทรศัพท์สำหรับติดต่อด้วย</small>
                                                                        <textarea rows="3" type="text"
                                                                                  class="form-control"
                                                                                  placeholder="กรอกที่อยู่และเบอร์โทรศัพท์ของคุณ"
                                                                                  name="address"></textarea>
                                                                    </div>

                                                                    <h4 style="color: red">ใช้แต้ม {{$reward->point}}
                                                                        แต้ม</h4>
                                                                    แต้มสะสมของคุณ {{Auth::user()->point}}
                                                                    - {{$reward->point}} =
                                                                    คงเหลือ {{Auth::user()->point - $reward->point}}
                                                                    แต้ม
                                                                    <br>
                                                                    คุณต้องการยืนยันการแลกของรางวัล ใช่หรือไม่?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก
                                                                    </button>
                                                                    <form role="form" action="{{ url('reward') }}"
                                                                          method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="rewards_id"
                                                                               value="{{$reward->id}}">
                                                                        <button type="submit"
                                                                                class="btn-savfe btn-main-savfe">
                                                                            ยืนยัน
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endguest
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer ">
                                    <a href="{{ url('/reward_detail',$reward->id ) }}" >
                                        <h4 class="text-point">
                                            <i class="fas fa-star"></i> {{$reward->point}} <i class="fas fa-angle-right"></i></h4></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">ของรางวัลยอดนิยม</p>
                        @include('layouts.user.title_savfe')
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('reward_news_detail/popular')}}" style="color: #2BC685;float: right">ดูทั้งหมด <i
                                    class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="row">
                    @foreach($contents_2_1  as $reward)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card reward">
                                @if ($reward->quantity == 0)
                                    <div class="budget-full">
                                        หมด
                                    </div>
                                @endif
                                <div class="card-img-wrapper">
                                    <img src="{{ url($reward->image) }}"
                                         alt="{{ $reward->name }}">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title title-reward">{{ $reward->name }}</h6>
                                    @if ($reward->quantity > 0)
                                        <small class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}}
                                            ชิ้น </small>
                                    @else
                                        <small class="card-text" style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</small>
                                    @endif
                                </div>
                                <div class="form">
                                    <form method="post" role="form" class="contactForm mb-3"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="text-center">
                                            @guest
                                                <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                        disabled>กรุณาเข้าสู่ระบบก่อน
                                                </button>
                                                <br>
                                                <small style="color: red">(จึงจะแลกของรางวัลได้)</small>
                                            @else
                                                @if ($reward->quantity <= 0 || Auth::user()->point < $reward->point)
                                                    <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                            disabled>แลกของรางวัล
                                                    </button>
                                                @else
                                                    {{--                                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">แลกของรางวัล</button>--}}
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn-savfe btn-main-savfe text-center"
                                                            data-toggle="modal"
                                                            data-target="#editModal_{{$reward->id}}">แลกของรางวัล
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal_{{$reward->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ยืนยันการแลกของรางวัล</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">ที่อยู่สำหรับรับของรางวัล</label>
                                                                        <br>
                                                                        <small style="color: red" for="name">***โปรดอย่าลืมใส่เบอร์โทรศัพท์สำหรับติดต่อด้วย</small>
                                                                        <textarea rows="3" type="text"
                                                                                  class="form-control"
                                                                                  placeholder="กรอกที่อยู่และเบอร์โทรศัพท์ของคุณ"
                                                                                  name="address"></textarea>
                                                                    </div>

                                                                    <h4 style="color: red">ใช้แต้ม {{$reward->point}}
                                                                        แต้ม</h4>
                                                                    แต้มสะสมของคุณ {{Auth::user()->point}}
                                                                    - {{$reward->point}} =
                                                                    คงเหลือ {{Auth::user()->point - $reward->point}}
                                                                    แต้ม
                                                                    <br>
                                                                    คุณต้องการยืนยันการแลกของรางวัล ใช่หรือไม่?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก
                                                                    </button>
                                                                    <form role="form" action="{{ url('reward') }}"
                                                                          method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="rewards_id"
                                                                               value="{{$reward->id}}">
                                                                        <button type="submit"
                                                                                class="btn-savfe btn-main-savfe">
                                                                            ยืนยัน
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endguest
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer ">
                                    <a href="{{ url('/reward_detail',$reward->id ) }}" >
                                        <h4 class="text-point">
                                            <i class="fas fa-star"></i> {{$reward->point}} <i class="fas fa-angle-right"></i></h4></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">ของรางวัลที่ใช้แต้มน้อยที่สุด</p>
                        @include('layouts.user.title_savfe')
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('reward_news_detail/lesspoints')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                            <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="row">
                    @foreach($contents_3_1  as $reward)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card reward">
                                @if ($reward->quantity == 0)
                                    <div class="budget-full">
                                        หมด
                                    </div>
                                @endif
                                <div class="card-img-wrapper">
                                    <img src="{{ url($reward->image) }}"
                                         alt="{{ $reward->name }}">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title title-reward">{{ $reward->name }}</h6>
                                    @if ($reward->quantity > 0)
                                        <small class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}}
                                            ชิ้น </small>
                                    @else
                                        <small class="card-text" style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</small>
                                    @endif
                                </div>
                                <div class="form">
                                    <form method="post" role="form" class="contactForm mb-3"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="text-center">
                                            @guest
                                                <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                        disabled>กรุณาเข้าสู่ระบบก่อน
                                                </button>
                                                <br>
                                                <small style="color: red">(จึงจะแลกของรางวัลได้)</small>
                                            @else
                                                @if ($reward->quantity <= 0 || Auth::user()->point < $reward->point)
                                                    <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                            disabled>แลกของรางวัล
                                                    </button>
                                                @else
                                                    {{--                                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">แลกของรางวัล</button>--}}
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn-savfe btn-main-savfe text-center"
                                                            data-toggle="modal"
                                                            data-target="#editModal_{{$reward->id}}">แลกของรางวัล
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal_{{$reward->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ยืนยันการแลกของรางวัล</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">ที่อยู่สำหรับรับของรางวัล</label>
                                                                        <br>
                                                                        <small style="color: red" for="name">***โปรดอย่าลืมใส่เบอร์โทรศัพท์สำหรับติดต่อด้วย</small>
                                                                        <textarea rows="3" type="text"
                                                                                  class="form-control"
                                                                                  placeholder="กรอกที่อยู่และเบอร์โทรศัพท์ของคุณ"
                                                                                  name="address"></textarea>
                                                                    </div>

                                                                    <h4 style="color: red">ใช้แต้ม {{$reward->point}}
                                                                        แต้ม</h4>
                                                                    แต้มสะสมของคุณ {{Auth::user()->point}}
                                                                    - {{$reward->point}} =
                                                                    คงเหลือ {{Auth::user()->point - $reward->point}}
                                                                    แต้ม
                                                                    <br>
                                                                    คุณต้องการยืนยันการแลกของรางวัล ใช่หรือไม่?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก
                                                                    </button>
                                                                    <form role="form" action="{{ url('reward') }}"
                                                                          method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="rewards_id"
                                                                               value="{{$reward->id}}">
                                                                        <button type="submit"
                                                                                class="btn-savfe btn-main-savfe">
                                                                            ยืนยัน
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endguest
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer ">
                                    <a href="{{ url('/reward_detail',$reward->id ) }}" >
                                        <h4 class="text-point">
                                            <i class="fas fa-star"></i> {{$reward->point}} <i class="fas fa-angle-right"></i></h4></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

            </div>

            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">ของรางวัลล่าสุด</p>
                        @include('layouts.user.title_savfe')
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('reward_news_detail/latest')}}" style="color: #2BC685;float: right">ดูทั้งหมด <i
                                    class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="row">
                    @foreach($contents_1_2  as $reward)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card reward">
                                @if ($reward->quantity == 0)
                                    <div class="budget-full">
                                        หมด
                                    </div>
                                @endif
                                <div class="card-img-wrapper">
                                    <img src="{{ url($reward->image) }}"
                                         alt="{{ $reward->name }}">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title title-reward">{{ $reward->name }}</h6>
                                    @if ($reward->quantity > 0)
                                        <small class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}}
                                            ชิ้น </small>
                                    @else
                                        <small class="card-text" style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</small>
                                    @endif
                                </div>
                                <div class="form">
                                    <form method="post" role="form" class="contactForm mb-3"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="text-center">
                                            @guest
                                                <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                        disabled>กรุณาเข้าสู่ระบบก่อน
                                                </button>
                                                <br>
                                                <small style="color: red">(จึงจะแลกของรางวัลได้)</small>
                                            @else
                                                @if ($reward->quantity <= 0 || Auth::user()->point < $reward->point)
                                                    <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                            disabled>แลกของรางวัล
                                                    </button>
                                                @else
                                                    {{--                                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">แลกของรางวัล</button>--}}
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn-savfe btn-main-savfe text-center"
                                                            data-toggle="modal"
                                                            data-target="#editModal_{{$reward->id}}">แลกของรางวัล
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal_{{$reward->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ยืนยันการแลกของรางวัล</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">ที่อยู่สำหรับรับของรางวัล</label>
                                                                        <br>
                                                                        <small style="color: red" for="name">***โปรดอย่าลืมใส่เบอร์โทรศัพท์สำหรับติดต่อด้วย</small>
                                                                        <textarea rows="3" type="text"
                                                                                  class="form-control"
                                                                                  placeholder="กรอกที่อยู่และเบอร์โทรศัพท์ของคุณ"
                                                                                  name="address"></textarea>
                                                                    </div>

                                                                    <h4 style="color: red">ใช้แต้ม {{$reward->point}}
                                                                        แต้ม</h4>
                                                                    แต้มสะสมของคุณ {{Auth::user()->point}}
                                                                    - {{$reward->point}} =
                                                                    คงเหลือ {{Auth::user()->point - $reward->point}}
                                                                    แต้ม
                                                                    <br>
                                                                    คุณต้องการยืนยันการแลกของรางวัล ใช่หรือไม่?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก
                                                                    </button>
                                                                    <form role="form" action="{{ url('reward') }}"
                                                                          method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="rewards_id"
                                                                               value="{{$reward->id}}">
                                                                        <button type="submit"
                                                                                class="btn-savfe btn-main-savfe">
                                                                            ยืนยัน
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endguest
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer ">
                                    <a href="{{ url('/reward_detail',$reward->id ) }}" >
                                        <h4 class="text-point">
                                            <i class="fas fa-star"></i> {{$reward->point}} <i class="fas fa-angle-right"></i></h4></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">ของรางวัลยอดนิยม</p>
                        @include('layouts.user.title_savfe')
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('reward_news_detail/popular')}}" style="color: #2BC685;float: right">ดูทั้งหมด <i
                                    class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="row">
                    @foreach($contents_2_2  as $reward)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card reward">
                                @if ($reward->quantity == 0)
                                    <div class="budget-full">
                                        หมด
                                    </div>
                                @endif
                                <div class="card-img-wrapper">
                                    <img src="{{ url($reward->image) }}"
                                         alt="{{ $reward->name }}">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title title-reward">{{ $reward->name }}</h6>
                                    @if ($reward->quantity > 0)
                                        <small class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}}
                                            ชิ้น </small>
                                    @else
                                        <small class="card-text" style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</small>
                                    @endif
                                </div>
                                <div class="form">
                                    <form method="post" role="form" class="contactForm mb-3"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="text-center">
                                            @guest
                                                <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                        disabled>กรุณาเข้าสู่ระบบก่อน
                                                </button>
                                                <br>
                                                <small style="color: red">(จึงจะแลกของรางวัลได้)</small>
                                            @else
                                                @if ($reward->quantity <= 0 || Auth::user()->point < $reward->point)
                                                    <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                            disabled>แลกของรางวัล
                                                    </button>
                                                @else
                                                    {{--                                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">แลกของรางวัล</button>--}}
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn-savfe btn-main-savfe text-center"
                                                            data-toggle="modal"
                                                            data-target="#editModal_{{$reward->id}}">แลกของรางวัล
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal_{{$reward->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ยืนยันการแลกของรางวัล</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">ที่อยู่สำหรับรับของรางวัล</label>
                                                                        <br>
                                                                        <small style="color: red" for="name">***โปรดอย่าลืมใส่เบอร์โทรศัพท์สำหรับติดต่อด้วย</small>
                                                                        <textarea rows="3" type="text"
                                                                                  class="form-control"
                                                                                  placeholder="กรอกที่อยู่และเบอร์โทรศัพท์ของคุณ"
                                                                                  name="address"></textarea>
                                                                    </div>

                                                                    <h4 style="color: red">ใช้แต้ม {{$reward->point}}
                                                                        แต้ม</h4>
                                                                    แต้มสะสมของคุณ {{Auth::user()->point}}
                                                                    - {{$reward->point}} =
                                                                    คงเหลือ {{Auth::user()->point - $reward->point}}
                                                                    แต้ม
                                                                    <br>
                                                                    คุณต้องการยืนยันการแลกของรางวัล ใช่หรือไม่?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก
                                                                    </button>
                                                                    <form role="form" action="{{ url('reward') }}"
                                                                          method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="rewards_id"
                                                                               value="{{$reward->id}}">
                                                                        <button type="submit"
                                                                                class="btn-savfe btn-main-savfe">
                                                                            ยืนยัน
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endguest
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer ">
                                    <a href="{{ url('/reward_detail',$reward->id ) }}" >
                                        <h4 class="text-point">
                                            <i class="fas fa-star"></i> {{$reward->point}} <i class="fas fa-angle-right"></i></h4></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">ของรางวัลที่ใช้แต้มน้อยที่สุด</p>
                        @include('layouts.user.title_savfe')
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('reward_news_detail/lesspoints')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                            <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="row">
                    @foreach($contents_3_2  as $reward)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card reward">
                                @if ($reward->quantity == 0)
                                    <div class="budget-full">
                                        หมด
                                    </div>
                                @endif
                                <div class="card-img-wrapper">
                                    <img src="{{ url($reward->image) }}"
                                         alt="{{ $reward->name }}">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title title-reward">{{ $reward->name }}</h6>
                                    @if ($reward->quantity > 0)
                                        <small class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}}
                                            ชิ้น </small>
                                    @else
                                        <small class="card-text" style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</small>
                                    @endif
                                </div>
                                <div class="form">
                                    <form method="post" role="form" class="contactForm mb-3"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="text-center">
                                            @guest
                                                <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                        disabled>กรุณาเข้าสู่ระบบก่อน
                                                </button>
                                                <br>
                                                <small style="color: red">(จึงจะแลกของรางวัลได้)</small>
                                            @else
                                                @if ($reward->quantity <= 0 || Auth::user()->point < $reward->point)
                                                    <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                            disabled>แลกของรางวัล
                                                    </button>
                                                @else
                                                    {{--                                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">แลกของรางวัล</button>--}}
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn-savfe btn-main-savfe text-center"
                                                            data-toggle="modal"
                                                            data-target="#editModal_{{$reward->id}}">แลกของรางวัล
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal_{{$reward->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ยืนยันการแลกของรางวัล</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">ที่อยู่สำหรับรับของรางวัล</label>
                                                                        <br>
                                                                        <small style="color: red" for="name">***โปรดอย่าลืมใส่เบอร์โทรศัพท์สำหรับติดต่อด้วย</small>
                                                                        <textarea rows="3" type="text"
                                                                                  class="form-control"
                                                                                  placeholder="กรอกที่อยู่และเบอร์โทรศัพท์ของคุณ"
                                                                                  name="address"></textarea>
                                                                    </div>

                                                                    <h4 style="color: red">ใช้แต้ม {{$reward->point}}
                                                                        แต้ม</h4>
                                                                    แต้มสะสมของคุณ {{Auth::user()->point}}
                                                                    - {{$reward->point}} =
                                                                    คงเหลือ {{Auth::user()->point - $reward->point}}
                                                                    แต้ม
                                                                    <br>
                                                                    คุณต้องการยืนยันการแลกของรางวัล ใช่หรือไม่?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก
                                                                    </button>
                                                                    <form role="form" action="{{ url('reward') }}"
                                                                          method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="rewards_id"
                                                                               value="{{$reward->id}}">
                                                                        <button type="submit"
                                                                                class="btn-savfe btn-main-savfe">
                                                                            ยืนยัน
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endguest
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer ">
                                    <a href="{{ url('/reward_detail',$reward->id ) }}" >
                                        <h4 class="text-point">
                                            <i class="fas fa-star"></i> {{$reward->point}} <i class="fas fa-angle-right"></i></h4></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

            </div>

            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">ของรางวัลล่าสุด</p>
                        @include('layouts.user.title_savfe')
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('reward_news_detail/latest')}}" style="color: #2BC685;float: right">ดูทั้งหมด <i
                                    class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="row">
                    @foreach($contents_1_3  as $reward)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card reward">
                                @if ($reward->quantity == 0)
                                    <div class="budget-full">
                                        หมด
                                    </div>
                                @endif
                                <div class="card-img-wrapper">
                                    <img src="{{ url($reward->image) }}"
                                         alt="{{ $reward->name }}">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title title-reward">{{ $reward->name }}</h6>
                                    @if ($reward->quantity > 0)
                                        <small class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}}
                                            ชิ้น </small>
                                    @else
                                        <small class="card-text" style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</small>
                                    @endif
                                </div>
                                <div class="form">
                                    <form method="post" role="form" class="contactForm mb-3"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="text-center">
                                            @guest
                                                <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                        disabled>กรุณาเข้าสู่ระบบก่อน
                                                </button>
                                                <br>
                                                <small style="color: red">(จึงจะแลกของรางวัลได้)</small>
                                            @else
                                                @if ($reward->quantity <= 0 || Auth::user()->point < $reward->point)
                                                    <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                            disabled>แลกของรางวัล
                                                    </button>
                                                @else
                                                    {{--                                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">แลกของรางวัล</button>--}}
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn-savfe btn-main-savfe text-center"
                                                            data-toggle="modal"
                                                            data-target="#editModal_{{$reward->id}}">แลกของรางวัล
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal_{{$reward->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ยืนยันการแลกของรางวัล</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">ที่อยู่สำหรับรับของรางวัล</label>
                                                                        <br>
                                                                        <small style="color: red" for="name">***โปรดอย่าลืมใส่เบอร์โทรศัพท์สำหรับติดต่อด้วย</small>
                                                                        <textarea rows="3" type="text"
                                                                                  class="form-control"
                                                                                  placeholder="กรอกที่อยู่และเบอร์โทรศัพท์ของคุณ"
                                                                                  name="address"></textarea>
                                                                    </div>

                                                                    <h4 style="color: red">ใช้แต้ม {{$reward->point}}
                                                                        แต้ม</h4>
                                                                    แต้มสะสมของคุณ {{Auth::user()->point}}
                                                                    - {{$reward->point}} =
                                                                    คงเหลือ {{Auth::user()->point - $reward->point}}
                                                                    แต้ม
                                                                    <br>
                                                                    คุณต้องการยืนยันการแลกของรางวัล ใช่หรือไม่?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก
                                                                    </button>
                                                                    <form role="form" action="{{ url('reward') }}"
                                                                          method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="rewards_id"
                                                                               value="{{$reward->id}}">
                                                                        <button type="submit"
                                                                                class="btn-savfe btn-main-savfe">
                                                                            ยืนยัน
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endguest
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer ">
                                    <a href="{{ url('/reward_detail',$reward->id ) }}" >
                                        <h4 class="text-point">
                                            <i class="fas fa-star"></i> {{$reward->point}} <i class="fas fa-angle-right"></i></h4></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">ของรางวัลยอดนิยม</p>
                        @include('layouts.user.title_savfe')
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('reward_news_detail/popular')}}" style="color: #2BC685;float: right">ดูทั้งหมด <i
                                    class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="row">
                    @foreach($contents_2_3  as $reward)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card reward">
                                @if ($reward->quantity == 0)
                                    <div class="budget-full">
                                        หมด
                                    </div>
                                @endif
                                <div class="card-img-wrapper">
                                    <img src="{{ url($reward->image) }}"
                                         alt="{{ $reward->name }}">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title title-reward">{{ $reward->name }}</h6>
                                    @if ($reward->quantity > 0)
                                        <small class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}}
                                            ชิ้น </small>
                                    @else
                                        <small class="card-text" style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</small>
                                    @endif
                                </div>
                                <div class="form">
                                    <form method="post" role="form" class="contactForm mb-3"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="text-center">
                                            @guest
                                                <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                        disabled>กรุณาเข้าสู่ระบบก่อน
                                                </button>
                                                <br>
                                                <small style="color: red">(จึงจะแลกของรางวัลได้)</small>
                                            @else
                                                @if ($reward->quantity <= 0 || Auth::user()->point < $reward->point)
                                                    <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                            disabled>แลกของรางวัล
                                                    </button>
                                                @else
                                                    {{--                                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">แลกของรางวัล</button>--}}
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn-savfe btn-main-savfe text-center"
                                                            data-toggle="modal"
                                                            data-target="#editModal_{{$reward->id}}">แลกของรางวัล
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal_{{$reward->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ยืนยันการแลกของรางวัล</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">ที่อยู่สำหรับรับของรางวัล</label>
                                                                        <br>
                                                                        <small style="color: red" for="name">***โปรดอย่าลืมใส่เบอร์โทรศัพท์สำหรับติดต่อด้วย</small>
                                                                        <textarea rows="3" type="text"
                                                                                  class="form-control"
                                                                                  placeholder="กรอกที่อยู่และเบอร์โทรศัพท์ของคุณ"
                                                                                  name="address"></textarea>
                                                                    </div>

                                                                    <h4 style="color: red">ใช้แต้ม {{$reward->point}}
                                                                        แต้ม</h4>
                                                                    แต้มสะสมของคุณ {{Auth::user()->point}}
                                                                    - {{$reward->point}} =
                                                                    คงเหลือ {{Auth::user()->point - $reward->point}}
                                                                    แต้ม
                                                                    <br>
                                                                    คุณต้องการยืนยันการแลกของรางวัล ใช่หรือไม่?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก
                                                                    </button>
                                                                    <form role="form" action="{{ url('reward') }}"
                                                                          method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="rewards_id"
                                                                               value="{{$reward->id}}">
                                                                        <button type="submit"
                                                                                class="btn-savfe btn-main-savfe">
                                                                            ยืนยัน
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endguest
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer ">
                                    <a href="{{ url('/reward_detail',$reward->id ) }}" >
                                        <h4 class="text-point">
                                            <i class="fas fa-star"></i> {{$reward->point}} <i class="fas fa-angle-right"></i></h4></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">ของรางวัลที่ใช้แต้มน้อยที่สุด</p>
                        @include('layouts.user.title_savfe')
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('reward_news_detail/lesspoints')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                            <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="row">
                    @foreach($contents_3_3  as $reward)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card reward">
                                @if ($reward->quantity == 0)
                                    <div class="budget-full">
                                        หมด
                                    </div>
                                @endif
                                <div class="card-img-wrapper">
                                    <img src="{{ url($reward->image) }}"
                                         alt="{{ $reward->name }}">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title title-reward">{{ $reward->name }}</h6>
                                    @if ($reward->quantity > 0)
                                        <small class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}}
                                            ชิ้น </small>
                                    @else
                                        <small class="card-text" style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</small>
                                    @endif
                                </div>
                                <div class="form">
                                    <form method="post" role="form" class="contactForm mb-3"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="text-center">
                                            @guest
                                                <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                        disabled>กรุณาเข้าสู่ระบบก่อน
                                                </button>
                                                <br>
                                                <small style="color: red">(จึงจะแลกของรางวัลได้)</small>
                                            @else
                                                @if ($reward->quantity <= 0 || Auth::user()->point < $reward->point)
                                                    <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                            disabled>แลกของรางวัล
                                                    </button>
                                                @else
                                                    {{--                                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">แลกของรางวัล</button>--}}
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn-savfe btn-main-savfe text-center"
                                                            data-toggle="modal"
                                                            data-target="#editModal_{{$reward->id}}">แลกของรางวัล
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal_{{$reward->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ยืนยันการแลกของรางวัล</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">ที่อยู่สำหรับรับของรางวัล</label>
                                                                        <br>
                                                                        <small style="color: red" for="name">***โปรดอย่าลืมใส่เบอร์โทรศัพท์สำหรับติดต่อด้วย</small>
                                                                        <textarea rows="3" type="text"
                                                                                  class="form-control"
                                                                                  placeholder="กรอกที่อยู่และเบอร์โทรศัพท์ของคุณ"
                                                                                  name="address"></textarea>
                                                                    </div>

                                                                    <h4 style="color: red">ใช้แต้ม {{$reward->point}}
                                                                        แต้ม</h4>
                                                                    แต้มสะสมของคุณ {{Auth::user()->point}}
                                                                    - {{$reward->point}} =
                                                                    คงเหลือ {{Auth::user()->point - $reward->point}}
                                                                    แต้ม
                                                                    <br>
                                                                    คุณต้องการยืนยันการแลกของรางวัล ใช่หรือไม่?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก
                                                                    </button>
                                                                    <form role="form" action="{{ url('reward') }}"
                                                                          method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="rewards_id"
                                                                               value="{{$reward->id}}">
                                                                        <button type="submit"
                                                                                class="btn-savfe btn-main-savfe">
                                                                            ยืนยัน
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endguest
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer ">
                                    <a href="{{ url('/reward_detail',$reward->id ) }}" >
                                        <h4 class="text-point">
                                            <i class="fas fa-star"></i> {{$reward->point}} <i class="fas fa-angle-right"></i></h4></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

            </div>

            <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">ของรางวัลล่าสุด</p>
                        @include('layouts.user.title_savfe')
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('reward_news_detail/latest')}}" style="color: #2BC685;float: right">ดูทั้งหมด <i
                                    class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="row">
                    @foreach($contents_1_4  as $reward)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card reward">
                                @if ($reward->quantity == 0)
                                    <div class="budget-full">
                                        หมด
                                    </div>
                                @endif
                                <div class="card-img-wrapper">
                                    <img src="{{ url($reward->image) }}"
                                         alt="{{ $reward->name }}">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title title-reward">{{ $reward->name }}</h6>
                                    @if ($reward->quantity > 0)
                                        <small class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}}
                                            ชิ้น </small>
                                    @else
                                        <small class="card-text" style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</small>
                                    @endif
                                </div>
                                <div class="form">
                                    <form method="post" role="form" class="contactForm mb-3"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="text-center">
                                            @guest
                                                <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                        disabled>กรุณาเข้าสู่ระบบก่อน
                                                </button>
                                                <br>
                                                <small style="color: red">(จึงจะแลกของรางวัลได้)</small>
                                            @else
                                                @if ($reward->quantity <= 0 || Auth::user()->point < $reward->point)
                                                    <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                            disabled>แลกของรางวัล
                                                    </button>
                                                @else
                                                    {{--                                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">แลกของรางวัล</button>--}}
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn-savfe btn-main-savfe text-center"
                                                            data-toggle="modal"
                                                            data-target="#editModal_{{$reward->id}}">แลกของรางวัล
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal_{{$reward->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ยืนยันการแลกของรางวัล</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">ที่อยู่สำหรับรับของรางวัล</label>
                                                                        <br>
                                                                        <small style="color: red" for="name">***โปรดอย่าลืมใส่เบอร์โทรศัพท์สำหรับติดต่อด้วย</small>
                                                                        <textarea rows="3" type="text"
                                                                                  class="form-control"
                                                                                  placeholder="กรอกที่อยู่และเบอร์โทรศัพท์ของคุณ"
                                                                                  name="address"></textarea>
                                                                    </div>

                                                                    <h4 style="color: red">ใช้แต้ม {{$reward->point}}
                                                                        แต้ม</h4>
                                                                    แต้มสะสมของคุณ {{Auth::user()->point}}
                                                                    - {{$reward->point}} =
                                                                    คงเหลือ {{Auth::user()->point - $reward->point}}
                                                                    แต้ม
                                                                    <br>
                                                                    คุณต้องการยืนยันการแลกของรางวัล ใช่หรือไม่?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก
                                                                    </button>
                                                                    <form role="form" action="{{ url('reward') }}"
                                                                          method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="rewards_id"
                                                                               value="{{$reward->id}}">
                                                                        <button type="submit"
                                                                                class="btn-savfe btn-main-savfe">
                                                                            ยืนยัน
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endguest
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer ">
                                    <a href="{{ url('/reward_detail',$reward->id ) }}" >
                                        <h4 class="text-point">
                                            <i class="fas fa-star"></i> {{$reward->point}} <i class="fas fa-angle-right"></i></h4></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">ของรางวัลยอดนิยม</p>
                        @include('layouts.user.title_savfe')
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('reward_news_detail/popular')}}" style="color: #2BC685;float: right">ดูทั้งหมด <i
                                    class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="row">
                    @foreach($contents_2_4 as $reward)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card reward">
                                @if ($reward->quantity == 0)
                                    <div class="budget-full">
                                        หมด
                                    </div>
                                @endif
                                <div class="card-img-wrapper">
                                    <img src="{{ url($reward->image) }}"
                                         alt="{{ $reward->name }}">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title title-reward">{{ $reward->name }}</h6>
                                    @if ($reward->quantity > 0)
                                        <small class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}}
                                            ชิ้น </small>
                                    @else
                                        <small class="card-text" style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</small>
                                    @endif
                                </div>
                                <div class="form">
                                    <form method="post" role="form" class="contactForm mb-3"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="text-center">
                                            @guest
                                                <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                        disabled>กรุณาเข้าสู่ระบบก่อน
                                                </button>
                                                <br>
                                                <small style="color: red">(จึงจะแลกของรางวัลได้)</small>
                                            @else
                                                @if ($reward->quantity <= 0 || Auth::user()->point < $reward->point)
                                                    <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                            disabled>แลกของรางวัล
                                                    </button>
                                                @else
                                                    {{--                                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">แลกของรางวัล</button>--}}
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn-savfe btn-main-savfe text-center"
                                                            data-toggle="modal"
                                                            data-target="#editModal_{{$reward->id}}">แลกของรางวัล
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal_{{$reward->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ยืนยันการแลกของรางวัล</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">ที่อยู่สำหรับรับของรางวัล</label>
                                                                        <br>
                                                                        <small style="color: red" for="name">***โปรดอย่าลืมใส่เบอร์โทรศัพท์สำหรับติดต่อด้วย</small>
                                                                        <textarea rows="3" type="text"
                                                                                  class="form-control"
                                                                                  placeholder="กรอกที่อยู่และเบอร์โทรศัพท์ของคุณ"
                                                                                  name="address"></textarea>
                                                                    </div>

                                                                    <h4 style="color: red">ใช้แต้ม {{$reward->point}}
                                                                        แต้ม</h4>
                                                                    แต้มสะสมของคุณ {{Auth::user()->point}}
                                                                    - {{$reward->point}} =
                                                                    คงเหลือ {{Auth::user()->point - $reward->point}}
                                                                    แต้ม
                                                                    <br>
                                                                    คุณต้องการยืนยันการแลกของรางวัล ใช่หรือไม่?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก
                                                                    </button>
                                                                    <form role="form" action="{{ url('reward') }}"
                                                                          method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="rewards_id"
                                                                               value="{{$reward->id}}">
                                                                        <button type="submit"
                                                                                class="btn-savfe btn-main-savfe">
                                                                            ยืนยัน
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endguest
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer ">
                                    <a href="{{ url('/reward_detail',$reward->id ) }}" >
                                        <h4 class="text-point">
                                            <i class="fas fa-star"></i> {{$reward->point}} <i class="fas fa-angle-right"></i></h4></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">ของรางวัลที่ใช้แต้มน้อยที่สุด</p>
                        @include('layouts.user.title_savfe')
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('reward_news_detail/lesspoints')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                            <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="row">
                    @foreach($contents_3_4  as $reward)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card reward">
                                @if ($reward->quantity == 0)
                                    <div class="budget-full">
                                        หมด
                                    </div>
                                @endif
                                <div class="card-img-wrapper">
                                    <img src="{{ url($reward->image) }}"
                                         alt="{{ $reward->name }}">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title title-reward">{{ $reward->name }}</h6>
                                    @if ($reward->quantity > 0)
                                        <small class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}}
                                            ชิ้น </small>
                                    @else
                                        <small class="card-text" style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</small>
                                    @endif
                                </div>
                                <div class="form">
                                    <form method="post" role="form" class="contactForm mb-3"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="text-center">
                                            @guest
                                                <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                        disabled>กรุณาเข้าสู่ระบบก่อน
                                                </button>
                                                <br>
                                                <small style="color: red">(จึงจะแลกของรางวัลได้)</small>
                                            @else
                                                @if ($reward->quantity <= 0 || Auth::user()->point < $reward->point)
                                                    <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                            disabled>แลกของรางวัล
                                                    </button>
                                                @else
                                                    {{--                                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">แลกของรางวัล</button>--}}
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn-savfe btn-main-savfe text-center"
                                                            data-toggle="modal"
                                                            data-target="#editModal_{{$reward->id}}">แลกของรางวัล
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal_{{$reward->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ยืนยันการแลกของรางวัล</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">ที่อยู่สำหรับรับของรางวัล</label>
                                                                        <br>
                                                                        <small style="color: red" for="name">***โปรดอย่าลืมใส่เบอร์โทรศัพท์สำหรับติดต่อด้วย</small>
                                                                        <textarea rows="3" type="text"
                                                                                  class="form-control"
                                                                                  placeholder="กรอกที่อยู่และเบอร์โทรศัพท์ของคุณ"
                                                                                  name="address"></textarea>
                                                                    </div>

                                                                    <h4 style="color: red">ใช้แต้ม {{$reward->point}}
                                                                        แต้ม</h4>
                                                                    แต้มสะสมของคุณ {{Auth::user()->point}}
                                                                    - {{$reward->point}} =
                                                                    คงเหลือ {{Auth::user()->point - $reward->point}}
                                                                    แต้ม
                                                                    <br>
                                                                    คุณต้องการยืนยันการแลกของรางวัล ใช่หรือไม่?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก
                                                                    </button>
                                                                    <form role="form" action="{{ url('reward') }}"
                                                                          method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="rewards_id"
                                                                               value="{{$reward->id}}">
                                                                        <button type="submit"
                                                                                class="btn-savfe btn-main-savfe">
                                                                            ยืนยัน
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endguest
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer ">
                                    <a href="{{ url('/reward_detail',$reward->id ) }}" >
                                        <h4 class="text-point">
                                            <i class="fas fa-star"></i> {{$reward->point}} <i class="fas fa-angle-right"></i></h4></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

            </div>

            <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">ของรางวัลล่าสุด</p>
                        @include('layouts.user.title_savfe')
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('reward_news_detail/latest')}}" style="color: #2BC685;float: right">ดูทั้งหมด <i
                                    class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="row">
                    @foreach($contents_1_5  as $reward)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card reward">
                                @if ($reward->quantity == 0)
                                    <div class="budget-full">
                                        หมด
                                    </div>
                                @endif
                                <div class="card-img-wrapper">
                                    <img src="{{ url($reward->image) }}"
                                         alt="{{ $reward->name }}">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title title-reward">{{ $reward->name }}</h6>
                                    @if ($reward->quantity > 0)
                                        <small class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}}
                                            ชิ้น </small>
                                    @else
                                        <small class="card-text" style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</small>
                                    @endif
                                </div>
                                <div class="form">
                                    <form method="post" role="form" class="contactForm mb-3"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="text-center">
                                            @guest
                                                <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                        disabled>กรุณาเข้าสู่ระบบก่อน
                                                </button>
                                                <br>
                                                <small style="color: red">(จึงจะแลกของรางวัลได้)</small>
                                            @else
                                                @if ($reward->quantity <= 0 || Auth::user()->point < $reward->point)
                                                    <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                            disabled>แลกของรางวัล
                                                    </button>
                                                @else
                                                    {{--                                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">แลกของรางวัล</button>--}}
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn-savfe btn-main-savfe text-center"
                                                            data-toggle="modal"
                                                            data-target="#editModal_{{$reward->id}}">แลกของรางวัล
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal_{{$reward->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ยืนยันการแลกของรางวัล</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">ที่อยู่สำหรับรับของรางวัล</label>
                                                                        <br>
                                                                        <small style="color: red" for="name">***โปรดอย่าลืมใส่เบอร์โทรศัพท์สำหรับติดต่อด้วย</small>
                                                                        <textarea rows="3" type="text"
                                                                                  class="form-control"
                                                                                  placeholder="กรอกที่อยู่และเบอร์โทรศัพท์ของคุณ"
                                                                                  name="address"></textarea>
                                                                    </div>

                                                                    <h4 style="color: red">ใช้แต้ม {{$reward->point}}
                                                                        แต้ม</h4>
                                                                    แต้มสะสมของคุณ {{Auth::user()->point}}
                                                                    - {{$reward->point}} =
                                                                    คงเหลือ {{Auth::user()->point - $reward->point}}
                                                                    แต้ม
                                                                    <br>
                                                                    คุณต้องการยืนยันการแลกของรางวัล ใช่หรือไม่?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก
                                                                    </button>
                                                                    <form role="form" action="{{ url('reward') }}"
                                                                          method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="rewards_id"
                                                                               value="{{$reward->id}}">
                                                                        <button type="submit"
                                                                                class="btn-savfe btn-main-savfe">
                                                                            ยืนยัน
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endguest
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer ">
                                    <a href="{{ url('/reward_detail',$reward->id ) }}" >
                                        <h4 class="text-point">
                                            <i class="fas fa-star"></i> {{$reward->point}} <i class="fas fa-angle-right"></i></h4></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">ของรางวัลยอดนิยม</p>
                        @include('layouts.user.title_savfe')
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('reward_news_detail/popular')}}" style="color: #2BC685;float: right">ดูทั้งหมด <i
                                    class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="row">
                    @foreach($contents_2_5  as $reward)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card reward">
                                @if ($reward->quantity == 0)
                                    <div class="budget-full">
                                        หมด
                                    </div>
                                @endif
                                <div class="card-img-wrapper">
                                    <img src="{{ url($reward->image) }}"
                                         alt="{{ $reward->name }}">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title title-reward">{{ $reward->name }}</h6>
                                    @if ($reward->quantity > 0)
                                        <small class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}}
                                            ชิ้น </small>
                                    @else
                                        <small class="card-text" style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</small>
                                    @endif
                                </div>
                                <div class="form">
                                    <form method="post" role="form" class="contactForm mb-3"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="text-center">
                                            @guest
                                                <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                        disabled>กรุณาเข้าสู่ระบบก่อน
                                                </button>
                                                <br>
                                                <small style="color: red">(จึงจะแลกของรางวัลได้)</small>
                                            @else
                                                @if ($reward->quantity <= 0 || Auth::user()->point < $reward->point)
                                                    <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                            disabled>แลกของรางวัล
                                                    </button>
                                                @else
                                                    {{--                                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">แลกของรางวัล</button>--}}
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn-savfe btn-main-savfe text-center"
                                                            data-toggle="modal"
                                                            data-target="#editModal_{{$reward->id}}">แลกของรางวัล
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal_{{$reward->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ยืนยันการแลกของรางวัล</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">ที่อยู่สำหรับรับของรางวัล</label>
                                                                        <br>
                                                                        <small style="color: red" for="name">***โปรดอย่าลืมใส่เบอร์โทรศัพท์สำหรับติดต่อด้วย</small>
                                                                        <textarea rows="3" type="text"
                                                                                  class="form-control"
                                                                                  placeholder="กรอกที่อยู่และเบอร์โทรศัพท์ของคุณ"
                                                                                  name="address"></textarea>
                                                                    </div>

                                                                    <h4 style="color: red">ใช้แต้ม {{$reward->point}}
                                                                        แต้ม</h4>
                                                                    แต้มสะสมของคุณ {{Auth::user()->point}}
                                                                    - {{$reward->point}} =
                                                                    คงเหลือ {{Auth::user()->point - $reward->point}}
                                                                    แต้ม
                                                                    <br>
                                                                    คุณต้องการยืนยันการแลกของรางวัล ใช่หรือไม่?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก
                                                                    </button>
                                                                    <form role="form" action="{{ url('reward') }}"
                                                                          method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="rewards_id"
                                                                               value="{{$reward->id}}">
                                                                        <button type="submit"
                                                                                class="btn-savfe btn-main-savfe">
                                                                            ยืนยัน
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endguest
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer ">
                                    <a href="{{ url('/reward_detail',$reward->id ) }}" >
                                        <h4 class="text-point">
                                            <i class="fas fa-star"></i> {{$reward->point}} <i class="fas fa-angle-right"></i></h4></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

                <div class="row mt-5">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <p style="font-size: 20px; font-weight: bold">ของรางวัลที่ใช้แต้มน้อยที่สุด</p>
                        @include('layouts.user.title_savfe')
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{url('reward_news_detail/lesspoints')}}" style="color: #2BC685;float: right">ดูทั้งหมด
                            <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="row">
                    @foreach($contents_3_5 as $reward)
                        <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card reward">
                                @if ($reward->quantity == 0)
                                    <div class="budget-full">
                                        หมด
                                    </div>
                                @endif
                                <div class="card-img-wrapper">
                                    <img src="{{ url($reward->image) }}"
                                         alt="{{ $reward->name }}">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title title-reward">{{ $reward->name }}</h6>
                                    @if ($reward->quantity > 0)
                                        <small class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}}
                                            ชิ้น </small>
                                    @else
                                        <small class="card-text" style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</small>
                                    @endif
                                </div>
                                <div class="form">
                                    <form method="post" role="form" class="contactForm mb-3"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="text-center">
                                            @guest
                                                <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                        disabled>กรุณาเข้าสู่ระบบก่อน
                                                </button>
                                                <br>
                                                <small style="color: red">(จึงจะแลกของรางวัลได้)</small>
                                            @else
                                                @if ($reward->quantity <= 0 || Auth::user()->point < $reward->point)
                                                    <button type="button" class="btn-savfe btn-main-savfe btn-secondary"
                                                            disabled>แลกของรางวัล
                                                    </button>
                                                @else
                                                    {{--                                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">แลกของรางวัล</button>--}}
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn-savfe btn-main-savfe text-center"
                                                            data-toggle="modal"
                                                            data-target="#editModal_{{$reward->id}}">แลกของรางวัล
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal_{{$reward->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ยืนยันการแลกของรางวัล</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">ที่อยู่สำหรับรับของรางวัล</label>
                                                                        <br>
                                                                        <small style="color: red" for="name">***โปรดอย่าลืมใส่เบอร์โทรศัพท์สำหรับติดต่อด้วย</small>
                                                                        <textarea rows="3" type="text"
                                                                                  class="form-control"
                                                                                  placeholder="กรอกที่อยู่และเบอร์โทรศัพท์ของคุณ"
                                                                                  name="address"></textarea>
                                                                    </div>

                                                                    <h4 style="color: red">ใช้แต้ม {{$reward->point}}
                                                                        แต้ม</h4>
                                                                    แต้มสะสมของคุณ {{Auth::user()->point}}
                                                                    - {{$reward->point}} =
                                                                    คงเหลือ {{Auth::user()->point - $reward->point}}
                                                                    แต้ม
                                                                    <br>
                                                                    คุณต้องการยืนยันการแลกของรางวัล ใช่หรือไม่?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก
                                                                    </button>
                                                                    <form role="form" action="{{ url('reward') }}"
                                                                          method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="rewards_id"
                                                                               value="{{$reward->id}}">
                                                                        <button type="submit"
                                                                                class="btn-savfe btn-main-savfe">
                                                                            ยืนยัน
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endguest
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer ">
                                    <a href="{{ url('/reward_detail',$reward->id ) }}" >
                                        <h4 class="text-point">
                                            <i class="fas fa-star"></i> {{$reward->point}} <i class="fas fa-angle-right"></i></h4></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

            </div>
        </div>
    </div>

    @include('layouts.user.footer_savfe')
@endsection


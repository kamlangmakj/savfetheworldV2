@extends('layouts.user.navbar')
@section('title', 'Rewards Detail')
@section('content')
    <div class="container" style="margin-top: 80px;">
        {{csrf_field()}}
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p style="font-size: 24px; font-weight: bold">รายละเอียดของรางวัล</p>

                        @include('layouts.user.title_savfe')
                    </div>
                </div>
            </div>
        </div>

{{--        <div class="row">--}}
{{--            <div class="mt-3 col-12 col-sm-12 col-md-12 col-lg-12">--}}
{{--                <div class="card">--}}
{{--                    <div class="row no-gutters">--}}
{{--                        <div class="col-md-4">--}}
{{--                            <img class="card-img-top" src="{{ url($reward->image) }}" alt="Card image cap"--}}
{{--                                 style="height: 300px">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-8">--}}
{{--                            <div class="card-body">--}}
{{--                                <small style="color: #acacac"><i class="fas fa-clock"></i>--}}
{{--                                    สร้างเมื่อ {{Carbon\Carbon::parse($reward->created_at)->diffForHumans()}}--}}
{{--                                </small>--}}

{{--                                <br>--}}
{{--                                <h5 style="font-weight: bold;color: #000;margin-top: 10px;"--}}
{{--                                    class="card-title">{{ $reward->name }}</h5>--}}
{{--                                <p class="card-text" style="color:#000;">{{$reward->detail}}</p>--}}
{{--                                @if ($reward->quantity > 0)--}}
{{--                                    <label class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}}--}}
{{--                                        ชิ้น </label>--}}
{{--                                @else--}}
{{--                                    <label class="card-text"--}}
{{--                                           style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</label>--}}
{{--                                @endif--}}
{{--                                <br>--}}
{{--                                --}}{{--                                        <label style="color: #acacac">ประเภทของรางวัล : ​</label><label>{{$reward->rewardsCategory->name}}</label>--}}
{{--                                <small class="p-1"--}}
{{--                                       style="color:#2BC685;width: auto;height: 20px;border: 1px solid #2BC685;border-radius:6px;">{{$reward->rewardsCategory->name}}</small>--}}

{{--                                <h4 class="card-text" style="color: #2BC685;font-weight: bold;margin-top: 20px">--}}
{{--                                    ใช้แต้ม {{$reward->point}}</h4>--}}
{{--                            </div>--}}
{{--                            <div class="form">--}}
{{--                                <form method="post" role="form" class="contactForm mb-3"--}}
{{--                                      enctype="multipart/form-data">--}}
{{--                                    {{csrf_field()}}--}}
{{--                                    <div class="text-center">--}}
{{--                                        @guest--}}
{{--                                            <button type="button" class="btn-savfe btn-main-savfe btn-secondary"--}}
{{--                                                    disabled>กรุณาเข้าสู่ระบบก่อน--}}
{{--                                            </button>--}}
{{--                                            <br>--}}
{{--                                            <small style="color: red">(จึงจะแลกของรางวัลได้)</small>--}}
{{--                                        @else--}}
{{--                                            @if ($reward->quantity <= 0 || Auth::user()->point < $reward->point)--}}
{{--                                                <button type="button" class="btn-savfe btn-main-savfe btn-secondary"--}}
{{--                                                        style="margin-left:20px;margin-bottom:20px;float: left">--}}
{{--                                                    แลกของรางวัล--}}
{{--                                                </button>--}}
{{--                                            @else--}}
{{--                                                --}}{{--                                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">แลกของรางวัล</button>--}}
{{--                                            <!-- Button trigger modal -->--}}
{{--                                                <button type="button" class="btn-savfe btn-main-savfe text-center"--}}
{{--                                                        data-toggle="modal" data-target="#editModal_{{$reward->id}}"--}}
{{--                                                        style="margin-left:20px;margin-bottom:20px;float: left">--}}
{{--                                                    แลกของรางวัล--}}
{{--                                                </button>--}}
{{--                                                <!-- Modal -->--}}
{{--                                                <div class="modal fade" id="editModal_{{$reward->id}}" tabindex="-1"--}}
{{--                                                     role="dialog" aria-labelledby="exampleModalLabel"--}}
{{--                                                     aria-hidden="true">--}}
{{--                                                    <div class="modal-dialog" role="document">--}}
{{--                                                        <div class="modal-content">--}}
{{--                                                            <div class="modal-header">--}}
{{--                                                                <h5 class="modal-title" id="exampleModalLabel">--}}
{{--                                                                    ยืนยันการแลกของรางวัล</h5>--}}
{{--                                                                <button type="button" class="close"--}}
{{--                                                                        data-dismiss="modal" aria-label="Close">--}}
{{--                                                                    <span aria-hidden="true">&times;</span>--}}
{{--                                                                </button>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="modal-body">--}}
{{--                                                                <h4 style="color: red">ใช้แต้ม {{$reward->point}}--}}
{{--                                                                    แต้ม</h4>--}}
{{--                                                                แต้มสะสมของคุณ {{Auth::user()->point}}--}}
{{--                                                                - {{$reward->point}} =--}}
{{--                                                                คงเหลือ {{Auth::user()->point - $reward->point}}--}}
{{--                                                                แต้ม--}}
{{--                                                                <br>--}}
{{--                                                                คุณต้องการยืนยันการแลกของรางวัล ใช่หรือไม่?--}}
{{--                                                            </div>--}}
{{--                                                            <div class="modal-footer">--}}
{{--                                                                <button type="button" class="btn btn-secondary"--}}
{{--                                                                        data-dismiss="modal">ยกเลิก--}}
{{--                                                                </button>--}}
{{--                                                                <form role="form" action="{{ url('reward') }}"--}}
{{--                                                                      method="post" enctype="multipart/form-data">--}}
{{--                                                                    {{csrf_field()}}--}}
{{--                                                                    <input type="hidden" name="rewards_id"--}}
{{--                                                                           value="{{$reward->id}}">--}}
{{--                                                                    <button type="submit"--}}
{{--                                                                            class="btn-savfe btn-main-savfe">ยืนยัน--}}
{{--                                                                    </button>--}}
{{--                                                                </form>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            @endif--}}
{{--                                        @endguest--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


        <div class="row">
            <div class="mt-3 col-12">
                <div class="card">
                    <img class="card-img-top" src="{{ url($reward->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <div class="row mt-2 mb-2">

                            <div class="row col-12">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <small style="color: #acacac"><i class="fas fa-clock"></i>
                                        สร้างเมื่อ {{Carbon\Carbon::parse($reward->created_at)->diffForHumans()}}
                                    </small>
                                    {{--                                        <small style="color: #acacac"><i class="fas fa-history"></i> อัปเดตเมื่อ {{Carbon\Carbon::parse($activity->updated_at)->diffForHumans()}}</small>--}}
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 detail-savfe-align">
                                    <small class="p-1"
                                           style="color:#2BC685;width: auto;height: 20px;border: 1px solid #2BC685;border-radius:6px;">{{$reward->rewardsCategory->name}}</small>

                                </div>
                                {{--                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">--}}
                                {{--                                        <small style="color: #acacac"><i class="fas fa-clock"></i> สร้างเมื่อ {{Carbon\Carbon::parse($activity->created_at)->diffForHumans()}}</small>--}}
                                {{--                                    </div>--}}
                            </div>


                        </div>
                        <h5 style="font-weight: bold;" class="card-title mt-3 mb-3">{{$reward->name}}</h5>
                        <p class="card-text">{{$reward->detail}}</p>
                        @if ($reward->quantity > 0)
                            <label class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}}
                                ชิ้น </label>
                        @else
                            <label class="card-text"
                                   style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</label>
                        @endif
                            <h5 class="card-text mt-3" style="color: #2BC685;font-weight: bold;">
                                ใช้แต้ม {{$reward->point}} แต้ม</h5>

                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-3" style="text-align: center">

                            @guest
                                <button type="button" class="btn-savfe btn-main-savfe btn-secondary" disabled>
                                    กรุณาเข้าสู่ระบบก่อน
                                </button>
                                <br>
                                <small style="color: red">(จึงจะแลกของรางวัลได้)</small>
                            @else
                                @if ($reward->quantity <= 0)
                                    <button type="button" class="btn-savfe btn-main-savfe btn-secondary" disabled>
                                        แลกของรางวัล
                                    </button>
                                    <a href="/reward" class="btn-savfe btn-main-savfe">ไปดูของรางวัลอื่นๆ</a>
                                @else
                                    <div class="row offset-md-3 offset-lg-4">
                                        <div class="text-center pr-2">
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
                                        </div>
                                        <div class="text-center">
                                            <a href="/reward" class="btn-savfe btn-main-savfe btn-secondary">ไปดูของรางวัลอื่นๆ</a>
                                        </div>
                                    </div>
                                @endif
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                <p style="font-size: 20px; font-weight: bold">ของรางวัลแนะนำ</p>
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
    </div>


    @include('layouts.user.footer_savfe')
@endsection


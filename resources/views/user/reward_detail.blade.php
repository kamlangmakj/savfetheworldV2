@extends('layouts.user.navbar')
@section('title', 'Rewards Detail')
@section('content')
    <div class="container" style="margin-top: 80px;">
        {{csrf_field()}}
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p style="font-size: 38px; font-weight: bold">รายละเอียดของรางวัล</p>

                        @include('layouts.user.title_savfe')
                    </div>
                </div>
            </div>
        </div>
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
                                    @if ($reward->quantity > 0)
                                        <small class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}}
                                            ชิ้น </small>
                                    @else
                                        <small class="card-text"
                                               style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</small>
                                    @endif
                                </div>
                                {{--                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">--}}
                                {{--                                        <small style="color: #acacac"><i class="fas fa-clock"></i> สร้างเมื่อ {{Carbon\Carbon::parse($activity->created_at)->diffForHumans()}}</small>--}}
                                {{--                                    </div>--}}
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <h5 class="card-text" style="color: #2BC685;font-weight: bold;">
                                    ใช้แต้ม {{$reward->point}} แต้ม</h5>
                            </div>
                        </div>
                        <h2 style="font-weight: bold;" class="card-title mt-3 mb-3">{{$reward->name}}</h2>
                        <p class="card-text">{{$reward->detail}}</p>
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
                                            <form method="post" role="form" class="contactForm mb-3"
                                                  enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                <div class="text-center">
                                                    @guest
                                                        <button type="button"
                                                                class="btn-savfe btn-main-savfe btn-secondary" disabled>
                                                            กรุณาเข้าสู่ระบบก่อน
                                                        </button>
                                                        <br>
                                                        <small style="color: red">(จึงจะแลกของรางวัลได้)</small>
                                                    @else
                                                        @if ($reward->quantity <= 0 || Auth::user()->point < $reward->point)
                                                            <button type="button"
                                                                    class="btn-savfe btn-main-savfe btn-secondary"
                                                                    disabled>แลกของรางวัล
                                                            </button>
                                                        @else
                                                            {{--                                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">แลกของรางวัล</button>--}}
                                                        <!-- Button trigger modal -->
                                                            <button type="button"
                                                                    class="btn-savfe btn-main-savfe text-center"
                                                                    data-toggle="modal"
                                                                    data-target="#editModal_{{$reward->id}}">
                                                                แลกของรางวัล
                                                            </button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="editModal_{{$reward->id}}"
                                                                 tabindex="-1" role="dialog"
                                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">
                                                                                ยืนยันการแลกของรางวัล</h5>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h4 style="color: red">
                                                                                ใช้แต้ม {{$reward->point}} แต้ม</h4>
                                                                            แต้มสะสมของคุณ {{Auth::user()->point}}
                                                                            - {{$reward->point}} =
                                                                            คงเหลือ {{Auth::user()->point - $reward->point}}
                                                                            แต้ม
                                                                            <br>
                                                                            คุณต้องการยืนยันการแลกของรางวัล ใช่หรือไม่?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">ยกเลิก
                                                                            </button>
                                                                            <form role="form"
                                                                                  action="{{ url('reward') }}"
                                                                                  method="post"
                                                                                  enctype="multipart/form-data">
                                                                                {{csrf_field()}}
                                                                                <input type="hidden" name="rewards_id"
                                                                                       value="{{$reward->id}}">
                                                                                <button type="submit"
                                                                                        class="btn btn-primary">ยืนยัน
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
    </div>
    @include('layouts.user.footer_savfe')
@endsection


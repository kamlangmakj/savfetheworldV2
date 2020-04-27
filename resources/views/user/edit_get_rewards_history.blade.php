@extends('layouts.user.navbar')
@section('title', 'Get rewards History')
@section('content')
    <div class="container" style="margin-top: 80px;">
        {{csrf_field()}}
        <div class="row">
            @guest
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <p style="font-size: 24px; font-weight: bold">แก้ไขประวัติการแลกของรางวัล</p>
                    @include('layouts.user.title_savfe')
                </div>
            @else
                <div class="col-9 col-sm-9 col-md-9 col-lg-9">
                    <p style="font-size: 24px; font-weight: bold">แก้ไขประวัติการแลกของรางวัล</p>
                    @include('layouts.user.title_savfe')
                </div>
                <div class="col-3 col-sm-3 col-md-3 col-lg-3">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#tab0" role="tab"
                       aria-selected="true"></a>
                </div>
            @endguest
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <form role="form" action="{{ url('/profile/get_rewards_history/edit') }}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{ $tracking_reward->id }}">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name">แก้ไขที่อยู่สำหรับรับของรางวัล</label>
                                            <input type="text" class="form-control" placeholder="แก้ไขที่อยู่" name="address"
                                                   value="{{ $tracking_reward->address }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <a class="btn btn-danger" href="{{ url('profile/get_rewards_history') }}"><i
                                                class="fas fa-arrow-alt-circle-left"></i> ย้อนกลับ</a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#editModal_{{ $tracking_reward->id }}"><i class="fas fa-save"></i> บันทึกการแก้ไข
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal_{{ $tracking_reward->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        บันทึกการแก้ไขประวัติการแลกของรางวัล</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    คุณต้องการแก้ไขประวัติการแลกของรางวัล ใช่หรือไม่?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">ยกเลิก
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </form>
                </div>
@endsection



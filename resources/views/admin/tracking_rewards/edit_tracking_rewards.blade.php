@extends('layouts.admin.master')

@section('title', 'Edit Tracking reward')

@section('header')
    <div class="row mb-2 mt-4">
        <div class="col-sm-6">
            <h5 class="m-0 text-dark">Edit Tracking reward - แก้ไขข้อมูลติดตามของรางวัล</h5>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('admin/tracking_rewards') }}">Tracking rewards</a></li>
                <li class="breadcrumb-item active">Edit Tracking rewards</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #F1F2F2; height: 80px">
                    <h3 class="card-title text-bold mt-3">แก้ไขข้อมูลติดตามของรางวัล</h3>
                </div>

                <!-- /.card-header -->
                <form role="form" action="{{ url('admin/tracking_rewards/edit') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$tracking_reward->id}}">

                    <form role="form" action="{{ url('admin/rewards/edit') }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{ $tracking_reward->id }}">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">สถานะการติดตามของรางวัล</label>
                                        <select type="text" class="form-control" placeholder="สถานะการติดตามของรางวัล" name="status_id">
                                            <option value="1" @if($tracking_reward->status_id == 1) selected @endif>รอการตรวจสอบ</option>
                                            <option value="2" @if($tracking_reward->status_id == 2) selected @endif>กำลังจัดส่ง</option>
                                            <option value="3" @if($tracking_reward->status_id == 3) selected @endif>รับของเรียบร้อย</option>
                                        </select>
                                    </div>
                                </div>

{{--                                <div class="col">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="name">เลขพัสดุ</label>--}}
{{--                                        <input type="text" class="form-control" value="$tracking_reward" name="code">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                @if($tracking_reward->status_id == 2)
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name">เลขพัสดุ</label>
                                            <input type=text class="form-control" placeholder="กรอกเลขพัสดุ" value="{{ $tracking_reward->code }}" name="code">
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="exampleInputFile">เลือกรูปภาพ</label>
                                            <br>
                                            <small style="color: red">***เพื่อเป็นหลักฐานว่าได้ทำการส่งของรางวัลแล้ว</small>
                                            <div class="mb-2">
                                                <img style="max-height:300px;" id="blah" src="/{{ $tracking_reward->image }}" alt="" />
                                            </div>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="image" onchange="readURL(this);">
                                                    <label class="custom-file-label" for="exampleInputFile">{{ $tracking_reward->image }}</label>
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
                                    @else
                               @endif


                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a class="btn btn-danger" href="{{ url('admin/tracking_rewards') }}"><i class="fas fa-arrow-alt-circle-left"></i> ย้อนกลับ</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#editModal"><i class="fas fa-save"></i> บันทึกการแก้ไข</button>
                        <!-- Modal -->
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">บันทึกการแก้ไขข้อมูลการติดตามของรางวัล</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        คุณต้องการบันทึกการแก้ไขข้อมูลการติดตามของรางวัล ใช่หรือไม่?
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
@endsection




@extends('layouts.admin.master')

@section('title', 'Rewards')

@section('header')
    <div class="row mb-2 mt-4">
        <div class="col-sm-6">
            <h5 class="m-0 text-dark">Edit Reward - แก้ไขของรางวัล</h5>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('admin/rewards') }}">Rewards</a></li>
                <li class="breadcrumb-item active">Edit Reward</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #F1F2F2; height: 80px">
                    <h3 class="card-title text-bold mt-3">แก้ไขของรางวัล</h3>
                </div>

                <!-- /.card-header -->
                <form role="form" action="{{ url('admin/rewards/edit') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{ $reward->id }}">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">ชื่อของรางวัล</label>
                                        <input type="text" class="form-control" placeholder="ชื่อ" name="name" value="{{ $reward->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">รายละเอียดของรางวัล</label>
                                        <textarea rows="3" type="text" class="form-control" placeholder="รายละเอียดของรางวัล" name="detail">{{ $reward->detail }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">ประเภทของรางวัล</label>
                                        <select type="text" class="form-control" placeholder="ประเภทของรางวัล" name="rewards_category_id">
                                            <option value="1" @if($reward->rewards_category_id == 1) selected @endif>บัตรของขวัญ</option>
                                            <option value="2" @if($reward->rewards_category_id == 2) selected @endif>บัตรเติมน้ำมัน</option>
                                            <option value="3" @if($reward->rewards_category_id == 3) selected @endif>ส่วนลดค่าที่พัก</option>
                                            <option value="4" @if($reward->rewards_category_id == 4) selected @endif>ส่วนลดค่าอาหาร</option>
                                            <option value="5" @if($reward->rewards_category_id == 5) selected @endif>อื่นๆ</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="name">แต้ม</label>
                                            <input type=number class="form-control" name="point" value="{{ $reward->point }}">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="name">จำนวน</label>
                                            <input type=number class="form-control" name="quantity" value="{{ $reward->quantity }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleInputFile">เลือกรูปภาพ</label>
                                        <div class="mb-2">
                                            <img style="max-height:300px;" id="blah" src="/{{ $reward->image }}" alt="your image" />
                                        </div>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image" onchange="readURL(this);">
                                                <label class="custom-file-label" for="exampleInputFile">{{ $reward->image }}</label>
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
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a class="btn btn-danger" href="{{ url('admin/rewards') }}"><i class="fas fa-arrow-alt-circle-left"></i> ย้อนกลับ</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#editModal"><i class="fas fa-save"></i> บันทึกการแก้ไข</button>
                        <!-- Modal -->
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">บันทึกการแก้ไขของรางวัล</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        คุณต้องการบันทึกการแก้ไขของรางวัล ใช่หรือไม่?
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

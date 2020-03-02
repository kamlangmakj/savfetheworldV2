@extends('layouts.admin.master')

@section('title', 'Rewards')

@section('header')
    <div class="row mb-2 mt-4">
        <div class="col-sm-6">
            <h5 class="m-0 text-dark">Create Reward - เพิ่มของรางวัล</h5>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('admin/rewards') }}">Rewards</a></li>
                <li class="breadcrumb-item active">Create Reward</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #F1F2F2; height: 80px">
                    <h3 class="card-title text-bold mt-3">เพิ่มของรางวัล</h3>
                </div>

                <!-- /.card-header -->
                <form role="form" action="{{ url('admin/rewards/create') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">ชื่อของรางวัล</label>
                                        <input type="text" class="form-control" placeholder="ชื่อ" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">รายละเอียดของรางวัล</label>
                                        <textarea rows="3" type="text" class="form-control" placeholder="รายละเอียดของรางวัล" name="detail"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">ประเภทของรางวัล</label>
                                        <select type="text" class="form-control" placeholder="ประเภทของรางวัล" name="rewards_category_id">
                                            <option value="1">บัตรของขวัญ</option>
                                            <option value="2">บัตรเติมน้ำมัน</option>
                                            <option value="3">ส่วนลดค่าที่พัก</option>
                                            <option value="4">ส่วนลดค่าอาหาร</option>
                                            <option value="5">อื่นๆ</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="name">แต้ม</label>
                                            <input type=number class="form-control" value="1000" name="point">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="name">จำนวน</label>
                                            <input type=number class="form-control" value="1" name="quantity">
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleInputFile">เลือกรูปภาพ</label>
                                        <div class="mb-2">
                                            <img style="max-height:300px;" id="blah" src="http://placehold.it/300" alt="your image" />
                                        </div>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image" onchange="readURL(this);">
                                                <label class="custom-file-label" for="exampleInputFile" name="image">เลือกรูปภาพ</label>
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
                        <button type="submit" class="btn btn-primary"><i class="fas fa-calendar-plus"></i> เพิ่มของรางวัล</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

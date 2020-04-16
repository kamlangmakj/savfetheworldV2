@extends('layouts.admin.master')

@section('title', 'Contacts')

@section('header')
    <div class="row mb-2 mt-4">
        <div class="col-sm-6">
            <h5 class="m-0 text-dark">Edit Contacts - แก้ไขข้อมูลการติดต่อเรา</h5>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('admin/contacts') }}">Contacts</a></li>
                <li class="breadcrumb-item active">Edit Contacts</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #F1F2F2; height: 80px">
                    <h3 class="card-title text-bold mt-3">แก้ไขข้อมูลการติดต่อเรา</h3>
                </div>

                <!-- /.card-header -->
                <form role="form" action="{{ url('admin/contacts/edit') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$contact->id}}">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">สถานะการติดต่อเรา</label>
                                        <select type="text" class="form-control" placeholder="สถานะการติดตามของรางวัล" name="status_id">
                                            <option value="1" @if($contact->status_id == 1) selected @endif>ยังไม่ได้ตอบ</option>
                                            <option value="2" @if($contact->status_id == 2) selected @endif>ตอบแล้ว</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a class="btn btn-danger" href="{{ url('admin/contacts') }}"><i class="fas fa-arrow-alt-circle-left"></i> ย้อนกลับ</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#editModal"><i class="fas fa-save"></i> บันทึกการแก้ไข</button>
                        <!-- Modal -->
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">บันทึกการแก้ไขข้อมูลการติดต่อเรา</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        คุณต้องการบันทึกแก้ไขข้อมูลการติดต่อเรา ใช่หรือไม่?
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




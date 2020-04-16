@extends('layouts.user.navbar')
@section('title', 'Join Activities History')
@section('content')
    <div class="container" style="margin-top: 80px;">
        {{csrf_field()}}
        <div class="row">
            @guest
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <p style="font-size: 38px; font-weight: bold">ประวัติการเข้าร่วมกิจกรรม</p>
                    @include('layouts.user.title_savfe')
                </div>
            @else
                <div class="col-9 col-sm-9 col-md-9 col-lg-9">
                    <p style="font-size: 38px; font-weight: bold">ประวัติการเข้าร่วมกิจกรรม</p>
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
            <div class="card-body table-responsive p-0">
                <table id="tableRewards" class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>ชื่อกิจกรรม</th>
                        <th>วันที่เริ่มกิจกรรม</th>
                        <th>วันที่จบกิจกรรม</th>
                        <th>ได้รับแต้ม</th>
                        <th>สถานะ</th>
                        <th>ตัวเลือก</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($join_activities as $join_activity)
                        <tr>
                            <td>{{$join_activity->id}}</td>
                            <td>{{$join_activity->activity->name}}</td>
                            <td>{{Carbon\Carbon::parse($join_activity->activity->started_date)->addYear(543)->translatedFormat('d M Y')}}</td>
                            <td>{{Carbon\Carbon::parse($join_activity->activity->expired_date)->addYear(543)->translatedFormat('d M Y')}}</td>
                            <td style="color: #B0C547 ">{{$join_activity->activity->point}}</td>
                            @if($join_activity->status_id == 1)
                                <td style="color: red">ยังไม่ได้ยืนยันการเข้าร่วม</td>
                            @elseif($join_activity->status_id == 2)
                                <td style="color: #B0C547;">ยืนยันการเข้าร่วมแล้ว</td>
                            @elseif($join_activity->status_id == 3)
                                <td style="color: #5888C6;">ยังไม่ได้กดรับแต้มสะสม</td>
                            @else
                                <td style="color: #acacac;">กดรับแต้มสะสมแล้ว</td>
                            @endif

                            {{--                               @if($join_activity->status_id == 1)--}}
                            {{--                                   <td style="color: red;">รอการตรวจสอบ</td>--}}
                            {{--                               @elseif($join_activity->status_id == 2)--}}
                            {{--                                   <td style="color: #F3D034;">กำลังจัดส่ง</td>--}}
                            {{--                               @else--}}
                            {{--                                   <td style="color: #B0C547;">รับของเรียบร้อย</td>--}}
                            {{--                               @endif--}}

                            @if($join_activity->status_id == 1)
                                <td>
                                    <button type="button" class="btn btn-success">
                                        <i class="fas fa-check"></i> ยืนยันการเข้าร่วม
                                    </button>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#editModal{{$join_activity->id}}"><i class="fas fa-times"></i>
                                        ยกเลิกการเข้าร่วม
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal{{$join_activity->id}}" tabindex="-1"
                                         role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        ยกเลิกการเข้าร่วมกิจกรรม</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    คุณต้องการยกเลิกการเข้าร่วมกิจกรรม ใช่หรือไม่?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">ยกเลิก
                                                    </button>
                                                    <form role="form"
                                                          action="{{ url('profile/join_activities_history') }}"
                                                          method="post" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                                        <input type="hidden" name="join_activities_id"
                                                               value="{{$join_activity->id}}">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @elseif($join_activity->status_id == 2)
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#editModal{{$join_activity->id}}"><i class="fas fa-times"></i>
                                        ยกเลิกการเข้าร่วม
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal{{$join_activity->id}}" tabindex="-1"
                                         role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        ยกเลิกการเข้าร่วมกิจกรรม</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    คุณต้องการยกเลิกการเข้าร่วมกิจกรรม ใช่หรือไม่?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">ยกเลิก
                                                    </button>
                                                    <form role="form"
                                                          action="{{ url('profile/join_activities_history') }}"
                                                          method="post" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                                        <input type="hidden" name="join_activities_id"
                                                               value="{{$join_activity->id}}">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @elseif($join_activity->status_id == 3)
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn" style="background-color: #5888C6; color: white;"
                                            data-toggle="modal"
                                            data-target="#editModal{{$join_activity->id}}"><i class="fas fa-star"></i>
                                        กดรับแต้มสะสม
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal{{$join_activity->id}}" tabindex="-1"
                                         role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        ยกเลิกการเข้าร่วมกิจกรรม</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    คุณต้องการยกเลิกการเข้าร่วมกิจกรรม ใช่หรือไม่?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">ยกเลิก
                                                    </button>
                                                    <form role="form"
                                                          action="{{ url('profile/join_activities_history') }}"
                                                          method="post" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                                        <input type="hidden" name="join_activities_id"
                                                               value="{{$join_activity->id}}">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-danger" disabled><i class="fas fa-times"></i>
                                        ยกเลิกการเข้าร่วม
                                    </button>
                                </td>
                            @elseif($join_activity->status_id == 4)
                                <td>
                                    <button type="button" class="btn" style="background-color: #5888C6; color: white;"
                                            disabled><i class="fas fa-star"></i>
                                        กดรับแต้มสะสม
                                    </button>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#editModal{{$join_activity->id}}"><i
                                                class="fas fa-trash"></i> ลบ
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal{{$join_activity->id}}" tabindex="-1"
                                         role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        ยกเลิกการเข้าร่วมกิจกรรม</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    คุณต้องการยกเลิกการเข้าร่วมกิจกรรม ใช่หรือไม่?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">ยกเลิก
                                                    </button>
                                                    <form role="form"
                                                          action="{{ url('profile/join_activities_history') }}"
                                                          method="post" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <button type="submit" class="btn btn-primary">ยืนยัน
                                                        </button>
                                                        <input type="hidden" name="join_activities_id"
                                                               value="{{$join_activity->id}}">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @else
                            @endif
                        </tr>

                    @endforeach

                    @if($join_activities->count()==0)
                        <tr>
                            <td colspan="6" style="text-align: center;color: red;">ไม่มีข้อมูลการเข้าร่วมกิจกรรม</td>
                        </tr>
                    @endif

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="row">
                <div class="col-12 text-center">
                    {{ $join_activities->links() }}
                </div>
            </div>
        </div>

    </div>

    @include('layouts.user.footer_savfe')
@endsection



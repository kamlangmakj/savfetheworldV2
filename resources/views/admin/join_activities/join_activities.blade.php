@extends('layouts.admin.master')

@section('title', 'Join Activities')

@section('header')
    <div class="row mb-2 mt-4">
        <div class="col-sm-6">
            <h5 class="m-0 text-dark">Join Activities - เข้าร่วมกิจกรรม</h5>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #F1F2F2; height: 80px">
                    <h3 class="card-title text-bold mt-3">รายชื่อเช้าร่วมกิจกรรม</h3>
                    {{--                    <div class="float-right mt-2">--}}
                    {{--                        <a class="btn btn-primary" href="{{ url('admin/activities/create') }}"><i class="fas fa-calendar-plus"></i> สร้างกิจกรรม</a>--}}
                    {{--                    </div>--}}
                </div>

                <div class="container mt-3 mb-3">
                    <div class="row">
                        <div class="input-group col-6">
                            <input id="myInput" onkeyup="myFunction()" class="form-control" type="text" name="search"
                                   id="search" placeholder="ค้นหา ID, ชื่อกิจกรรม" aria-label="Search">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-text1"><i class="fas fa-search text-grey"
                                                                                   aria-hidden="true"></i></span>
                            </div>
                        </div>

                        {{--                        search อันเดียว--}}
                        <script>
                            function myFunction() {
                                let input, filter, table, tr, td, i, txtValue;
                                input = document.getElementById("myInput");
                                filter = input.value.toUpperCase();
                                table = document.getElementById("tableUsers");
                                tr = table.getElementsByTagName("tr");
                                for (i = 0; i < tr.length; i++) {

                                    td = tr[i].getElementsByTagName("td")[0];

                                    if (td) {
                                        txtValue = td.textContent || td.innerText;
                                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].style.display = "";
                                        } else {
                                            tr[i].style.display = "none";
                                        }
                                    }
                                }
                            }
                        </script>

                        <div class="input-group col-4">
                            <label class="mt-1">วันที่เริ่มกิจกรรม:</label> <input type="date" class="form-control"
                                                                                   name="started_date"
                                                                                   style="margin-left: 10px">
                        </div>
                        <div class="input-group col-2">
                            <select type="text" class="form-control" name="rewards_category_id">
                                <option value="">สถานะการเข้าร่วม</option>
                                <option value="1">เหลือ 1-9 คน</option>
                                <option value="2">เหลือ 10-19 คน</option>
                                <option value="3">เหลือ 20-49 คน</option>
                                <option value="4">เหลือ 50-99 คน</option>
                                <option value="5">เหลือมากกว่า 100 คน</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">

                    <table id="tableRewards" class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>ชื่อกิจกรรม</th>
                            <th>ID ผู้ใช้งาน</th>
                            <th>วันที่เริ่มกิจกรรม</th>
                            <th>วันที่จบกิจกรรม</th>
                            <th>สถานะ</th>
                            <th>ตัวเลือก</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($join_activities as $join_activity)
                            <tr>
                                <td>{{$join_activity->id}}</td>
                                <td>{{$join_activity->activity->name}}</td>
                                <td>{{$join_activity->users_id}}</td>
                                {{--                                <td>{{$join_activity->user->name}}</td>--}}
                                <td>{{Carbon\Carbon::parse($join_activity->activity->started_date)->addYear(543)->translatedFormat('d M Y')}}</td>
                                <td>{{Carbon\Carbon::parse($join_activity->activity->expired_date)->addYear(543)->translatedFormat('d M Y')}}</td>
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


                                <td>
                                    {{--                                    <button type="button" class="btn btn-success">--}}
                                    {{--                                        <i class="fas fa-check"></i> ยืนยันการเข้าร่วม--}}
                                    {{--                                    </button>--}}
                                    <a href="{{ url('admin/join_activities/edit',$join_activity->id ) }}"
                                       class="btn btn-warning"><i class="fas fa-cog"></i> แก้ไข</a>
                                    @if($join_activity->status_id == 1 || $join_activity->status_id == 4)
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
                                    @else
                                        <button type="button" class="btn btn-danger" disabled><i
                                                    class="fas fa-trash"></i> ลบ
                                        </button>
                                    @endif
                                </td>

                            </tr>


                        @endforeach


                        @if($join_activities->count()==0)
                            <tr>
                                <td colspan="7" style="text-align: center;color: red;">ไม่มีข้อมูลการเข้าร่วมกิจกรรม
                                </td>
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

@endsection

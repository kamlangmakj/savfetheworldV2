@extends('layouts.admin.master')

@section('title', 'Activities')

@section('header')
    <div class="row mb-2 mt-4">
        <div class="col-sm-6">
            <h5 class="m-0 text-dark">Activities - กิจกรรม</h5>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #F1F2F2; height: 80px">
                    <h3 class="card-title text-bold mt-3">รายชื่อกิจกรรม</h3>
                    <div class="float-right mt-2">
                        <a class="btn btn-primary" href="{{ url('admin/activities/create') }}"><i class="fas fa-calendar-plus"></i> สร้างกิจกรรม</a>
                    </div>
                </div>

                <div class="container mt-3 mb-3">
                    <div class="row" >
                        <div class="input-group col-6">
                            <input id="myInput" onkeyup="myFunction()" class="form-control" type="text" name="search" id="search" placeholder="ค้นหา ID, ชื่อกิจกรรม" aria-label="Search">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-text1"><i class="fas fa-search text-grey" aria-hidden="true"></i></span>
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
                            <label style="margin-top: 8px">วันที่เริ่มกิจกรรม:</label> <input type="date" class="form-control" name="started_date" style="margin-left: 10px">
                        </div>
                        <div class="input-group col-2">
                            <select type="text" class="form-control" name="rewards_category_id">
                                <option value="">จำนวนคนเข้าร่วม</option>
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

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>ชื่อกิจกรรม</th>
                            <th>วันที่เริ่มกิจกรรม</th>
                            <th>วันที่จบกิจกรรม</th>
                            <th>จำนวนคนเข้าร่วม</th>
                            <th>สถานะ</th>
                            <th>ตัวเลือก</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($activities as $activity)
                            <tr>
                                <td>{{ $activity->id }}</td>
                                <td>{{ $activity->name }}</td>
                                <td>{{Carbon\Carbon::parse($activity->started_date)->addYear(543)->translatedFormat('d M Y')}}</td>
                                <td>{{Carbon\Carbon::parse($activity->expired_date)->addYear(543)->translatedFormat('d M Y')}}</td>

                                    @if ($activity->joinActivities->count() < $activity->amount)
                                    <td style="color: #B0C547">{{$activity->joinActivities->count()}}/{{$activity->amount}} คน</td>
                                    @else
                                    <td style="color: #FF0000">{{$activity->joinActivities->count()}}/{{$activity->amount}} คน</td>
                                    @endif

                                @if ($activity->joinActivities->count() < $activity->amount)
                                    <td style="color: #B0C547">จำนวนคนเหลืออีก {{$activity->amount-$activity->joinActivities->count()}} คน</td>
                                @else
                                    <td style="color: #FF0000">จำนวนคนเต็มแล้ว</td>
                                @endif
                                <td>
                                    <a href="{{ url('admin/activities/edit',$activity->id ) }}" class="btn btn-warning"><i class="fas fa-cog"></i> แก้ไข</a>
                                    <form style="display: inline" role="form" action="{{ url('admin/activities/delete') }}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{ $activity->id }}">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#editModal"><i class="fas fa-trash"></i> ลบ</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">ลบกิจกรรม</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        คุณต้องการลบกิจกรรม ใช่หรือไม่?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                        <button type="submit" class="btn btn-primary">ลบกิจกรรม</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        @if($activities->count()==0)
                            <tr>
                                <td colspan="6" style="text-align: center;color: red;">ไม่มีข้อมูลกิจกรรม</td>
                            </tr>
                        @endif


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="row">
                <div class="col-12 text-center">
                    {{ $activities->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

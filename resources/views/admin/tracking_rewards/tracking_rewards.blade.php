@extends('layouts.admin.master')

@section('title', 'Users')

@section('header')
    <div class="row mb-2 mt-4">
        <div class="col-sm-6">
            <h5 class="m-0 text-dark">tracking_rewards - ผู้ใช้งาน</h5>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #F1F2F2; height: 80px">
                    <h3 class="card-title text-bold mt-3">รายชื่อผู้ใช้งาน</h3>
                </div>
                <div class="container mt-3 mb-3">
                    <div class="row" >
                        <div class="input-group col-6">
                            <input id="myInput" onkeyup="myFunction()" class="form-control" type="text" name="search" id="search" placeholder="ค้นหา ID, ชื่อผู้ใช้งาน" aria-label="Search">
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

                        <div class="input-group col-3">
                            <select type="text" class="form-control" name="rewards_category_id">
                                <option value="">เพศ</option>
                                <option value="1">เพศชาย</option>
                                <option value="2">เพศหญิง</option>
                            </select>
                        </div>
                        <div class="input-group col-3">
                            <select type="text" class="form-control" name="rewards_category_id">
                                <option value="">อายุ</option>
                                <option value="1">18-29 ปี</option>
                                <option value="2">30-39 ปี</option>
                                <option value="3">40-49 ปี</option>
                                <option value="4">มากกว่า 50 ปี</option>
                            </select>
                        </div>
{{--                        <div class="input-group col-2">--}}
{{--                            <select type="text" class="form-control" name="rewards_category_id">--}}
{{--                                <option value="">ระดับผู้ใช้งาน</option>--}}
{{--                                <option value="1">Admin</option>--}}
{{--                                <option value="2">User</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table id="tableUsers" class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>ชื่อ</th>
                            <th>อีเมล</th>
                            <th>เพศ</th>
                            <th>อายุ</th>
                            <th>เบอร์โทรศัพท์</th>
{{--                            <th>ระดับผู้ใช้งาน</th>--}}
                            <th>ตัวเลือก</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        @foreach($users as $user)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $user->id }}</td>--}}
{{--                                <td>{{ $user->name }}</td>--}}
{{--                                <td>{{ $user->email }}</td>--}}
{{--                                <td>{{ $user->gender }}</td>--}}
{{--                                <td>21 ปี</td>--}}
{{--                                <td>{{ $user->phone }}</td>--}}
{{--                                <td>{{ $user->role }}</td>--}}
{{--                                <td>--}}
{{--                                    <a href="{{ url('admin/users/edit',$user->id ) }}" class="btn btn-warning"><i class="fas fa-cog"></i> แก้ไข</a>--}}
{{--                                    <form style="display: inline" role="form" action="{{ url('admin/users/delete') }}" method="post">--}}
{{--                                        {{csrf_field()}}--}}
{{--                                        <input type="hidden" name="id" value="{{ $user->id }}">--}}
{{--                                        <!-- Button trigger modal -->--}}
{{--                                        <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#editModal"><i class="fas fa-trash"></i> ลบ</button>--}}
{{--                                        <!-- Modal -->--}}
{{--                                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                                            <div class="modal-dialog" role="document">--}}
{{--                                                <div class="modal-content">--}}
{{--                                                    <div class="modal-header">--}}
{{--                                                        <h5 class="modal-title" id="exampleModalLabel">ลบข้อมูลผู้ใช้งาน</h5>--}}
{{--                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                            <span aria-hidden="true">&times;</span>--}}
{{--                                                        </button>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="modal-body">--}}
{{--                                                        คุณต้องการลบข้อมูลผู้ใช้งาน ใช่หรือไม่?--}}
{{--                                                    </div>--}}
{{--                                                    <div class="modal-footer">--}}
{{--                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>--}}
{{--                                                        <button type="submit" class="btn btn-primary">ลบข้อมูลผู้ใช้งาน</button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        @if($users->count()==0)--}}
{{--                            <tr>--}}
{{--                                <td colspan="6" style="text-align: center;color: red;">ไม่มีข้อมูลผู้ใช้งาน</td>--}}
{{--                            </tr>--}}
{{--                        @endif--}}

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="row">
{{--                <div class="col-12 text-center">--}}
{{--                    {{ $users->links() }}--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection

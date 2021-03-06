@extends('layouts.admin.master')

@section('title', 'Rewards')

@section('header')
    <div class="row mb-2 mt-4">
        <div class="col-sm-6">
            <h5 class="m-0 text-dark">Rewards - ของรางวัล</h5>
        </div><!-- /.col -->
        {{--<div class="col-sm-6">--}}
        {{--<ol class="breadcrumb float-sm-right">--}}
        {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
        {{--<li class="breadcrumb-item active">Dashboard v1</li>--}}
        {{--</ol>--}}
        {{--</div><!-- /.col -->--}}
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #F1F2F2;">
                    <h3 class="card-title text-bold mt-3">รายการของรางวัล</h3>
                    <div class="float-right mt-2">
                        <a class="btn btn-primary" href="{{ url('admin/rewards/create') }}"><i
                                    class="fas fa-plus-square"></i> เพิ่มของรางวัล</a>
                    </div>
                </div>
                <div class="container mt-3 mb-3">
                    <div class="row">
                        <div class="input-group col-6">
                            <input id="myInput" onkeyup="myFunction()" class="form-control" type="text" name="search"
                                   id="search" placeholder="ค้นหา ID, ชื่อของรางวัล" aria-label="Search">
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
                                table = document.getElementById("tableRewards");
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

                        <div class="input-group col-2">
                            <select type="text" class="form-control" name="rewards_category_id">
                                <option value="">ใช้แต้ม</option>
                                <option value="1">100-999 แต้ม</option>
                                <option value="2">1000-4999 แต้ม</option>
                                <option value="3">5000-9999 แต้ม</option>
                                <option value="4">มากกว่า 10000 แต้ม</option>
                            </select>
                        </div>
                        <div class="input-group col-2">
                            <select type="text" class="form-control" name="rewards_category_id">
                                <option value="">จำนวนที่เหลือ</option>
                                <option value="1">0 ชิ้น</option>
                                <option value="2">10-19 ชิ้น</option>
                                <option value="3">20-29 ชิ้น</option>
                                <option value="4">30-39 ชิ้น</option>
                                <option value="5">40-49 ชิ้น</option>
                                <option value="6">50-99 ชิ้น</option>
                                <option value="7">มากกว่า 100 ชิ้น</option>
                            </select>
                        </div>
                        <div class="input-group col-2">
                            <select type="text" class="form-control" name="rewards_category_id">
                                <option value="">สถานะ</option>
                                <option value="1">มีของรางวัล</option>
                                <option value="2">ไม่มีของรางวัล</option>
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
                            <th>รูปของรางวัล</th>
                            <th>ชื่อของรางวัล</th>
                            <th>ใช้แต้ม</th>
                            <th>จำนวนที่เหลือ</th>
                            <th>ตัวเลือก</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rewards as $reward)
                            <tr>
                                <td>{{ $reward->id }}</td>
                                <td><img class="card-img-top" src="{{ url($reward->image) }}" style="height: 100px;width: 100px"></td>
                                <td>{{ $reward->name }}</td>
                                <td>{{ $reward->point }}</td>
                                @if($reward->quantity>=1)
                                    <td style="color: #B0C547;">{{ $reward->quantity }} ชิ้น</td>
                                @else
                                    <td style="color: red;">0 ชิ้น</td>
                                @endif
                                <td>
                                    <a href="{{ url('admin/rewards/edit',$reward->id ) }}" class="btn btn-warning"><i
                                                class="fas fa-cog"></i> แก้ไข</a>
                                    <form style="display: inline" role="form" action="{{ url('admin/rewards/delete') }}"
                                          method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{ $reward->id }}">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#editModal{{$reward->id}}"><i class="fas fa-trash"></i> ลบ
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="editModal{{$reward->id}}" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">ลบของรางวัล</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        คุณต้องการลบของรางวัล ใช่หรือไม่?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">ยกเลิก
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">ลบของรางวัล
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if($rewards->count()==0)
                            <tr>
                                <td colspan="6" style="text-align: center;color: red;">ไม่มีข้อมูลของรางวัล</td>
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
                    {{ $rewards->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

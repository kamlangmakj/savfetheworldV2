@extends('layouts.admin.master')

@section('title', 'Receive News')

@section('header')
    <div class="row mb-2 mt-4">
        <div class="col-sm-6">
            <h5 class="m-0 text-dark">Receive News - ส่งข่าวสาร</h5>
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
                    <h3 class="card-title text-bold mt-3">รายการส่งข่าวสาร</h3>
                </div>
                <div class="container mt-3 mb-3">
                    <div class="row" >
                        <div class="input-group col-6">
                            <input id="myInput" onkeyup="myFunction()" class="form-control" type="text" name="search" id="search" placeholder="ค้นหา ID" aria-label="Search">
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

                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">

                    <table id="tableRewards" class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>อีเมลผู้ติดต่อ</th>
                            <th>สถานะ</th>
                            <th>ตัวเลือก</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($receive_news as $receive_new)
                            <tr>
                                <td>{{ $receive_new->id }}</td>
                                <td>{{ $receive_new->email }}</td>

                                @if($receive_new->status_id == 1)
                                    <td style="color: red;">ยังไม่ได้ส่ง</td>
                                @else
                                    <td style="color: #B0C547;">ส่งแล้ว</td>
                                @endif

{{--                            @if($contact->id>=1)--}}
{{--                                <td style="color: #B0C547;">มีของรางวัล</td>--}}
{{--                                @else--}}
{{--                                    <td style="color: red;">ไม่มีของรางวัล</td>--}}
{{--                            @endif--}}
                                <td>
                                    <a href="{{ url('admin/receive_news/edit',$receive_new->id ) }}" class="btn btn-warning"><i class="fas fa-cog"></i> แก้ไข</a>
                                    <form style="display: inline" role="form" action="{{ url('admin/receive_news/delete') }}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{ $receive_new->id }}">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#editModal{{$receive_new->id}}"><i class="fas fa-trash"></i> ลบ</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="editModal{{$receive_new->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">ลบการส่งข่าวสาร</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        คุณต้องการลบการส่งข่าวสาร ใช่หรือไม่?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                        <button type="submit" class="btn btn-primary">ลบการส่งข่าวสาร</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if($receive_news->count()==0)
                            <tr>
                                <td colspan="6" style="text-align: center;color: red;">ไม่มีข้อมูลการส่งข่าวสาร</td>
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
                    {{ $receive_news->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

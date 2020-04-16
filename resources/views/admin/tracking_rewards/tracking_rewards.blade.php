@extends('layouts.admin.master')

@section('title', 'Tracking Rewards')

@section('header')
    <div class="row mb-2 mt-4">
        <div class="col-sm-6">
            <h5 class="m-0 text-dark">Tracking rewards - ผู้ใช้งาน</h5>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #F1F2F2; height: 80px">
                    <h3 class="card-title text-bold mt-3">รายการของรางวัลที่ถูกแลก</h3>
                    {{--                    <h3 class="card-title text-bold mt-3">รายการของรางวัลที่ถูกแลก ({{$tracking_rewards->count()}})</h3>--}}
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
                                <option value="">จำนวนที่ถูกแลก</option>
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
                                <option value="1">รอการตรวจสอบ</option>
                                <option value="2">กำลังจัดส่ง</option>
                                <option value="3">รับของเรียบร้อย</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table id="tableRewards" class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>ชื่อของรางวัล</th>
                            <th>ชื่อผู้ใช้งาน</th>
                            {{--                            <th>ID / ชื่อผู้ใช้งานที่ขอแลกรางวัล</th>--}}
                            <th>ใช้แต้ม</th>
                            <th>เลขพัสดุ</th>
                            {{--                            <th>จำนวนที่ถูกแลก</th>--}}
                            <th>สถานะ</th>
                            <th>ตัวเลือก</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tracking_rewards as $tracking_reward)
                            <tr>
                                <td>{{$tracking_reward->id}}</td>
                                <td>{{$tracking_reward->reward->name}}</td>
                                <td>{{$tracking_reward->user->name}}</td>
                                {{--                                    <td>ID:{{$tracking_reward->user->id}} / ชื่อ:{{$tracking_reward->user->name}}</td>--}}
                                <td>{{$tracking_reward->reward->point}}</td>
                                @if($tracking_reward->code == null)
                                    <td style="text-align: center">-</td>
                                @else
                                    <td>{{$tracking_reward->code}}</td>
                                @endif

                                @if($tracking_reward->status_id == 1)
                                    <td style="color: red;">รอการตรวจสอบ</td>
                                @elseif($tracking_reward->status_id == 2)
                                    <td style="color: #F3D034;">กำลังจัดส่ง</td>
                                @else
                                    <td style="color: #B0C547;">รับของเรียบร้อย</td>
                                @endif
                                <td>
                                    <a href="{{ url('admin/tracking_rewards/edit',$tracking_reward->id ) }}"
                                       class="btn btn-info"><i class="fas fa-eye"></i> ดูรายละเอียด</a>
                                    <a href="{{ url('admin/tracking_rewards/edit',$tracking_reward->id ) }}"
                                       class="btn btn-warning"><i class="fas fa-cog"></i> แก้ไข</a>
                                    <form style="display: inline" role="form"
                                          action="{{ url('admin/tracking_rewards/delete') }}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{ $tracking_reward->id }}">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#editModal{{$tracking_reward->id}}"><i class="fas fa-trash"></i> ลบ
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="editModal{{$tracking_reward->id}}" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            ลบการติดตามของรางวัล</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        คุณต้องการลบการติดตามของรางวัล ใช่หรือไม่?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">ยกเลิก
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            ลบการติดตามของรางวัล
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>

                        @endforeach

                        @if($tracking_rewards->count()==0)
                            <tr>
                                <td colspan="6" style="text-align: center;color: red;">ไม่มีข้อมูลติดตามของรางวัล</td>
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
                    {{ $tracking_rewards->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin.master')

@section('title', 'Users')

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
                </div>
                <div class="container mt-3 mb-3">
                    <div class="row" >
                        <div class="input-group col-6">
                            <input id="myInput" onkeyup="myFunction()" class="form-control" type="text" name="search" id="search" placeholder="ค้นหา ID, ชื่อของรางวัล" aria-label="Search">
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
                                <option value="1">กำลังจัดส่ง</option>
                                <option value="2">รับของเรียบร้อย</option>
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
                            <th>ใช้แต้ม</th>
                            <th>จำนวนที่ถูกแลก</th>
                            <th>สถานะ</th>
                            <th>ตัวเลือก</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        @foreach($rewards as $reward)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $reward->id }}</td>--}}
{{--                                <td>{{ $reward->name }}</td>--}}
{{--                                <td>{{ $reward->point }}</td>--}}
{{--                                <td>{{ $reward->quantity }}</td>--}}
{{--                                @if($reward->quantity>=1)--}}
{{--                                    <td style="color: #B0C547;">มีของรางวัล</td>--}}
{{--                                @else--}}
{{--                                    <td style="color: red;">ไม่มีของรางวัล</td>--}}
{{--                            @endif--}}

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

@extends('layouts.user.navbar')
@section('title', 'Save Rewards History')
@section('content')
    <div class="container" style="margin-top: 80px;">
        {{csrf_field()}}
        <div class="row">
            @guest
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <p style="font-size: 24px; font-weight: bold">ของรางวัลที่บันทึกไว้</p>
                    @include('layouts.user.title_savfe')
                </div>
            @else
                <div class="col-9 col-sm-9 col-md-9 col-lg-9">
                    <p style="font-size: 24px; font-weight: bold">ของรางวัลที่บันทึกไว้</p>
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
                        <th>รูปของรางวัล</th>
                        <th>ชื่อของรางวัล</th>
                        <th>ใช้แต้ม</th>
                        <th>สถานะ</th>
                        <th>ตัวเลือก</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tracking_rewards as $tracking_reward)
                        <tr>
                            <td>{{$tracking_reward->id}}</td>
                            <td><img class="card-img-top" src="{{ url($tracking_reward->reward->image) }}"
                                     style="height: 100px;width: 100px"></td>
                            <td>{{$tracking_reward->reward->name}}</td>
                            <td>{{$tracking_reward->reward->point}}</td>
                            @if($tracking_reward->status_id == 1)
                                <td style="color: red;">แต้มสะสมไม่เพียงพอ</td>
                            @else
                                <td style="color: #B0C547;">แต้มสะสมพอแล้ว</td>
                            @endif
                            <td>
                                {{--                                   <a href="{{ url('admin/tracking_rewards/edit',$tracking_reward->id ) }}" class="btn btn-info"><i class="fas fa-eye"></i> ดูรายละเอียด</a>--}}
                                {{--                                   <a href="{{ url('admin/tracking_rewards/edit',$tracking_reward->id ) }}" class="btn btn-warning"><i class="fas fa-cog"></i> แก้ไข</a>--}}
                                <form style="display: inline" role="form"
                                      action="{{ url('profile/get_rewards_history') }}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="tracking_rewards_id" value="{{ $tracking_reward->id }}">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#editModal{{ $tracking_reward->id }}"><i
                                                class="fas fa-times"></i> ลบ
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal{{ $tracking_reward->id }}" tabindex="-1"
                                         role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        ยกเลิกการแลกของรางวัล</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    คุณต้องการยกเลิกการแลกของรางวัล ใช่หรือไม่?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">ยกเลิก
                                                    </button>
                                                    <form role="form"
                                                          action="{{ url('profile/get_rewards_history') }}"
                                                          method="post" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <button type="submit" class="btn btn-primary">ยืนยัน
                                                        </button>
                                                        <input type="hidden" name="tracking_rewards_id"
                                                               value="{{$tracking_reward->id}}">
                                                    </form>
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
                            <td colspan="6" style="text-align: center;color: red;">ไม่มีข้อมูลการแลกของรางวัล</td>
                        </tr>
                    @endif

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

            <div class="row">
                <div class="col-12 text-center">
                    {{ $tracking_rewards->links() }}
                </div>
            </div>
        </div>

    </div>

    @include('layouts.user.footer_savfe')
@endsection



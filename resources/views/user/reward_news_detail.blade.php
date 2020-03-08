@extends('layouts.user.navbar')
@section('title', 'Rewards News Detail')
@section('content')
    <div class="container" style="margin-top: 80px;">
        {{csrf_field()}}
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p style="font-size: 38px; font-weight: bold">{{$header}}</p>
                        @include('layouts.user.title_savfe')
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($rewards as $reward)
                <div class="mt-3 col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ url($reward->image) }}" alt="Card image cap" style="height: 200px">
                        <div class="card-body">
                            <div class="row mt-2 mb-2">
                                {{--                                        {{ $content_1->id }}--}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                    @if ($reward->quantity > 0)
                                        <small class="card-text" style="color: #acacac;font-weight: bold;">มีของรางวัลเหลืออยู่ {{$reward->quantity}} ชิ้น </small>
                                    @else
                                        <small class="card-text" style="color: red;font-weight: bold;">ของรางวัลหมดแล้ว</small>
                                    @endif
                                </div>
                            </div>
                            <h6 style="font-weight: bold;" class="card-title title-content-savfe-reward text-center">{{ $reward->name }}</h6>
                            <h4 class="card-text text-center" style="color: #2BC685;font-weight: bold;">ใช้แต้ม {{$reward->point}}</h4>
                        </div>
                        <div class="form">

                            <form method="post" role="form" class="contactForm mb-3" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="text-center">
                                    @if ($reward->quantity <= 0)
                                        <button type="button" class="btn-savfe btn-main-savfe btn-secondary" disabled>แลกของรางวัล</button>
                                    @else
                                        <button class="btn-savfe btn-main-savfe text-center" type="submit" title="Send Message">แลกของรางวัล</button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
{{--    <div class="container mt-3">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12 text-center">--}}
{{--                {{ $rewards->links() }}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}



    @include('layouts.user.footer_savfe')

@endsection


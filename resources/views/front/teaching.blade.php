@extends('front.layout.app')
@section('content')

<section class="innerbanner" style="background-image: url('master/images/innerbanner1.jpg')">
    <div class="container">
        <div class="inner_bannercont">
            <h1 class="mb-0 text-uppercase">Teaching Process</h1>
        </div>
    </div>
</section>

{{-- <section class="innerpage_firstcont">
    <div class="container">
        <div class="row py-5 justify-content-center">
            <div class="col-lg-12 col-md-12">
                <h1 class="text_blue">{{$data->tilte}}</h1>
                <span class="line_border"></span>
                <p>{!!$data->desc!!}</p>
            </div>
        </div>
    </div>
</section> --}}

<section class="teaching_process">
    <div class="container-fluid p-lg-0 p-md-0">
        @foreach($Teachingprocess as $key=>$item)
        @if($key % 2 == 0)
            <div class="row teaching_process_cont1 py-lg-5 py-md-5">
                <div class="col-md-6 order-lg-1 order-md-1 order-2">
                    <div class="teaching_process_cont1_cont pr-lg-5 mt-lg-0 mt-md-0 mt-3">
                        <h2 class="mb-lg-4 mb-2">{{$item->title}}</h2>
                        <p class="mb-0">{{$item->description}}</p>
                        <!-- <a href="#" class="more_link">Continue Reading <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> -->
                    </div>
                </div>
                <div class="col-md-6 order-lg-2 order-md-2 order-1">
                    <img src="{{$item->image}}" class="img-fluid w-100" alt="" width="100%">
                </div>
            </div>
        @else
            <div class="row teaching_process_cont2 py-lg-5 py-md-5">
                <div class="col-md-6 order-lg-1 order-md-1 order-1">
                    <img src="{{$item->image}}" class="img-fluid w-100" alt="">
                </div>
                <div class="col-md-6 order-lg-2 order-md-2 order-2">
                    <div class="teaching_process_cont2_cont pl-lg-5 mt-lg-0 mt-md-0 mt-3">
                        <h2 class="mb-lg-4 mb-2">{{$item->title}}</h2>
                        <p class="mb-0">{{$item->description}}</p>
                        <!-- <a href="#" class="more_link">Continue Reading <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> -->
                    </div>
                </div>
            </div>
        @endif
        @endforeach
    </div>
</section>

@endsection
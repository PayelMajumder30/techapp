@extends('front.layout.app')
@section('content')
@php
    use Illuminate\Support\Str;
@endphp
<section class="innerbanner" style="background-image: url('master/images/innerbanner1.jpg')">
    <div class="container">
        <div class="inner_bannercont">
            <h1 class="mb-0 text-uppercase">Why Choose Us</h1>
        </div>
    </div>
</section>
<section class="choose_us">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 text-center">
                <h1 class="text_blue">Why Choose Us</h1>
                <span class="line_border"></span>
            </div>
        </div>
        <div class="row mt-4">
            @foreach ($data as $item)
            {{-- {{ dd($item->image) }} --}}
                <div class="col-lg-3 col-md-6 mt-4">
                    <div class="choose_us_cont">
                        <span>
                            <img src="{{asset($item->image)}}" class="img-fluid" alt="">
                        </span>
                        <h5 class="">{{$item->title}}</h5>
                        {{ Str::limit(strip_tags($item->description), 200, '...') }}
                        {{-- <a href="#">Read more</a> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
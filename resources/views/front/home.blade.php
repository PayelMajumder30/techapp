@extends('front.layout.app')
@section('content')
@php
    use Illuminate\Support\Str;
@endphp

<style>
    .gallery_slide .item {
        position: relative;
        width: 100%;
        height: 250px; /* Adjust height as needed */
        overflow: hidden;
    }

    .gallery_slide .item img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensures uniform scaling while maintaining aspect ratio */
    }

    .gallery_slide .video {
        position: relative;
        width: 100%;
        height: 100%;
    }

</style>

<section class="innerbanner" style="background-image: url('master/images/innerbanner1.jpg')">
    {{-- <div class="container">
        <div class="inner_bannercont">
            <h1 class="mb-0 text-uppercase">Why Choose Us</h1>
        </div>
    </div> --}}
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
            @foreach ($choice as $item)
            {{-- {{ dd($item->image) }} --}}
                <div class="col-lg-3 col-md-6 mt-4">
                    <div class="choose_us_cont">
                        <span>
                            <img src="{{asset($item->image)}}" class="img-fluid" alt="">
                        </span>
                        <h5 class="">{{$item->title}}</h5>
                        {{ Str::limit(($item->description), 200, '...') }}
                        {{-- <a href="#">Read more</a> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="text_blue text-uppercase">Gallery</h1>
                <span class="line_border"></span>
                <div class="owl-carousel owl-theme gallery_slide mt-lg-5 mt-4">
                    @foreach ($galry as $item)
                        @if ($item->image)
                            <div class="item">
                                <a href="{{ asset($item->image) }}" class="fresco">
                                    <img src="{{ asset( $item->image) }}" class="img-fluid w-100">
                                </a>
                            </div>
                        @else
                            <div class="item">
                                <div class="video">
                                    <a href="{{ $item->video }}" class="fresco">
                                        <img src="{{ asset('master/images/gallerybg1.jpg') }}" class="img-fluid w-100">
                                    </a>
                                    <span class="blob">
                                        <a href="{{ $item->video }}" class="fresco">
                                            <img src="{{ asset('master/images/video_icon.png') }}" class="img-fluid video_icon">
                                        </a>
                                    </span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('.gallery_slide').owlCarousel({
            loop: true,
            margin: 10,
            dots: false,
            nav: true,
            navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            responsive: {
                0: { items: 1 },
                600: { items: 3 },
                1000: { items: 3 }
            }
        });
    });
</script>
@endsection

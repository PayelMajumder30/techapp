@extends('front.layout.app')
@section('content')
<style>
.teaching_process .row {
    padding: 40px 0; /* Reduce vertical space */
}


.teaching_process img {
    max-width: 80%; /* Reduce width proportionally */
    max-height: 250px; /* Set a maximum height */
    height: auto; /* Maintain aspect ratio */
    width: auto; /* Maintain aspect ratio */
    object-fit: contain; /* Prevent cutting */
    display: block; /* Ensure proper spacing */
    margin: 0 auto; /* Center the image */
    border-radius: 8px; 
}

.teaching_process_cont1_cont h2,
.teaching_process_cont2_cont h2 {
    font-size: 22px; /* Reduce heading size */
    margin-bottom: 10px;
}

.teaching_process_cont1_cont p,
.teaching_process_cont2_cont p {
    font-size: 14px; /* Reduce paragraph text */
    line-height: 1.5;
}

@media (max-width: 768px) {
    .teaching_process .row {
        padding: 20px 0; /* Reduce spacing further for smaller screens */
    }

    .teaching_process img {
        max-width: 100%; /* Adjust for smaller screens */
        max-height: 200px; /* Reduce height for mobile */
    }
}

</style>

<section class="innerbanner" style="background-image: url('master/images/innerbanner1.jpg')">
    <div class="container">
        <div class="inner_bannercont">
            <h1 class="mb-0 text-uppercase">Faculties</h1>
        </div>
    </div>
</section>



<section class="teaching_process">
    <div class="container p-lg-0 p-md-0">
        @foreach($faculty as $key=>$item)
        @if($key % 2 == 0)
            <div class="row teaching_process_cont1 py-lg-5 py-md-5">
                <div class="col-md-6 order-lg-1 order-md-1 order-2">
                    <div class="pr-lg-5 mt-lg-0 mt-md-0 mt-3">
                        <h2 class="mb-lg-4 mb-2">{{$item->name}}</h2>
                        <p class="mb-0">{{$item->designation}}</p>
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
                    <div class=" pl-lg-5 mt-lg-0 mt-md-0 mt-3">
                        <h2 class="mb-lg-4 mb-2">{{$item->name}}</h2>
                        <p class="mb-0">{{$item->designation}}</p>
                        <!-- <a href="#" class="more_link">Continue Reading <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> -->
                    </div>
                </div>
            </div>
        @endif
        @endforeach
    </div>
</section>

@endsection
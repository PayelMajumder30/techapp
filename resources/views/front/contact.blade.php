@extends('front.layout.app')
@section('content')

<style>
     .error{
        color:red;
    }
    .alert{
        width: fit-content !important;
    }
</style>
<section class="innerbanner" style="background-image: url('master/images/innerbanner1.jpg')">
    <div class="container">
        <div class="inner_bannercont">
            <h1 class="mb-0 text-uppercase">Contact</h1>
        </div>
    </div>
</section>

<section class="contact py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 pr-lg-5">
                <div class="adress_cont">
                    <h3 class="text_blue mb-3">Locate Us at</h3>
                    <p class="mr-lg-5"><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>{{$setting[6]->content}}</p>
                </div>
                <div class="address_cont mt-4 contact_box">
                    <h3 class="text_blue mb-2">Contact Us</h3>
                    <p class="mb-0"><span><i class="fa fa-phone" aria-hidden="true"></i></span> <a href="Tel:{{$setting[0]->content}}">{{$setting[0]->content}}</a></p>
                    <p class="mb-0"><span><i class="fa fa-envelope" aria-hidden="true"></i></span> <a href="mailto:{{$setting[2]->content}}">{{$setting[2]->content}}</a></p>
                    <p class="mb-0"><span><i class="fa fa-globe" aria-hidden="true"></i></span> <a href="{{$setting[8]->content}}" target="_blank">{{$setting[8]->content}}</a></p>
                </div>
                <div class="address_cont mt-4 contact_box">
                    <h3 class="text_blue mb-3">Engage with Us on</h3>
                    <div class="social_media mt-3">
                        <ul class="ml-0 pl-0">
                            @foreach($social_media as $item)
                            <li>
                                <a href="{{$item->link}}" target="_blank">
                                    <img src="{{$item->image}}" alt="{{$item->title}}" width="100%">
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-lg-0 mt-md-0 mt-5">
                <div class="contact_form">
                    <h3 class="text_blue mb-4">How can we assist?</h3>
                    <form id="contactForm" class="row" action="{{ route('contact.enquiry') }}" method="POST">
                        @csrf
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="full_name" placeholder="Full Name">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="callback_number" placeholder="Call Back Number">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea class="form-control" name="message" rows="4" placeholder="Purpose / Message"></textarea>
                        </div>
                        <div id="alertData"></div>
                        <div class="col-lg-6 col-12 form-group">
                            <div class="g-recaptcha" data-sitekey="6Lfr-GApAAAAAPRmNChpaQxtH1EtihN-7OiDjOKt"></div>
                        </div>
                        <div>
                            <button type="submit" class="apply_now mt-4">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="map mt-3 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <iframe src="{{ $settings[7]->content}}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<section class="project" style="background-image: url('./master/images/projectbg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-6 py-lg-0 py-md-0 py-2">
                <div class="form_btn">
                    <a href="" class="w-100">Admisions Open</a>
                </div>
            </div>
            {{-- <div class="col-md-4 py-lg-0 py-md-0 py-2">
                <div class="form_btn">
                    <a href="{{route('front.facility.index')}}" class="w-100">Facilities</a>
                </div>
            </div> --}}
            <div class="col-md-6 py-lg-0 py-md-0 py-2">
                <div class="form_btn">
                    <a href="" class="w-100">Academics</a>
                </div>
            </div>
          
        </div>
    </div>
</section>

@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<!-- Include Google reCAPTCHA script -->
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
    $(document).ready(function (){
        // jQuery Validate plugin setup
        $('form').on('submit', function () {
            let submitButton = $(this).find('button[type="submit"]');
            submitButton.prop('disabled', true).text('Loading...');
        });
        $('#contactForm').validate({
            rules: {
                full_name: "required",
                callback_number: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                },
                message: "required"
            },
            messages: {
                full_name: "Please enter your full name",
                callback_number: {
                    required: "Please enter your callback number",
                    number: "Please enter a valid number",
                    minlength: "Number should be at least 10 digits",
                    maxlength: "Number should be at most 10 digits"
                },
                message: "Please enter your message"
            },
            submitHandler: function(form) {
                let submitButton = $(form).find('button[type="submit"]');
                submitButton.prop('disabled', true).text('Loading...');
                $.ajax({
                    url: $(form).attr('action'),
                    type: 'POST',
                    data: $(form).serialize(),
                    success: function(response) {
                        var alertClass = (response.status == 200) ? 'alert-success' : 'alert-danger';
                        var message = response.message;
                        var alertHtml =  '<div class="alert '+ alertClass +'" role="alert">'+ message +'</div>';
                        $('#alertData').append(alertHtml);
                        if (response.status == 200) {
                            $(form)[0].reset(); // Reset form fields
                        }
                        submitButton.prop('disabled', false).text('Submit');
                        $('.alert').delay(5000).fadeOut('slow', function(){
                            $(this).remove();
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);

                        submitButton.prop('disabled', false).text('Submit');
                    }
                });
                return false;
            }
        });
    });
</script>
@endsection
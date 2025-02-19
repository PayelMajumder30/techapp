@extends('front.layout.app')
@section('content')
<style>
    #verified_email{
        font-weight: 700;
        color: #6bc710 !important;
    }
</style>
<div class="page-wrapper">
    <div class="page-wrapper">
        <section class="inner-banner">
            <div class="background"><img src="{{asset('frontend-assets/assets/img/career-banner.jpg')}}" alt="Background"></div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="page-title">Application Form</h2>
                        </div>
                    </div>
                </div>
            </div>           
        </section>

        <section class="form-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form id="registrationFormData" action="" method="post" enctype="multipart/form-data"></form>
                        @csrf
                        <input type="hidden" name="job_id" value="{{$vacancy->id}}">
                        <div class="tab-content">
                            <div class="tab-panel" id="step1">
                                <div class="form-box">
                                    <h3>Personal Information</h3>
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Name<span class="required">*</span></label>
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
                                                <p id="error_name" class="text-danger err-msg"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Father's Name</label>
                                                <input type="text" name="father_name" id="father_name" class="form-control" placeholder="Enter your Father's name">
                                                <p id="error_fname" class="text-danger err-msg"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Date of Birth<span class="required">*</span></label>
                                                <input type="text" name="date_of_birth" id="date_of_birth" class="form-control" placeholder="Enter your DOB" pattern="\d{2}-\d{2}-\d{4}">
                                                <p id="error_date_ofb" class="text-danger err-msg"></p>
                                            </div>
                                        </div>
                                       
                                        <div class="col-xl-6 col-12">
                                            <div class="form-group">
                                                <label class="foem-label">Gender<span class="required">*</span></label>
                                                <div class="gender-options">
                                                    <label for="genop1" class="custom-radio">
                                                        Male
                                                        <input type="radio" name="gender" id="genop1" value="Male" checked>
                                                        <span class="check-box">
                                                            <span class="checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <label for="genop2" class="custom-radio">
                                                        Female
                                                        <input type="radio" name="gender" id="genop2" value="Female" checked>
                                                        <span class="check-box">
                                                            <span class="checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <label for="genop3" class="custom-radio">
                                                        Rather Not Say
                                                        <input type="radio" name="gender" id="genop3" value="others" checked>
                                                        <span class="check-box">
                                                            <span class="checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <p id="error_gender" class="text-danger err-msg"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label">Contact No. (M) <span class="required">*</span></label>
                                            <div class="form-group phone-input-group">
                                                <div class="phone-code-col">
                                                    <input type="text" class="form-control" placeholder=""
                                                        value="+91" name="phone_code" readonly>
                                                </div>
                                                <div class="phone-number-col">
                                                    <input type="text" class="form-control" placeholder="Enter your phone number" name="phone" id="phone">
                                                </div>
                                                <p id="error_phone" class="text-danger err-msg"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group phone-input-group">
                                                <div class="phone-number-col email-id-col">
                                                    <label class="form-label">Email ID<span class="required">*</span></label>
                                                    <input type="email" placeholder="enter valid email address" name="email" id="email" class="form-control">
                                                    <p id="verified_email" class="success-msg"></p>
                                                    <p id="error_email" class="text-danger err-msg"></p>
                                                </div>
                                                <div class="phone-cta-col">
                                                    <button type="button" class="btn btn-theme btn-cta" id="Email_Send_OTP" disabled>Send OTP</button>
                                                </div>
                                                <p id="otp_message" class="font-weight-bold text-end success-msg"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label">Enter OTP received on the email above<span class="required">*</span></label>
                                            <div class="form-group phone-input-group" id="otp_full_div">
                                                <div class="phone-number-col phone-otp-col email-otp-col">
                                                    <div class="otp-input-group" id="inputs">
                                                        <input type="text" class="form-control" name="valid_otp[]" maxlength="1">
                                                        <input type="text" class="form-control" name="valid_otp[]" maxlength="1">
                                                        <input type="text" class="form-control" name="valid_otp[]" maxlength="1">
                                                        <input type="text" class="form-control" name="valid_otp[]" maxlength="1">
                                                        <input type="text" class="form-control" name="valid_otp[]" maxlength="1">
                                                        <input type="text" class="form-control" name="valid_otp[]" maxlength="1">
                                                    </div>
                                                </div>

                                                <div class="phone-cta-col">
                                                    <span class="btn btn-theme btn-status disabled" id="validate_otp" onclick="validateOTP()">Validate
                                                        OTP</span>
                                                </div>
                                                <p id="valid_otp_message" class="font-weight-bold success-msg"></p>
                                            </div>                          
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Marital Status <span
                                                        class="required">*</span></label>
                                                <div class="gender-options">
                                                    <label for="marital1" class="custom-radio">
                                                        Unmarried
                                                        <input type="radio" name="marital_status" id="marital1" value="Unmarried" checked>
                                                        <span class="check-box">
                                                            <span class="checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <label for="marital2" class="custom-radio">
                                                        Married
                                                        <input type="radio" name="marital_status" id="marital2" value="married">
                                                        <span class="check-box">
                                                            <span class="checkmark"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="step-form-cta-row">
                                    <div class="step-prev"></div>
                                    <div class="step-next">
                                        {{-- next form --}}
                                        <a href="javascript:void(0)" id="first_next" class="">
                                            <span class="btn btn-theme">
                                                Next 
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                                                    height="512" x="0" y="0" viewBox="0 0 492.004 492.004"
                                                    style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                    class="">
                                                    <g>
                                                        <path
                                                            d="M382.678 226.804 163.73 7.86C158.666 2.792 151.906 0 144.698 0s-13.968 2.792-19.032 7.86l-16.124 16.12c-10.492 10.504-10.492 27.576 0 38.064L293.398 245.9l-184.06 184.06c-5.064 5.068-7.86 11.824-7.86 19.028 0 7.212 2.796 13.968 7.86 19.04l16.124 16.116c5.068 5.068 11.824 7.86 19.032 7.86s13.968-2.792 19.032-7.86L382.678 265c5.076-5.084 7.864-11.872 7.848-19.088.016-7.244-2.772-14.028-7.848-19.108z"
                                                            fill="#ffffff" opacity="1" data-original="#ffffff"
                                                            class=""></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            {{-- second step --}}
                            <div class="tab-pannel" id="step2">
                                <div class="form-box">
                                    <h3>Address for Communication</h3>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Address <span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter your address" name="address" id="address">
                                                    <p id="error_address" class="text-danger"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Nearest Landmark</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter your nearest landmark" name="landmark" id="landmark">
                                                    <p id="error_landmark" class="text-danger"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Pincode <span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter your pin/postal code" name="pincode" id="pincode">
                                                    <p id="error_pincode" class="text-danger"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">City <span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter your city" name="city" id="city">
                                                    <p id="error_city" class="text-danger"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">District <span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter your district" name="dist" id="dist">
                                                    <p id="error_dist" class="text-danger"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">State <span
                                                        class="required">*</span></label>
                                                <select class="form-control" name="state" id="state">
                                                    <option selected disabled>Enter your state</option>
                                                    <option value="West Bengal">West Bengal</option>
                                                </select>
                                                <p id="error_state" class="text-danger"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Country <span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter your country" name="country" id="country" value="India">
                                                    <p id="error_country" class="text-danger"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="step-form-cta-row">
                                    <div class="step-prev">
                                        <a href="javascript:void(0)" class="previous">
                                            <span class="btn btn-theme">
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                                                    height="512" x="0" y="0" viewBox="0 0 492 492"
                                                    style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                    class="hovered-paths">
                                                    <g>
                                                        <path
                                                            d="M198.608 246.104 382.664 62.04c5.068-5.056 7.856-11.816 7.856-19.024 0-7.212-2.788-13.968-7.856-19.032l-16.128-16.12C361.476 2.792 354.712 0 347.504 0s-13.964 2.792-19.028 7.864L109.328 227.008c-5.084 5.08-7.868 11.868-7.848 19.084-.02 7.248 2.76 14.028 7.848 19.112l218.944 218.932c5.064 5.072 11.82 7.864 19.032 7.864 7.208 0 13.964-2.792 19.032-7.864l16.124-16.12c10.492-10.492 10.492-27.572 0-38.06L198.608 246.104z"
                                                            fill="#ffffff" opacity="1" data-original="#ffffff"
                                                            class="hovered-path"></path>
                                                    </g>
                                                </svg>
                                                Prev
                                            </span>
                                        </a>
                                    </div>
                                    <!-- <div class="step-save">
                                        <button class="btn btn-theme-reverse">Save and Proceed</button>
                                    </div> -->
                                    <div class="step-next">
                                        <a href="javascript:void(0)" id="second_next" class="">
                                            <span class="btn btn-theme">
                                                Next
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                                                    height="512" x="0" y="0" viewBox="0 0 492.004 492.004"
                                                    style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                    class="">
                                                    <g>
                                                        <path
                                                            d="M382.678 226.804 163.73 7.86C158.666 2.792 151.906 0 144.698 0s-13.968 2.792-19.032 7.86l-16.124 16.12c-10.492 10.504-10.492 27.576 0 38.064L293.398 245.9l-184.06 184.06c-5.064 5.068-7.86 11.824-7.86 19.028 0 7.212 2.796 13.968 7.86 19.04l16.124 16.116c5.068 5.068 11.824 7.86 19.032 7.86s13.968-2.792 19.032-7.86L382.678 265c5.076-5.084 7.864-11.872 7.848-19.088.016-7.244-2.772-14.028-7.848-19.108z"
                                                            fill="#ffffff" opacity="1" data-original="#ffffff"
                                                            class=""></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
    var currentDate = new Date();
    var month = currentDate.getMonth() + 1;
    var date = currentDate.getDate();
    var year = currentDate.getFullYear() - 10;

    if(month < 10){
        month = '0' + month.toString();
    }
    if(date < 10){
        date = '0' + date.toString();
    }
    var format = year + '-' + month + '-' + date;
    $('#date_of_birth').attr('max', format);

    //first step verification
    $(document).ready(function(){
        $('#first_next').click(function(event){
            event.preventDefault();
            $('#error_name').text("");
            $('#error_fname').text("");
            $('#error_date_ofb').text("");
            $('#error_phone').text("");
            $('#error_email').text("");
            
            var name = $("#name").val();
            var gender = $("input[name='gender']:checked").val();
            var marital_status = $("input[name='marital_status']:checked").vale();
            var father_name = $('#father_name').val();
            var date_of_birth = $('#date_of_birth').val();
            var phone = $('#phone').val();
            var email = $('#email').val();

            if (name.length == "") {
                $("#error_name").text("Please enter your name");
                $("#name").focus();
                return false;
            } else if(father_name.length == ""){
                $('#error_fname').text("please enter your father name");
                $('#father_name').focus();
                return false;
            } else if(date_of_birth.length == ""){
                $('#error_date_ofb').text("please choose your date of birth");
                $('#date_of_birth').focus();
                return false;
            }else if(phone.length != 10 || isNaN(phone)){
                $('#error_phone').text("Please enter a valid number");
                $('#phone').focus();
                return false;
            }else if(email.lengh == ""){
                $('#error_email').text("Please enter the email address");
                $('#email').focus();
                return false;
            }
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    $("#error_email").text("Please enter a valid email address");
                    $("#email").focus();
                    return false;
                }
            var verifiedEmail = localStorage.getItem('verified_email');
            if(verifiedEmail == 1){
                console.log('next-form');
                localStorage.setItem('name',name);
                localStorage.setItem('fname',father_name);
                localStorage.setItem('dob',date_of_birth);
                localStorage.setItem('gender',gender);
                localStorage.setItem('phone',phone);
                localStorage.setItem('marital_status', marital_status);
                $(this).addClass('next-form');
                //Button click
                current_ff = $(this).parent().parent().parent();
                next_ff = current_ff.next();

                //add class active
                $(".step-list li").eq($(".tab-pannel").index(current_ff)).addClass("completed");
                $(".step-list li").eq($(".tab-pannel").index(next_ff)).addClass("active");

                //show the next steps
                next_ff.show();
                //hide the current step with style
                current_ff.animate({opacity : 0}, {
                    step: function(now){
                    // for making fielset appear animation
                    opacity = 1 - now;
                    current_ff.css({
                        'display' : 'none',
                        'position': 'relative'
                    });
                    next_ff.css({opacity : 0});
                    }, duration: 500
                });
                setProgressBar(++current);
            }else{
                alert('here');
            }
        });
    });

      // All Get localStorage
    // Retrieve the value of 'verified_email' from localStorage
    var verifiedEmail = localStorage.getItem('verified_email');
    var set_email = localStorage.getItem('email');
    var set_name = localStorage.getItem('name');
    var set_fname = localStorage.getItem('fname');
    var set_dob = localStorage.getItem('dob');
    var set_gender = localStorage.getItem('gender');
    var set_phone = localStorage.getItem('phone');
    var set_marital_status = localStorage.getItem('marital_status');
    if (verifiedEmail == 1) {
        $('#verified_email').text('Email verified');
        // $('#Email_Send_OTP').remove();
        // $('#otp_full_div').remove();
    }
    if (set_email) {
        $('#email').val(set_email);
    }
    if (set_name) {
        $('#name').val(set_name);
    }
    if (set_fname) {
        $('#father_name').val(set_fname);
    }
    if (set_phone) {
        $('#phone').val(set_phone);
    }
    if (set_dob) {
        $('#date_of_birth').val(set_dob);
    }
    if (set_gender) {
        $('input[type="radio"][name="gender"]').each(function() {
            if ($(this).val() === set_gender) {
                $(this).prop('checked', true);
            }
        });
    }
    if (set_marital_status) {
        $('input[type="radio"][name="merital_status"]').each(function() {
            if ($(this).val() === set_marital_status) {
                $(this).prop('checked', true);
            }
        });
    }
</script>
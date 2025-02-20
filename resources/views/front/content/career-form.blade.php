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
                                                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" placeholder="Enter your DOB" pattern="\d{2}-\d{2}-\d{4}" max="">
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
                                                    <input type="email" placeholder="enter valid email address" name="email" id="email" class="form-control" value="admin@gmail.com">
                                                    <p id="verified_email" class="success-msg"></p>
                                                    <p id="error_email" class="text-danger err-msg"></p>
                                                </div>
                                                {{-- <div class="phone-cta-col">
                                                    <button type="button" class="btn btn-theme btn-cta" id="Email_Send_OTP" disabled>Send OTP</button>
                                                </div> --}}
                                                {{-- <p id="otp_message" class="font-weight-bold text-end success-msg"></p> --}}
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
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
                                    </div> --}}
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
 $(function(){
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
    alert(format);
    $('#date_of_birth').attr('max', format);
});
    
    //OTP validation
    // function validateOTP(){
    //     //Retrieve OTP values
    //     var otpValues = [];
    //     $("input[name= 'valid_otp[]']").each(function(){
    //         otpValues.push($(this).value());
    //     });

    //     // Check if all OTP fields are filled
    //     var allFilled = otpValues.every(function(value){
    //         return value !== '';
    //     });

    //     //If all OTP fields are filled, remove 'disabled' class from the button
    //     if(allFilled){
    //         var email = $('#email').val();
    //         $('#validate_otp').removeClass('disabled');
    //         var storeOTPArray = localStorage.getItem('otp');
    //         var enteredOTP = otpValues.join('');
    //         //check if entered otp matches stored otps
    //         $('#validate_otp').html('Please wait ...');
    //         if(storeOTPArray == enteredOTP){
    //             localStorage.setItem('verified_email', 1); //Saves email verification status (verified_email = 1) in localStorage
    //             localStorage.setItem('email', email); //Stores the email in localStorage
    //             $('#validate_otp').prop('disabled', false);
    //             $('#valid_otp_message').html('<span style="color: green;">OTP verified successfully. You can proceed further.</span>');
    //             localStorage.removeItem('otp');

    //             setTimeout(function(){
    //                 $('#Email_Send_OTP').remove();
    //                 $('#verified_email').text('Email verified');
    //                 $('#validate_otp').html('Validate OTP');
    //                 $('#valid_otp_message').html('');
    //             },2000);
    //         } else {
    //             $('#validate_otp').prop('disabled', true);
    //             setTimeout(function(){
    //                 $('#validate_otp').html('Validate OTP');
    //                 $('#valid_otp_message').html('<span style="color: red;">Entered OTP does not match the OTP from email.</span>');
    //             },2000);             
    //         }
    //         setTimeout(function(){
    //             $('#validate_otp').html('');
    //         },5000)
    //     } else{
    //          // If any OTP field is empty, add 'disabled' class to the button
    //          $('#validate_otp').addClass('disabled');
    //     }
    //     // Convert entered OTP values to string
    // }
    // //Attach keyup handler to each OTP input field
    // $("input[name='valid_otp[]']").keyup(function() {
    //     validateOTP(); //Call the validateOTP function on keyup event
    // });
    $(document).ready(function(){
        $('#email').keyup(function(){
            //Reset error message
            $('#error_email').text("");
            //$('#otp-input-group input').val('');
            var email = $("#email").val();
            var name = $("#name").val();
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if(email.length == ""){
                $('#error_email').text("Please enter a valid email address");
                $('#email').focus();
                //$('#Email_Send_OTP').prop('disabled', true);
                return false;
            }else if(!emailRegex.test(email)){
                $('#error_email').text("Please enter a valid email address");
                $('#email').focus();
                return false;
                //$('#Email_Send_OTP').prop('disabled',true);
            }//else{
            //     $('#Email_Send_OTP').html('Sending...');
            //     $.ajax({
            //         url: "",
            //         type: "GET",
            //         data: {name: name, email: email},
            //         success: function(response) {
            //             if(response.status == 200){
            //                 $('#Email_Send_OTP').html('Send OTP');
            //                 localStorage.setItem('otp', response.data);
            //                 $('#otp_message').html('<span style="color: green;">' + response.data + '</span>');
            //             }else if (response.status == 400){
            //                 $('#Email_Send_OTP').html('Send OTP');
            //                 $('#otp_message').html('<span style="color: red;">' + response.data + '</span>');
            //             } else if (response.status == 500){
            //                 $('#Email_Send_OTP').html('send OTP');
            //                 $('#otp_message').html('<span style="color: red;">' + response.data + '</span>');
            //             }
            //             setTimeout(function(){
            //                 $('#otp_message').html('');
            //             },5000);
            //         },
                    //error: function(xhr, status, error) {
                        //Handle error
                    //}
               //});
            //}
        });
    });

    //first step verification
    $(document).ready(function() {
        $("#first_next").click(function(event) {
            event.preventDefault(); // Prevent default action of <a> tag
            // Reset error messages
            $("#error_name").text("");
            $("#error_fname").text("");
            $("#error_date_ofb").text("");
            $("#error_phone").text("");
            $("#error_email").text("");

            var name = $("#name").val();
            var gender = $("input[name='gender']:checked").val();
            var marital_status = $("input[name='marital_status']:checked").val();
            var father_name = $("#father_name").val();
            var date_of_birth = $("#date_of_birth").val();
            var phone = $("#phone").val();
            var email = $("#email").val();
            
            if (name.length == "") {
                $("#error_name").text("Please enter your name");
                $("#name").focus();
                return false;
            } else if (father_name.length == "") {
                $("#error_fname").text("Please enter your father's name");
                $("#father_name").focus();
                return false;
            } else if (date_of_birth.length == "") {
                $("#error_date_ofb").text("Please choose your date of birth");
                $("#date_of_birth").focus();
                return false;
            } else if (phone.length != 10 || isNaN(phone)) {
                $("#error_phone").text("Please enter a valid 10-digit mobile number");
                $("#phone").focus();
                return false;
            } else if (email.length == "") {
                $("#error_email").text("Please enter your email address");
                $("#email").focus();
                return false;
            }else {
                var currentDate = new Date();
                var minDateOfBirth = new Date();
                minDateOfBirth.setFullYear(currentDate.getFullYear() - 10);
                var selectedDateOfBirth = new Date(date_of_birth);
                if (selectedDateOfBirth > minDateOfBirth) {
                    $("#error_date_ofb").text("Date of birth must be before 10 years from today");
                    $("#date_of_birth").focus();
                    return false;
                }
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(email)) {
                        $("#error_email").text("Please enter a valid email address");
                        $("#email").focus();
                        return false;
                    }
                var verifiedEmail = localStorage.getItem('verified_email');
                if (verifiedEmail == 1) {
                    console.log('next-form');
                    localStorage.setItem('name',name);
                    localStorage.setItem('fname',father_name);
                    localStorage.setItem('dob',date_of_birth);
                    localStorage.setItem('gender',gender);
                    localStorage.setItem('phone',phone);
                    localStorage.setItem('marital_status',marital_status);
                    $(this).addClass('next-form');
                    // Button Click
                    current_ff = $(this).parent().parent().parent();
                    next_ff = current_ff.next();

                    //Add Class Active
                    $(".step-list li").eq($(".tab-pannel").index(current_ff)).addClass("completed");
                    $(".step-list li").eq($(".tab-pannel").index(next_ff)).addClass("active");

                    //show the next steps
                    next_ff.show();
                    //hide the current steps with style
                    current_ff.animate({opacity: 0}, {
                    step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_ff.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_ff.css({'opacity': opacity});
                    }, duration: 500
                    });
                    setProgressBar(++current);
                }else{
                    alert('here');
                }
            }
        });
    });

    //second step verification
    $(document).ready(function(){
        $('#second_next').click(function(event){
            event.preventDefault();
            $('#error_address').text("");
            $('#error_landmark').text("");
            $('#error_pincode').text("");
            $('#error_city').text("");
            $('#error_dist').text("");
            $('#error_state').text("");
            $('#error_country').text("");

            var address = $("#address").val();
            var landmark = $('#landmark').val();
            var pincode = $('#pincode').val();
            var city = $('#city').val();
            var dist = $('#dist').val();
            var state = $('#state').val();
            var country = $('#country').val();

            if(address.length == 0) {
                $('#error_address').text("Please enter your address");
                $('#address').focus();
                return false;
            }

            //landmark is optional so we comment off
            // else if(landmark.length == 0){
            //     $('#error_landmark').text("Please enter your landmark");
            //     $('#landmark').focus();
            //     return false;
            // }

            else if(pincode.length != 6 || isNaN(pincode)){
                $('#error_pincode').text("Enter a 6-digit Pincode");
                $('#pincode').focus();
                return false;
            }
            else if(city.length == ""){
                $('#error_city').text("Please enter your city name");
                $('#city').focus();
                return false;
            }
            else if(dist.length == ""){
                $('#error_dist').text("Please enter your district name");
                $('#dist').focus();
                return false;
            }
            else if(state.length == ""){
                $('#error_state').text("Please enter your state name");
                $('#state').focus();
                return false;
            }
            else if(country.length == ""){
                $('#error_country').text("Please enter your country name");
                $('#country').focus();
                return false;
            }
            else{
                var verifiedEmail = localStorage.getItem('verified_email');
                if(verifiedEmail == 1){
                    localStorage.setItem('address', address);
                    localStorage.setItem('landmark', landmark);
                    localStorage.setItem('pincode', pincode);
                    localStorage.setItem('city', city);
                    localStorage.setItem('dist', dist);
                    localStorage.setItem('state', state);
                    localStorage.setItem('country', country);

                    //add the next-form class
                    $(this).addClass('next-form');

                    //Button click
                    var current_ff = $(this).parent().parent().parent();
                    var next_ff = current_ff.next();

                    //Add class active
                    $(".step-list li").eq($(".tab-panel").index(current_ff)).addClass("completed");
                    $(".step-list li").eq($(".tab-panel").index(next_ff)).addClass("active");

                    //show the next steps
                    next_ff.show();
                    //Hide the current steps with style
                    current_ff.animate({opacity: 0},{
                        step: function(now) {
                            //For making fieldset appear animation
                            opacity = 1 - now;

                            current_ff.css({
                                 'display' : 'none',
                                'position': 'relative'
                            });
                            next_ff.css({'opacity': opacity})  
                        },duration: 500
                    });
                    setProgressBar(++current);
                } else{
                    alert("email is not verified");
                   //localStorage.clear();
                }
            }
        });

    });

      // All Get localStorage
    // Retrieve the value of 'verified_email' from localStorage
    var verifiedEmail   = 1;
    var set_email       = localStorage.getItem('email');
    var set_name        = localStorage.getItem('name');
    var set_fname       = localStorage.getItem('fname');
    var set_dob         = localStorage.getItem('dob');
    var set_gender      = localStorage.getItem('gender');
    var set_phone       = localStorage.getItem('phone');
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
        $('input[type="radio"][name="marital_status"]').each(function() {
            if ($(this).val() === set_marital_status) {
                $(this).prop('checked', true);
            }
        });
    }

    //second step
    var set_address     = localStorage.getItem('address');
    var set_landmark    = localStorage.getItem('landmark');
    var set_pincode     = localStorage.getItem('pincode');
    var set_city        = localStorage.getItem('city');
    var set_dist        = localStorage.getItem('dist');
    var set_state       = localStorage.getItem('state');
    var set_country     = localStorage.getItem('country');
  
    if(set_address) {
        $('#address').val(set_address);
    }
    if(set_landmark) {
        $('#landmark').val(set_landmark);
    }
    if(set_pincode) {
        $('#pincode').val(set_pincode);
    }
    if(set_city) {
        $('#city').val(set_city);
    }
    if(set_dist) {
        $('#dist').val(set_dist);
    }
    if(set_state) {
        $('#state').val(set_state);
    }
    if(set_country) {
        $('#country').val(set_country);
    }
</script>
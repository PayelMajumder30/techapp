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
                        <form id="registrationFormData" action="" method="post" enctype="multipart/form-data">
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
                                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                        <option value="Assam">Assam</option>
                                                        <option value="Bihar">Bihar</option>
                                                        <option value="Chandigarh">Chandigarh</option>
                                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                                        <option value="Daman and Diu">Daman and Diu</option>
                                                        <option value="Delhi">Delhi</option>
                                                        <option value="Lakshadweep">Lakshadweep</option>
                                                        <option value="Puducherry">Puducherry</option>
                                                        <option value="Goa">Goa</option>
                                                        <option value="Gujarat">Gujarat</option>
                                                        <option value="Haryana">Haryana</option>
                                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                        <option value="Jharkhand">Jharkhand</option>
                                                        <option value="Karnataka">Karnataka</option>
                                                        <option value="Kerala">Kerala</option>
                                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                        <option value="Maharashtra">Maharashtra</option>
                                                        <option value="Manipur">Manipur</option>
                                                        <option value="Meghalaya">Meghalaya</option>
                                                        <option value="Mizoram">Mizoram</option>
                                                        <option value="Nagaland">Nagaland</option>
                                                        <option value="Odisha">Odisha</option>
                                                        <option value="Punjab">Punjab</option>
                                                        <option value="Rajasthan">Rajasthan</option>
                                                        <option value="Sikkim">Sikkim</option>
                                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                                        <option value="Telangana">Telangana</option>
                                                        <option value="Tripura">Tripura</option>
                                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                        <option value="Uttarakhand">Uttarakhand</option>
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
                                        <a href="javascript:void(0)" class="previous" id="goto_step_1">
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

                            {{-- third step --}}
                            <div class="tab-pannel" id="step3">
                                <div class="form-box">
                                    <h3>Educational Qualification</h3>
                                    <h4>10th Grade Qualification (Standard X)</h4>
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Institution/School Name <span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter your institution/school" name="x_school_name" id="x_school_name">
                                                    <p id="error_x_school_name" class="text-danger err-msg"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Affiliated Education Board <span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter your affiliated education board" name="x_board_name" id="x_board_name">
                                                    <p id="error_x_board_name" class="text-danger err-msg"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Percentage Acquired <span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter percentage acquired" name="x_percentage" id="x_percentage">
                                                <p id="error_x_percentage" class="text-danger err-msg"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Passing Year <span
                                                        class="required">*</span></label>
                                                <select class="form-control" name="x_passing_year" id="x_passing_year">
                                                    <option selected disabled>Select passing year</option>
                                                    @for ($year = 1980; $year <= 2015; $year++)
                                                    <option value="{{$year}}">{{$year}}</option>
                                                    @endfor
                                                </select>
                                                <p id="error_x_passing_year" class="text-danger err-msg"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <h4>12th Grade Qualification (Standard XII)</h4>
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Institution/School Name <span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter your institution/school" name="xii_school_name" id="xii_school_name">
                                                <p id="error_xii_school_name" class="text-danger err-msg"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Affiliated Education Board <span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter your affiliated education board" name="xii_board_name" id="xii_board_name">
                                                <p id="error_xii_board_name" class="text-danger err-msg"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Percentage Acquired <span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter percentage acquired" name="xii_percentage" id="xii_percentage">
                                                <p id="error_xii_percentage" class="text-danger err-msg"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Passing Year <span
                                                        class="required">*</span></label>
                                                <select class="form-control" name="xii_passing_year" id="xii_passing_year">
                                                    <option selected disabled>Select passing year</option>
                                                    @for ($year = 1980; $year <= date("Y"); $year++)
                                                    <option value="{{$year}}">{{$year}}</option>
                                                    @endfor
                                                </select>
                                                <p id="error_xii_passing_year" class="text-danger err-msg"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <h4>After 12th Grade / Higher Qualification </h4>
                                    <div class="row" id="12th">
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Qualification <span
                                                        class="required">*</span></label>
                                                <select class="form-control after_xii_qualification" name="after_xii_qualification[]" >
                                                    <option selected disabled>Select your qualification</option>
                                                    <option value="Dilpoma">Dilpoma</option>
                                                    <option value="UG">UG</option>
                                                    <option value="PG">PG</option>
                                                    <option value="B.Ed.">B.Ed.</option>
                                                    <option value="M.Ed.">M.Ed.</option>
                                                    <option value="Teacher's Training">Teacher's Training</option>
                                                    <option value="Ph.D">Ph.D</option>
                                                </select>
                                               
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Institution Name <span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control after_xii_institute_name"
                                                    placeholder="Enter your institution name" name="after_xii_institute_name[]" >
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Affiliated Board/University <span class="required">*</span></label>
                                                <input type="text" class="form-control after_xii_institute_board"
                                                    placeholder="Enter affiliated board/university name" name="after_xii_institute_board[]" >
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Stream/Discipline Honours/Area of
                                                    Specialisation <span class="required">*</span></label>
                                                <input type="text" class="form-control after_xii_institute_stream"
                                                    placeholder="Enter your area of specialisation" name="after_xii_institute_stream[]" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Percentage Acquired <span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control after_xii_institute_percentage"
                                                    placeholder="Enter percentage acquired" name="after_xii_institute_percentage[]" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Passing Year <span
                                                        class="required">*</span></label>
                                                <select class="form-control after_xii_institute_passing_year" name="after_xii_institute_passing_year[]" >
                                                    <option selected disabled>Select passing year</option>
                                                    @for ($year = 1980; $year <= date("Y"); $year++)
                                                    <option value="{{$year}}">{{$year}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="add-cta-row">
                                        <button type="button" class="btn btn-theme btn-add" id="add_other_Qualification">
                                            <svg height="512pt" viewBox="0 0 512 512" width="512pt"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="m256 512c-141.164062 0-256-114.835938-256-256s114.835938-256 256-256 256 114.835938 256 256-114.835938 256-256 256zm0-480c-123.519531 0-224 100.480469-224 224s100.480469 224 224 224 224-100.480469 224-224-100.480469-224-224-224zm0 0" />
                                                <path
                                                    d="m368 272h-224c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h224c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0" />
                                                <path
                                                    d="m256 384c-8.832031 0-16-7.167969-16-16v-224c0-8.832031 7.167969-16 16-16s16 7.167969 16 16v224c0 8.832031-7.167969 16-16 16zm0 0" />
                                            </svg>
                                            Add Another
                                        </button>
                                    </div>
                                </div>
                                <div class="step-form-cta-row">
                                    <div class="step-prev">
                                        <a href="javascript:void(0)" class="previous" id="goto_step_2">
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
                                   <div class="step-save">
                                        <div id="education_alert_container"></div>
                                    </div> 
                                    <div class="step-next">
                                        <a href="javascript:void(0)" id="third_next" class="">
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

                            {{-- Fourth step --}}
                            <div class="tab-pannel" id="step4">
                                <div class="form-box">
                                    <h3>Work Experience</h3>
                                    <div class="row" id="work_experience_div">
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Experience Type <span class="required">*</span></label>
                                                <input type="text" class="form-control experience-type" placeholder="Enter experience type" name="experience_type[]" required value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Experience Duration <span class="required">*</span></label>
                                                <input type="text" class="form-control experience-duration" placeholder="Enter experience duration" name="experience_duration[]" required value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="add-cta-row">
                                        <button type="button" class="btn btn-theme btn-add" id="add_experience">
                                            <svg height="512pt" viewBox="0 0 512 512" width="512pt"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="m256 512c-141.164062 0-256-114.835938-256-256s114.835938-256 256-256 256 114.835938 256 256-114.835938 256-256 256zm0-480c-123.519531 0-224 100.480469-224 224s100.480469 224 224 224 224-100.480469 224-224-100.480469-224-224-224zm0 0" />
                                                <path
                                                    d="m368 272h-224c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h224c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0" />
                                                <path
                                                    d="m256 384c-8.832031 0-16-7.167969-16-16v-224c0-8.832031 7.167969-16 16-16s16 7.167969 16 16v224c0 8.832031-7.167969 16-16 16zm0 0" />
                                            </svg>
                                            Add Another
                                        </button>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Present Salary (P.A.) (If you are a
                                                    fresher, then put 0.0)<span class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter your present salary" name="present_salary" id="present_salary">
                                                <p id="error_present_salary" class="text-danger err-msg"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Expected Salary (P.A.) <span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter your expected salary" name="expected_salary" id="expected_salary">
                                                <p id="error_expected_salary" class="text-danger err-msg"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">If selected, time required to join <span class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter required time" name="join_time" id="join_time">
                                                <p id="error_join_time" class="text-danger err-msg"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Do you know anyone at TIGS?</label>
                                                <div class="gender-options">
                                                    <label for="knowanyone1" class="custom-radio">
                                                        Yes
                                                        <input type="radio" name="knowanyone" id="knowanyone1"
                                                            value="Yes">
                                                        <span class="check-box">
                                                            <span class="checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <label for="knowanyone2" class="custom-radio">
                                                        No
                                                        <input type="radio" name="knowanyone" id="knowanyone2"
                                                            value="No" checked>
                                                        <span class="check-box">
                                                            <span class="checkmark"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" id="mentionReferrence">
                                            <div class="form-group">
                                                <label class="form-label">Please mention the Name, Department,
                                                    Designation</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Mention referrence details" name="referrence_details" id="referrence_details">
                                                    <p id="error_referrence_details" class="text-danger err-msg"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-form-cta-row">
                                    <div class="step-prev">
                                        <a href="javascript:void(0)" class="previous" id="goto_step_3">
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
                                    <div class="step-save">
                                        <div id="experience_alert_container"></div>
                                    </div>
                                    <div class="step-next">
                                        <a href="javascript:void(0)" id="fourth_next" class="">
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

                            {{-- {{Fifth step}} --}}
                            <div class="tab-pannel" id="step5">
                                <div class="form-box">
                                    <h3>Apply For</h3>
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Post applied for: <span class="required">*</span></label>
                                                <select class="form-control" name="applied_post" id="applied_post">
                                                    <option selected hidden>Select applied post</option>
                                                    @foreach ($post as $item)
                                                        <option value="{{$item->title}}">{{$item->title}}</option>
                                                    @endforeach
                                                </select>
                                                <p id="error_applied_post" class="text-danger err-msg"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Unit name: <span class="required">*</span></label>
                                                <select class="form-control" name="unit_name" id="unit_name">
                                                    <option selected hidden>Select unit</option>
                                                    @foreach ($unit as $item)
                                                        <option value="{{$item->title}}">{{$item->title}}</option>
                                                    @endforeach
                                                </select>
                                                <p id="error_unit_name" class="text-danger err-msg"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Subject: <span
                                                        class="required">*</span></label>
                                                    <select class="form-control" name="subject" id="subject">
                                                        <option selected hidden>Select subject</option>
                                                        @foreach ($subject as $item)
                                                            <option value="{{$item->title}}">{{$item->title}}</option>
                                                        @endforeach
                                                    </select>
                                                    <p id="error_subject" class="text-danger err-msg"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-form-cta-row">
                                    <div class="step-prev">
                                        <a href="javascript:void(0)" class="previous" id="goto_step_4">
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
                                        <a href="javascript:void(0)" id="fifth_next" class="">
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
                        </form>

                        <!-- progress bar -->
                        <div class="step-wizard">
                            <div class="connecting-line">
                                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0"
                                    aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar" id="step_progress" style="width: 0%"></div>
                                </div>
                            </div>
                            <ul class="nav step-list" role="tablist">
                                <li role="presentation" class="steps active">
                                    <a href="#step1" class="">
                                        <span class="round-tab">
                                            <img src="{{asset('frontend-assets/assets/icons/verified-1.png')}}" alt="">
                                            <svg width="513" height="512" viewBox="0 0 513 512" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M260.58 32C198.772 32 148.58 82.192 148.58 144C148.58 205.808 198.772 256 260.58 256C322.388 256 372.58 205.808 372.58 144C372.58 82.192 322.388 32 260.58 32ZM260.58 64C304.74 64 340.58 99.84 340.58 144C340.58 188.16 304.74 224 260.58 224C216.42 224 180.58 188.16 180.58 144C180.58 99.84 216.42 64 260.58 64Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M68.5801 448H260.58C269.412 448 276.58 455.168 276.58 464C276.58 472.832 269.412 480 260.58 480H52.5801C43.7481 480 36.5801 472.832 36.5801 464C36.5801 464 36.5801 450.8 36.5801 432C36.5801 352.464 101.044 288 180.58 288H256.5C265.332 288 272.5 295.168 272.5 304C272.5 312.832 265.332 320 256.5 320H180.58C118.724 320 68.5801 370.144 68.5801 432V448Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M400.5 292.672C347.524 292.672 304.5 335.68 304.5 388.672C304.5 441.648 347.524 484.672 400.5 484.672C453.476 484.672 496.5 441.648 496.5 388.672C496.5 335.68 453.476 292.672 400.5 292.672ZM400.5 324.672C435.828 324.672 464.5 353.344 464.5 388.672C464.5 423.984 435.828 452.672 400.5 452.672C365.172 452.672 336.5 423.984 336.5 388.672C336.5 353.344 365.172 324.672 400.5 324.672Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M416.5 424.112V391.44C416.5 382.608 409.332 375.44 400.5 375.44C391.668 375.44 384.5 382.608 384.5 391.44V424.112C384.5 432.944 391.668 440.112 400.5 440.112C409.332 440.112 416.5 432.944 416.5 424.112Z"
                                                    fill="white" />
                                                <path
                                                    d="M400.5 371.296C409.337 371.296 416.5 364.132 416.5 355.296C416.5 346.459 409.337 339.296 400.5 339.296C391.663 339.296 384.5 346.459 384.5 355.296C384.5 364.132 391.663 371.296 400.5 371.296Z"
                                                    fill="white" />
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                                <li role="presentation" class="steps">
                                    <a href="#step2" class="">
                                        <span class="round-tab">
                                            <img src="{{asset('frontend-assets/assets/icons/verified-1.png')}}" alt="">
                                            <svg width="495" height="496" viewBox="0 0 495 496" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M220.593 440.097C220.593 452.036 230.307 461.75 242.246 461.75H278.742C290.681 461.75 300.395 452.036 300.395 440.097C300.395 428.158 290.681 418.444 278.742 418.444H242.246C230.307 418.443 220.593 428.157 220.593 440.097ZM284.396 440.097C284.396 443.214 281.86 445.75 278.743 445.75H242.247C239.13 445.75 236.594 443.214 236.594 440.097C236.594 436.98 239.13 434.444 242.247 434.444H278.743C281.859 434.443 284.396 436.979 284.396 440.097ZM108.533 292.606C114.51 286.382 118.195 277.943 118.195 268.653C118.195 249.566 102.667 234.038 83.5801 234.038C64.4931 234.038 48.9651 249.566 48.9651 268.653C48.9651 277.942 52.6501 286.382 58.6261 292.605C39.5511 301.187 25.6471 319.351 23.2891 341.393C23.0471 343.65 23.7751 345.904 25.2931 347.592C26.8111 349.28 28.9741 350.244 31.2431 350.244L135.917 350.243C138.187 350.243 140.35 349.278 141.867 347.591C143.385 345.903 144.113 343.649 143.871 341.392C141.511 319.351 127.607 301.188 108.533 292.606ZM83.5791 250.038C93.8441 250.038 102.194 258.389 102.194 268.653C102.194 278.917 93.8431 287.268 83.5791 287.268C73.3151 287.268 64.9641 278.917 64.9641 268.653C64.9641 258.389 73.3141 250.038 83.5791 250.038ZM41.0551 334.245C46.8401 316.085 63.7901 303.268 83.5781 303.268C103.366 303.268 120.316 316.084 126.101 334.244L41.0551 334.245ZM228.33 292.142C228.33 296.56 224.748 300.142 220.33 300.142H164.377C159.959 300.142 156.377 296.56 156.377 292.142C156.377 287.724 159.959 284.142 164.377 284.142H220.33C224.748 284.142 228.33 287.724 228.33 292.142ZM228.33 327.727C228.33 332.145 224.748 335.727 220.33 335.727H164.377C159.959 335.727 156.377 332.145 156.377 327.727C156.377 323.309 159.959 319.727 164.377 319.727H220.33C224.748 319.727 228.33 323.309 228.33 327.727ZM228.33 256.557C228.33 260.975 224.748 264.557 220.33 264.557H164.377C159.959 264.557 156.377 260.975 156.377 256.557C156.377 252.139 159.959 248.557 164.377 248.557H220.33C224.748 248.557 228.33 252.139 228.33 256.557ZM477.781 81.512H399.72V28.784C399.72 12.913 386.808 0 370.936 0H150.053C134.181 0 121.269 12.913 121.269 28.784V195.685H17.8151C8.49606 195.685 0.914062 203.267 0.914062 212.586V371.697C0.914062 381.016 8.49606 388.598 17.8151 388.598H121.268V467.215C121.268 483.087 134.18 495.999 150.052 495.999H370.935C386.807 495.999 399.719 483.087 399.719 467.215V298.307C403.529 299.423 407.369 300.448 411.24 301.372C414.496 302.149 417.754 302.527 420.962 302.527C434.605 302.526 447.322 295.693 454.989 283.693L471.718 257.51C475.171 252.106 475.995 245.536 473.979 239.486C471.963 233.436 467.364 228.674 461.36 226.422L411.34 207.655C407.481 206.206 403.518 205.9 399.72 206.691V186.337H477.782C486.772 186.337 494.087 179.023 494.087 170.032V97.815C494.086 88.826 486.771 81.512 477.781 81.512ZM420.181 136.905L375.46 97.512H464.901L420.181 136.905ZM394.819 135.887L362.274 161.758V107.219L394.819 135.887ZM407.017 146.631L414.893 153.569C416.405 154.901 418.292 155.566 420.181 155.566C422.07 155.566 423.957 154.9 425.469 153.569L433.344 146.631L463.166 170.338H377.193L407.017 146.631ZM445.541 135.887L478.086 107.219V161.758L445.541 135.887ZM323.406 16L318.569 30.887H202.42L197.583 16H323.406ZM16.9141 371.697V212.586C16.9141 212.106 17.3351 211.685 17.8151 211.685H240.721C241.2 211.685 241.621 212.106 241.621 212.586V371.697C241.621 372.177 241.2 372.598 240.721 372.598H17.8151C17.3351 372.599 16.9141 372.178 16.9141 371.697ZM405.719 222.635L455.739 241.403C457.742 242.154 458.516 243.694 458.801 244.545C459.084 245.397 459.388 247.094 458.237 248.897L441.508 275.079C435.672 284.213 425.496 288.324 414.955 285.81C374.64 276.189 337.626 255.23 307.853 225.138C277.822 195.427 256.863 158.413 247.242 118.098C244.726 107.556 248.839 97.381 257.973 91.545L284.156 74.817C285.143 74.186 286.099 73.992 286.902 73.992C287.564 73.992 288.122 74.124 288.506 74.253C289.358 74.537 290.898 75.311 291.649 77.315L310.417 127.334C311.031 128.97 310.875 130.416 309.925 131.883L299.015 148.729C294.492 155.714 294.444 164.423 298.892 171.457C306.824 183.999 316.206 195.709 326.78 206.265C337.341 216.844 349.055 226.23 361.599 234.163C368.633 238.611 377.342 238.564 384.327 234.039L401.171 223.13C402.637 222.176 404.081 222.019 405.719 222.635ZM383.72 215.367L375.628 220.608C373.869 221.748 371.923 221.759 370.149 220.638C358.608 213.339 347.826 204.7 338.103 194.959C338.099 194.956 338.096 194.952 338.092 194.949C328.354 185.228 319.714 174.446 312.414 162.903C311.293 161.13 311.303 159.184 312.443 157.424L323.353 140.578C327.078 134.826 327.803 128.126 325.396 121.711L306.628 71.693C304.375 65.689 299.613 61.089 293.564 59.073C287.511 57.056 280.943 57.881 275.54 61.334L249.357 78.062C234.536 87.532 227.596 104.705 231.678 121.812C241.992 165.036 264.443 204.699 296.538 236.452C321.467 261.649 351.215 280.884 383.719 292.993V467.217C383.719 474.266 377.984 480.001 370.935 480.001H150.053C143.004 480.001 137.269 474.266 137.269 467.217V388.6H240.722C250.041 388.6 257.622 381.018 257.622 371.699V212.586C257.622 203.267 250.041 195.685 240.722 195.685H137.269V28.784C137.269 21.735 143.004 16 150.053 16H180.76L189 41.359C190.071 44.655 193.143 46.887 196.608 46.887H324.381C327.847 46.887 330.918 44.656 331.989 41.359L340.229 16H370.936C377.985 16 383.72 21.735 383.72 28.784V81.512H362.579C353.589 81.512 346.274 88.826 346.274 97.817V170.034C346.274 179.024 353.588 186.339 362.579 186.339H383.72V215.367Z"
                                                    fill="white" />
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                                <li role="presentation" class="steps">
                                    <a href="#step3" class="">
                                        <span class="round-tab">
                                            <img src="{{asset('frontend-assets/assets/icons/verified-1.png')}}" alt="">
                                            <svg width="513" height="512" viewBox="0 0 513 512" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M432.5 456V56C432.471 49.6439 429.933 43.5565 425.438 39.062C420.944 34.5675 414.856 32.0295 408.5 32H328.5C326.378 32 324.343 32.8429 322.843 34.3431C321.343 35.8434 320.5 37.8783 320.5 40V97.6016C320.518 99.0422 320.922 100.452 321.671 101.683C322.419 102.914 323.483 103.922 324.754 104.602C326.024 105.282 327.453 105.608 328.893 105.548C330.332 105.487 331.729 105.042 332.938 104.258L352.5 91.2149L372.062 104.258C373.271 105.042 374.668 105.488 376.108 105.548C377.547 105.609 378.977 105.282 380.247 104.602C381.517 103.923 382.582 102.914 383.33 101.683C384.078 100.452 384.482 99.0421 384.5 97.6014V48H408.5C410.616 48.02 412.639 48.8693 414.135 50.3652C415.631 51.8612 416.48 53.8845 416.5 56V456C416.497 458.121 415.654 460.154 414.154 461.654C412.654 463.154 410.621 463.997 408.5 464H104.5C102.379 463.997 100.346 463.154 98.8462 461.654C97.3465 460.154 96.5028 458.121 96.5 456V56C96.5028 53.8791 97.3465 51.8459 98.8462 50.3462C100.346 48.8465 102.379 48.0028 104.5 48H288.5C290.622 48 292.657 47.1571 294.157 45.6569C295.657 44.1566 296.5 42.1217 296.5 40C296.5 37.8783 295.657 35.8434 294.157 34.3431C292.657 32.8429 290.622 32 288.5 32H104.5C98.1369 32.0069 92.0365 34.5377 87.5371 39.0371C83.0377 43.5365 80.5069 49.6369 80.5 56V456C80.5069 462.363 83.0377 468.464 87.5371 472.963C92.0365 477.462 98.1369 479.993 104.5 480H408.5C414.863 479.993 420.964 477.462 425.463 472.963C429.962 468.464 432.493 462.363 432.5 456ZM368.5 82.6523L356.938 74.9453C350.39 70.3036 342.905 79.1582 336.5 82.6521L336.5 48H368.5V82.6523Z"
                                                    fill="white" />
                                                <path
                                                    d="M368.573 189.46C368.189 188.408 367.598 187.443 366.835 186.624C366.071 185.804 365.151 185.146 364.128 184.689L259.75 138.293C258.727 137.838 257.62 137.603 256.501 137.603C255.381 137.602 254.274 137.836 253.25 138.289L148.621 184.762C147.224 185.406 146.04 186.438 145.211 187.734C144.381 189.03 143.94 190.536 143.939 192.075C143.939 193.614 144.379 195.121 145.209 196.417C146.038 197.714 147.221 198.745 148.618 199.391L174.867 211.029V261.84C174.867 263.243 175.237 264.622 175.938 265.838C176.64 267.053 177.648 268.063 178.863 268.766C202.456 282.415 229.23 289.602 256.486 289.602C283.743 289.602 310.517 282.415 334.109 268.766C335.324 268.063 336.333 267.053 337.035 265.838C337.736 264.622 338.105 263.243 338.106 261.84V211.038L353.102 204.371V277.336C353.102 279.458 353.945 281.493 355.445 282.993C356.945 284.493 358.98 285.336 361.102 285.336C363.223 285.336 365.258 284.493 366.759 282.993C368.259 281.493 369.102 279.458 369.102 277.336V192.078C368.98 191.195 368.804 190.321 368.573 189.46ZM256.492 229.805L226.137 216.363C224.205 215.554 222.032 215.534 220.085 216.308C218.139 217.083 216.574 218.59 215.726 220.505C214.878 222.421 214.815 224.593 215.551 226.554C216.287 228.516 217.762 230.111 219.661 230.996C221.001 231.347 256.018 247.806 256.5 246.559C257.621 246.559 258.73 246.323 259.754 245.867L322.105 218.15V257.137C301.865 267.765 279.347 273.317 256.486 273.317C233.626 273.317 211.107 267.765 190.867 257.137V206.126C190.93 204.531 190.513 202.955 189.67 201.601C188.828 200.246 187.598 199.176 186.141 198.527L171.605 192.082L256.5 154.355L341.328 192.062L256.492 229.805Z"
                                                    fill="white" />
                                                <path
                                                    d="M384.5 328.008H234.141C232.046 328.049 230.051 328.91 228.584 330.406C227.117 331.902 226.295 333.913 226.295 336.008C226.295 338.103 227.117 340.115 228.584 341.611C230.051 343.107 232.047 343.967 234.141 344.008H384.5C386.594 343.966 388.588 343.105 390.054 341.609C391.52 340.113 392.342 338.103 392.342 336.008C392.342 333.914 391.52 331.903 390.054 330.407C388.588 328.911 386.594 328.05 384.5 328.008Z"
                                                    fill="white" />
                                                <path
                                                    d="M128.5 344.008H194.141C196.235 343.967 198.23 343.106 199.697 341.61C201.164 340.114 201.986 338.103 201.986 336.008C201.986 333.913 201.164 331.901 199.697 330.405C198.23 328.91 196.235 328.049 194.14 328.008H128.5C126.405 328.049 124.41 328.91 122.943 330.406C121.476 331.901 120.654 333.913 120.654 336.008C120.654 338.103 121.476 340.115 122.943 341.611C124.41 343.106 126.405 343.967 128.5 344.008Z"
                                                    fill="white" />
                                                <path
                                                    d="M384.5 376H276.5C274.406 376.042 272.412 376.903 270.946 378.399C269.48 379.895 268.659 381.906 268.659 384C268.659 386.095 269.48 388.106 270.946 389.601C272.412 391.097 274.407 391.958 276.501 392H384.5C386.594 391.958 388.588 391.097 390.054 389.601C391.52 388.105 392.342 386.094 392.342 384C392.342 381.906 391.52 379.895 390.054 378.399C388.588 376.903 386.594 376.042 384.5 376Z"
                                                    fill="white" />
                                                <path
                                                    d="M128.5 392H236.5C238.594 391.958 240.588 391.097 242.054 389.601C243.52 388.105 244.341 386.094 244.341 384C244.341 381.905 243.52 379.894 242.054 378.399C240.587 376.903 238.593 376.042 236.499 376H128.5C126.406 376.042 124.412 376.903 122.946 378.399C121.479 379.895 120.658 381.906 120.658 384C120.658 386.094 121.479 388.105 122.946 389.601C124.412 391.097 126.406 391.958 128.5 392Z"
                                                    fill="white" />
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                                <li role="presentation" class="steps">
                                    <a href="#step4" class="">
                                        <span class="round-tab">
                                            <img src="{{asset('frontend-assets/assets/icons/verified-1.png')}}" alt="">
                                            <svg width="493" height="404" viewBox="0 0 493 404" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M197.705 240.943C201.989 240.943 205.462 237.47 205.462 233.185C205.462 228.901 201.989 225.428 197.705 225.428C193.42 225.428 189.947 228.901 189.947 233.185C189.947 237.47 193.42 240.943 197.705 240.943Z"
                                                    fill="white" />
                                                <path
                                                    d="M490.476 199.44L427.174 136.138C425.933 134.897 424.149 134.121 422.364 134.121H300.027C287.77 134.121 277.686 144.128 277.686 156.463V381.122C277.686 393.457 287.693 403.464 300.027 403.464H470.151C482.408 403.464 492.493 393.457 492.493 381.122V204.25C492.493 202.388 491.795 200.681 490.476 199.44ZM429.113 157.239L469.298 197.423H437.879C433.07 197.423 429.113 193.544 429.113 188.657V157.239ZM470.151 389.811H300.027C295.218 389.811 291.261 385.932 291.261 381.045V156.385C291.261 151.576 295.14 147.619 300.027 147.619H415.538V188.657C415.538 200.991 425.545 210.999 437.879 210.999H478.917V381.045C478.917 385.854 474.961 389.811 470.151 389.811Z"
                                                    fill="white" />
                                                <path
                                                    d="M323.3 186.485H385.051C388.774 186.485 391.877 183.459 391.877 179.658C391.877 175.857 388.852 172.832 385.051 172.832H323.3C319.577 172.832 316.474 175.857 316.474 179.658C316.474 183.459 319.577 186.485 323.3 186.485Z"
                                                    fill="white" />
                                                <path
                                                    d="M323.3 222.092H385.051C388.774 222.092 391.877 219.067 391.877 215.265C391.877 211.464 388.852 208.439 385.051 208.439H323.3C319.577 208.439 316.474 211.464 316.474 215.265C316.474 219.067 319.577 222.092 323.3 222.092Z"
                                                    fill="white" />
                                                <path
                                                    d="M446.258 244.124H323.3C319.577 244.124 316.474 247.149 316.474 250.95C316.474 254.751 319.499 257.777 323.3 257.777H446.258C449.982 257.777 453.085 254.751 453.085 250.95C453.085 247.149 449.982 244.124 446.258 244.124Z"
                                                    fill="white" />
                                                <path
                                                    d="M446.258 279.731H323.3C319.577 279.731 316.474 282.756 316.474 286.558C316.474 290.359 319.499 293.384 323.3 293.384H446.258C449.982 293.384 453.085 290.359 453.085 286.558C453.085 282.756 449.982 279.731 446.258 279.731Z"
                                                    fill="white" />
                                                <path
                                                    d="M446.258 315.338H323.3C319.577 315.338 316.474 318.364 316.474 322.165C316.474 325.966 319.499 328.991 323.3 328.991H446.258C449.982 328.991 453.085 325.966 453.085 322.165C453.085 318.364 449.982 315.338 446.258 315.338Z"
                                                    fill="white" />
                                                <path
                                                    d="M446.258 351.023H323.3C319.577 351.023 316.474 354.048 316.474 357.85C316.474 361.651 319.499 364.676 323.3 364.676H446.258C449.982 364.676 453.085 361.651 453.085 357.85C453.085 354.048 449.982 351.023 446.258 351.023Z"
                                                    fill="white" />
                                                <path
                                                    d="M261.239 338.456H46.8201C33.477 338.456 22.5388 327.595 22.5388 314.174V182.684L167.761 231.013V256.458C167.761 264.448 174.277 271.042 182.345 271.042H213.065C221.055 271.042 227.649 264.526 227.649 256.458V231.013L263.489 219.067C267.058 217.903 268.997 214.024 267.756 210.456C266.592 206.887 262.713 204.948 259.145 206.189L227.572 216.662V209.835C227.572 201.845 221.055 195.251 212.987 195.251H182.267C174.277 195.251 167.683 201.767 167.683 209.835V216.662L62.0249 181.52L17.8843 166.858L14.0831 165.617V116.279C14.0831 94.3248 31.9255 76.4824 53.8794 76.4824H341.53C363.484 76.4824 381.327 94.3248 381.327 116.279V117.675C381.327 121.399 384.352 124.502 388.153 124.502C391.955 124.502 394.98 121.476 394.98 117.675V116.279C394.98 86.8775 371.087 62.9066 341.608 62.9066H286.684V38.4703C286.684 17.6024 269.695 0.613281 248.827 0.613281H146.582C125.715 0.613281 108.726 17.6024 108.726 38.4703V62.9066H53.8794C24.4782 62.9066 0.507324 86.8 0.507324 116.279V170.504C0.507324 173.452 2.36914 176.012 5.16187 176.943L8.96308 178.184V314.252C8.96308 335.12 25.9522 352.109 46.8201 352.109H261.239C264.963 352.109 268.066 349.084 268.066 345.282C268.066 341.481 265.041 338.456 261.239 338.456ZM242.001 62.9066H153.409V45.2969H242.001V62.9066ZM122.379 38.4703C122.379 25.1272 133.239 14.189 146.66 14.189H248.827C262.17 14.189 273.109 25.0496 273.109 38.4703V62.9066H255.654V38.4703C255.654 34.7466 252.629 31.6436 248.827 31.6436H146.582C142.859 31.6436 139.756 34.669 139.756 38.4703V62.9066H122.379V38.4703ZM181.336 209.913C181.336 209.37 181.802 208.904 182.345 208.904H213.065C213.608 208.904 214.073 209.37 214.073 209.913V226.126V256.458C214.073 257.001 213.608 257.467 213.065 257.467H182.345C181.802 257.467 181.336 257.001 181.336 256.458V226.126V209.913Z"
                                                    fill="white" />
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                                <li role="presentation" class="steps">
                                    <a href="#step5" class="">
                                        <span class="round-tab">
                                            <img src="{{asset('frontend-assets/assets/icons/verified-1.png')}}" alt="">
                                            <svg width="513" height="512" viewBox="0 0 513 512" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M341.278 40.902H210.674C206.469 40.902 203.062 44.309 203.062 48.514C203.062 52.719 206.47 56.126 210.674 56.126H341.277C345.482 56.126 348.89 52.719 348.89 48.514C348.89 44.309 345.482 40.902 341.278 40.902Z"
                                                    fill="white" />
                                                <path
                                                    d="M268.834 73.3411H210.673C206.468 73.3411 203.061 76.7491 203.061 80.9531C203.061 85.1581 206.469 88.5651 210.673 88.5651H268.834C273.039 88.5651 276.446 85.1581 276.446 80.9531C276.446 76.7481 273.038 73.3411 268.834 73.3411Z"
                                                    fill="white" />
                                                <path
                                                    d="M479.634 74.669C475.43 74.669 472.022 78.076 472.022 82.281C472.022 86.485 475.429 89.893 479.634 89.893C487.123 89.893 493.215 95.985 493.215 103.474V319.757H437.661V89.892H450.347C454.551 89.892 457.959 86.485 457.959 82.28C457.959 78.076 454.552 74.668 450.347 74.668H437.661V22.871C437.661 10.26 427.401 0 414.79 0H96.181C83.57 0 73.31 10.26 73.31 22.871V74.669H33.366C17.483 74.669 4.56104 87.591 4.56104 103.474V327.369V397.512C4.56104 413.395 17.483 426.317 33.366 426.317H80.244C84.448 426.317 87.856 422.91 87.856 418.705C87.856 414.501 84.449 411.093 80.244 411.093H33.366C25.877 411.093 19.785 405.001 19.785 397.512V334.98H80.921H430.048H493.214V397.512C493.214 405.001 487.122 411.093 479.633 411.093H311.277H201.723H116.105C111.901 411.093 108.493 414.5 108.493 418.705C108.493 422.909 111.9 426.317 116.105 426.317H194.111V466.653C173.609 467.019 157.039 483.8 157.039 504.388C157.039 508.592 160.446 512 164.651 512H348.349C352.553 512 355.961 508.593 355.961 504.388C355.961 483.8 339.391 467.018 318.889 466.653V426.317H479.634C495.517 426.317 508.439 413.395 508.439 397.512V327.369V103.474C508.438 87.591 495.516 74.669 479.634 74.669ZM73.31 319.757H19.785V103.474C19.785 95.985 25.877 89.893 33.366 89.893H73.31V319.757ZM422.437 111.207H163.129C158.925 111.207 155.517 114.614 155.517 118.819C155.517 123.024 158.924 126.431 163.129 126.431H422.437V319.757H88.533V126.431H123.547C127.751 126.431 131.159 123.024 131.159 118.819C131.159 114.614 127.752 111.207 123.547 111.207H88.533V22.871C88.533 18.654 91.963 15.224 96.18 15.224H414.79C419.007 15.224 422.437 18.654 422.437 22.871V111.207ZM209.334 426.316H303.665V466.635H209.334V426.316ZM339.414 496.776H173.586C176.714 488.087 185.039 481.859 194.792 481.859H201.723H311.277H318.208C327.961 481.859 336.286 488.087 339.414 496.776Z"
                                                    fill="white" />
                                                <path
                                                    d="M260.582 350.032C247.898 350.032 237.578 360.352 237.578 373.037C237.578 385.721 247.898 396.041 260.582 396.041C273.268 396.041 283.587 385.722 283.587 373.037C283.587 360.352 273.267 350.032 260.582 350.032ZM260.582 380.817C256.293 380.818 252.802 377.327 252.802 373.037C252.802 368.746 256.293 365.256 260.582 365.256C264.873 365.256 268.363 368.747 268.363 373.037C268.363 377.327 264.872 380.817 260.582 380.817Z"
                                                    fill="white" />
                                                <path
                                                    d="M171.865 78.731L146.811 35.336C145.451 32.981 142.939 31.53 140.219 31.53C137.499 31.53 134.987 32.981 133.627 35.336L108.573 78.731C107.213 81.086 107.213 83.988 108.573 86.343C109.933 88.698 112.445 90.149 115.165 90.149H165.274C167.993 90.149 170.506 88.698 171.865 86.343C173.225 83.988 173.225 81.086 171.865 78.731ZM128.348 74.926L140.219 54.366L152.09 74.926H128.348Z"
                                                    fill="white" />
                                                <path
                                                    d="M400.006 154.498H289.767C285.563 154.498 282.155 157.905 282.155 162.11C282.155 166.314 285.562 169.722 289.767 169.722H400.006C404.21 169.722 407.618 166.315 407.618 162.11C407.618 157.905 404.21 154.498 400.006 154.498Z"
                                                    fill="white" />
                                                <path
                                                    d="M400.006 187.975H289.767C285.563 187.975 282.155 191.382 282.155 195.587C282.155 199.792 285.562 203.199 289.767 203.199H400.006C404.21 203.199 407.618 199.792 407.618 195.587C407.618 191.382 404.21 187.975 400.006 187.975Z"
                                                    fill="white" />
                                                <path
                                                    d="M400.006 221.452H289.767C285.563 221.452 282.155 224.859 282.155 229.064C282.155 233.268 285.562 236.676 289.767 236.676H400.006C404.21 236.676 407.618 233.269 407.618 229.064C407.618 224.859 404.21 221.452 400.006 221.452Z"
                                                    fill="white" />
                                                <path
                                                    d="M400.006 254.929H289.767C285.563 254.929 282.155 258.336 282.155 262.541C282.155 266.745 285.562 270.153 289.767 270.153H400.006C404.21 270.153 407.618 266.746 407.618 262.541C407.618 258.336 404.21 254.929 400.006 254.929Z"
                                                    fill="white" />
                                                <path
                                                    d="M341.277 288.406H289.767C285.563 288.406 282.155 291.813 282.155 296.018C282.155 300.222 285.562 303.63 289.767 303.63H341.277C345.481 303.63 348.889 300.223 348.889 296.018C348.889 291.813 345.482 288.406 341.277 288.406Z"
                                                    fill="white" />
                                                <path
                                                    d="M255.485 148.085H115.164C110.96 148.085 107.552 151.492 107.552 155.697V245.448V296.018C107.552 300.222 110.959 303.63 115.164 303.63H255.485C259.689 303.63 263.097 300.223 263.097 296.018V253.012V155.697C263.097 151.492 259.689 148.085 255.485 148.085ZM122.777 163.309H247.873V242.899C247.021 242.753 246.169 242.625 245.318 242.53C232.051 241.043 224.423 246.352 218.291 250.616C213.688 253.816 209.713 256.58 203.055 257.12C192.285 258.004 185.38 252.278 176.633 245.042C166.896 236.989 155.852 227.871 138.298 228.928C133.034 229.248 127.846 230.458 122.777 232.533V163.309ZM247.874 288.406H122.776V249.539C128.176 246.278 133.692 244.46 139.221 244.124C150.784 243.419 158.267 249.608 166.93 256.773C176.503 264.691 187.346 273.658 204.286 272.294C215.034 271.422 221.658 266.816 226.982 263.116C232.442 259.32 236.054 256.815 243.626 257.659C245.033 257.817 246.453 258.081 247.874 258.45V288.406Z"
                                                    fill="white" />
                                                <path
                                                    d="M205.407 180.312C192.565 180.312 182.118 190.759 182.118 203.601C182.118 216.442 192.565 226.89 205.407 226.89C218.249 226.89 228.696 216.443 228.696 203.601C228.696 190.759 218.249 180.312 205.407 180.312ZM205.407 211.667C200.96 211.667 197.341 208.048 197.341 203.601C197.341 199.153 200.96 195.535 205.407 195.535C209.854 195.535 213.473 199.154 213.473 203.601C213.473 208.048 209.854 211.667 205.407 211.667Z"
                                                    fill="white" />
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                                <li role="presentation" class="steps">
                                    <a href="#step6" class="">
                                        <span class="round-tab">
                                            <svg width="513" height="512" viewBox="0 0 513 512" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_11_739)">
                                                    <path
                                                        d="M196.767 221.867H299.167C313.305 221.867 324.767 210.405 324.767 196.267V170.667C324.73 146.758 308.166 126.051 284.848 120.764C304.287 100.576 303.884 68.511 283.942 48.819C264.001 29.127 231.933 29.127 211.991 48.819C192.049 68.511 191.646 100.576 211.085 120.764C187.767 126.051 171.203 146.758 171.166 170.667V196.267C171.167 210.405 182.628 221.867 196.767 221.867ZM260.767 136.533L253.642 153.6H242.301L235.167 136.533H260.767ZM243.103 170.667H252.831L262.312 204.8H233.623L243.103 170.667ZM307.7 170.667V196.267C307.7 200.98 303.88 204.8 299.167 204.8H280.027L268.328 162.688L279.02 137.088C295.508 139.756 307.643 153.964 307.7 170.667ZM247.967 51.2C266.818 51.2 282.1 66.482 282.1 85.333C282.1 104.184 266.818 119.466 247.967 119.466C229.116 119.466 213.834 104.184 213.834 85.333C213.834 66.482 229.115 51.2 247.967 51.2ZM188.233 170.667C188.29 153.965 200.425 139.756 216.914 137.088L227.606 162.688L215.907 204.8H196.767C192.054 204.8 188.234 200.979 188.234 196.267L188.233 170.667Z"
                                                        fill="white" />
                                                    <path
                                                        d="M43.1668 128H145.567C150.28 128 154.1 124.179 154.1 119.467C154.1 114.754 150.279 110.934 145.567 110.934H43.1668C38.4538 110.934 34.6338 114.755 34.6338 119.467C34.6328 124.179 38.4538 128 43.1668 128Z"
                                                        fill="white" />
                                                    <path
                                                        d="M43.1668 170.667H145.567C150.28 170.667 154.1 166.846 154.1 162.134C154.1 157.421 150.279 153.601 145.567 153.601H43.1668C38.4538 153.601 34.6338 157.422 34.6338 162.134C34.6328 166.846 38.4538 170.667 43.1668 170.667Z"
                                                        fill="white" />
                                                    <path
                                                        d="M43.1668 213.333H145.567C150.28 213.333 154.1 209.512 154.1 204.8C154.1 200.087 150.279 196.267 145.567 196.267H43.1668C38.4538 196.267 34.6338 200.088 34.6338 204.8C34.6328 209.513 38.4538 213.333 43.1668 213.333Z"
                                                        fill="white" />
                                                    <path
                                                        d="M213.833 247.467H43.1668C38.4538 247.467 34.6338 251.288 34.6338 256C34.6338 260.713 38.4548 264.533 43.1668 264.533H213.834C218.547 264.533 222.367 260.712 222.367 256C222.367 251.287 218.546 247.467 213.833 247.467Z"
                                                        fill="white" />
                                                    <path
                                                        d="M213.833 332.8H43.1668C38.4538 332.8 34.6338 336.62 34.6338 341.333C34.6338 346.046 38.4548 349.866 43.1668 349.866H213.834C218.547 349.866 222.367 346.045 222.367 341.333C222.367 336.621 218.546 332.8 213.833 332.8Z"
                                                        fill="white" />
                                                    <path
                                                        d="M213.833 375.467H43.1668C38.4538 375.467 34.6338 379.288 34.6338 384C34.6338 388.712 38.4548 392.533 43.1668 392.533H213.834C218.547 392.533 222.367 388.713 222.367 384C222.367 379.287 218.546 375.467 213.833 375.467Z"
                                                        fill="white" />
                                                    <path
                                                        d="M179.7 418.133H43.1668C38.4538 418.133 34.6338 421.953 34.6338 426.666C34.6338 431.379 38.4548 435.199 43.1668 435.199H179.7C184.413 435.199 188.233 431.379 188.233 426.666C188.233 421.953 184.413 418.133 179.7 418.133Z"
                                                        fill="white" />
                                                    <path
                                                        d="M213.833 290.133H43.1668C38.4538 290.133 34.6338 293.953 34.6338 298.666C34.6338 303.379 38.4548 307.199 43.1668 307.199H213.834C218.547 307.199 222.367 303.379 222.367 298.666C222.367 293.953 218.546 290.133 213.833 290.133Z"
                                                        fill="white" />
                                                    <path
                                                        d="M478.367 238.933H358.9V25.6C358.9 11.462 347.438 0 333.3 0H77.3C75.037 0 72.867 0.9 71.267 2.5L3 70.767C1.4 72.367 0.5 74.537 0.5 76.8V452.267C0.5 466.405 11.962 477.867 26.1 477.867H239.433C239.433 496.718 254.715 512 273.566 512H478.366C497.218 512 512.5 496.718 512.5 477.867V273.067C512.5 254.215 497.218 238.933 478.367 238.933ZM68.767 29.133V59.734C68.767 64.447 64.946 68.267 60.234 68.267H29.633L68.767 29.133ZM26.1 460.8C21.387 460.8 17.567 456.98 17.567 452.267V85.333H60.234C74.372 85.333 85.834 73.871 85.834 59.733V17.067H333.3C338.013 17.067 341.833 20.888 341.833 25.6V238.933H273.566C254.715 238.933 239.433 254.215 239.433 273.066V460.8H26.1ZM495.433 477.867C495.433 487.293 487.792 494.934 478.366 494.934H273.566C264.14 494.934 256.499 487.293 256.499 477.867V273.067C256.499 263.641 264.14 256 273.566 256H478.366C487.792 256 495.433 263.641 495.433 273.067V477.867Z"
                                                        fill="white" />
                                                    <path
                                                        d="M461.3 418.133C456.587 418.133 452.767 421.953 452.767 426.666V443.733C452.767 448.446 448.946 452.266 444.234 452.266H307.7C302.987 452.266 299.167 448.445 299.167 443.733V426.666C299.167 421.953 295.346 418.133 290.634 418.133C285.921 418.133 282.101 421.953 282.101 426.666V443.733C282.101 457.871 293.563 469.333 307.701 469.333H444.234C458.372 469.333 469.834 457.871 469.834 443.733V426.666C469.833 421.954 466.013 418.133 461.3 418.133Z"
                                                        fill="white" />
                                                    <path
                                                        d="M356.4 321.766L367.434 310.732V418.133C367.434 422.846 371.255 426.666 375.967 426.666C380.68 426.666 384.5 422.846 384.5 418.133V310.733L395.534 321.767C398.882 325.001 404.205 324.955 407.496 321.663C410.788 318.371 410.834 313.049 407.6 309.701L382 284.101C378.668 280.77 373.266 280.77 369.934 284.101L344.334 309.701C341.1 313.049 341.146 318.372 344.438 321.663C347.729 324.954 353.051 325 356.4 321.766Z"
                                                        fill="white" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_11_739">
                                                        <rect width="512" height="512" fill="white"
                                                            transform="translate(0.5)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                            </ul>
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
    $('#date_of_birth').attr('max', format);
});

//Add qualification
$(document).ready(function() {
        var QualificationCount = 1;
        $("#add_other_Qualification").click(function() {
            console.log('add another');
            var QualificationEntry = `
            <div class="row">
                <h4 class='text-left countings1 text-danger'> ${QualificationCount}.</h4>
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label class="form-label">Qualification <span
                                class="required">*</span></label>
                        <select class="form-control after_xii_qualification" name="after_xii_qualification[]" >
                            <option selected disabled>Select your qualification</option>
                            <option value="Dilpoma">Dilpoma</option>
                            <option value="UG">UG</option>
                            <option value="PG">PG</option>
                            <option value="B.Ed.">B.Ed.</option>
                            <option value="M.Ed.">M.Ed.</option>
                            <option value="Teacher's Training">Teacher's Training</option>
                            <option value="Ph.D">Ph.D</option>
                        </select>

                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label class="form-label">Institution Name <span
                                class="required">*</span></label>
                        <input type="text" class="form-control after_xii_institute_name"
                            placeholder="Enter your institution name" name="after_xii_institute_name[]" >
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label">Affiliated Board/University <span class="required">*</span></label>
                        <input type="text" class="form-control after_xii_institute_board"
                            placeholder="Enter affiliated board/university name" name="after_xii_institute_board[]" >
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label">Stream/Discipline Honours/Area of
                            Specialisation <span class="required">*</span></label>
                        <input type="text" class="form-control after_xii_institute_stream"
                            placeholder="Enter your area of specialisation" name="after_xii_institute_stream[]" >
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label class="form-label">Percentage Acquired <span
                                class="required">*</span></label>
                        <input type="text" class="form-control after_xii_institute_percentage"
                            placeholder="Enter percentage acquired" name="after_xii_institute_percentage[]" >
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label class="form-label">Passing Year <span
                                class="required">*</span></label>
                        <select class="form-control after_xii_institute_passing_year" name="after_xii_institute_passing_year[]" >
                            <option selected disabled>Select passing year</option>
                            @for ($year = 1980; $year <= date("Y"); $year++)
                            <option value="{{$year}}">{{$year}}</option>
                            @endfor
                        </select>
                    </div>
                </div>


                                            
                <div class="col-lg-12 text-end mb-4">
                    <button class="btn btn-theme btn-danger remove-qualification">Remove</button>
                </div></div>`;
            $("#12th").append(QualificationEntry);
            QualificationCount++; 
        });

        // Remove qualification entry
        $(document).on("click", ".remove-qualification", function() {
            $(this).closest(".row").remove();
             $(".countings1").each(function(index) {
            $(this).text(index + 1);
        });
            QualificationCount--;
        });
    });

    //Add experience

    $(document).ready(function(){
        var ExperiencenCount = 1;
        $('#add_experience').click(function(){
            console.log("add another");
            var ExperienceEntry = `
            <div class="row">
                <h4 class='text-left countings2 text-danger'> ${ExperiencenCount}.</h4>
                    <div class="col-lg-6 col-12">
                        <div class="form-group">
                            <label class="form-label">Experience Type <span class="required">*</span></label>
                            <input type="text" class="form-control experience-type" placeholder="Enter experience type" name="experience_type[]" required value="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-group">
                            <label class="form-label">Experience Duration <span class="required">*</span></label>
                            <input type="text" class="form-control experience-duration" placeholder="Enter experience duration" name="experience_duration[]" required value="">
                        </div>
                    </div> 
                    <div class="col-lg-12 text-end mb-4">
                    <button class="btn btn-theme btn-danger remove-experience">Remove</button>
                    </div>                                   
            </div>`;
            $('#work_experience_div').append(ExperienceEntry);
            ExperiencenCount++;
        });

        //Remove experience entry
        $(document).on("click", ".remove-experience", function(){
            $(".countings2").each(function(index){
                $(this).closest(".row").remove();
                $(this).text(index+1);
            });
            ExperiencenCount--;
        });
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

        //first step verification
        $("#first_next").click(function(event) {
            event.preventDefault(); // Prevent default action of <a> tag
            // Reset error messages
            $("#error_name").text("");
            $("#error_fname").text("");
            $("#error_date_ofb").text("");
            $("#error_phone").text("");
            $("#error_email").text("");

            var name            = $("#name").val();
            var gender          = $("input[name='gender']:checked").val();
            var marital_status  = $("input[name='marital_status']:checked").val();
            var father_name     = $("#father_name").val();
            var date_of_birth   = $("#date_of_birth").val();
            var phone           = $("#phone").val();
            var email           = $("#email").val();

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
                var currentDate         = new Date();
                var minDateOfBirth      = new Date();
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
                // var verifiedEmail = 1;
                // if (verifiedEmail == 1) {
                //     console.log('next-form');
                //     localStorage.setItem('name',name);
                //     localStorage.setItem('fname',father_name);
                //     localStorage.setItem('dob',date_of_birth);
                //     localStorage.setItem('gender',gender);
                //     localStorage.setItem('phone',phone);
                //     localStorage.setItem('marital_status',marital_status);
                //     $(this).addClass('next-form');
                //     // Button Click
                //     current_ff = $(this).parent().parent().parent();
                //     next_ff = current_ff.next();

                //     //Add Class Active
                //     $(".step-list li").eq($(".tab-pannel").index(current_ff)).addClass("completed");
                //     $(".step-list li").eq($(".tab-pannel").index(next_ff)).addClass("active");

                //     //show the next steps
                //     next_ff.show();
                //     //hide the current steps with style
                //     current_ff.animate({opacity: 0}, {
                //     step: function(now) {
                //     // for making fielset appear animation
                //     opacity = 1 - now;

                //     current_ff.css({
                //         'display': 'none',
                //         'position': 'relative'
                //     });
                //     next_ff.css({'opacity': opacity});
                //     }, duration: 500
                //     });
                //     setProgressBar(++current);
                // }
                // When validation passed successfully
                $("#step1").hide();
                $("#step2").show();
                $('.step-list li').eq(0).removeClass('active');
                $('.step-list li').eq(1).addClass('active');
            }
        });

        //second step verification
        $('#second_next').click(function(event){
            event.preventDefault();
            $('#error_address').text("");
            $('#error_landmark').text("");
            $('#error_pincode').text("");
            $('#error_city').text("");
            $('#error_dist').text("");
            $('#error_state').text("");
            $('#error_country').text("");

            var address     = $("#address").val();
            var landmark    = $('#landmark').val();
            var pincode     = $('#pincode').val();
            var city        = $('#city').val();
            var dist        = $('#dist').val();
            var state       = $('#state').val();
            var country     = $('#country').val();

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
            // else{
            //     var verifiedEmail = 1;
            //     if(verifiedEmail == 1){
            //         localStorage.setItem('address', address);
            //         localStorage.setItem('landmark', landmark);
            //         localStorage.setItem('pincode', pincode);
            //         localStorage.setItem('city', city);
            //         localStorage.setItem('dist', dist);
            //         localStorage.setItem('state', state);
            //         localStorage.setItem('country', country);

            //         //add the next-form class
            //         $(this).addClass('next-form');

            //         //Button click
            //         var current_ff = $(this).parent().parent().parent();
            //         var next_ff = current_ff.next();

            //         //Add class active
            //         $(".step-list li").eq($(".tab-panel").index(current_ff)).addClass("completed");
            //         $(".step-list li").eq($(".tab-panel").index(next_ff)).addClass("active");

            //         //show the next steps
            //         next_ff.show();
            //         //Hide the current steps with style
            //         current_ff.animate({opacity: 0},{
            //             step: function(now) {
            //                 //For making fieldset appear animation
            //                 opacity = 1 - now;

            //                 current_ff.css({
            //                      'display' : 'none',
            //                     'position': 'relative'
            //                 });
            //                 next_ff.css({'opacity': opacity})
            //             },duration: 500
            //         });
            //         setProgressBar(++current);
            //     } else{
            //         alert("email is not verified");
            //        //localStorage.clear();
            //     }
            // }
            $("#step2").hide();
            $("#step3").show();
            $('.step-list li').eq(1).removeClass('active');
            $('.step-list li').eq(2).addClass('active');
        });

        // Back to step 1
        $('#goto_step_1').click((event) => {
            $("#step2").hide();
            $("#step1").show();
            $('.step-list li').eq(1).removeClass('active');
            $('.step-list li').eq(0).addClass('active');
        });
       

        //Third step verification
        
        $("#third_next").click(function(event) {
            event.preventDefault(); // Prevent default action of <a> tag

            // Reset error messages
            $("#error_x_school_name").text("");
            $("#error_x_board_name").text("");
            $("#error_x_percentage").text("");
            $("#error_x_passing_year").text("");
            $("#error_xii_school_name").text("");
            $("#error_xii_board_name").text("");
            $("#error_xii_percentage").text("");
            $("#error_xii_passing_year").text("");
            // $("#error_after_xii_qualification").text("");
            // $("#error_after_xii_institute_name").text("");
            // $("#error_after_xii_institute_board").text("");
            // $("#error_after_xii_institute_stream").text("");
            // $("#error_after_xii_institute_percentage").text("");
            // $("#error_after_xii_institute_passing_year").text("");

            // Get input values
            var x_school_name = $("#x_school_name").val();
            var x_board_name = $("#x_board_name").val();
            var x_percentage = $("#x_percentage").val();
            var x_passing_year = $("#x_passing_year").val();
            var xii_school_name = $("#xii_school_name").val();
            var xii_board_name = $("#xii_board_name").val();
            var xii_percentage = $("#xii_percentage").val();
            var xii_passing_year = $("#xii_passing_year").val();


            //Validate Higher Studies Entry Fields
            var higherStudiesValid = true;
            $(".after_xii_qualification").each(function() {
                var value = $(this).val();
                    if (value === null || value === undefined || value.trim() === "") {
                        higherStudiesValid = false;
                        return false; // Exit the loop early if any field is empty
                    }
                });
            $(".after_xii_institute_name").each(function() {
                var value = $(this).val();
                    if (value === null || value === undefined || value.trim() === "") {
                        higherStudiesValid = false;
                        return false; // Exit the loop early if any field is empty
                    }
                });
            $(".after_xii_institute_board").each(function() {
                var value = $(this).val();
                if (value === null || value === undefined || value.trim() === "") {
                    higherStudiesValid = false;
                    return false; // Exit the loop early if any field is empty
                }
            });

            $(".after_xii_institute_stream").each(function() {
                var value = $(this).val();

                    if (value === null || value === undefined || value.trim() === "") {
                        higherStudiesValid = false;
                        return false; // Exit the loop early if any field is empty
                    }
                });
            $(".after_xii_institute_percentage").each(function() {
                var value = $(this).val();

                    if (value === null || value === undefined || value.trim() === "") {
                        higherStudiesValid = false;
                        return false; // Exit the loop early if any field is empty
                    }
                });
            $(".after_xii_institute_passing_year").each(function() {
                var value = $(this).val();

                    if (value === null || value === undefined || value.trim() === "") {
                        higherStudiesValid = false;
                        return false; // Exit the loop early if any field is empty
                    }
                });
            if (!higherStudiesValid) {
                var alertDiv = $('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please fill in all Higher Studies fields.</div>');
                $('#education_alert_container').append(alertDiv);
                setTimeout(function() {
                    alertDiv.alert('close');
                }, 3000); // Close the alert after 3 seconds
                return false;
            }
            // var after_xii_qualification = $("#after_xii_qualification").val();
            // var after_xii_institute_name = $("#after_xii_institute_name").val();
            // var after_xii_institute_board = $("#after_xii_institute_board").val();
            // var after_xii_institute_stream = $("#after_xii_institute_stream").val();
            // var after_xii_institute_percentage = $("#after_xii_institute_percentage").val();
            // var after_xii_institute_passing_year = $("#after_xii_institute_passing_year").val();

            // Validate input values
            if (x_school_name.trim().length === 0) {
                $("#error_x_school_name").text("Please enter your school name");
                $("#x_school_name").focus();
                return false;
            } else if (x_board_name.trim().length === 0) {
                $("#error_x_board_name").text("Please enter your board name");
                $("#x_board_name").focus();
                return false;
            } else if (x_percentage.trim().length === 0) {
                $("#error_x_percentage").text("Please enter your percentage");
                $("#x_percentage").focus();
                return false;
            } else if (x_passing_year === null) {
                $("#error_x_passing_year").text("Please select your passing year");
                $("#x_passing_year").focus();
                return false;
            } else if (xii_school_name.trim().length === 0) {
                $("#error_xii_school_name").text("Please enter your school name");
                $("#xii_school_name").focus();
                return false;
            } else if (xii_board_name.trim().length === 0) {
                $("#error_xii_board_name").text("Please enter your board name");
                $("#xii_board_name").focus();
                return false;
            } else if (xii_percentage.trim().length === 0) {
                $("#error_xii_percentage").text("Please enter your percentage");
                $("#xii_percentage").focus();
                return false;
            } else if (xii_passing_year === null) {
                $("#error_xii_passing_year").text("Please select your passing year");
                $("#xii_passing_year").focus();
                return false;
            } 
            // else if (after_xii_qualification === null) {
            //     $("#error_after_xii_qualification").text("Please select your qualification");
            //     $("#after_xii_qualification").focus();
            //     return false;
            // } else if (after_xii_institute_name.trim().length === 0) {
            //     $("#error_after_xii_institute_name").text("Please enter your institution name");
            //     $("#after_xii_institute_name").focus();
            //     return false;
            // } else if (after_xii_institute_board.trim().length === 0) {
            //     $("#error_after_xii_institute_board").text("Please enter your board name");
            //     $("#after_xii_institute_board").focus();
            //     return false;
            // } else if (after_xii_institute_stream.trim().length === 0) {
            //     $("#error_after_xii_institute_stream").text("Please enter your area of specialization");
            //     $("#after_xii_institute_stream").focus();
            //     return false;
            // } else if (after_xii_institute_percentage.trim().length === 0) {
            //     $("#error_after_xii_institute_percentage").text("Please enter your percentage");
            //     $("#after_xii_institute_percentage").focus();
            //     return false;
            // } else if (after_xii_institute_passing_year === null) {
            //     $("#error_after_xii_institute_passing_year").text("Please select your passing year");
            //     $("#after_xii_institute_passing_year").focus();
            //     return false;
            // } 
            // else {
            //     // Add data to localStorage
            //     localStorage.setItem('x_school_name', x_school_name);
            //     localStorage.setItem('x_board_name', x_board_name);
            //     localStorage.setItem('x_percentage', x_percentage);
            //     localStorage.setItem('x_passing_year', x_passing_year);
            //     localStorage.setItem('xii_school_name', xii_school_name);
            //     localStorage.setItem('xii_board_name', xii_board_name);
            //     localStorage.setItem('xii_percentage', xii_percentage);
            //     localStorage.setItem('xii_passing_year', xii_passing_year);
            //     // localStorage.setItem('after_xii_qualification', after_xii_qualification);
            //     // localStorage.setItem('after_xii_institute_name', after_xii_institute_name);
            //     // localStorage.setItem('after_xii_institute_board', after_xii_institute_board);
            //     // localStorage.setItem('after_xii_institute_stream', after_xii_institute_stream);
            //     // localStorage.setItem('after_xii_institute_percentage', after_xii_institute_percentage);
            //     // localStorage.setItem('after_xii_institute_passing_year', after_xii_institute_passing_year);
                
            //     // Add the next-form class
            //     $(this).addClass('next-form');
                        
            //     // Button Click
            //     var current_ff = $(this).parent().parent().parent();
            //     var next_ff = current_ff.next();

            //     // Add Class Active
            //     $(".step-list li").eq($(".tab-pannel").index(current_ff)).addClass("completed");
            //     $(".step-list li").eq($(".tab-pannel").index(next_ff)).addClass("active");

            //     // Show the next steps
            //     next_ff.show();
                        
            //     // Hide the current steps with style
            //     current_ff.animate({opacity: 0}, {
            //         step: function(now) {
            //             // For making fieldset appear animation
            //             opacity = 1 - now;

            //             current_ff.css({
            //                 'display': 'none',
            //                 'position': 'relative'
            //             });
            //             next_ff.css({'opacity': opacity});
            //         }, duration: 500
            //     });
            //     setProgressBar(++current);
            // }
            $("#step3").hide();
            $("#step4").show();
            $('.step-list li').eq(2).removeClass('active');
            $('.step-list li').eq(3).addClass('active');
        });
        //Back to step 2
        $('#goto_step_2').click((event) => {
            $("#step3").hide();
            $("#step2").show();
            $('.step-list li').eq(2).removeClass('active');
            $('.step-list li').eq(1).addClass('active');
        });
    

        //Fourth step verification

        $('#fourth_next').click(function(event){
            event.preventDefault();
            $('#error_present_salary').text("");
            $('#error_expected_salary').text("");
            $('#error_join_time').text("");
            $('#error_referrence_details').text("");

            var presentSalary       = $('#present_salary').val().trim();
            var expectedSalary      = $('#expected_salary').val().trim();
            var joinTime            = $('#join_time').val().trim();
            var referrenceDetails   = $('#referrence_details').val().trim();
            var knowAnyoneAtTigs    = $("input[name = 'knowanyone']:checked").val();
            // Validate experience entry fields
            var experienceValid = true;
            $(".experience-type").each(function(){
                if($(this).val().trim() === ""){
                    experienceValid = false;
                    return false; // Exit the loop early if any field is empty
                }
            });
            $(".experience-duration").each(function(){
                if($(this).val().trim() === ""){
                    experienceValid = false;
                    return false; // Exit the loop early if any field is empty
                }
            });
            
            if(!experienceValid){
                var alertDiv = $('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please fill in all experience fields.</div>');
                $('#experience_alert_container').append(alertDiv);
                setTimeout(function(){
                    alertDiv.alert('close');
                }, 3000);
                return false;
            }
            if(presentSalary.length == 0) {
                $('#error_present_salary').text("Please enter your present salary");
                $('#present_salary').focus();
                return false;
            } else if(expectedSalary.length == 0){
                $('#error_expected_salary').text ("Please enter your expected salary");
                $('#expected_salary').focus();
                return false;

                //join time validation
            } else if(joinTime.length == 0){
                $('#error_join_time').text("Please enter the time required to join");
                $('#join_time').focus();
                return false;
                // Referrence details validation if applicable
            } else if(knowAnyoneAtTigs == 'Yes' && referrenceDetails.length == 0){
                $('#error_referrence_details').text("Please mention the referrence details");
                $('#referrence_details').focus();
                return false;  
            }
            // else{
            //     var verifiedEmail = 1;
            //     if(verifiedEmail == 1) {
            //         console.log('next-form');
            //         //store data in localstorage
            //         localStorage.setItem('present_salary', presentSalary);
            //         localStorage.setItem('expected_salasry', expectedSalary);
            //         localStorage.setItem('join_time', joinTime);
            //         localStorage.setItem('knowanyone', knowAnyoneAtTigs);
            //         localStorage.setItem('referrence_details', referrenceDetails);

            //         //Add the next-form class
            //         $(this).addClass('next-form');

            //         //Button click
            //         var current_ff = $(this).parent().parent().parent();
            //         var next_ff = current_ff.next();

            //         //show the next steps
            //         next_ff.show();

            //         // Hide the current steps with style
            //         current_ff.animate({opacity: 0}, {
            //         step: function(now) {
            //             // For making fieldset appear animation
            //             opacity = 1 - now;

            //             current_ff.css({
            //                 'display': 'none',
            //                 'position': 'relative'
            //             });
            //             next_ff.css({'opacity': opacity});
            //         }, duration: 500
            //     });
            //     setProgressBar(++current);
            //     } else {
            //         //localStorage.clear();
            //         alert('Email not verified');
            //         //localStorage.clear();
            //     }
            // }
            $("#step4").hide();
            $("#step5").show();
            $('.step-list li').eq(3).removeClass('active');
            $('.step-list li').eq(4).addClass('active');
        });
        $('#goto_step_3').click((event) => {
            $("#step4").hide();
            $("#step3").show();
            $('.step-list li').eq(3).removeClass('active');
            $('.step-list li').eq(2).addClass('active');
        });

        //Fifth step verfication
        $('#fifth_next').click(function(event){
            event.preventDefault();

            //Reset error messages
            $('#error_applied_post').text("");
            $('#error_unit_name').text("");
            $('#error_subject').text("");

            //Get input values
            var applied_post    = $('#applied_post').val().trim();
            var unit_name       = $('#unit_name').val().trim();
            var subject         = $('#subject').val().trim();

            //Validate input value
            if(applied_post.length == 0){
                $("#error_applied_post").text("Please select the applied post");
                $("#applied_post").focus();
                return false;
            } else if(unit_name.length == 0){
                $("#error_unit_name").text("Please enter the unit name");
                $("#unit_name").focus();
                return false;
            } else if(subject.length == 0){
                $("#error_subject").text("Please enter the unit name");
                $("#subject").focus();
                return false;
             } //else {
            //     // Add data to localStorage
            //     localStorage.setItem('applied_post', applied_post);
            //     localStorage.setItem('unit_name', unit_name);
            //     localStorage.setItem('subject', subject);

            //     // Add the next-form class
            //     $(this).addClass('next-form');
                        
            //     // Button Click
            //     var current_ff = $(this).parent().parent().parent();
            //     var next_ff = current_ff.next();

            //     // Add Class Active
            //     $(".step-list li").eq($(".tab-pannel").index(current_ff)).addClass("completed");
            //     $(".step-list li").eq($(".tab-pannel").index(next_ff)).addClass("active");

            //     // Show the next steps
            //     next_ff.show();
                        
            //     // Hide the current steps with style
            //     current_ff.animate({opacity: 0}, {
            //         step: function(now) {
            //             // For making fieldset appear animation
            //             opacity = 1 - now;

            //             current_ff.css({
            //                 'display': 'none',
            //                 'position': 'relative'
            //             });
            //             next_ff.css({'opacity': opacity});
            //         }, duration: 500
            //     });
            //     setProgressBar(++current);
            // }
            $("#step5").hide();
            $("#step6").show();
            $('.step-list li').eq(4).removeClass('active');
            $('.step-list li').eq(5).addClass('active');
        });
        $('#goto_step_4').click((event) => {
            $("#step5").hide();
            $("#step4").show();
            $('.step-list li').eq(4).removeClass('active');
            $('.step-list li').eq(3).addClass('active');
        });

    });
   

    // All Get localStorage
    // Retrieve the value of 'verified_email' from localStorage
    //first step
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

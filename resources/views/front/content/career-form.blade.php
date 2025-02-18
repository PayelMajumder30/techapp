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
                        <input type="hidden" name="job_id" value="">
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
                                                    <label for="merital1" class="custom-radio">
                                                        Unmarried
                                                        <input type="radio" name="merital_status" id="merital1" value="Unmarried" checked>
                                                        <span class="check-box">
                                                            <span class="checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <label for="merital2" class="custom-radio">
                                                        Married
                                                        <input type="radio" name="merital_status" id="merital2" value="married">
                                                        <span class="check-box">
                                                            <span class="checkmark"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
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
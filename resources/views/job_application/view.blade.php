@extends('layouts.app')
@section('content')

<style>
    .user-images {
        display: flex;
        flex-wrap: wrap;
        list-style-type: none;
        padding: 20px 0;
        margin: 0 -4px;
    }
    .user-images li {
        display: flex;
        align-items: center;
        justify-content: center;
        width: calc((100% - 40px) / 5);
        height: 140px;
        overflow: hidden;
        border-radius: 6px;
        margin: 0 4px 8px;
    }
    .user-images li img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    @media only screen and (max-width: 1599px) {
        .user-images li {
            height: 120px;
        }
    }
    @media only screen and (max-width: 1399px) {
        .user-images li {
            height: 100px;
        }
    }
    @media only screen and (max-width: 1299px) {
        .user-images li {
            height: 80px;
        }
    }
    @media only screen and (max-width: 1199px) {
        .user-images li {
            height: 100px;
        }
    }
    @media only screen and (max-width: 991px) {
        .user-images li {
            height: 140px;
        }
    }
    @media only screen and (max-width: 799px) {
        .user-images li {
            height: 120px;
        }
    }
    @media only screen and (max-width: 699px) {
        .user-images li {
            height: 100px;
        }
    }
    @media only screen and (max-width: 575px) {
        .user-images li {
            height: 80px;
        }
    }
    @media only screen and (max-width: 499px) {
        .user-images li {
            width: calc((100% - 32px) / 4);
        }
    }
    @media only screen and (max-width: 399px) {
        .user-images li {
            width: calc((100% - 24px) / 3);
        }
    }
    @media only screen and (max-width: 359px) {
        .user-images li {
            height: 70px;
        }
    }
    #form_data li{
        display: inline-table;
        text-align: center;
    }
    #form_data li img{
        max-height: 150px;
    }
</style>
<section class="content" id="form-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{route('job_application.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-chevron-left"></i>Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Registration ID:</label>
                                    <p>{{$jobapp->registration_id}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Job Title:</label>
                                    <p>{{$jobapp->Jobs?$jobapp->Jobs->title: ""}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Name:</label>
                                    <p>{{$jobapp->name}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Father's Name:</label>
                                    <p>{{$jobapp->father_name}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Email:</label>
                                    <p>{{$jobapp->email}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Mobile:</label>
                                    <p>{{$jobapp->phone}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>DOB:</label>
                                    <p>{{$jobapp->date_of_birth}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Gender:</label>
                                    <p>{{$jobapp->gender}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Marital Status:</label>
                                    <p>{{$jobapp->marital_status}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Address:</label>
                                    <p>{{$jobapp->address}}{{$jobapp->landmark?','.$jobapp->landmark: ""}},{{$jobapp->city}},{{$jobapp->dist}},{{$jobapp->state}},{{$jobapp->pincode}}</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-reader">
                                    <strong>Education Qualification</strong>
                                </div>
                                <div class="card-body">
                                    <p class="text-danger text-sm mt-4">10th Grade Qualification (Standard X)</p>
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <label>Institution/School Name:</label>
                                            <p>{{$jobapp->x_school_name}}</p>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <label>Affiliated Education Board:</label>
                                            <p>{{$jobapp->x_board_name}}</p>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <label>Percentage Acquired:</label>
                                            <p>{{$jobapp->x_percentage}}</p>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <label>Passing Year:</label>
                                            <p>{{$jobapp->x_passing_year}}</p>
                                        </div>
                                    </div>
                                    <p class="text-danger text-sm mt-4">12th Grade Qualification (Standard X)</p>
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <label>Institution/School Name:</label>
                                            <p>{{$jobapp->xii_school_name}}</p>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <label>Affiliated Education Board:</label>
                                            <p>{{$jobapp->xii_board_name}}</p>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <label>Percentage Acquired:</label>
                                            <p>{{$jobapp->xii_percentage}}</p>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <label>Passing Year:</label>
                                            <p>{{$jobapp->xii_passing_year}}</p>
                                        </div>
                                    </div>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($higherStudies as $item)
                                    <p class="text-danger text-sm mt-4">After 12th Qualification</p>
                                    <p class="badge badge-pill badge-danger">{{$count++}}</p>
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <label>Qualification :</label>
                                            <p>{{$item->after_xii_qualification}}</p>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <label>Institution Name:</label>
                                            <p>{{$item->after_xii_institute_name}}</p>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <label>Affiliated Board/University:</label>
                                            <p>{{$item->after_xii_institute_board}}</p>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <label>Area of Specialisation:</label>
                                            <p>{{$item->after_xii_institute_stream}}</p>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <label>Percentage Acquired :</label>
                                            <p>{{$item->after_xii_institute_percentage}}</p>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <label>Passing Year:</label>
                                            <p>{{$item->after_xii_institute_passing_year}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <strong>Work Experience</strong>
                                </div>
                                <div class="card-body">
                                    @foreach($experience as $exp)
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <label>Years of Experience:</label>
                                            <p>{{$exp->experience_type}}</p>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <label>Types of Experience:</label>
                                            <p>{{$exp->experience_duration}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <label>Present Salary Per Annum (P.A.) :</label>
                                            <p>{{$jobapp->present_salary}}</p>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <label>Expected Salary (P.A.) :</label>
                                            <p>{{$jobapp->expected_salasry}}</p>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <label>If Selected, Time Required to Join:</label>
                                            <p>{{$jobapp->join_time}}</p>
                                        </div>
                                        @if($jobapp->know_anyone_at_tigs=="Yes")
                                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                                <label>Name of reference at Techno India Group:</label>
                                                <p>{{$jobapp->referrence_details}}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-8 col-12">
                                    <ul class="user-images">
                                        <li style="width: 30%;"><a href="{{asset($jobapp->resume_file)}}" class="btn btn-primary" download>Download Resume</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-8 col-12">
                                <ul class="user-images">
                                    <li>
                                        <img src="{{asset($jobapp->aadhar_card_file)}}" alt="banner-image">
                                        <label for="">Aadhar Card</label>
                                    </li>
                                    <li>
                                        <img src="{{asset($jobapp->pan_card_file)}}" alt="banner-image">
                                        <label for="">Pan Card</label>
                                    </li>
                                    <li>
                                        <img src="{{asset($jobapp->signature)}}" alt="banner-image">
                                        <label for="">Signature</label>
                                    </li>
                                    <li>
                                        <img src="{{asset($jobapp->x_admit_card)}}" alt="banner-image">
                                        <label for="">10th Admit Card</label>
                                    </li>
                                    <li>
                                        <img src="{{asset($jobapp->image_file)}}" alt="banner-image">
                                        <label for="">Photo</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
@extends('layouts.app')
@section('content')

<style>
    label.required::after {
        content: " *";
        color: red;
    }
</style>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-reader">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('faculty.index') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('faculty.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="required">Faculty Name </label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{ $faculty->name }}">
                            @error('name') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label for="title" class="required">Designation </label>
                            <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter Designation" value="{{ $faculty->designation }}">
                            @error('designation') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label for="class_name" class="required">Class</label>
                            <select name="class_name" class="form-control">
                                <option value="" selected>Select class</option>
                                @foreach ($class as $item)
                                   <option value="{{$item->name}}" {{$faculty->class_name==$item->name?"selected":""}}>{{$item->name}}</option> 
                                @endforeach
                            </select>
                            @error('class_name') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label for="title" class="required">Description </label>
                            <textarea class="form-control" name="description" id="description" placeholder="Enter Description Here">{{ $faculty->description }}</textarea>
                            @error('description') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label for="title" class="required">Profile Picture </label>
                            <img src="{{asset($faculty->image)}}" alt="No-Image" srcset="" height="100px" width="100px" class="img-thumbnail" title="{{$faculty->name}}">
                            <br>
                            <input type="file" class="form-control" name="pic" id="pic">
                            @error('pic') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <input type="hidden" name="id" value="{{$faculty->id}}">
                        <input type="hidden" name="old_faculty_img" value="{{ $faculty->image }}">
                        <label for="title">Social Media Link</label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="facebook_link">Facebook link</label>
                                    <input type="text" class="form-control" name="facebook_link" id="facebook_link" placeholder="" value="{{ $faculty->facebook_link }}">
                                    @error('facebook_link') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="twitter_link">Twitter link</label>
                                    <input type="text" class="form-control" name="twitter_link" id="twitter_link" placeholder="" value="{{ $faculty->twitter_link }}">
                                    @error('twitter_link') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="linkedin_link">Linkedin link</label>
                                    <input type="text" class="form-control" name="linkedin_link" id="linkedin_link" placeholder="" value="{{ $faculty->linkedin_link }}">
                                    @error('linkedin_link') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
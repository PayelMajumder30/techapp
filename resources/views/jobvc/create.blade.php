@extends('layouts.app')
@section('content') 

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{-- header --}}
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{route('jobvc.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-chevron-left"></i>Back</a>                                
                            </div>
                        </div>
                    </div>
                    {{-- body --}}
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="title">Title*</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter title..." value="{{old('title')}}">
                                @error('title') <p class="small text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Sub Title*</label>
                                <input type="text" name="sub_title" id="sub_title" class="form-control" placeholder="Enter title..." value="{{old('title')}}">
                                @error('title') <p class="small text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="category">Category * <span class="badge bg-primary"><a href="{{route('jobct.create')}}">New Category</a></span></label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="" selected hidden>Select Category..</option>
                                        @foreach($category as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('category') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="location">Location *</label>
                                    <input type="text" class="form-control" name="location" id="location" placeholder="Enter location.." value="{{ old('location') }}">
                                    @error('location') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="school">School *</label>
                                    <input type="text" class="form-control" name="school" id="school" placeholder="Enter school.." value="{{ old('school') }}">
                                    @error('school') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="gender">Gender *</label>
                                    <select name="gender" class="form-control">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Mal/Female">Male/Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    @error('gender') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="experience">Minimum Years of Experience *</label>
                                    <input type="text" name="experience" class="form-control" value="{{ old('experience') }}">
                                    @error('experience') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="no_of_vacancy">No of Vacancy *</label>
                                    <input type="number" name="no_of_vacancy" class="form-control" value="{{ old('no_of_vacancy') }}">
                                    @error('no_of_vacancy') <p class="small text-danger">{{ $message }}</p> @enderror
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
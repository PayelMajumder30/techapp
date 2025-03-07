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
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('teaching_process.index') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('teaching_process.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title" class="required">Title </label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="{{ $teaching->title }}">
                                @error('title') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="title" class="required">Description </label>
                                <textarea class="form-control" name="description" id="description" placeholder="Enter Description Here">{{ $teaching->desc }}</textarea>
                                @error('description') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="title" class="required">Image </label>
                                <img src="{{asset($teaching->image)}}" alt="" srcset="" height="100px" width="100px" class="img-thumbnail" title="{{ $teaching->title}}'s image">
                                <input type="file" name="image" id="image" class="form-control">
                                @error('image') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            
                            <input type="hidden" name="id" value="{{$teaching->id}}">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
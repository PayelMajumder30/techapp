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
                                <a href="{{ route('social.index') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('social.update') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="row form-group">
                                <div class="col-md-6" style="margin-top: 50px;">
                                    <label for="title" class="required">Title </label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter social title.." value="{{ old('title') ? old('title') : $social->title }}">
                                    @error('title') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    @if (!empty($social->image))
                                        @if (!empty($social->image) && file_exists(public_path($social->image)))
                                            <img src="{{ asset($social->image) }}" alt="social-img" class="img-thumbnail mr-3" style="height: 50px">
                                        @else
                                            <img src="{{ asset('backend-assets/images/placeholder.jpg') }}" alt="social-image" style="height: 50px" class="mr-2">
                                        @endif
                                        <br>
                                    @endif
                                    <label for="image" class="required">Image </label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    <p class="small text-muted">Size: less than 1 mb | Extension: .webp for better SEO | Preferable Dimensions: 64 X 64 px</p>
                                    @error('image') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="social_link">Link </label>
                                    <input type="text" class="form-control" name="social_link" id="social_link" placeholder="Enter social media link.." value="{{ old('social_link')? old('social_link') : $social->link }}">
                                    @error('social_link') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ $social->id }}">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
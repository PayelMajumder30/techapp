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
                        <div class="col-12 text right">
                            <a href="{{route('class.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-chevron-left"></i>Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="title" class="required">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Class Name..." value="{{old('name')}}">
                                @error('name') <p class="small text-danger">{{$message}}</p> @enderror
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@extends('layouts.app')
@section('content') 

<section class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{route('subject.index')}}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('subject.update', ['id' => $subject->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title *</label>
                                <input type="text" name="title" id="title" value="<?php echo $subject['title'] ?>" placeholder="Enter title" class="form-control">
                                @error('title') <p class="small text-danger">{{$message}}</p>@enderror                               
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
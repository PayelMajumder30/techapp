@extends('layouts.app')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('galleries.index') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('galleries.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group d-flex">
                                <div class="form-check" style="padding-left: 2.25rem;">
                                    <input class="form-check-input file_type" type="radio" name="type" id="exampleRadios1" value="image" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Image
                                    </label>
                                </div>
                                <div class="form-check" style="padding-left: 2.25rem;">
                                    <input class="form-check-input file_type" type="radio" name="type" id="exampleRadios2" value="video">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Video
                                </label>
                                </div>
                            </div>
                            <div class="form-group" id="image_div">
                                <label for="file">Image*</label>
                                <input type="file" class="form-control" name="file" id="file" accept="image/*">
                            </div>
                            <div class="form-group" id="video_div" style="display: none;">
                                <label for="video_path">Video path*</label>
                                <input type="text" name="video_path" class="form-control">
                            </div>
                            @if (session()->has('key'))
                            <div class="alert alert-danger" role="alert" style="background-color: #ff5b6bc2;border-color: #dc35458c;">
                                    {{ session('key') }}
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('input[name="type"]').click(function() {
       var type = $(this).val();
       if(type=="image"){
           $('#image_div').show();
           $('#video_div').hide();
       }else{
           $('#image_div').hide();
           $('#video_div').show();
       }
   });
    });

</script>

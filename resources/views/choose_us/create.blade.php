@extends('layouts.app')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-reader">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('choose_us.index') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('choose_us.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title *</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="{{ old('title') }}">
                                @error('title') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Enter Description Here">{{ old('description') }}</textarea>
                                @error('description') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Image *</label>
                                <input type="file" class="form-control" name="image" id="image" value="{{ old('image') }}">
                                @error('image') <p class="small text-danger">{{ $message }}</p> @enderror
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
<script>
    checkCatParentLevel();
</script>
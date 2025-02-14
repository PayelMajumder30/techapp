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
                                <a href="{{ route('facilities.create') }}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Create</a>
                            </div>
                        </div>
                        <div class="row">
                            <h2 class="col-md-6">Facilities</h2>
                            <div class="col-md-6">
                                <form action="" method="get">
                                    <div class="d-flex justify-content-end">
                                        <div class="form-group ml-2">
                                            <input type="search" class="form-control form-control-sm" name="keyword" id="keyword" value="{{ request()->input('keyword') }}" placeholder="Search something...">
                                        </div>

                                        <div class="form-group ml-2">
                                            <div class="btn-group">
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-filter"></i>
                                                </button>
                                                <a href="{{ url()->current() }}" class="btn btn-sm btn-light" data-toggle="tooltip" title="Clear filter">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5px">#</th>
                                    <th>Image</th>
                                    <th>Logo</th>
                                    <th width="25%">Title</th>
                                    <th width="25%">Description</th>
                                    <th>Status</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($facilities as $index => $item)
                                    <tr class="text-left align-middle">
                                        <td>{{ $index+1}}</td>
                                        <td><img src="{{asset($item->image)}}" alt="No Image" srcset="" height="80px" width="80px" class="img-thumbnail" title="{{ $item->title }}'s Image"></td>
                                        <td><img src="{{asset($item->logo)}}" alt="No Logo" srcset="" height="60px" width="60px" class="img-thumbnail" title="{{ $item->title }}'s Logo"></td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ Str::limit($item->desc, 100) }}</td>

                                        <td> 
                                            <div class="custom-control custom-switch mt-1" data-toggle="tooltip" title="Toggle status">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch{{$item->id}}" {{ ($item->status == 1) ? 'checked' : '' }} >
                                            <label class="custom-control-label" for="customSwitch{{$item->id}}"></label>
                                        </div>
                                    </td>
                                        <td class="d-flex text-right">
                                            <div class="btn-group">
                                                <a href="" class="btn btn-sm btn-info" data-toggle="tooltip" title="Sub facilities">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{route('facilities.edit', ['id' => $item->id])}}" class="btn btn-sm btn-dark" data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{route('facilities.delete', ['id' => $item->id])}}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this post?')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%" class="text-center">No records found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
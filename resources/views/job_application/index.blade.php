@extends('layouts.app')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Application List</h3>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <form action="" method="get">
                                    <div class="d-flex justify-content-end">
                                        <div class="form-group ml-2">
                                            <input type="search" class="form-control form-control-sm" name="keyword" id="keyword" value="{{request()->input('keyword')}}" placeholder="Search something..">
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
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Registration ID</th>
                                    <th>Job title</th>
                                    <th>Name</th>
                                    <th>Personal Details</th>
                                    <th style="width: 10px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($jobapp as $index => $item)
                                    <tr>
                                        <td>{{ $index + $jobapp->firstItem() }}</td>
                                        <td>
                                            @if(!empty($item->image_file) && file_exists(public_path($item->image_file)))
                                                <img src="{{ asset($item->image_file)}}" alt="banner-image" style="height: 50px" class="img-thumbnail mr-2">
                                            @else
                                                <img src="{{asset('backend-assets/images/placeholder.jpg')}}" alt="banner-image" alt="banner-image" style="height: 50px" class="mr-2">
                                            @endif
                                        </td>
                                        <td>
                                            <div class="title-part">
                                                <p class="text-muted mb-0">{{ $item->registration_id}}</p>
                                            </div>
                                        </td>
                                       
                                        <td>
                                            <div class="title-part">
                                                <p class="text-muted mb-0">{{ $item->Jobs?$item->Jobs->title:""}}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="title-part">
                                                <p class="text-muted mb-0">{{ $item->name}}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="title-part">
                                                <p class="text-muted mb-0"><strong>Email: </strong>{{ $item->email}}</p>
                                                <p class="text-muted mb-0"><strong>Mobile: </strong>{{ $item->phone}}</p>
                                                <p class="text-muted mb-0"><strong>Post: </strong>{{ $item->applied_post}}</p>
                                                <p class="text-muted mb-0"><strong>Unit: </strong>{{ $item->unit_name}}</p>
                                            </div>
                                        </td>
                                        <td class="d-flex">
                                            <div class="btn-group">
                                                <a href="{{route('job_application.view', $item->id)}}" class="btn btn-sm btn-dark" data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-eye"></i>
                                                </a>
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
                        <div class="pagination-container">
                            {{$jobapp->appends($_GET)->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
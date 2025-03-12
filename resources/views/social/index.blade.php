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
                                <a href="{{route('social.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Create</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <form action="" method="get">
                                    <div class="d-flex justify-content-end">
                                        <div class="form-group ml-2">
                                            <input type="search" class="form-control form-control-sm" name="keyword" id="keyword" value="{{request()->input('keyword')}}" placeholder="search something...">
                                        </div>
                                        <div class="form-group ml-2">
                                            <div class="btn-group">
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-filter"></i>
                                                </button>
                                                <a href="{{url()->current()}}" class="btn btn-sm btn-light" data-toggle="tooltip" title="Clear filter">
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
                                    <th>Title</th>
                                    <th>Link</th>
                                    <th style="width: 100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($social as $index => $item)
                                    <tr>
                                        <td>{{$index + $social->firstItem()}}</td>
                                        <td>
                                            <div class="d-flex">
                                                @if (!empty($item->image) && file_exists(public_path($item->image)))
                                                    <img src="{{asset($item->image)}}" alt="banner-image" style="height: 50px" class="img-thumbnail mr-2">
                                                @else
                                                    <img src="{{asset('backend-assets/images/placeholder.jpg')}}" alt="social-media-image" style="height: 50px" class="mr-2">
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="title-part">
                                                <p class="text-muted mb-0">{{$item->title}}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{$item->link}}" target="_blank" class="btn btn-sm btn-dark" data-toggle="tooltip" title="link">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        </td>
                                        <td class="d-flex">
                                            <div class="btn-group">
                                                <a href="{{route('social.edit', $item->id)}}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{route('social.delete', $item->id)}}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-dark" onclick="return confirm('Are you sure you want to delete this link?')" data-toggle="tooltip" title="delete">
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
                        <div class="pagination-container">
                            {{$social->appends($_GET)->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
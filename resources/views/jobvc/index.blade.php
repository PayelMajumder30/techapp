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
                                <a href="{{ route('jobvc.create') }}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Create</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
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
                                    <th style="width: 10px">#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>School</th>
                                    <th>Location</th>
                                    <th style="width: 100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $index => $item)
                                    <tr>
                                        <td>{{ $index + $data->firstItem() }}</td>
                                        <td>
                                            <div class="title-part">
                                                <p class="text-muted mb-0">{{ $item->title }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="title-part">
                                                <p class="text-muted mb-0">{{ $item->category->title }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="title-part">
                                                <p class="text-muted mb-0">{{ $item->school_name }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="title-part">
                                                <p class="text-muted mb-0">{{ $item->location }}</p>
                                            </div>
                                        </td>
                                        
                                        <td class="d-flex">
                                            <div class="custom-control custom-switch mt-1" data-toggle="tooltip" title="Toggle status">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch{{$item->id}}" onchange="changeStatus('{{$item->id}}', '{{$item->status}}')" {{ ($item->status == 1) ? 'checked' : '' }} />
                                                <label class="custom-control-label" for="customSwitch{{$item->id}}"></label>
                                            </div>
                                            <div class="btn-group">
                                                <a href="{{route('jobvc.edit', ['id' => $item->id])}}" class="btn btn-sm btn-dark" data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{route('jobvc.delete', ['id' => $item->id])}}" method="POST" >
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

                        <div class="pagination-container">
                            {{$data->appends($_GET)->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function changeStatus (id, status) {
            $.ajax({
                url: "{{route('jobvc.change-status')}}",
                type: 'post',
                data: {
                    'id' : id,
                    'status': status,
                    '_token': '{{ csrf_token() }}'
                },
            });
    }
</script>
@endsection
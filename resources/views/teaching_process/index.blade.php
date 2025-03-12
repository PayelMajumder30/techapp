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
                                <a href="{{route('teaching_process.create')}}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i>Create</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <form action="" method="get">
                                    <div class="d-flex justify-content-end">
                                        <div class="form-group ml-2">
                                            <input type="search" class="form-control form-control-sm" value="{{request()->input('keyword')}}" name="keyword" id="keyword" placeholder="Search something...">
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
                                    <th style="width: 5px">#</th>
                                    <th>Image</th>
                                    <th width="25%">Title</th>
                                    <th width="25%">Description</th>
                                    <th>Status</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($teaching as $index => $item)
                                <tr class="text-left align-middle">
                                    <td>{{$index+1}}</td>
                                    <td><img src="{{asset($item->image)}}" alt="No Logo" srcset="" height="60px" width="60px" class="img-thumbnail" title="{{ $item->title }}'s Logo"></td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ Str::limit($item->description, 100) }}</td>
                                    <td>
                                        <div class="custom-control custom-switch mt-1" data-toggle="tooltip" title="Toggle status">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch{{$item->id}}" {{ ($item->status == 1) ? 'checked' : '' }} onchange="statusToggle('{{ route('teaching_process.status', $item->id) }}')">
                                        <label class="custom-control-label" for="customSwitch{{$item->id}}"></label>
                                        </div>
                                    </td>
                                    <td class="d-flex text-right">
                                        <div class="btn-group">
                                            <a href="{{route('teaching_process.edit', ['id' => $item->id])}}" class="btn btn-sm btn-dark" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{route('teaching_process.delete', ['id' => $item->id])}}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this process?')">
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

<script>
    function statusToggle(url) {
        fetch(url, { method: 'GET' })
        .then(response => response.json())
        .then(data => {
            if (data.status === 200) {
                location.reload();
            } else {
                alert("Failed to update status. Please try again.");
            }
        })
            .catch(error => {
            console.error("Error:", error);
            alert("Something went wrong. Try again.");
            });
    }
</script>
@endsection
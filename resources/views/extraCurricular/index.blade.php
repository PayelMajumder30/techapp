@extends('layouts.app')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <h3>Extra curricular List</h3>
                            <div class="col-md-12 text-right">
                                <a href="{{route('extraCurricular.create')}}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Create</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5px">#</th>
                                    <th>Image</th>
                                    <th width="30%">title</th>
                                    <th>Description</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($curricular as $index => $item)
                                    <tr class="text-left align-middle">
                                        <td>{{ $index+1}}</td>
                                        <td><img src="{{asset($item->image)}}" alt="No Image" srcset="" height="75px" width="75px" class="img-thumbnail" title="{{ $item->title }}'s Pic"></td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ Str::limit($item->desc, 200) }}</td>
                                        
                                        <td class="d-flex text-right">
                                            <div class="btn-group">
                                                <a href="{{ route('extraCurricular.edit', $item->id) }}" class="btn btn-sm btn-dark" data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{route('extraCurricular.delete', ['id' => $item->id])}}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this facility?')">
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
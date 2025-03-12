@extends('layouts.app')
@section('content')

<section class="content">
    <h2>Lead List</h2>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">    
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <form action="" method="get">
                                    <div class="d-flex justify-content-end">
                                         {{-- date search --}}
                                         <div class="form-group ml-2">
                                            <input type="date" name="date" id="date" class="form-control form-control-sm" value="{{ request()->input('date')}}">
                                        </div>  

                                        {{-- keyword search --}}
                                        <div class="form-group ml-2">
                                            <input type="search" name="keyword" id="keyword" class="form-control form-control-sm" value="{{ request()->input('keyword') }}" placeholder="search something...">
                                        </div>
                    
                                        <div class="form-group ml-2">
                                            <div class="btn-group">
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-filter"></i>
                                                </button>
                                                <a href="{{url()->current()}}" class="btn btn-sm btn-light" data-toggle="tooltip" title="clear filter">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                <a href="{{route('lead.export', request()->all())}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Export Data">
                                                    Export
                                                </a>
                                                
                                                <a href="{{route('lead.pdf', request()->all())}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="pdf">
                                                    Download as pdf
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
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($lead as $index => $item)
                                <tr>
                                    <td>{{$index + $lead->firstItem()}}</td>
                                    <td>
                                        <p class="small text-muted mb-0">{{ $item->full_name }}</p>
                                    </td>
                                    <td>
                                        <p class="small text-muted mb-0">{{ $item->mobile_no }}</p>
                                    </td>
                                    <td>
                                        <p class="small text-muted mb-0">{{ $item->message }}</p>
                                    </td>
                                    <td>
                                        <p class="small text-muted mb-0">{{ $item->created_at }}</p>
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
                            {{$lead->appends($_GET)->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@extends('layouts.app')
@section('content') 
<section class="container">
    <div class="row">
        <div class="card-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <form action="" method="get">
                                <div class="d-flex justify-content-end">
                                    <div class="form-group ml-2">
                                        <label class="text-sm">Start Date</label>
                                        <input type="datetime-local" name="start_date" id="start_date" class="form-control form-control-sm" value="{{request()->input('start_date')}}">
                                    </div>
                                    <div class="form-group ml-2">
                                        <label class="text-sm">End Date</label>
                                        <input type="datetime-local" name="end_date" id="end_date" class="form-control form-control-sm" value="{{request()->input('end_date')}}">
                                    </div>
                                    <div class="form-group ml-2 mt-2">
                                        <label class=""></label>
                                        <input type="search" style="width: 250px;" class="form-control form-control-sm" name="keyword" id="keyword" value="{{request()->input('keyword')}}" placeholder="search something....">
                                    </div>
                                    <div class="form-group ml-2 mt-4">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                <i class="fa fa-filter"></i>
                                            </button>
                                            <a href="{{ url()->current()}}" data-toggle="tooltip" title="clear filter">
                                                <i class="fa fa-times"></i>
                                            </a>
                                            <a href="" data-toggle="tooltip" title="Export data" class="btn btn-sm btn-primary">
                                                Export
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
                                <th style="min-width: 160px">Student Details</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th style="min-width: 66px">Class</th>
                                <th>Source</th>
                                <th>Medium</th>
                                <th>Campaign</th>
                                <th>Term</th>
                                <th>Content</th>
                                <th style="width: 100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($admissionform as $index => $item)
                            <tr>
                                <td>{{ $admissionform->firstItem() + $index }}</td>
                               
                                <td style="min-width: 160px">
                                    <div class="title-part">
                                        <p class="text-muted mb-0"><strong>Name: </strong>{{ $item->name }}</p>
                                    </div>
                                    <div class="title-part">
                                        <p class="text-muted mb-0"><strong>Parent Name: </strong>{{ $item->parent_name }}</p>
                                    </div>
                                    <div class="title-part">
                                        <p class="text-muted mb-0"><strong>DOB: </strong>{{ $item->dob }}</p>
                                    </div>
                                    <div class="title-part">
                                        <p class="text-muted mb-0"><strong>Pincode: </strong>{{ $item->pincode }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="title-part">
                                        <p class="text-muted mb-0">{{ $item->mobile }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="title-part">
                                        <p class="text-muted mb-0">{{ $item->email }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="title-part">
                                        <p class="text-muted mb-0">{{ $item->class }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="title-part">
                                        <p class="text-muted mb-0">{{ $item->utm_source }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="title-part">
                                        <p class="text-muted mb-0">{{ $item->utm_medium }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="title-part">
                                        <p class="text-muted mb-0">{{ $item->utm_campaign }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="title-part">
                                        <p class="text-muted mb-0">{{ $item->utm_term }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="title-part">
                                        <p class="text-muted mb-0">{{ $item->utm_content }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="title-part">
                                        <p class="badge bg-info">{{date('d-m-Y h:i a' ,strtotime($item->created_at))}}</p>
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
                        {{$admissionform->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
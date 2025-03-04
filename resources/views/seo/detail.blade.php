@extends('layouts.app')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h3>SEO Detail</h3>
                <div class="card">                   
                    <div class="card-reader">                      
                        <div class="row mb-3">                          
                            <div class="col-md-12 text-right">
                                <a href="{{route('seo.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-chevron-left"></i>Back</a>
                                <a href="{{route('seo.edit', $seodetail->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-chevron-edit"></i>Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="small text-muted mb-0">PAGE</p>
                        <p class="text-dark">{{ strtoupper($seodetail->page) }}</p>

                        <p class="small text-muted mb-0">Page title</p>
                        @if($seodetail->page_title)
                            <p class="text-dark">{{ nl2br($seodetail->page_title) }}</p>
                        @else
                            <p class="text-dark">NA</p>
                        @endif

                        <p class="small text-muted mb-0">Meta title</p>
                        @if($seodetail->meta_title)
                            <p class="text-dark">{{ nl2br($seodetail->meta_title) }}</p>
                        @else
                            <p class="text-dark">NA</p>
                        @endif

                        <p class="small text-muted mb-0">Meta Description</p>
                        @if($seodetail->meta_desc)
                            <p class="text-dark">{{ nl2br($seodetail->meta_desc) }}</p>
                        @else
                            <p class="text-dark">NA</p>
                        @endif

                        <p class="small text-muted mb-0">Meta Keyword</p>
                        @if($seodetail->meta_keyword)
                            <p class="text-dark">{{ nl2br($seodetail->meta_keyword) }}</p>
                        @else
                            <p class="text-dark">NA</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
    <script>
        checkCatParentLevel();
    </script>
@endsection
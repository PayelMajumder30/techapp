@extends('front.layout.app')
@section('content')

<div class="page-wrapper">
    <section class="inner-banner">
        <div class="background"><img src="frontend-assets/assets/img/career-banner.jpg" alt="Background"></div>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="page-title">Career</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="job-apply-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="filter-row">
                        <div class="form-group">
                            <label class="form-label color-theme">Job Post</label>
                            <select class="form-control filter-option" id="select_post">
                                <option slected="selected" value="">Select Post</option>
                                @foreach($uniquePosts as $post)
                                    <option value="{{$post}}">{{$post}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label color-theme">Job Category</label>
                            <select class="form-control filter-option" id="select_category">
                                <option slected="selected" value="">Select Category</option>
                                @foreach($uniqueCategories as $item)
                                    <option value="{{$item->category->title}}">{{$item->category ? $item->category->title : ""}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row" id="items-container">
                        @foreach($data as $item)
                        <div class="col-lg-4 col-md-6 col-12 item">
                            <div class="job-card">
                                <h3 class="bg-theme">{{$item->title}}</h3>
                                @php
                                    $createdDate = \Carbon\Carbon::parse($item->created_at);

                                $today = \Carbon\Carbon::today();
                                $daysDifference = $today->diffInDays($createdDate);
                                $monthsDifference = $today->diffInMonths($createdDate);
                                $yearsDifference = $today->diffInYears($createdDate);
                                @endphp
                                <div class="content">
                                    <span class="post-time">
                                        <img src="{{asset('frontend-assets/assets/icons/clock.png')}}" alt="">
                                        @if ($daysDifference == 0)
                                            posted today.
                                        @elseif($yearsDifference>0)
                                            posted {{$yearsDifference}} years ago.
                                        @elseif($monthsDifference >0)
                                            posted {{$monthsDifference }} months ago.
                                        @else
                                            posted {{$daysDifference}} days ago.
                                        @endif
                                    </span>
                                    <h4 class="color-theme category">{{$item->category ? $item->category->title : ""}}</h4>

                                    <ul>
                                        <li>Minimum Years of Experience: {{$item->experience}}</li>
                                        <li>Gender: {{$item->gender}}</li>
                                        <li>School Name: {{$item->school_name}}</li>
                                        <li><span>Location: <span class="location">{{$item->location}}</span></span></li>
                                        <li>Number of Vacancies: {{$item->no_of_vacancy}}</li>
                                    </ul>
                                    {{-- <p>With supporting text below as a natural lead-in to additional content.</p> --}}
                                    <div class="cta-panel">
                                        <a href="{{ url('career/' . $item->slug) }}" class="btn btn-theme btn-cta">Apply now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="view-more-cta">
                        <a href="javascript:void(0)" class="btn btn-theme btn-cta" id="view-more-btn">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

@section('script')
<script>

    $(document).ready(function() {
    $('#select_post, #select_category').change(function() {
        var selectedPost = $('#select_post').val();
        var selectedCategory = $('#select_category').val();

        $('#loader-container').fadeIn();
        $('.item').hide(); // Hide all items first

        setTimeout(function() {
            $('.item').each(function() {
                var jobPost = $(this).find('h3.bg-theme').text().trim(); // Get Job Post (Title)
                var jobCategory = $(this).find('.category').text().trim(); // Get Job Category
                var showItem = true;

                if (selectedPost != '' && selectedPost !== jobPost) {
                    showItem = false; // Hide if job post doesn't match
                }
                if (selectedCategory != '' && selectedCategory !== jobCategory) {
                    showItem = false; // Hide if category doesn't match
                }
                if (showItem) {
                    $(this).show(); // Show only matching items
                }
            });

            $('#loader-container').fadeOut();
        }, 500); // Shorter delay for better UX
    });
});

</script>
@endsection

@extends('front.layout.app')
@section('content')

<div class="page-wrapper">

    <div class="page-wrapper">

        <section class="inner-banner">
            <div class="background"><img src="assets/img/career-banner.jpg" alt="Background"></div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="offset-xxl-1 col-xxl-10 col-12">
                            <h2 class="page-title">Application Form </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="form-section">
            <div class="container">
                <div class="row">
                    <div class="offset-xxl-1 col-xxl-10 col-12">
                        
                        <div class="form-box">
                            <h3>Confirmation</h3>

                            <div class="confirmation-box">
                                <p>You have successfully completed the registration <br>
                                    <span>Application id: <span id="application_id">{{ session('registration_id') }}</span></span>
                                </p>
                                <div class="cta">
                                    <a href="{{route('front.career.index')}}" class="btn btn-theme btn-cta">Back To Career Portal</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function() {
    var application_id = localStorage.getItem('application_id');
    if (application_id) {
        document.getElementById('application_id').textContent = application_id;
    }
});

    if (!sessionStorage.getItem('pageReloaded')) {
        // Clear the localStorage
        localStorage.clear();
        // Set a flag in sessionStorage to indicate that the page has been reloaded once
        sessionStorage.setItem('pageReloaded', 'true');
    }

</script>
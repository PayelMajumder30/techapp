<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NQT7SBML');</script>
    <!-- End Google Tag Manager -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title')</title>
    <meta name="title" content="@yield('meta-title')">
    <meta name="description" content="@yield('meta-description')"/>
    <meta name="keywords" content="@yield('meta-keywords')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{asset('frontend-assets/assets/icons/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('frontend-assets/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend-assets/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend-assets/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('master/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('master/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('master/css/demo.css')}}">
    <link rel="stylesheet" href="{{asset('master/css/webslidemenu.css')}}">
    <link rel="stylesheet" href="{{asset('master/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('master/css/owl.theme.default.min.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@100;200;300;400;500;600;700;800&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('master/plugins/fresco-master/fresco-master/dist/css/fresco.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{asset('master/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NQT7SBML"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="main">
    @yield('content')
    <!-- <header id="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-9">

                </div>
            </div>
        </div>
    </header> -->
    </div>

    <script src="{{ asset('backend-assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend-assets/js/custom.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    @yield('script')
</body>
</html>

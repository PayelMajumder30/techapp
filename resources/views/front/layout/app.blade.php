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
        <header id="header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-9">
                        <a href="{{asset('')}}"><img src="{{asset('master/images/logo.png')}}" class="img-fluid" alt="logo"></a>
                    </div>
                    <div class="col-md-6 col-3 text-right home_icon">
                        <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="humber_icon1">&#9776;</span>
                        <div id="myNav" class="overlay">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
                            <button type="button" class="close" aria-label="Close">
                                <span aria-hidden="true"><img src="{{asset('master/images/closeicon.png')}}" class="img-fluid closeicon" alt=""></span>
                            </button>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
       
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    @yield('script')
    <script>
            function openNav() {
                document.getElementById("myNav").style.height = "100%";
            }
            function closeNav() {
                document.getElementById("myNav").style.height = "0%";
            }
    </script>
    <section class="footer">
        <div class="container">
            <div class="row pt-5 pb-4">
                <div class="col-lg-6 col-md-12 pr-lg-5">
                    <img src="{{asset('master/images/logo2.png')}}" class="img-fluid mb-4 footer_logo" alt="">
                    <p class="text-white">Under the banner of unity and excellence, we forget paths of innovation. 
                        Our all-girls school is a cradle for creativity, character, and courage.</p>
                        <div class="address_box" id="location_box">
                            <div class="row location_cont">
                                <div class="col-md-2 col-2 pr-0"><span><i class="fa fa-map-marker" aria-hidden="true"></i></span></div>
                                <div class="col-md-10 col-10 pl-0"><p class="mb-0 pl-0">{{ $settings[6]->content }}</p></div>
                            </div>
                            <p class="mb-1 contact_box"><span><i class="fa fa-phone" aria-hidden="true"></i></span> <a href="Tel:{{ $settings[0]->content }}">{{ $settings[0]->content }}</a></p>
                            <p class="mb-1 contact_box"><span><i class="fa fa-envelope" aria-hidden="true"></i></span> <a href="mailto:{{ $settings[2]->content }}">{{ $settings[2]->content }}</a></p>
                            <p class="mb-1 contact_box"><span><i class="fa fa-globe" aria-hidden="true"></i></span> <a href="mailto:{{ $settings[8]->content }}">{{ $settings[8]->content }}</a></p>
                        </div>
                </div>
                <div class="col-md-12 text-center footer_bottom">
                    <span class="border_bottom mt-lg-5 mt-md-5 mt-4 mb-4"></span>
                    <p class="mb-0">Copyright @ {{date('Y')}}. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

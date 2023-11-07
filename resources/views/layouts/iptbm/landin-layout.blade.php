<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>
    @yield('meta_data')
    <script
        src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    @vite(['resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
    @yield('style')
    @yield('header')
</head>
<body class="antialiased container-fluid">
<div class="row">
    <div class="col-mnd-auto py-3  bg-dark">
        <img src="{{asset("storage/dost-img/header.png")}}" class="ms-5 img-fluid" width="800">
    </div>
</div>
<div class="row border-bottom shadow sticky-md-top bg-light">
    <div class="col-md-2  d-flex py-2">
        <div class="m-auto ms-3">
            <a href="{{route("welcome-page")}}" class="text-decoration-none">
                <img src="{{asset("storage/dist/img/logo-pcaarrd.png")}}" class="img-fluid ms-0" width="50">
                <span class="fw-bold ms-3">
                IP-TBM RTMS
            </span>
            </a>
        </div>
    </div>
    <div class="col-md-10 d-flex">
        <div class="m-auto me-0">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{route("welcome-page")}}">Home</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav fs-5 nav-pills">
                            <li class="nav-item">
                                <a class="nav-link @if(Route::currentRouteName()==="about-us") active @endif" href="{{route("about-us")}}">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  @if(Route::currentRouteName()==="rtms-page") active @endif" href="{{route("rtms-page")}}">RTMS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Route::currentRouteName()==="trechnologies-page") active @endif" href="{{route("trechnologies-page")}}">Technologies</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Route::currentRouteName()==="contact-us.page") active @endif" href="{{route("contact-us.page")}}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="m-auto">
            @if (Route::has('login'))
                @auth
                    @if(Auth::user()->role==='admin')

                        <a href="{{ route('iptbm.admin.dashboard') }}" role="button" class="btn btn-sm btn-primary" style="scale: 1.2; border-radius: 45rem">
                            <span class="fa-solid fa-house"></span>
                            Home
                        </a>
                    @elseif(Auth::user()->role==='staff')

                        <a href="{{ route('iptbm.staff.dashboard') }}" role="button" class="btn btn-sm btn-primary" style="scale: 1.2; border-radius: 45rem">
                            <span class="fa-solid fa-house"></span>
                            Home
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" role="button" class="btn btn-sm btn-primary" style="scale: 1.2; border-radius: 45rem">
                        <span class="fa-solid fa-power-off"></span>
                        Log in
                    </a>
                @endauth
            @endif
        </div>
    </div>

</div>
<div class="container-fluid my-3  mt-5">
    <div class="row">
        <div class="col-md-10 m-auto ">
            @yield('content')
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-auto me-5 ms-auto">
        <!---
        <small class="text-muted opacity-50 fw-bold" style="font-family: Nunito,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;
        font-feature-settings: normal">Website desinged by Capiz State University</small>
        -->
    </div>
</div>
<div id="gwt-standard-footer" class="container-fluid ">

</div>
<div id="gwt-footer-jsdk" class="container-fluid ">

</div>
<!--
<script type="text/javascript">
    $(document).ready(function(){
        (function(d, s, id) {
            var js, gjs = d.getElementById('gwt-standard-footer');

            js = d.createElement(s); js.id = id;
            js.src = "//gwhs.i.gov.ph/gwt-footer/footer.js";
            gjs.parentNode.insertBefore(js, gjs);

        }(document, 'script', 'gwt-footer-jsdk'));
    })
</script>
<script src="https://gwhs.i.gov.ph/gwt-footer/footer.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        (function(d, eId){
            var js, gjs = d.getElementById(eId);
            js = d.createElement("script"); js.id = "gwt-pst-jsdk";
            js.src = "//gwhs.i.gov.ph/pst/gwtpst.js?"+new Date().getTime();
            gjs.parentNode.insertBefore(js, gjs);
        }(document, "gwt-pst"));
        var gwtpstReady = function(){new gwtpstTime({elementId: 'pst-time',keyboardTrap: true});
        }
    });


</script>
-->
@yield("script")
</body>

</html>

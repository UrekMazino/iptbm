<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>
    @yield('meta_data')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <script
        src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/datatables.min.css" rel="stylesheet"/>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/datatables.min.js"></script>
    @yield('data_tables')
    <link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css' rel='stylesheet' type='text/css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js' type='text/javascript'></script>
    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])

</head>
<body class="antialiased bg-secondary bg-opacity-10">
<x-iptbm.pre-loader></x-iptbm.pre-loader>
<style>
    .chart-container {

        margin: auto;
    }
</style>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-md-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark vh-100 sticky-md-top overflow-auto ">
            <div class="d-flex flex-column align-items-center align-items-sm-start  pt-2 text-white min-vh-100 ">
                <div class="navbar navbar-brand my-3 w-100 bg-secondary rounded px-1 py-3">
                    <a href="#" class="d-flex align-items-center ms-2  mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fa-solid fa-clock text-light me-2 ms-2" style="scale: 2"></span><span class="ms-3">IP-TBM RTMS</span>
                    </a>
                </div>

                <ul class="nav  flex-column nav-pills w-75   contin" role="tablist">
                    <li class="nav-item pt-1 tabhome side-bot" role="presentation" >
                        <a
                            class="nav-link py-3  link-info tabsBase @if(Request::segment(2)==null) active link-light @endif"
                            id="ex1-tab-1"
                            data-mdb-toggle="tab"
                            href="{{route("iptbm.staff.dashboard")}}"
                            role="tab"
                            aria-controls="ex1-tabs-1"
                            aria-selected="true"

                        ><i style="scale: 1.5" class="fa-solid fa-chart-simple me-2  text-secondary @if(Request::segment(2)==null) text-light @endif"></i>Dashboard</a>
                    </li>
                    <li class="nav-item pt-1 tabhome side-bot " role="presentation">
                        <a
                            class="nav-link py-3 link-info tabsBase  @if(Request::segment(2)=="profile") active link-light @endif"
                            id="ex1-tab-2"
                            data-mdb-toggle="tab"
                            href="{{route("iptbm.staff.ipProfile")}}"
                            role="tab"
                            aria-controls="ex1-tabs-2"
                            aria-selected="false"
                        ><i style="scale: 1.5" class="fa-solid fa-briefcase text-secondary text-opacity-75 me-2  @if(Request::segment(2)=="profile") text-light @endif"></i>Profiles</a>
                    </li>
                    <li class="nav-item pt-1 tabhome side-bot" role="presentation">
                        <a
                            class="nav-link py-3 link-info tabsBase  @if(Request::segment(2)=="inventor") active link-light @endif"
                            id="ex1-tab-3"
                            data-mdb-toggle="tab"
                            href="{{route("iptbm.staff.inventor")}}"
                            role="tab"
                            aria-controls="ex1-tabs-3"
                            aria-selected="false"
                        ><i style="scale: 1.5" class="fa-solid fa-users-gear text-secondary text-opacity-75 me-2  @if(Request::segment(2)=="inventor") text-light @endif"></i>Inventor</a>
                    </li>
                    <li class="nav-item pt-1 tabhome side-bot" role="presentation">
                        <a
                            class="nav-link py-3 link-info tabsBase  @if(Request::segment(2)=="technology") active link-light @endif"
                            id="ex1-tab-3"
                            data-mdb-toggle="tab"
                            href="{{route("iptbm.staff.technology")}}"
                            role="tab"
                            aria-controls="ex1-tabs-3"
                            aria-selected="false"
                        ><i style="scale: 1.5" class="fa-solid fa-microchip text-secondary text-opacity-75 me-2  @if(Request::segment(2)=="technology") text-light @endif"></i>Technology</a>
                    </li>
                    <hr>
                    <div class="text-muted h6 ms-3">
                        Tech trans Pathways
                    </div>
                    <li class="nav-item pt-1 tabhome side-bot" role="presentation">
                        <a
                            class="nav-link py-2 link-info tabsBase  @if(Request::segment(2)=="deployment") active link-light @endif"
                            id="ex1-tab-3"
                            data-mdb-toggle="tab"
                            href="{{route("iptbm.staff.deployment.index")}}"
                            role="tab"
                            aria-controls="ex1-tabs-3"
                            aria-selected="false"
                        ><i class="fa-solid fa-truck-arrow-right text-secondary text-opacity-75 me-2  @if(Request::segment(2)=="deployment") text-light @endif"></i>Deployment</a>
                    </li>
                    <li class="nav-item pt-1 tabhome side-bot" role="presentation">
                        <a
                            class="nav-link py-2 link-info tabsBase  @if(Request::segment(2)=="extension") active link-light @endif"
                            id="ex1-tab-3"
                            data-mdb-toggle="tab"
                            href="{{route("iptbm.staff.extension.index")}}"
                            role="tab"
                            aria-controls="ex1-tabs-3"
                            aria-selected="false"
                        ><i class="fa-solid fa-people-arrows text-secondary text-opacity-75 me-2  @if(Request::segment(2)=="extension") text-light @endif"></i>Extension</a>
                    </li>
                    <li class="nav-item pt-1 tabhome " role="presentation">
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link text-info  align-middle tabsBase">
                            Commercialization
                        </a>
                        <ul class="collapse @if(Request::segment(2)=="ip-management"||Request::segment(2)=="pre-commercialization" ||Request::segment(2)=="adopter") show @endif   nav ms-4" id="submenu1" data-bs-parent="#menu">
                            <li class="nav-item p-0 pt-1 w-75 tabhome side-bot" role="presentation">
                                <a
                                    class="nav-link py-2 link-info tabsBase @if(Request::segment(2)=="ip-management") active link-light @endif"
                                    id="ex1-tab-3"
                                    data-mdb-toggle="tab"
                                    href="{{route("iptbm.staff.ip-management")}}"
                                    role="tab"
                                    aria-controls="ex1-tabs-3"
                                    aria-selected="false"
                                ><i class="fa-solid fa-circle-exclamation text-secondary text-opacity-75 me-2  @if(Request::segment(2)=="ip-management") text-light @endif"></i>IP Alert</a>
                            </li>
                            <li class="nav-item w-75 pt-1 tabhome side-bot" role="presentation">
                                <a
                                    class="nav-link py-2 link-info tabsBase @if(Request::segment(2)=="pre-commercialization") active link-light @endif"
                                    id="ex1-tab-3"
                                    data-mdb-toggle="tab"
                                    href="{{route("iptbm.staff.precom.index")}}"
                                    role="tab"
                                    aria-controls="ex1-tabs-3"
                                    aria-selected="false"
                                ><i class="fa-solid fa-shop-lock text-secondary text-opacity-75 me-2  @if(Request::segment(2)=="pre-commercialization") text-light @endif"></i>Pre Com</a>
                            </li>
                            <li class="nav-item pt-1 w-75 tabhome side-bot" role="presentation">
                                <a
                                    class="nav-link py-2 link-info tabsBase @if(Request::segment(2)=="adopter") active link-light @endif"
                                    id="ex1-tab-3"
                                    data-mdb-toggle="tab"
                                    href="{{route("iptbm.staff.adopter.index")}}"
                                    role="tab"
                                    aria-controls="ex1-tabs-3"
                                    aria-selected="false"
                                ><i class="fa-solid fa-building-circle-arrow-right text-secondary text-opacity-75 me-2  @if(Request::segment(2)=="adopter") text-light @endif"></i>Adopter</a>
                            </li>
                        </ul>
                    </li>

                </ul>
                <hr>
                <div>
                    <form method="post" action="{{route("logout")}}">
                        @csrf
                        <button class="btn btn-sm link-info" type="submit">
                            <span class="fa-solid fa-power-off text-muted me-2" style="scale:1.5"></span>Logout
                        </button>
                    </form>
                </div>
                <!---
                   <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">loser</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="post" action="{{route("logout")}}">
                                @csrf
                <a type="submit" class="btn btn-primary btn-sm dropdown-item" role="button">
                    Sign out
                </a>
            </form>
        </li>
    </ul>
</div>
--->

            </div>
        </div>
        <div class="col">
            @yield('header')

            <div class="tab-content" id="ex1-content">
                @yield('content')
            </div>

        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
@yield('script')
<script type="text/javascript">
    $(document).ready(function(){

        $('#calendar').fullCalendar({

        });
        setTimeout(function(){
            $('.spinner-wrapper').css({
                opacity:0,
                transform:'translate(0,-100%)',
                animation: 'shake 0.5s'
            })
        },500)
    })

</script>

</body>

</html>

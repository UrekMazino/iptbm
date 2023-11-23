<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
          rel="stylesheet">
    <link
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.1/fh-3.3.2/r-2.4.1/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/datatables.min.css"
        rel="stylesheet"/>


    <!-- Scripts -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css' rel='stylesheet'/>


    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.1/fh-3.3.2/r-2.4.1/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/datatables.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/date-1.4.1/fc-4.2.2/fh-3.3.2/kt-2.9.0/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/sr-1.2.2/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

    @vite([ 'resources/js/app.js','resources/css/app.css'])
    @livewireStyles
</head>
<body class="antialiased bg-gray-300 dark:bg-gray-900 dark:bg-opacity-95">
<x-iptbm.pre-loader></x-iptbm.pre-loader>

<div class="antialiased pb-10">

    <!-- Sidebar -->
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
            type="button"
            class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
             xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                  d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <aside

        class="fixed top-0 left-0 z-40 w-64 h-screen  transition-transform -translate-x-full  border-r border-gray-200 md:translate-x-0 bg-gray-800 dark:border-gray-700"
        aria-label="Sidenav"
        id="default-sidebar">

        <ul class="space">

            <li class="nav-item border-bottom border-light border-opacity-10">
                <nav class="navbar  ms-2">
                    <div class="container-fluid">
                        <a class="navbar-brand light-fnt"
                           href="{{\App\Providers\RouteServiceProvider::IPTBM_ADMIN_DASHBOARD}}">
                            <img src="{{ asset('assets/dist/img/logo-pcaarrd.png') }}" alt="" width="30"
                                 class="d-inline-block align-text-top">
                            <span class="light-fnt">RAISE-MS</span>
                        </a>
                    </div>
                </nav>
            </li>
            <li class="nav-item">
                <nav class="navbar navbar-light navbar-expand-lg mx-2 border-bottom border-light border-opacity-10">
                    <div class="container-fluid">
                        <a class="navbar-brand text-light text-opacity-50" href="#">
                            <img src="{{ asset('assets/dist/img/profile-blank.png') }}" alt="" width="30"
                                 class="d-inline-block align-text-top img-thumbnail p-0 shadow rounded-5 imgR">
                            <span class="light-fnt">Admin</span>
                        </a>
                    </div>
                </nav>
            </li>
            <li class="nav-item text-light text-opacity-50">
                <div class="m-auto col-md-12 ps-3 pt-4 pe-4">
                    <div class="my-2">
                        <button id="theme-toggle" type="button"
                                class="text-wrap transition duration-300 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-900 rounded-lg text-sm p-2.5">
                            <div id="theme-toggle-dark-icon" class="hidden">
                                <div class="flex justify-between ">
                                    <svg class="w-5 h-5 me-2" fill="currentColor" viewBox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                    </svg>
                                    Dark theme
                                </div>

                            </div>
                            <div id="theme-toggle-light-icon" class="hidden">
                                <div class="flex justify-between">
                                    <svg class=" w-5 h-5 me-2" fill="currentColor" viewBox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                            fill-rule="evenodd" clip-rule="evenodd"></path>
                                    </svg>
                                    Light theme
                                </div>

                            </div>
                        </button>

                    </div>
                    <ul class="nav flex-column nav-pills">
                        <li class="list-item py-2">
                            <a href="{{\App\Providers\RouteServiceProvider::IPTBM_ADMIN_DASHBOARD}}"
                               class="flex justify-items-center hover:bg-gray-900 p-2 transition duration-300 rounded-lg">
                                <svg class="w-6 h-6 me-2 text-gray-50" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="M1 12v5m5-9v9m5-5v5m5-9v9M1 7l5-6 5 6 5-6"/>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li class="list-item py-1">
                            <h5 class="light-fnt">Main Menu</h5>
                        </li>
                        <li class="list-inline-item ms-2">
                            <a class="nav-link @if(Request::segment(2)=='add-record') active  @endif text-gray-100 "
                               href="{{ route('iptbm.admin.addrecord.region') }}">
                                <span class="fa-solid fa-plus-circle"></span>
                                <span class="ms-3">Add new Record</span>
                            </a>
                        </li>
                        <li class="list-inline-item py-2 ms-2">
                            <a class="nav-link @if(Request::segment(2)=='iptbm-prof') active  @endif text-gray-100"
                               href="{{ route('iptbm.admin.iptbm_profiles.index') }}">
                                <span class="fa-solid fa-list"></span>
                                <span class="ms-3">IP-TBM's</span>
                            </a>
                        </li>
                        <li class="list-inline-item py-2 ms-2">
                            <a class="nav-link @if(Request::segment(2) === 'ip-alerts' || (Request::segment(1) === 'ip-alerts' && is_null(Request::segment(2))) )  active  @endif text-gray-100"
                               href="{{ route('iptbm.admin.ipalerts') }}">
                                <span class="fa-solid fa-exclamation-circle"></span>
                                <span class="ms-3">IP-Alerts</span>
                            </a>
                        </li>
                        <li class="list-inline-item py-2 ms-2">
                            <button type="button"
                                    class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 text-gray-100 dark:hover:bg-gray-700"
                                    aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages">
                                <svg aria-hidden="true"
                                     class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 group-hover:text-gray-900  dark:group-hover:text-white"
                                     fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span class="flex-1 ml-3 text-left whitespace-nowrap">Reports</span>
                                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <ul id="dropdown-pages"
                                class="@if(Request::segment(2)=='reports') active dark:text-gray-300 @else hidden @endif  py-2 space-y-2">
                                <li>
                                    <a href="" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700
                                    @if(Request::segment(2)=='reports') bg-blue-600  @endif ">Technologies</a>
                                </li>
                                <li>
                                    <a href="#"
                                       class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Tech
                                        Trans</a>
                                </li>

                            </ul>

                        </li>
                        <li class="">
                            <a class="nav-link text-light text-opacity-50" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="fa-solid fa-power-off"></span>
                                <span class="ms-3">{{ __('Logout') }}</span>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>

    </aside>

    <main class="p-0 md:ml-64 mb-10  pt-20 h-screen">
        <x-iptbm.admin.add-record-header>
            <div class="search-box">
                <form action="" method="GET">
                    <input type="text" name="search" placeholder="Search..." class="search-input">
                    <button type="submit" class="search-button">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </x-iptbm.admin.add-record-header>
        @yield('content')

    </main>

</div>

@livewireScripts

<script type="text/javascript">
    $(document).ready(function () {

        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }


        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function () {

            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

                // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }

        });
    });
</script>
@yield('script')
@stack('scripts')


<script type="text/javascript">
    $(document).ready(function () {

        setTimeout(function () {
            $('.spinner-wrapper').css({
                opacity: 0,
                transform: 'translate(0,-100%)',
                animation: 'shake 0.5s'
            });
        }, 500);


    });
</script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<!--
<footer class="mt-10">
    <div id="gwt-standard-footer" >

    </div>
</footer>
<script src="//gwhs.i.gov.ph/gwt-footer/footer.js"></script>
-->
</body>
</html>

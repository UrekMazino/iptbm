<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        ABH: {{ config('app.name', 'Laravel') }}
        @yield('title')
    </title>

    <link rel="shortcut icon" href="{{ asset('assets/logo/iptbm.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/logo/iptbm.ico') }}">
    <script
        src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"></script>
    <!--- new Lub DataTable---->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" rel="stylesheet">
    <link
        href="https://cdn.datatables.net/v/ju/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/cr-1.7.0/date-1.5.1/fc-4.3.0/fh-3.4.0/rg-1.4.0/sc-2.2.0/sp-2.2.0/sl-1.7.0/sr-1.3.0/datatables.min.css"
        rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/ju/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/cr-1.7.0/date-1.5.1/fc-4.3.0/fh-3.4.0/rg-1.4.0/sc-2.2.0/sp-2.2.0/sl-1.7.0/sr-1.3.0/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <!--- new Lub DataTable---->

    <script src="https://kit.fontawesome.com/c9f4f44ea7.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>


    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased temp-background">
<x-iptbm.pre-loader></x-iptbm.pre-loader>
<div class="min-h-screen bg-gray-200 dark:bg-gray-900  max-w-screen-2xl w-full   m-auto ">


    {{------------
    @include('admin.iptbm.layout.sidebar')
    ---------------}}
    <livewire:abh.admin.side-bar/>
    <main class=" md:ml-64 h-auto pb-5">
        <nav class="bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 ">
            <div class="flex flex-wrap justify-between items-center">
                <div class="flex justify-start items-center">

                    <button
                        data-drawer-target="drawer-navigation"
                        data-drawer-toggle="drawer-navigation"
                        aria-controls="drawer-navigation"
                        class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >
                        <svg
                            aria-hidden="true"
                            class="w-6 h-6"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                        <svg
                            aria-hidden="true"
                            class="hidden w-6 h-6"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                        <span class="sr-only">Toggle sidebar</span>
                    </button>
                    <a href="{{\App\Providers\RouteServiceProvider::ABH_ADMIN_DASHBOARD}}"
                       class="flex items-center justify-between mr-4">
                        <img src="{{asset('assets/logo/img.png')}}" alt=""
                             class="d-inline-block align-text-top mr-3 h-8">
                        <span
                            class="self-center text-2xl font-bold gradient-text whitespace-nowrap ">ABH MS</span>
                    </a>

                </div>
                <div class="flex items-center lg:order-2">


                    <!-- Apps -->
                    <div class="my-2 ">
                        <button id="theme-toggle" type="button"
                                class="text-wrap transition duration-300 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-900 rounded-lg text-sm p-2.5">
                            <div id="theme-toggle-dark-icon" class="hidden">
                                <div class="flex justify-between items-center">
                                    <svg class="w-6 h-6 me-2" fill="currentColor" viewBox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                    </svg>
                                    <span class="hidden md:block">
                                        Dark Mode
                                    </span>

                                </div>

                            </div>
                            <div id="theme-toggle-light-icon" class="hidden">
                                <div class="flex justify-between items-center">
                                    <svg class=" w-6 h-6 me-2" fill="currentColor" viewBox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                            fill-rule="evenodd" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="hidden md:block">
                                       Light Mode
                                    </span>

                                </div>

                            </div>
                        </button>

                    </div>
                    <!-- Dropdown menu -->

                    <button
                        type="button"
                        class="flex mx-3 border border-gray-300 dark:border-gray-600 text-sm bg-white shadow  dark:bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button"
                        aria-expanded="false"
                        data-dropdown-toggle="user-menu-profile"
                    >
                        <span class="sr-only">Open user menu</span>
                        <div class=" font-medium text-sky-400 dark:text-sky-600 p-2 ">
                            ADMINISTRATOR
                        </div>
                    </button>
                    <!-- Dropdown menu -->
                    <div
                        class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
                        id="user-menu-profile"
                    >
                        <div class="py-3 px-4 text-gray-800 dark:text-gray-200">
                            System Administrator
                        </div>


                        <ul
                            class="py-1 text-gray-700 dark:text-gray-300"
                            aria-labelledby="dropdown"
                        >
                            <li>
                                <a
                                    href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="block py-2 px-4 text-sm rounded-b-lg hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                          class="d-none">
                                        @csrf
                                    </form>
                                    Sign out</a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        {{$slot}}
    </main>

</div>
<x-dev-footer/>
@yield('script')
@stack('scripts')
@livewireScripts
<script type="text/javascript">
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
</script>
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
    document.addEventListener('livewire:load', function () {
        Livewire.on('reloadPage', function () {
            // Reload the page
            location.reload();
        });
    });
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 temp-background  relative">
            <div id="particles-js" class="absolute left-0 top-0 w-full z-10  h-screen"></div>
            <div class="w-full sm:max-w-md absolute z-30 md:shadow-lg md:shadow-black overflow-hidden sm:rounded-lg p-3 backdrop-blur-sm">

                <div class="m-auto w-fit">
                    <a href="/" class="m-auto">
                        <img class="w-20 h-20 m-auto" src="{{asset("assets/logo/img.png")}}" alt="DOST">
                    </a>
                    <div class="font-extrabold my-3 pb-2 text-2xl text-white text-center border-b border-b-gray-500">
                        DOST-PCAARRD
                    </div>
                    <div class="font-bold px-10 font- my-2 text-2xl text-green-500 text-center ">
                        Regional Agri-Aqua Innovation System Enhancement (RAISE)
                    </div>
                    <div class="font-bold px-10 font- my-3 pb-2 text-xl text-white text-center border-b border-b-gray-500">
                        @if(isset($component))
                            {{$component}}
                        @endif
                    </div>
                </div>
                <div class=" mt-4 px-6 py-2   ">
                    {{ $slot }}
                </div>
            </div>

        </div>

        <script type="text/javascript" src="{{asset('/assets/particle/particles.js')}}"></script>
        <script src="{{asset('/assets/particle/app.js')}}"></script>

    </body>

</html>

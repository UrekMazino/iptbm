@extends('layouts.iptbm.staff')

@section('title')
    {{"| IP-application"}}
@endsection

@section('meta_data')
    <meta name="description" content=" Technologies under IP protection application">
@endsection

@section('content')
    <div class="w-full">
        <nav
            class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-start mx-auto p-4">

                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li class="inline-flex items-center">
                                <a href="{{route("iptbm.staff.ip-management")}}"
                                   class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                                    </svg>
                                    Home
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <a href="{{route("iptbm.staff.ip-management.application.index",['id'=>$ip_alert->id])}}"
                                       class="ml-1 text-sm font-medium  hover:text-blue-600 md:ml-2 text-blue-700 ">Ip
                                        Application</a>

                                </div>
                            </li>


                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <a href="{{route("iptbm.staff.ip-alert.task",['id'=>$ip_alert->id])}}"
                                       class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Ip
                                        Task</a>

                                </div>
                            </li>
                        </ol>
                    </nav>

                </div>
            </nav>
        </nav>


        <div class="px-4 mt-10">
            <div
                class="border-1 border-l border-r border-t border-b rounded-lg border-gray-300 dark:border-gray-600  mb-4 text-gray-300 bg-gray-300 dark:text-gray-400 dark:bg-gray-800 relative overflow-hidden">
                <div class="grid grid-cols-1 relative overflow-hidden rounded-lg py-24">
                    <img src="{{Storage::url($ip_alert->technology->tech_photo)}}" alt="Background Image"
                         class="absolute  top-0 left-0 w-full h-full object-cover filter blur">
                    <div class="absolute top-0 left-0 w-full h-full bg-black  bg-opacity-75 rounded-lg"></div>
                    <div class="z-10 p-4">
                        <div class="m-auto w-full md:w-3/4">
                            <div class="mx-auto px-3  ">
                                <div class="mx-auto px-3 text-center text-2xl">
                                    <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                       href="{{route("iptbm.staff.technology.show",["id"=>$ip_alert->technology->id])}}">
                                        {{$ip_alert->technology->title}}
                                    </a>

                                </div>
                            </div>
                            <hr class="h-px   border-0 bg-gray-400 dark:bg-gray-300">
                            <div class="mx-auto px-3 w-fit text-gray-400 dark:text-gray-400">
                                Technology Title
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="text-gray-700 dark:text-gray-400 font-bold text-2xl mt-10 mb-3">
                {{$ip_alert->ip_type->name}} Application Details
            </div>

        </div>
        <livewire:iptbm.staff.ip-management.ip-application-details :ipAlert="$ip_alert"/>


    </div>
@endsection
@section('script')
    <script type="text/javascript">

    </script>
@endsection

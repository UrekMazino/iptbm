@extends('layouts.iptbm.staff')

@section('title')
    {{"| Pathway-deployment"}}
@endsection

@section('content')
    <div class="w-full">
        <nav
            class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-start mx-auto p-4">
                    <div class=" w-full flex justify-between items-center " id="navbar-default">
                        <a href="{{route("iptbm.staff.extension.index")}}"
                           class="hover:bg-gray-200 dark:hover:bg-gray-800">
                            <i class="fa-solid fa-house scale-125 me-2 text-blue-500"></i><strong class="text-gray-500">Home </strong>
                        </a>
                    </div>
                </div>
            </nav>

        </nav>

        <div class="px-4 mt-10">

            <div class="text-gray-700 dark:text-gray-400 font-bold text-2xl mb-3">
                Technology Extension Details
            </div>
            <div
                class="border-1 border-l border-r border-t border-b rounded-lg border-gray-300 dark:border-gray-600  mb-4 text-gray-300 bg-gray-300 dark:text-gray-400 dark:bg-gray-800 relative overflow-hidden">
                <div class="grid grid-cols-1 relative overflow-hidden rounded-lg py-24">
                    <img src="{{Storage::url($tech->technology->tech_photo)}}" alt="Background Image"
                         class="absolute  top-0 left-0 w-full h-full object-cover filter blur">
                    <div class="absolute top-0 left-0 w-full h-full bg-black  bg-opacity-75 rounded-lg"></div>
                    <div class="z-10 p-4">
                        <div class="m-auto w-full md:w-3/4">
                            <div class="mx-auto px-3  ">
                                <div class="mx-auto px-3 text-center text-2xl">
                                    <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                       href="{{route("iptbm.staff.technology.show",["id"=>$tech->technology->id])}}">
                                        {{$tech->technology->title}}
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

            <div class="inline-flex items-center justify-center mt-10 w-full">
                <hr class="w-64 h-1  bg-gray-600 border-0 dark:bg-gray-200">
                <span class="px-3 font-medium text-gray-900  bg-gray-200  dark:text-white dark:bg-gray-900">
                  Adopter  Details
                </span>
                <hr class="w-64 h-1  bg-gray-600 border-0 dark:bg-gray-200">
            </div>


            <livewire:iptbm.staff.extension.extension-tech-details :extension="$tech"/>


        </div>

    </div>

@endsection
@section('script')
@endsection

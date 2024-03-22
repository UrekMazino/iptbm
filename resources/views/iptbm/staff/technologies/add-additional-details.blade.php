@extends('layouts.iptbm.staff')

@section('title')
    {{"| additional-details"}}
@endsection

@section('content')
    <div class="w-full">

        <nav
            class="bg-white border-b border-gray-200  sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-start mx-auto p-4">

                    <div class=" w-full flex justify-between items-center " id="navbar-default">
                        <div class=" text-gray-700 dark:text-gray-400">
                            <a href="{{route("iptbm.staff.technology")}}">
                                <i class="fa-solid fa-house scale-125 me-2 text-blue-500"></i> My Technologies
                            </a>
                        </div>


                    </div>
                </div>
            </nav>

        </nav>
        <div class="px-4 mt-4">
            <livewire:iptbm.staff.technology.add-technology :profile="$profile"/>
        </div>

    </div>
@endsection


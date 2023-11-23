@extends('layouts.iptbm.staff')

@section('title')
    {{"| technology-public"}}
@endsection

@section('content')
    <div class="w-full">

        <nav
            class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-start mx-auto p-4">

                    <div class=" w-full flex justify-between items-center " id="navbar-default">
                        <a class="text-blue-500 flex dark:text-sky-500" href="{{route("iptbm.staff.technology.all")}}">
                            <svg class="w-6 me-2 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                            </svg>
                            Back
                        </a>
                    </div>
                </div>
            </nav>
        </nav>
        <div class="px-4 w-full mt-5">
            <x-card>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div class="border rounded border-gray-300 p-2 dark:border-gray-600">
                            <x-item-header>
                                Technology Title
                            </x-item-header>
                            <div class="m-auto w-full  font-medium text-lg text-gray-600 dark:text-white">
                                {{$technology->title}}
                            </div>
                        </div>
                        <div class="border rounded border-gray-300  p-2 dark:border-gray-600">
                            <x-item-header>
                                Technology Owner
                            </x-item-header>
                            <div class="m-auto w-full  font-medium text-lg text-gray-600 dark:text-white">
                                {{$techOwner->name}}
                            </div>
                        </div>
                        <div class="border rounded border-gray-300  p-2 dark:border-gray-600">

                            <x-item-header>
                                Technology Inventor
                            </x-item-header>
                            <div class="m-auto w-full  font-medium text-lg text-gray-600 dark:text-white">
                                <ul>
                                    @foreach($technology->techgenerators as $inventor)
                                        <li>
                                            {{$inventor->inventor->name}}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="border rounded border-gray-300  p-2 dark:border-gray-600">

                            <x-item-header>
                                Technology Description
                            </x-item-header>
                            <p class="text-gray-600 dark:text-gray-200">
                                {{$technology->tech_desc}}
                            </p>
                        </div>
                    </div>
                    <div class="aspect-square border border-gray-400 dark:border-gray-600 rounded">
                        @if($technology->tech_photo)
                            <img class="w-auto h-full object-contain " src="{{Storage::url($technology->tech_photo)}}"
                                 alt="technlogy photo">
                        @endif

                    </div>

                </div>
            </x-card>

        </div>
    </div>
@endsection

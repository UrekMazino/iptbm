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
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 md:gap-x-10">
                <div class="space-y-4 md:col-span-3">
                    <x-card-panel >
                        <div class="aspect-square border border-gray-400 dark:border-gray-600 rounded">
                            @if($technology->tech_photo)
                                <img class="w-auto h-full object-contain " src="{{Storage::url($technology->tech_photo)}}"
                                     alt="technlogy photo">
                            @endif

                        </div>
                    </x-card-panel>
                    <x-card-panel>
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
                    </x-card-panel>
                </div>
               <div class="md:col-span-2">
                   <x-card-panel title="Technology photos">
                       <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                           @forelse($technology->full_description->technology_photos as $photo)
                               <x-pop-modal name="tech-photo-{{$photo->id}}" class="max-w-3xl group relative">
                                   <div class="w-full h-auto max-h-full flex justify-center items-center relative">
                                       <img class="w-auto  max-h-full"
                                            src="{{\Illuminate\Support\Facades\Storage::url($photo->file)}}">

                                   </div>
                                   @if($photo->file_description)
                                       <div
                                           class="opacity-0 rounded-b-lg group-hover:opacity-70   group-hover:bg-gray-500 group-hover:dark:bg-gray-950 transition duration-300 absolute bottom-0 left-0 flex justify-center items-center w-full h-auto">
                                           <div
                                               class="font-medium text-lg text-gray-200 dark:text-white p-4">
                                               {{ $photo->file_description}}
                                           </div>
                                       </div>
                                   @endif
                               </x-pop-modal>
                               <div
                                   class="flex rounded overflow-hidden justify-center items-center aspect-square border border-gray-300 dark:border-gray-600 p-2 relative">

                                   <img data-modal-toggle="tech-photo-{{$photo->id}}"
                                        class="w-auto cursor-pointer h-auto hover:scale-110 transition duration-300 max-h-full"
                                        src="{{\Illuminate\Support\Facades\Storage::url($photo->file)}}">
                               </div>
                           @empty
                               No data available

                           @endforelse
                       </div>
                   </x-card-panel>
               </div>
            </div>


        </div>
    </div>
@endsection

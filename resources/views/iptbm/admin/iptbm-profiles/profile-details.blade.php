@extends('layouts.iptbm.admin')


@section('content')

    <div class="p-4 my-3">
        @if($profile->logo)
            <div id="profile" tabindex="-1"
                 class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-7xl max-h-full">
                    <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                data-modal-hide="profile">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-10 text-center m-auto">
                            <img class=" max-w-fit rounded-lg m-auto object-contain w-full h-full"
                                 src="{{Storage::url($profile->logo)}}" alt="image description">
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <livewire:iptbm.admin.iptbm.profiles :profile="$profile"/>
        <livewire:iptbm.admin.iptbm.navigation :profile_id="$profile->id"  :current="Route::currentRouteName()"/>
            <div class="w-full relative">
                <div class="inline-flex items-center justify-center w-full">
                    <hr class="w-64 h-1 my-8 bg-gray-200 border-0 rounded dark:bg-gray-700">
                    <div class="absolute text-2xl font-medium text-gray-700 dark:text-gray-200 px-4 -translate-x-1/2  left-1/2 bg-transparent">
                        Profile Details
                    </div>
                    <hr class="w-64 h-1 my-8 bg-gray-200 border-0 rounded dark:bg-gray-700">
                </div>
            </div>
            @section('sub-content')
            @show
    </div>
@endsection

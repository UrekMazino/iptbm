@extends('admin.iptbm.layout.app')

@section('content')
    <div class="w-full">
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
        <nav
            class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">
            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="flex justify-between items-center">
                    <div class="me-4 p-4">
                        <a href="{{route("iptbm.admin.iptbm_profiles.index")}}">
                            <x-secondary-button class="text-sky-600 dark:text-sky-600">
                                <svg class="w-4 me-2 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                                </svg>
                                Back to Profiles
                            </x-secondary-button>
                        </a>
                    </div>

                    <div id="botNav" class="me-4">

                    </div>

                </div>

            </nav>

        </nav>
        <div class="p-0 md:px-4 w-full mt-5">
            <livewire:iptbm.admin.iptbm.profiles :profile="$profile"/>
            <livewire:iptbm.admin.profile.profile-detail :profile="$profile"/>

        </div>
    </div>
@endsection

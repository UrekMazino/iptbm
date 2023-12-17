@extends('layouts.iptbm.staff')

@section('title')
    {{"| view-profile"}}
@endsection

@section('content')
    <div class="w-full">
        @if($profile->logo)
            <div id="profile" tabindex="-1"
                 class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-7xl max-h-full">
                    <div class="relative bg-gray-50 rounded-lg shadow w-1/2 h-full m-auto dark:bg-gray-700">
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
                        <div class="p-10 text-center m-auto aspect-square">
                            <img class="  rounded-lg m-auto object-contain w-full h-full"
                                 src="{{Storage::url($profile->logo)}}" alt="image description">
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <nav class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">


            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-start mx-auto p-4">

                    <div class=" w-full flex  md:w-auto" id="navbar-default">
                        <a href="{{route("iptbm.staff.allProfile")}}"
                           class=" text-blue-500 inline-flex w-fit flex-col items-center justify-center px-5">
                            <span class="fa-solid fa-home"></span>
                        </a>
                        <div class="m-auto col-start-2 col-end-6">
                    <span class="text-xl text-gray-400 dark:text-gray-500">
                        {{$profile->region->name}}
                    </span>
                            <span class="text-sm ms-4 text-gray-700 dark:text-gray-400 hidden md:inline">
                        {{$profile->agency->name}}
                    </span>
                        </div>
                    </div>
                </div>
            </nav>

        </nav>

        <div class="my-3 mx-lg-5 mt-10 px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 p-5  gap-4 relative rounded-lg overflow-hidden">

                <img src="{{Storage::url($profile->logo)}}" alt="Background Image"
                     class="absolute  top-0 left-0 w-full h-full object-cover filter blur">
                <div class="absolute top-0 left-0 w-full h-full bg-black  opacity-25 rounded-lg"></div>
                <!-- Your content here -->
                <div class="aspect-square z-20">
                    <div
                        class="w-full  h-full p-6 bg-black overflow-hidden border-t border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        @if($profile->logo)

                            <a data-modal-target="authentication-modal" data-modal-toggle="profile" role="button">
                                <img
                                    class="hover:scale-110 transition duration-300 max-w-lg rounded-lg object-contain w-full h-full"
                                    src="{{Storage::url($profile->logo)}}" alt="image description">
                            </a>
                        @endif
                    </div>
                </div>
                <div
                    class="col-span-2 bg-gray-500 text-gray-300 dark:bg-gray-800 bg-opacity-50 dark:bg-opacity-50 z-20 ">
                    <div class="flex items-center  h-full w-full m-auto">
                        <h1 class="text-3xl text-white text-center w-auto m-auto">
                            @if($profile->tag_line)
                                {{$profile->tag_line}}
                            @else
                                Tag line
                            @endif
                        </h1>
                    </div>
                </div>
            </div>
            <x-header-label class="mt-10 mb-4">
                {{$profile->agency->name}} Profile
            </x-header-label>
            <div class="space-y-4">
                <x-grid col="2" gap="10">
                    <div class="space-y-4">
                        <x-card-panel title="Profile Information">
                            <div class="space-y-4">
                                <div class="divide-y divide-200 dark:divide-gray-700">
                                    @if($profile->office_address)
                                        <span class="text-gray-700 dark:text-gray-200">
                                    {{$profile->office_address}}
                                </span>

                                    @else
                                        <span class="text-gray-500 font-bold">
                                    No Data Available
                                </span>
                                    @endif
                                    <div class="text-gray-500 border-t border-gray-500">
                                        Office Address
                                    </div>
                                </div>
                                <div class="divide-y divide-200 dark:divide-gray-700">
                                    @if($profile->project_leader)
                                        <span class="text-gray-700 dark:text-gray-200">
                                    {{$profile->project_leader}}
                                </span>
                                    @else
                                        <span class="text-gray-500 font-bold">
                                    No Data Available
                                </span>
                                    @endif
                                    <div class="text-gray-500 border-t border-gray-500">
                                        Project Leader
                                    </div>
                                </div>
                                <div class="divide-y divide-200 dark:divide-gray-700">
                                    @if($profile->manager)
                                        <span class="text-gray-700 dark:text-gray-200">
                                    {{$profile->manager}}
                                </span>
                                    @else
                                        <span class="text-gray-500 font-bold">
                                    No Data Available
                                </span>
                                    @endif
                                    <div class="text-gray-500 border-t border-gray-500">
                                        Project Manager
                                    </div>
                                </div>
                                <div class="divide-y divide-200 dark:divide-gray-700">
                                    @if($profile->manager)
                                        <span class="text-gray-700 dark:text-gray-200">
                                    {{$profile->manager}}
                                </span>
                                    @else
                                        <span class="text-gray-500 font-bold">
                                    No Data Available
                                </span>
                                    @endif
                                    <div class="text-gray-500 border-t border-gray-500">
                                        IP-TBM Manager
                                    </div>
                                </div>
                                <div class="divide-y divide-200 dark:divide-gray-700">
                                    @if($profile->year_established)
                                        <span class="text-gray-700 dark:text-gray-200">
                                    {{$profile->year_established}}
                                </span>
                                    @else
                                        <span class="text-gray-500 font-bold">
                                    No Data Available
                                </span>
                                    @endif
                                    <div class="text-gray-500 border-t border-gray-500">
                                        Year Established
                                    </div>
                                </div>
                                <div class="divide-y divide-200 dark:divide-gray-700">
                                    @if($profile->ip_policy)
                                        <span class="text-gray-700 dark:text-gray-200">
                                   YES
                                </span>
                                    @else
                                        <span class="text-red-700">
                                   NO
                                </span>
                                    @endif
                                    <div class="text-gray-500 border-t border-gray-500">
                                        Availability of IP Policy
                                    </div>
                                </div>
                                <div class="divide-y divide-200 dark:divide-gray-700">
                                    @if($profile->techno_transfer)
                                        <span class="text-gray-700 dark:text-gray-200">
                                   YES
                                </span>
                                    @else
                                        <span class="text-red-500">
                                   NO
                                </span>
                                    @endif
                                    <div class="text-gray-500 border-t border-gray-500">
                                        Availability of Technology Transfer Protocol
                                    </div>
                                </div>

                            </div>
                        </x-card-panel>
                        <x-card-panel title="IP-TBM Contact Details">
                            <div class="divide-y divide-200 dark:divide-gray-700">
                                @if($profile->contact_mobile->count()>0)
                                    <div class="mt-2">
                                        <h1 class="font-bold text-gray-600 dark:text-gray-500">
                                            <span class="fa-solid fa-mobile-retro me-2"></span> Mobile Number
                                        </h1>
                                        <ul class="ms-4 list-disc ps-4">
                                            @foreach($profile->contact_mobile as $contact)
                                                <li >
                                                    {{$contact->contact}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                @endif
                                @if($profile->contact_phone->count()>0)
                                    <div class="mt-2">
                                        <h1 class="font-bold text-gray-600 dark:text-gray-500">
                                            <span class="fa-solid fa-phone-square me-2"></span> Phone Number
                                        </h1>
                                        <ul class="ms-4 list-disc ps-4">
                                            @foreach($profile->contact_phone as $contact)
                                                <li class="text-gray-700 dark:text-gray-300">
                                                    {{$contact->contact}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                @endif
                                @if($profile->contact_fax->count()>0)
                                    <div class="mt-2">
                                        <h1 class="font-bold text-gray-600 dark:text-gray-500">
                                            <span class="fa-solid fa-fax me-2"></span> Fax Number
                                        </h1>
                                        <ul class="ms-4 list-disc ps-4">
                                            @foreach($profile->contact_fax as $contact)
                                                <li class="text-gray-700 dark:text-gray-300">
                                                    {{$contact->contact}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                @endif
                                @if($profile->contact_email->count()>0)
                                    <div class="mt-2">
                                        <h1 class="font-bold text-gray-600 dark:text-gray-500">
                                            <span class="fa-solid fa-at me-2"></span> Email Address
                                        </h1>
                                        <ul class="ms-4 list-disc ps-4">
                                            @foreach($profile->contact_email as $contact)
                                                <li class="text-gray-700 dark:text-gray-300">
                                                    {{$contact->contact}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                @endif
                            </div>

                        </x-card-panel>
                    </div>
                    <div class="space-y-4">
                        <x-card-panel title="IP-TBM Projects">
                            @if($profile->projects->count()>0)
                                <ul class="space-y-4">
                                    @foreach($profile->projects->take(5) as $project)
                                        <li class="text-gray-700 dark:text-gray-400">
                                            <div class="border border-200 dark:border-gray-700 rounded p-2">
                                                {{$project->project_name}}
                                                <div class="divide-y mt-2 divide-gray-200 dark:divide-gray-700 w-fit">
                                                    <div class="font-medium">
                                                        {{$project->project_leader}}
                                                    </div>
                                                    <div >
                                                        Project Leader
                                                    </div>
                                                </div>
                                                <div class="divide-y mt-2 divide-gray-200 dark:divide-gray-700 w-fit">
                                                    <div class="font-medium">
                                                        <i class="fa-solid fa-peso-sign"></i>
                                                        {{number_format($project->projectDetails->sum('year_budget'),2)}}
                                                    </div>
                                                    <div >
                                                        Total Budget
                                                    </div>
                                                </div>
                                            </div>
                                       </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="font-bold text-gray-500">
                                    No Data Available
                                </div>
                            @endif
                            <x-slot:footer>
                                <x-pop-modal>

                                </x-pop-modal>

                                <a href="{{route("iptbm.staff.viewProfile.projects",['profile'=>$profile])}}" class="inline-flex items-center justify-center p-1 text-base font-medium text-sky-500 rounded-lg bg-gray-50 hover:text-sky-900 hover:bg-gray-100 dark:text-sky-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="w-full">View all projects</span>
                                    <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            </x-slot:footer>
                        </x-card-panel>
                        <x-card-panel title="Region Details">
                            <div class="space-y-4">
                                <div class="divide-y divide-200 dark:divide-gray-700">
                                    @if($profile->rrdc_chair)
                                        <span class="text-gray-700 dark:text-gray-200">
                                    {{$profile->rrdc_chair}}
                                </span>
                                        {{$profile->rrdc_chair}}
                                    @else
                                        <span class="text-gray-500 font-bold">
                                    No Data Available
                                </span>
                                    @endif
                                    <div class="text-gray-500 border-t border-gray-500">
                                        RRDCC Chair
                                    </div>
                                </div>
                                <div class="divide-y divide-200 dark:divide-gray-700">
                                    @if($profile->consortium_dir)
                                        <span class="text-gray-700 dark:text-gray-200">
                                    {{$profile->consortium_dir}}
                                </span>
                                    @else
                                        <span class="text-gray-500 font-bold">
                                    No Data Available
                                </span>
                                    @endif
                                    <div class="text-gray-500 border-t border-gray-500">
                                        Consortium Director
                                    </div>
                                </div>
                            </div>
                        </x-card-panel>
                        <x-card-panel title="Agency Details">
                            <div class="space-y-4">
                                <div class="divide-y divide-200 dark:divide-gray-700">
                                    @if($profile->agency)
                                        <span class="text-gray-700 dark:text-gray-200">
                                    {{$profile->agency->name}}
                                </span>
                                    @else
                                        <span class="text-gray-500 font-bold">
                                    No Data Available
                                </span>
                                    @endif
                                    <div class="text-gray-500 border-t border-gray-500">
                                        Agency
                                    </div>
                                </div>
                                <div class="divide-y divide-200 dark:divide-gray-700">
                                    @if($profile->agency_head)
                                        <span class="text-gray-700 dark:text-gray-200">
                                    {{$profile->agency_head->head}}
                                </span>
                                    @else
                                        <span class="text-gray-500 font-bold">
                                    No Data Available
                                </span>
                                    @endif
                                    <div class="text-gray-500 border-t border-gray-500">
                                        Agency head
                                    </div>
                                </div>
                            </div>
                        </x-card-panel>
                    </div>
                </x-grid>

            </div>


        </div>


    </div>
@endsection

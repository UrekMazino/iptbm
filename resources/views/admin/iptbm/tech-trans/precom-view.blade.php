@extends('admin.iptbm.layout.app')

@section('title')
    {{"| Tech trans : admin"}}
@endsection

@section('content')
    <div class="w-full">
        <nav
            class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">
            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="block md:flex justify-start items-center">
                    <div class="p-4">
                        <x-link-button :url="route('iptbm.admin.techtrans.precom',['precom'=>'precom'])"
                                       class="text-sky-600 dark:text-sky-600">
                            <svg class="w-4 h-4 me-2 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="currentColor" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                            </svg>
                            Back
                        </x-link-button>
                    </div>

                </div>

            </nav>

        </nav>
        <div class="px-0 md:px-4 w-full mt-10">
            <x-card class="shadow-lg">
                <div class="grid grid-cols-1 relative overflow-hidden rounded-lg py-24">
                    <img src="{{Storage::url($precom->technology->tech_photo)}}" alt="Background Image"
                         class="absolute  top-0 left-0 w-full h-full object-cover filter blur">
                    <div class="absolute top-0 left-0 w-full h-full bg-black  bg-opacity-75 rounded-lg"></div>
                    <div class="z-10 p-4">
                        <div class="m-auto w-full md:w-3/4">
                            <div class="mx-auto px-3  ">
                                <div class="mx-auto px-3 text-center text-2xl">
                                    <a class="font-medium text-sky-600 dark:text-sky-500 hover:underline"
                                       href="{{route("iptbm.admin.technology.view-tech",["technology"=>$precom->technology->id])}}">
                                        @if($precom->pre_com_tech_name)
                                            {{$precom->pre_com_tech_name}}
                                        @else
                                            {{$precom->technology->title}}
                                        @endif
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
            </x-card>
            <div class="mt-4 space-y-4">
                <div class="mt-10">
                    <x-header-label>
                        Pre Commercialization
                    </x-header-label>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="col-span-2 space-y-4">
                        <x-card>
                            <x-item-header>
                                Market Study
                            </x-item-header>
                            @if($precom->market_study_files->count()>0)
                                <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-4">
                                    @foreach($precom->market_study_files as $key=>$file)
                                        <li class="py-3 transition duration-300 hover:bg-gray-200 hover:dark:bg-gray-800 hover:text-gray-800 hover:dark:text-white text-gray-600 dark:text-gray-400">
                                            <livewire:iptbm.staff.precom.file-holder
                                                wire:key="market-{{$key}}-{{$file->id}}" univ-id="market"
                                                :file="$file"/>
                                        </li>
                                    @endforeach


                                </ul>
                            @else
                                <x-sub-label>
                                    No data available
                                </x-sub-label>
                            @endif
                        </x-card>
                        <x-card>
                            <x-item-header>
                                Valuation Summary
                            </x-item-header>
                            @if($precom->valuation_summary_files->count()>0)
                                <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-4">
                                    @foreach($precom->valuation_summary_files as $key=>$file)
                                        <li class="py-3 transition duration-300 hover:bg-gray-200 hover:dark:bg-gray-800 hover:text-gray-800 hover:dark:text-white text-gray-600 dark:text-gray-400">
                                            <livewire:iptbm.staff.precom.file-holder
                                                wire:key="valuation-{{$key}}-{{$file->id}}" univ-id="valuation"
                                                :file="$file"/>
                                        </li>
                                    @endforeach


                                </ul>
                            @else
                                <x-sub-label>
                                    No data available
                                </x-sub-label>
                            @endif
                        </x-card>
                        <x-card>
                            <x-item-header>
                                Freedom to Operate Summary
                            </x-item-header>
                            @if($precom->freedom_summary_files->count()>0)
                                <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-4">
                                    @foreach($precom->freedom_summary_files as $key=>$file)
                                        <li class="py-3 transition duration-300 hover:bg-gray-200 hover:dark:bg-gray-800 hover:text-gray-800 hover:dark:text-white text-gray-600 dark:text-gray-400">
                                            <livewire:iptbm.staff.precom.file-holder
                                                wire:key="freedom-{{$key}}-{{$file->id}}" univ-id="freedom"
                                                :file="$file"/>
                                        </li>
                                    @endforeach


                                </ul>
                            @else
                                <x-sub-label>
                                    No data available
                                </x-sub-label>
                            @endif
                        </x-card>
                        <x-card>
                            <x-item-header>
                                Proposed Term Sheet
                            </x-item-header>
                            @if($precom->term_sheet_files->count()>0)
                                <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-4">
                                    @foreach($precom->term_sheet_files as $key=>$file)
                                        <li class="py-3 transition duration-300 hover:bg-gray-200 hover:dark:bg-gray-800 hover:text-gray-800 hover:dark:text-white text-gray-600 dark:text-gray-400">
                                            <livewire:iptbm.staff.precom.file-holder
                                                wire:key="termsheet-{{$key}}-{{$file->id}}" univ-id="termsheet"
                                                :file="$file"/>
                                        </li>
                                    @endforeach


                                </ul>
                            @else
                                <x-sub-label>
                                    No data available
                                </x-sub-label>
                            @endif
                        </x-card>

                        <x-card>
                            <x-item-header>
                                Licensing Agreement Copy
                            </x-item-header>
                            @if($precom->license_agreement_copies->count()>0)
                                <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-4">
                                    @foreach($precom->license_agreement_copies as $key=>$file)
                                        <li class="py-3 transition duration-300 hover:bg-gray-200 hover:dark:bg-gray-800 hover:text-gray-800 hover:dark:text-white text-gray-600 dark:text-gray-400">
                                            <livewire:iptbm.staff.precom.file-holder
                                                wire:key="agreement-{{$key}}-{{$file->id}}" univ-id="agreement"
                                                :file="$file"/>
                                        </li>
                                    @endforeach


                                </ul>
                            @else
                                <x-sub-label>
                                    No data available
                                </x-sub-label>
                            @endif
                        </x-card>

                        <x-card>
                            <x-item-header>
                                Financial/Economic Analysis
                            </x-item-header>
                            @if($precom->financial_annalysis->count()>0)
                                <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-4">
                                    @foreach($precom->financial_annalysis as $key=>$file)
                                        <li class="py-3 transition duration-300 hover:bg-gray-200 hover:dark:bg-gray-800 hover:text-gray-800 hover:dark:text-white text-gray-600 dark:text-gray-400">
                                            <livewire:iptbm.staff.precom.file-holder
                                                wire:key="financial-{{$key}}-{{$file->id}}" univ-id="financial"
                                                :file="$file"/>
                                        </li>
                                    @endforeach


                                </ul>
                            @else
                                <x-sub-label>
                                    No data available
                                </x-sub-label>
                            @endif
                        </x-card>
                        <x-card>
                            <x-item-header>
                                Machine Testing and Certification
                            </x-item-header>
                            @if($precom->testing_certification->count()>0)
                                <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-4">
                                    @foreach($precom->testing_certification as $key=>$file)
                                        <li class="py-3 transition duration-300 hover:bg-gray-200 hover:dark:bg-gray-800 hover:text-gray-800 hover:dark:text-white text-gray-600 dark:text-gray-400">
                                            <livewire:iptbm.staff.precom.file-holder
                                                wire:key="certification-{{$key}}-{{$file->id}}" univ-id="certification"
                                                :file="$file"/>
                                        </li>
                                    @endforeach


                                </ul>
                            @else
                                <x-sub-label>
                                    No data available
                                </x-sub-label>
                            @endif
                        </x-card>
                        <x-card>
                            <x-item-header>
                                Feasibility Study
                            </x-item-header>
                            @if($precom->feasibility_studies->count()>0)
                                <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-4">
                                    @foreach($precom->feasibility_studies as $key=>$file)
                                        <li class="py-3 transition duration-300 hover:bg-gray-200 hover:dark:bg-gray-800 hover:text-gray-800 hover:dark:text-white text-gray-600 dark:text-gray-400">
                                            <livewire:iptbm.staff.precom.file-holder
                                                wire:key="feasibbility-{{$key}}-{{$file->id}}" univ-id="feasibbility"
                                                :file="$file"/>
                                        </li>
                                    @endforeach


                                </ul>
                            @else
                                <x-sub-label>
                                    No data available
                                </x-sub-label>
                            @endif
                        </x-card>
                        <x-card>
                            <x-item-header>
                                Business Model/Business Plan
                            </x-item-header>
                            @if($precom->business_plan->count()>0)
                                <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-4">
                                    @foreach($precom->business_plan as $key=>$file)
                                        <li class="py-3 transition duration-300 hover:bg-gray-200 hover:dark:bg-gray-800 hover:text-gray-800 hover:dark:text-white text-gray-600 dark:text-gray-400">
                                            <livewire:iptbm.staff.precom.file-holder
                                                wire:key="business-{{$key}}-{{$file->id}}" univ-id="business"
                                                :file="$file"/>
                                        </li>
                                    @endforeach


                                </ul>
                            @else
                                <x-sub-label>
                                    No data available
                                </x-sub-label>
                            @endif
                        </x-card>
                        <x-card>
                            <x-item-header>
                                Fairness Opinion Report
                            </x-item-header>
                            @if($precom->opinion_report->count()>0)
                                <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-4">
                                    @foreach($precom->opinion_report as $key=>$file)
                                        <li class="py-3 transition duration-300 hover:bg-gray-200 hover:dark:bg-gray-800 hover:text-gray-800 hover:dark:text-white text-gray-600 dark:text-gray-400">
                                            <livewire:iptbm.staff.precom.file-holder
                                                wire:key="report-{{$key}}-{{$file->id}}" univ-id="report"
                                                :file="$file"/>
                                        </li>
                                    @endforeach


                                </ul>
                            @else
                                <x-sub-label>
                                    No data available
                                </x-sub-label>
                            @endif
                        </x-card>
                    </div>
                    <div class="space-y-4">
                        <x-card class="shadow-lg">
                            <x-item-header>
                                Video Clips
                            </x-item-header>
                            <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-10 ">
                                @foreach($precom->video as $key=>$video)

                                    <!-- Main modal -->

                                    <li class="cursor-pointer py-2 hover:bg-gray-400 dark:hover:bg-gray-800 transition duration-300">
                                        <div data-modal-backdrop="static" id="authentication-video{{$key}}"
                                             tabindex="-1" aria-hidden="true"
                                             class="fixed top-0 left-0 right-0 z-50 backdrop-blur hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-5xl max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button id="botVideo{{$video->id}}" type="button"
                                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-hide="authentication-video{{$key}}">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                             xmlns="http://www.w3.org/2000/svg" fill="none"
                                                             viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                  stroke-linejoin="round" stroke-width="2"
                                                                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="px-6 py-6 aspect-video lg:px-8">
                                                        <x-input-label class="mb-1  font-normal"
                                                                       value="{{$video->description}}"/>
                                                        @if($video->type==='local')
                                                            <video id="video{{$video->id}}" class=" block h-full "
                                                                   alt="..." controls>
                                                                <source src="{{Storage::url($video->url)}}"
                                                                        type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        @else
                                                            <iframe id="videoIframe{{$video->id}}"
                                                                    class="w-full m-auto h-full" src="{{$video->url}}"
                                                                    frameborder="0"
                                                                    allow="accelerometer;pause;  encrypted-media; gyroscope; picture-in-picture"
                                                                    allowfullscreen></iframe>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="cursor-pointer">
                                            <div class="w-full flex justify-between items-center">
                                                <x-input-label data-modal-target="authentication-video{{$key}}"
                                                               data-modal-toggle="authentication-video{{$key}}"
                                                               class="flex justify-start cursor-pointer items-center hover:scale-110 transition duration-300">

                                                    @if($video->type==='local')
                                                        <svg class="w-6 h-6 me-2" fill="currentColor"
                                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                            <path
                                                                d="M256 0H576c35.3 0 64 28.7 64 64V288c0 35.3-28.7 64-64 64H256c-35.3 0-64-28.7-64-64V64c0-35.3 28.7-64 64-64zM476 106.7C471.5 100 464 96 456 96s-15.5 4-20 10.7l-56 84L362.7 169c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6h80 48H552c8.9 0 17-4.9 21.2-12.7s3.7-17.3-1.2-24.6l-96-144zM336 96a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM64 128h96V384v32c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32V384H512v64c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V192c0-35.3 28.7-64 64-64zm8 64c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16H88c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H72zm0 104c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16H88c8.8 0 16-7.2 16-16V312c0-8.8-7.2-16-16-16H72zm0 104c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16H88c8.8 0 16-7.2 16-16V416c0-8.8-7.2-16-16-16H72zm336 16v16c0 8.8 7.2 16 16 16h16c8.8 0 16-7.2 16-16V416c0-8.8-7.2-16-16-16H424c-8.8 0-16 7.2-16 16z"/>
                                                        </svg>
                                                    @else
                                                        <svg class="w-6 h-6 me-2" fill="currentColor"
                                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                            <path
                                                                d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/>
                                                        </svg>
                                                    @endif
                                                    <span>
                                                        {{$video->description}}
                                                    </span>
                                                </x-input-label>


                                                <div id="popup-deleteVid{{$video->id}}" tabindex="-1"
                                                     class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-md max-h-full">
                                                        <div
                                                            class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button"
                                                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                    data-modal-hide="popup-deleteVid{{$video->id}}">
                                                                <svg class="w-3 h-3" aria-hidden="true"
                                                                     xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                     viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                          stroke-linejoin="round" stroke-width="2"
                                                                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                            <div class="p-6 text-center">
                                                                <svg
                                                                    class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 20 20">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                          stroke-linejoin="round" stroke-width="2"
                                                                          d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                                </svg>

                                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                                    Are you sure you want to delete this video?</h3>
                                                                <button wire:loading.remove wire:target="deleteVideo"
                                                                        wire:click.prevent="deleteVideo({{$video}})"
                                                                        type="button"
                                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                                    Yes, I'm sure
                                                                </button>
                                                                <button wire:loading wire:target="deleteVideo"
                                                                        type="button"
                                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                                    Processing...
                                                                </button>
                                                                <button data-modal-hide="popup-deleteVid{{$video->id}}"
                                                                        type="button"
                                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                    No, cancel
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <x-secondary-button data-modal-target="popup-deleteVid{{$video->id}}"
                                                                    data-modal-toggle="popup-deleteVid{{$video->id}}"
                                                                    class="text-red-600 dark:text-red-600">
                                                    <svg class="w-5 h-5 " aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 18 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                                    </svg>
                                                </x-secondary-button>
                                            </div>


                                        </div>

                                    </li>

                                @endforeach
                            </ul>
                        </x-card>
                        <x-card class="shadow-lg">
                            <div class="divide-y divide-gray-400 dark:divide-gray-600">
                                <div class="py-4">
                                    <x-item-header>
                                        Starting Capital
                                    </x-item-header>
                                    <div class="py-2">
                                        @if($precom->starting_capital)
                                            <span class="fa-solid fa-peso-sign"></span>
                                            {{number_format($precom->starting_capital,2)}}
                                        @else
                                            No data Available
                                        @endif
                                    </div>
                                </div>
                                <div class="py-4">
                                    <x-item-header>
                                        Estimated Cost of Ownership
                                    </x-item-header>
                                    <div class="py-2">
                                        @if($precom->estimated_acquisition_cost)
                                            <span class="fa-solid fa-peso-sign"></span>
                                            {{number_format($precom->estimated_acquisition_cost,2)}}
                                        @else
                                            No data Available
                                        @endif
                                    </div>
                                </div>
                                <div class="py-4">
                                    <x-item-header>
                                        Income Generated
                                    </x-item-header>
                                    <div class="py-2">
                                        @if($precom->income_gen_trans)
                                            <span class="fa-solid fa-peso-sign"></span>
                                            {{number_format($precom->income_gen_trans,2)}}
                                        @else
                                            No data Available
                                        @endif
                                    </div>
                                </div>
                                <div class="py-4">
                                    <x-item-header>
                                        Return of Investment
                                    </x-item-header>
                                    <div class="py-2">
                                        @if($precom->income_gen_trans)
                                            <span class="fa-solid fa-peso-sign"></span>
                                            {{$precom->return_of_investment}}
                                        @else
                                            No data Available
                                        @endif
                                    </div>
                                </div>
                                <div class="py-4">
                                    <x-item-header>
                                        Break Even
                                    </x-item-header>
                                    <div class="py-2">
                                        @if($precom->breakeven)

                                            {{$precom->breakeven}}
                                            <span class="fa-sharp fa-light ms-2 fa-percent"></span>
                                        @else
                                            No data Available
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </x-card>
                        <x-card class="shadow-lg">
                            <x-item-header>
                                Mode Of Application
                            </x-item-header>
                            <ul class="list-disc ps-4">
                                @foreach($precom->modes as $mode)
                                    <li class="text-lg ">
                                        {{$mode->commercialization_mode}}
                                    </li>
                                @endforeach
                            </ul>
                        </x-card>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

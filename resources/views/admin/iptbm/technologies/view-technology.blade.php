@extends('admin.iptbm.layout.app')

@section('title')
    {{"| admin: view technology"}}
@endsection

@section('content')
    <div class="w-full">

        <nav
            class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">
            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="flex justify-between items-center">
                    <div class="me-4 p-4">
                        <a href="{{route("iptbm.admin.technologies-report")}}">
                            <x-secondary-button class="text-sky-600 dark:text-sky-600">
                                <svg class="w-4 h-4 me-2 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                                </svg>
                                technologies
                            </x-secondary-button>
                        </a>

                    </div>

                </div>

            </nav>

        </nav>
        <div class="px-0 md:px-4 w-full mt-5 space-y-8 ">
            <x-card class="shadow-lg">
                <div class="grid grid-cols-1 md:grid-cols-3">
                    <div>
                        <x-card
                            class="aspect-square border border-gray-300 dark:border-gray-600 flex justify-center items-center">
                            <img class="w-full h-auto"
                                 src="{{\Illuminate\Support\Facades\Storage::url($technology->tech_photo)}}" alt=""/>
                        </x-card>
                    </div>
                    <div class="col-span-2 flex justify-items-center items-center">
                        <div class="m-auto divide-y divide-gray-400 dark:divide-gray-600 w-full  p-0 md:p-4">
                            <div class="py-4 space-y-4">
                                <x-item-header>
                                    Technology Title
                                </x-item-header>
                                <div>
                                    {{$technology->title}}
                                </div>
                            </div>
                            <div class="py-4 space-y-4">
                                <x-item-header>
                                    Technology Description
                                </x-item-header>
                                <div>
                                    {{$technology->tech_desc}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-card>
            <x-header-label class="mt-10 mb-4">
                Technology Details
            </x-header-label>
            <div class="grid grid-cols-1 md:grid-cols-5 gap-x-14">
                <div class="space-y-8 md:col-span-3">
                    <x-card class="shadow-lg space-y-10">
                        <div>
                            <x-item-header>
                                Technology Owner
                            </x-item-header>
                            <ul class="mt-2 divide-y divide-gray-400 dark:divide-gray-600">
                                @foreach($technology->owner as $owner)
                                    <li>
                                        {{$owner->agency->name}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div>
                            <x-item-header>
                                Technology Generator
                            </x-item-header>
                            <ul class=" divide-y divide-gray-400 dark:divide-gray-600">
                                @foreach($technology->techgenerators as $generator)
                                    <li class="py-2">
                                        <div class="font-bold">
                                            {{$generator->inventor->name." ".(($generator->inventor->middle_name)? $generator->inventor->middle_name.".":" ")." ".$generator->inventor->last_name." ".$generator->inventor->suffixes }}
                                        </div>
                                        <div>
                                            {{$generator->inventor->address}}
                                        </div>
                                        <div>
                                            {{$generator->inventor->agency_name->name}}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </x-card>
                    <x-card class="shadow-lg ">
                        <x-item-header>
                            Research Project Conducted
                        </x-item-header>
                        <ul class="divide-y divide-gray-400 dark:divide-gray-600">
                            @foreach($technology->researchprojects as $research)
                                <li class="py-2">
                                    <div class="border border-gray-400 dark:border-gray-600 rounded-lg p-3 space-y-4">
                                        <div class="divide-y divide-gray-400 dark:divide-gray-600 w-fit">
                                            <div class="font-bold text-gray-700 dark:text-gray-300">
                                                {{$research->title}}
                                            </div>
                                            <div>
                                                Research Title
                                            </div>
                                        </div>
                                        <div>
                                            <x-input-label value="Funding Agencies"/>
                                            <ul class="list-disc">
                                                @foreach($research->funder as $funder)
                                                    <li class="ms-4">
                                                        {{$funder->agency->name}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="mt-2">
                                                <x-input-label value="Amount Invested"/>
                                                <div class="font-bold text-gray-700 dark:text-gray-300">
                                                    <span class="fa-solid fa-peso-sign">

                                                    </span>
                                                    {{number_format($research->amount,2)}}
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <x-input-label value="Industry Partner"/>
                                            <ul class="mt-2 divide-y divide-gray-400 dark:divide-gray-600">
                                                @foreach($research->researchpartners as $partner)
                                                    <li class="py-2">
                                                        <div class="font-bold">
                                                            {{$partner->industry_name}}
                                                        </div>
                                                        <div class="font-thin">
                                                            {{$partner->address}}
                                                        </div>

                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </x-card>
                </div>
                <div class="md:col-span-2 space-y-8">
                    <x-card-panel title="IP Protection Application">
                        <ul class="mt-2">
                            @forelse($technology->ip_applications as $application)
                                <li>
                                    <a href="{{route("iptbm.admin.ip-application-report.task",['task'=>$application->ip_type->id])}}"
                                       class="font-medium text-sky-600 dark:text-sky-500 hover:underline">
                                        {{$application->ip_type->name}}
                                    </a>
                                </li>
                            @empty
                                No data available
                            @endforelse

                        </ul>
                    </x-card-panel>
                    <x-card-panel title="Technology Transfer Plan">
                        <ul class="space-y-4 mt-2">
                            <li>
                                <div class="border border-gray-200 dark:border-gray-600 rounded p-2">
                                    <x-input-label value="Pre Commercialization"/>
                                    <ul class="list-disc space-y-4">
                                        @forelse($technology->pre_commercialization as $precom)
                                            <li class="ms-4">
                                                <div>
                                                    <div class="font-medium">
                                                        {{$technology->title}}
                                                    </div>
                                                    <div class="text-xs">
                                                        {{\Carbon\Carbon::make($precom->created_at)->format('F-d-Y')}}
                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                            No data available
                                        @endforelse
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="border border-gray-200 dark:border-gray-600 rounded p-2">
                                    <x-input-label value="Commercialization Adopter"/>
                                    <ul class="list-disc space-y-4">
                                        @forelse($technology->commercial_adopters as $precom)
                                            <li class="ms-4">
                                                <div>
                                                    <div class="font-medium">
                                                        {{$technology->title}}
                                                    </div>
                                                    <div class="text-xs">
                                                        {{\Carbon\Carbon::make($precom->created_at)->format('F-d-Y')}}
                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                            No data available
                                        @endforelse
                                    </ul>
                                </div>

                            </li>
                            <li>
                                <div class="border border-gray-200 dark:border-gray-600 rounded p-2">
                                    <x-input-label value="Deployment"/>
                                    <ul class="list-disc space-y-4">
                                        @forelse( $technology->deployment as $precom)
                                            <li class="ms-4">
                                                <div>
                                                    <div class="font-medium">
                                                        {{$technology->title}}
                                                    </div>
                                                    <div class="text-xs">
                                                        {{\Carbon\Carbon::make($precom->created_at)->format('F-d-Y')}}
                                                    </div>
                                                </div>

                                            </li>
                                        @empty
                                            No data available
                                        @endforelse

                                    </ul>
                                </div>

                            </li>
                            <li>
                                <div class="border border-gray-200 dark:border-gray-600 rounded p-2">
                                    <x-input-label value="Extension"/>
                                    <ul class="list-disc">
                                        @forelse( $technology->extension as $precom)
                                            <li class="ms-4">
                                                <div>
                                                    <div>
                                                        {{$technology->title}}
                                                    </div>
                                                    <div class="text-xs">
                                                        {{\Carbon\Carbon::make($precom->created_at)->format('F-d-Y')}}
                                                    </div>
                                                </div>

                                            </li>
                                        @empty
                                            No data available
                                        @endforelse

                                    </ul>
                                </div>

                            </li>
                        </ul>
                    </x-card-panel>

                </div>
            </div>


            <div>
                <x-header-label class="mt-20 mb-4">
                    Full Technology Description
                </x-header-label>
                <x-item-header>
                    Technology Photos
                </x-item-header>
                <x-card>
                    <div id="default-carousel" class="relative w-full" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                            @foreach($technology->full_description->technology_photos as $tech_photos)
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($tech_photos->file)}}"
                                         class="absolute block w-auto max-w-fit h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                         alt="...">
                                </div>
                            @endforeach
                        </div>
                        <!-- Slider indicators -->
                        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                            @foreach($technology->full_description->technology_photos as $key=>$tech_photos)
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="true"
                                        aria-label="Slide {{$key+1}}" data-carousel-slide-to="{{$key}}"></button>
                            @endforeach

                        </div>
                        <!-- Slider controls -->
                        <button type="button"
                                class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-prev>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
                        </button>
                        <button type="button"
                                class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-next>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
                        </button>
                    </div>
                </x-card>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-14">
                <div>
                    <x-card>
                        <div class="space-y-4">
                            <div class="border border-gray-300 dark:border-gray-600 rounded-lg p-2">
                                <x-item-header>
                                    Narrative
                                </x-item-header>
                                <div>
                                    @if($technology->full_description->narrative)
                                        <x-pop-modal class="max-w-6xl" name="openFile-narrative">
                                            <iframe class="w-full aspect-video"
                                                    src="{{\Illuminate\Support\Facades\Storage::url($technology->full_description->narrative)}}"></iframe>
                                        </x-pop-modal>
                                        <button data-modal-toggle="openFile-narrative"
                                                class="hover:text-sky-600 duration-300 transition">
                                            Technology narratives attachment
                                        </button>
                                    @else
                                        No data available
                                    @endif

                                </div>
                            </div>
                            <div class="border border-gray-300 dark:border-gray-600 rounded-lg p-2">
                                <x-item-header>
                                    Process Flow
                                </x-item-header>
                                <div>
                                    @if($technology->full_description->process_flow)
                                        <x-pop-modal class="max-w-6xl" name="openFile-process-flow">
                                            <iframe class="w-full aspect-video"
                                                    src="{{\Illuminate\Support\Facades\Storage::url($technology->full_description->process_flow)}}"></iframe>
                                        </x-pop-modal>
                                        <button data-modal-toggle="openFile-process-flow"
                                                class="hover:text-sky-600 duration-300 transition">
                                            Technology process flow attachment
                                        </button>
                                    @else
                                        No data available
                                    @endif

                                </div>
                            </div>
                            <div class="border border-gray-300 dark:border-gray-600 rounded-lg p-2">
                                <x-item-header>
                                    Technology Requirements
                                </x-item-header>
                                <div>
                                    @if($technology->full_description->requirements)
                                        <x-pop-modal class="max-w-6xl" name="openFile-requirements">
                                            <iframe class="w-full aspect-video"
                                                    src="{{\Illuminate\Support\Facades\Storage::url($technology->full_description->requirements)}}"></iframe>
                                        </x-pop-modal>
                                        <button data-modal-toggle="openFile-requirements"
                                                class="hover:text-sky-600 duration-300 transition">
                                            Technology requirements attachment
                                        </button>
                                    @else
                                        No data available
                                    @endif

                                </div>
                            </div>
                            <div class="border border-gray-300 dark:border-gray-600 rounded-lg p-2">
                                <x-item-header>
                                    Significance of Technology
                                </x-item-header>
                                <div>
                                    @if($technology->full_description->significance_of_technology)
                                        <x-pop-modal class="max-w-6xl" name="openFile-significance_of_technology">
                                            <iframe class="w-full aspect-video"
                                                    src="{{\Illuminate\Support\Facades\Storage::url($technology->full_description->significance_of_technology)}}"></iframe>
                                        </x-pop-modal>
                                        <button data-modal-toggle="openFile-significance_of_technology"
                                                class="hover:text-sky-600 duration-300 transition">
                                            Significance of Technology attachment
                                        </button>
                                    @else
                                        No data available
                                    @endif

                                </div>
                            </div>
                            <div class="border border-gray-300 dark:border-gray-600 rounded-lg p-2">
                                <x-item-header>
                                    Limitation of Technology
                                </x-item-header>
                                <div>
                                    @if($technology->full_description->limitation_of_technology)
                                        <x-pop-modal class="max-w-6xl" name="openFile-limitation_of_technology">
                                            <iframe class="w-full aspect-video"
                                                    src="{{\Illuminate\Support\Facades\Storage::url($technology->full_description->limitation_of_technology)}}"></iframe>
                                        </x-pop-modal>
                                        <button data-modal-toggle="openFile-limitation_of_technology"
                                                class="hover:text-sky-600 duration-300 transition">
                                            Limitation attachment
                                        </button>
                                    @else
                                        No data available
                                    @endif

                                </div>
                            </div>
                            <div class="border border-gray-300 dark:border-gray-600 rounded-lg p-2">
                                <x-item-header>
                                    Application of Technology
                                </x-item-header>
                                <div>
                                    @if($technology->full_description->application_of_technology)
                                        <x-pop-modal class="max-w-6xl" name="openFile-application_of_technology">
                                            <iframe class="w-full aspect-video"
                                                    src="{{\Illuminate\Support\Facades\Storage::url($technology->full_description->application_of_technology)}}"></iframe>
                                        </x-pop-modal>
                                        <button data-modal-toggle="openFile-application_of_technology"
                                                class="hover:text-sky-600 duration-300 transition">
                                            Limitation attachment
                                        </button>
                                    @else
                                        No data available
                                    @endif

                                </div>
                            </div>
                            <div class="border border-gray-300 dark:border-gray-600 rounded-lg p-2">
                                <x-item-header>
                                    Other Technology Applications
                                </x-item-header>
                                <div>
                                    @if($technology->full_description->other_application)
                                        <x-pop-modal class="max-w-6xl" name="openFile-other_application">
                                            <iframe class="w-full aspect-video"
                                                    src="{{\Illuminate\Support\Facades\Storage::url($technology->full_description->other_application)}}"></iframe>
                                        </x-pop-modal>
                                        <button data-modal-toggle="openFile-other_application"
                                                class="hover:text-sky-600 duration-300 transition">
                                            Other application attachment
                                        </button>
                                    @else
                                        No data available
                                    @endif

                                </div>
                            </div>

                        </div>

                    </x-card>
                </div>
                <div class="space-y-8">
                    <x-card-panel title="Adopter">
                        <ul class=" list-disc ps-4">
                            @forelse($technology->full_description->adoptors as $adopter)
                                <li class="">
                                    {{$adopter->adoptor_name}}
                                </li>
                            @empty
                                No data available
                            @endforelse

                        </ul>
                    </x-card-panel>
                    <x-card-panel title="Other Documents">
                        <ul class="divide-y divide-gray-300 dark:divide-gray-600">
                            @forelse($technology->full_description->other_documents as $document)
                                <li class="py-2">
                                    <x-pop-modal class="max-w-6xl" name="openFile-{{$document->id}}">
                                        <iframe class="w-full aspect-video"
                                                src="{{\Illuminate\Support\Facades\Storage::url($document->file)}}"></iframe>
                                    </x-pop-modal>
                                    <button data-modal-toggle="openFile-{{$document->id}}"
                                            class="text-sky-600 transition hover:underline duration-300">
                                        {{$document->file_description}}
                                    </button>
                                </li>
                            @empty
                                No data available
                            @endforelse
                        </ul>
                    </x-card-panel>
                    <x-card-panel title="Technology Photos">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @forelse($technology->full_description->technology_photos as $photo)
                                <x-pop-modal class="max-w-2xl group relative overflow-hidden" name="techPhotoView-{{$photo->id}}">
                                    <div class=" aspect-square w-full h-full flex justify-center items-center ">
                                        <img class="max-w-full w-auto   max-h-full h-auto" alt="technology photo" src="{{Storage::url($photo->file)}}">

                                    </div>
                                    @if($photo->file_description)
                                        <div class="group-hover:opacity-0 transition duration-300 absolute bottom-0 rounded-b-lg left-0 w-full py-4 bg-gray-500 dark:bg-gray-900">
                                            <div class="p-2">
                                                {{$photo->file_description}}
                                            </div>
                                        </div>
                                    @endif
                                </x-pop-modal>
                                <div data-modal-toggle="techPhotoView-{{$photo->id}}" data-modal-target="techPhotoView-{{$photo->id}}" class="cursor-pointer p-2 group overflow-hidden transition duration-300 hover:shadow-lg shadow-gray-900 dark:shadow-gray-950 aspect-square border rounded border-gray-200 dark:border-gray-600">

                                    <div class="w-full group-hover:scale-110 h-full transition duration-300 flex justify-center items-center">
                                        <img src="{{Storage::url($photo->file)}}" class="max-w-full  w-auto max-h-full h-auto">
                                    </div>
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

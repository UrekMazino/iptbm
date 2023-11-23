@extends('admin.iptbm.layout.app')
@section('title')
    {{"| admin: profile title"}}
@endsection
@section('content')
    <div class="w-full pb-10">
        <nav
            class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">
            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="flex justify-between items-center">
                    <div class="me-4 p-4">
                        <a href="{{ route('iptbm.admin.iptbm_profiles.profile-projects') }}">
                            <x-secondary-button class="text-sky-600 dark:text-sky-600">
                                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                                </svg>
                                Projects
                            </x-secondary-button>
                        </a>
                    </div>

                </div>
            </nav>
        </nav>
        <div class="px-4 w-full mt-5">

            <div class="my-4 mt-10">
                <x-header-label>
                    Project Details
                </x-header-label>
            </div>
            <div class="space-y-4">
                <x-card class="shadow-lg">

                    <div class="mb-5 p-4 border border-gray-200 dark:border-gray-600 rounded-lg">
                        <x-item-header>
                            Project Name
                        </x-item-header>
                        <div class="mt-4">
                            {{$project->project_name}}
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <div class="text-lg text-gray-700 dark:text-gray-300">
                                {{$project->project_leader}}
                            </div>
                            Project Leader
                        </div>
                        <div>
                            <div class="text-lg text-gray-700 dark:text-gray-300">
                                {{\Carbon\Carbon::make($project->implementation_period)->format('F-d-Y')}}
                            </div>
                            Approved Implementation Period
                        </div>
                    </div>

                </x-card>
                <x-card class="shadow-lg">
                    <x-item-header>
                        Project budget details
                    </x-item-header>
                    <div class="mt-4">
                        <ul class="divide-y divide-gray-400 dark:divide-gray-600">
                            @foreach($project->projectDetails as $key=>$detail)
                                <li>
                                    <livewire:iptbm.admin.project.project-year-details year-label="Year {{$key+1}}"
                                                                                       :year-details="$detail"/>
                                </li>
                            @endforeach
                            <li>
                                <div class="mt-4">
                                    <div
                                        class="flex bg-white dark:bg-gray-950 border rounded border-gray-400 py-2 dark:border-gray-600 justify-center me-0 ms-auto items-center w-fit text-xl px-10 text-gray-800 dark:text-white">
                                        Total Budget :
                                        <span class="fa-solid mx-2 fa-peso-sign">
                                        </span>
                                        <div>
                                            {{number_format($project->projectDetails->sum('year_budget'),2)}}
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </x-card>
            </div>
        </div>
    </div>
@endsection

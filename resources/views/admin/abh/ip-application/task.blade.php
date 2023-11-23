@extends('admin.iptbm.layout.app')

@section('title')
    {{"| admin: IP-Application"}}
@endsection

@section('content')
    <div class="w-full">
        <nav
            class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">
            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="block md:flex justify-end items-center">
                    <div id="searchPan"
                         class="me-0 md:me-4 gap-4 justify-end items-center pb-4 md:pb-0 px-2 md:px-0  md:flex grid grid-cols-1 md:grid-cols-2">

                    </div>


                </div>

            </nav>

        </nav>
        <div class="px-0 md:px-4 w-full mt-10">
            <x-card class="px-0 py-0 pb-0 pt-0 rounded-none md:rounded-lg shadow-lg">
                <div class="grid grid-cols-1 relative overflow-hidden  py-24">
                    <img src="{{Storage::url($task->technology->tech_photo)}}" alt="Background Image"
                         class="absolute  top-0 left-0 w-full h-full object-cover filter blur">
                    <div
                        class="absolute top-0 left-0 w-full h-full bg-black  bg-opacity-75 rounded-none md:rounded-lg"></div>
                    <div class="z-10 p-4">
                        <div class="m-auto w-full md:w-3/4">
                            <div class="mx-auto px-3  ">
                                <div class="mx-auto px-3 text-center text-2xl">
                                    <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                       href="{{route("iptbm.admin.technology.view-tech",["technology"=>$task->technology->id])}}">
                                        {{$task->technology->title}}
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
            <div class="mt-10">
                <x-header-label class="underline underline-offset-8">
                    {{$task->ip_type->name}}
                </x-header-label>

                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                        data-tabs-toggle="#default-tab-content" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab"
                                    data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Task
                            </button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                                aria-controls="dashboard" aria-selected="false">Abstract
                            </button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="settings-tab" data-tabs-target="#settings" type="button" role="tab"
                                aria-controls="settings" aria-selected="false">Expenses
                            </button>
                        </li>
                        <li role="presentation">
                            <button
                                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab"
                                aria-controls="contacts" aria-selected="false">Status
                            </button>
                        </li>
                    </ul>
                </div>
                <div id="default-tab-content">
                    <div class="hidden " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <x-card class="shadow-lg">

                            <div class="space-y-4">

                                <ol class="relative text-gray-500 border-l border-gray-400 dark:border-gray-700 dark:text-gray-400">
                                    @foreach($stages as $key=>$collection)
                                        <li class="mb-10 ml-6">
                                        <span
                                            class="absolute flex items-center justify-center w-6 h-6 bg-gray-400 rounded-full -left-3 ring-4 ring-gray-200 dark:ring-gray-900 dark:bg-gray-950">

                                        </span>
                                            <h3 class="font-bold leading-tight text-gray-700 dark:text-gray-300">{{$key}}</h3>
                                            <ul class="mt-1">
                                                @foreach($collection as $tasks)
                                                    <li>
                                                        <p class="text-sm">

                                                            <a href="{{route("iptbm.admin.ip-application-report.task-details",['task'=>$tasks->id])}}"
                                                               class="inline-flex items-center justify-center p-2 text-sm font-medium text-gray-500 rounded-lg bg-gray-50 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                                                                <svg class="w-3 h-3 me-2" aria-hidden="true"
                                                                     xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                     viewBox="0 0 8 14">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                          stroke-linejoin="round" stroke-width="2"
                                                                          d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
                                                                </svg>

                                                                <span
                                                                    class="w-full">{{$tasks->stage->stage_name}}</span>
                                                                <svg class="w-4 h-4 ml-2" aria-hidden="true"
                                                                     xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                     viewBox="0 0 14 10">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                          stroke-linejoin="round" stroke-width="2"
                                                                          d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                                                </svg>
                                                            </a>

                                                        </p>
                                                    </li>
                                                @endforeach
                                            </ul>

                                        </li>
                                    @endforeach
                                </ol>


                            </div>
                        </x-card>
                    </div>
                    <div class="hidden " id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        <x-card class="mt-5 shadow-lg">
                            <x-item-header>
                                Abstract
                            </x-item-header>
                            <div class="">
                                {{$task->abstract}}
                            </div>
                        </x-card>
                    </div>
                    <div class="hidden " id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        <x-card class="shadow-lg">
                            <x-item-header>
                                Total Cost of IP application service
                            </x-item-header>
                            <ul class="mt-2 divide-y divide-gray-400 dark:divide-gray-600">
                                @foreach($task->expenses as $expenses)
                                    <li class="py-2">
                                        <div class="space-y-2">
                                            <x-input-label :value="$expenses->description"/>
                                            <span class="fa-solid fa-peso-sign"></span>
                                            {{number_format($expenses->amount,2)}}
                                        </div>
                                    </li>
                                @endforeach
                                <li>
                                    <x-input-label class="py-2 text-xl">
                                        Total Expenses : <span
                                            class="fa-solid fa-peso-sign mx-2"></span>{{number_format($task->expenses->sum('amount'),2)}}
                                    </x-input-label>
                                </li>
                            </ul>
                        </x-card>
                    </div>
                    <div class="hidden " id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                        <x-card class="shadow-lg space-y-4">
                            <div class="space-y-1">
                                <x-item-header>
                                    Status of Protection
                                </x-item-header>
                                <div>
                                    @if($task->protectionStatus)
                                        {{$task->protectionStatus->protection_status}}
                                    @endif
                                </div>
                            </div>
                            <div class="space-y-1">
                                <x-item-header>
                                    Patent Agent
                                </x-item-header>
                                <div>
                                    <ul class="space-y-2">
                                        @foreach($task->patent_agent as $agent)
                                            <li>
                                                <x-input-label :value="$agent->name"/>
                                                <div class="text-xs">
                                                    {{$agent->address}}
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                        </x-card>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

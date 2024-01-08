@extends('admin.iptbm.layout.app')

@section('title')
    {{"| admin: IP-task-details"}}
@endsection

@section('content')
    <div class="w-full">
        <nav
            class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">
            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="flex justify-between items-center">
                    <div class="me-4 p-4">
                        <a href="{{route("iptbm.admin.ip-application-report.task",["task"=>$task->ip_alert->ip_type->id])}}">
                            <x-secondary-button>
                                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                                </svg>
                                Back
                            </x-secondary-button>
                        </a>
                    </div>

                    <div id="searchPan"
                         class="me-0 md:me-4 gap-4 justify-end items-center pb-4 md:pb-0 px-2 md:px-0  md:flex grid grid-cols-1 md:grid-cols-2">

                    </div>


                </div>

            </nav>

        </nav>
        <div class="px-0 md:px-4 w-full mt-10">
            <x-card class="px-0 py-0 pb-0 pt-0 rounded-none md:rounded-lg shadow-lg">
                <div class="grid grid-cols-1 relative overflow-hidden  py-24">
                    <img src="{{Storage::url($task->ip_alert->technology->tech_photo)}}" alt="Background Image"
                         class="absolute  top-0 left-0 w-full h-full object-cover filter blur">
                    <div
                        class="absolute top-0 left-0 w-full h-full bg-black  bg-opacity-75 rounded-none md:rounded-lg"></div>
                    <div class="z-10 p-4">
                        <div class="m-auto w-full md:w-3/4">
                            <div class="mx-auto px-3  ">
                                <div class="mx-auto px-3 text-center text-2xl">
                                    <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                       href="{{route("iptbm.admin.technology.view-tech",["technology"=>$task->ip_alert->technology->id])}}">
                                        {{$task->ip_alert->technology->title}}
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

            <div class="mt-5 space-y-4  mt-10">
                <div>
                    <x-header-label class="underline underline-offset-8">
                        {{$task->ip_alert->ip_type->name}}
                    </x-header-label>
                  <div class="text-gray-600 dark:text-gray-400 indent-2">
                      {{$task->stage->stage_name}}
                  </div>
                </div>
                <x-card-panel title="Notes / Description">
                    <div class="bg-white p-4 rounded">
                        {!! $task->description !!}
                    </div>
                    <x-slot:footer>
                        <div class="text-xs italic">
                            Due to font formatting, the background will be fixed to white
                        </div>
                    </x-slot:footer>
                </x-card-panel>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <x-card-panel>
                            <div class="space-y-8">
                                <div class="border border-gray-200 dark:border-gray-600 rounded p-2">
                                    <x-item-header>
                                        Personnel In-charge
                                    </x-item-header>
                                    <ul>
                                        @forelse($task->personnel as $person)
                                            <x-input-label :value="$person->name"/>
                                            {{$person->email}}
                                        @empty
                                            No data available
                                        @endforelse

                                    </ul>
                                </div>
                                <div class="border border-gray-200 dark:border-gray-600 rounded p-2">
                                    <x-item-header>
                                        Unit In-charge
                                    </x-item-header>
                                    <ul>
                                        @forelse($task->units as $unit)
                                            <li>
                                                <x-input-label :value="$unit->name"/>
                                            </li>
                                        @empty
                                            No data available
                                        @endforelse

                                    </ul>
                                </div>
                                <div class="border border-gray-200 dark:border-gray-600 rounded p-2">
                                    <x-item-header>
                                        Priority
                                    </x-item-header>
                                    <div>
                                        @if($task->priority)
                                            {{$task->priority}}
                                        @else
                                            No data available
                                        @endif

                                    </div>

                                </div>
                                <div class="border border-gray-200 dark:border-gray-600 rounded p-2">
                                    <x-item-header>
                                        Deadline
                                    </x-item-header>
                                    <div>
                                        {{\Carbon\Carbon::make($task->deadline)->format('F-d-Y h:i:s a - l')}}
                                    </div>
                                </div>

                                <div class="border border-gray-200 dark:border-gray-600 rounded p-2">
                                    <x-item-header>
                                        Deadline
                                    </x-item-header>
                                    <div>
                                        {{$task->task_status}}
                                    </div>
                                </div>
                            </div>
                        </x-card-panel>

                    </div>

                    <div>
                        <x-card-panel title=" Attachments">
                            <ul>
                                @forelse($task->attachments as $attachment)
                                    <li>
                                        @if($attachment->type==='pdf')
                                            <x-pop-modal name="opentaskAtt-{{$attachment->id}}" class="max-w-6xl">
                                                <iframe class="w-full aspect-video"
                                                        src="{{\Illuminate\Support\Facades\Storage::url($attachment->file)}}"></iframe>
                                            </x-pop-modal>
                                        @else
                                            <x-pop-modal name="opentaskAtt-{{$attachment->id}}" class="max-w-6xl">
                                                <img class="w-full shadow-lg aspect-video"
                                                     src="{{\Illuminate\Support\Facades\Storage::url($attachment->file)}}"
                                                     alt=""/>
                                            </x-pop-modal>
                                        @endif
                                        <button data-modal-toggle="opentaskAtt-{{$attachment->id}}"
                                                class="inline-flex items-center justify-center p-2 text-base font-medium text-sky-700 rounded-lg bg-gray-50 hover:text-gray-900 hover:bg-gray-100 dark:text-sky-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <div class="justify-start flex items-center gap-2">
                                                <div>
                                                    @if($attachment->type==='pdf')
                                                        <svg class="w-6 h-6" aria-hidden="true"
                                                             xmlns="http://www.w3.org/2000/svg" fill="none"
                                                             viewBox="0 0 16 20">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                  stroke-linejoin="round" stroke-width="2"
                                                                  d="M1 18a.969.969 0 0 0 .933 1h12.134A.97.97 0 0 0 15 18M1 7V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2v5M6 1v4a1 1 0 0 1-1 1H1m0 9v-5h1.5a1.5 1.5 0 1 1 0 3H1m12 2v-5h2m-2 3h2m-8-3v5h1.375A1.626 1.626 0 0 0 10 13.375v-1.75A1.626 1.626 0 0 0 8.375 10H7Z"/>
                                                        </svg>
                                                    @else
                                                        <svg class="w-6 h-6" aria-hidden="true"
                                                             xmlns="http://www.w3.org/2000/svg" fill="none"
                                                             viewBox="0 0 16 20">
                                                            <path fill="currentColor"
                                                                  d="M11.045 7.514a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Zm-4.572 3.072L3.857 15.92h7.949l-1.811-3.37-1.61 2.716-1.912-4.679Z"/>
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                  stroke-linejoin="round" stroke-width="2"
                                                                  d="M6 1v4a1 1 0 0 1-1 1H1m14 12a.97.97 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2v16ZM11.045 7.514a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM3.857 15.92l2.616-5.333 1.912 4.68 1.61-2.717 1.81 3.37H3.858Z"/>
                                                        </svg>
                                                    @endif
                                                </div>
                                                <div>
                                                    {{$attachment->description}}
                                                </div>
                                            </div>
                                        </button>


                                    </li>
                                @empty
                                    No data available
                                @endforelse

                            </ul>
                        </x-card-panel>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

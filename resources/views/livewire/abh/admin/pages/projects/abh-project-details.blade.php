<div>
    <nav
        class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="block md:flex justify-between items-center">
                <div class="ps-4 py-2">
                    <x-link-button :url="route('abh.admin.all_projects')" class="text-sky-500 dark:text-sky-500">
                        Back to Projects
                    </x-link-button>
                </div>
            </div>

        </nav>

    </nav>
    <div class=" md:px-4">
        <x-header-label class="mt-10">
            ABH Project Details

        </x-header-label>
        <div class="space-y-5">
            <x-card>
                <div class="space-y-4">
                    <div class="border border-gray-200 dark:border-gray-600 p-4 rounded space-y-4">
                        <x-item-header>
                            Project Tittle
                        </x-item-header>
                        <div class="font-medium">
                            {{$project->project_name}}
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Project Leader</dt>
                            <dd class="text-lg font-semibold">{{$project->project_leader}}</dd>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Approved Implementation
                                Period
                            </dt>
                            <dd class="text-lg font-semibold">{{\Carbon\Carbon::parse($project->implementation_period)->format('F-d-Y')}}</dd>
                        </div>

                    </dl>
                </div>
            </x-card>
            <x-card-panel title="Yearly Implementation Details">
                <ul class="list-inside ">
                    @foreach($project->year_implemented as $key=>$implement)
                        <li class="font-medium text-xl">
                            Year {{$key+1}}
                            <div class="ps-5 text-base">
                                <div>
                                <span>
                                    Duration :
                                </span>
                                    <span>
                                        {{\Carbon\Carbon::parse($implement->date_started)->format('F-d-Y')}}
                                </span>
                                </div>
                                <div class="flex gap-2">
                                    <div>
                                        Budget :
                                    </div>
                                   <div class="flex gap-2 justify-start items-center">
                                       <svg class="w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path
                                               d="M64 32C46.3 32 32 46.3 32 64v64c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 32c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 64v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384h80c68.4 0 127.7-39 156.8-96H352c17.7 0 32-14.3 32-32s-14.3-32-32-32h-.7c.5-5.3 .7-10.6 .7-16s-.2-10.7-.7-16h.7c17.7 0 32-14.3 32-32s-14.3-32-32-32H332.8C303.7 71 244.4 32 176 32H64zm190.4 96H96V96h80c30.5 0 58.2 12.2 78.4 32zM96 192H286.9c.7 5.2 1.1 10.6 1.1 16s-.4 10.8-1.1 16H96V192zm158.4 96c-20.2 19.8-47.9 32-78.4 32H96V288H254.4z"/>
                                       </svg>
                                       {{number_format($implement->budget,2)}}
                                   </div>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
                <x-slot:footer>
                    <div class="flex justify-end items-center pe-10">
                        <div class="border-gray-200 dark:border-gray-700 p-2 gap-3 rounded flex justify-center items-baseline  bg-gray-100 dark:bg-gray-900">
                            <div class="font-medium text-xl">
                                Total Budget :
                            </div>
                            <div>
                                <div class="flex gap-2 justify-start items-baseline">
                                    <svg class="w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path
                                            d="M64 32C46.3 32 32 46.3 32 64v64c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 32c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 64v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384h80c68.4 0 127.7-39 156.8-96H352c17.7 0 32-14.3 32-32s-14.3-32-32-32h-.7c.5-5.3 .7-10.6 .7-16s-.2-10.7-.7-16h.7c17.7 0 32-14.3 32-32s-14.3-32-32-32H332.8C303.7 71 244.4 32 176 32H64zm190.4 96H96V96h80c30.5 0 58.2 12.2 78.4 32zM96 192H286.9c.7 5.2 1.1 10.6 1.1 16s-.4 10.8-1.1 16H96V192zm158.4 96c-20.2 19.8-47.9 32-78.4 32H96V288H254.4z"/>
                                    </svg>
                                    {{number_format($project->year_implemented->sum('budget'),2)}}
                                </div>
                            </div>
                        </div>
                    </div>
                </x-slot:footer>
            </x-card-panel>
        </div>

    </div>
</div>

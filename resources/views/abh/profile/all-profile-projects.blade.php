<x-abh.abh-layout>

    <x-slot name="stickyNavigation">

        <a href="{{route("abh.staff.profile")}}" class="inline-flex items-center justify-center p-2 px-6 text-base font-medium text-sky-500 rounded-lg bg-gray-50 hover:text-sky-900 hover:bg-gray-100 dark:text-sky-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-sky-300">
            <span class="w-full">ABH Profile</span>
        </a>

    </x-slot>
    <div class=" md:px-4 mt-10">
        <x-header-label>
            ABH Projects list
        </x-header-label>
        <div>
            <div class="space-y-10 mt-4">
                @forelse($projects as $project)
                    <x-card-panel >
                        <x-input-label class="font-normal uppercase">
                            {{$project->project_name}}
                        </x-input-label>
                        <div class="space-y-4 mt-4">
                            <div>
                                <div class="w-fit  divide-y divide-gray-200 dark:divide-gray-700">
                                    <div class="py-1 font-medium pe-10">
                                        {{$project->project_leader}}
                                    </div>
                                    <div class="uppercase pe-10 text-xs">
                                        Project Leader
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="w-fit  divide-y divide-gray-200 dark:divide-gray-700">
                                    <div class="py-1 font-medium pe-10">
                                        {{\Carbon\Carbon::parse($project->implementation_period)->format('F-n-Y')}}
                                    </div>
                                    <div class="uppercase pe-10 text-xs">
                                        Approved Implementation Date
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="w-fit  divide-y divide-gray-200 dark:divide-gray-700">
                                    <div class="py-1 font-medium pe-10">
                                        <i class="fa-solid fa-peso-sign"></i> {{number_format($project->year_implemented->sum('budget'),2)}}
                                    </div>
                                    <div class="uppercase pe-10 text-xs">
                                        Total Budget
                                    </div>
                                </div>
                            </div>
                        </div>

                        <x-slot:footer>
                            <div class="text-end pe-10">

                                <a href="{{route("iptbm.staff.project.edit",['id'=>$project->id])}}" class="inline-flex items-center justify-center p-2 text-base font-medium text-gray-500 rounded-lg bg-gray-50 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <svg class="w-5 me-3 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.143 1H1.857A.857.857 0 0 0 1 1.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 7 6.143V1.857A.857.857 0 0 0 6.143 1Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 17 6.143V1.857A.857.857 0 0 0 16.143 1Zm-10 10H1.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 7 16.143v-4.286A.857.857 0 0 0 6.143 11Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z"/>
                                    </svg>
                                    <span class="w-full">Go to project</span>
                                    <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>

                            </div>

                        </x-slot:footer>
                    </x-card-panel>
                @empty
                    <x-card>
                        <div class="font-medium text-center p-4 text-lg">
                            No data available
                        </div>
                    </x-card>

                @endforelse

            </div>
        </div>
    </div>
</x-abh.abh-layout>

<x-abh.abh-layout>
    <x-slot name="stickyNavigation">

        <a href="{{route("abh.staff.profile")}}" class="inline-flex items-center justify-center p-2 px-6 text-base font-medium text-sky-500 rounded-lg bg-gray-50 hover:text-sky-900 hover:bg-gray-100 dark:text-sky-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-sky-300">
            <span class="w-full">ABH Profile</span>
        </a>

    </x-slot>
    <div class=" md:px-4 mt-10">
        <x-header-label>
           ABH Project
        </x-header-label>
        <div class="space-y-4 mt-4">
            <x-card-panel title="Project Details">
                <div  class="space-y-4">
                    <div class="border rounded border-gray-200 dark:border-gray-700 p-4 font-medium text-base">
                        {{$project->project_name}}
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="border rounded border-gray-200 dark:border-gray-700 p-4 flex justify-center items-center gap-4">
                            <div class="font-medium text-base divide-y divide-gray-300 dark:divide-gray-700 w-full">
                                <div class="text-center">
                                    {{$project->project_leader}}
                                </div>
                                <div class="text-center text-base font-normal">
                                    Project Leader
                                </div>
                            </div>
                            <x-secondary-button>
                                Edit
                            </x-secondary-button>
                        </div>

                        <div class="border rounded border-gray-200 dark:border-gray-700 p-4 font-medium text-base divide-y divide-gray-300 dark:divide-gray-700">
                            <div class="text-center">
                                {{\Carbon\Carbon::parse($project->implementation_period)->format('F-d-Y')}}
                            </div>
                            <div class="text-center text-base font-normal">
                                Approve Implementation Date
                            </div>
                        </div>
                        <div class="border rounded border-gray-200 dark:border-gray-700 p-4 flex justify-center items-center gap-4">
                           <x-secondary-button>
                               Change in date of implementation
                           </x-secondary-button>
                        </div>
                    </div>

                </div>

            </x-card-panel>
        </div>
    </div>
</x-abh.abh-layout>

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
                    <livewire:abh.profile.project-detail :project="$project"/>

                </div>

            </x-card-panel>
            <x-card-panel title="Project Year details">
                <x-slot:button>
                    <x-secondary-button>
                        Add Project Year
                    </x-secondary-button>
                </x-slot:button>
                <div>


                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm  text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 w-1/12  border border-gray-100 dark:border-gray-600">
                                    Year
                                </th>
                                <th scope="col" class="px-6 py-3 w-1/12 border border-gray-100 dark:border-gray-600">
                                    Duration
                                </th>
                                <th scope="col" class="px-6 py-3 w-1/6 border border-gray-100 dark:border-gray-600">
                                    End of Project
                                </th>
                                <th scope="col" class="px-6 py-3 w-1/6 border border-gray-100 dark:border-gray-600">
                                    Budget
                                </th>
                                <th scope="col" class="px-6 py-3 w-auto border border-gray-100 dark:border-gray-600">
                                    Extension
                                </th>
                                <th scope="col" class="px-6 py-3 w-1/12 border border-gray-100 dark:border-gray-600">

                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 border font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Year 1
                                </th>
                                <td class="px-6 py-4 border">
                                    Silver
                                </td>
                                <td class="px-6 py-4 border">
                                    Laptop
                                </td>
                                <td class="px-6 py-4 border">
                                    $2999
                                </td>
                                <td class="px-6 py-4 border">
                                    Laptop
                                </td>
                                <td class="px-6 py-4 border">
                                    $2999
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </x-card-panel>
            <x-card-panel title="Project Year details">
                <x-slot:button>
                    <x-secondary-button>
                        Add Project Year
                    </x-secondary-button>
                </x-slot:button>
                <div>


                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm  text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 w-1/12  border border-gray-100 dark:border-gray-600">
                                    Year
                                </th>
                                <th scope="col" class="px-6 py-3 w-1/12 border border-gray-100 dark:border-gray-600">
                                    Duration
                                </th>
                                <th scope="col" class="px-6 py-3 w-1/6 border border-gray-100 dark:border-gray-600">
                                    End of Project
                                </th>
                                <th scope="col" class="px-6 py-3 w-1/6 border border-gray-100 dark:border-gray-600">
                                    Budget
                                </th>
                                <th scope="col" class="px-6 py-3 w-auto border border-gray-100 dark:border-gray-600">
                                    Extension
                                </th>
                                <th scope="col" class="px-6 py-3 w-1/12 border border-gray-100 dark:border-gray-600">

                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 border font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Year 1
                                </th>
                                <td class="px-6 py-4 border">
                                    Silver
                                </td>
                                <td class="px-6 py-4 border">
                                    Laptop
                                </td>
                                <td class="px-6 py-4 border">
                                    $2999
                                </td>
                                <td class="px-6 py-4 border">
                                    Laptop
                                </td>
                                <td class="px-6 py-4 border">
                                    $2999
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </x-card-panel>
            <x-card-panel title="Project Year details">
                <x-slot:button>
                    <x-secondary-button>
                        Add Project Year
                    </x-secondary-button>
                </x-slot:button>
                <div>


                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm  text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 w-1/12  border border-gray-100 dark:border-gray-600">
                                    Year
                                </th>
                                <th scope="col" class="px-6 py-3 w-1/12 border border-gray-100 dark:border-gray-600">
                                    Duration
                                </th>
                                <th scope="col" class="px-6 py-3 w-1/6 border border-gray-100 dark:border-gray-600">
                                    End of Project
                                </th>
                                <th scope="col" class="px-6 py-3 w-1/6 border border-gray-100 dark:border-gray-600">
                                    Budget
                                </th>
                                <th scope="col" class="px-6 py-3 w-auto border border-gray-100 dark:border-gray-600">
                                    Extension
                                </th>
                                <th scope="col" class="px-6 py-3 w-1/12 border border-gray-100 dark:border-gray-600">

                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 border font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Year 1
                                </th>
                                <td class="px-6 py-4 border">
                                    Silver
                                </td>
                                <td class="px-6 py-4 border">
                                    Laptop
                                </td>
                                <td class="px-6 py-4 border">
                                    $2999
                                </td>
                                <td class="px-6 py-4 border">
                                    Laptop
                                </td>
                                <td class="px-6 py-4 border">
                                    $2999
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </x-card-panel>
            <x-card-panel title="Project Year details">
                <x-slot:button>
                    <x-secondary-button>
                        Add Project Year
                    </x-secondary-button>
                </x-slot:button>
                <div>


                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm  text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 w-1/12  border border-gray-100 dark:border-gray-600">
                                    Year
                                </th>
                                <th scope="col" class="px-6 py-3 w-1/12 border border-gray-100 dark:border-gray-600">
                                    Duration
                                </th>
                                <th scope="col" class="px-6 py-3 w-1/6 border border-gray-100 dark:border-gray-600">
                                    End of Project
                                </th>
                                <th scope="col" class="px-6 py-3 w-1/6 border border-gray-100 dark:border-gray-600">
                                    Budget
                                </th>
                                <th scope="col" class="px-6 py-3 w-auto border border-gray-100 dark:border-gray-600">
                                    Extension
                                </th>
                                <th scope="col" class="px-6 py-3 w-1/12 border border-gray-100 dark:border-gray-600">

                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 border font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Year 1
                                </th>
                                <td class="px-6 py-4 border">
                                    Silver
                                </td>
                                <td class="px-6 py-4 border">
                                    Laptop
                                </td>
                                <td class="px-6 py-4 border">
                                    $2999
                                </td>
                                <td class="px-6 py-4 border">
                                    Laptop
                                </td>
                                <td class="px-6 py-4 border">
                                    $2999
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </x-card-panel>
            <x-card>
                <x-danger-button>
                    Delete Project
                </x-danger-button>
            </x-card>
        </div>
    </div>
</x-abh.abh-layout>

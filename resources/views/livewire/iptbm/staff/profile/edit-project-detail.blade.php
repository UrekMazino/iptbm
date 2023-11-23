@php use Carbon\Carbon; @endphp
<div class="my-3 mx-lg-5 px-4 mb-10">
    <div
        class="w-full mb-3 rounded-lg border bg-white dark:bg-gray-700 p-4 shadow-lg border-gray-200 dark:border-gray-600">

        <h1 class="text-2xl mb-2 font-medium text-gray-700 dark:text-white">
            Project Title
        </h1>
        <div class="text-xl text-gray-700 dark:text-gray-200">
            " {{$project->project_name}} "
        </div>
    </div>
    <div
        class="w-full mb-3 pb-5 rounded-lg border bg-white dark:bg-gray-700 p-4 shadow-lg border-gray-200 dark:border-gray-600">

        <h1 class="text-2xl mb-2 font-medium text-gray-700 dark:text-white">
            Project Details
        </h1>
        <div class="">
            <div class=" border border-gray-300 dark:border-gray-600 p-4 rounded-lg w-full md:w-1/3 mb-4 shadow-lg">
                <div class="flex justify-between">
                    <div class="text-gray-700 dark:text-gray-400">
                        Project Leader
                    </div>
                    <div>

                        <!-- Modal toggle -->
                        <x-secondary-button class="text-sky-600  dark:text-sky-600"
                                            data-modal-target="authentication-modal"
                                            data-modal-toggle="authentication-modal">
                            <span class="fa-solid fa-edit me-2"></span>Edit
                        </x-secondary-button>


                        <!-- Main modal -->
                        <div wire:ignore.self id="authentication-modal" tabindex="-1" aria-hidden="true"
                             class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="authentication-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="px-6 py-6 lg:px-8">
                                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update
                                            Project leader</h3>
                                        <form class="space-y-6" wire:submit.prevent="saveProjectLeader">
                                            <x-input-label>
                                                <div>
                                                    Project leader
                                                </div>
                                                <x-text-input wire:model.lazy="projectLeader" class="w-full"
                                                              placeholder="Enter Full name"/>
                                            </x-input-label>

                                            <x-secondary-button wire:loading wire:target="saveProjectLeader"
                                                                class="text-sky-600 w-full   dark:text-sky-600">
                                                <div class="text-center m-auto">
                                                    Processing...
                                                </div>
                                            </x-secondary-button>
                                            <x-secondary-button type="submit" wire:loading.remove
                                                                wire:target="saveProjectLeader"
                                                                class="text-sky-600 w-full text-center  dark:text-sky-600">

                                                <div class="text-center m-auto">
                                                    Update
                                                </div>
                                            </x-secondary-button>


                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div>
                    <div wire:loading wire:target="saveProjectLeader">
                        Loading ...
                    </div>
                    <div class="text-gray-700 dark:text-gray-300">
                        {{$project->project_leader}}
                    </div>

                </div>
            </div>
            <div class="border border-gray-300 dark:border-gray-600 p-4 rounded-lg max-w-md shadow-lg">
                <div class="text-gray-700 dark:text-gray-400">
                    Approve Implementation Data
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 ">
                    <div>
                        <span class="text-gray-600 dark:text-gray-400 me-2">

                        </span>
                        <span class="text-gray-700 dark:text-gray-200 me-2">
                               {{Carbon::createFromFormat('Y-m-d',$Start)->format('F d, Y')}}
                        </span>

                    </div>
                    <div>
                         <span class="text-gray-600 dark:text-gray-400 me-2">
                           Duration
                        </span>
                        <span class="text-gray-700 dark:text-gray-200 me-2">
                               {{$duration}} Month(s)
                        </span>
                    </div>
                </div>
            </div>
            <div class="max-w-md py-2 mt-5 mb-3 border border-gray-300 dark:border-gray-600 p-4 rounded-lg shadow-lg">

                <!-- Modal toggle -->

                <x-secondary-button class="text-sky-600  dark:text-sky-600" data-modal-target="impChanges"
                                    data-modal-toggle="impChanges">
                    Change in Implementation Date
                </x-secondary-button>

                <!-- Main modal -->
                <div wire:ignore.self data-modal-placement="top-center" data-modal-backdrop="static" id="impChanges"
                     tabindex="-1" aria-hidden="true"
                     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="impChanges">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Changes in Date of
                                    Implementation</h3>
                                <form class="space-y-6" wire:submit.prevent="saveChanges">
                                    <div class="w-full">


                                        <div class="relative max-w-sm">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                     viewBox="0 0 20 20">
                                                    <path
                                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                </svg>
                                            </div>
                                            <x-text-input readonly class="pl-10 p-2.5 w-full" autocomplete="off"
                                                          datepicker datepicker-format="MM-dd-yyyy"
                                                          wire:model="changeImp" id="newDate"
                                                          placeholder="select date"/>

                                        </div>
                                        @error('changeImp')
                                        <p id="filled_error_help"
                                           class="mt-2 text-xs text-red-600 dark:text-red-400">{{$message}}</p>
                                        @enderror
                                        <div>
                                            @if($changeEndModel)
                                                <div class="mt-3 text-gray-600 dark:text-gray-400">
                                                    Project Ends date :
                                                </div>
                                                <div class="mt-3 text-gray-700 dark:text-gray-100">
                                                    {{$changeEndModel}}
                                                </div>
                                            @endif
                                        </div>
                                        {{--------
                                              <div date-rangepicker   datepicker-orientation="bottom"  datepicker-buttons datepicker-format="MM-dd-yyyy" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                                                    <div>
                                                                                        <span class="mx-4 text-gray-500">From</span>
                                                                                        <div class="relative" wire:ignore>
                                                                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                                                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                                                                </svg>
                                                                                            </div>
                                                                                            <input datepicker-orientation="top" id="fromDate" autocomplete="off"  x-ref="datepicker" required  name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">

                                                                                        </div>
                                                                                        @error('changeStartModel')
                                                                                        <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{$message}}</p>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div>
                                                                                        <span class="mx-4 text-gray-500">To</span>
                                                                                        <div class="relative" >
                                                                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                                                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                                                                </svg>
                                                                                            </div>
                                                                                            <input  id="toDate" autocomplete="off"  x-ref="datepicker" required name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                                                                                        </div>
                                                                                        @error('changeEndModel')
                                                                                        <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{$message}}</p>
                                                                                        @enderror
                                                                                    </div>


                                                                                </div>

                                        -------------}}


                                    </div>

                                    <x-secondary-button wire:loading.remove wire:target="saveChanges" type="submit"
                                                        class="text-sky-600 w-full text-center  dark:text-sky-600">
                                        <div class="text-center m-auto">
                                            Submit
                                        </div>
                                    </x-secondary-button>

                                    <x-secondary-button readonly wire:loading wire:target="saveChanges"
                                                        class="text-sky-600 w-full text-center  dark:text-sky-600">
                                        <div class="text-center m-auto">
                                            Processing...
                                        </div>
                                    </x-secondary-button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @if($this->project->projectDetails()->where('date_implemented_start',$this->project->implementation_period)->first()->change_of_implementation)
                    <div class="mt-2">
                   <span class="text-gray-600 dark:text-gray-400 me-2">
                        New Implementation Date:
                   </span>
                        <span class="text-gray-700 dark:text-gray-200 me-2">

                        {{Carbon::createFromFormat('Y-m-d', $this->project->projectDetails()->where('date_implemented_start',$this->project->implementation_period)->first()->change_of_implementation)->format('F d, Y')}}



                   </span>

                    </div>
                @endif

            </div>
        </div>

        <div class="relative overflow-x-auto">

            <div class="flex justify-end mb-2">
                <livewire:iptbm.staff.profile.add-project-year :project="$this->project"/>
                <x-secondary-button class="text-sky-600  dark:text-sky-600"
                                    data-modal-target="authentication-modal-addYearProj"
                                    data-modal-toggle="authentication-modal-addYearProj">
                    Add Project Year
                </x-secondary-button>
            </div>
            <table class="w-full table-auto  text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-500 uppercase bg-gray-50 dark:bg-gray-600 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 w-1/12  py-3 border border-gray-400 dark:border-gray-800">
                        Year
                    </th>
                    <th scope="col" class="px-6 py-3  w-1/12 border border-gray-400 dark:border-gray-800">
                        Duration
                    </th>
                    <th scope="col" class="px-6 py-3 w-1/5 border border-gray-400 dark:border-gray-800">
                        End of Project
                    </th>
                    <th scope="col" class="px-6 py-3 w-1/5 border border-gray-400 dark:border-gray-800">
                        Budget
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400 dark:border-gray-800">
                        Extensions
                    </th>

                    <th scope="col" class="px-6 w-1/12 py-3 border border-gray-400 dark:border-gray-800">

                    </th>


                </tr>
                </thead>
                <tbody>

                @foreach($project->projectDetails as $key=>$budget)

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6   py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white  border border-gray-200 dark:border-gray-700">
                            {{---\Carbon\Carbon::parse($budget->year_implemented)->year---}}
                            Year {{$key+1}}
                        </th>
                        <td class="px-6 py-4 whitespace-nowrap border border-gray-200 dark:border-gray-700">
                            {{$duration}} Month(s)
                        </td>

                        <td class="px-6  py-4 border border-gray-200 dark:border-gray-700">
                            <div>
                                From:
                                @if($budget->change_of_implementation)
                                    {{Carbon::createFromFormat('Y-m-d',$budget->change_of_implementation)->format('F d, Y')}}
                                @else
                                    {{Carbon::createFromFormat('Y-m-d',$budget->date_implemented_start)->format('F d, Y')}}
                                @endif


                            </div>
                            <div>
                                To: {{Carbon::createFromFormat('Y-m-d',$budget->date_implemented_end)->format('F d, Y')}}
                            </div>
                        </td>

                        <td class="px-6  py-4 border border-gray-200 dark:border-gray-700">

                            <div class="flex justify-between items-center">
                                <div>
                                    <span
                                        class="fa-solid fa-peso-sign me-2"></span> {{number_format($budget->year_budget, 2)}}
                                </div>
                                <div>
                                    <livewire:iptbm.staff.profile.year-budget wire:key="{{$key}}" :budget="$budget"/>

                                    <button data-modal-target="authentication-modal-{{$budget->id}}"
                                            data-modal-toggle="authentication-modal-{{$budget->id}}"
                                            class="text-blue-500 hover:scale-110 transition duration-300" type="button">
                                        <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                             fill="currentColor" viewBox="0 0 20 18">
                                            <path
                                                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                            <path
                                                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                        </svg>
                                    </button>
                                </div>


                            </div>
                        </td>
                        <td class="border border-gray-200 dark:border-gray-700 px-2">
                            <div class="flex justify-between items-center ">
                                <div class="text-sm">
                                    @if($budget->extended_duration)
                                        {{$budget->extended_duration}}Month(s)
                                        <span class="ms-3">
                                            End: {{Carbon::parse($budget->date_implemented_end)->addMonths($budget->extended_duration)->subDay()->format('F-Y')}}

                                    </span>
                                    @endif


                                </div>
                                <div>
                                    @if($budget->extendable)
                                        <livewire:iptbm.staff.profile.add-extension wire:key="{{$key}}"
                                                                                    :projectYear="$budget"/>

                                        <x-secondary-button class="text-sky-600  dark:text-sky-600"
                                                            data-modal-target="authentication-modal-extend-{{$budget->id}}"
                                                            data-modal-toggle="authentication-modal-extend-{{$budget->id}}">
                                            Extend
                                        </x-secondary-button>
                                    @endif

                                </div>
                            </div>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap border border-gray-200 dark:border-gray-700">
                            @if($key!=0)
                                @if($projectState)
                                    <livewire:iptbm.staff.profile.delete-project-year :project="$project"
                                                                                      wire:key="delete-{{$key}}"
                                                                                      :projectYear="$budget"/>
                                    <x-secondary-button class="text-red-700 dark:text-red-700"
                                                        data-modal-target="popup-modal-delete-{{$budget->id}}"
                                                        data-modal-toggle="popup-modal-delete-{{$budget->id}}">
                                        <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 18 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                        </svg>
                                    </x-secondary-button>
                                @endif
                            @endif


                        </td>
                    </tr>

                @endforeach
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" colspan="3"
                        class="px-6 text-end  py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white  border border-gray-200 dark:border-gray-700">
                        Total Budget
                    </th>
                    <th scope="row" colspan="3"
                        class="px-6   py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white  border border-gray-200 dark:border-gray-700">
                        <div>
                            <span
                                class="fa-solid fa-peso-sign me-2"></span> {{number_format($project->projectDetails->sum('year_budget'), 2)}}
                        </div>

                    </th>
                </tr>
                </tbody>
            </table>
        </div>


    </div>
    <div
        class="w-full flex justify-end mb-3 rounded-lg border bg-white dark:bg-gray-700 p-4 shadow-lg border-gray-200 dark:border-gray-600">


        <div wire:ignore.self id="popup-modal-{{$project->id}}" tabindex="-1"
             class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="popup-modal-{{$project->id}}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{$project->project_name}}</h3>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                            delete this Item?</h3>
                        <button wire:click.prevent="deleteProject" data-modal-hide="popup-modal" type="button"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="popup-modal-{{$project->id}}" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            No, cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <x-danger-button data-modal-target="popup-modal-{{$project->id}}"
                             data-modal-toggle="popup-modal-{{$project->id}}" class="justify-center items-center">
                <svg class="w-6 me-3 h-6 text-red-300 dark:text-red-300" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                </svg>
                Delete Project
            </x-danger-button>
        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {

            function convertDateFormat(inputDate) {
                // Create a Date object from the input date string
                const dateObj = new Date(inputDate);

                // Extract the month, day, and year components
                const month = dateObj.getMonth() + 1; // Months are zero-indexed, so add 1
                const day = dateObj.getDate();
                const year = dateObj.getFullYear();

                // Format the components as "M-d-YYYY" (e.g., "9-20-2023")
                return `${year}-${month}-${day}`;
            }

            document.getElementById('newDate').addEventListener('changeDate', (event) => {

                @this.
                changeImp = event.target.value;

            });
            {{----
            document.getElementById('fromDate').addEventListener('changeDate', (event) => {
                @this.changeStartModel=convertDateFormat(event.target.value);
            });
            document.getElementById('toDate').addEventListener('changeDate', (event) => {

                @this.changeEndModel=convertDateFormat(event.target.value);
            });
            --}}



        });
    </script>
@endpush

@php use Carbon\Carbon;
@endphp
<div class="w-full mb-10 p-0 md:px-4">
    <x-header-label class="mt-10 mb-4">
        IP-TBM Project
    </x-header-label>
    <div class="space-y-4">
        <x-card-panel title="Project Details">
            <div class="space-y-4">
                <div
                    class="border py-4 px-1 rounded border-gray-200 dark:border-gray-700 divide-y divide-gray-200 dark:divide-gray-700">
                    <div class="text-center">
                        <x-input-label>
                            {{$project->project_name}}
                        </x-input-label>
                    </div>
                    <div class="text-center">
                        Project Title
                    </div>
                </div>

                <x-grid col="2" gap="4">
                    <div class="border py-4 px-1 rounded border-gray-200 dark:border-gray-700 justify-between flex">
                        <div class="divide-y divide-gray-200 dark:divide-gray-700 w-full">
                            <div class="text-center">
                                <x-input-label>
                                    {{$project->project_leader}}
                                </x-input-label>
                            </div>
                            <div class="text-center">
                                Project Leader
                            </div>
                        </div>

                    </div>

                    <div
                        class="border py-4 px-1 rounded border-gray-200 dark:border-gray-700 divide-y divide-gray-200 dark:divide-gray-700">
                        <div class="text-center">
                            <x-input-label>
                                {{Carbon::createFromFormat('Y-m-d',$project->implementation_period)->format('F d, Y')}}
                            </x-input-label>
                        </div>
                        <div class="text-center">
                            Approved date of Implementation
                        </div>
                    </div>

                    <div class="border py-4 px-1 rounded border-gray-200 dark:border-gray-700 justify-between flex">
                        <x-pop-modal name="updatedImp" class="max-w-xl" static="true" modal-title="Updated Implementation Date">
                            <form class="space-y-4" wire:submit.prevent="saveChanges">
                                <div>
                                    <div class="relative max-w-full">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                 aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                 fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                            </svg>
                                        </div>
                                        <x-text-input class="w-full ps-10" wire:model="changeImp" id="newDate" type="text" datepicker datepicker-format="MM-dd-yyyy" placeholder="Select Date"/>
                                    </div>
                                    <x-input-error :messages="$errors->get('changeImp')"/>
                                </div>
                                <div>
                                    <x-submit-button class="min-w-full">
                                        <div class="w-full p-2 text-center">
                                            Submit
                                        </div>
                                    </x-submit-button>
                                </div>
                            </form>
                        </x-pop-modal>
                        @if($project->update_implementation_period)
                            <div class="divide-y divide-gray-200 dark:divide-gray-700 w-full">
                                <div class="text-center">
                                    <x-input-label>
                                        {{Carbon::parse($this->project->update_implementation_period)->format('F d, Y')}}
                                    </x-input-label>
                                </div>
                                <div class="text-center">
                                    New Date of Implementation
                                </div>
                            </div>
                            @if($project->projectDetails()->count()===1)
                                <div>
                                    <x-secondary-button class="text-sky-500 dark:text-sky-500" data-modal-target="updatedImp" data-modal-toggle="updatedImp">
                                        edit
                                    </x-secondary-button>
                                </div>
                            @endif
                        @else
                            <div class="w-full text-center">
                                <x-secondary-button class="text-sky-600  dark:text-sky-600" data-modal-target="updatedImp" data-modal-toggle="updatedImp">
                                    Change in Implementation Date
                                </x-secondary-button>
                            </div>

                        @endif
                    </div>

                </x-grid>

            </div>

        </x-card-panel>
        <x-card-panel title="Project Year Details">
            <x-slot:button>
                <livewire:iptbm.staff.profile.add-project-year :project="$this->project"/>
                <x-secondary-button class="text-sky-600  dark:text-sky-600"
                                    data-modal-target="authentication-modal-addYearProj"
                                    data-modal-toggle="authentication-modal-addYearProj">
                    Add Project Year
                </x-secondary-button>
            </x-slot:button>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm  text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
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
                                {{$budget->duration}} Month(s)
                            </td>

                            <td class="px-6 py-4 border  border-gray-100 dark:border-gray-600">
                                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                                    From:

                                    @if($project->update_implementation_period)
                                        <div>
                                            Fr: {{Carbon::parse($budget->date_start)->format('F-d-Y')}}
                                        </div>

                                    @else
                                        {{Carbon::createFromFormat('Y-m-d',$budget->date_start)->format('F d, Y')}}
                                    @endif


                                </div>
                                <div>
                                    {{----------------
                                     To: {{Carbon::createFromFormat('Y-m-d',$budget->date_implemented_end)->format('F d, Y')}}

                                    ----------------}}

                                    <div>
                                        To: {{Carbon::parse($budget->date_start)->addMonths($budget->duration)->setDay(Carbon::parse($budget->date_start)->day-1)->format('F-d-Y')}}
                                    </div>

                                </div>
                            </td>

                            <td class="px-6  py-4 border border-gray-200 dark:border-gray-700">

                                <div class="flex justify-between items-center">
                                    <div>
                                    <span
                                        class="fa-solid fa-peso-sign me-2"></span> {{number_format($budget->year_budget, 2)}}
                                    </div>
                                    <div>
                                        <livewire:iptbm.staff.profile.year-budget wire:key="{{$key}}"
                                                                                  :budget="$budget"/>


                                    </div>


                                </div>
                            </td>
                            <td class="border border-gray-200 dark:border-gray-700 px-2">
                                <div class="flex justify-between items-center ">
                                    <div class="text-sm">
                                        @if($budget->extended_duration)
                                            {{$budget->extended_duration}} Month(s)
                                            <span class="ms-3">
                                            End:

                                                {{Carbon::parse($budget->date_start)->addMonths($budget->duration+$budget->extended_duration)->setDay(Carbon::parse($budget->date_start)->day-1)->format('F-Y')}}
                                    </span>
                                        @endif


                                    </div>
                                    <div>
                                        @if($project->projectDetails->count()-1==$key)
                                            <livewire:iptbm.staff.profile.add-extension wire:key="{{$key}}"
                                                                                        :projectYear="$budget"/>


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
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round"
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
        </x-card-panel>
        <x-card>
            <x-pop-modal class="max-w-md" name="popup-modal-{{$project->id}}">
                <div class="p-6 w-full text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2"
                              d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{$project->project_name}}</h3>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want
                        to
                        delete this Item?</h3>
                    <button wire:click.prevent="deleteProject" data-modal-hide="popup-modal-{{$project->id}}" type="button"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="popup-modal-{{$project->id}}" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        No, cancel
                    </button>
                </div>
            </x-pop-modal>

            <x-danger-button data-modal-target="popup-modal-{{$project->id}}"
                             data-modal-toggle="popup-modal-{{$project->id}}" class="justify-center items-center">
                <svg class="w-6 me-3 h-6 text-red-300 dark:text-red-300" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                </svg>
                Delete Project
            </x-danger-button>
        </x-card>
    </div>


</div>
@push('scripts')
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {


            document.getElementById('newDate').addEventListener('changeDate', (event) => {

                @this.changeImp = event.target.value;

            });


        });
    </script>
@endpush

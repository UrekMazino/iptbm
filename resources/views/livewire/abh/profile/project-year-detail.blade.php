<x-card-panel title="Project Year details">
    <x-slot:button>
        <x-pop-modal name="addProjYear" class="max-w-xl" static="true" modal-title="Add Project Year">
            <form class="space-y-10" wire:submit.prevent="saveForm">
                <div class="space-y-4">
                    <div>
                        <x-input-label value="Date of Implementation"/>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <x-text-input wire:model.lazy="dateImp" datepicker datepicker-format="MM-dd-yyyy" id="dateImp" placeholder="Enter text" class="w-full ps-10"/>
                        </div>

                        <x-input-error :messages="$errors->get('dateImp')"/>
                    </div>
                    <div>
                        <x-input-label value="Duration"/>
                        <x-text-input wire:model.lazy="duration" type="number" min="1"  placeholder="Enter text" class="w-full"/>
                        <x-input-error :messages="$errors->get('duration')"/>
                    </div>
                    <div>
                        <x-input-label value="Budget"/>
                        <x-text-input  wire:model.lazy="budget" type="number" min="1" step="any" min="0"  placeholder="Enter text" class="w-full"/>
                        <x-input-error :messages="$errors->get('budget')"/>
                    </div>
                </div>
                <div>
                    <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveForm">
                        <div class="w-full p-2 text-center" wire:loading wire:target="saveForm">
                            Processing...
                        </div>
                        <div class="w-full p-2 text-center" wire:loading.remove wire:target="saveForm">
                            Submit
                        </div>
                    </x-submit-button>
                </div>
            </form>
        </x-pop-modal>
        <x-secondary-button data-modal-toggle="addProjYear" class="text-sky-500 dark:text-sky-500">
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
                @foreach($project->year_implemented as $key=>$perYear)
                    <tr class="bg-white border-b  border-gray-100 dark:border-gray-600 dark:bg-gray-800">
                        <th scope="row" class="px-6 py-4 border  border-gray-100 dark:border-gray-600 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Year {{$key+1}}
                        </th>
                        <td class="px-6 py-4 border  border-gray-100 dark:border-gray-600 whitespace-nowrap">
                            {{$perYear->duration}} Month(s)
                        </td>
                        <td class="px-6 py-4 border  border-gray-100 dark:border-gray-600">
                            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                                <div>
                                  Fr:  {{\Carbon\Carbon::parse($perYear->date_started)->format('F-d-Y')}}
                                </div>
                                <div>
                                  To:   {{\Carbon\Carbon::parse($perYear->date_started)->addMonths($perYear->duration)->setDay(\Carbon\Carbon::parse($perYear->date_started)->day-1)->format('F-d-Y')}}
                                </div>
                            </div>

                        </td>
                        <td class="px-6 py-4 border whitespace-nowrap  border-gray-100 dark:border-gray-600">
                            <i class="fa-solid fa-peso-sign me-2"></i>
                            {{number_format($perYear->budget,2)}}
                        </td>
                        <td class="px-6 py-4 border  border-gray-100 dark:border-gray-600">
                            <livewire:abh.profile.per-year-detail :per-year="$perYear" />

                        </td>
                        <td class="px-6 py-4 border  border-gray-100 dark:border-gray-600">
                            @if($key!=0)
                                @if($project->year_implemented->count()-1===$key)
                                    <div id="deleteYearProj-{{$perYear->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                            <!-- Modal content -->
                                            <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                                <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteYearProj-{{$perYear->id}}">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                <p class="mb-4 text-gray-500 dark:text-gray-300">{{$project->project_name}}</p>
                                                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                                <div class="flex justify-center items-center space-x-4">
                                                    <button data-modal-toggle="deleteYearProj-{{$perYear->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                        No, cancel
                                                    </button>
                                                    <button type="submit" wire:click.prevent="deleteYear({{$perYear->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                        Yes, I'm sure
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <x-secondary-button class="text-red-500 dark:text-red-500" data-modal-toggle="deleteYearProj-{{$perYear->id}}">
                                        <i class="fa-solid fa-trash"></i>
                                    </x-secondary-button>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot class="text-xl">
                <tr>
                    <th colspan="3" class="text-end border px-6 py-3   border-gray-100 dark:border-gray-600">
                       Total Budget
                    </th>
                    <th colspan="3" class="px-6 py-3 border  border-gray-100 dark:border-gray-600">
                        <i class="fa-solid fa-peso-sign me-2"></i>
                        {{number_format($project->year_implemented->sum('budget'))}}
                    </th>
                </tr>
                </tfoot>
            </table>
        </div>

    </div>
</x-card-panel>
@push('scripts')
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {
            document.getElementById('dateImp').addEventListener('changeDate', (event) => {

                @this.dateImp = event.target.value;
            });
        })

    </script>
@endpush

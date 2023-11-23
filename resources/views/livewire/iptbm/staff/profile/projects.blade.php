<x-card>
    <div class="grid grid-cols-2 mb-3 ">
        <div>
            <h1 class="text-2xl text-bold mb-4  text-gray-700 dark:text-gray-100">
                IP-TBM Project Title
            </h1>
        </div>
        <div class="grid justify-items-end">

            <!-- Modal toggle -->


            <!-- Main modal -->
            <div wire:ignore.self id="authentication-modal-project" tabindex="-1" aria-hidden="true"
                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-3xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                        <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="authentication-modal-project">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">IP-TBM Project
                                Title</h3>
                            <form wire:submit.prevent="saveProject" wire:ignore.self>
                                <div
                                    class="w-full rounded-lg p-4 border-l border-r border-t bg-gray-200 dark:bg-gray-800 border-b border-gray-700 border-opacity-25 dark:border-gray-500 dark:border-opacity-25">
                                    <div>
                                        <label for="message"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project
                                            Title</label>
                                        <textarea wire:model="projectName" id="message" rows="4"
                                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-t border-b border-l border-r @if($errors->has('projectName')) border-red-500  @else border-gray-300 dark:border-gray-600 @endif rounded-lg  focus:ring-blue-500 focus:border-blue-500   dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                  placeholder="Enter text here.."> </textarea>
                                        @error('projectName')
                                        <p id="filled_error_help"
                                           class="mt-2 text-xs text-red-600 dark:text-red-400">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-4">
                                        <label for="projLeader"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project
                                            Leader</label>
                                        <input wire:model="projectLeader" type="text" id="projLeader"
                                               placeholder="Enter full name"
                                               class="bg-gray-50 border-t border-b border-l border-r border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               required>
                                        @error('projectLeader')
                                        <p id="filled_error_help"
                                           class="mt-2 text-xs text-red-600 dark:text-red-400">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-4  ">
                                        <div class="block m text-sm font-medium text-gray-900 dark:text-white">
                                            Project Implementation Period
                                        </div>
                                        <div class="w-full">

                                            <div class="relative max-w-sm">
                                                <div
                                                    class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                         fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                    </svg>
                                                </div>
                                                <input datepicker datepicker-format="MM-dd-yyyy"
                                                       wire:model="implementationStart" id="DateApprove" type="text"
                                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                       placeholder="Select date">
                                            </div>
                                            @error('implementationStart')
                                            <p id="filled_error_help"
                                               class="mt-2 text-xs text-red-600 dark:text-red-400">{{$message}}</p>
                                            @enderror
                                        </div>


                                    </div>
                                    <div class="mt-4  max-w-sm">
                                        <label for="y1Bud"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Duration
                                            <span class="text-sm ms-2 font-thin">
                                                    (In months)
                                                </span>
                                        </label>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>

                                                <input @if(!$implementationStart) disabled
                                                       @endif wire:model.lazy="duration" type="number" id="y1Bud"
                                                       min="0" value="0"
                                                       class="bg-gray-50 border-t border-b border-l border-r border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                       required>
                                                @error('duration')
                                                <p id="filled_error_help"
                                                   class="mt-2 text-xs text-red-600 dark:text-red-400">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <div class="text-sm font-medium text-gray-900 dark:text-white ">
                                                Project Ends:
                                                <div>
                                                    {{$implementationEnd}}
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="mt-4  max-w-sm">
                                        <label for="y1Bud"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Year 1 Budget
                                        </label>
                                        <input wire:model.lazy="year1Budget" step="any" type="number" id="y1Bud" min="0"
                                               value="0"
                                               class="bg-gray-50 border-t border-b border-l border-r border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               required>
                                        @error('year1Budget')
                                        <p id="filled_error_help"
                                           class="mt-2 text-xs text-red-600 dark:text-red-400">{{$message}}</p>
                                        @enderror
                                    </div>
                                    {{----
                                     <div class="mt-4  max-w-sm">
                                         <label for="y2Bud" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                             Year 2 Budget
                                         </label>
                                         <input wire:model="year2Budget" type="number" id="y2Bud" value="0"
                                                class="bg-gray-50 border-t border-b border-l border-r border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required>
                                         @error('year2Budget')
                                         <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{$message}}</p>
                                         @enderror
                                     </div>
                                    ----}}
                                    <div class="mt-4  w-full">


                                        <button type="submit"
                                                class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <x-secondary-button data-modal-target="authentication-modal-project"
                                data-modal-toggle="authentication-modal-project"
                                class="text-sky-600  dark:text-sky-600 ">
                <div class="m-auto text-center">
                    <span class="fa-solid fa-plus-circle"></span> Add new Project
                </div>
            </x-secondary-button>

        </div>
    </div>


    <div>
        <ul>
            @if($profile->projects->count() > 0)
                @foreach($profile->projects as $project)
                    <li>
                        <div
                            class="grid grid-cols-1 md:grid-cols-5 px-1  justify-between items-center py-2 hover:bg-gray-500 hover:bg-opacity-20 transition duration-300 rounded">
                            <div class="col-span-4  text-gray-700 dark:text-gray-300">
                                {{$project->project_name}}
                            </div>
                            <div class="justify-end flex bg-bla">

                                <a href="{{route('iptbm.staff.project.edit',['id'=>$project->id])}}"
                                   class="font-medium m-auto text-blue-600 dark:text-blue-500 hover:underline">View</a>

                            </div>
                        </div>

                    </li>
                @endforeach
            @else
                <div class="form-label text-center  alert alert-dark">
                    No Data Available
                </div>
            @endif
        </ul>
    </div>
    @if($recentDeletedProjects->count()>0)
        <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-600">
        <div class="text-gray-600 dark:text-gray-400">
            Recently Deleted Projects
        </div>
        <div class="divide-y">
            @foreach($recentDeletedProjects as $prerProject)
                <div class="grid grid-cols-4 p-2 hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-300">
                    <div class="col-span-3 flex items-center text-sm text-gray-700 dark:text-gray-300">
                        {{$prerProject->project_name}}
                    </div>
                    <div>
                        <livewire:iptbm.staff.profile.restore-project :project="$prerProject"/>
                        <x-secondary-button data-modal-target="popup-modal-restore-{{$prerProject->id}}"
                                            data-modal-toggle="popup-modal-restore-{{$prerProject->id}}">
                            <svg class="w-[17px] h-[17px] text-gray-800 dark:text-white" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M16 1v5h-5M2 19v-5h5m10-4a8 8 0 0 1-14.947 3.97M1 10a8 8 0 0 1 14.947-3.97"/>
                            </svg>
                            Restore
                        </x-secondary-button>
                    </div>
                </div>
            @endforeach

        </div>

    @endif
</x-card>

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

            document.getElementById('DateApprove').addEventListener('changeDate', (event) => {

                @this.
                implementationStart = event.target.value;
            });
            document.getElementById('fromDate').addEventListener('changeDate', (event) => {
                // @this.implementationStart=convertDateFormat(event.target.value);
            });
            document.getElementById('toDate').addEventListener('changeDate', (event) => {

                //   @this.implementationEnd=convertDateFormat(event.target.value);
            });
        });
    </script>
@endpush



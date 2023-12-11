<x-card-panel title="IP-TBM Project Title">
    <x-slot:button>
        <x-pop-modal static="true" class="max-w-2xl" name="authentication-modal-project" modal-title="IP-TBM Project Title">
            <form wire:submit.prevent="saveProject" wire:ignore.self class="space-y-10">
                <div class="space-y-4 w-full rounded-lg p-4 border  border-gray-700 border-opacity-25 dark:border-gray-500 dark:border-opacity-25">
                    <div>
                        <x-input-label value="Project Title"/>
                        <x-text-box required wire:model.lazy="projectName" placeholder="enter text here..." class="w-full" rows="4"/>
                        <x-input-error :messages="$errors->get('projectName')"/>
                    </div>
                    <div>
                        <x-input-label value="Project Leader"/>
                        <x-text-input class="w-full" wire:model.lazy="projectLeader" placeholder="enter text here..."/>
                        <x-input-error :messages="$errors->get('projectLeader')"/>
                    </div>

                    <div>
                        <x-input-label value="Project Implementation Period"/>
                        <div class="w-full">
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
                                <x-text-input class="w-full ps-10" wire:model="implementationStart" id="DateApprove" type="text" datepicker datepicker-format="MM-dd-yyyy" placeholder="Select Date"/>
                            </div>
                            @error('implementationStart')
                            <p id="filled_error_help"
                               class="mt-2 text-xs text-red-600 dark:text-red-400">{{$message}}</p>
                            @enderror
                        </div>


                    </div>
                    <div class="border border-gray-200 dark:border-gray-700 p-2 rounded">
                        <x-grid col="2" gap="4">
                            <div>
                                <x-input-label value="Duration"/>
                                <x-text-input required disabled="{{(!$implementationStart)}}" wire:model="duration"  type="number" max="100" min="0" placeholder="Enter number of duration" class="w-full"/>

                                @error('duration')
                                <p id="filled_error_help"
                                   class="mt-2 text-xs text-red-600 dark:text-red-400">{{$message}}</p>
                                @enderror
                            </div>
                            <div>
                                <x-input-label value="Project Ends"/>
                                <div class="text-2xl">
                                    {{$implementationEnd}}
                                </div>
                            </div>
                        </x-grid>
                    </div>


                    <div>
                        <x-input-label value="Year 1 Budget"/>
                        <x-text-input placeholder="enter amount" class="w-full" wire:model.lazy="year1Budget" step="any" type="number" min="0" max="999999999"/>
                       <x-input-error :messages="$errors->get('year1Budget')"/>
                    </div>

                </div>
                <div>
                   <x-submit-button  wire:loading.attr="disabled"  class="p-2 text-center min-w-full">
                       <div wire:loading wire:target="saveProject"  class="p-2 w-full text-center">
                           Processing...
                       </div>
                       <div wire:loading.remove wire:target="saveProject" class="p-2 w-full text-center">
                           Submit
                       </div>
                   </x-submit-button>
                </div>
            </form>
        </x-pop-modal>
        <x-secondary-button data-modal-target="authentication-modal-project"
                            data-modal-toggle="authentication-modal-project"
                            class="text-sky-600  dark:text-sky-600 ">
            <div class="m-auto text-center">
                <span class="fa-solid fa-plus-circle"></span> Add new Project
            </div>
        </x-secondary-button>
    </x-slot:button>
    <div class="space-y-4">
        <ul class="list-disc ps-4">
            @if($profile->projects->count() > 0)
                @foreach($profile->projects as $project)
                    <li>
                        <a href="{{route('iptbm.staff.project.edit',['id'=>$project->id])}}" class=" text-base m-auto text-blue-600 dark:text-blue-500 hover:underline">    {{$project->project_name}}</a>
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
</x-card-panel>



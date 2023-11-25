<x-card-panel title="Profile Details">
    <div class="space-y-4">
        <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 flex justify-between items-center">
            <div class="divide-y w-full divide-gray-300 dark:divide-gray-700 ">
                <div>
                   @if($profile->office_address)
                       <div class="font-medium text-gray-700 dark:text-white">
                           {{$profile->office_address}}
                       </div>
                   @else
                       <div class="text-gray-400 dark:text-gray-500 text-base font-normal">
                           No data available
                       </div>
                   @endif
               </div>
                <div>
                    Office Address
                </div>
            </div>
            <div>
                <x-pop-modal class="max-w-xl" name="editProfAdre" static="true" modal-title="Update Office Address">
                    <form class="space-y-4" wire:submit.prevent="saveAddress">
                        <div>
                            <x-input-label value="Address"/>
                            <x-text-input wire:model.lazy="address" class="w-full" placeholder="Enter text here.."/>
                            <x-input-error :messages="$errors->get('address')"/>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled"
                                             wire:target="saveAddress">
                                <div class="p-2 mx-auto text-center" wire:loading.remove wire:target="saveAddress">
                                    Submit
                                </div>
                                <div class="p-2 mx-auto text-center" wire:loading wire:target="saveAddress">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>
                <x-secondary-button data-modal-toggle="editProfAdre">
                    Edit
                </x-secondary-button>
            </div>
        </div>
        <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 flex justify-between items-center">
            <div class="divide-y w-full divide-gray-300 dark:divide-gray-700 ">
                <div>
                    @if($profile->project_leader)
                        <div class="font-medium text-gray-700 dark:text-white">
                            {{$profile->project_leader}}
                        </div>
                    @else
                        <div class="text-gray-400 dark:text-gray-500 text-base font-normal">
                            No data available
                        </div>
                    @endif
                </div>

                <div>
                    Project Leader
                </div>
            </div>
            <div>
                <x-pop-modal class="max-w-xl" name="editProjectLead" static="true" modal-title="Update Project Leader">
                    <form class="space-y-4" wire:submit.prevent="saveProjectLeader">
                        <div>
                            <x-input-label value="Project Leader"/>
                            <x-text-input wire:model.lazy="project_leader" class="w-full" placeholder="Enter text here.."/>
                            <x-input-error :messages="$errors->get('project_leader')"/>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled"
                                             wire:target="saveProjectLeader">
                                <div class="p-2 mx-auto text-center" wire:loading.remove wire:target="saveProjectLeader">
                                    Submit
                                </div>
                                <div class="p-2 mx-auto text-center" wire:loading wire:target="saveProjectLeader">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>
                <x-secondary-button data-modal-toggle="editProjectLead">
                    Edit
                </x-secondary-button>
            </div>
        </div>
        <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 flex justify-between items-center">
            <div class="divide-y w-full divide-gray-300 dark:divide-gray-700 ">
                <div>
                    @if($profile->manager)
                        <div class="font-medium text-gray-700 dark:text-white">
                            {{$profile->manager}}
                        </div>
                    @else
                        <div class="text-gray-400 dark:text-gray-500 text-base font-normal">
                            No data available
                        </div>
                    @endif
                </div>
                <div>
                    ABH Manager
                </div>
            </div>
            <div>
                <x-pop-modal class="max-w-xl" name="updateManager" static="true" modal-title="Update Project Manager">
                    <form class="space-y-4" wire:submit.prevent="saveProjectManager">
                        <div>
                            <x-input-label value="Manager"/>
                            <x-text-input wire:model.lazy="manager" class="w-full" placeholder="Enter text here.."/>
                            <x-input-error :messages="$errors->get('manager')"/>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled"
                                             wire:target="saveProjectManager">
                                <div class="p-2 mx-auto text-center" wire:loading.remove wire:target="saveProjectManager">
                                    Submit
                                </div>
                                <div class="p-2 mx-auto text-center" wire:loading wire:target="saveProjectManager">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>
                <x-secondary-button data-modal-toggle="updateManager">
                    Edit
                </x-secondary-button>
            </div>
        </div>
        <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 flex justify-between items-center">
            <div class="divide-y w-full divide-gray-300 dark:divide-gray-700 ">
                <div>
                    @if($profile->year_established)
                        <div class="font-medium text-gray-700 dark:text-white">
                            {{$profile->year_established}}
                        </div>
                    @else
                        <div class="text-gray-400 dark:text-gray-500 text-base font-normal">
                            No data available
                        </div>
                    @endif
                </div>

                <div>
                    Year Established
                </div>
            </div>
            <div>
                <x-pop-modal class="max-w-xl" name="edetYear" static="true" modal-title="Update Year Established">
                    <form class="space-y-4" wire:submit.prevent="saveYearEstablished">
                        <div>
                            <x-input-label value="Year Established"/>
                            <x-text-input type="number" min="1900"  wire:model.lazy="year_established" class="w-full" placeholder="Enter text here.."/>
                            <x-input-error :messages="$errors->get('year_established')"/>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled"
                                             wire:target="saveYearEstablished">
                                <div class="p-2 mx-auto text-center" wire:loading.remove wire:target="saveYearEstablished">
                                    Submit
                                </div>
                                <div class="p-2 mx-auto text-center" wire:loading wire:target="saveYearEstablished">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>
                <x-secondary-button data-modal-toggle="edetYear">
                    Edit
                </x-secondary-button>
            </div>
        </div>
    </div>

</x-card-panel>

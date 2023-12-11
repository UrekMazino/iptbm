<div class="my-4 space-y-4">
    <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 flex justify-between items-center">
        <div class="divide-y w-full divide-gray-300 dark:divide-gray-700 ">
            <x-item-header>
                @if($profile->office_address)
                    {{$profile->office_address}}
                @else
                    <div class="text-gray-400 dark:text-gray-500 text-base font-normal">
                        No data available
                    </div>
                @endif
            </x-item-header>
            <div>
                Office Address
            </div>
        </div>
        <div>
            <x-pop-modal close-action="resetStatus('office_address')" name="editOfficeAddress" static="true" class=" max-w-xl" modal-title="Update IP-TBM Office Address">
                <form class="space-y-4" wire:submit.prevent="saveAddress">
                    <div>
                        <x-input-label value="Address"/>
                        <x-text-input wire:model.lazy="office_address" class="w-full" placeholder="Enter text here..."/>
                        <x-input-error :messages="$errors->get('office_address')"/>
                    </div>
                    @if(session()->has('address'))
                        <x-alert-success :message="session('address')"/>
                    @endif
                    <div>
                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveAddress">
                            <div class="text-center w-full p-2" wire:loading wire:target="saveAddress">
                                Processing...
                            </div>
                            <div class="text-center w-full p-2" wire:loading.remove wire:target="saveAddress">
                                Submit
                            </div>
                        </x-submit-button>
                    </div>
                </form>
            </x-pop-modal>
            <x-secondary-button data-modal-toggle="editOfficeAddress" class="text-sky-500 dark:text-sky-500" >
                Edit
            </x-secondary-button>
        </div>

    </div>
    <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 flex justify-between items-center">
        <div class="divide-y w-full divide-gray-300 dark:divide-gray-700 ">
            <x-item-header>
                @if($profile->project_leader)
                    {{$profile->project_leader}}
                @else
                    <div class="text-gray-400 dark:text-gray-500 text-base font-normal">
                        No data available
                    </div>
                @endif
            </x-item-header>
            <div>
                Project Leader
            </div>
        </div>
        <div>
            <x-pop-modal close-action="resetStatus('project_leader')" name="editProjLead" static="true" class=" max-w-xl" modal-title="Update IP-TBM Project Leader">
                <form class="space-y-4" wire:submit.prevent="saveProjectLeader">
                    <div>
                        <x-input-label value="Project Leader"/>
                        <x-text-input wire:model.lazy="project_leader" class="w-full" placeholder="Enter text here..."/>
                        <x-input-error :messages="$errors->get('project_leader')"/>
                    </div>
                    @if(session()->has('project_leader'))
                        <x-alert-success :message="session('project_leader')"/>
                    @endif
                    <div>
                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveProjectLeader">
                            <div class="text-center w-full p-2" wire:loading wire:target="saveProjectLeader">
                                Processing...
                            </div>
                            <div class="text-center w-full p-2" wire:loading.remove wire:target="saveProjectLeader">
                                Submit
                            </div>
                        </x-submit-button>
                    </div>
                </form>
            </x-pop-modal>
            <x-secondary-button data-modal-toggle="editProjLead"  class="text-sky-500 dark:text-sky-500"  >
                Edit
            </x-secondary-button>
        </div>

    </div>
    <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 flex justify-between items-center">
        <div class="divide-y w-full divide-gray-300 dark:divide-gray-700 ">
            <x-item-header>
                @if($profile->manager)
                    {{$profile->manager}}
                @else
                    <div class="text-gray-400 dark:text-gray-500 text-base font-normal">
                        No data available
                    </div>
                @endif
            </x-item-header>
            <div>
                IP-TBM Manager
            </div>
        </div>
        <div>
            <x-pop-modal name="editManager" static="true" class=" max-w-xl" modal-title="Update IP-TBM Manager" close-action="resetStatus('manager')">
                <form class="space-y-4" wire:submit.prevent="saveManager">
                    <div>
                        <x-input-label value="IP-TBM Manager"/>
                        <x-text-input wire:model.lazy="manager" class="w-full" placeholder="Enter text here..."/>
                        <x-input-error :messages="$errors->get('manager')"/>
                    </div>
                    @if(session()->has('manager'))
                        <x-alert-success :message="session('manager')"/>
                    @endif
                    <div>
                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveManager">
                            <div class="text-center w-full p-2" wire:loading wire:target="saveManager">
                                Processing...
                            </div>
                            <div class="text-center w-full p-2" wire:loading.remove wire:target="saveManager">
                                Submit
                            </div>
                        </x-submit-button>
                    </div>
                </form>
            </x-pop-modal>
            <x-secondary-button data-modal-toggle="editManager"  class="text-sky-500 dark:text-sky-500"  >
                Edit
            </x-secondary-button>
        </div>

    </div>

    <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 flex justify-between items-center">
        <div class="divide-y w-full divide-gray-300 dark:divide-gray-700 ">
            <x-item-header>
                @if($profile->year_established)
                    {{$profile->year_established}}
                @else
                    <div class="text-gray-400 dark:text-gray-500 text-base font-normal">
                        No data available
                    </div>
                @endif
            </x-item-header>
            <div>
                Year Established
            </div>
        </div>
        <div>
            <x-pop-modal name="editYearEstab" static="true" class=" max-w-xl" modal-title="Update Year Established" close-action="resetStatus('manager')">
                <form class="space-y-4" wire:submit.prevent="saveYearEstablished">
                    <div>
                        <x-input-label value="IP-TBM Year Established"/>
                        <x-text-input list="listYear" type="search" min="{{2019}}" max="{{now()->year+5}}" wire:model.lazy="year_established" class="w-full" placeholder="Enter text here..."/>
                        <x-data-list id="listYear" :data="$yearData"/>
                        <x-input-error :messages="$errors->get('year_established')"/>
                    </div>
                    @if(session()->has('year_established'))
                        <x-alert-success :message="session('year_established')"/>
                    @endif
                    <div>
                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveYearEstablished">
                            <div class="text-center w-full p-2" wire:loading wire:target="saveYearEstablished">
                                Processing...
                            </div>
                            <div class="text-center w-full p-2" wire:loading.remove wire:target="saveYearEstablished">
                                Submit
                            </div>
                        </x-submit-button>
                    </div>
                </form>
            </x-pop-modal>
            <x-secondary-button data-modal-toggle="editYearEstab"  class="text-sky-500 dark:text-sky-500"  >
                Edit
            </x-secondary-button>
        </div>

    </div>


</div>


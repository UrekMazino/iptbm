<x-card-panel title="Agency  Details">
    <div class="space-y-4">
        <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 flex justify-between items-center">
            <div class="divide-y w-full divide-gray-300 dark:divide-gray-700 ">
                <x-item-header>
                    @if($agency->name)
                        {{$agency->name}}
                    @else
                        <div class="text-gray-400 dark:text-gray-500 text-base font-normal">
                            No data available
                        </div>
                    @endif
                </x-item-header>
                <div>
                    Agency Name
                </div>
            </div>
            <div>
                <x-pop-modal class="max-w-xl" name="editAgencyName" static="true" modal-title="Update Agency Name">
                    <form class="space-y-4" wire:submit.prevent="saveAgencyName">
                        <div>
                            <x-input-label value="Agency"/>
                            <x-text-input wire:model.lazy="agencyName" class="w-full" placeholder="Enter text here.."/>
                            <x-input-error :messages="$errors->get('agencyName')"/>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled"
                                             wire:target="saveAgencyName">
                                <div class="p-2 mx-auto text-center" wire:loading.remove wire:target="saveAgencyName">
                                    Submit
                                </div>
                                <div class="p-2 mx-auto text-center" wire:loading wire:target="saveAgencyName">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>
                <x-secondary-button data-modal-toggle="editAgencyName">
                    Edit
                </x-secondary-button>
            </div>
        </div>
        <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 flex justify-between items-center">
            <div class="divide-y w-full divide-gray-300 dark:divide-gray-700 ">
                <x-item-header>
                    @if($agency->head)
                        {{$agency->head}}
                    @else
                        <div class="text-gray-400 dark:text-gray-500 text-base font-normal">
                            No data available
                        </div>
                    @endif
                </x-item-header>
                <div>
                    Agency Head
                </div>
            </div>
            <div>
                <x-pop-modal class="max-w-xl" name="editAgencyHead" static="true" modal-title="Update Agency Head">
                    <form class="space-y-4" wire:submit.prevent="saveAgencyHead">
                        <div>
                            <x-input-label value="Agency Head"/>
                            <x-text-input wire:model.lazy="agencyHead" class="w-full" placeholder="Enter text here.."/>
                            <x-input-error :messages="$errors->get('agencyHead')"/>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled"
                                             wire:target="saveAgencyHead">
                                <div class="p-2 mx-auto text-center" wire:loading.remove wire:target="saveAgencyHead">
                                    Submit
                                </div>
                                <div class="p-2 mx-auto text-center" wire:loading wire:target="saveAgencyHead">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>
                <x-secondary-button data-modal-toggle="editAgencyHead">
                    Edit
                </x-secondary-button>
            </div>
        </div>
    </div>
    <div class="mt-10">
        <div class="font-medium">
          Agency Contact Details
        </div>
        <div class="space-y-4">
            <livewire:abh.profile.abh-agency-contact-details wire:key="mobile" type="mobile" :agency="$agency"
                                                             label="Mobile number"/>
            <livewire:abh.profile.abh-agency-contact-details wire:key="phone" type="phone" :agency="$agency"
                                                             label="Telephone number"/>
            <livewire:abh.profile.abh-agency-contact-details wire:key="fax" type="fax" :agency="$agency"
                                                             label="Fax number"/>
            <livewire:abh.profile.abh-agency-contact-details wire:key="email" type="email" :agency="$agency"
                                                             label="Email Address"/>
        </div>
    </div>


</x-card-panel>

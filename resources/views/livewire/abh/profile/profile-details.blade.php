<x-card-panel title="Profile Details">

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
            <x-pop-modal class="max-w-xl" name="editAgencyHead" static="true" modal-title="Update Office Address">
                <form class="space-y-4" wire:submit.prevent="">
                    <div>
                        <x-input-label value="Address"/>
                        <x-text-input wire:model.lazy="agencyHead" class="w-full" placeholder="Enter text here.."/>
                        <x-input-error :messages="$errors->get('agencyHead')"/>
                    </div>
                    <div>
                        <x-submit-button class="min-w-full" wire:loading.attr="disabled"
                                         wire:target="saveAgencyHead">
                            <div class="p-2 mx-auto text-center" wire:loading.remove wire:target="">
                                Submit
                            </div>
                            <div class="p-2 mx-auto text-center" wire:loading wire:target="">
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
</x-card-panel>

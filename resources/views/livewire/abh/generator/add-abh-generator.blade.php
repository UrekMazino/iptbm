<x-pop-modal name="addAbhGenerator" static="true" class="max-w-md" modal-title="Add Technology Generators">
    <form class="space-y-5" wire:submit.prevent="saveGenerator">
        <div class="space-y-4">
            <div>
                <x-input-label value="First Name"/>
                <x-text-input wire:model.lazy="first_name" class="w-full" placeholder="Enter text here" required/>
                <x-input-error :messages="$errors->get('first_name')"/>
            </div>
            <div>
                <x-input-label value="Middle Name"/>
                <x-text-input wire:model.lazy="middle_initial" class="w-full" placeholder="Enter text here" />
                <x-input-error :messages="$errors->get('middle_initial')"/>
            </div>
            <div>
                <x-input-label value="Last Name"/>
                <x-text-input wire:model.lazy="last_name" class="w-full" placeholder="Enter text here" required/>
                <x-input-error :messages="$errors->get('last_name')"/>
            </div>
            <div>
                <x-input-label value="Suffixes"/>
                <x-text-input wire:model.lazy="suffix" class="w-full" placeholder="Enter text here" />
                <x-input-error :messages="$errors->get('suffix')"/>
            </div>
            <div>
                <x-input-label value="Address"/>
                <x-text-input wire:model.lazy="address" class="w-full" placeholder="Enter text here" required/>
                <x-input-error :messages="$errors->get('address')"/>
            </div>
            <div>
                <x-input-label value="Availability / Professional Status"/>
                <x-input-select wire:model.lazy="status" placeholder="Select Status">
                    <option value="">
                        Select Status
                    </option>
                    <option value="ACTIVE">
                        ACTIVE
                    </option>
                    <option value="RETIRED">
                        RETIRED
                    </option>
                    <option value="DECEASED">
                        DECEASED
                    </option>
                </x-input-select>
                <x-input-error :messages="$errors->get('status')"/>
            </div>
        </div>

        <div>
            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveGenerator">
                <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveGenerator">
                    Submit
                </div>
                <div  class="p-2 w-full text-center" wire:loading wire:target="saveGenerator">
                    Processing..
                </div>
            </x-submit-button>
        </div>
    </form>
</x-pop-modal>

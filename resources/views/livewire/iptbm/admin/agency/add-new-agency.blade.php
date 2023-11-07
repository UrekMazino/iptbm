<x-pop-modal class="max-w-xl" name="addAgency" modal-title="Add new Agency" static="true">
    <form class="space-y-10" wire:submit.prevent="saveForm">
        <div class="space-y-4">
            <div>
                <x-input-label value="Region" />
                <x-text-input wire:model.lazy="regionModel" list="regionList" type="search" class="w-full"/>
                <datalist id="regionList">
                    @foreach($regions as $region)
                        <option value="{{$region->name}}"></option>
                    @endforeach
                </datalist>
                <x-input-error :messages="$errors->get('regionModel')"/>
            </div>
            <div>
                <x-input-label for="agenName" value="Agency Name" />
                <x-text-input wire:model.lazy="agencyModel" id="agenName" class="w-full" type="text" />
                <x-input-error :messages="$errors->get('agencyModel')"/>
            </div>
            <div>
                <x-input-label for="agenAdd" value="Address" />
                <x-text-input wire:model.lazy="addressModel" id="agenAdd" class="w-full" type="text" />
                <x-input-error :messages="$errors->get('addressModel')"/>
            </div>
            <div>
                <x-input-label for="agenHead" value="Agency Head" />
                <x-text-input wire:model.lazy="headModel" id="agenHead" class="w-full" type="text" />
                <x-input-error :messages="$errors->get('headModel')"/>
            </div>
            <div>
                <x-input-label for="agenHead" value="Designation" />
                <x-text-input wire:model.lazy="designationModel" id="agenHead" class="w-full" type="text" />
                <x-input-error :messages="$errors->get('designationModel')"/>
            </div>
        </div>
        <x-submit-button disabled wire:loading wire:target="saveForm">
            Processing...
        </x-submit-button>
        <x-submit-button wire:loading.remove wire:target="saveForm">
            Submit
        </x-submit-button>
    </form>
</x-pop-modal>

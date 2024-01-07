<x-pop-modal name="{{$modalName}}" class="max-w-md h-full overflow-y-scroll" static="true"
             modal-title="Adopter Pathway">
    <form class="space-y-3" wire:submit.prevent="saveAdopterForm">
        <div>
            <x-input-label value="Name of Company"/>
            <x-text-input wire:model.lazy="companyName" type="text" step="any" class="w-full form-input"
                          placeholder="enter text here"/>
            <x-input-error :messages="$errors->get('companyName')"/>
        </div>
        <div>
            <x-input-label value="Company Address"/>
            <x-text-input wire:model.lazy="companyAddress" type="text" step="any" class="w-full form-input"
                          placeholder="enter text here"/>
            <x-input-error :messages="$errors->get('companyAddress')"/>
        </div>
        <div>
            <x-input-label value="Company Description"/>
            <x-text-box wire:model.lazy="companyDescription" class="form-input" rows="2"
                        placeholder="enter company description"/>
            <x-input-error :messages="$errors->get('companyDescription')"/>
        </div>
        <div>
            <x-input-label value="Business Structure"/>
            <x-input-select wire:model="businessStructure" :data="[
            'Sole Prioprietorship',
            'Corporation',
            'Partnership',
            'Coop'
            ]" title="Select Business Structure"/>
            <x-input-error :messages="$errors->get('businessStructure')"/>
        </div>
        <div>
            <x-input-label value="Business Registration"/>
            <x-input-select wire:model="businessRegistration" :data="[
            'Not yet registered',
            'SEC-registered',
            'DTI-registered',
            ]" title="Select Business Registration "/>
            <x-input-error :messages="$errors->get('businessRegistration')"/>
        </div>
        <div>
            <x-input-label value="Technology Acquisition"/>
            <x-input-select wire:model="technologyAquisition" :data="[
            'Licensing',
            'Joint Venture',
            'Partnership',
            'Outright Sale',
            'Distributorship'
            ]" title="Select Technology Acquisition "/>
            <x-input-error :messages="$errors->get('technologyAquisition')"/>
        </div>
        <div class="mt-5">
            <x-input-label value="Commercialization, for incubation?"/>
            <div class="justify-start gap-10 flex items-center">
                <x-input-label class="cursor-pointer">
                    <x-text-input wire:model="forIncubation" value="1" name="forcomIn" type="radio"/>
                    YES
                </x-input-label>
                <x-input-label class="cursor-pointer">
                    <x-text-input wire:model="forIncubation" value="0" name="forcomIn" type="radio"/>
                    NO
                </x-input-label>
            </div>
            <x-input-error :messages="$errors->get('forIncubation')"/>

        </div>
        <div class="flex justify-start space-x-4">

            <x-submit-button wire:loading.attr="disabled" wire:target="saveAdopterForm">
                <div class="p-2 text-center" wire:loading wire:target="saveAdopterForm">
                    Processing...
                </div>
                <div class="p-2 text-center" wire:loading.remove wire:target="saveAdopterForm">
                    Submit
                </div>
            </x-submit-button>
            <x-secondary-button wire:loading.attr="disabled"  type="reset" class="text-center">
                Reset Fields
            </x-secondary-button>
        </div>

    </form>
</x-pop-modal>

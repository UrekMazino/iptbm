<x-pop-modal name="{{$modalName}}" class="max-w-md" static="true" modal-title="Pre Com Pathways">
    <form class="space-y-2" wire:submit.prevent="savePrecom">
        <div>
            <x-input-label value="New Technology name"/>
            <x-text-box wire:model.lazy="newTechName" class="form-input" rows="2"
                        placeholder="enter new technology name"/>
            <x-input-error class="transition ease-in-out duration-300" :messages="$errors->get('newTechName')"/>
        </div>
        <div>
            <x-input-label value="Starting capital"/>
            <x-text-input wire:model.lazy="startingCapital" type="number" step="any" class="w-full"/>
            <x-input-error :messages="$errors->get('startingCapital')"/>
        </div>
        <div>
            <x-input-label value=" Estimated Cost"/>
            <x-text-input wire:model.lazy="cost" type="number" step="any" class="w-full form-input"/>
            <x-input-error :messages="$errors->get('cost')"/>
        </div>

        <div>
            <x-input-label value=" Income Generated"/>
            <x-text-input wire:model.lazy="income" type="number" step="any" class="w-full form-input"/>
            <x-input-error :messages="$errors->get('income')"/>
        </div>
        <div>
            <x-input-label value=" Return of Investment"/>
            <x-text-input wire:model.lazy="returnOfInvestment" type="number" step="any" class="w-full form-input"/>
            <x-input-error :messages="$errors->get('returnOfInvestment')"/>
        </div>
        <div>
            <x-input-label value=" Break Even"/>
            <x-text-input wire:model.lazy="breakEven" type="number" step="any" class="w-full form-input"/>
            <x-input-error :messages="$errors->get('breakEven')"/>
        </div>
        <div>
            <x-input-error :messages="$errors->get('techId')"/>
        </div>

        <x-sub-label>
            All fields are optional. This technology will be added on Pre Commercialization Pathway.
        </x-sub-label>
        <div class="flex justify-start space-x-4">
            <x-submit-button wire:loading wire:target="saveForm" class="mt-4">
                Processing
            </x-submit-button>
            <x-submit-button wire:loading.remove wire:target="saveForm" class="mt-4">
                Submit
            </x-submit-button>
            <x-submit-button wire:click.prevent="resetForm" type="reset"
                             class="mt-4 bg-gray-700 dark:bg-gray-200 text-gray-white dark:text-gray-800 font-medium">
                Reset Fields
            </x-submit-button>
        </div>

    </form>
</x-pop-modal>

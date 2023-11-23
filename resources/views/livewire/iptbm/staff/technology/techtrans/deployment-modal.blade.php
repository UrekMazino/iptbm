<x-pop-modal name="{{$modalName}}" class="max-w-md  overflow-y-scroll" static="true" modal-title="Deployment Pathway">
    <form class="space-y-3" wire:submit.prevent="saveForm">
        <div>
            <x-input-label value="Name of Adopter"/>
            <x-text-input wire:model.lazy="adoptersName" class="w-full"/>
            <x-input-error :messages="$errors->get('adoptersName')"/>
        </div>
        <div>
            <x-input-label value="Address"/>
            <x-text-input wire:model.lazy="adoptersAddress" class="w-full"/>
            <x-input-error :messages="$errors->get('adoptersAddress')"/>
        </div>
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

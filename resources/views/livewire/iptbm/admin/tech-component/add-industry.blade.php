<div>
    <x-pop-modal close-action="resetField" name="addIndus" static="true" modal-title="Add new Technology Industry"
                 class="max-w-md">
        <form class="space-y-4" wire:submit.prevent="saveForm">
            <div>
                <x-input-label value="Industry"/>
                <x-text-input wire:model.lazy="industry" class="w-full" type="text" placeholder="enter text here"/>
                <x-input-error :messages="$errors->get('industry')"/>
            </div>
            <x-submit-button wire:loading wire:target="saveForm">
                Processing
            </x-submit-button>
            <x-submit-button wire:loading.remove wire:target="saveForm">
                Submit
            </x-submit-button>
        </form>
    </x-pop-modal>
</div>

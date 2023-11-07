<div>
    <x-pop-modal close-action="reseter" modal-title="Add new Technology Adopter" name="addAdopterMod" static="true" class="max-w-md" >
        <form class="space-y-4" wire:submit.prevent="addAdopter">
            <div>
                <x-input-label value="Adopter"/>
                <x-text-input wire:model.lazy="adopterModel"  class="w-full" placeholder="enter text here" />
                <x-input-error :messages="$errors->get('adopterModel')"/>
            </div>
            <x-submit-button wire:loading wire:target="addAdopter">
                Processing
            </x-submit-button>
            <x-submit-button wire:loading.remove wire:target="addAdopter">
                Submit
            </x-submit-button>
        </form>
    </x-pop-modal>
</div>

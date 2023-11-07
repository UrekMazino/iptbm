<div>
    <x-pop-modal modal-title="Add new Category" name="addCategoryMod" static="true" class="max-w-md" >
        <form class="space-y-4" wire:submit.prevent="saveForm">
            <div>
                <x-input-label value="Category"/>
                <x-text-input wire:model.lazy="categoryModel"  class="w-full" placeholder="enter text here" />
                <x-input-error :messages="$errors->get('categoryModel')"/>
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

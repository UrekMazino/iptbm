<x-pop-modal name="{{$modalName}}" class="max-w-md  overflow-y-scroll" static="true" modal-title="Deployment Pathway">
    <form class="space-y-6" wire:submit.prevent="saveForm">
       <div class="space-y-3">
           <div>
               <x-input-label value="Name of Adopter"/>
               <x-text-input wire:model.lazy="adoptersName" class="w-full" placeholder="enter text here"/>
               <x-input-error :messages="$errors->get('adoptersName')"/>
           </div>
           <div>
               <x-input-label value="Address"/>
               <x-text-input wire:model.lazy="adoptersAddress" class="w-full" placeholder="enter text here"/>
               <x-input-error :messages="$errors->get('adoptersAddress')"/>
           </div>
       </div>

        <div class="flex justify-start space-x-4">
            <x-submit-button wire:loading.attr="disabled" wire:target="saveForm">
                <div class="p-2 text-center" wire:loading wire:target="saveForm">
                    Processing...
                </div>
                <div class="p-2 text-center" wire:loading.remove wire:target="saveForm">
                    Submit
                </div>
            </x-submit-button>
            <x-secondary-button wire:loading.attr="disabled"   type="reset" class="text-center">
                Reset Fields
            </x-secondary-button>
        </div>

    </form>
</x-pop-modal>

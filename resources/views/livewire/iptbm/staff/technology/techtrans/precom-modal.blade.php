<x-pop-modal name="{{$modalName}}" class="max-w-md" static="true" modal-title="Pre Com Pathways">
    <form class="space-y-6" wire:submit.prevent="savePrecom">
       <div class="space-y-3">
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

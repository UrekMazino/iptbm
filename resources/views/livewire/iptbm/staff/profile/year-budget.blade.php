
<x-pop-modal class="max-w-md" name="authentication-modal-{{$budget->id}}" modal-title="Update Budget for
           year {{Carbon\Carbon::parse($budget->year_implemented)->year}}">
        <form class="space-y-6" wire:submit.prevent="saveBudget">
            <div>
                <x-input-label value="Budget"/>
                <x-text-input required wire:model.lazy="amountModel" class="w-full" type="number" step="any" min="1" max="999999999"/>
                <x-input-error :messages="$errors->get('amountModel')"/>
            </div>
            <div>
                <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveBudget">
                    <div wire:loading wire:target="saveBudget" class="p-2 w-full text-center">
                        Processing...
                    </div>
                    <div wire:loading.remove wire:target="saveBudget" class="p-2 w-full text-center">
                        Submit
                    </div>
                </x-submit-button>
            </div>



        </form>

</x-pop-modal>
<button data-modal-target="authentication-modal-{{$budget->id}}"
        data-modal-toggle="authentication-modal-{{$budget->id}}"
        class="text-blue-500 hover:scale-110 transition duration-300"
        type="button">
    <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
         fill="currentColor" viewBox="0 0 20 18">
        <path
            d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
        <path
            d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
    </svg>
</button>

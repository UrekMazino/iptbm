
<x-pop-modal name="authentication-modal-extend-{{$projectYear->id}}" modal-title="Extend Project" static="true" class="max-w-md">
    <form class="space-y-6" wire:submit.prevent="saveExtension">kl.kjlkjk
        <div>
            <x-input-label value=" Extension Duration (in months)"/>
            <x-text-input autocomplete="off" wire:model="extensionDuration" placeholder="Enter number of duration" id="name" type="number" class="w-full"/>
            <x-input-error :messages="$errors->get('extensionDuration')"/>
        </div>

        @if($extendedEndDate)
            <div>
                <x-input-label>
                          <span class="text-lg">
                               Project Extension Ends :
                          </span> {{$extendedEndDate}}
                </x-input-label>
            </div>

        @endif
        <div>
            <x-submit-button wire:loading.attr="disabled" wire:target="saveExtension" class="min-w-full" >
                <div wire:loading wire:target="saveExtension" class="w-full text-center p-2">
                    Processing...
                </div>
                <div wire:loading.remove wire:target="saveExtension"  class="w-full text-center p-2">
                    Submit
                </div>
            </x-submit-button>
        </div>

    </form>
</x-pop-modal>

<x-secondary-button class="text-sky-600  dark:text-sky-600"
                    data-modal-target="authentication-modal-extend-{{$projectYear->id}}"
                    data-modal-toggle="authentication-modal-extend-{{$projectYear->id}}">
    Extend
</x-secondary-button>

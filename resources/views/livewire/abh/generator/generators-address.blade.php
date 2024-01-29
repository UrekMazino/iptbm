<div class="border flex justify-between items-center text-center rounded border-gray-200 dark:border-gray-600 ">
    <div class="divide-y divide-gray-200 dark:divide-gray-600 w-full py-4">
        <div class="font-medium text-gray-600 dark:text-white">
            {{$generator->address}}
        </div>
        <div>
            Address
        </div>
    </div>
    <div class="px-2">
        <x-pop-modal modal-title="Update Address" static="true" class="max-w-xl" name="updateGenAddress">
            <form class="space-y-5" wire:submit.prevent="save_address">
                <div>
                    <x-input-label value="Address"/>
                    <x-text-input wire:model.lazy="address" class="w-full" placeholder="enter text here" required/>
                    <x-input-error :messages="$errors->get('address')"/>
                </div>
                <div>
                    <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="save_address">
                        <div class="w-full text-center p-2" wire:loading.remove wire:target="save_address">
                            Submit
                        </div>
                        <div class="w-full text-center p-2" wire:loading wire:target="save_address">
                            Processing...
                        </div>
                    </x-submit-button>
                </div>
            </form>
        </x-pop-modal >
        <x-secondary-button data-modal-toggle="updateGenAddress" class="text-sky-500 dark:text-sky-500">
            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M11.3 6.2H5a2 2 0 0 0-2 2V19a2 2 0 0 0 2 2h11c1.1 0 2-1 2-2.1V11l-4 4.2c-.3.3-.7.6-1.2.7l-2.7.6c-1.7.3-3.3-1.3-3-3.1l.6-2.9c.1-.5.4-1 .7-1.3l3-3.1Z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M19.8 4.3a2.1 2.1 0 0 0-1-1.1 2 2 0 0 0-2.2.4l-.6.6 2.9 3 .5-.6a2.1 2.1 0 0 0 .6-1.5c0-.2 0-.5-.2-.8Zm-2.4 4.4-2.8-3-4.8 5-.1.3-.7 3c0 .3.3.7.6.6l2.7-.6.3-.1 4.7-5Z" clip-rule="evenodd"/>
            </svg>

        </x-secondary-button>
    </div>
</div>

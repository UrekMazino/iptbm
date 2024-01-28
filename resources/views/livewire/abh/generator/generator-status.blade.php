<div class=" relative">
    <x-pop-modal name="editStatus" static="true" class="max-w-md" modal-title="Update Availability">
        <form class="space-y-5" wire:submit.prevent="save_status">
            <div>
                <ul class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="list-radio-license" type="radio" wire:model="status" value="RETIRED" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="list-radio-license" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">RETIRED</label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="list-radio-id" type="radio" wire:model="status" value="ACTIVE" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="list-radio-id" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">ACTIVE</label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="list-radio-passport" type="radio" wire:model="status" value="DECEASED" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="list-radio-passport" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">DECEASED</label>
                        </div>
                    </li>
                </ul>
                <x-input-error :messages="$errors->get('status')"/>

            </div>
            <div>
                <x-submit-button class="min-w-full">
                    <div class="w-full p-2 text-center" wire:loading.remove wire:target="save_status">
                        Submit
                    </div>
                    <div class="w-full p-2 text-center" wire:loading wire:target="save_status">
                        Processing...
                    </div>
                </x-submit-button>
            </div>
        </form>


    </x-pop-modal>
    <div class="absolute -top-3 -right-3 ">
        <button data-modal-toggle="editStatus" class="text-sky-500">
            <svg class="w-7 h-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M11.3 6.2H5a2 2 0 0 0-2 2V19a2 2 0 0 0 2 2h11c1.1 0 2-1 2-2.1V11l-4 4.2c-.3.3-.7.6-1.2.7l-2.7.6c-1.7.3-3.3-1.3-3-3.1l.6-2.9c.1-.5.4-1 .7-1.3l3-3.1Z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M19.8 4.3a2.1 2.1 0 0 0-1-1.1 2 2 0 0 0-2.2.4l-.6.6 2.9 3 .5-.6a2.1 2.1 0 0 0 .6-1.5c0-.2 0-.5-.2-.8Zm-2.4 4.4-2.8-3-4.8 5-.1.3-.7 3c0 .3.3.7.6.6l2.7-.6.3-.1 4.7-5Z" clip-rule="evenodd"/>
            </svg>

        </button>
    </div>
    <div class="divide-y divide-gray-200 dark:divide-gray-600">
        <div class="text-center">
            {{$generator->status->status}}
        </div>
        <div class="text-sm">
            <span class="font-medium">Last Update: </span> {{$generator->status->updated_at->format('F-d-Y')}}
        </div>
    </div>

</div>

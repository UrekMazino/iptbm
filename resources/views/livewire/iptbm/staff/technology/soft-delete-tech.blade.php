<div>


    <x-pop-modal name="restore{{$technology->id}}" class="max-w-md" >
        <form wire:submit.prevent="restore_tech">
            <div class="text-center">
                <svg class="w-11 m-auto h-11 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.7 7.7A7.1 7.1 0 0 0 5 10.8M18 4v4h-4m-7.7 8.3A7.1 7.1 0 0 0 19 13.2M6 20v-4h4"/>
                </svg>
                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to restore this technology?</p>
            </div>
            <div class="flex justify-center items-center space-x-4">
                <x-primary-button type="button" data-modal-toggle="restore{{$technology->id}}">
                    Cancel
                </x-primary-button>
                <x-secondary-button type="submit">
                    Confirm
                </x-secondary-button>
            </div>
        </form>
    </x-pop-modal>
    <x-pop-modal name="forceDelete-{{$technology->id}}" class="max-w-md" >
        <form wire:submit.prevent="force_delete">
            <div class="text-center">
                <svg class="text-red-400 dark:text-red-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this technology?</p>

            </div>
            <x-sub-label>
                <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-900 dark:text-yellow-300" role="alert">
                    <span class="font-medium">Warning alert!</span> This operation will permanently erase the data along with any related data associated with this technology.
                </div>

            </x-sub-label>
            <div class="flex justify-center items-center space-x-4">
                <x-primary-button type="button" data-modal-toggle="forceDelete-{{$technology->id}}">
                    Cancel
                </x-primary-button>
                <x-secondary-button type="submit">
                    Continue
                </x-secondary-button>
            </div>
        </form>
    </x-pop-modal>
    <div data-popover id="popover-default" role="tooltip" class="absolute z-10 invisible inline-block w-44 text-sm text-gray-500 transition-opacity duration-300 bg-gray-300 border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-700">
        <div class=" shadow-lg  p-2 space-y-2 w-full">

            <div>
                <x-secondary-button class="min-w-full" data-modal-toggle="restore{{$technology->id}}">
                    Restore
                </x-secondary-button>
            </div>
            <div>
                <x-secondary-button class="min-w-full" data-modal-toggle="forceDelete-{{$technology->id}}">
                    Delete
                </x-secondary-button>
            </div>
        </div>
        <div data-popper-arrow></div>
    </div>
    <x-secondary-button class="relative"  data-popover-target="popover-default" data-popover-placement="right">
        <div class=" w-fit  absolute -top-3 -right-1">
            <svg class="w-6 h-6 text-red-500 dark:text-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm11-4a1 1 0 1 0-2 0v5a1 1 0 1 0 2 0V8Zm-1 7a1 1 0 1 0 0 2 1 1 0 1 0 0-2Z" clip-rule="evenodd"/>
            </svg>

        </div>
        <svg class="w-4 h-4 text-red-700" aria-hidden="true"
             xmlns="http://www.w3.org/2000/svg" fill="currentColor"
             viewBox="0 0 18 20">
            <path
                d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z"/>
        </svg>
    </x-secondary-button>
</div>

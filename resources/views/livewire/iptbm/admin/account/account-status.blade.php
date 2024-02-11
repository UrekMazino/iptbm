<div>
    <x-pop-modal  class="max-w-md" name="enAble-User-{{$user->id}}">
        <div class="text-center">
            <svg  class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16 10 3-3m0 0-3-3m3 3H5v3m3 4-3 3m0 0 3 3m-3-3h14v-3"/>
            </svg>

            <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to enable this account?</p>

            <div class="flex justify-center items-center space-x-4">
                <button data-modal-toggle="enAble-User-{{$user->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    No, cancel
                </button>
                <button type="submit" wire:click.prevent="enable_account" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                    Yes, I'm sure
                </button>
            </div>
        </div>
    </x-pop-modal>
    <x-pop-modal  class="max-w-md" name="disable-User-{{$user->id}}">
        <div class="text-center">
            <svg  class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16 10 3-3m0 0-3-3m3 3H5v3m3 4-3 3m0 0 3 3m-3-3h14v-3"/>
            </svg>

            <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to enable this account?</p>
            <x-sub-label class="font-light text-xs">
                <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg  bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                    This account will not be accessible to the user.
                </div>


            </x-sub-label>
            <div class="flex justify-center items-center space-x-4">
                <button data-modal-toggle="disable-User-{{$user->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    No, cancel
                </button>
                <button type="submit" wire:click.prevent="disable_account" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                    Yes, I'm sure
                </button>
            </div>
        </div>


    </x-pop-modal>
    @if($user->trashed())

        <x-secondary-button data-modal-toggle="enAble-User-{{$user->id}}" class="text-sky-500 dark:text-sky-500">
            Enable
        </x-secondary-button>
    @else

        <x-secondary-button data-modal-toggle="disable-User-{{$user->id}}" class="text-red-600 dark:text-red-600">
            Disable
        </x-secondary-button>
    @endif
</div>

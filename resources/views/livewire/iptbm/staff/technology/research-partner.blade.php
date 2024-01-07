<div class="p-4 border border-gray-200 dark:border-gray-600 rounded-lg">
    <dl class="max-w-md space-y-2  divide-y divide-gray-200  dark:divide-gray-600">
        <div class="flex flex-col">
            <div class="text-base  text-gray-600 dark:text-gray-400">
                Industry / Agency
            </div>
            <div class="text-gray-700 dark:text-gray-100">{{$partner->industry_name}}</div>
        </div>
        <div class="flex flex-col">
            <div class="text-base  text-gray-600 dark:text-gray-400">
                Address
            </div>
            <div class="text-gray-700 dark:text-gray-100">{{$partner->address}}</div>
        </div>
        <div class="pt-5">
            <div class="text-base  text-gray-600 dark:text-gray-400">
                Contact Details
            </div>
            @if($partner->mobile)
                <div class="flex flex-col py-1">
                    <div class="text-gray-500 dark:text-gray-400">Mobile number</div>
                    <div class="text-gray-700 dark:text-gray-100">
                        {{$partner->mobile}}
                    </div>
                </div>
            @endif
            @if($partner->phone)
                <div class="flex flex-col pt-1">
                    <div class="text-gray-500 dark:text-gray-400">Phone number</div>
                    <div class="text-gray-700 dark:text-gray-100">
                        {{$partner->phone}}
                    </div>
                </div>
            @endif
            @if($partner->fax)
                <div class="flex flex-col pt-1">
                    <div class="text-gray-500 dark:text-gray-400">Fax number</div>
                    <div class="text-gray-700 dark:text-gray-100">
                        {{$partner->fax}}
                    </div>
                </div>
            @endif
            @if($partner->email)
                <div class="flex flex-col pt-1">
                    <div class="text-gray-500 dark:text-gray-400">Email</div>
                    <div class="text-gray-700 dark:text-gray-100">
                        {{$partner->email}}
                    </div>
                </div>
            @endif
        </div>


    </dl>
    <div class="my-3">
        <div id="deletePartner" tabindex="-1" aria-hidden="true"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 text-center bg-gray-50 rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <button type="button"
                            class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="deletePartner">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true"
                         fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this Industry/Agency?</p>
                    <div class="flex justify-center items-center space-x-4">
                        <button data-modal-toggle="deletePartner" type="button"
                                class="py-2 px-3 text-sm font-medium text-gray-500 bg-gray-50 rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            No, cancel
                        </button>
                        <button type="submit" wire:click.prevent="deletePartner"
                                class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                            Yes, I'm sure
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <x-secondary-button class="gap-2 text-red-500 dark:text-red-500" data-modal-toggle="deletePartner">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
            </svg>
            Delete
        </x-secondary-button>
    </div>
</div>

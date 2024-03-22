<div>
    <div class="flex justify-items-start gap-5">
        <x-pop-modal close-action="resetter" name="edit{{$industry->id}}" class="max-w-lg" static="true"
                     modal-title="Edit Industry name">
            <form class="space-y-4" wire:submit.prevent="edit">
                <div>
                    <x-input-label value="Industry name"/>
                    <x-text-input wire:model.lazy="industryModel" class="w-full" required
                                  placeholder="enter text here"/>
                    <x-input-error :messages="$errors->get('industryModel')"/>
                </div>
                <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="edit">
                    <div class="w-full text-center p-2" wire:loading.remove wire:target="edit">
                       Submit
                    </div>
                    <div class="w-full text-center p-2" wire:loading wire:target="edit">
                        Processing
                    </div>
                </x-submit-button>

            </form>
        </x-pop-modal>


        <div id="delete{{$industry->id}}" tabindex="-1"
             class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                            data-modal-hide="delete{{$industry->id}}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                            delete this Item?</h3>
                        <button data-modal-hide="delete{{$industry->id}}" wire:click.prevent="delete" type="button"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="delete{{$industry->id}}" type="button"
                                class="text-gray-500 bg-gray-50 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            No, cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <button data-modal-target="edit{{$industry->id}}" data-modal-toggle="edit{{$industry->id}}" class="inline-flex items-center px-8 py-2 bg-white
dark:bg-gray-800 border border-gray-300 dark:border-gray-700 gap-2 rounded-full font-semibold text-xs text-sky-700
dark:text-sky-500 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none
 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition
 ease-in-out duration-150 ">
            <svg class="w-6  h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                 viewBox="0 0 20 18">
                <pat
                    d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                <path
                    d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
            </svg>
            Edit
        </button>
        <button data-modal-target="delete{{$industry->id}}" data-modal-toggle="delete{{$industry->id}}" class="inline-flex items-center px-8 py-2 bg-white
dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-full gap-2 font-semibold text-xs text-red-600
dark:text-red-500 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none
 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition
 ease-in-out duration-150 ">
            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 fill="currentColor" viewBox="0 0 18 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
            </svg>
            Delete
        </button>




    </div>
</div>

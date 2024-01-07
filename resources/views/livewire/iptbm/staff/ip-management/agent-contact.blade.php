<div
    class="w-full p-1 indent-2.5 rounded hover:bg-gray-500 dark:hover:bg-gray-950 hover:bg-opacity-25 transition duration-300">
    <div class="flex justify-between items-center">
        <div class="font-semibold">
            {{$contact->contact}}
        </div>
        <div>
            <x-pop-modal class="max-w-md" name="deleteContact-{{$contact->id}}">
             <div class="text-center">
                 <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                 <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this contact?</p>
                 <div>
                     <p class="mb-4 text-gray-500 dark:text-gray-300">{{$contact->contact}}</p>
                 </div>
             </div>
                <div class="flex justify-center items-center space-x-4">
                    <button data-modal-toggle="deleteContact-{{$contact->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        No, cancel
                    </button>
                    <button type="submit" wire:click.prevent="deleteAgentContact" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                        Yes, I'm sure
                    </button>
                </div>
            </x-pop-modal>
            <x-secondary-button class="text-red-500 dark:text-red-500" data-modal-toggle="deleteContact-{{$contact->id}}">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                </svg>
            </x-secondary-button>
        </div>

    </div>
</div>

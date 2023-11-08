<x-card>
    <div class="flex justify-between items-center">
        <x-item-header>
            Other Documents
        </x-item-header>
        <x-pop-modal name="addOtherDocs" modal-title="Upload other documents" class="max-w-xl">
            <form class="space-y-4" wire:submit.prevent="saveFile">
                <div>
                    <x-input-label value="description"/>
                    <x-text-box wire:model.lazy="fileDescription" placeholder="max of 100 characters" />
                    <x-input-error :messages="$errors->get('fileDescription')"/>
                </div>
                <div>
                    <x-input-label value="Upload file"/>
                    <x-text-input type="file" wire:model="fileModel" accept="application/pdf" class="w-full"/>
                    <x-input-error :messages="$errors->get('fileModel')" />
                </div>
                <div>
                    <x-submit-button wire:loading wire:target="saveFile">
                        Processing...
                    </x-submit-button>
                    <x-submit-button wire:loading.remove wire:target="saveFile">
                        Upload
                    </x-submit-button>
                </div>
            </form>
        </x-pop-modal>
        <x-secondary-button data-modal-toggle="addOtherDocs">
            Update
        </x-secondary-button>

    </div>
    <div class="mt-6">
        <ul class="divide-y divide-gray-300 dark:divide-gray-600">
           @foreach($documents as $document)
               <li class="py-2">
                   <div class="flex justify-between items-center">
                       <div class="truncate">
                           {{$document->file_description}}
                       </div>
                       <x-pop-modal static="true" class="max-w-md text-center" name="deleteDocs-{{$document->id}}">
                           <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                           <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this file?</p>
                           <div class="flex justify-center items-center space-x-4">
                               <button data-modal-toggle="deleteDocs-{{$document->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                   No, cancel
                               </button>
                               <button type="submit" wire:click.prevent="deleteDocs" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                   Yes, I'm sure
                               </button>
                           </div>
                       </x-pop-modal>
                       <x-secondary-button data-modal-toggle="deleteDocs-{{$document->id}}">
                           <svg class="w-4 h-4 text-red-600 dark:text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                           </svg>
                       </x-secondary-button>
                   </div>

               </li>
           @endforeach
        </ul>
    </div>

</x-card>

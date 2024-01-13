<div class="border border-gray-400 dark:border-gray-700 rounded p-2 gap-2 ">
    <div class="flex justify-between">
        <x-input-label class="text-xs">
            {{$label}}
        </x-input-label>
        <div>
            <x-pop-modal name="addContact-{{$type}}" class="max-w-md" static="true" modal-title="Add Contact">
                <form class="space-y-4" wire:submit.prevent="saveContact">
                    <div class="w-full">
                        @switch($type)
                            @case('mobile')
                                <x-input-label for="contact" value="Mobile"/>
                                <x-text-input class="w-full" wire:model.lazy="contact" id="contact" type="number" placeholder="09xxxxxxxxx"/>
                                @break
                            @case('phone')
                                <x-input-label for="contact" value="Phone"/>
                                <x-text-input class="w-full" wire:model.lazy="contact" id="contact" type="number" placeholder="02/036 xxxxxxx"/>
                                @break
                            @case('fax')
                                <x-input-label for="contact" value="Fax"/>
                                <x-text-input class="w-full" wire:model.lazy="contact" id="contact" type="number" placeholder="02/036 xxxxxxx"/>
                                @break
                            @case('email')
                                <x-input-label for="contact" value="Email"/>
                                <x-text-input class="w-full" wire:model.lazy="contact" id="contact" type="email" placeholder="sample@email.com"/>
                                @break
                        @endswitch
                            <x-input-error :messages="$errors->get('contact')" />
                    </div>
                    <div>
                        <x-submit-button class="min-w-full" wire:loading.attr="disabled">
                            <div class="p-2 text-center mx-auto" wire:loading.remove wire:target="saveContact">
                                Submit
                            </div>
                            <div class="p-2 text-center mx-auto" wire:loading wire:target="saveContact">
                                Processing...
                            </div>
                        </x-submit-button>
                    </div>
                </form>
            </x-pop-modal>
            <x-secondary-button class="text-sky-500 dark:text-sky-500" data-modal-toggle="addContact-{{$type}}">
                Add
            </x-secondary-button>
        </div>
    </div>
    <ul class="space-y-2 mt-2 divide-y divide-gray-200 dark:divide-gray-600">
        @switch($type)
            @case('mobile')

                @forelse($agency->mobile_contact as $val)
                    <li class="flex items-center justify-between pt-2">
                        <div>
                            {{$val->contact}}
                        </div>
                        <div id="delete-{{$type}}-{{$val->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                <!-- Modal content -->
                                <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                    <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="delete-{{$type}}-{{$val->id}}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300">{{$val->contact}}</p>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                    <div class="flex justify-center items-center space-x-4">
                                        <button data-modal-toggle="delete-{{$type}}-{{$val->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            Cancel
                                        </button>
                                        <button type="submit" wire:click.prevent="deleteContact({{$val->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <x-secondary-button data-modal-toggle="delete-{{$type}}-{{$val->id}}">
                            <svg class="w-3 h-3 text-red-500" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                            </svg>
                        </x-secondary-button>
                    </li>

                @empty
                    No contact details was found
                @endforelse
            @break
            @case('phone')
                @forelse($agency->phone_contact as $val)
                    <li class="flex items-center justify-between pt-2">
                        <div>
                            {{$val->contact}}
                        </div>
                        <div id="delete-{{$type}}-{{$val->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                <!-- Modal content -->
                                <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                    <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="delete-{{$type}}-{{$val->id}}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300">{{$val->contact}}</p>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                    <div class="flex justify-center items-center space-x-4">
                                        <button data-modal-toggle="delete-{{$type}}-{{$val->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            Cancel
                                        </button>
                                        <button type="submit" wire:click.prevent="deleteContact({{$val->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <x-secondary-button data-modal-toggle="delete-{{$type}}-{{$val->id}}">
                            <svg class="w-3 h-3 text-red-500" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                            </svg>
                        </x-secondary-button>
                    </li>

                @empty
                    No contact details was found
                @endforelse

                @break
            @case('fax')
                @forelse($agency->fax_contact as $val)
                    <li class="flex items-center justify-between pt-2">
                        <div>
                            {{$val->contact}}
                        </div>
                        <div id="delete-{{$type}}-{{$val->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                <!-- Modal content -->
                                <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                    <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="delete-{{$type}}-{{$val->id}}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300">{{$val->contact}}</p>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                    <div class="flex justify-center items-center space-x-4">
                                        <button data-modal-toggle="delete-{{$type}}-{{$val->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            Cancel
                                        </button>
                                        <button type="submit" wire:click.prevent="deleteContact({{$val->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <x-secondary-button data-modal-toggle="delete-{{$type}}-{{$val->id}}">
                            <svg class="w-3 h-3 text-red-500" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                            </svg>
                        </x-secondary-button>
                    </li>
                @empty
                    No contact details was found
                @endforelse

                @break
            @case('email')
                @forelse($agency->email_contact as $val)
                    <li >
                       <div class="flex items-center justify-between  hover:bg-gray-300 hover:dark:bg-gray-900 px-1 py-2 rounded">
                           <div>
                               {{$val->contact}}
                           </div>
                           <div id="delete-{{$type}}-{{$val->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                               <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                   <!-- Modal content -->
                                   <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                       <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="delete-{{$type}}-{{$val->id}}">
                                           <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                           <span class="sr-only">Close modal</span>
                                       </button>
                                       <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                       <p class="mb-4 text-gray-500 dark:text-gray-300">{{$val->contact}}</p>
                                       <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                       <div class="flex justify-center items-center space-x-4">
                                           <button data-modal-toggle="delete-{{$type}}-{{$val->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                               Cancel
                                           </button>
                                           <button type="submit" wire:click.prevent="deleteContact({{$val->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                               Delete
                                           </button>
                                       </div>
                                   </div>
                               </div>
                           </div>

                           <x-secondary-button data-modal-toggle="delete-{{$type}}-{{$val->id}}">
                               <svg class="w-3 h-3 text-red-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                         d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                               </svg>
                           </x-secondary-button>
                       </div>
                    </li>
                @empty
                    No contact details was found
                @endforelse

                @break

        @endswitch

    </ul>
</div>

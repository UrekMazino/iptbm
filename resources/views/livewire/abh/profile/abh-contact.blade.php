<x-card-panel title="ABH Contact Details">
    <div class="space-y-6">
        <div class="border border-200 dark:border-gray-600 rounded p-2">
            <div class="flex justify-between items-center">
                <div class="font-medium gap-2 flex">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
                        <path d="M12 0H2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM7.5 17.5h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2ZM12 13H2V4h10v9Z"/>
                    </svg>
                    Mobile number
                </div>
                <x-pop-modal static="true" name="addMobileAbh" modal-title="Add Mobile number"  class="max-w-md">
                    <form class="space-y-6" wire:submit.prevent="saveContact('mobile')">
                        <div>
                            <x-input-label value="Mobile number"/>
                            <x-text-input class="w-full" wire:model.lazy="mobile" type="number" step="any" placeholder="09## #### ###" required/>
                            <x-input-error :messages="$errors->get('mobile')"/>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveContact">
                                <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveContact">
                                    Submit
                                </div>
                                <div class="p-2 w-full text-center" wire:loading wire:target="saveContact">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>
                <x-secondary-button data-modal-toggle="addMobileAbh" class="text-sky-500 dark:text-sky-500">
                    Add Mobile
                </x-secondary-button>
            </div>
            <div class="mt-2">
                <ul class="divide-y divide-gray-200 dark:divide-gray-600">
                    @forelse($mobile_contact_list as $list)
                        <li>
                            <div class="flex rounded p-2 text-gray-700 dark:text-gray-400 justify-between items-center hover:bg-gray-300 dark:hover:bg-gray-900 transition duration-300">
                                <div>
                                    {{$list->contact}}
                                </div>
                                <x-pop-modal class="max-w-md" name="deleteAbhContact-{{$list->id}}">
                                    <div class="text-center">
                                        <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                        <p class="mb-4 text-gray-500 dark:text-gray-300">{{$list->contact}}</p>

                                        <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>

                                    </div>
                                    <div class="flex justify-center items-center space-x-4">
                                        <button data-modal-toggle="deleteAbhContact-{{$list->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            No, cancel
                                        </button>
                                        <button type="submit" wire:click.prevent="deleteContact('{{$list->id}}')" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            Yes, I'm sure
                                        </button>
                                    </div>
                                </x-pop-modal>
                                <button data-modal-toggle="deleteAbhContact-{{$list->id}}">
                                    <svg class="w-4 h-4 text-red-500 dark:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                    </svg>
                                </button>
                            </div>
                        </li>
                    @empty
                        No data available
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="border border-200 dark:border-gray-600 rounded p-2">
            <div class="flex justify-between items-center">
                <div class="font-medium gap-2 flex">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                        <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
                    </svg>
                    Phone number
                </div>
                <x-pop-modal static="true" name="addPhoneAbh" modal-title="Add Phone number"  class="max-w-md">
                    <form class="space-y-6" wire:submit.prevent="saveContact('phone')">
                        <div>
                            <x-input-label value="Phone number"/>
                            <x-text-input class="w-full" wire:model.lazy="phone" type="number" step="any" placeholder="##/### #######" required/>
                            <x-input-error :messages="$errors->get('phone')"/>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveContact">
                                <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveContact">
                                    Submit
                                </div>
                                <div class="p-2 w-full text-center" wire:loading wire:target="saveContact">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>
                <x-secondary-button data-modal-toggle="addPhoneAbh" class="text-sky-500 dark:text-sky-500">
                    Add Mobile
                </x-secondary-button>
            </div>
            <div class="mt-2">
                <ul class="divide-y divide-gray-200 dark:divide-gray-600">
                    @forelse($phone_contact_list as $list)
                        <li>
                            <div class="flex rounded p-2 text-gray-700 dark:text-gray-400 justify-between items-center hover:bg-gray-300 dark:hover:bg-gray-900 transition duration-300">
                                <div>
                                    {{$list->contact}}
                                </div>
                                <x-pop-modal class="max-w-md" name="deleteAbhContact-{{$list->id}}">
                                    <div class="text-center">
                                        <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                        <p class="mb-4 text-gray-500 dark:text-gray-300">{{$list->contact}}</p>

                                        <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>

                                    </div>
                                    <div class="flex justify-center items-center space-x-4">
                                        <button data-modal-toggle="deleteAbhContact-{{$list->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            No, cancel
                                        </button>
                                        <button type="submit" wire:click.prevent="deleteContact('{{$list->id}}')" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            Yes, I'm sure
                                        </button>
                                    </div>
                                </x-pop-modal>
                                <button data-modal-toggle="deleteAbhContact-{{$list->id}}">
                                    <svg class="w-4 h-4 text-red-500 dark:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                    </svg>
                                </button>
                            </div>
                        </li>
                    @empty
                        No data available
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="border border-200 dark:border-gray-600 rounded p-2">
            <div class="flex justify-between items-center">
                <div class="font-medium gap-2 flex">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                        <path d="M128 64v96h64V64H386.7L416 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L432 18.7C420 6.7 403.7 0 386.7 0H192c-35.3 0-64 28.7-64 64zM0 160V480c0 17.7 14.3 32 32 32H64c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32H32c-17.7 0-32 14.3-32 32zm480 32H128V480c0 17.7 14.3 32 32 32H480c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32zM256 256a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm96 32a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm32 96a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM224 416a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/>
                    </svg>
                    Fax number
                </div>
                <x-pop-modal static="true" name="addFaxAbh" modal-title="Add Fax number"  class="max-w-md">
                    <form class="space-y-6" wire:submit.prevent="saveContact('fax')">
                        <div>
                            <x-input-label value="Fax number"/>
                            <x-text-input class="w-full" wire:model.lazy="fax" type="number" step="any" placeholder="##/### #######" required/>
                            <x-input-error :messages="$errors->get('fax')"/>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveContact">
                                <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveContact">
                                    Submit
                                </div>
                                <div class="p-2 w-full text-center" wire:loading wire:target="saveContact">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>
                <x-secondary-button data-modal-toggle="addFaxAbh" class="text-sky-500 dark:text-sky-500">
                    Add Mobile
                </x-secondary-button>
            </div>
            <div class="mt-2">
                <ul class="divide-y divide-gray-200 dark:divide-gray-600">
                    @forelse($fax_contact_list as $list)
                        <li>
                            <div class="flex rounded p-2 text-gray-700 dark:text-gray-400 justify-between items-center hover:bg-gray-300 dark:hover:bg-gray-900 transition duration-300">
                                <div>
                                    {{$list->contact}}
                                </div>
                                <x-pop-modal class="max-w-md" name="deleteAbhContact-{{$list->id}}">
                                    <div class="text-center">
                                        <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                        <p class="mb-4 text-gray-500 dark:text-gray-300">{{$list->contact}}</p>

                                        <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>

                                    </div>
                                    <div class="flex justify-center items-center space-x-4">
                                        <button data-modal-toggle="deleteAbhContact-{{$list->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            No, cancel
                                        </button>
                                        <button type="submit" wire:click.prevent="deleteContact('{{$list->id}}')" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            Yes, I'm sure
                                        </button>
                                    </div>
                                </x-pop-modal>
                                <button data-modal-toggle="deleteAbhContact-{{$list->id}}">
                                    <svg class="w-4 h-4 text-red-500 dark:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                    </svg>
                                </button>
                            </div>
                        </li>
                    @empty
                        No data available
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="border border-200 dark:border-gray-600 rounded p-2">
            <div class="flex justify-between items-center">
                <div class="font-medium gap-2 flex">
                    <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0l57.4-43c23.9-59.8 79.7-103.3 146.3-109.8l13.9-10.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176V384c0 35.3 28.7 64 64 64H360.2C335.1 417.6 320 378.5 320 336c0-5.6 .3-11.1 .8-16.6l-26.4 19.8zM640 336a144 144 0 1 0 -288 0 144 144 0 1 0 288 0zm-76.7-43.3c6.2 6.2 6.2 16.4 0 22.6l-72 72c-6.2 6.2-16.4 6.2-22.6 0l-40-40c-6.2-6.2-6.2-16.4 0-22.6s16.4-6.2 22.6 0L480 353.4l60.7-60.7c6.2-6.2 16.4-6.2 22.6 0z"/></svg>
                    Mobile number
                </div>
                <x-pop-modal static="true" name="addEmailAbh" modal-title="Add Email Address"  class="max-w-md">
                    <form class="space-y-6" wire:submit.prevent="saveContact('email')">
                        <div>
                            <x-input-label value="Email number"/>
                            <x-text-input class="w-full" wire:model.lazy="email" type="email" step="any" placeholder="sample@mail.com" required/>
                            <x-input-error :messages="$errors->get('email')"/>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveContact">
                                <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveContact">
                                    Submit
                                </div>
                                <div class="p-2 w-full text-center" wire:loading wire:target="saveContact">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>
                <x-secondary-button data-modal-toggle="addEmailAbh" class="text-sky-500 dark:text-sky-500">
                    Add Email
                </x-secondary-button>
            </div>
            <div class="mt-2">
                <ul class="divide-y divide-gray-200 dark:divide-gray-600">
                    @forelse($email_contact_list as $list)
                        <li>
                            <div class="flex rounded p-2 text-gray-700 dark:text-gray-400 justify-between items-center hover:bg-gray-300 dark:hover:bg-gray-900 transition duration-300">
                                <div>
                                    {{$list->contact}}
                                </div>
                                <x-pop-modal class="max-w-md" name="deleteAbhContact-{{$list->id}}">
                                    <div class="text-center">
                                        <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                        <p class="mb-4 text-gray-500 dark:text-gray-300">{{$list->contact}}</p>

                                        <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>

                                    </div>
                                    <div class="flex justify-center items-center space-x-4">
                                        <button data-modal-toggle="deleteAbhContact-{{$list->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            No, cancel
                                        </button>
                                        <button type="submit" wire:click.prevent="deleteContact('{{$list->id}}')" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            Yes, I'm sure
                                        </button>
                                    </div>
                                </x-pop-modal>
                                <button data-modal-toggle="deleteAbhContact-{{$list->id}}">
                                    <svg class="w-4 h-4 text-red-500 dark:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                    </svg>
                                </button>
                            </div>
                        </li>
                    @empty
                        No data available
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-card-panel>

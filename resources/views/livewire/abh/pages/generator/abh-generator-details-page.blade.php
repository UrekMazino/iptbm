<div class="w-full">
    <x-header-label class="mt-10">
        {{__('Technology Generators Details')}}
    </x-header-label>
    <div class=" md:px-4">

        <x-grid col="3" gap="4">
            <div class="md:col-span-2">
                <x-card-panel>
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                        <div class="md:col-span-2 border border-gray-200 dark:border-gray-600 rounded gap-2 p-2">
                            <div class="p-5">
                                <div class=" rounded-full
                                 bg-gradient-to-tr  from-gray-900 to-gray-100 aspect-square border-gray-400 dark:border-gray-200  overflow-hidden border-8
                                ">
                                    <svg class="w-full h-full text-gray-200 dark:text-gray-200" viewBox="0 0 96 96" fill="currentColor" xmlns="http://www.w3.org/2000/svg" id="Icons_Welder" overflow="hidden">
                                        <path d="M58 13 38 13C34.6863 13 32 15.6863 32 19L32 37.17C32.0055 44.2535 37.7465 49.9945 44.83 50L51.17 50C58.2535 49.9945 63.9945 44.2535 64 37.17L64 19C64 15.6863 61.3137 13 58 13ZM58 36 38 36 38 25 58 25ZM57 21.5 39 21.5C38.4477 21.5 38 21.0523 38 20.5 38 19.9477 38.4477 19.5 39 19.5L57 19.5C57.5523 19.5 58 19.9477 58 20.5 58 21.0523 57.5523 21.5 57 21.5Z"></path>
                                        <path d="M38 66 58 66 58 52.48C52.1547 57.16 43.8453 57.16 38 52.48Z"></path>
                                        <path d="M76.8 59.6C73.1566 56.9892 69.1902 54.8615 65 53.27L65 66C66.6569 66 68 67.3431 68 69L68 82 80 82 80 66C79.9478 63.4946 78.773 61.1451 76.8 59.6Z"></path>
                                        <path d="M28 82 28 69C28 67.3431 29.3431 66 31 66L31 53.22C27.2585 54.513 23.7198 56.3312 20.49 58.62 20.4954 58.7133 20.4954 58.8067 20.49 58.9L20.49 70.8C22.665 72.3428 23.9698 74.8336 24 77.5 23.9956 79.1035 23.5153 80.6697 22.62 82Z"></path>
                                        <path d="M18.52 71.89 18.52 58.89C18.5288 58.516 18.3843 58.1547 18.12 57.89L14.81 54.58 15.14 54.25 14.93 52.78 10.75 51.53C9.16 48 6.23 46.1 2.02 45.53 2.96022 49.2486 5.97166 52.0845 9.74 52.8L10.95 56.8 12.42 57.01 12.9 56.52 15.82 59.43 15.82 71.03C15.5474 71.0048 15.2737 70.9948 15 71 11.13 71 9 71 9 77.5 9 84 11.13 84 15 84 18.7268 84.1351 21.859 81.2266 22 77.5 21.9662 75.1305 20.6278 72.973 18.52 71.89Z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="border border-gray-200 dark:border-gray-600 p-2 rounded">
                                <livewire:abh.generator.generator-status :generator="$generator" />
                            </div>
                        </div>
                        <div class="md:col-span-3 h-full flex justify-start items-center">
                            <div class="w-full space-y-4">
                                <livewire:abh.generator.generators-name :generator="$generator" />

                                <livewire:abh.generator.generators-address :generator="$generator"/>
                            </div>
                        </div>

                    </div>
                    <div class="mt-5">
                        <div class="border rounded border-gray-200 dark:border-gray-600 divide-y divide-gray-200 dark:divide-gray-600">
                            <div class="p-2 flex justify-between items-center">
                                <x-item-header>
                                    Field of Expertise
                                </x-item-header>

                                <x-pop-modal name="addExpert" class="max-w-xl" static="true" modal-title="Update Expertise">
                                    <form class="space-y-5" wire:submit.prevent="save_expertise">
                                        <div>
                                            <x-input-label value="Field of expertise"/>
                                            <x-text-input wire:model.lazy="expertise" class="w-full" required placeholder="enter text here..."/>
                                            <x-sub-label>
                                                maximum of 60 characters
                                            </x-sub-label>
                                            <x-input-error :messages="$errors->get('field')"/>
                                        </div>
                                        <div>
                                            <x-submit-button wire:loading.attr="disabled" class="min-w-full" wire:target="save_expertise" >
                                                <div class="w-full text-center p-2" wire:loading.remove wire:target="save_expertise">
                                                    Submit
                                                </div>
                                                <div class="w-full text-center p-2" wire:loading wire:target="save_expertise">
                                                    Processing...
                                                </div>
                                            </x-submit-button>
                                        </div>
                                    </form>
                                </x-pop-modal>

                                <x-secondary-button data-modal-toggle="addExpert" class="text-sky-500 dark:text-sky-500">
                                    Update
                                </x-secondary-button>
                            </div>
                            <div class="p-2">
                                <ul class="list-decimal ps-5 ">
                                    @forelse($generator->expertise as $field)
                                        <li>
                                            <div class="flex group justify-between items-center hover:bg-gray-300 hover:dark:bg-gray-900 p-2 rounded transition duration-300">
                                                <div class="w-full">
                                                    {{$field->field}}
                                                </div>
                                                <x-pop-modal name="deleteExpert-{{$field->id}}" class="max-w-md">
                                                   <div class="text-center">
                                                       <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                       <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                                   </div>
                                                    <div class="flex justify-center items-center space-x-4">
                                                        <button data-modal-toggle="deleteExpert-{{$field->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                            No, cancel
                                                        </button>
                                                        <button type="submit" wire:click.prevent="delete_expertise({{$field->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                            Yes, I'm sure
                                                        </button>
                                                    </div>
                                                </x-pop-modal>
                                                <button data-modal-toggle="deleteExpert-{{$field->id}}" class="opacity-0 group-hover:opacity-100 transition duration-300">
                                                    <svg class="w-5 h-5 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
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
            </div>
            <div>
                <x-card-panel title="Contact Details">
                    <div class="divide-y divide-gray-200 dark:divide-gray-600 space-y-4">
                        <div class="pt-5">
                            <div class="flex  justify-between items-center">
                                <div>
                                    Mobile number
                                </div>
                                <x-pop-modal name="updateMobile" static="true" class="max-w-md" modal-title="Add mobile number">
                                    <form class="space-y-5" wire:submit.prevent="save_mobile">
                                        <div>
                                            <x-input-label value="Mobile"/>
                                            <x-text-input type="number" wire:model.lazy="mobile" required placeholder="09xx xxxx xxxxx" class="w-full"/>

                                            <x-input-error :messages="$errors->get('mobile')"/>
                                        </div>
                                        <div>
                                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="save_mobile">
                                                <div class="p-2 w-full text-center" wire:loading.remove wire:target="save_mobile">
                                                    Submit
                                                </div>
                                                <div class="p-2 w-full text-center" wire:loading wire:target="save_mobile">
                                                    Processing...
                                                </div>
                                            </x-submit-button>
                                        </div>
                                    </form>
                                </x-pop-modal>
                                <button data-modal-toggle="updateMobile" class="text-sky-500 flex gap-2 hover:ring-1 px-1 rounded">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm11-4.2a1 1 0 1 0-2 0V11H7.8a1 1 0 1 0 0 2H11v3.2a1 1 0 1 0 2 0V13h3.2a1 1 0 1 0 0-2H13V7.8Z" clip-rule="evenodd"/>
                                    </svg>
                                    Add
                                </button>
                            </div>
                            <ul class="pt-4 ps-5 list-disc">

                                @forelse($mobile_number as $val)
                                    <li >
                                        <div class="hover:bg-gray-300 rounded group px-2 py-1 dark:hover:bg-gray-900 transition duration-300 flex justify-between items-center">
                                            <div>
                                                {{$val->contact}}
                                            </div>
                                            <div>
                                                <x-pop-modal name="deleteContact-{{$val->id}}" class="max-w-md">
                                                    <div class="text-center">
                                                        <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                        <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                                        <p class="mb-4 text-gray-500 dark:text-gray-300">{{$val->contact}}</p>
                                                    </div>
                                                    <div class="flex justify-center items-center space-x-4">
                                                        <button data-modal-toggle="deleteContact-{{$val->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                            No, cancel
                                                        </button>
                                                        <button type="submit" wire:loading.attr="disabled" wire:target="delete_contact" wire:click.prevent="delete_contact({{$val->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                            Yes, I'm sure
                                                        </button>
                                                    </div>
                                                </x-pop-modal>
                                                <button data-modal-toggle="deleteContact-{{$val->id}}" class="text-red-500 opacity-0 group-hover:opacity-100 transition duration-300">
                                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                    </li>
                                @empty
                                    No data available
                                @endforelse
                            </ul>
                        </div>
                        <div class="pt-5">
                            <div class="flex  justify-between items-center">
                                <div>
                                    Phone number
                                </div>
                                <x-pop-modal name="updatePhone" static="true" class="max-w-md" modal-title="Add Phone number">
                                    <form class="space-y-5" wire:submit.prevent="save_phone">
                                        <div>
                                            <x-input-label value="Phone number"/>
                                            <x-text-input type="number" wire:model.lazy="phone" required placeholder="(xx/xxx) xxx xxxx" class="w-full"/>
                                            <x-input-error :messages="$errors->get('phone')"/>
                                        </div>
                                        <div>
                                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="save_phone">
                                                <div class="p-2 w-full text-center" wire:loading.remove wire:target="save_phone">
                                                    Submit
                                                </div>
                                                <div class="p-2 w-full text-center" wire:loading wire:target="save_phone">
                                                    Processing...
                                                </div>
                                            </x-submit-button>
                                        </div>
                                    </form>
                                </x-pop-modal>
                                <button data-modal-toggle="updatePhone" class="text-sky-500 flex gap-2 hover:ring-1 px-1 rounded">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm11-4.2a1 1 0 1 0-2 0V11H7.8a1 1 0 1 0 0 2H11v3.2a1 1 0 1 0 2 0V13h3.2a1 1 0 1 0 0-2H13V7.8Z" clip-rule="evenodd"/>
                                    </svg>
                                    Add
                                </button>
                            </div>
                            <ul class="pt-4 ps-5 list-disc space-y-2">

                                @forelse($phone_number as $val)
                                    <li >
                                        <div class="hover:bg-gray-300 rounded group px-2 py-1 dark:hover:bg-gray-900 transition duration-300 flex justify-between items-center">
                                            <div>
                                                {{$val->contact}}
                                            </div>
                                            <div>
                                                <x-pop-modal name="deleteContact-{{$val->id}}" class="max-w-md">
                                                    <div class="text-center">
                                                        <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                        <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                                        <p class="mb-4 text-gray-500 dark:text-gray-300">{{$val->contact}}</p>
                                                    </div>
                                                    <div class="flex justify-center items-center space-x-4">
                                                        <button data-modal-toggle="deleteContact-{{$val->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                            No, cancel
                                                        </button>
                                                        <button type="submit" wire:loading.attr="disabled" wire:target="delete_contact" wire:click.prevent="delete_contact({{$val->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                            Yes, I'm sure
                                                        </button>
                                                    </div>
                                                </x-pop-modal>
                                                <button data-modal-toggle="deleteContact-{{$val->id}}" class="text-red-500 opacity-0 group-hover:opacity-100 transition duration-300">
                                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                    </li>
                                @empty
                                    No data available
                                @endforelse
                            </ul>
                        </div>
                        <div class="pt-5">
                            <div class="flex  justify-between items-center">
                                <div>
                                    Fax number
                                </div>
                                <x-pop-modal name="updateFax" static="true" class="max-w-md" modal-title="Add Fax number">
                                    <form class="space-y-5" wire:submit.prevent="save_fax">
                                        <div>
                                            <x-input-label value="Fax number"/>
                                            <x-text-input type="number" wire:model.lazy="fax" required placeholder="(xx/xxx) xxx xxxx" class="w-full"/>
                                            <x-input-error :messages="$errors->get('fax')"/>
                                        </div>
                                        <div>
                                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="save_fax">
                                                <div class="p-2 w-full text-center" wire:loading.remove wire:target="save_fax">
                                                    Submit
                                                </div>
                                                <div class="p-2 w-full text-center" wire:loading wire:target="save_fax">
                                                    Processing...
                                                </div>
                                            </x-submit-button>
                                        </div>
                                    </form>
                                </x-pop-modal>
                                <button data-modal-toggle="updateFax" class="text-sky-500 flex gap-2 hover:ring-1 px-1 rounded">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm11-4.2a1 1 0 1 0-2 0V11H7.8a1 1 0 1 0 0 2H11v3.2a1 1 0 1 0 2 0V13h3.2a1 1 0 1 0 0-2H13V7.8Z" clip-rule="evenodd"/>
                                    </svg>
                                    Add
                                </button>
                            </div>
                            <ul class="pt-4 ps-5 list-disc space-y-2">

                                @forelse($fax_number as $val)
                                    <li >
                                        <div class="hover:bg-gray-300 rounded group px-2 py-1 dark:hover:bg-gray-900 transition duration-300 flex justify-between items-center">
                                            <div>
                                                {{$val->contact}}
                                            </div>
                                            <div>
                                                <x-pop-modal name="deleteContact-{{$val->id}}" class="max-w-md">
                                                    <div class="text-center">
                                                        <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                        <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                                        <p class="mb-4 text-gray-500 dark:text-gray-300">{{$val->contact}}</p>
                                                    </div>
                                                    <div class="flex justify-center items-center space-x-4">
                                                        <button data-modal-toggle="deleteContact-{{$val->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                            No, cancel
                                                        </button>
                                                        <button type="submit" wire:loading.attr="disabled" wire:target="delete_contact" wire:click.prevent="delete_contact({{$val->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                            Yes, I'm sure
                                                        </button>
                                                    </div>
                                                </x-pop-modal>
                                                <button data-modal-toggle="deleteContact-{{$val->id}}" class="text-red-500 opacity-0 group-hover:opacity-100 transition duration-300">
                                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                    </li>
                                @empty
                                    No data available
                                @endforelse
                            </ul>
                        </div>
                        <div class="pt-5">
                            <div class="flex  justify-between items-center">
                                <div>
                                    Email Address
                                </div>
                                <x-pop-modal name="updateEmail" static="true" class="max-w-md" modal-title="Add Email Address">
                                    <form class="space-y-5" wire:submit.prevent="save_email">
                                        <div>
                                            <x-input-label value="Email"/>
                                            <x-text-input type="email" wire:model.lazy="email" required placeholder="sample@mail.com" class="w-full"/>
                                            <x-input-error :messages="$errors->get('email')"/>
                                        </div>
                                        <div>
                                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="save_email">
                                                <div class="p-2 w-full text-center" wire:loading.remove wire:target="save_email">
                                                    Submit
                                                </div>
                                                <div class="p-2 w-full text-center" wire:loading wire:target="save_email">
                                                    Processing...
                                                </div>
                                            </x-submit-button>
                                        </div>
                                    </form>
                                </x-pop-modal>
                                <button data-modal-toggle="updateEmail" class="text-sky-500 flex gap-2 hover:ring-1 px-1 rounded">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm11-4.2a1 1 0 1 0-2 0V11H7.8a1 1 0 1 0 0 2H11v3.2a1 1 0 1 0 2 0V13h3.2a1 1 0 1 0 0-2H13V7.8Z" clip-rule="evenodd"/>
                                    </svg>
                                    Add
                                </button>
                            </div>
                            <ul class="pt-4 ps-5 list-disc space-y-2">

                                @forelse($email_address as $val)
                                    <li >
                                        <div class="hover:bg-gray-300 rounded group px-2 py-1 dark:hover:bg-gray-900 transition duration-300 flex justify-between items-center">
                                            <div>
                                                {{$val->contact}}
                                            </div>
                                            <div>
                                                <x-pop-modal name="deleteContact-{{$val->id}}" class="max-w-md">
                                                    <div class="text-center">
                                                        <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                        <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                                        <p class="mb-4 text-gray-500 dark:text-gray-300">{{$val->contact}}</p>
                                                    </div>
                                                    <div class="flex justify-center items-center space-x-4">
                                                        <button data-modal-toggle="deleteContact-{{$val->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                            No, cancel
                                                        </button>
                                                        <button type="submit" wire:loading.attr="disabled" wire:target="delete_contact" wire:click.prevent="delete_contact({{$val->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                            Yes, I'm sure
                                                        </button>
                                                    </div>
                                                </x-pop-modal>
                                                <button data-modal-toggle="deleteContact-{{$val->id}}" class="text-red-500 opacity-0 group-hover:opacity-100 transition duration-300">
                                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                    </li>
                                @empty
                                    No data available
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </x-card-panel>
            </div>
        </x-grid>
    </div>
</div>

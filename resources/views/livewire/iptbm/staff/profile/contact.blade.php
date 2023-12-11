<x-card-panel title="IP-TBM Contact Details">
    <div class="space-y-4">
        <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 ">
            <div class="flex justify-between items-center">
                <x-input-label>
                    <div class="flex justify-start items-center gap-3">
                        <i class="fa-solid fa-mobile-retro"></i>
                        <div>
                            Mobile Number
                        </div>
                    </div>
                </x-input-label>

                <x-pop-modal static="true" modal-title="Add new Mobile number" name="profileAddMobile" class="max-w-md">
                    <form wire:ignore.self wire:submit.prevent="saveMobile" class="space-y-4">
                        <div>
                            <x-input-label value="Mobile number"/>
                            <x-text-input wire:model.lazy="mobileInput" type="number" class="w-full" placeholder="09xxxxxxxxx"/>
                            <x-input-error :messages="$errors->get('mobileInput')"/>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveMobile">
                                <div wire:loading wire:target="saveMobile" class="w-full text-center">
                                    Processing...
                                </div>
                                <div wire:loading.remove wire:target="saveMobile" class="w-full text-center">
                                    Submit
                                </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>
                <x-secondary-button data-modal-toggle="profileAddMobile" data-modal-target="profileAddMobile"  class="text-sky-500 dark:text-sky-500" >
                    Add Mobile
                </x-secondary-button>
            </div>
            <ul class="mt-5">

                @if($contact_mobile->count()>0)
                    @foreach($contact_mobile as $contact)
                        <li class="flex justify-between items-center hover:bg-gray-300 dark:hover:bg-gray-900 duration-300 transition cursor-pointer p-1">
                            <div>
                                {{$contact->contact}}
                            </div>
                            <x-pop-modal name="delContact-{{$contact->id}}" class="max-w-md" static="true">
                                <div class="text-center">
                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300 text-lg">{{$contact->contact}}</p>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this number?</p>
                                    <div class="flex justify-center items-center space-x-4">
                                        <button data-modal-toggle="delContact-{{$contact->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            No, cancel
                                        </button>
                                        <button type="submit" wire:click.prevent="deleteContact({{$contact->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            Yes, I'm sure
                                        </button>
                                    </div>
                                </div>
                            </x-pop-modal>
                            <button data-modal-toggle="delContact-{{$contact->id}}">
                                <i class="fa-solid fa-trash text-red-500"></i>
                            </button>
                        </li>
                    @endforeach
                @else
                    No data available
                @endif

            </ul>
        </div>
        <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 ">
            <div class="flex justify-between items-center">
                <x-input-label>
                    <div class="flex justify-start items-center gap-3">
                        <i class="fa-solid fa-phone-square"></i>
                        <div>
                            Phone Number
                        </div>
                    </div>
                </x-input-label>

                <x-pop-modal static="true" modal-title="Add new Phone number" name="profileAddPhone" class="max-w-md">
                    <form wire:ignore.self wire:submit.prevent="savePhone" class="space-y-4">
                        <div>
                            <x-input-label value="Phone number"/>
                            <x-text-input wire:model.lazy="phoneInput" type="number" class="w-full" placeholder="enter 9-10 digit number"/>
                            <x-input-error :messages="$errors->get('phoneInput')"/>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveMobile">
                                <div wire:loading wire:target="saveMobile" class="w-full text-center">
                                    Processing...
                                </div>
                                <div wire:loading.remove wire:target="saveMobile" class="w-full text-center">
                                    Submit
                                </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>
                <x-secondary-button data-modal-toggle="profileAddPhone" data-modal-target="profileAddPhone"  class="text-sky-500 dark:text-sky-500" >
                    Add Phone
                </x-secondary-button>
            </div>
            <ul class="mt-5">

                @if($contact_phone->count()>0)
                    @foreach($contact_phone as $contact)
                        <li class="flex justify-between items-center hover:bg-gray-300 dark:hover:bg-gray-900 duration-300 transition cursor-pointer p-1">
                            <div>
                                {{$contact->contact}}
                            </div>
                            <x-pop-modal name="delContact-{{$contact->id}}" class="max-w-md" static="true">
                                <div class="text-center">
                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300 text-lg">{{$contact->contact}}</p>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this number?</p>
                                    <div class="flex justify-center items-center space-x-4">
                                        <button data-modal-toggle="delContact-{{$contact->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            No, cancel
                                        </button>
                                        <button type="submit" wire:click.prevent="deleteContact({{$contact->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            Yes, I'm sure
                                        </button>
                                    </div>
                                </div>
                            </x-pop-modal>
                            <button data-modal-toggle="delContact-{{$contact->id}}">
                                <i class="fa-solid fa-trash text-red-500"></i>
                            </button>
                        </li>
                    @endforeach
                @else
                    No data available
                @endif

            </ul>
        </div>
        <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 ">
            <div class="flex justify-between items-center">
                <x-input-label>
                    <div class="flex justify-start items-center gap-3">
                        <i class="fa-solid fa-fax"></i>
                        <div>
                            Fax Number
                        </div>
                    </div>
                </x-input-label>

                <x-pop-modal static="true" modal-title="Add new Fax number" name="profileAddFax" class="max-w-md">
                    <form wire:ignore.self wire:submit.prevent="saveFax" class="space-y-4">
                        <div>
                            <x-input-label value="Fax number"/>
                            <x-text-input wire:model.lazy="faxInput" type="number" class="w-full" placeholder="enter 9-10 digit number"/>
                            <x-input-error :messages="$errors->get('faxInput')"/>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveFax">
                                <div wire:loading wire:target="saveFax" class="w-full text-center">
                                    Processing...
                                </div>
                                <div wire:loading.remove wire:target="saveFax" class="w-full text-center">
                                    Submit
                                </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>
                <x-secondary-button data-modal-toggle="profileAddFax" data-modal-target="profileAddFax"  class="text-sky-500 dark:text-sky-500" >
                    Add Fax
                </x-secondary-button>
            </div>
            <ul class="mt-5">

                @if($contact_fax->count()>0)
                    @foreach($contact_fax as $contact)
                        <li class="flex justify-between items-center hover:bg-gray-300 dark:hover:bg-gray-900 duration-300 transition cursor-pointer p-1">
                            <div>
                                {{$contact->contact}}
                            </div>
                            <x-pop-modal name="delContact-{{$contact->id}}" class="max-w-md" static="true">
                                <div class="text-center">
                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300 text-lg">{{$contact->contact}}</p>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this number?</p>
                                    <div class="flex justify-center items-center space-x-4">
                                        <button data-modal-toggle="delContact-{{$contact->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            No, cancel
                                        </button>
                                        <button type="submit" wire:click.prevent="deleteContact({{$contact->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            Yes, I'm sure
                                        </button>
                                    </div>
                                </div>
                            </x-pop-modal>
                            <button data-modal-toggle="delContact-{{$contact->id}}">
                                <i class="fa-solid fa-trash text-red-500"></i>
                            </button>
                        </li>
                    @endforeach
                @else
                    No data available
                @endif

            </ul>
        </div>
        <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 ">
            <div class="flex justify-between items-center">
                <x-input-label>
                    <div class="flex justify-start items-center gap-3">
                        <i class="fa-solid fa-at"></i>
                        <div>
                            Email Address
                        </div>
                    </div>
                </x-input-label>

                <x-pop-modal static="true" modal-title="Add new Email" name="profileAddEmail" class="max-w-md">
                    <form wire:ignore.self wire:submit.prevent="saveEmail" class="space-y-4">
                        <div>
                            <x-input-label value="Fax number"/>
                            <x-text-input wire:model.lazy="emailInput" type="email" class="w-full" placeholder="sample@mail.com"/>
                            <x-input-error :messages="$errors->get('emailInput')"/>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveEmail">
                                <div wire:loading wire:target="saveEmail" class="w-full text-center">
                                    Processing...
                                </div>
                                <div wire:loading.remove wire:target="saveEmail" class="w-full text-center">
                                    Submit
                                </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>
                <x-secondary-button data-modal-toggle="profileAddEmail" data-modal-target="profileAddEmail"  class="text-sky-500 dark:text-sky-500" >
                    Add Email
                </x-secondary-button>
            </div>
            <ul class="mt-5">

                @if($contact_email->count()>0)
                    @foreach($contact_email as $contact)
                        <li class="flex justify-between items-center hover:bg-gray-300 dark:hover:bg-gray-900 duration-300 transition cursor-pointer p-1">
                            <div>
                                {{$contact->contact}}
                            </div>
                            <x-pop-modal name="delContact-{{$contact->id}}" class="max-w-md" static="true">
                                <div class="text-center">
                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300 text-lg">{{$contact->contact}}</p>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this number?</p>
                                    <div class="flex justify-center items-center space-x-4">
                                        <button data-modal-toggle="delContact-{{$contact->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            No, cancel
                                        </button>
                                        <button type="submit" wire:click.prevent="deleteContact({{$contact->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            Yes, I'm sure
                                        </button>
                                    </div>
                                </div>
                            </x-pop-modal>
                            <button data-modal-toggle="delContact-{{$contact->id}}">
                                <i class="fa-solid fa-trash text-red-500"></i>
                            </button>
                        </li>
                    @endforeach
                @else
                    No data available
                @endif

            </ul>
        </div>
    </div>

</x-card-panel>

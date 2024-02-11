<div>
    <x-header-label class="mb-2 mt-10">
        Update Agency Details
    </x-header-label>
    <div class="space-y-5">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-x-14">
            <div class="md:col-span-3">

                <x-card class="shadow-lg  ">
                    <div class="space-y-8">
                        <div class="space-y-4">
                            <div class=" p-2 border border-gray-400 dark:border-gray-600 rounded-lg">
                                <div class="justify-end flex">
                                    <x-pop-modal class="max-w-lg" modal-title="Update agency Name" name="updateName"
                                                 static="true" close-action="agency_details_reset">
                                        <form class="space-y-5" wire:submit.prevent="saveAgencyName">
                                            <div class="space-y-4">
                                                <div>
                                                    <x-input-label for="agnem" value="Agency name"/>
                                                    <x-text-input wire:model.lazy="agencyName" class="w-full" id="agnem" type="text"
                                                                  placeholder="Enter text here"/>
                                                    <x-input-error :messages="$errors->get('agencyName')"/>
                                                </div>
                                                <div>
                                                    <x-input-label for="agCode" value="Agency Code"/>
                                                    <x-text-input wire:model.lazy="agency_code" class="w-full" id="agCode" type="text"
                                                                  placeholder="Enter text here"/>
                                                    <x-input-error :messages="$errors->get('agency_code')"/>
                                                </div>
                                            </div>
                                            <div>
                                                <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveAgencyName">
                                                    <div class="p-2 text-center w-full" wire:loading.remove wire:target="saveAgencyName">
                                                        Submit
                                                    </div>
                                                    <div class="p-2 text-center w-full" wire:loading wire:target="saveAgencyName">
                                                        Processing...
                                                    </div>
                                                </x-submit-button>
                                            </div>

                                        </form>
                                    </x-pop-modal>
                                    <x-secondary-button data-modal-toggle="updateName" class="text-sky-600 dark:text-sky-600">
                                        Update
                                    </x-secondary-button>
                                </div>
                                <div class="divide-y divide-gray-400 dark:divide-gray-600 p-3">
                                    <div class="px-4">
                                        <div class="text-lg font-medium text-700 dark:text-gray-200">
                                            {{$agency->name}} @if($agency->code) ({{$agency->code}}) @endif
                                        </div>
                                    </div>
                                    <div class="text-lg px-4">
                                        Agency name
                                    </div>
                                </div>
                            </div>
                            <div class=" p-2 border border-gray-400 dark:border-gray-600 rounded-lg">
                                <div class="justify-end flex">
                                    <x-pop-modal class="max-w-lg" modal-title="Update agency Address" name="updateAddress"
                                                 static="true">
                                        <form class="space-y-5" wire:submit.prevent="saveAgencyAddress">
                                            <div>
                                                <x-input-label for="agAd" value="Agency address"/>
                                                <x-text-input wire:model.lazy="agencyAddress" class="w-full" id="agAd"
                                                              type="text" placeholder="Enter text here"/>
                                                <x-input-error :messages="$errors->get('agencyName')"/>
                                            </div>
                                            <x-submit-button wire:loading wire:target="saveAgencyAddress">
                                                Processing...
                                            </x-submit-button>
                                            <x-submit-button wire:loading.remove wire:target="saveAgencyAddress">
                                                Submit
                                            </x-submit-button>
                                        </form>
                                    </x-pop-modal>
                                    <x-secondary-button data-modal-toggle="updateAddress"
                                                        class="text-sky-600 dark:text-sky-600">
                                        Update
                                    </x-secondary-button>
                                </div>
                                <div class="divide-y divide-gray-400 dark:divide-gray-600 p-3">
                                    <div class="px-4">

                                        <div class="text-lg font-medium text-700 dark:text-gray-200">
                                            {{$agency->address}}
                                        </div>

                                    </div>
                                    <div class="text-lg px-4">
                                        Agency Address
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <x-item-header>
                                Contact details
                            </x-item-header>
                            <div class="space-y-4">
                                <div class="border border-gray-200 dark:border-gray-600 rounded p-2">

                                    <div class="flex justify-between items-center">
                                        <div class="text-gray-500 dark:text-gray-200 font-medium">
                                            Email Address
                                        </div>
                                        <x-pop-modal class="max-w-lg" name="agencyaddEmail" static="true"
                                                     modal-title="Update Email">
                                            <form class="space-y-4" wire:submit.prevent="saveAgencyEmail">
                                                <div>
                                                    <x-input-label value="Email"/>
                                                    <x-text-input wire:model.lazy="agencyContactEmail" class="w-full"
                                                                  type="email" placeholder="sample@mail.com"/>
                                                    <x-input-error :messages="$errors->get('agencyContactEmail')"/>
                                                </div>
                                                <x-submit-button wire:loading wire:target="saveContactEmail">
                                                    Processing...
                                                </x-submit-button>
                                                <x-submit-button wire:loading.remove wire:target="saveContactEmail">
                                                    Update
                                                </x-submit-button>
                                            </form>
                                        </x-pop-modal>
                                        <x-secondary-button class="text-sky-500 dark:text-sky-500" data-modal-toggle="agencyaddEmail">
                                            Add contact
                                        </x-secondary-button>
                                    </div>

                                    <div class="ms-5 mt-1">
                                        <ul class="divide-y divide-gray-400 dark:divide-gray-600">
                                            @forelse($agency->contacts->where('contact_type', 'email') as $contact)
                                                <li >
                                                    <div class="flex justify-between items-center p-2 rounded transition duration-300 hover:bg-gray-200 dark:hover:bg-gray-900">
                                                        <div>
                                                            {{$contact->contact}}
                                                        </div>
                                                        <x-pop-modal class="max-w-md text-center"
                                                                     name="deleteAgencyContact-{{$contact->id}}">
                                                            <svg
                                                                class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                                                                aria-hidden="true" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                      clip-rule="evenodd"></path>
                                                            </svg>
                                                            <p class="mb-4 text-gray-500 dark:text-gray-300">{{$contact->contact}}</p>
                                                            <p class="mb-4 text-gray-500 dark:text-gray-300">Are you
                                                                sure you want to delete this contact?</p>
                                                            <div class="flex justify-center items-center space-x-4">
                                                                <button data-modal-toggle="deleteModal" type="button"
                                                                        class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                    No, cancel
                                                                </button>
                                                                <button
                                                                    wire:click.prevent="deleteAgencyContact({{$contact->id}})"
                                                                    type="submit"
                                                                    class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                    Yes, I'm sure
                                                                </button>
                                                            </div>
                                                        </x-pop-modal>
                                                        <button
                                                            data-modal-toggle="deleteAgencyContact-{{$contact->id}}">
                                                            <svg class="w-4 h-4 text-gray-800 dark:text-white"
                                                                 aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                 fill="none" viewBox="0 0 18 20">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                      stroke-linejoin="round" stroke-width="2"
                                                                      d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </li>
                                            @empty
                                                <div class="text-center">
                                                    No data available
                                                </div>
                                            @endforelse

                                        </ul>

                                    </div>
                                </div>
                                <div class="border border-gray-200 dark:border-gray-600 rounded p-2">

                                    <div class="flex justify-between items-center">
                                        <div class="text-gray-500 dark:text-gray-200 font-medium">
                                            Phone number
                                        </div>
                                        <x-pop-modal class="max-w-lg" name="agencyaddPhoneN" static="true"
                                                     modal-title="Update Phone">
                                            <form class="space-y-4" wire:submit.prevent="saveAgencyPhone">
                                                <div>
                                                    <x-input-label value="Phone"/>
                                                    <x-text-input wire:model.lazy="agencyContactPhone" class="w-full"
                                                                  type="number" placeholder="area code + 7 digits"/>
                                                    <x-input-error :messages="$errors->get('agencyContactPhone')"/>
                                                </div>
                                                <x-submit-button wire:loading wire:target="saveAgencyPhone">
                                                    Processing...
                                                </x-submit-button>
                                                <x-submit-button wire:loading.remove wire:target="saveAgencyPhone">
                                                    Update
                                                </x-submit-button>
                                            </form>
                                        </x-pop-modal>
                                        <x-secondary-button class="text-sky-500 dark:text-sky-500" data-modal-toggle="agencyaddPhoneN">
                                            Add contact
                                        </x-secondary-button>
                                    </div>

                                    <div class="ms-5 mt-1">
                                        <ul class="divide-y divide-gray-400 dark:divide-gray-600">
                                            @forelse($agency->contacts->where('contact_type', 'phone') as $contact)
                                                <li >
                                                    <div class="flex justify-between items-center p-2 rounded transition duration-300 hover:bg-gray-200 dark:hover:bg-gray-900">
                                                        <div>
                                                            {{$contact->contact}}
                                                        </div>
                                                        <x-pop-modal class="max-w-md text-center"
                                                                     name="deleteAgencyContact-{{$contact->id}}">
                                                            <svg
                                                                class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                                                                aria-hidden="true" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                      clip-rule="evenodd"></path>
                                                            </svg>
                                                            <p class="mb-4 text-gray-500 dark:text-gray-300">{{$contact->contact}}</p>
                                                            <p class="mb-4 text-gray-500 dark:text-gray-300">Are you
                                                                sure you want to delete this contact?</p>
                                                            <div class="flex justify-center items-center space-x-4">
                                                                <button data-modal-toggle="deleteModal" type="button"
                                                                        class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                    No, cancel
                                                                </button>
                                                                <button
                                                                    wire:click.prevent="deleteAgencyContact({{$contact->id}})"
                                                                    type="submit"
                                                                    class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                    Yes, I'm sure
                                                                </button>
                                                            </div>
                                                        </x-pop-modal>
                                                        <button
                                                            data-modal-toggle="deleteAgencyContact-{{$contact->id}}">
                                                            <svg class="w-4 h-4 text-gray-800 dark:text-white"
                                                                 aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                 fill="none" viewBox="0 0 18 20">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                      stroke-linejoin="round" stroke-width="2"
                                                                      d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </li>
                                            @empty
                                                <div class="text-center">
                                                    No data available
                                                </div>
                                            @endforelse

                                        </ul>

                                    </div>
                                </div>
                                <div class="border border-gray-200 dark:border-gray-600 rounded p-2">

                                    <div class="flex justify-between items-center">
                                        <div class="text-gray-500 dark:text-gray-200 font-medium">
                                            Mobile number
                                        </div>
                                        <x-pop-modal class="max-w-lg" name="agencyaddMobile" static="true"
                                                     modal-title="Update Email">
                                            <form class="space-y-4" wire:submit.prevent="saveAgencyMobile">
                                                <div>
                                                    <x-input-label value="Mobile"/>
                                                    <x-text-input wire:model.lazy="agencyContactMobile" class="w-full"
                                                                  type="number" placeholder="09xxxxxxxxx"/>
                                                    <x-input-error :messages="$errors->get('agencyContactMobile')"/>
                                                </div>
                                                <x-submit-button wire:loading wire:target="saveAgencyMobile">
                                                    Processing...
                                                </x-submit-button>
                                                <x-submit-button wire:loading.remove wire:target="saveAgencyMobile">
                                                    Update
                                                </x-submit-button>
                                            </form>
                                        </x-pop-modal>
                                        <x-secondary-button class="text-sky-500 dark:text-sky-500" data-modal-toggle="agencyaddMobile">
                                            Add contact
                                        </x-secondary-button>
                                    </div>

                                    <div class="ms-5 mt-1">
                                        <ul class="divide-y divide-gray-400 dark:divide-gray-600">
                                            @forelse($agency->contacts->where('contact_type', 'mobile') as $contact)
                                                <li >
                                                    <div class="flex justify-between items-center p-2 rounded transition duration-300 hover:bg-gray-200 dark:hover:bg-gray-900">
                                                        <div>
                                                            {{$contact->contact}}
                                                        </div>
                                                        <x-pop-modal class="max-w-md text-center"
                                                                     name="deleteAgencyContact-{{$contact->id}}">
                                                            <svg
                                                                class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                                                                aria-hidden="true" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                      clip-rule="evenodd"></path>
                                                            </svg>
                                                            <p class="mb-4 text-gray-500 dark:text-gray-300">{{$contact->contact}}</p>
                                                            <p class="mb-4 text-gray-500 dark:text-gray-300">Are you
                                                                sure you want to delete this contact?</p>
                                                            <div class="flex justify-center items-center space-x-4">
                                                                <button data-modal-toggle="deleteModal" type="button"
                                                                        class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                    No, cancel
                                                                </button>
                                                                <button
                                                                    wire:click.prevent="deleteAgencyContact({{$contact->id}})"
                                                                    type="submit"
                                                                    class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                    Yes, I'm sure
                                                                </button>
                                                            </div>
                                                        </x-pop-modal>
                                                        <button
                                                            data-modal-toggle="deleteAgencyContact-{{$contact->id}}">
                                                            <svg class="w-4 h-4 text-gray-800 dark:text-white"
                                                                 aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                 fill="none" viewBox="0 0 18 20">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                      stroke-linejoin="round" stroke-width="2"
                                                                      d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </li>
                                            @empty
                                                <div class="text-center">
                                                    No data available
                                                </div>
                                            @endforelse

                                        </ul>

                                    </div>
                                </div>
                                <div class="border border-gray-200 dark:border-gray-600 rounded p-2">

                                    <div class="flex justify-between items-center">
                                        <div class="text-gray-500 dark:text-gray-200 font-medium">
                                            Fax number
                                        </div>
                                        <x-pop-modal class="max-w-lg" name="agencyaddFax" static="true"
                                                     modal-title="Update Fax">
                                            <form class="space-y-4" wire:submit.prevent="saveAgencyFax">
                                                <div>
                                                    <x-input-label value="Fax"/>
                                                    <x-text-input wire:model.lazy="agencyContactFax" class="w-full"
                                                                  type="number" placeholder="area code + 7 digit"/>
                                                    <x-input-error :messages="$errors->get('agencyContactFax')"/>
                                                </div>
                                                <x-submit-button wire:loading wire:target="saveAgencyFax">
                                                    Processing...
                                                </x-submit-button>
                                                <x-submit-button wire:loading.remove wire:target="saveAgencyFax">
                                                    Update
                                                </x-submit-button>
                                            </form>
                                        </x-pop-modal>
                                        <x-secondary-button class="text-sky-500 dark:text-sky-500" data-modal-toggle="agencyaddFax">
                                            Add contact
                                        </x-secondary-button>
                                    </div>

                                    <div class="ms-5 mt-1">
                                        <ul class="divide-y divide-gray-400 dark:divide-gray-600">
                                            @forelse($agency->contacts->where('contact_type', 'fax') as $contact)
                                                <li >
                                                    <div class="flex justify-between items-center p-2 rounded transition duration-300 hover:bg-gray-200 dark:hover:bg-gray-900">
                                                        <div>
                                                            {{$contact->contact}}
                                                        </div>
                                                        <x-pop-modal class="max-w-md text-center"
                                                                     name="deleteAgencyContact-{{$contact->id}}">
                                                            <svg
                                                                class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                                                                aria-hidden="true" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                      clip-rule="evenodd"></path>
                                                            </svg>
                                                            <p class="mb-4 text-gray-500 dark:text-gray-300">{{$contact->contact}}</p>
                                                            <p class="mb-4 text-gray-500 dark:text-gray-300">Are you
                                                                sure you want to delete this contact?</p>
                                                            <div class="flex justify-center items-center space-x-4">
                                                                <button data-modal-toggle="deleteModal" type="button"
                                                                        class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                    No, cancel
                                                                </button>
                                                                <button
                                                                    wire:click.prevent="deleteAgencyContact({{$contact->id}})"
                                                                    type="submit"
                                                                    class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                    Yes, I'm sure
                                                                </button>
                                                            </div>
                                                        </x-pop-modal>
                                                        <button
                                                            data-modal-toggle="deleteAgencyContact-{{$contact->id}}">
                                                            <svg class="w-4 h-4 text-gray-800 dark:text-white"
                                                                 aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                 fill="none" viewBox="0 0 18 20">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                      stroke-linejoin="round" stroke-width="2"
                                                                      d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </li>
                                            @empty
                                                <div class="text-center">
                                                    No data available
                                                </div>
                                            @endforelse

                                        </ul>

                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </x-card>
            </div>
            <div class="space-y-4 md:col-span-2">
                <x-card-panel title="Agency Head">
                    <div class="space-y-4">
                        <div class=" p-2 border border-gray-400 dark:border-gray-600 rounded-lg">
                            <div>
                                <div class="justify-end flex">
                                    <x-pop-modal class="max-w-lg" modal-title="Update agency Head" name="updatHead"
                                                 static="true">
                                        <form class="space-y-5" wire:submit.prevent="saveAgencyHead">
                                            <div>
                                                <x-input-label for="agAd" value="Agency Head"/>
                                                <x-text-input wire:model.lazy="agencyHead" class="w-full" id="agAd" type="text"
                                                              placeholder="Enter text here"/>
                                                <x-input-error :messages="$errors->get('agencyHead')"/>
                                            </div>
                                            <x-submit-button wire:loading wire:target="saveAgencyHead">
                                                Processing...
                                            </x-submit-button>
                                            <x-submit-button wire:loading.remove wire:target="saveAgencyHead">
                                                Submit
                                            </x-submit-button>
                                        </form>
                                    </x-pop-modal>
                                    <x-secondary-button data-modal-toggle="updatHead" class="text-sky-600 dark:text-sky-600">
                                        Update
                                    </x-secondary-button>
                                </div>
                                <div class="divide-y divide-gray-400 dark:divide-gray-600 p-3">
                                    <div class="px-4">
                                        @if($agency->head)
                                            <div class="text-lg font-medium text-700 dark:text-gray-200">

                                                {{$agency->head}}
                                            </div>
                                        @else
                                            <div class="text-gray-400 dark:text-gray-600">
                                                No data available
                                            </div>
                                        @endif

                                    </div>
                                    <div class="text-lg px-4">
                                        Agency Head
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" p-2 border border-gray-400 dark:border-gray-600 rounded-lg">
                            <div>
                                <div class="justify-end flex">
                                    <x-pop-modal class="max-w-lg" modal-title="Update Designation" name="updatedDes"
                                                 static="true">
                                        <form class="space-y-5" wire:submit.prevent="saveDesignation">
                                            <div>
                                                <x-input-label for="agAd" value="Designation"/>
                                                <x-text-input wire:model.lazy="designation" class="w-full" id="agAd" type="text"
                                                              placeholder="Enter text here"/>
                                                <x-input-error :messages="$errors->get('designation')"/>
                                            </div>
                                            <x-submit-button wire:loading wire:target="saveDesignation">
                                                Processing...
                                            </x-submit-button>
                                            <x-submit-button wire:loading.remove wire:target="saveDesignation">
                                                Submit
                                            </x-submit-button>
                                        </form>
                                    </x-pop-modal>
                                    <x-secondary-button data-modal-toggle="updatedDes" class="text-sky-600 dark:text-sky-600">
                                        Update
                                    </x-secondary-button>
                                </div>
                                <div class="divide-y divide-gray-400 dark:divide-gray-600 p-3">
                                    <div class="px-4">
                                        <div class="text-lg font-medium text-700 dark:text-gray-200">
                                            @if($agency->designation)
                                                {{$agency->designation}}
                                            @else
                                                <div class="text-gray-400 dark:text-gray-600">
                                                    No data available
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="text-lg px-4">
                                        Designation
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{------------------
                         <div class=" p-2 border border-gray-400 dark:border-gray-600 rounded-lg">
                             <x-item-header class="text-lg">
                                 Contact details
                             </x-item-header>
                             <div class="space-y-4 w-full md:w-3/4 mt-3">
                                 <div>
                                     <div class="flex justify-start items-center">
                                         <x-pop-modal class="max-w-lg" name="addEmail" static="true" modal-title="Update Email">
                                             <form class="space-y-4" wire:submit.prevent="saveContactEmail">
                                                 <div>
                                                     <x-input-label value="Email"/>
                                                     <x-text-input wire:model.lazy="email" class="w-full" type="email"
                                                                   placeholder="sample@mail.com"/>
                                                     <x-input-error :messages="$errors->get('email')"/>
                                                 </div>
                                                 <x-submit-button wire:loading wire:target="saveContactEmail">
                                                     Processing...
                                                 </x-submit-button>
                                                 <x-submit-button wire:loading.remove wire:target="saveContactEmail">
                                                     Update
                                                 </x-submit-button>
                                             </form>
                                         </x-pop-modal>
                                         <button class="me-4" data-modal-toggle="addEmail">
                                             <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                                  xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                                 <path
                                                     d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                                 <path
                                                     d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                             </svg>
                                         </button>
                                         <x-input-label>
                                             Email
                                         </x-input-label>

                                     </div>
                                     <div class="ms-5 mt-1">
                                         {{$agency->contact_email}}
                                     </div>
                                 </div>
                                 <div>
                                     <div class="flex justify-start items-center">
                                         <x-pop-modal class="max-w-lg" name="addPhone" static="true" modal-title="Update Phone">
                                             <form class="space-y-4" wire:submit.prevent="saveContactPhone">
                                                 <div>
                                                     <x-input-label value="Phone"/>
                                                     <x-text-input wire:model.lazy="phone" class="w-full" type="tel"
                                                                   placeholder="area code + 7 digit"/>
                                                     <x-input-error :messages="$errors->get('phone')"/>
                                                 </div>
                                                 <x-submit-button wire:loading wire:target="saveContactPhone">
                                                     Processing...
                                                 </x-submit-button>
                                                 <x-submit-button wire:loading.remove wire:target="saveContactPhone">
                                                     Update
                                                 </x-submit-button>
                                             </form>
                                         </x-pop-modal>
                                         <button class="me-4" data-modal-toggle="addPhone">
                                             <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                                  xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                                 <path
                                                     d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                                 <path
                                                     d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                             </svg>
                                         </button>
                                         <x-input-label>
                                             Phone
                                         </x-input-label>

                                     </div>
                                     <div class="ms-5 mt-1">
                                         {{$agency->contact_phone}}
                                     </div>
                                 </div>
                                 <div>
                                     <div class="flex justify-start items-center">
                                         <x-pop-modal class="max-w-lg" name="addFax" static="true" modal-title="Update Fax">
                                             <form class="space-y-4" wire:submit.prevent="saveContactFax">
                                                 <div>
                                                     <x-input-label value="Fax"/>
                                                     <x-text-input wire:model.lazy="fax" class="w-full" type="number"
                                                                   placeholder="area code + 7 digit"/>
                                                     <x-input-error :messages="$errors->get('fax')"/>
                                                 </div>
                                                 <x-submit-button wire:loading wire:target="saveContactFax">
                                                     Processing...
                                                 </x-submit-button>
                                                 <x-submit-button wire:loading.remove wire:target="saveContactFax">
                                                     Update
                                                 </x-submit-button>
                                             </form>
                                         </x-pop-modal>
                                         <button class="me-4" data-modal-toggle="addFax">
                                             <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                                  xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                                 <path
                                                     d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                                 <path
                                                     d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                             </svg>
                                         </button>
                                         <x-input-label>
                                             Fax
                                         </x-input-label>

                                     </div>
                                     <div class="ms-5 mt-1">
                                         {{$agency->contact_fax}}
                                     </div>
                                 </div>
                                 <div>
                                     <div class="flex justify-start items-center">
                                         <x-pop-modal class="max-w-lg" name="addMobile" static="true"
                                                      modal-title="Update Mobile">
                                             <form class="space-y-4" wire:submit.prevent="saveContactMobile">
                                                 <div>
                                                     <x-input-label value="Mobile"/>
                                                     <x-text-input wire:model.lazy="mobile" class="w-full" type="number"
                                                                   placeholder="09*********"/>
                                                     <x-input-error :messages="$errors->get('mobile')"/>
                                                 </div>
                                                 <x-submit-button wire:loading wire:target="saveContactMobile">
                                                     Processing...
                                                 </x-submit-button>
                                                 <x-submit-button wire:loading.remove wire:target="saveContactMobile">
                                                     Update
                                                 </x-submit-button>
                                             </form>
                                         </x-pop-modal>
                                         <button class="me-4" data-modal-toggle="addMobile">
                                             <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                                  xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                                 <path
                                                     d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                                 <path
                                                     d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                             </svg>
                                         </button>
                                         <x-input-label>
                                             Mobile
                                         </x-input-label>

                                     </div>
                                     <div class="ms-5 mt-1">
                                         {{$agency->contact_mobile}}
                                     </div>
                                 </div>
                             </div>
                         </div>
                        -----------------------}}
                    </div>
                </x-card-panel>

                <x-card-panel title=" User Accounts">
                    <div class="mt-4">
                        <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-600">
                            @if($agency->profiles)
                                @forelse($agency->profiles->users as $user)
                                    <li class="py-3 sm:pb-4">
                                        <div class="flex items-center ">
                                            <a href="{{route("iptbm.admin.addrecord.editaccount",['id'=>$user->id])}}"
                                               class="hover:underline hover:text-sky-500">
                                                <div class="flex-1 min-w-0">
                                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                        {{$user->name}}
                                                    </p>
                                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                        {{$user->email}}
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                @empty
                                    No data available
                                @endforelse
                            @else
                                No Profile available
                            @endif

                        </ul>
                    </div>
                </x-card-panel>


            </div>
        </div>
        <livewire:iptbm.admin.agency.change-region :agency="$agency" />
    </div>




</div>

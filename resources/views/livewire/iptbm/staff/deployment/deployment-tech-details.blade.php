<div class="grid grid-cols-1 md:grid-cols-3 mt-4 gap-4">
    <div class="col-span-2">
        <x-card-panel>
            <div class="w-full my-3 px md:px-4 space-y-6">
                <div class="border border-gray-200 dark:border-gray-600 rounded p-2 flex justify-between items-center gap-2">
                    <div class="divide-y divide-gray-200 dark:divide-gray-600 w-full">
                        <div class="font-medium">
                            {{$adopterName}}
                        </div>
                        <div>
                            Name of Adopter
                        </div>
                    </div>
                    <div class="w-fit">
                        <x-pop-modal name="adopterNameUpdate" class="max-w-lg" static="true" modal-title="Update Name of Adopter">
                            <form class="space-y-6" wire:submit.prevent="saveAdopterName">
                                <div>
                                    <x-input-label value="Adopter Name"/>
                                    <x-text-input class="w-full" wire:model.lazy="adopterName" required placeholder="enter text here" />
                                    <x-input-error :messages="$errors->get('adopterName')"/>
                                    <x-alert-success :message="session('adopterName')"/>
                                </div>
                                <div>
                                    <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveAdopterName">
                                        <div class="w-full text-center p-2" wire:loading.remove wire:target="saveAdopterName">
                                            Submit
                                        </div>
                                        <div class="w-full text-center p-2" wire:loading wire:target="saveAdopterName">
                                            Processing...
                                        </div>
                                    </x-submit-button>
                                </div>

                            </form>
                        </x-pop-modal>
                        <x-secondary-button data-modal-toggle="adopterNameUpdate" data-modal-target="adopterNameUpdate" class="text-sky-500 dark:text-sky-500">
                            Update
                        </x-secondary-button>
                    </div>
                </div>
                <div class="border border-gray-200 dark:border-gray-600 rounded p-2 flex justify-between items-center gap-2">
                    <div class="divide-y divide-gray-200 dark:divide-gray-600 w-full">
                        <div class="font-medium">
                            {{$adopterAddress}}
                        </div>
                        <div>
                           Addopter Address
                        </div>
                    </div>
                    <div class="w-fit">
                        <x-pop-modal name="adopterAddressUpdate" class="max-w-lg" static="true" modal-title="Update Address">
                            <form class="space-y-6" wire:submit.prevent="saveAdopterAddress">
                                <div>
                                    <x-input-label value="Adopter Address"/>
                                    <x-text-input class="w-full" wire:model.lazy="adopterAddress" required placeholder="enter text here" />
                                    <x-input-error :messages="$errors->get('adopterAddress')"/>
                                    <x-alert-success :message="session('adopterAddress')"/>
                                </div>
                                <div>
                                    <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveAdopterAddress">
                                        <div class="w-full text-center p-2" wire:loading.remove wire:target="saveAdopterAddress">
                                            Submit
                                        </div>
                                        <div class="w-full text-center p-2" wire:loading wire:target="saveAdopterAddress">
                                            Processing...
                                        </div>
                                    </x-submit-button>
                                </div>

                            </form>
                        </x-pop-modal>
                        <x-secondary-button data-modal-toggle="adopterAddressUpdate" data-modal-target="adopterAddressUpdate" class="text-sky-500 dark:text-sky-500">
                            Update
                        </x-secondary-button>
                    </div>
                </div>


            </div>

        </x-card-panel>

    </div>
    <div>
        <x-card-panel title=" Contact Details">
           <div class="space-y-3">
               <div class="border rounded p-2 bordaer-gray-200 dark:border-gray-600">
                   <div class="flex justify-between ">
                       <h1 class=" font-semibold text-gray-500 dark:text-gray-400">
                           Mobile number:
                       </h1>
                       <x-pop-modal name="AddMobile" static="true" modal-title="Update Contact Details" class="max-w-md">
                           <form wire:submit.prevent="saveMobile">
                               <div class="mb-6">
                                   <label for="mobile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter
                                       new Mobile number</label>
                                   <input wire:model="mobileModel" type="number" id="mobile"
                                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                          placeholder="09xxx xxx xxx" required>
                                   <div wire:loading wire:target="mobileModel" class="mt-2 text-blue-500">
                                       Loading...
                                   </div>
                                   @error('mobileModel')
                                   <div id="alert-border-2"
                                        class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                                        role="alert">
                                       <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                           <path
                                               d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                       </svg>
                                       <div class="ml-3 text-sm font-medium">
                                           {{$message}}
                                       </div>
                                   </div>
                                   @enderror
                               </div>
                               <button type="submit"
                                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                   Save
                               </button>
                           </form>
                       </x-pop-modal>
                       <button data-modal-toggle="AddMobile"
                               class="text-blue-400 hover:text-blue-600 transition duration-300">
                           <span class="fa-solid fa-plus-square me-2"></span> Add Contact
                       </button>

                   </div>
                   <div class="divide-y divide-gray-200 dark:divide-gray-600">
                       @if($deploymentContact->where('type','mobile')->count() > 0)
                           @foreach($deploymentContact->where('type','mobile') as $contact)
                               <livewire:iptbm.staff.extension.delete-contact wire:key="mobile-{{$contact->id}}" :contact="$contact"/>
                           @endforeach
                       @endif
                   </div>


               </div>

               <div class="border rounded p-2 bordaer-gray-200 dark:border-gray-600">
                   <div class="flex justify-between ">
                       <h1 class=" font-semibold text-gray-500 dark:text-gray-400">
                           Phone number:
                       </h1>
                       <x-pop-modal name="AddPhone" static="true" modal-title="Update Contact Details" class="max-w-md">
                           <form wire:submit.prevent="savePhone">
                               <div class="mb-6">
                                   <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter
                                       new Phone number</label>
                                   <input wire:model.lazy="phoneModel" type="number" id="phone"
                                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                          placeholder="##/### #######" required>

                                   <x-input-error :messages="$errors->get('phoneModel')"/>
                               </div>
                               <button type="submit"
                                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                   Save
                               </button>
                           </form>
                       </x-pop-modal>
                       <button data-modal-toggle="AddPhone"
                               class="text-blue-400 hover:text-blue-600 transition duration-300">
                           <span class="fa-solid fa-plus-square me-2"></span> Add Contact
                       </button>

                   </div>
                   <div class="divide-y divide-gray-200 dark:divide-gray-600">
                       @if($deploymentContact->where('type','phone')->count() > 0)
                           @foreach($deploymentContact->where('type','phone') as $contact)
                               <livewire:iptbm.staff.extension.delete-contact wire:key="phone-{{$contact->id}}" :contact="$contact"/>
                           @endforeach
                       @endif
                   </div>


               </div>

               <div class="border rounded p-2 bordaer-gray-200 dark:border-gray-600">
                   <div class="flex justify-between ">
                       <h1 class=" font-semibold text-gray-500 dark:text-gray-400">
                           Fax number:
                       </h1>
                       <x-pop-modal name="AddFax" static="true" modal-title="Update Contact Details" class="max-w-md">
                           <form wire:submit.prevent="saveFax">
                               <div class="mb-6">
                                   <label for="fax" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter
                                       new Fax number</label>
                                   <input wire:model.lazy="faxModel" type="number" id="fax"
                                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                          placeholder="##/### #######" required>

                                   <x-input-error :messages="$errors->get('faxModel')"/>
                               </div>
                               <button type="submit"
                                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                   Save
                               </button>
                           </form>
                       </x-pop-modal>
                       <button data-modal-toggle="AddFax"
                               class="text-blue-400 hover:text-blue-600 transition duration-300">
                           <span class="fa-solid fa-plus-square me-2"></span> Add Contact
                       </button>

                   </div>
                   <div class="divide-y divide-gray-200 dark:divide-gray-600">
                       @if($deploymentContact->where('type','fax')->count() > 0)
                           @foreach($deploymentContact->where('type','fax') as $contact)
                               <livewire:iptbm.staff.extension.delete-contact wire:key="fax-{{$contact->id}}" :contact="$contact"/>
                           @endforeach
                       @endif
                   </div>


               </div>

               <div class="border rounded p-2 bordaer-gray-200 dark:border-gray-600">
                   <div class="flex justify-between ">
                       <h1 class=" font-semibold text-gray-500 dark:text-gray-400">
                           Email :
                       </h1>
                       <x-pop-modal name="AddEmail" static="true" modal-title="Update Contact Details" class="max-w-md">
                           <form wire:submit.prevent="saveEmail">
                               <div class="mb-6">
                                   <label for="fax" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter
                                       new Fax number</label>
                                   <input wire:model.lazy="emailModel" type="email" id="fax"
                                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                          placeholder=sample@email.com" required>

                                   <x-input-error :messages="$errors->get('emailModel')"/>
                               </div>
                               <button type="submit"
                                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                   Save
                               </button>
                           </form>
                       </x-pop-modal>
                       <button data-modal-toggle="AddEmail"
                               class="text-blue-400 hover:text-blue-600 transition duration-300">
                           <span class="fa-solid fa-plus-square me-2"></span> Add Contact
                       </button>

                   </div>
                   <div class="divide-y divide-gray-200 dark:divide-gray-600">
                       @if($deploymentContact->where('type','email')->count() > 0)
                           @foreach($deploymentContact->where('type','email') as $contact)
                               <livewire:iptbm.staff.extension.delete-contact wire:key="email-{{$contact->id}}" :contact="$contact"/>
                           @endforeach
                       @endif
                   </div>


               </div>
           </div>





        </x-card-panel>
    </div>

</div>

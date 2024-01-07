<div class="w-full mt-4">
    <div class="space-y-10">
        <div class="border rounded border-gray-200 dark:border-gray-600 p-2">
            <div class="flex justify-between items-center">
                <div class="flex">
                    <svg class="w-5 me-2 h-5 text-gray-600 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
                        <path
                            d="M12 0H2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM7.5 17.5h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2ZM12 13H2V4h10v9Z"/>
                    </svg>
                    Mobile
                </div>
                <x-pop-modal name="addMobile" class="max-w-md" modal-title="Add mobile number">
                    <form class="space-y-6" wire:submit.prevent="saveMobile">
                        <div class="space-y-4">
                            <div>
                                <x-input-label  value="Mobile number"/>
                                <x-text-input class="w-full"  wire:model.lazy="mobileModel" type="number"  placeholder="09## #### ###"/>
                                <x-input-error :messages="$errors->get('mobileModel')" />
                            </div>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveMobile">
                                <div class="w-full text-center p-2" wire:loading.remove wire:target="saveMobile">
                                    Submit
                                </div>
                                <div class="w-full text-center p-2" wire:loading wire:target="saveMobile">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </div>

                    </form>
                </x-pop-modal>
                <x-secondary-button class="gap-2 text-sky-500 dark:text-sky-500" data-modal-toggle="addMobile" data-modal-target="addMobile">
                    <svg class="w-4 h-4 " aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                              d="M9 1v16M1 9h16"/>
                    </svg>
                    Add
                </x-secondary-button>
            </div>
            <div class="mt-2 ps-4">
                <ul class="divide-y divide-gray-200 dark:divide-gray-600">
                    @foreach($mobiles as $mobile)
                        <li>
                            <livewire:iptbm.staff.adopter.contact wire:key="mobile-{{$mobile->id}}" :contact="$mobile"/>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
        <div class="border rounded border-gray-200 dark:border-gray-600 p-2">
            <div class="flex justify-between items-center">
                <div class="flex">
                    <svg class="w-5 h-5 me-2 text-gray-600 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M10 0A10.011 10.011 0 0 0 0 10v5a3 3 0 0 0 3 3h3a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1H3c-.326.004-.65.062-.957.171a8 8 0 0 1 15.914 0A2.954 2.954 0 0 0 17 9h-3a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h3a3 3 0 0 0 3-3v-5A10.011 10.011 0 0 0 10 0Z"/>
                    </svg>
                    Phone
                </div>
                <x-pop-modal name="addPhone" class="max-w-md" modal-title="Add Phone number">
                    <form class="space-y-6" wire:submit.prevent="savePhone">
                        <div class="space-y-4">
                            <div>
                                <x-input-label  value="Phone number"/>
                                <x-text-input class="w-full"  wire:model.lazy="phoneModel" type="number"  placeholder="##/### #######"/>
                                <x-input-error :messages="$errors->get('phoneModel')" />
                            </div>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="savePhone">
                                <div class="w-full text-center p-2" wire:loading.remove wire:target="savePhone">
                                    Submit
                                </div>
                                <div class="w-full text-center p-2" wire:loading wire:target="savePhone">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </div>

                    </form>
                </x-pop-modal>
                <x-secondary-button class="gap-2 text-sky-500 dark:text-sky-500" data-modal-toggle="addPhone" data-modal-target="addPhone">
                    <svg class="w-4 h-4" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                              d="M9 1v16M1 9h16"/>
                    </svg>
                    Add
                </x-secondary-button>
            </div>
            <div class="mt-2 ps-4">
                <ul class="divide-y divide-gray-200 dark:divide-gray-600">
                    @foreach($phones as $phone)
                        <li>
                            <livewire:iptbm.staff.adopter.contact wire:key="phone-{{$phone->id}}" :contact="$phone"/>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>

        <div class="border rounded border-gray-200 dark:border-gray-600 p-2">
            <div class="flex justify-between items-center">
                <div class="flex">
                    <svg class="w-5 h-5 me-2 text-gray-600 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M5 20h10a1 1 0 0 0 1-1v-5H4v5a1 1 0 0 0 1 1Z"/>
                        <path
                            d="M18 7H2a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2v-3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-1-2V2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3h14Z"/>
                    </svg>
                    Fax
                </div>
                <x-pop-modal name="addFax" class="max-w-md" modal-title="Add Fax number">
                    <form class="space-y-6" wire:submit.prevent="saveFax">
                        <div class="space-y-4">
                            <div>
                                <x-input-label  value="Fax number"/>
                                <x-text-input class="w-full"  wire:model.lazy="faxModel" type="number"  placeholder="##/### #######"/>
                                <x-input-error :messages="$errors->get('faxModel')" />
                            </div>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveFax">
                                <div class="w-full text-center p-2" wire:loading.remove wire:target="saveFax">
                                    Submit
                                </div>
                                <div class="w-full text-center p-2" wire:loading wire:target="saveFax">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </div>

                    </form>
                </x-pop-modal>
                <x-secondary-button class="gap-2 text-sky-500 dark:text-sky-500" data-modal-toggle="addFax" data-modal-target="addFax">
                    <svg class="w-4 h-4" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                              d="M9 1v16M1 9h16"/>
                    </svg>
                    Add
                </x-secondary-button>
            </div>
            <div class="mt-2 ps-4">
                <ul class="divide-y divide-gray-200 dark:divide-gray-600">
                    @foreach($faxs as $fax)
                        <li>
                            <livewire:iptbm.staff.adopter.contact wire:key="fax-{{$fax->id}}" :contact="$fax"/>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
        <div class="border rounded border-gray-200 dark:border-gray-600 p-2">
            <div class="flex justify-between items-center">
                <div class="flex">
                    <svg class="w-5 h-5 me-2 text-gray-600 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                    </svg>
                    Email
                </div>
                <x-pop-modal name="addEmail" class="max-w-md" modal-title="Add Fax number">
                    <form class="space-y-6" wire:submit.prevent="saveEmail">
                        <div class="space-y-4">
                            <div>
                                <x-input-label  value="Email Address"/>
                                <x-text-input class="w-full"  wire:model.lazy="emailModel" type="email"  placeholder="sample@email.com"/>
                                <x-input-error :messages="$errors->get('emailModel')" />
                            </div>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveEmail">
                                <div class="w-full text-center p-2" wire:loading.remove wire:target="saveEmail">
                                    Submit
                                </div>
                                <div class="w-full text-center p-2" wire:loading wire:target="saveEmail">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </div>

                    </form>
                </x-pop-modal>
                <x-secondary-button class="gap-2 text-sky-500 dark:text-sky-500" data-modal-toggle="addEmail" data-modal-target="addEmail">
                    <svg class="w-4 h-4" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                              d="M9 1v16M1 9h16"/>
                    </svg>
                    Add
                </x-secondary-button>
            </div>
            <div class="mt-2 ps-4">
                <ul class="divide-y divide-gray-200 dark:divide-gray-600">
                    @foreach($emails as $email)
                        <li>
                            <livewire:iptbm.staff.adopter.contact wire:key="fax-{{$email->id}}" :contact="$email"/>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>

    </div>
</div>

<div class="w-full mt-4">
    <div class="mb-4">
        <h1 class="text-gray-600 dark:text-gray-400 font-medium flex justify-between items-center">
            <div class="flex">
                <svg class="w-5 me-2 h-5 text-gray-600 dark:text-gray-400" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
                    <path
                        d="M12 0H2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM7.5 17.5h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2ZM12 13H2V4h10v9Z"/>
                </svg>
                Mobile
            </div>
            <button wire:click.prevent="toggleShowMobileForm">
                @if($showMobileForm)

                    <svg class="w-[17px] h-[17px] text-gray-600 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                @else
                    <svg class="w-[17px] h-[17px] text-gray-600 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                              d="M9 1v16M1 9h16"/>
                    </svg>
                @endif


            </button>
        </h1>
        <div class="text-blue-500 font-medium" wire:loading wire:target="toggleShowMobileForm">
            Loading...
        </div>
        @if($showMobileForm)
            <div class="mt-2 p-2 w-full rounded-lg bg-gray-200 dark:bg-gray-800 ">

                <form wire:submit.prevent="saveMobile">
                    <div class="mb-6">
                        <label for="mob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobile
                            number</label>
                        <input wire:model.lazy="mobileModel" type="number" id="mob"
                               class="bg-gray-50 border-l border-r border-t border-b border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="09xx xxx xxxx" required>
                        <div class="text-blue-500 font-medium" wire:loading wire:target="mobileModel">
                            Loading...
                        </div>
                        @error('mobileModel')
                        <div
                            class="flex items-center mt-2 p-4 mb-4 text-sm text-red-800 border-l border-r border-t border-b border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">{{$message}}!</span>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Save
                    </button>
                </form>


            </div>
        @endif
        <div class="mt-2 ps-4">
            <ul>
                @foreach($mobiles as $mobile)
                    <li>
                        <livewire:iptbm.staff.adopter.contact wire:key="mobile-{{$mobile->id}}" :contact="$mobile"/>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
    <div class="mb-4">
        <h1 class="text-gray-600 dark:text-gray-400 font-medium flex justify-between items-center">
            <div class="flex">
                <svg class="w-5 h-5 me-2 text-gray-600 dark:text-gray-400" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path
                        d="M10 0A10.011 10.011 0 0 0 0 10v5a3 3 0 0 0 3 3h3a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1H3c-.326.004-.65.062-.957.171a8 8 0 0 1 15.914 0A2.954 2.954 0 0 0 17 9h-3a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h3a3 3 0 0 0 3-3v-5A10.011 10.011 0 0 0 10 0Z"/>
                </svg>
                Phone
            </div>
            <button wire:click.prevent="toggleShowPhoneForm">
                @if($showPhoneForm)

                    <svg class="w-[17px] h-[17px] text-gray-600 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                @else
                    <svg class="w-[17px] h-[17px] text-gray-600 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                              d="M9 1v16M1 9h16"/>
                    </svg>
                @endif


            </button>
        </h1>
        <div class="text-blue-500 font-medium" wire:loading wire:target="toggleShowPhoneForm">
            Loading...
        </div>
        @if($showPhoneForm)
            <div class="mt-2 p-2 w-full rounded-lg bg-gray-200 dark:bg-gray-800 ">

                <form wire:submit.prevent="savePhone">
                    <div class="mb-6">
                        <label for="mob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                            number</label>
                        <input wire:model.lazy="phoneModel" type="number" id="mob"
                               class="bg-gray-50 border-l border-r border-t border-b border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="xxx/xxxx xxx xxxx" required>
                        <div class="text-blue-500 font-medium" wire:loading wire:target="phoneModel">
                            Loading...
                        </div>
                        @error('phoneModel')
                        <div
                            class="flex items-center mt-2 p-4 mb-4 text-sm text-red-800 border-l border-r border-t border-b border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">{{$message}}!</span>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Save
                    </button>
                </form>


            </div>
        @endif
        <div class="mt-2 ps-4">
            <ul>
                @foreach($phones as $phone)
                    <li>
                        <livewire:iptbm.staff.adopter.contact wire:key="phone-{{$phone->id}}" :contact="$phone"/>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
    <div class="mb-4">
        <h1 class="text-gray-600 dark:text-gray-400 font-medium flex justify-between items-center">
            <div class="flex">
                <svg class="w-5 h-5 me-2 text-gray-600 dark:text-gray-400" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M5 20h10a1 1 0 0 0 1-1v-5H4v5a1 1 0 0 0 1 1Z"/>
                    <path
                        d="M18 7H2a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2v-3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-1-2V2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3h14Z"/>
                </svg>
                Fax
            </div>
            <button wire:click.prevent="toggleShowFaxForm">
                @if($showFaxForm)

                    <svg class="w-[17px] h-[17px] text-gray-600 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                @else
                    <svg class="w-[17px] h-[17px] text-gray-600 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                              d="M9 1v16M1 9h16"/>
                    </svg>
                @endif


            </button>
        </h1>
        <div class="text-blue-500 font-medium" wire:loading wire:target="toggleShowPhoneForm">
            Loading...
        </div>
        @if($showFaxForm)
            <div class="mt-2 p-2 w-full rounded-lg bg-gray-200 dark:bg-gray-800 ">

                <form wire:submit.prevent="saveFax">
                    <div class="mb-6">
                        <label for="mob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fax
                            number</label>
                        <input wire:model.lazy="faxModel" type="number" id="mob"
                               class="bg-gray-50 border-l border-r border-t border-b border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="xxx/xxxx xxx xxxx" required>
                        <div class="text-blue-500 font-medium" wire:loading wire:target="faxModel">
                            Loading...
                        </div>
                        @error('faxModel')
                        <div
                            class="flex items-center mt-2 p-4 mb-4 text-sm text-red-800 border-l border-r border-t border-b border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">{{$message}}!</span>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Save
                    </button>
                </form>


            </div>
        @endif
        <div class="mt-2 ps-4">
            <ul>
                @foreach($faxs as $fax)
                    <li>
                        <livewire:iptbm.staff.adopter.contact wire:key="fax-{{$fax->id}}" :contact="$fax"/>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
    <div class="mb-4">
        <h1 class="text-gray-600 dark:text-gray-400 font-medium flex justify-between items-center">
            <div class="flex">

                <svg class="w-5 h-5 me-2 text-gray-600 dark:text-gray-400" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                </svg>
                Email
            </div>
            <button wire:click.prevent="toggleShowEmailForm">
                @if($showEmailForm)

                    <svg class="w-[17px] h-[17px] text-gray-600 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                @else
                    <svg class="w-[17px] h-[17px] text-gray-600 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                              d="M9 1v16M1 9h16"/>
                    </svg>
                @endif


            </button>
        </h1>
        <div class="text-blue-500 font-medium" wire:loading wire:target="toggleShowEmailForm">
            Loading...
        </div>
        @if($showEmailForm)
            <div class="mt-2 p-2 w-full rounded-lg bg-gray-200 dark:bg-gray-800 ">

                <form wire:submit.prevent="saveEmail">
                    <div class="mb-6">
                        <label for="mob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fax
                            number</label>
                        <input wire:model.lazy="emailModel" type="email" id="mob"
                               class="bg-gray-50 border-l border-r border-t border-b border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="sample@mail.com" required>
                        <div class="text-blue-500 font-medium" wire:loading wire:target="faxModel">
                            Loading...
                        </div>
                        @error('emailModel')
                        <div
                            class="flex items-center mt-2 p-4 mb-4 text-sm text-red-800 border-l border-r border-t border-b border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">{{$message}}!</span>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Save
                    </button>
                </form>


            </div>
        @endif
        <div class="mt-2 ps-4">
            <ul>
                @foreach($emails as $email)
                    <li>
                        <livewire:iptbm.staff.adopter.contact wire:key="fax-{{$email->id}}" :contact="$email"/>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>

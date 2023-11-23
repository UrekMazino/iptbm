<div>
    <div class="my-3">

        <div class=" text-gray-700 dark:text-gray-400">
            <span class="fa-solid fa-mobile-retro me-2"></span> Mobile
            <button wire:click.prevent="showMobileForm"
                    class="ms-4 text-blue-500 hover:scale-125 transition duration-300">
                @if($showMobileForm)
                    <span class="fa-solid fa-minus-circle"></span> Close
                @else
                    <span class="fa-solid fa-plus-circle"></span> Add
                @endif

            </button>
        </div>
        @if($showMobileForm)
            <div class="w-full
            border-l
            border-r
            border-t
            border-b
            rounded-lg
            border-gray-700
            border-opacity-50
            dark:border-gray-400
            dark:border-opacity-50
            mb-2
            p-2">
                <h1 class="text-base text-gray-5-700 dark:text-gray-400">New Mobile number</h1>
                <form wire:ignore.self wire:submit.prevent="saveMobile">
                    <input wire:model.lazy="mobileInput" type="number"
                           class="bg-gray-50 border-l border-r border-t border-b border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="09xxxxxxxxx" required>
                    <div class="text-blue-500 font-medium" wire:loading wire:target="mobileInput">
                        Loading...
                    </div>
                    @error('mobileInput')
                    <x-input-error :messages="$message" class="mt-2"/>
                    @enderror

                    <div class="grid grid-cols-2 text-center mt-2">
                        <div>
                            <button wire:click.prevent="showMobileForm"
                                    class="text-red-700
                                    hover:text-red-500
                                    hover:scale-125
                                    transition
                                    font-bold
                                    duration-300
                                    ">
                                Cancel
                            </button>
                        </div>
                        <div>
                            <button class="text-blue-700
                                    hover:text-blue-500
                                    hover:scale-125
                                    transition
                                    font-bold
                                    duration-300">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
        @if($mobile->count()>0)
            <div class="indent-5">
                <div class="mt-2">
                    @foreach($mobile as $key=> $contact)
                        <div id="popup-modal{{$key}}-mobile" tabindex="-1"
                             class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="popup-modal{{$key}}-mobile">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-6 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                             aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you
                                            sure you want to delete "<span
                                                class="font-bold">{{$contact->contact}}</span>"?</h3>
                                        <button data-modal-hide="popup-modal{{$key}}-mobile" type="submit"
                                                wire:click="deleteMobile({{$contact->id}})"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            Yes, I'm sure
                                        </button>
                                        <button data-modal-hide="popup-modal{{$key}}-mobile" type="button"
                                                class="text-gray-500 bg-gray-50` hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            No, cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-gray-700 dark:text-gray-300">

                            <button data-modal-target="popup-modal{{$key}}-mobile"
                                    data-modal-toggle="popup-modal{{$key}}-mobile" class="me-2 text-red " type="button">
                                <span class="fa-solid fa-trash text-red-500"></span>
                            </button>
                            {{$contact->contact}}
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
    <div class="my-3">

        <div class="font-bold text-gray-700 dark:text-gray-400">
            <span class="fa-solid fa-phone-square me-2"></span> Phone
            <button wire:click.prevent="showPhoneForm"
                    class="ms-4 text-blue-500 hover:scale-125 transition duration-300">
                @if($showPhoneForm)
                    <span class="fa-solid fa-minus-circle"></span> Close
                @else
                    <span class="fa-solid fa-plus-circle"></span> Add
                @endif
            </button>
        </div>
        @if($showPhoneForm)
            <div class="w-full
            border-l
            border-r
            border-t
            border-b
            rounded-lg
            border-gray-700
            border-opacity-50
            dark:border-gray-400
            dark:border-opacity-50
            mb-2
            p-2">
                <h1 class="text-base text-gray-5-700 dark:text-gray-400">New Phone number</h1>
                <form wire:ignore.self wire:submit.prevent="savePhone">
                    <input wire:model="phoneInput" type="number"
                           class="bg-gray-50 border-l border-r border-t border-b border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="******" required>
                    <div class="text-blue-500 font-medium" wire:loading wire:target="phoneInput">
                        Loading...
                    </div>
                    @error('phoneInput')
                    <x-input-error :messages="$message" class="mt-2"/>
                    @enderror

                    <div class="grid grid-cols-2 text-center mt-2">
                        <div>
                            <button wire:click.prevent="showPhoneForm"
                                    class="text-red-700
                                    hover:text-red-500
                                    hover:scale-125
                                    transition
                                    font-bold
                                    duration-300
                                    ">
                                Cancel
                            </button>
                        </div>
                        <div>
                            <button class="text-blue-700
                                    hover:text-blue-500
                                    hover:scale-125
                                    transition
                                    font-bold
                                    duration-300">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
        @if($phone->count()>0)
            <div class="indent-5">
                <ul class="mt-2">
                    @foreach($phone as $key=> $contact)
                        <li class="text-gray-700 dark:text-gray-300">
                            <div id="popup-modal{{$key}}-phone" tabindex="-1"
                                 class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="popup-modal{{$key}}-phone">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                 fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"
                                                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                 viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"
                                                      d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                                                you sure you want to delete "<span
                                                    class="font-bold">{{$contact->contact}}</span>"?</h3>
                                            <button wire:model="mobile" wire:click="deletePhone({{$contact->id}})"
                                                    data-modal-hide="popup-modal{{$key}}-phone" type="button"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="popup-modal{{$key}}-phone" type="button"
                                                    class="text-gray-500 bg-gray-50` hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                No, cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button data-modal-target="popup-modal{{$key}}-phone"
                                    data-modal-toggle="popup-modal{{$key}}-phone" class="me-2 text-red " type="button">
                                <span class="fa-solid fa-trash text-red-500"></span>
                            </button>
                            {{$contact->contact}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="my-3">

        <div class="font-bold text-gray-700 dark:text-gray-400">
            <span class="fa-solid fa-fax me-2"></span> Fax
            <button wire:click.prevent="showFaxForm" class="ms-4 text-blue-500 hover:scale-125 transition duration-300">
                @if($showFaxForm)
                    <span class="fa-solid fa-minus-circle"></span> Close
                @else
                    <span class="fa-solid fa-plus-circle"></span> Add
                @endif
            </button>
        </div>
        @if($showFaxForm)
            <div class="w-full
            border-l
            border-r
            border-t
            border-b
            rounded-lg
            border-gray-700
            border-opacity-50
            dark:border-gray-400
            dark:border-opacity-50
            mb-2
            p-2">
                <h1 class="text-base text-gray-5-700 dark:text-gray-400">New Fax number</h1>
                <form wire:ignore.self wire:submit.prevent="saveFax">
                    <input wire:model="faxInput" type="number"
                           class="bg-gray-50 border-l border-r border-t border-b border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="******" required>
                    <div class="text-blue-500 font-medium" wire:loading wire:target="faxInput">
                        Loading...
                    </div>
                    @error('faxInput')
                    <x-input-error :messages="$message" class="mt-2"/>
                    @enderror
                    <div class="grid grid-cols-2 text-center mt-2">
                        <div>
                            <button wire:click.prevent="showFaxForm"
                                    class="text-red-700
                                    hover:text-red-500
                                    hover:scale-125
                                    transition
                                    font-bold
                                    duration-300
                                    ">
                                Cancel
                            </button>
                        </div>
                        <div>
                            <button class="text-blue-700
                                    hover:text-blue-500
                                    hover:scale-125
                                    transition
                                    font-bold
                                    duration-300">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
        @if($fax->count()>0)
            <div class="indent-5">
                <ul class="mt-2">
                    @foreach($fax as $key=> $contact)
                        <li class="text-gray-700 dark:text-gray-300">
                            <div id="popup-modal{{$key}}-fax" tabindex="-1"
                                 class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="popup-modal{{$key}}-fax">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                 fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"
                                                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                 viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"
                                                      d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                                                you sure you want to delete "<span
                                                    class="font-bold">{{$contact->contact}}</span>"?</h3>
                                            <button wire:model="mobile" wire:click="deleteFax({{$contact->id}})"
                                                    data-modal-hide="popup-modal{{$key}}-fax" type="button"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="popup-modal{{$key}}-fax" type="button"
                                                    class="text-gray-500 bg-gray-50` hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                No, cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button data-modal-target="popup-modal{{$key}}-fax"
                                    data-modal-toggle="popup-modal{{$key}}-fax" class="me-2 text-red " type="button">
                                <span class="fa-solid fa-trash text-red-500"></span>
                            </button>
                            {{$contact->contact}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="my-3">

        <div class="font-bold text-gray-700 dark:text-gray-400">
            <span class="fa-solid fa-at me-2"></span> Email
            <button wire:click.prevent="showEmailForm"
                    class="ms-4 text-blue-500 hover:scale-125 transition duration-300">
                @if($showEmailForm)
                    <span class="fa-solid fa-minus-circle"></span> Close
                @else
                    <span class="fa-solid fa-plus-circle"></span> Add
                @endif
            </button>
        </div>
        @if($showEmailForm)
            <div class="w-full
            border-l
            border-r
            border-t
            border-b
            rounded-lg
            border-gray-700
            border-opacity-50
            dark:border-gray-400
            dark:border-opacity-50
            mb-2
            p-2">
                <h1 class="text-base text-gray-5-700 dark:text-gray-400">New Email Address</h1>
                <form wire:ignore.self wire:submit.prevent="saveEmail">
                    <input wire:model="emailInput" type="email"
                           class="bg-gray-50 border-l border-r border-t border-b border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="sample@mail.com" required>
                    <div class="text-blue-500 font-medium" wire:loading wire:target="emailInput">
                        Loading...
                    </div>
                    @error('emailInput')
                    <x-input-error :messages="$message" class="mt-2"/>
                    @enderror
                    <div class="grid grid-cols-2 text-center mt-2">
                        <div>
                            <button wire:click.prevent="showEmailForm"
                                    class="text-red-700
                                    hover:text-red-500
                                    hover:scale-125
                                    transition
                                    font-bold
                                    duration-300
                                    ">
                                Cancel
                            </button>
                        </div>
                        <div>
                            <button class="text-blue-700
                                    hover:text-blue-500
                                    hover:scale-125
                                    transition
                                    font-bold
                                    duration-300">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
        @if($email->count()>0)
            <div class="indent-5">
                <ul class="mt-2">
                    @foreach($email as $key=> $contact)
                        <li class="text-gray-700 dark:text-gray-300">
                            <div id="popup-modal{{$key}}-email" tabindex="-1"
                                 class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="popup-modal{{$key}}-email">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                 fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"
                                                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                 viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"
                                                      d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                                                you sure you want to delete "<span
                                                    class="font-bold">{{$contact->contact}}</span>"?</h3>
                                            <button wire:model="mobile" wire:click="deleteEmail({{$contact->id}})"
                                                    data-modal-hide="popup-modal{{$key}}-email" type="button"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="popup-modal{{$key}}-email" type="button"
                                                    class="text-gray-500 bg-gray-50` hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                No, cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button data-modal-target="popup-modal{{$key}}-email"
                                    data-modal-toggle="popup-modal{{$key}}-email" class="me-2 text-red " type="button">
                                <span class="fa-solid fa-trash text-red-500"></span>
                            </button>
                            {{$contact->contact}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>

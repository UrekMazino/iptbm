<x-card-panel title="Contact Details">
    <div>
        <div class=" flex text-gray-700 dark:text-gray-400">
            <div>
                <span class="fa-solid fa-mobile-retro"></span> Mobile
            </div>
            <div>
                @if(!$showMobileInput)
                    <button wire:click.prevent="showMobileInput"
                            class="text-blue-500 transition duration-300 ms-4 hover:scale-125">
                        <span class="fa-solid fa-plus-square me-2"></span>Add
                    </button>
                @else
                    <button wire:click.prevent="showMobileInput"
                            class="text-red-500 transition duration-300 ms-4 hover:scale-125">
                        <span class="fa-solid fa-minus-square me-2"></span> Close
                    </button>
                @endif

            </div>
        </div>
        <div wire:loading class="text-blue-500" wire:target="showMobileInput">
            Loading...
        </div>
        @if($showMobileInput)
            <div wire:loading.remove wire:target="showMobileInput">
                <div
                    class="mb-2 w-full rounded-lg border-t border-r border-b border-l border-gray-500 bg-gray-400 p-3 dark:bg-gray-800">

                    <form wire:submit.prevent="saveMobile">
                        <div class="mb-6">
                            <label for="number"
                                   class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Mobile
                                number</label>
                            <input wire:model="mobile" type="number" id="number"
                                   class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 p-2.5 focus:border-blue-500 focus:ring-blue-500 dark:placeholder-gray-400 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                   placeholder="09xxxxxxxx" required>
                            <div wire:loading wire:target="mobile" class="text-blue-500">
                                Loading...
                            </div>
                            @error('mobile')
                            <div id="alert-border-2"
                                 class="mt-2 mb-4 flex items-center rounded-lg border-t border-r border-b border-l border-red-300 bg-red-50 p-4 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                                 role="alert">
                                <svg class="h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 20 20">
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
                                class="w-full rounded-lg bg-blue-700 px-5 text-center text-sm font-medium text-white py-2.5 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 sm:w-auto dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Save
                        </button>
                    </form>

                </div>
            </div>
        @endif
        @if($contacts->where('type','mobile') ->count()>0)
            <div class="my-2 text-base">
                <ul>

                    @foreach($contacts->where('type','mobile') as $contact)
                        <li class="text-gray-700 indent-2.5 dark:text-gray-300">
                            <div
                                class="flex justify-between items-center hover:bg-gray-400 dark:hover:bg-gray-800 transition duration-300">
                                <div>
                                    {{$contact->contact}}
                                </div>
                                <button class="me-2 " wire:click.prevent="deleteContact({{$contact->id}})">
                                    <span class="fa-solid fa-trash-can text-red-500 hover:text-red-800"></span>
                                </button>
                            </div>

                        </li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="mt-4 flex text-gray-700 dark:text-gray-400">
            <div>
                <span class="fa-solid fa-phone-square"></span> Phone
            </div>
            <div>
                @if(!$showPhoneInput)
                    <button wire:click.prevent="showPhoneInput"
                            class="text-blue-500 transition duration-300 ms-4 hover:scale-125">
                        <span class="fa-solid fa-plus-square me-2"></span>Add
                    </button>
                @else
                    <button wire:click.prevent="showPhoneInput"
                            class="text-red-500 transition duration-300 ms-4 hover:scale-125">
                        <span class="fa-solid fa-minus-square me-2"></span> Close
                    </button>
                @endif


            </div>
        </div>
        <div wire:loading class="text-blue-500" wire:target="showPhoneInput">
            Loading...
        </div>
        @if($showPhoneInput)
            <div wire:loading.remove wire:target="showMobileInput">
                <div
                    class="mb-2 w-full rounded-lg border-t border-r border-b border-l border-gray-500 bg-gray-400 p-3 dark:bg-gray-800">

                    <form wire:submit.prevent="savePhone">
                        <div class="mb-6">
                            <label for="phone"
                                   class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Phone
                                number</label>
                            <input wire:model="phone" type="number" id="phone"
                                   class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 p-2.5 focus:border-blue-500 focus:ring-blue-500 dark:placeholder-gray-400 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                   placeholder="(xx/xxx) xxx xxxx" required>
                            <div wire:loading wire:target="phone" class="text-blue-500">
                                Loading...
                            </div>
                            @error('phone')
                            <div id="alert-border-2"
                                 class="mt-2 mb-4 flex items-center rounded-lg border-t border-r border-b border-l border-red-300 bg-red-50 p-4 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                                 role="alert">
                                <svg class="h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 20 20">
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
                                class="w-full rounded-lg bg-blue-700 px-5 text-center text-sm font-medium text-white py-2.5 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 sm:w-auto dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Save
                        </button>
                    </form>

                </div>
            </div>
        @endif
        @if($contacts->where('type','phone') ->count()>0)
            <div class="my-2 text-base">
                <ul>

                    @foreach($contacts->where('type','phone') as $contact)
                        <li class="text-gray-700 indent-2.5 dark:text-gray-300">
                            <div
                                class="flex justify-between items-center hover:bg-gray-400 dark:hover:bg-gray-800 transition duration-300">
                                <div>
                                    {{$contact->contact}}
                                </div>
                                <button class="me-2 " wire:click.prevent="deleteContact({{$contact->id}})">
                                    <span class="fa-solid fa-trash-can text-red-500 hover:text-red-800"></span>
                                </button>
                            </div>

                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mt-4 flex text-gray-700 dark:text-gray-400">
            <div>
                <span class="fa-solid fa-phone-square"></span> Fax
            </div>
            @if(!$showFaxInput)
                <button wire:click.prevent="showFaxInput"
                        class="text-blue-500 transition duration-300 ms-4 hover:scale-125">
                    <span class="fa-solid fa-plus-square me-2"></span>Add
                </button>
            @else
                <button wire:click.prevent="showFaxInput"
                        class="text-red-500 transition duration-300 ms-4 hover:scale-125">
                    <span class="fa-solid fa-minus-square me-2"></span> Close
                </button>
            @endif
        </div>
        <div wire:loading class="text-blue-500" wire:target="showFaxInput">
            Loading...
        </div>

        @if($showFaxInput)
            <div wire:loading.remove wire:target="showFaxInput">
                <div
                    class="mb-2 w-full rounded-lg border-t border-r border-b border-l border-gray-500 bg-gray-400 p-3 dark:bg-gray-800">

                    <form wire:submit.prevent="saveFax">
                        <div class="mb-6">
                            <label for="fax"
                                   class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Fax
                                number</label>
                            <input wire:model="fax" type="number" id="fax"
                                   class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 p-2.5 focus:border-blue-500 focus:ring-blue-500 dark:placeholder-gray-400 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                   placeholder="(xx/xxx) xxx xxxx" required>
                            <div wire:loading wire:target="fax" class="text-blue-500">
                                Loading...
                            </div>
                            @error('fax')
                            <div id="alert-border-2"
                                 class="mt-2 mb-4 flex items-center rounded-lg border-t border-r border-b border-l border-red-300 bg-red-50 p-4 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                                 role="alert">
                                <svg class="h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 20 20">
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
                                class="w-full rounded-lg bg-blue-700 px-5 text-center text-sm font-medium text-white py-2.5 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 sm:w-auto dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Save
                        </button>
                    </form>

                </div>
            </div>
        @endif
        @if($contacts->where('type','fax') ->count()>0)
            <div class="my-2 text-base">
                <ul>
                    @foreach($contacts->where('type','fax') as $contact)
                        <li class="text-gray-700 indent-2.5 dark:text-gray-300">
                            <div
                                class="flex justify-between items-center hover:bg-gray-400 dark:hover:bg-gray-800 transition duration-300">
                                <div>
                                    {{$contact->contact}}
                                </div>
                                <button class="me-2 " wire:click.prevent="deleteContact({{$contact->id}})">
                                    <span class="fa-solid fa-trash-can text-red-500 hover:text-red-800"></span>
                                </button>
                            </div>

                        </li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="mt-4 flex text-gray-700 dark:text-gray-400">
            <div>
                <span class="fa-solid fa-at"></span> Email
            </div>
            @if(!$showMailInput)
                <button wire:click.prevent="showMailInput"
                        class="text-blue-500 transition duration-300 ms-4 hover:scale-125">
                    <span class="fa-solid fa-plus-square me-2"></span>Add
                </button>
            @else
                <button wire:click.prevent="showMailInput"
                        class="text-red-500 transition duration-300 ms-4 hover:scale-125">
                    <span class="fa-solid fa-minus-square me-2"></span> Close
                </button>
            @endif
        </div>
        <div wire:loading class="text-blue-500" wire:target="showMailInput">
            Loading...
        </div>

        @if($showMailInput)
            <div wire:loading.remove wire:target="showMailInput">
                <div
                    class="mb-2 w-full rounded-lg border-t border-r border-b border-l border-gray-500 bg-gray-400 p-3 dark:bg-gray-800">

                    <form wire:submit.prevent="saveMail">
                        <div class="mb-6">
                            <label for="email"
                                   class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Email
                                Address</label>
                            <input wire:model="email" type="email" id="email"
                                   class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 p-2.5 focus:border-blue-500 focus:ring-blue-500 dark:placeholder-gray-400 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                   placeholder="sample@mail.com" required>
                            <div wire:loading wire:target="email" class="text-blue-500">
                                Loading...
                            </div>
                            @error('email')
                            <div id="alert-border-2"
                                 class="mt-2 mb-4 flex items-center rounded-lg border-t border-r border-b border-l border-red-300 bg-red-50 p-4 text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                                 role="alert">
                                <svg class="h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 20 20">
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
                                class="w-full rounded-lg bg-blue-700 px-5 text-center text-sm font-medium text-white py-2.5 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 sm:w-auto dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Save
                        </button>
                    </form>

                </div>
            </div>
        @endif
        @if($contacts->where('type','email') ->count()>0)
            <div class="my-2 text-base">
                <ul>

                    @foreach($contacts->where('type','email') as $contact)
                        <li class="text-gray-700 indent-2.5 dark:text-gray-300">
                            <div
                                class="flex justify-between items-center hover:bg-gray-400 dark:hover:bg-gray-800 transition duration-300">
                                <div>
                                    {{$contact->contact}}
                                </div>
                                <button class="me-2 " wire:click.prevent="deleteContact({{$contact->id}})">
                                    <span class="fa-solid fa-trash-can text-red-500 hover:text-red-800"></span>
                                </button>
                            </div>

                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</x-card-panel>

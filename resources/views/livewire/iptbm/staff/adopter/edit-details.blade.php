
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-5">
    <div class="col-span-2">
        <x-card class="shadow-lg">
            <div>
                <div wire:loading wire:target="toggleShowCompName" class="font-medium text-blue-500">
                    Loading...
                </div>
                @if($showCompName)
                    <div class="rounded-lg p-2 bg-gray-300 dark:bg-gray-800">
                        <div class="justify-between flex items-center">
                            <h1 class="text-gray-600 dark:text-gray-400 font-medium">
                                Company Name
                            </h1>
                            <button wire:click.prevent="toggleShowCompName">
                                <svg class="w-[15px] h-[15px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3">
                            <form wire:submit.prevent="saveCompName">
                                <div class="mb-6">
                                    <input wire:model.lazy="compName" type="text" id="compName" class="bg-gray-50 border-l border-r border-t border-b border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="enter text here" required>
                                    <div wire:loading wire:target="compName" class="font-medium text-blue-500">
                                        Loading...
                                    </div>
                                    @if(session()->has('saveComp'))
                                        <div class="flex items-center mt-2 p-4 mb-4 text-sm text-green-800 border-l border-r border-t border-b border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <div>
                                                <span class="font-medium">{{session('saveComp')}}</span>
                                            </div>
                                        </div>

                                    @endif
                                    @error('compName')
                                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border-r mt-2 border-l border-t border-b border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div>
                                            <span class="font-medium">{{$message}}</span>
                                        </div>
                                    </div>
                                    @enderror
                                </div>
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="justify-between items-center flex mb-4">
                        <div class="w-full">
                            <div class="border-b border-gray-200 dark:border-gray-600 text-gray-700 dark:text-gray-200">
                                {{$compName}}
                            </div>
                            <div class="font-medium text-sm text-gray-500 dark:text-gray-400">
                                Name Of Company
                            </div>
                        </div>
                        <button wire:click.prevent="toggleShowCompName">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                            </svg>
                        </button>
                    </div>
                @endif
            </div>
            <div class="mt-3">
                <div wire:loading wire:target="toggleShowCompAddress" class="font-medium text-blue-500">
                    Loading...
                </div>
                @if($showCmpAddress)
                    <div class="rounded-lg p-2 bg-gray-300 dark:bg-gray-800">
                        <div class="justify-between flex items-center">
                            <h1 class="text-gray-600 dark:text-gray-400 font-medium">
                                Company Address
                            </h1>
                            <button wire:click.prevent="toggleShowCompAddress">
                                <svg class="w-[15px] h-[15px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3">
                            <form wire:submit.prevent="saveCompAddress">
                                <div class="mb-6">
                                    <input wire:model.lazy="compAddress" type="text" id="compName" class="bg-gray-50 border-l border-r border-t border-b border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="enter text here" required>
                                    <div wire:loading wire:target="compAddress" class="font-medium text-blue-500">
                                        Loading...
                                    </div>
                                    @if(session()->has('saveCompAddress'))
                                        <div class="flex items-center mt-2 p-4 mb-4 text-sm text-green-800 border-l border-r border-t border-b border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <div>
                                                <span class="font-medium">{{session('saveCompAddress')}}</span>
                                            </div>
                                        </div>

                                    @endif
                                    @error('compAddress')
                                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border-r mt-2 border-l border-t border-b border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div>
                                            <span class="font-medium">{{$message}}</span>
                                        </div>
                                    </div>
                                    @enderror
                                </div>
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="justify-between items-center flex mb-4">
                        <div class="w-full">
                            <div class="border-b border-gray-200 dark:border-gray-600 text-gray-700 dark:text-gray-200">
                                {{$compAddress}}
                            </div>
                            <div class="font-medium text-sm text-gray-500 dark:text-gray-400">
                                Company Address
                            </div>
                        </div>
                        <button wire:click.prevent="toggleShowCompAddress">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                            </svg>
                        </button>
                    </div>
                @endif
            </div>
            <div class="mt-3">
                <div wire:loading wire:target="toggleShowBusinessStructure" class="font-medium text-blue-500">
                    Loading...
                </div>
                @if($showBusinessStructure)
                    <div class="rounded-lg p-2 bg-gray-300 dark:bg-gray-800">
                        <div class="justify-between flex items-center">
                            <h1 class="text-gray-600 dark:text-gray-400 font-medium">
                                Business Structure
                            </h1>
                            <button wire:click.prevent="toggleShowBusinessStructure">
                                <svg class="w-[15px] h-[15px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3">
                            <form wire:submit.prevent="saveBusinessStructure">
                                <div class="mb-6">
                                    <select wire:model="businessStructure" id="countries" class="bg-gray-50 border-l border-r border-t border-b border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" disabled selected>
                                            - - Select Business Structure - -
                                        </option>
                                        <option value="Sole Proprietorship">
                                            Sole Proprietorship
                                        </option>
                                        <option value="Corporation">
                                            Corporation
                                        </option>
                                        <option value="Partnership">
                                            Partnership
                                        </option>
                                        <option value="Coop">
                                            Coop
                                        </option>
                                    </select>

                                    <div wire:loading wire:target="businessStructure" class="font-medium text-blue-500">
                                        Loading...
                                    </div>
                                    @if(session()->has('saveBbusinessStructure'))
                                        <div class="flex items-center mt-2 p-4 mb-4 text-sm text-green-800 border-l border-r border-t border-b border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <div>
                                                <span class="font-medium">{{session('saveBbusinessStructure')}}</span>
                                            </div>
                                        </div>

                                    @endif
                                    @error('businessStructure')
                                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border-r mt-2 border-l border-t border-b border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div>
                                            <span class="font-medium">{{$message}}</span>
                                        </div>
                                    </div>
                                    @enderror
                                </div>
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="justify-between items-center flex mb-4">
                        <div class="w-full">
                            <div class="border-b border-gray-200 dark:border-gray-600 text-gray-700 dark:text-gray-200">
                                {{$businessStructure}}
                            </div>
                            <div class="font-medium text-sm text-gray-500 dark:text-gray-400">
                                Business Structure
                            </div>
                        </div>
                        <button wire:click.prevent="toggleShowBusinessStructure">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                            </svg>
                        </button>
                    </div>
                @endif
            </div>
            <div class="mt-3">
                <div wire:loading wire:target="toggleShowBusinessRegistration" class="font-medium text-blue-500">
                    Loading...
                </div>
                @if($showBusinessRegistration)
                    <div class="rounded-lg p-2 bg-gray-300 dark:bg-gray-800">
                        <div class="justify-between flex items-center">
                            <h1 class="text-gray-600 dark:text-gray-400 font-medium">
                                Business Registration
                            </h1>
                            <button wire:click.prevent="toggleShowBusinessRegistration">
                                <svg class="w-[15px] h-[15px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3">
                            <form wire:submit.prevent="saveBusinessRegistration">
                                <div class="mb-6">
                                    <select wire:model="businessRegistration" id="countries" class="bg-gray-50 border-l border-r border-t border-b border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" disabled selected>
                                            - - Select Business Registration - -
                                        </option>
                                        <option>
                                            Not yet registered
                                        </option>
                                        <option>
                                            SEC-registered
                                        </option>
                                        <option>
                                            DTI-registered
                                        </option>
                                    </select>

                                    <div wire:loading wire:target="businessRegistration" class="font-medium text-blue-500">
                                        Loading...
                                    </div>
                                    @if(session()->has('saveBusinessRegistration'))
                                        <div class="flex items-center mt-2 p-4 mb-4 text-sm text-green-800 border-l border-r border-t border-b border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <div>
                                                <span class="font-medium">{{session('saveBusinessRegistration')}}</span>
                                            </div>
                                        </div>

                                    @endif
                                    @error('businessRegistration')
                                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border-r mt-2 border-l border-t border-b border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div>
                                            <span class="font-medium">{{$message}}</span>
                                        </div>
                                    </div>
                                    @enderror
                                </div>
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="justify-between items-center flex mb-4">
                        <div class="w-full">
                            <div class="border-b border-gray-200 dark:border-gray-600 text-gray-700 dark:text-gray-200">
                                {{$businessRegistration}}
                            </div>
                            <div class="font-medium text-sm text-gray-500 dark:text-gray-400">
                                Business Registration
                            </div>
                        </div>
                        <button wire:click.prevent="toggleShowBusinessRegistration">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                            </svg>
                        </button>
                    </div>
                @endif
            </div>
            <div class="mt-3">
                <div wire:loading wire:target="toggleShowTechAcquisition" class="font-medium text-blue-500">
                    Loading...
                </div>
                @if($showTechAcquisition)
                    <div class="rounded-lg p-2 bg-gray-300 dark:bg-gray-800">
                        <div class="justify-between flex items-center">
                            <h1 class="text-gray-600 dark:text-gray-400 font-medium">
                                Mode of Technology Acquisition
                            </h1>
                            <button wire:click.prevent="toggleShowTechAcquisition">
                                <svg class="w-[15px] h-[15px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3">
                            <form wire:submit.prevent="saveTechAcquisition">
                                <div class="mb-6">
                                    <select wire:model="techAcquisition" id="countries" class="bg-gray-50 border-l border-r border-t border-b border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" disabled selected>
                                            - - Select Mode of Technology Acquisition - -
                                        </option>
                                        <option>
                                            LIcensing
                                        </option>
                                        <option>
                                            Joint Venture
                                        </option>
                                        <option>
                                            Partnership
                                        </option>
                                        <option>
                                            Outright Sale
                                        </option>
                                        <option>
                                            Distributorship
                                        </option>
                                    </select>

                                    <div wire:loading wire:target="techAcquisition" class="font-medium text-blue-500">
                                        Loading...
                                    </div>
                                    @if(session()->has('saveTechAcquisition'))
                                        <div class="flex items-center mt-2 p-4 mb-4 text-sm text-green-800 border-l border-r border-t border-b border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <div>
                                                <span class="font-medium">{{session('saveTechAcquisition')}}</span>
                                            </div>
                                        </div>

                                    @endif
                                    @error('techAcquisition')
                                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border-r mt-2 border-l border-t border-b border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div>
                                            <span class="font-medium">{{$message}}</span>
                                        </div>
                                    </div>
                                    @enderror
                                </div>
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="justify-between items-center flex mb-4">
                        <div class="w-full">
                            <div class="border-b border-gray-200 dark:border-gray-600 text-gray-700 dark:text-gray-200">
                                {{$techAcquisition}}
                            </div>
                            <div class="font-medium text-sm text-gray-500 dark:text-gray-400">
                                Mode of Technology Acquisition
                            </div>
                        </div>
                        <button wire:click.prevent="toggleShowTechAcquisition">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                            </svg>
                        </button>
                    </div>
                @endif
            </div>
            <div class="mt-3">
                <div wire:loading wire:target="toggleShowCommercialForIncubation" class="font-medium text-blue-500">
                    Loading...
                </div>
                @if($showCommercialForIncubation)
                    <div class="rounded-lg p-2 bg-gray-300 dark:bg-gray-800">
                        <div class="justify-between flex items-center">
                            <h1 class="text-gray-600 dark:text-gray-400 font-medium">
                                Mode of Technology Acquisition
                            </h1>
                            <button wire:click.prevent="toggleShowCommercialForIncubation">
                                <svg class="w-[15px] h-[15px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3">
                            <form wire:submit.prevent="saveCommercialForIncubation">
                                <div class="mb-6">

                                    <div class="flex items-center mb-4">
                                        <input wire:model="commercialForIncubation" id="disabled-radio-1" type="radio" value="1" name="disabled-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="disabled-radio-1" class="ml-2 text-sm font-medium text-gray-400 dark:text-gray-500">YES</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input wire:model="commercialForIncubation"  id="disabled-radio-2" type="radio" value="0" name="disabled-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="disabled-radio-2" class="ml-2 text-sm font-medium text-gray-400 dark:text-gray-500">NO</label>
                                    </div>

                                    <div wire:loading wire:target="commercialForIncubation" class="font-medium text-blue-500">
                                        Loading...
                                    </div>
                                    @if(session()->has('saveComForIncubate'))
                                        <div class="flex items-center mt-2 p-4 mb-4 text-sm text-green-800 border-l border-r border-t border-b border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <div>
                                                <span class="font-medium">{{session('saveComForIncubate')}}</span>
                                            </div>
                                        </div>

                                    @endif
                                    @error('commercialForIncubation')
                                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border-r mt-2 border-l border-t border-b border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div>
                                            <span class="font-medium">{{$message}}</span>
                                        </div>
                                    </div>
                                    @enderror
                                </div>
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="justify-between items-center flex mb-4">
                        <div class="w-full">
                            <div class="border-b border-gray-200 dark:border-gray-600 text-gray-700 dark:text-gray-200">
                                {{($commercialForIncubation)? "YES":"NO"}}
                            </div>
                            <div class="font-medium text-sm text-gray-500 dark:text-gray-400">
                                Mode of Technology Acquisition
                            </div>
                        </div>
                        <button wire:click.prevent="toggleShowCommercialForIncubation">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                            </svg>
                        </button>
                    </div>
                @endif
            </div>

            <div class="mt-5">
                <div wire:loading wire:target="toggleShowCompDescription" class="font-medium text-blue-500">
                    Loading...
                </div>
                @if($showCompDescription)
                    <div class="rounded-lg p-2 bg-gray-300 dark:bg-gray-800">
                        <div class="justify-between flex items-center">
                            <h1 class="text-gray-600 dark:text-gray-400 font-medium">
                                Brief Description of the Company
                            </h1>
                            <button wire:click.prevent="toggleShowCompDescription">
                                <svg class="w-[15px] h-[15px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3">
                            <form wire:submit.prevent="saveCompDescription">
                                <div class="mb-6">
                                    <textarea rows="10" wire:model.lazy="compDescription" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-l border-r border-t border-b border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="input text here..."></textarea>

                                    <div wire:loading wire:target="compDescription" class="font-medium text-blue-500">
                                        Loading...
                                    </div>
                                    @if(session()->has('saveCompDesc'))
                                        <div class="flex items-center mt-2 p-4 mb-4 text-sm text-green-800 border-l border-r border-t border-b border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <div>
                                                <span class="font-medium">{{session('saveCompDesc')}}</span>
                                            </div>
                                        </div>

                                    @endif
                                    @error('compDescription')
                                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border-r mt-2 border-l border-t border-b border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div>
                                            <span class="font-medium">{{$message}}</span>
                                        </div>
                                    </div>
                                    @enderror
                                </div>
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="p-2 mb-4 border-l border-r border-t border-b rounded-lg border-gray-400 dark:border-gray-600">
                        <div class="w-full ">
                            <div class="justify-between  items-center flex">
                                <div class="font-medium text-lg mb-3 text-gray-500 dark:text-gray-400">
                                    Brief Description of the Company
                                </div>
                                <button wire:click.prevent="toggleShowCompDescription">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                        <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                        <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class=" text-gray-700 dark:text-gray-200">
                                {{$compDescription}}
                            </div>

                        </div>

                    </div>
                @endif
            </div>
        </x-card>
    </div>
    <div>
        <x-card class="shadow-lg">
            <h1 class="text-gray-600 text-lg dark:text-gray-400 font-medium">
                Contact Details
            </h1>
            <livewire:iptbm.staff.adopter.contact-details :tech="$tech" />
        </x-card>
    </div>
</div>

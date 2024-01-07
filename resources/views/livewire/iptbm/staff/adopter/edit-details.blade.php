<div class="grid grid-cols-1 md:grid-cols-3 gap-x-14 mt-5">
    <div class="md:col-span-2">
        <x-card-panel>
            <div class="space-y-4">
                <div>
                    <x-pop-modal name="updateCompName" class="max-w-xl" static="true" modal-title="Update Company Name">
                        <form class="space-y-6" wire:submit.prevent="saveCompName">
                            <div class="space-y-4">
                                <div>
                                    <x-input-label value="Company" for="compName"/>
                                    <x-text-input class="w-full" wire:model.lazy="compName" placeholder="enter text here" required/>
                                    <x-input-error :messages="$errors->get('compName')"/>
                                </div>
                                <x-alert-success :message="session('saveComp')"/>


                            </div>
                            <div>
                                <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveCompName">
                                    <div class="w-full text-center p-2" wire:loading.remove wire:target="saveCompName">
                                        Submit
                                    </div>
                                    <div class="w-full text-center p-2" wire:loading wire:target="saveCompName">
                                        Processing...
                                    </div>
                                </x-submit-button>
                            </div>

                        </form>
                    </x-pop-modal>
                    <div class="relative overflow-hidden group  border border-gray-200 dark:border-gray-600 p-2 rounded">
                        <div class="absolute bg-gray-500 dark:bg-gray-950 bg-opacity-60 dark:bg-opacity-60 transition duration-300 flex justify-center items-center border border-gray-200 dark:border-gray-600 md:rounded-l-full right-0 md:-right-56 w-fit h-full px-2 md:px-10 top-0 md:group-hover:transform md:group-hover:-translate-x-56">
                            <x-secondary-button class="text-sky-500 dark:text-sky-500 gap-2" data-modal-toggle="updateCompName" data-modal-target="updateCompName" >
                                <svg class="w-4 h-4 " aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path
                                        d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                    <path
                                        d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                </svg>
                                <div class="hidden md:block">
                                    Update
                                </div>
                            </x-secondary-button>

                        </div>
                        <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                            <div class="flex flex-col">
                                <dt class="text-gray-500 dark:text-gray-400">
                                    Company Name
                                </dt>
                                <dd class="font-semibold">
                                    {{$compName}}
                                </dd>
                            </div>
                        </dl>

                    </div>

                </div>
                <div>
                    <x-pop-modal name="updateCompAdd" class="max-w-xl" static="true" modal-title="Update Company Address">
                        <form class="space-y-6" wire:submit.prevent="saveCompAddress">
                            <div class="space-y-4">
                                <div>
                                    <x-input-label value="Company Address" for="compName"/>
                                    <x-text-input class="w-full" wire:model.lazy="compAddress" placeholder="enter text here" required/>
                                    <x-input-error :messages="$errors->get('compAddress')"/>
                                </div>
                                <x-alert-success :message="session('saveCompAddress')"/>


                            </div>
                            <div>
                                <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveCompAddress">
                                    <div class="w-full text-center p-2" wire:loading.remove wire:target="saveCompAddress">
                                        Submit
                                    </div>
                                    <div class="w-full text-center p-2" wire:loading wire:target="saveCompAddress">
                                        Processing...
                                    </div>
                                </x-submit-button>
                            </div>

                        </form>
                    </x-pop-modal>
                    <div class="relative overflow-hidden group  border border-gray-200 dark:border-gray-600 p-2 rounded">
                        <div class="absolute bg-gray-500 dark:bg-gray-950 bg-opacity-60 dark:bg-opacity-60 transition duration-300 flex justify-center items-center border border-gray-200 dark:border-gray-600 md:rounded-l-full right-0 md:-right-56 w-fit h-full px-2 md:px-10 top-0 md:group-hover:transform md:group-hover:-translate-x-56">
                            <x-secondary-button  data-modal-toggle="updateCompAdd" data-modal-target="updateCompAdd" class="text-sky-500 dark:text-sky-500 gap-2" >
                                <svg class=" w-4 h-4 " aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path
                                        d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                    <path
                                        d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                </svg>
                                <div class="hidden md:block">
                                    Update
                                </div>

                            </x-secondary-button>

                        </div>
                        <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                            <div class="flex flex-col">
                                <dt class="text-gray-500 dark:text-gray-400">
                                    Company Address
                                </dt>
                                <dd class="font-semibold">
                                    {{$compAddress}}
                                </dd>
                            </div>
                        </dl>

                    </div>

                </div>
                <div>
                    <x-pop-modal name="updateCompStruct" class="max-w-xl" static="true" modal-title="Update Business Structure">
                        <form class="space-y-6" wire:submit.prevent="saveBusinessStructure">
                            <div>
                                <x-input-select wire:model="businessStructure">
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
                                </x-input-select>
                                <x-input-error :messages="$errors->get('businessStructure')"/>
                                <x-alert-success :message="session('saveBbusinessStructure')"/>
                            </div>
                            <div>
                                <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveBusinessStructure">
                                    <div class="w-full text-center p-2" wire:loading.remove wire:target="saveBusinessStructure">
                                        Submit
                                    </div>
                                    <div class="w-full text-center p-2" wire:loading wire:target="saveBusinessStructure">
                                        Processing
                                    </div>
                                </x-submit-button>
                            </div>

                        </form>

                    </x-pop-modal>
                    <div class="relative overflow-hidden group  border border-gray-200 dark:border-gray-600 p-2 rounded">
                        <div class="absolute bg-gray-500 dark:bg-gray-950 bg-opacity-60 dark:bg-opacity-60 transition duration-300 flex justify-center items-center border border-gray-200 dark:border-gray-600 md:rounded-l-full right-0 md:-right-56 w-fit h-full px-2 md:px-10 top-0 md:group-hover:transform md:group-hover:-translate-x-56">
                            <x-secondary-button  data-modal-toggle="updateCompStruct" data-modal-target="updateCompStruct" class="text-sky-500 dark:text-sky-500 gap-2" >
                                <svg class=" w-4 h-4 " aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path
                                        d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                    <path
                                        d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                </svg>
                                <div class="hidden md:block">
                                    Update
                                </div>

                            </x-secondary-button>

                        </div>
                        <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                            <div class="flex flex-col">
                                <dt class="text-gray-500 dark:text-gray-400">
                                    Business Structure
                                </dt>
                                <dd class="font-semibold">
                                    {{$businessStructure}}
                                </dd>
                            </div>
                        </dl>

                    </div>

                </div>
                <div>
                    <x-pop-modal name="updateBusReg" class="max-w-xl" static="true" modal-title="Update Business Registration">
                        <form class="space-y-6" wire:submit.prevent="saveBusinessRegistration">
                            <div class="mb-6">
                                <x-input-select wire:model="businessRegistration">
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
                                </x-input-select>
                                <x-input-error :messages="$errors->get('businessRegistration')"/>
                                <x-alert-success :message="session('saveBusinessRegistration')"/>

                            </div>
                            <div>
                                <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveBusinessRegistration">
                                    <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveBusinessRegistration">
                                        Submit
                                    </div>
                                    <div class="p-2 w-full text-center" wire:loading wire:target="saveBusinessRegistration">
                                        Processing...
                                    </div>
                                </x-submit-button>
                            </div>

                        </form>
                    </x-pop-modal>
                    <div class="relative overflow-hidden group  border border-gray-200 dark:border-gray-600 p-2 rounded">
                        <div class="absolute bg-gray-500 dark:bg-gray-950 bg-opacity-60 dark:bg-opacity-60 transition duration-300 flex justify-center items-center border border-gray-200 dark:border-gray-600 md:rounded-l-full right-0 md:-right-56 w-fit h-full px-2 md:px-10 top-0 md:group-hover:transform md:group-hover:-translate-x-56">
                            <x-secondary-button  data-modal-toggle="updateBusReg" data-modal-target="updateBusReg" class="text-sky-500 dark:text-sky-500 gap-2" >
                                <svg class=" w-4 h-4 " aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path
                                        d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                    <path
                                        d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                </svg>
                                <div class="hidden md:block">
                                    Update
                                </div>

                            </x-secondary-button>

                        </div>
                        <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                            <div class="flex flex-col">
                                <dt class="text-gray-500 dark:text-gray-400">
                                    Business Registration
                                </dt>
                                <dd class="font-semibold">
                                    {{$businessRegistration}}
                                </dd>
                            </div>
                        </dl>

                    </div>

                </div>
                <div>
                    <x-pop-modal name="updateLicens" class="max-w-xl" static="true" modal-title="Update Mode of Technology Acquisition">
                        <form class="space-y-6" wire:submit.prevent="saveTechAcquisition">
                            <div class="mb-6">
                                <x-input-select wire:model="techAcquisition">
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
                                </x-input-select>
                                <x-input-error :messages="$errors->get('techAcquisition')"/>
                                <x-alert-success :message="session('saveTechAcquisition')"/>
                            </div>
                            <div>
                                <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveTechAcquisition">
                                    <div class="w-full text-center p-2" wire:loading.remove wire:target="saveTechAcquisition">
                                        Submit
                                    </div>
                                    <div class="w-full text-center p-2" wire:loading wire:target="saveTechAcquisition">
                                        Processing...
                                    </div>
                                </x-submit-button>
                            </div>

                        </form>
                    </x-pop-modal>
                    <div class="relative overflow-hidden group  border border-gray-200 dark:border-gray-600 p-2 rounded">
                        <div class="absolute bg-gray-500 dark:bg-gray-950 bg-opacity-60 dark:bg-opacity-60 transition duration-300 flex justify-center items-center border border-gray-200 dark:border-gray-600 md:rounded-l-full right-0 md:-right-56 w-fit h-full px-2 md:px-10 top-0 md:group-hover:transform md:group-hover:-translate-x-56">
                            <x-secondary-button  data-modal-toggle="updateLicens" data-modal-target="updateLicens" class="text-sky-500 dark:text-sky-500 gap-2" >
                                <svg class=" w-4 h-4 " aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path
                                        d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                    <path
                                        d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                </svg>
                                <div class="hidden md:block">
                                    Update
                                </div>

                            </x-secondary-button>

                        </div>
                        <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                            <div class="flex flex-col">
                                <dt class="text-gray-500 dark:text-gray-400">
                                    Mode of Technology Acquisition
                                </dt>
                                <dd class="font-semibold">
                                    {{$techAcquisition}}
                                </dd>
                            </div>
                        </dl>

                    </div>

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
                                    <svg class="w-[15px] h-[15px] text-gray-800 dark:text-white" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="3" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="mt-3">
                                <form wire:submit.prevent="saveCommercialForIncubation">
                                    <div class="mb-6">

                                        <div class="flex items-center mb-4">
                                            <input wire:model="commercialForIncubation" id="disabled-radio-1" type="radio"
                                                   value="1" name="disabled-radio"
                                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="disabled-radio-1"
                                                   class="ml-2 text-sm font-medium text-gray-400 dark:text-gray-500">YES</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input wire:model="commercialForIncubation" id="disabled-radio-2" type="radio"
                                                   value="0" name="disabled-radio"
                                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="disabled-radio-2"
                                                   class="ml-2 text-sm font-medium text-gray-400 dark:text-gray-500">NO</label>
                                        </div>

                                        <div wire:loading wire:target="commercialForIncubation"
                                             class="font-medium text-blue-500">
                                            Loading...
                                        </div>
                                        @if(session()->has('saveComForIncubate'))
                                            <div
                                                class="flex items-center mt-2 p-4 mb-4 text-sm text-green-800 border-l border-r border-t border-b border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                                                role="alert">
                                                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                     viewBox="0 0 20 20">
                                                    <path
                                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                </svg>
                                                <span class="sr-only">Info</span>
                                                <div>
                                                    <span class="font-medium">{{session('saveComForIncubate')}}</span>
                                                </div>
                                            </div>

                                        @endif
                                        @error('commercialForIncubation')
                                        <div
                                            class="flex items-center p-4 mb-4 text-sm text-red-800 border-r mt-2 border-l border-t border-b border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                                            role="alert">
                                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <div>
                                                <span class="font-medium">{{$message}}</span>
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
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path
                                        d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                    <path
                                        d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
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
                                    <svg class="w-[15px] h-[15px] text-gray-800 dark:text-white" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="3" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="mt-3">
                                <form wire:submit.prevent="saveCompDescription">
                                    <div class="mb-6">
                                    <textarea rows="10" wire:model.lazy="compDescription" id="message" rows="4"
                                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-l border-r border-t border-b border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                              placeholder="input text here..."></textarea>

                                        <div wire:loading wire:target="compDescription" class="font-medium text-blue-500">
                                            Loading...
                                        </div>
                                        @if(session()->has('saveCompDesc'))
                                            <div
                                                class="flex items-center mt-2 p-4 mb-4 text-sm text-green-800 border-l border-r border-t border-b border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                                                role="alert">
                                                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                     viewBox="0 0 20 20">
                                                    <path
                                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                </svg>
                                                <span class="sr-only">Info</span>
                                                <div>
                                                    <span class="font-medium">{{session('saveCompDesc')}}</span>
                                                </div>
                                            </div>

                                        @endif
                                        @error('compDescription')
                                        <div
                                            class="flex items-center p-4 mb-4 text-sm text-red-800 border-r mt-2 border-l border-t border-b border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                                            role="alert">
                                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <div>
                                                <span class="font-medium">{{$message}}</span>
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
                        </div>
                    @else
                        <div
                            class="p-2 mb-4 border-l border-r border-t border-b rounded-lg border-gray-400 dark:border-gray-600">
                            <div class="w-full ">
                                <div class="justify-between  items-center flex">
                                    <div class="font-medium text-lg mb-3 text-gray-500 dark:text-gray-400">
                                        Brief Description of the Company
                                    </div>
                                    <button wire:click.prevent="toggleShowCompDescription">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                            <path
                                                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                            <path
                                                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
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
            </div>
        </x-card-panel>

    </div>
    <div>
        <x-card class="shadow-lg">
            <h1 class="text-gray-600 text-lg dark:text-gray-400 font-medium">
                Contact Details
            </h1>
            <livewire:iptbm.staff.adopter.contact-details :tech="$tech"/>
        </x-card>
    </div>
</div>

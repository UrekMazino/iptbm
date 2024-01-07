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
                    <div class="relative overflow-hidden group hover:bg-gray-300 hover:dark:bg-gray-900 transition duration-300   border border-gray-200 dark:border-gray-600 p-2 rounded">
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
                    <div class="relative overflow-hidden group hover:bg-gray-300 hover:dark:bg-gray-900 transition duration-300 border border-gray-200 dark:border-gray-600 p-2 rounded">
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
                    <div class="relative overflow-hidden group hover:bg-gray-300 hover:dark:bg-gray-900 transition duration-300 border border-gray-200 dark:border-gray-600 p-2 rounded">
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
                    <div class="relative overflow-hidden group hover:bg-gray-300 hover:dark:bg-gray-900 transition duration-300 border border-gray-200 dark:border-gray-600 p-2 rounded">
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
                    <div class="relative overflow-hidden group hover:bg-gray-300 hover:dark:bg-gray-900 transition duration-300 border border-gray-200 dark:border-gray-600 p-2 rounded">
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
                <div>
                    <x-pop-modal name="updateConForIncu" class="max-w-xl" static="true" modal-title="Commercialization for Incubation?">
                        <form class="space-y-6" wire:submit.prevent="saveCommercialForIncubation">
                            <div class="space-y-4">


                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <x-text-input wire:model="commercialForIncubation" id="bordered-radio-1" type="radio" value="1" name="bordered-radio"/>
                                  <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">YES</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <x-text-input wire:model="commercialForIncubation" checked id="bordered-radio-2" type="radio" value="0" name="bordered-radio"/>
                                    <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NO</label>
                                </div>
                                <x-input-error :messages="$errors->get('commercialForIncubation')"/>
                                <x-alert-success :message="session('saveComForIncubate')"/>



                            </div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveCommercialForIncubation">
                                <div class="p-2.5 w-full text-center" wire:loading.remove wire:target="saveCommercialForIncubation">
                                    Submit
                                </div>
                                <div class="p-2.5 w-full text-center" wire:loading wire:target="saveCommercialForIncubation">
                                    Processing...
                                </div>
                            </x-submit-button>

                        </form>
                    </x-pop-modal>
                    <div class="relative overflow-hidden group hover:bg-gray-300 hover:dark:bg-gray-900 transition duration-300 border border-gray-200 dark:border-gray-600 p-2 rounded">
                        <div class="absolute bg-gray-500 dark:bg-gray-950 bg-opacity-60 dark:bg-opacity-60 transition duration-300 flex justify-center items-center border border-gray-200 dark:border-gray-600 md:rounded-l-full right-0 md:-right-56 w-fit h-full px-2 md:px-10 top-0 md:group-hover:transform md:group-hover:-translate-x-56">
                            <x-secondary-button  data-modal-toggle="updateConForIncu" data-modal-target="updateConForIncu" class="text-sky-500 dark:text-sky-500 gap-2" >
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
                                    Commercialization, for incubation?
                                </dt>
                                <dd class="font-semibold">
                                    {{($commercialForIncubation)? "YES":"NO"}}
                                </dd>
                            </div>
                        </dl>

                    </div>

                </div>
                <div>
                    <x-pop-modal name="updateBrfDes" class="max-w-xl" static="true" modal-title="Update Company Description">
                        <form class="space-y-6" wire:submit.prevent="saveCompDescription">
                            <div class="space-y-4">
                                <x-text-box rows="10" wire:model.lazy="compDescription" rows="4" placeholder="enter text here..."/>
                                <x-input-error :messages="$errors->get('compDescription')"/>
                                <x-alert-success :message="session('saveCompDesc')"/>
                            </div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveCompDescription">
                                <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveCompDescription">
                                    Submit
                                </div>
                                <div class="p-2 w-full text-center" wire:loading wire:target="saveCompDescription">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </form>
                    </x-pop-modal>
                    <div class="relative overflow-hidden group hover:bg-gray-300 hover:dark:bg-gray-900 transition duration-300 border border-gray-200 dark:border-gray-600 p-2 rounded">
                        <div class="absolute bg-gray-500 dark:bg-gray-950 bg-opacity-60 dark:bg-opacity-60 transition duration-300 flex justify-center items-center border border-gray-200 dark:border-gray-600 md:rounded-l-full right-0 md:-right-56 w-fit h-full px-2 md:px-10 top-0 md:group-hover:transform md:group-hover:-translate-x-56">
                            <x-secondary-button  data-modal-toggle="updateBrfDes" data-modal-target="updateBrfDes" class="text-sky-500 dark:text-sky-500 gap-2" >
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
                                    Brief Description of the Company
                                </dt>
                                <dd class="font-semibold">
                                    {{$compDescription}}
                                </dd>
                            </div>
                        </dl>

                    </div>

                </div>

            </div>
        </x-card-panel>

    </div>
    <div>
        <x-card-panel title="Contact Details">
            <livewire:iptbm.staff.adopter.contact-details :tech="$tech"/>
        </x-card-panel>

    </div>
</div>


<x-pop-modal  name="addAdopter" class="max-w-xl" modal-title="Commercialization Adopter" static="true">
    <form class="space-y-6" wire:submit.prevent="saveForm">
        <div class="space-y-4">
            <div>
                <x-input-label  for="tech" value="Technology"/>
                <x-text-input class="w-full" list="techList" type="search" wire:model.lazy="techName" placeholder="technologies" required/>
                <x-data-list id="techList">
                    @foreach($technologies as $technology)
                        <option value="{{$technology->title}}">
                        </option>
                    @endforeach
                </x-data-list>
                <x-input-error :messages="$errors->get('techName')"/>
                <x-input-error :messages="$errors->get('techName')"/>
            </div>
            <div>
                <x-input-label  for="compName" value="Company Name"/>
                <x-text-input  class="w-full" wire:model.lazy="companyName"  id="compName" placeholder="enter text here..." required/>
                <x-input-error :messages="$errors->get('companyName')"/>
            </div>
            <div>
                <x-input-label  for="compAddress" value="Company Address"/>
                <x-text-input class="w-full" id="compAddress" wire:model.lazy="companyAddress" placeholder="enter text here..." required  />
                <x-input-error :messages="$errors->get('companyAddress')"/>
            </div>
            <div>
                <x-input-label  for="compDesc" value="Company Description"/>
                <x-text-box  wire:model.lazy="companyDescription" id="compDesc" rows="4" placeholder="enter text here..." required/>
                <x-input-error :messages="$errors->get('companyDescription')"/>
            </div>
            <div>
                <x-input-label  for="bustruc" value="Business Structure"/>
                <x-input-select wire:model.lazy="businessStructure" required id="bustruc">
                    <option value="" selected>
                        - - Select Business Structure - -
                    </option>
                    <option>
                        Sole Prioprietorship
                    </option>
                    <option>
                        Corporation
                    </option>
                    <option>
                        Partnership
                    </option>
                    <option>
                        Coop
                    </option>
                </x-input-select>
                <x-input-error :messages="$errors->get('businessStructure')"/>
            </div>
            <div>
                <x-input-label  for="busiReg" value="Business Registration"/>
                <x-input-select wire:model.lazy="businessRegistration" id="busiReg" required>
                    <option value="" selected>
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
            </div>
            <div>
                <x-input-label  for="businesAq" value="Technology Acquisition"/>
                <x-input-select wire:model.lazy="technologyAquisition" id="businesAq" required>
                    <option value="" selected>
                        - - Select Technology Acquisition - -
                    </option>
                    <option>
                        Licensing
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
                <x-input-error :messages="$errors->get('technologyAquisition')"/>

            </div>
            <div>
                <x-item-header>
                    Commercialization, for incubation?
                </x-item-header>
                <x-grid col="2" gap="4">

                    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                        <input wire:model="forIncubation" id="bordered-radio-1" type="radio" value="1" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">YES</label>
                    </div>
                    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                        <input  wire:model.lazy="forIncubation" checked id="bordered-radio-2" type="radio" value="0" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NO</label>
                    </div>

                </x-grid>

                @error('forIncubation')
                <div id="alert-border-2"
                     class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                     role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
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
        </div>
        <div>
            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveForm">
                <div class="w-full text-center p-2" wire:loading.remove wire:target="saveForm">
                    Submit
                </div>
                <div class="w-full text-center p-2" wire:loading wire:target="saveForm">
                    Processing...
                </div>
            </x-submit-button>
        </div>


    </form>
</x-pop-modal>

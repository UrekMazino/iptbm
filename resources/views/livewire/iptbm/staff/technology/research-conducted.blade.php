<div class="mb-4 border bg-gray-white dark:bg-gray-700  border-gray-300 dark:border-gray-600  rounded-lg p-4">
    <div class="w-full space-y-4 mb-4">
        <div class="py-2">
            <x-item-header>
                Research Title
            </x-item-header>
            <div class="mt-2">
                {{$title}}
            </div>
        </div>


        <div class="divide-y divide-slate-200">
            <!-- Accordion item -->
            <div x-data="{ expanded: false }" class="py-2">
                <h2>
                    <button
                        id="faqs-title-funder-{{$project->id}}"
                        type="button"
                        class="flex items-center justify-between w-full text-left font-semibold py-2"
                        @click="expanded = !expanded"
                        :aria-expanded="expanded"
                        aria-controls="faqs-text-funder-{{$project->id}}"
                    >
                        <x-item-header>
                            Funding Agencies
                        </x-item-header>

                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" class="transform origin-center transition duration-200 ease-out"
                                  :class="{'!rotate-180': expanded}" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div
                    id="faqs-text-funder-{{$project->id}}"
                    role="region"
                    aria-labelledby="faqs-title-funder-{{$project->id}}"
                    class="grid text-sm text-slate-600 overflow-hidden transition-all duration-300 ease-in-out"
                    :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'"
                >
                    <div class="overflow-hidden">
                        <div class="flex justify-between border-b border-t border-gray-400 dark:border-gray-600  py-2">


                            <x-secondary-button data-popover-trigger="click"
                                                data-popover-target="popover-user-profile-{{$project->id}}">
                                Add Funding Agencies
                            </x-secondary-button>


                            <x-pop-modal class="max-w-xl" modal-title="New Agency" static="true"
                                         name="newAgencyMod-{{$project->id}}">
                                <form wire:submit.prevent="addNewFundeingAgency">
                                    <x-input-label>
                                        <div class="flex justify-between items-center">
                                            <div>
                                                Agency Name
                                            </div>

                                        </div>
                                        <x-text-input class="w-full" wire:model.lazy="newAgencyModel" type="text"
                                                      required placeholder="enter text"/>
                                        <x-sub-label>
                                            <i>
                                                This will be validated by the system administrator.
                                            </i>
                                        </x-sub-label>
                                        @error('newAgencyModel')
                                        <x-input-error :messages="$message"/>
                                        @enderror
                                    </x-input-label>
                                    <x-input-label>
                                        <div class="flex justify-between items-center">
                                            <div>
                                                Address
                                            </div>

                                        </div>
                                        <x-text-input class="w-full" wire:model.lazy="newAddressModel" type="text"
                                                      required placeholder="enter text"/>

                                        @error('newAddressModel')
                                        <x-input-error :messages="$message"/>
                                        @enderror
                                    </x-input-label>
                                    <x-input-label>
                                        <div class="flex justify-between items-center">
                                            <div>
                                                Head
                                            </div>

                                        </div>
                                        <x-text-input class="w-full" wire:model.lazy="newHeadModel" type="text" required
                                                      placeholder="enter text"/>
                                        @error('newHeadModel')
                                        <x-input-error :messages="$message"/>
                                        @enderror
                                    </x-input-label>
                                    <x-input-label>
                                        <div class="flex justify-between items-center">
                                            <div>
                                                Designation
                                            </div>

                                        </div>
                                        <x-text-input class="w-full" wire:model.lazy="newDesignationModel" type="text"
                                                      required placeholder="enter text"/>

                                        @error('newDesignationModel')
                                        <x-input-error :messages="$message"/>
                                        @enderror
                                    </x-input-label>
                                    <x-sub-label>
                                        <i class="text-red-400 text-xs">
                                            * This will be validated by the system administrator.
                                        </i>
                                    </x-sub-label>
                                    <x-submit-button class="mt-4">
                                        Submit
                                    </x-submit-button>

                                </form>
                            </x-pop-modal>

                            <x-pop-modal modal-title="Update funding agency" name="addFunder-{{$project->id}}"
                                         static="true" class="max-w-xl">
                                <form wire:submit.prevent="addAgencyFunder">
                                    <x-input-label>
                                        <div>
                                            Agencies
                                        </div>
                                        <x-text-input list="agencyNameList" class="w-full" placeholder="type to search"
                                                      wire:model.lazy="agencyModel"/>
                                        <x-data-list id="agencyNameList" :data="$agencies->pluck('name')"/>
                                        @error('agencyModel')
                                        <x-input-error :messages="$message"/>
                                        @enderror
                                        @error('agencyId')
                                        <x-input-error :messages="$message"/>
                                        @enderror
                                    </x-input-label>
                                    <x-submit-button class="mt-4">
                                        Submit
                                    </x-submit-button>
                                </form>
                            </x-pop-modal>
                            <div data-popover id="popover-user-profile-{{$project->id}}" role="tooltip"
                                 class="absolute z-10 invisible inline-block w-64 p-2 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                                <div
                                    class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <button data-modal-toggle="newAgencyMod-{{$project->id}}" type="button"
                                            class="w-full px-4 py-2 font-medium text-left border-b text-gray-400 border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                        Add new Agency
                                    </button>
                                    <button data-modal-toggle="addFunder-{{$project->id}}" type="button"
                                            class="w-full px-4 py-2 font-medium text-left border-b text-gray-400 border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                        Select from existing agencies
                                    </button>
                                </div>

                                <div data-popper-arrow></div>
                            </div>


                        </div>

                        <div class="mt-10">
                            <ul class="divide-y">
                                @foreach($funders as $key=>$funder)
                                    <li class="indent-5 hover:bg-gray-200 py-2 text-gray-700 dark:text-gray-200 hover:dark:bg-gray-600 transition duration-300 hover:text-gray-900 dark:hover:text-white">
                                        <div class="justify-between flex items-center">
                                            <div>
                                                {{$funder->agency->name}}
                                            </div>
                                            <x-secondary-button data-modal-toggle="deleteFunder-{{$funder->id}}"
                                                                class="text-red-600 dark:text-red-600">
                                                <svg class="w-4 h-4" aria-hidden="true"
                                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"
                                                          d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                                </svg>
                                            </x-secondary-button>

                                            <livewire:iptbm.delete-row wire:key="{{$key}}" :item="$funder->agency->name"
                                                                       :model="$funder"
                                                                       modal-name="deleteFunder-{{$funder->id}}"/>
                                        </div>


                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="mt-10 mb-10">
                            <x-item-header>
                                Amount Invested
                            </x-item-header>
                            <div class="mt-2 text-gray-700 dark:text-white">
                                <span class="fa-solid fa-peso-sign me-2"></span> {{$fund}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Accordion item -->
            <div x-data="{ expanded: false }" class="py-2">
                <h2>
                    <button
                        id="faqs-title-partner-{{$project->id}}"
                        type="button"
                        class="flex items-center justify-between w-full text-left font-semibold py-2"
                        @click="expanded = !expanded"
                        :aria-expanded="expanded"
                        aria-controls="faqs-text-partner-{{$project->id}}"
                    >
                        <x-item-header>
                            Industry Partners
                        </x-item-header>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" class="transform origin-center transition duration-200 ease-out"
                                  :class="{'!rotate-180': expanded}" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div
                    id="faqs-text-partner-{{$project->id}}"
                    role="region"
                    aria-labelledby="faqs-title-partner-{{$project->id}}"
                    class="grid text-sm text-slate-600 overflow-hidden transition-all duration-300 ease-in-out"
                    :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'"
                >
                    <div class="overflow-hidden">
                        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                            <div
                                class="flex justify-between border-b border-t border-gray-400 dark:border-gray-600  py-2">

                                <x-pop-modal static="true" name="industryPartner-{{$project->id}}"
                                             modal-title="Update Industry Partners" class="max-w-md">
                                    <form wire:submit.prevent="savePartner" wire:ignore.self class="space-y-2.5">
                                        <div>
                                            <x-input-label>
                                                <div>
                                                    Industry/Agency
                                                </div>
                                                <x-text-input wire:model.lazy="partner" class="w-full"/>
                                                @error('partner')
                                                <x-input-error :messages="$message"/>
                                                @enderror
                                            </x-input-label>
                                        </div>
                                        <div class="mb-6">
                                            <x-input-label>
                                                <div>
                                                    Address
                                                </div>
                                                <x-text-input wire:model.lazy="address" class="w-full"/>
                                                @error('address')
                                                <x-input-error :messages="$message"/>
                                                @enderror
                                            </x-input-label>

                                        </div>
                                        <div class="mb-6">
                                            <x-input-label>
                                                <div>
                                                    Mobile number
                                                    <i class="text-sm font-normal text-blue-500">
                                                        Optional
                                                    </i>
                                                </div>
                                                <x-text-input wire:model.lazy="partnerMobile" class="w-full" max="7"/>
                                                @error('partnerMobile')
                                                <x-input-error :messages="$message"/>
                                                @enderror
                                            </x-input-label>

                                        </div>
                                        <div class="mb-6">
                                            <x-input-label>
                                                <div>
                                                    Telephone Number
                                                    <i class="text-sm font-normal text-blue-500">
                                                        Optional
                                                    </i>
                                                </div>
                                                <x-text-input wire:model.lazy="partnerPhone" class="w-full" max="7"/>
                                                @error('partnerPhone')
                                                <x-input-error :messages="$message"/>
                                                @enderror
                                            </x-input-label>


                                        </div>
                                        <div class="mb-6">
                                            <x-input-label>
                                                <div>
                                                    Fax Number
                                                    <i class="text-sm font-normal text-blue-500">
                                                        Optional
                                                    </i>
                                                </div>
                                                <x-text-input wire:model.lazy="partnerFax" class="w-full" type="number"
                                                              max="7"/>
                                                @error('partnerFax')
                                                <x-input-error :messages="$message"/>
                                                @enderror
                                            </x-input-label>

                                        </div>
                                        <div class="mb-6">
                                            <x-input-label>
                                                <div>
                                                    Email Address
                                                    <i class="text-sm font-normal text-blue-500">
                                                        Optional
                                                    </i>
                                                </div>
                                                <x-text-input wire:model.lazy="partnerEmail" class="w-full" type="email"
                                                              max="7"/>
                                                @error('partnerEmail')
                                                <x-input-error :messages="$message"/>
                                                @enderror
                                            </x-input-label>

                                        </div>
                                        <button type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Submit
                                        </button>
                                    </form>
                                </x-pop-modal>
                                <x-secondary-button data-modal-toggle="industryPartner-{{$project->id}}"
                                                    class="text-sky-600 dark:text-sky-600">
                                    Update Industry Partner
                                </x-secondary-button>
                            </div>
                            <div class="flex flex-col font-normal ">

                                <div class="my-2  ">


                                    @if($researchPartner->count()>0)
                                        @foreach($researchPartner as $partner)
                                            <livewire:iptbm.staff.technology.research-partner
                                                wire:key="{{$partner->id}}" :partner="$partner"/>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
    <div wire:ignore.self id="deleteResearch-{{$project->id}}" tabindex="-1" aria-hidden="true"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 text-center bg-gray-50 rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <button type="button"
                        class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="deleteResearch-{{$project->id}}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true"
                     fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                          clip-rule="evenodd"></path>
                </svg>
                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?
                    <span class="text-lg font-medium text-gray-600 dark:text-gray-300">
                                {{$title}}
                            </span>
                </p>
                <div class="flex justify-center items-center space-x-4">
                    <button data-modal-toggle="deleteResearch-{{$project->id}}" type="button"
                            class="py-2 px-3 text-sm font-medium text-gray-500 bg-gray-50 rounded-lg border-l border-r border-t border-b border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        No, cancel
                    </button>
                    <button data-modal-toggle="deleteResearch-{{$project->id}}" wire:click.prevent="deleteResearch"
                            type="button"
                            class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                        Yes, I'm sure
                    </button>
                </div>
            </div>
        </div>
    </div>

    <x-danger-button data-modal-toggle="deleteResearch-{{$project->id}}">
        <i class="fa-solid fa-trash-can"></i> Delete Research
    </x-danger-button>

</div>

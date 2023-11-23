<div>
    <div class="text-gray-600 dark:text-gray-300 font-medium mb-4 text-base flex justify-between">
        <x-item-header>
            Research Project Conducted
        </x-item-header>
        <div>
            <x-pop-modal class="max-w-3xl" name="addResearch" modal-title="Update Project Title">
                <form wire:submit.prevent="saveResearchProject" class="space-y-2 mt-4">
                    <div>
                        <x-input-label>
                            <div>
                                Research Title
                            </div>
                            <x-text-box rows="3" wire:model.lazy="researchTitle"/>
                            @error('researchTitle')
                            <x-input-error :messages="$message"/>
                            @enderror
                        </x-input-label>

                    </div>
                    <div class="w-full">


                        <x-secondary-button wire:click.prevent="toggleShowExistingAgencies"
                                            class="text-sky-600 dark:text-sky-500 mt-4 mb-2">
                            @if($showExistingAgencies)
                                Add New Agency?
                            @else
                                Select from Existing Agencies?
                            @endif
                        </x-secondary-button>

                        @if($showExistingAgencies)
                            <x-input-label wire:loading.remove wire:target="toggleShowExistingAgencies">
                                <div class="flex justify-between items-center">
                                    <div>
                                        Funding agencies.
                                    </div>

                                </div>
                                <x-text-input list="agencL" class="w-full" wire:model.lazy="fundingAgency" type="search"
                                              required placeholder="type to search"/>
                                <x-sub-label>
                                    <i>
                                        Other funding organizations will be added later.
                                    </i>
                                </x-sub-label>
                                <x-data-list id="agencL" :data="$agencies"/>
                                @error('fundingAgency')
                                <x-input-error :messages="$message"/>
                                @enderror
                            </x-input-label>
                        @else
                            <div class="border border-gray-400 dark:border-gray-600 rounded-lg p-4 space-y-2"
                                 wire:loading.remove wire:target="toggleShowExistingAgencies">
                                <x-input-label>
                                    <div class="flex justify-between items-center">
                                        <div>
                                            Agency Name
                                        </div>

                                    </div>
                                    <x-text-input class="w-full" wire:model.lazy="newAgencyName" type="text" required
                                                  placeholder="enter text"/>
                                    <x-sub-label>
                                        <i>
                                            Other funding organizations will be added later.
                                        </i>
                                    </x-sub-label>
                                    <x-data-list id="agencL" :data="$agencies"/>
                                    @error('newAgencyName')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>
                                <x-input-label>
                                    <div class="flex justify-between items-center">
                                        <div>
                                            Address
                                        </div>

                                    </div>
                                    <x-text-input class="w-full" wire:model.lazy="newAddress" type="text" required
                                                  placeholder="enter text"/>

                                    <x-data-list id="agencL" :data="$agencies"/>
                                    @error('newAddress')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>
                                <x-input-label>
                                    <div class="flex justify-between items-center">
                                        <div>
                                            Head
                                        </div>

                                    </div>
                                    <x-text-input class="w-full" wire:model.lazy="newHead" type="text" required
                                                  placeholder="enter text"/>
                                    <x-data-list id="agencL" :data="$agencies"/>
                                    @error('newHead')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>
                                <x-input-label>
                                    <div class="flex justify-between items-center">
                                        <div>
                                            Designation
                                        </div>

                                    </div>
                                    <x-text-input class="w-full" wire:model.lazy="newDesignation" type="text" required
                                                  placeholder="enter text"/>
                                    <x-data-list id="agencL" :data="$agencies"/>
                                    @error('newDesignation')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>
                                <x-sub-label>
                                    <i class="text-red-400 text-xs">
                                        * This will be validated by the system administrator.
                                    </i>
                                </x-sub-label>
                            </div>

                        @endif


                    </div>
                    <div wire:loading wire:target="toggleShowExistingAgencies" class="flex gap-2 w-full text-blue-600">
                        Loading...
                    </div>
                    <div>
                        <x-input-label>
                            <div>
                                Amount Invested
                            </div>
                            <x-text-input class="w-full" wire:model.lazy="amountInvested" type="number" step="any"/>
                            @error('amountInvested')
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
            <x-secondary-button data-modal-toggle="addResearch" class="text-sky-600 dark:text-sky-600">
                Update
            </x-secondary-button>

        </div>
    </div>
    <div wire:loading wire:target="showTechResearchProjectForm" class="text-blue-500">
        Loading...
    </div>
    @if($showTechResearchProjectForm)
        <div class="rounded-lg bg-gray-300 dark:bg-gray-800 p-4 my-3">

            <form wire:submit.prevent="saveResearchProject">
                <div class="mb-6">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Research
                        Title</label>
                    <textarea wire:model.lazy="researchTitle" id="title" rows="4"
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                              placeholder="Write your thoughts here..."></textarea>
                    @error('researchTitle')
                    <div id="alert-border-2"
                         class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                         role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="ml-3 text-sm font-medium">
                            {{$message}}
                        </div>
                    </div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="fundAgent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Funding
                        Agency</label>
                    <input wire:model.lazy="fundingAgency" type="text" id="fundAgent"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           required>
                    @error('fundingAgency')
                    <div id="alert-border-2"
                         class="flex items-center p-4 mb-4 teaxt-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                         role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="ml-3 text-sm font-medium">
                            {{$message}}
                        </div>
                    </div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="amnt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount
                        Invested</label>
                    <input wire:model.lazy="amountInvested" type="number" id="amnt"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           required>
                    @error('amountInvested')
                    <div id="alert-border-2"
                         class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                         role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
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
                    Submit
                </button>
            </form>

        </div>
    @endif
    <div class="my-3 space-y-10 ">
        @foreach($techResearchProject as $project)
            <livewire:iptbm.staff.technology.research-conducted wire:key="project-{{$project->id}}"
                                                                :project="$project"/>
        @endforeach
    </div>
</div>

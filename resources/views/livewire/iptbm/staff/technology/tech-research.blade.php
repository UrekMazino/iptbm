
<x-card-panel title="Research Project Conducted">
    <x-slot:button>
        <x-pop-modal class="max-w-3xl" name="addResearch" modal-title="Update Project Title">
            <form wire:submit.prevent="saveResearchProject" class="space-y-2">
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
                <div class="pt-5">
                    <x-submit-button wire:loading.attr="disabled" wire:target="saveResearchProject" class="min-w-full">
                        <div class="text-center p-2 w-full" wire:loading wire:target="saveResearchProject">
                            Processing...
                        </div>
                        <div class="text-center p-2 w-full" wire:loading.remove wire:target="saveResearchProject">
                            Submit
                        </div>
                    </x-submit-button>
                </div>

            </form>
        </x-pop-modal>
        <x-secondary-button data-modal-toggle="addResearch" class="text-sky-600 dark:text-sky-600">
            Update
        </x-secondary-button>
    </x-slot:button>
    <div class="my-3 space-y-10 ">
        @foreach($techResearchProject as $project)
            <livewire:iptbm.staff.technology.research-conducted wire:key="project-{{$project->id}}"
                                                                :project="$project"/>
        @endforeach
    </div>
</x-card-panel>

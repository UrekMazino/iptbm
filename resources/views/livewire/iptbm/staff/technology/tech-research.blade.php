
<x-card-panel title="Research Project Conducted">
    <x-slot:button>
        <x-pop-modal class="max-w-3xl" name="addResearch" modal-title="Update Project Title">
            <form wire:submit.prevent="saveResearchProject" class="space-y-4">
                <div>
                    <x-input-label value="Research Title"/>
                    <x-text-box rows="3" wire:model.lazy="researchTitle"/>
                    <x-input-error :messages="$errors->get('researchTitle')"/>
                </div>
                <div class="space-y-4">


                    <x-secondary-button wire:click.prevent="toggleShowExistingAgencies"
                                        class="text-sky-600 dark:text-sky-500 mt-4 mb-2">
                        @if($showExistingAgencies)
                            Add New Agency?
                        @else
                            Select from Existing Agencies?
                        @endif
                    </x-secondary-button>

                    @if($showExistingAgencies)
                        <div>
                            <x-input-label value="Funding agencies"/>
                            <x-text-input list="agencL" class="w-full" wire:model.lazy="fundingAgency" type="search"
                                          required placeholder="type to search"/>
                            <x-sub-label>
                                <i>
                                    Other funding organizations will be added later.
                                </i>
                            </x-sub-label>
                            <x-data-list id="agencL" :data="$agencies"/>
                            <x-input-error :messages="$errors->get('fundingAgency')"/>
                        </div>

                    @else
                        <div class="border border-gray-400 dark:border-gray-600 rounded-lg p-4 space-y-2"
                             wire:loading.remove wire:target="toggleShowExistingAgencies">
                            <div>
                                <x-input-label value="Agency Name"/>
                                <x-text-input class="w-full" wire:model.lazy="newAgencyName" type="text" required
                                              placeholder="enter text"/>
                                <x-sub-label>
                                    <i>
                                        Other funding organizations will be added later.
                                    </i>
                                </x-sub-label>

                                <x-input-error :messages="$errors->get('newAgencyName')"/>
                            </div>

                            <div>
                                <x-input-label value="Address"/>
                                <x-text-input class="w-full" wire:model.lazy="newAddress" type="text" required
                                              placeholder="enter text"/>
                                <x-input-error :messages="$errors->get('newAddress')"/>
                            </div>
                            <div>
                                <x-input-label value="Head"/>
                                <x-text-input class="w-full" wire:model.lazy="newHead" type="text" required
                                              placeholder="enter text"/>
                                <x-input-error :messages="$errors->get('newHead')"/>
                            </div>

                            <div>
                                <x-input-label value="Designation"/>
                                <x-text-input class="w-full" wire:model.lazy="newDesignation" type="text" required
                                              placeholder="enter text"/>
                                <x-data-list id="agencL" :data="$agencies"/>
                                <x-input-error :messages="$errors->get('newDesignation')"/>
                            </div>

                        </div>

                    @endif


                </div>
                <div wire:loading wire:target="toggleShowExistingAgencies" class="flex gap-2 w-full text-blue-600">
                    Loading...
                </div>
                <div>
                    <x-input-label value=" Amount Invested"/>
                    <x-text-input class="w-full" wire:model.lazy="amountInvested" type="number" step="any"/>
                    <x-input-error :messages="$errors->get('amountInvested')"/>
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
    <div class="divide-gray-200 dark:divide-gray-900 divide-y-8">
        @foreach($techResearchProject as $project)
            <livewire:iptbm.staff.technology.research-conducted wire:key="project-{{$project->id}}" :project="$project"/>
        @endforeach
    </div>
</x-card-panel>

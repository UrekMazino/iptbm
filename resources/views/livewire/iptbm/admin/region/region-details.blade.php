<div>
    <x-header-label>
        Region Details
    </x-header-label>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-14 mt-2">
        <div class="space-y-4">
            <x-card-panel title="Region Name">
                <x-slot:button>
                    <x-pop-modal name="changeRegName" modal-title="Update Region Name" static="true" class="max-w-lg">
                        <form class="space-y-4" wire:submit.prevent="updateRegionName">
                            <div>
                                <x-input-label for="editRegName" value="Region name"/>
                                <x-text-input wire:model.lazy="regionName" id="editRegName" class="w-full"
                                              placeholder="enter text here"/>
                                <x-input-error :messages="$errors->get('regionName')"/>
                            </div>
                            <x-secondary-button wire:loading wire:target="updateRegionName">
                                Processing
                            </x-secondary-button>
                            <x-submit-button type="submit" wire:loading.remove wire:target="updateRegionName">
                                Update
                            </x-submit-button>
                        </form>
                    </x-pop-modal>

                    <x-secondary-button data-modal-toggle="changeRegName">
                        Update
                    </x-secondary-button>
                </x-slot:button>
                <div>
                    {{$region->name}}
                </div>
            </x-card-panel>
            <x-card-panel title="RRDC Chair">
                <x-slot:button>
                    <x-pop-modal name="changeChairName" modal-title="Update RRDC Chair" static="true" class="max-w-lg">
                        <form class="space-y-4" wire:submit.prevent="updaterdeChair">
                            <div>
                                <x-input-label for="editrrdeChair" value="RRDC Chair"/>
                                <x-text-input wire:model.lazy="rrdcChair" id="editrrdeChair" class="w-full"
                                              placeholder="enter text here"/>
                                <x-input-error :messages="$errors->get('rrdcChair')"/>
                            </div>
                            <x-secondary-button wire:loading wire:target="updaterdeChair">
                                Processing
                            </x-secondary-button>
                            <x-secondary-button type="submit" wire:loading.remove wire:target="updaterdeChair">
                                Submit
                            </x-secondary-button>
                        </form>
                    </x-pop-modal>
                    <x-secondary-button data-modal-toggle="changeChairName">
                        Update
                    </x-secondary-button>
                </x-slot:button>
                <div>
                    {{$region->rrdcc_chair}}
                </div>
            </x-card-panel>
            <x-card-panel title="Consortium">
                <x-slot:button>
                    <x-pop-modal name="changeConsort" modal-title="Update Consortium" static="true" class="max-w-lg">
                        <form class="space-y-4" wire:submit.prevent="updateConsortium">
                            <div>
                                <x-input-label for="editconSort" value="Consortium"/>
                                <x-text-input wire:model.lazy="consortium" id="editconSort" class="w-full"
                                              placeholder="enter text here"/>
                                <x-input-error :messages="$errors->get('consortium')"/>
                            </div>
                            <x-secondary-button wire:loading wire:target="updateConsortium">
                                Processing
                            </x-secondary-button>
                            <x-secondary-button type="submit" wire:loading.remove wire:target="updateConsortium">
                                Submit
                            </x-secondary-button>
                        </form>
                    </x-pop-modal>
                    <x-secondary-button data-modal-toggle="changeConsort">
                        Update
                    </x-secondary-button>
                </x-slot:button>
                <div>
                    {{$region->consortium}}
                </div>

            </x-card-panel>

            <x-card-panel title=" Consortium Director">
                <x-slot:button>
                    <x-pop-modal name="changeDir" modal-title="Update Consortium Director" static="true"
                                 class="max-w-lg">
                        <form class="space-y-4" wire:submit.prevent="updateConsortiumDir">
                            <div>
                                <x-input-label for="editDir" value="Consortium Director"/>
                                <x-text-input wire:model.lazy="consortiumDir" id="editDir" class="w-full"
                                              placeholder="enter text here"/>
                                <x-input-error :messages="$errors->get('consortiumDir')"/>
                            </div>
                            <x-secondary-button wire:loading wire:target="updateConsortiumDir">
                                Processing
                            </x-secondary-button>
                            <x-secondary-button type="submit" wire:loading.remove wire:target="updateConsortiumDir">
                                Submit
                            </x-secondary-button>
                        </form>
                    </x-pop-modal>
                    <x-secondary-button data-modal-toggle="changeDir">
                        Update
                    </x-secondary-button>
                </x-slot:button>
                <div>
                    {{$region->consortium_director}}
                </div>

            </x-card-panel>

        </div>
        <div>
            <x-card-panel title="  Agencies">
                <ul class="space-y-2">
                    @forelse($region->agencies as $agency)
                        <li>

                            <a href="{{route("iptbm.admin.view-agency",['agency'=>$agency->id])}}"
                               class="inline-flex items-center justify-center p-3 text-base font-medium text-gray-500 rounded-lg bg-gray-50 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-600 dark:hover:text-white">
                                {{$agency->name}}
                            </a>


                        </li>
                    @empty
                        No data available
                    @endforelse

                </ul>
            </x-card-panel>

        </div>

    </div>
</div>

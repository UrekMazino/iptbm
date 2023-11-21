<x-card-panel title="Region Details">
    <div class="space-y-4">
        <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 flex justify-between items-center">
            <div class="divide-y w-full divide-gray-300 dark:divide-gray-700 ">
                <x-item-header>
                    @if($profile->agency->region->name)
                        {{$profile->agency->region->name}}
                    @else
                        <div class="text-gray-400 dark:text-gray-500 text-base font-normal">
                            No data available
                        </div>
                    @endif
                </x-item-header>
                <div>
                    Region Name
                </div>
            </div>
            <div>
                <x-pop-modal class="max-w-xl" name="editName" static="true" modal-title="Update Region Name">
                    <form class="space-y-4" wire:submit.prevent="saveRegionName">
                        <div>
                            <x-input-label value="Region"/>
                            <x-text-input wire:model.lazy="regionName" class="w-full" placeholder="Enter text here.."/>
                            <x-input-error :messages="$errors->get('regionName')"/>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveRegionName">
                                <div class="p-2 mx-auto text-center" wire:loading.remove wire:target="saveRegionName">
                                    Submit
                                </div>
                                <div class="p-2 mx-auto text-center" wire:loading wire:target="saveRegionName">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>
                <x-secondary-button data-modal-toggle="editName">
                    Edit
                </x-secondary-button>
            </div>
        </div>
        <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 flex justify-between items-center">
            <div class="divide-y w-full divide-gray-300 dark:divide-gray-700 ">
                <x-item-header>
                    @if($profile->agency->region->rrdcc_chair)
                        {{$profile->agency->region->rrdcc_chair}}
                    @else
                        <div class="text-gray-400 dark:text-gray-500 text-base font-normal">
                            No data available
                        </div>
                    @endif
                </x-item-header>
                <div>
                    RRDC Chair
                </div>
            </div>
            <div>
                <x-secondary-button>
                    Edit
                </x-secondary-button>
            </div>
        </div>
        <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 flex justify-between items-center">
            <div class="divide-y divide-gray-300 dark:divide-gray-700 w-full">
                <x-item-header>
                    @if($profile->agency->region->consortium)
                        {{$profile->agency->region->consortium}}
                    @else
                        <div class="text-gray-400 dark:text-gray-500 text-base font-normal">
                            No data available
                        </div>
                    @endif
                </x-item-header>
                <div>
                    Consortium
                </div>
            </div>
            <div>
                <x-secondary-button>
                    Edit
                </x-secondary-button>
            </div>
        </div>
        <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 flex justify-between items-center">
            <div class="divide-y divide-gray-300 dark:divide-gray-700 w-full">
                <x-item-header>
                    @if($profile->agency->region->consortium_director)
                        {{$profile->agency->region->consortium_director}}
                    @else
                        <div class="text-gray-400 dark:text-gray-500 text-base font-normal">
                            No data available
                        </div>
                    @endif
                </x-item-header>
                <div>
                    Consortium Director
                </div>
            </div>
            <div>
                <x-secondary-button>
                    Edit
                </x-secondary-button>
            </div>
        </div>






        </div>


</x-card-panel>

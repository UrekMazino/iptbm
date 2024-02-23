<div class="w-full">
    <nav wire:ignore
         class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="block md:flex justify-start items-center">
                <div class="p-3">

                    <x-link-button :url="route('abh.admin.all_regions')" class="text-sky-700 dark:text-sky-500">
                        <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                        </svg>
                        Back
                    </x-link-button>
                </div>

            </div>

        </nav>

    </nav>

    <div class=" md:px-4 space-y-5">
        <x-header-label class="mt-10">
            Region Details
        </x-header-label>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="space-y-5">
                <x-card-panel title="Region Name">
                    <x-slot:button>
                        <x-pop-modal name="updateRegion" class="max-w-xl" static="true" modal-title="Update Region name">
                            <form class="space-y-5" wire:submit.prevent="update_name">
                                <div>
                                   <x-input-label value="Region Name"/>
                                    <x-text-input wire:model.lazy="region_name" required placeholder="enter text here" class="w-full"/>
                                    <x-input-error :messages="$errors->get('region_name')"/>
                                </div>
                                <div>
                                    <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="update_name">
                                        <div class="w-full text-center p-2" wire:loading.remove wire:target="update_name">
                                            submit
                                        </div>
                                        <div class="w-full text-center p-2" wire:loading wire:target="update_name">
                                            Processing...
                                        </div>
                                    </x-submit-button>
                                </div>
                            </form>
                        </x-pop-modal>
                        <x-secondary-button data-modal-toggle="updateRegion">
                            Update
                        </x-secondary-button>
                    </x-slot:button>
                    <div>
                        {{$region->name}}
                    </div>
                </x-card-panel>
                <x-card-panel title="RRDC Chair">
                    <x-slot:button>
                        <x-pop-modal name="updateRrdc" class="max-w-xl" static="true" modal-title="Update RRDCC">
                            <form class="space-y-5" wire:submit.prevent="update_rrdcc_chair">
                                <div>
                                    <x-input-label value="RRDCC Chair"/>
                                    <x-text-input wire:model.lazy="region_rrdcc_chair" required placeholder="enter full name" class="w-full"/>
                                    <x-input-error :messages="$errors->get('region_rrdcc_chair')"/>
                                </div>
                                <div>
                                    <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="update_rrdcc_chair">
                                        <div class="w-full text-center p-2" wire:loading.remove wire:target="update_rrdcc_chair">
                                            submit
                                        </div>
                                        <div class="w-full text-center p-2" wire:loading wire:target="update_rrdcc_chair">
                                            Processing...
                                        </div>
                                    </x-submit-button>
                                </div>
                            </form>
                        </x-pop-modal>
                        <x-secondary-button data-modal-toggle="updateRrdc">
                            Update
                        </x-secondary-button>
                    </x-slot:button>
                    <div>
                        {{$region->rrdcc_chair}}
                    </div>
                </x-card-panel>
                <x-card-panel title="Consortium">
                    <x-slot:button>
                        <x-pop-modal name="updateConsor" class="max-w-xl" static="true" modal-title="Update Consortium">
                            <form class="space-y-5" wire:submit.prevent="update_consortium">
                                <div>
                                    <x-input-label value="RRDCC Chair"/>
                                    <x-text-input wire:model.lazy="region_consortium" required placeholder="enter ftext here" class="w-full"/>
                                    <x-input-error :messages="$errors->get('region_consortium')"/>
                                </div>
                                <div>
                                    <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="update_consortium">
                                        <div class="w-full text-center p-2" wire:loading.remove wire:target="update_consortium">
                                            submit
                                        </div>
                                        <div class="w-full text-center p-2" wire:loading wire:target="update_consortium">
                                            Processing...
                                        </div>
                                    </x-submit-button>
                                </div>
                            </form>
                        </x-pop-modal>
                        <x-secondary-button data-modal-toggle="updateConsor">
                            Update
                        </x-secondary-button>
                    </x-slot:button>
                    <div>
                        {{$region->consortium}}
                    </div>
                </x-card-panel>
                <x-card-panel title="Consortium Director">
                    <x-slot:button>
                        <x-pop-modal name="updateConsorDir" class="max-w-xl" static="true" modal-title="Update Consortium Director">
                            <form class="space-y-5" wire:submit.prevent="update_consortium_director">
                                <div>
                                    <x-input-label value="RRDCC Chair"/>
                                    <x-text-input wire:model.lazy="region_consortium_director" required placeholder="enter ftext here" class="w-full"/>
                                    <x-input-error :messages="$errors->get('region_consortium_director')"/>
                                </div>
                                <div>
                                    <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="update_consortium_director">
                                        <div class="w-full text-center p-2" wire:loading.remove wire:target="update_consortium_director">
                                            submit
                                        </div>
                                        <div class="w-full text-center p-2" wire:loading wire:target="update_consortium_director">
                                            Processing...
                                        </div>
                                    </x-submit-button>
                                </div>
                            </form>
                        </x-pop-modal>
                        <x-secondary-button data-modal-toggle="updateConsorDir">
                            Update
                        </x-secondary-button>
                    </x-slot:button>
                    <div>
                        {{$region->consortium_director}}
                    </div>
                </x-card-panel>

            </div>
            <div>
                <x-card-panel title="Agencies">
                    <div>
                        <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                            @foreach($region->agencies as $agency)

                                <li>


                                    <a href="{{route("abh.admin.all_agencies.updates",['agency'=>$agency->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">   {{$agency->name}}</a>


                                </li>

                            @endforeach
                        </ul>

                    </div>
                </x-card-panel>
            </div>
        </div>

    </div>
</div>

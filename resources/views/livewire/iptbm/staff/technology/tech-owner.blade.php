
<x-card-panel title="Technology Owner">
    <x-slot:button>
        <x-pop-modal static="true" name="addOwner" class="max-w-2xl" modal-title="Update Technology owner">
            <form class="space-y-4" wire:submit.prevent="addOwner">
                <div>
                    <x-input-label class="my-2">
                        <div>
                            Technology owner
                        </div>
                        <x-text-input wire:model.lazy="ownerModel" list="agenciesList" type="search" class="w-full"
                                      placeholder="type to search.."/>
                        <x-data-list id="agenciesList" :data="$agencies"/>
                        @error('ownerModel')
                        <x-input-error :messages="$message"/>
                        @enderror
                        @error('agencyId')
                        <x-input-error :messages="$message"/>
                        @enderror

                    </x-input-label>
                </div>
               <div>
                   <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="addOwner">
                       <div class="w-full p-2 text-center" wire:target="addOwner" wire:loading>
                           Processing...
                       </div>
                       <div class="w-full p-2 text-center" wire:target="addOwner" wire:loading.remove>
                           Submit
                       </div>
                   </x-submit-button>
               </div>
            </form>
        </x-pop-modal>
        <x-secondary-button data-modal-toggle="addOwner" class="text-sky-600 dark:text-sky-600 ">
            update
        </x-secondary-button>
    </x-slot:button>
    <div class="mt-4">
        <ul class="divide-y divide-gray-400 dark:divide-gray-600">
            @forelse($technology->owner as $key=>$agency)
                <li class="py-2">
                    <livewire:iptbm.staff.technology.tech-owner-detail wire:key="tech-owner-{{$key}}"
                                                                       :techowner="$agency"/>

                </li>
            @empty
                No data Avilable
            @endforelse
        </ul>
    </div>
</x-card-panel>

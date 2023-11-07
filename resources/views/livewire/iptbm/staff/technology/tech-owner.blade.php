<x-card class="shadow-lg">
    <div class="flex justify-between items-center">
        <x-item-header>
            Technology Owner
        </x-item-header>

        <x-pop-modal static="true" name="addOwner" class="max-w-2xl" modal-title="Update Technology owner">
            <form wire:submit.prevent="addOwner">
                <x-input-label class="my-2">
                    <div>
                        Technology owner
                    </div>
                    <x-text-input wire:model.lazy="ownerModel" list="agenciesList" type="search" class="w-full" placeholder="type to search.."/>
                    <x-data-list id="agenciesList" :data="$agencies" />
                    @error('ownerModel')
                    <x-input-error :messages="$message" />
                    @enderror
                    @error('agencyId')
                    <x-input-error :messages="$message" />
                    @enderror

                </x-input-label>
                <x-submit-button disabled wire:loading wire:target="addOwner">
                    Processing
                </x-submit-button>
                <x-submit-button wire:loading.remove wire:target="addOwner">
                    Submit
                </x-submit-button>
            </form>
        </x-pop-modal>
        <x-secondary-button data-modal-toggle="addOwner" class="text-sky-600 dark:text-sky-600 ">
            update
        </x-secondary-button>
    </div>

    <div class="mt-4">
        <ul class="divide-y divide-gray-400 dark:divide-gray-600">
            @foreach($technology->owner as $key=>$agency)
                <li class="py-2">
                    <livewire:iptbm.staff.technology.tech-owner-detail wire:key="tech-owner-{{$key}}"  :techowner="$agency" />

                </li>
            @endforeach
        </ul>
    </div>
</x-card>

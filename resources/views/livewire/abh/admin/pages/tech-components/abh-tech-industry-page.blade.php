<div class="w-full">
    <x-pop-modal modal-title="Add new Technology Industry" class="max-w-xl" static="true" name="addNewIndustry">
        <form class="space-y-5" wire:submit.prevent="save_industry">
            <div>
                <x-input-label value="New Industry" />
                <x-text-input wire:model.lazy="industry_name" class="w-full" placeholder="enter text here" required />
                <x-input-error :messages="$errors->get('industry_name')"/>
            </div>
            <div>
                <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="save_industry">
                    <div class="p-2 w-full text-center" wire:loading.remove wire:target="save_industry">
                        Submit
                    </div>
                    <div class="p-2 w-full text-center" wire:loading wire:target="save_industry">
                        Processing...
                    </div>
                </x-submit-button>
            </div>
        </form>
    </x-pop-modal>
    <nav wire:ignore
         class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="block md:flex justify-between items-center">
                <div class="ps-4 py-3">

                    <x-secondary-button data-modal-toggle="addNewIndustry">
                        Add new Industry
                    </x-secondary-button>
                </div>

            </div>

        </nav>

    </nav>
    <div class=" md:px-4 mt-16">
        <x-header-label class="mb-2">
            Technology Industries
        </x-header-label>
        <x-grid col="3" gap="6">
            @foreach($industries as $key=>$industry)
                <div>
                   <livewire:abh.admin.component.tech-component.industry-card wire:key="industry-{{$key}}" :industry="$industry" />
                </div>
            @endforeach
        </x-grid>
    </div>
</div>

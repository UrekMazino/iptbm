<div>
    <x-card-panel title="Current Region">
        <x-slot:button>
            <x-pop-modal static="true" modal-title="Update Region" name="popUpReg" class="max-w-xl">
                <form class="space-y-5" wire:submit.prevent="update_region">
                    <div>
                        <x-input-label value="Regions"/>
                        <x-text-input list="regionList" wire:model="region_name" class="w-full" type="search" required placeholder="select region"/>
                        <x-data-list id="regionList" >
                            @foreach($regions as $region)
                                <option value="{{$region->name}}"></option>
                            @endforeach
                        </x-data-list>
                        <x-input-error :messages="$errors->get('region_name')"/>
                    </div>
                    <div>
                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="update_region">
                            <div class="p-2 w-full text-center" wire:loading wire:target="update_region">
                                Processing...
                            </div>
                            <div class="p-2 w-full text-center" wire:loading.remove wire:target="update_region">
                                Submit
                            </div>
                        </x-submit-button>
                    </div>
                </form>
            </x-pop-modal>
            <x-secondary-button data-modal-toggle="popUpReg" class="text-sky-500 dark:text-sky-500">
                Update Region
            </x-secondary-button>
        </x-slot:button>
        <div>
            <div>
                <a href="{{route("iptbm.admin.editregion.index",['id'=>$agency->region->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{$agency->region->name}}</a>
            </div>

        </div>

    </x-card-panel>

</div>

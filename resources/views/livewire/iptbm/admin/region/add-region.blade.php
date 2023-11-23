<div>

    <x-pop-modal name="addRegionMod" static="true" modal-title="Add new Region" class="max-w-xl">
        <form class="space-y-10" wire:submit.prevent="saveForm">
            <div class="space-y-3">
                <div>
                    <x-input-label for="reg" value="Region name"/>
                    <x-text-input wire:model.lazy="region_name" class="w-full" id="reg" placeholder="enter text here"/>
                    <x-input-error :messages="$errors->get('region_name')"/>
                </div>
                <div>
                    <x-input-label for="rrdc" value="RRDC Chair"/>
                    <x-text-input wire:model.lazy="region_rrdcc_chair" class="w-full" id="rrdc"
                                  placeholder="enter text here"/>
                    <x-input-error :messages="$errors->get('region_rrdcc_chair')"/>
                </div>
                <div>
                    <x-input-label for="consor" value="Consortium"/>
                    <x-text-input wire:model.lazy="region_consortium" class="w-full" id="consor"
                                  placeholder="enter text here"/>
                    <x-input-error :messages="$errors->get('region_consortium')"/>
                </div>
                <div>
                    <x-input-label for="consDir" value="Consortium Director"/>
                    <x-text-input wire:model.lazy="region_consortium_director" class="w-full" id="consDir"
                                  placeholder="enter text here"/>
                    <x-input-error :messages="$errors->get('region_consortium_director')"/>
                </div>
            </div>
            <x-submit-button disabled wire:loading wire:target="saveForm">
                Processing
            </x-submit-button>
            <x-submit-button wire:loading.remove wire:target="saveForm">
                Submit
            </x-submit-button>
        </form>
    </x-pop-modal>

</div>

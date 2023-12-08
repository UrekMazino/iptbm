<div>
    <x-pop-modal name="extendProj-{{$perYear->id}}" class="max-w-md" modal-title="Extend Project">
        <form class="space-y-6" wire:submit.prevent="saveExtend">
            <div>
                <x-input-label value="Duration"/>
                <x-text-input wire:model.lazy="extendDuration" min="0" class="w-full" type="number" placeholder="enter number"/>
                <x-input-error :messages="$errors->get('extendDuration')" />
            </div>
            <div>
                <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveExtend">
                    <div class="w-full p-2" wire:loading wire:target="saveExtend">
                        Processing...
                    </div>
                    <div class="w-full p-2" wire:loading.remove wire:target="saveExtend">
                        Submit
                    </div>
                </x-submit-button>
            </div>
        </form>
    </x-pop-modal>
    @if($perYear->extended_duration)
        <div class="w-full h-full flex justify-between items-center">
            <div class="w-full">
                Month(s) : {{$perYear->extended_duration}}
                <div>
                 End:    {{\Carbon\Carbon::parse($perYear->date_started)->addMonths($perYear->duration+$perYear->extended_duration)->setDay(\Carbon\Carbon::parse($perYear->date_started)->day-1)->format('F-d-Y')}}
                </div>

            </div>
            <div>
                <x-pop-modal class="max-w-md" name="updatedExtension-{{$perYear->id}}" static="true" modal-title="Update Project Extension">
                    <form class="space-y-4" wire:submit.prevent="saveExtend">
                        <div>
                            <x-input-label value="Duration in months"/>
                            <x-text-input wire:model.lazy="extendDuration" type="number" placeholder="enter number of duration" class="w-full"/>
                            <x-input-error :messages="$errors->get('extendDuration')"/>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveExtend">
                                <div class="w-fit m-auto p-2" wire:loading wire:target="saveExtend">
                                    Processing...
                                </div>
                                 <div class="w-fit m-auto p-2" wire:loading.remove wire:target="saveExtend">
                                        Submit
                                 </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>

                <x-secondary-button data-modal-toggle="updatedExtension-{{$perYear->id}}">
                    Update
                </x-secondary-button>
            </div>
        </div>
    @else
        <x-secondary-button data-modal-toggle="extendProj-{{$perYear->id}}">
            Extend
        </x-secondary-button>
    @endif

</div>

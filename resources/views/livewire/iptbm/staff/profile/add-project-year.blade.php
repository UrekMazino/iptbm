
<x-pop-modal modal-title="Add Additional Project Year" name="authentication-modal-addYearProj" class="max-w-xl" static="true">
    <form class="space-y-10" wire:submit.prevent="saveProjectYear">
        <div class="space-y-4">
            <div>
                <x-input-label value=" Date of Implementation"/>
                <div class="relative w-full ">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <x-text-input wire:model.lazy="startingDate" id="yewYear" readonly
                                  class="pl-10 p-2.5 w-full" autocomplete="off" datepicker
                                  datepicker-format="MM-dd-yyyy" placeholder="select date"/>

                </div>
                <x-input-error :messages="$errors->get('startingDate')"/>
            </div>
            <div>
                <x-input-label value="Duration"/>
                <x-text-input placeholder="number of months" wire:model.lazy="duration" type="number" class="w-full p-2"/>
                <x-input-error :messages="$errors->get('duration')"/>
            </div>
            <div>
                <x-input-label value="Budget"/>
                <x-text-input placeholder="enter amount" wire:model.lazy="budget" type="number" step="any" class="w-full p-2"/>
                <x-input-error :messages="$errors->get('budget')"/>
            </div>
        </div>
        <div>
            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveChanges">
                <div class="w-full text-center p-2" wire:loading wire:target="saveChanges">
                    Processing...
                </div>
                <div class="w-full text-center p-2" wire:loading.remove wire:target="saveChanges">
                    Submit
                </div>
            </x-submit-button>
        </div>



    </form>
</x-pop-modal>

@push('scripts')
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {

            document.getElementById('yewYear').addEventListener('changeDate', (event) => {

                @this.
                startingDate = event.target.value;

            });

        });
    </script>
@endpush

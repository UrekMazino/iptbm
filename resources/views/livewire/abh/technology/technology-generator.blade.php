<x-card-panel title="Technology Generator">
    <x-slot:button>
        <x-pop-modal name="updateTechGen" class="max-w-xl" modal-title="Update Technology Generators">
            <form class="space-y-5">
                <div class="space-y-4">
                   <div>
                       <x-input-label value="Generator/Inventor"/>
                       <x-text-input list="techGen" type="search" class="w-full" placeholder="enter text here"/>
                       <x-data-list id="techGen">
                           @foreach($generators as $generator)
                               <option value="{{$generator->id}}.) {{$generator}}"></option>
                           @endforeach
                           <option value=""></option>
                       </x-data-list>
                   </div>
                    <div>
                        <x-input-label value=" Date affiliated"/>
                        <div class="relative w-full ">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <x-text-input  id="datedAff" autocomplete="off" wire:model.lazy="dateAffiliated"
                                           type="text" class="pl-10 p-2.5 w-full" datepicker datepicker-format="MM-dd-yyyy"
                                           placeholder="select date"/>
                        </div>
                    </div>
                </div>
                <div>
                    <x-submit-button class="min-w-full">
                        <div class="p-2 w-full text-center">
                            Submit
                        </div>
                    </x-submit-button>
                </div>
            </form>
        </x-pop-modal>

        <x-secondary-button data-modal-toggle="updateTechGen" data-modal-target="updateTechGen">
            Update
        </x-secondary-button>
    </x-slot:button>
</x-card-panel>
@push('scripts')
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {

            document.getElementById('datedAff').addEventListener('changeDate', (event) => {
                @this.dateAffiliated = event.target.value;
            });
        });
    </script>
@endpush

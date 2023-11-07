<div wire:ignore.self id="authentication-modal-addYearProj" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal-addYearProj">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Additional Project Year</h3>
                <form class="space-y-6" wire:submit.prevent="saveProjectYear">
                    <x-input-label>
                        <div>
                            Date of Implementation
                        </div>
                        <div class="relative w-full ">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <x-text-input wire:model.lazy="startingDate" id="yewYear" readonly class="pl-10 p-2.5 w-full" autocomplete="off" datepicker datepicker-format="MM-dd-yyyy" placeholder="select date" />

                        </div>
                        <div wire:loading wire:target="startingDate">
                            <x-input-label >
                                Loading...
                            </x-input-label>
                        </div>

                        @error('startingDate')
                        <x-input-error :messages="$message" />
                        @enderror
                    </x-input-label>


                    <x-input-label>
                        <div>
                            Duration
                        </div>
                        <x-text-input wire:model.lazy="duration"  type="number" class="w-full p-2" />
                        @error('duration')
                        <x-input-error :messages="$message" />
                        @enderror
                    </x-input-label>




                    @if($endDate)
                        <x-input-label wire:loading.remove wire:target="duration">
                            <div class="mt-2 w-full flex-wrap">
                                <div>
                                    Project Ends:
                                </div>
                                <div class="font-thin">
                                    {{$endDate->format('F-d-Y')}}
                                </div>
                            </div>
                        </x-input-label>

                    @endif

                    <x-input-label>
                        <div>
                            Budget
                        </div>
                        <x-text-input wire:model.lazy="budget"   type="number" step="any" class="w-full p-2" />
                        @error('budget')
                        <x-input-error :messages="$message" />
                        @enderror
                    </x-input-label>

                    <x-secondary-button wire:loading.remove wire:target="saveChanges" type="submit" class="text-sky-600 w-full text-center  dark:text-sky-600" >
                        <div class="text-center m-auto">
                            Submit
                        </div>
                    </x-secondary-button>


                    <x-secondary-button readonly wire:loading wire:target="saveChanges" class="text-sky-600 w-full text-center  dark:text-sky-600" >
                        <div class="text-center m-auto">
                            Processing...
                        </div>
                    </x-secondary-button>

                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {

            document.getElementById('yewYear').addEventListener('changeDate', (event) => {

                @this.startingDate=event.target.value;

            });

        });
    </script>
@endpush

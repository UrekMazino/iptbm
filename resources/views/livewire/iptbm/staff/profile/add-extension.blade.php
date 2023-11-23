<div wire:ignore.self data-modal-backdrop="static" id="authentication-modal-extend-{{$projectYear->id}}" tabindex="-1"
     aria-hidden="true"
     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="authentication-modal-extend-{{$projectYear->id}}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Extend Project</h3>
                <form class="space-y-6" wire:submit.prevent="saveExtension">

                    <x-input-label>
                        <div>
                            Extension Duration (in months)
                        </div>
                        <x-text-input autocomplete="off" wire:model="extensionDuration"
                                      placeholder="Enter number of duration" id="name" type="number" class="w-full"/>
                        @error('extensionDuration')
                        <x-input-error :messages="$message"/>
                        @enderror
                    </x-input-label>
                    @if($extendedEndDate)
                        <x-input-label>
                          <span class="text-lg">
                               Project Extension Ends :
                          </span> {{$extendedEndDate}}
                        </x-input-label>
                    @endif

                    <x-secondary-button wire:loading wire:target="saveExtension" disabled
                                        class="text-sky-600  dark:text-sky-600 w-full">
                        <div class="m-auto text-center">
                            Processing
                        </div>
                    </x-secondary-button>

                    <x-secondary-button wire:loading.remove wire:target="saveExtension" type="submit"
                                        class="text-sky-600  dark:text-sky-600 w-full">
                        <div class="m-auto text-center">
                            Submit
                        </div>
                    </x-secondary-button>
                </form>
            </div>
        </div>
    </div>
</div>

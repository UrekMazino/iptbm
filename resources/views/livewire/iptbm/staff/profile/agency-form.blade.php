<div class="space-y-4">
    <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 flex justify-between items-center">
        <div class="divide-y w-full divide-gray-300 dark:divide-gray-700 ">
            @if($profile->agency->name)
               <div class="text-gray-600 dark:text-white font-medium">
                   {{$profile->agency->name}}
               </div>
            @else
                <div class="text-gray-400 dark:text-gray-500 text-base font-normal">
                    No data available
                </div>
            @endif
            <div>
                Agency
            </div>
        </div>
        <div>
            <x-pop-modal class="max-w-xl" name="editName" static="true" modal-title="Update Agency Name">
                <form class="space-y-4" wire:submit.prevent="agencyName">
                    <div>
                        <x-input-label value="Agency"/>
                        <x-text-input wire:model.lazy="agency_name" class="w-full" placeholder="Enter text here.."/>
                        <x-input-error :messages="$errors->get('agency_name')"/>
                    </div>
                    <div>
                        <x-submit-button class="min-w-full" wire:loading.attr="disabled"
                                         wire:target="agencyName">
                            <div class="p-2 mx-auto text-center" wire:loading.remove wire:target="agencyName">
                                Submit
                            </div>
                            <div class="p-2 mx-auto text-center" wire:loading wire:target="agencyName">
                                Processing...
                            </div>
                        </x-submit-button>
                    </div>
                </form>
            </x-pop-modal>
            <x-secondary-button data-modal-toggle="editName">
                Edit
            </x-secondary-button>
        </div>
    </div>
    @if($showAgencyHeadForm)
        <div class="rounded-lg bg-gray-50 shadow-lg dark:bg-gray-800 p-4">
            <form wire:submit.prevent="save">
                <div class="relative">
                    <input wire:model="agency_head" type="text" id="floating_outlined"
                           class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                           placeholder=" " value="{{$agency_head}}"/>
                    <label for="floating_outlined"
                           class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-gray-50 dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Agency
                        Head </label>
                </div>
                <div class="grid grid-cols-2 text-center mt-4">
                    <div>
                        <button wire:click="showAgencyHeadForm" type="button"
                                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                            CANCEL
                        </button>
                    </div>
                    <div>
                        <button type="submit"
                                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                            SAVE
                        </button>
                    </div>
                </div>
            </form>
        </div>

    @endif
    <div class="my-4 w-full">

    </div>
    <div class="text-lg text-gray-700 dark:text-gray-300 mb-3">

        @if($profile->agency->head->count()>0)

            {{$profile->agency->head->head}}
        @else
            Empty
        @endif
        @if(!$showAgencyHeadForm)
            <button wire:click="showAgencyHeadForm" type="button"
                    class="text-blue-500 hover:scale-125 transition duration-300">
                <span class="fa-solid fa-edit me-2 ms-5"></span>Edit
            </button>
        @endif

        <div class="text-gray-500">
            Agency Head
        </div>
    </div>

</div>


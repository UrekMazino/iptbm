<div wire:ignore.self id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
            <button type="button" id="closeAddRec"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="staticModal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add new Inventor</h3>
                <form class="space-y-6" wire:submit.prevent="saveRecord">
                    <div class="space-y-2">
                        <div>
                            <x-input-label>
                                <div>
                                    First Name
                                </div>
                                <x-text-input wire:model="fname" placeholder="enter first name"
                                              class="w-full uppercase "/>
                            </x-input-label>
                            @error('fname')
                            <x-input-error :messages="$message"/>
                            @enderror
                        </div>
                        <div>
                            <x-input-label>
                                <div>
                                    Middle Initial
                                </div>
                                <x-text-input wire:model="mname" maxlength="1" placeholder="enter first name"
                                              class="w-full uppercase "/>
                            </x-input-label>
                            @error('mname')
                            <x-input-error :messages="$message"/>
                            @enderror
                        </div>
                        <div>
                            <x-input-label>
                                <div>
                                    Last Name
                                </div>
                                <x-text-input wire:model="lname" placeholder="enter first name"
                                              class="w-full uppercase "/>
                            </x-input-label>
                            @error('lname')
                            <x-input-error :messages="$message"/>
                            @enderror
                        </div>
                        <div>
                            <x-input-label>
                                <div>
                                    Suffixes
                                </div>
                                <x-text-input maxlength="5" wire:model="sname" placeholder="JR,SR,I,II,..."
                                              class="w-full uppercase "/>
                            </x-input-label>
                            @error('sname')
                            <x-input-error :messages="$message"/>
                            @enderror
                        </div>
                    </div>
                    <div>

                        <x-input-label>
                            <div>
                                Address
                            </div>
                            <x-text-input wire:model="address" placeholder="enter address" class="w-full"/>
                        </x-input-label>
                        @error('address')
                        <x-input-error :messages="$message"/>
                        @enderror
                    </div>
                    <div>
                        <x-input-label>
                            <div>
                                Availability / Professional Status
                            </div>
                            <x-input-select wire:model="status">
                                <option selected value="">Select Status</option>
                                <option value="ACTIVE">ACTIVE</option>
                                <option value="RETIRED">RETIRED</option>
                                <option value="DECEASED">DECEASED</option>
                            </x-input-select>
                            @error('status')
                            <x-input-error :messages="$message"/>
                            @enderror
                        </x-input-label>
                    </div>
                    @error('fullName')
                    <x-input-error :messages="$message"/>
                    @enderror
                    <button wire:loading wire:target="saveRecord" type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition duration-300">
                        Processing...
                    </button>
                    <button wire:loading.remove wire:target="saveRecord" type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition duration-300">
                        Save
                    </button>
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        <button type="reset" id="cancelAddrec"
                                class="w-full text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-800 dark:focus:ring-blue-800 transition duration-300">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

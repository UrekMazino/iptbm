<div class="w-full space-y-6 md:col-span-2">
    <x-card class="shadow-lg">
        <div class="flex justify-between items-center">
            <x-input-label class="font-medium text-xl">
                Market Study
            </x-input-label>
            <div wire:ignore.self id="authentication-market-precom" tabindex="-1" aria-hidden="true"
                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="authentication-market-precom">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add new Attachment</h3>
                            <form class="space-y-6" wire:submit.prevent="saveMarketModel">
                                <x-input-label>
                                    <div>
                                        File Description
                                    </div>
                                    <x-text-box wire:model="marketModelDescription" rows="3"/>
                                    <x-sub-label class="uppercase"
                                                 value="Attachment basic description (MAX of 100 characters)"/>
                                    @error('marketModelDescription')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>

                                <x-input-label>
                                    <div>
                                        Upload file
                                    </div>
                                    <x-text-input accept="application/pdf,image/png,image/jpeg"
                                                  wire:model="marketModelFile" type="file"/>
                                    <x-sub-label value="PNG, JPG or PDF (MAX. 20 MB)"/>
                                    @error('marketModelFile')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>

                                <x-submit-button wire:loading wire:target="saveMarketModel" disabled>
                                    Processing...
                                </x-submit-button>
                                <x-submit-button wire:loading.remove wire:target="saveMarketModel">
                                    Submit
                                </x-submit-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <x-secondary-button data-modal-target="authentication-market-precom"
                                data-modal-toggle="authentication-market-precom" class="text-sky-600 dark:text-sky-600">
                <svg class="w-5 me-2 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 20 20">
                    <path
                        d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
                </svg>
                Add File
            </x-secondary-button>
        </div>
        @if($precom->market_study_files->count()>0)
            <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-4">
                @foreach($precom->market_study_files as $key=>$file)
                    <li class="py-3 transition duration-300 hover:bg-gray-200 hover:dark:bg-gray-800 hover:text-gray-800 hover:dark:text-white text-gray-600 dark:text-gray-400">
                        <livewire:iptbm.staff.precom.file-holder wire:key="market-{{$key}}-{{$file->id}}"
                                                                 univ-id="market" :file="$file"/>
                    </li>
                @endforeach


            </ul>
        @else
            <x-sub-label>
                No data available
            </x-sub-label>
        @endif
    </x-card>

    <x-card class="shadow-lg">
        <div class="flex justify-between items-center">
            <x-input-label class="font-medium text-xl">
                Valuation Summary
            </x-input-label>
            <div wire:ignore.self id="authentication-valuation-precom" tabindex="-1" aria-hidden="true"
                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="authentication-valuation-precom">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add new Attachment</h3>
                            <form class="space-y-6" wire:submit.prevent="saveValuationModel">
                                <x-input-label>
                                    <div>
                                        File Description
                                    </div>
                                    <x-text-box wire:model="valuationDescription" rows="3"/>
                                    <x-sub-label class="uppercase"
                                                 value="Attachment basic description (MAX of 100 characters)"/>
                                    @error('valuationDescription')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>

                                <x-input-label>
                                    <div>
                                        Upload file
                                    </div>
                                    <x-text-input accept="application/pdf,image/png,image/jpeg"
                                                  wire:model="valuationFile" type="file"/>
                                    <x-sub-label value="PNG, JPG or PDF (MAX. 20 MB)"/>
                                    @error('valuationFile')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>

                                <x-submit-button wire:loading wire:target="saveValuationModel" disabled>
                                    Processing...
                                </x-submit-button>
                                <x-submit-button wire:loading.remove wire:target="saveValuationModel">
                                    Submit
                                </x-submit-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <x-secondary-button data-modal-target="authentication-valuation-precom"
                                data-modal-toggle="authentication-valuation-precom"
                                class="text-sky-600 dark:text-sky-600">
                <svg class="w-5 me-2 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 20 20">
                    <path
                        d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
                </svg>
                Add File
            </x-secondary-button>
        </div>
        @if($precom->valuation_summary_files->count()>0)
            <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-4">
                @foreach($precom->valuation_summary_files as $key=>$file)
                    <li class="py-3 transition duration-300 hover:bg-gray-200 hover:dark:bg-gray-800 hover:text-gray-800 hover:dark:text-white text-gray-600 dark:text-gray-400">
                        <livewire:iptbm.staff.precom.file-holder wire:key="valuation-{{$key}}-{{$file->id}}"
                                                                 univ-id="valuation" :file="$file"/>
                    </li>
                @endforeach


            </ul>
        @else
            <x-sub-label>
                No data available
            </x-sub-label>
        @endif

    </x-card>
    <x-card class="shadow-lg">
        <div class="flex justify-between items-center">
            <x-input-label class="font-medium text-xl">
                Freedom to Operate Summary
            </x-input-label>
            <div wire:ignore.self id="authentication-freedom-precom" tabindex="-1" aria-hidden="true"
                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="authentication-freedom-precom">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add new Attachment</h3>
                            <form class="space-y-6" wire:submit.prevent="saveFreedomModel">
                                <x-input-label>
                                    <div>
                                        File Description
                                    </div>
                                    <x-text-box wire:model="freedomDescription" rows="3"/>
                                    <x-sub-label class="uppercase"
                                                 value="Attachment basic description (MAX of 100 characters)"/>
                                    @error('freedomDescription')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>

                                <x-input-label>
                                    <div>
                                        Upload file
                                    </div>
                                    <x-text-input accept="application/pdf,image/png,image/jpeg" wire:model="freedomFile"
                                                  type="file"/>
                                    <x-sub-label value="PNG, JPG or PDF (MAX. 20 MB)"/>
                                    @error('freedomFile')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>

                                <x-submit-button wire:loading wire:target="saveFreedomModel" disabled>
                                    Processing...
                                </x-submit-button>
                                <x-submit-button wire:loading.remove wire:target="saveFreedomModel">
                                    Submit
                                </x-submit-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <x-secondary-button data-modal-target="authentication-freedom-precom"
                                data-modal-toggle="authentication-freedom-precom"
                                class="text-sky-600 dark:text-sky-600">
                <svg class="w-5 me-2 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 20 20">
                    <path
                        d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
                </svg>
                Add File
            </x-secondary-button>
        </div>
        @if($precom->freedom_summary_files->count()>0)
            <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-4">
                @foreach($precom->freedom_summary_files as $key=>$file)
                    <li class="py-3 transition duration-300 hover:bg-gray-200 hover:dark:bg-gray-800 hover:text-gray-800 hover:dark:text-white text-gray-600 dark:text-gray-400">
                        <livewire:iptbm.staff.precom.file-holder wire:key="freedom-{{$key}}-{{$file->id}}"
                                                                 univ-id="freedom" :file="$file"/>
                    </li>
                @endforeach


            </ul>
        @else
            <x-sub-label>
                No data available
            </x-sub-label>
        @endif
    </x-card>
    <x-card class="shadow-lg">
        <div class="flex justify-between items-center">
            <x-input-label class="font-medium text-xl">
                Proposed Term Sheet
            </x-input-label>
            <div wire:ignore.self id="authentication-termsheet-precom" tabindex="-1" aria-hidden="true"
                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="authentication-termsheet-precom">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add new Attachment</h3>
                            <form class="space-y-6" wire:submit.prevent="saveTermSheetModel">
                                <x-input-label>
                                    <div>
                                        File Description
                                    </div>
                                    <x-text-box wire:model="termSheetDescription" rows="3"/>
                                    <x-sub-label class="uppercase"
                                                 value="Attachment basic description (MAX of 100 characters)"/>
                                    @error('termSheetDescription')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>

                                <x-input-label>
                                    <div>
                                        Upload file
                                    </div>
                                    <x-text-input accept="application/pdf,image/png,image/jpeg"
                                                  wire:model="termSheetFile" type="file"/>
                                    <x-sub-label value="PNG, JPG or PDF (MAX. 20 MB)"/>
                                    @error('termSheetFile')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>

                                <x-submit-button wire:loading wire:target="saveTermSheetModel" disabled>
                                    Processing...
                                </x-submit-button>
                                <x-submit-button wire:loading.remove wire:target="saveTermSheetModel">
                                    Submit
                                </x-submit-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <x-secondary-button data-modal-target="authentication-termsheet-precom"
                                data-modal-toggle="authentication-termsheet-precom"
                                class="text-sky-600 dark:text-sky-600">
                <svg class="w-5 me-2 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 20 20">
                    <path
                        d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
                </svg>
                Add File
            </x-secondary-button>
        </div>

        @if($precom->term_sheet_files->count()>0)
            <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-4">
                @foreach($precom->term_sheet_files as $key=>$file)
                    <li class="py-3 transition duration-300 hover:bg-gray-200 hover:dark:bg-gray-800 hover:text-gray-800 hover:dark:text-white text-gray-600 dark:text-gray-400">
                        <livewire:iptbm.staff.precom.file-holder wire:key="termsheet-{{$key}}-{{$file->id}}"
                                                                 univ-id="termsheet" :file="$file"/>
                    </li>
                @endforeach


            </ul>
        @else
            <x-sub-label>
                No data available
            </x-sub-label>
        @endif
    </x-card>
    <x-card class="shadow-lg">
        <div class="flex justify-between items-center">
            <x-input-label class="font-medium text-xl">
                Licensing Agreement Copy
            </x-input-label>
            <div wire:ignore.self id="authentication-agreement-precom" tabindex="-1" aria-hidden="true"
                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="authentication-agreement-precom">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add new Attachment</h3>
                            <form class="space-y-6" wire:submit.prevent="saveAgreementModel">
                                <x-input-label>
                                    <div>
                                        File Description
                                    </div>
                                    <x-text-box wire:model="agreementDescription" rows="3"/>
                                    <x-sub-label class="uppercase"
                                                 value="Attachment basic description (MAX of 100 characters)"/>
                                    @error('agreementDescription')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>

                                <x-input-label>
                                    <div>
                                        Upload file
                                    </div>
                                    <x-text-input accept="application/pdf,image/png,image/jpeg"
                                                  wire:model="agreementFile" type="file"/>
                                    <x-sub-label value="PNG, JPG or PDF (MAX. 20 MB)"/>
                                    @error('agreementFile')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>

                                <x-submit-button wire:loading wire:target="saveAgreementModel" disabled>
                                    Processing...
                                </x-submit-button>
                                <x-submit-button wire:loading.remove wire:target="saveAgreementModel">
                                    Submit
                                </x-submit-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <x-secondary-button data-modal-target="authentication-agreement-precom"
                                data-modal-toggle="authentication-agreement-precom"
                                class="text-sky-600 dark:text-sky-600">
                <svg class="w-5 me-2 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 20 20">
                    <path
                        d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
                </svg>
                Add File
            </x-secondary-button>
        </div>

        @if($precom->license_agreement_copies->count()>0)
            <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-4">
                @foreach($precom->license_agreement_copies as $key=>$file)
                    <li class="py-3 transition duration-300 hover:bg-gray-200 hover:dark:bg-gray-800 hover:text-gray-800 hover:dark:text-white text-gray-600 dark:text-gray-400">
                        <livewire:iptbm.staff.precom.file-holder wire:key="agreement-{{$key}}-{{$file->id}}"
                                                                 univ-id="agreement" :file="$file"/>
                    </li>
                @endforeach


            </ul>
        @else
            <x-sub-label>
                No data available
            </x-sub-label>
        @endif
    </x-card>
    <x-card class="shadow-lg">
        <div class="flex justify-between items-center">
            <x-input-label class="font-medium text-xl">
                Financial/Economic Analysis
            </x-input-label>
            <div wire:ignore.self id="authentication-financial-precom" tabindex="-1" aria-hidden="true"
                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="authentication-financial-precom">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add ddnew Attachment</h3>
                            <form class="space-y-6" wire:submit.prevent="saveFinancialModel">
                                <x-input-label>
                                    <div>
                                        File Description
                                    </div>
                                    <x-text-box wire:model="financialDescription" rows="3"/>
                                    <x-sub-label class="uppercase"
                                                 value="Attachment basic description (MAX of 100 characters)"/>
                                    @error('financialDescription')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>

                                <x-input-label>
                                    <div>
                                        Upload file
                                    </div>
                                    <x-text-input accept="application/pdf,image/png,image/jpeg"
                                                  wire:model="financialFile" type="file"/>
                                    <x-sub-label value="PNG, JPG or PDF (MAX. 20 MB)"/>
                                    @error('financialFile')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>

                                <x-submit-button wire:loading wire:target="saveFinancialModel" disabled>
                                    Processing...
                                </x-submit-button>
                                <x-submit-button wire:loading.remove wire:target="saveFinancialModel">
                                    Submit
                                </x-submit-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <x-secondary-button data-modal-target="authentication-financial-precom"
                                data-modal-toggle="authentication-financial-precom"
                                class="text-sky-600 dark:text-sky-600">
                <svg class="w-5 me-2 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 20 20">
                    <path
                        d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
                </svg>
                Add File
            </x-secondary-button>
        </div>

        @if($precom->financial_annalysis->count()>0)
            <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-4">
                @foreach($precom->financial_annalysis as $key=>$file)
                    <li class="py-3 transition duration-300 hover:bg-gray-200 hover:dark:bg-gray-800 hover:text-gray-800 hover:dark:text-white text-gray-600 dark:text-gray-400">
                        <livewire:iptbm.staff.precom.file-holder wire:key="financial-{{$key}}-{{$file->id}}"
                                                                 univ-id="financial" :file="$file"/>
                    </li>
                @endforeach


            </ul>
        @else
            <x-sub-label>
                No data available
            </x-sub-label>
        @endif
    </x-card>
    <x-card class="shadow-lg">
        <div class="flex justify-between items-center">
            <x-input-label class="font-medium text-xl">
                Machine Testing and Certification
            </x-input-label>
            <div wire:ignore.self id="authentication-certification-precom" tabindex="-1" aria-hidden="true"
                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="authentication-certification-precom">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add ddnew Attachment</h3>
                            <form class="space-y-6" wire:submit.prevent="saveMachineTestModel">
                                <x-input-label>
                                    <div>
                                        File Description
                                    </div>
                                    <x-text-box wire:model="certificateDescription" rows="3"/>
                                    <x-sub-label class="uppercase"
                                                 value="Attachment basic description (MAX of 100 characters)"/>
                                    @error('certificateDescription')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>

                                <x-input-label>
                                    <div>
                                        Upload file
                                    </div>
                                    <x-text-input accept="application/pdf,image/png,image/jpeg"
                                                  wire:model="certificateFile" type="file"/>
                                    <x-sub-label value="PNG, JPG or PDF (MAX. 20 MB)"/>
                                    @error('certificateFile')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>

                                <x-submit-button wire:loading wire:target="saveMachineTestModel" disabled>
                                    Processing...
                                </x-submit-button>
                                <x-submit-button wire:loading.remove wire:target="saveMachineTestModel">
                                    Submit
                                </x-submit-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <x-secondary-button data-modal-target="authentication-certification-precom"
                                data-modal-toggle="authentication-certification-precom"
                                class="text-sky-600 dark:text-sky-600">
                <svg class="w-5 me-2 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 20 20">
                    <path
                        d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
                </svg>
                Add File
            </x-secondary-button>
        </div>

        @if($precom->testing_certification->count()>0)
            <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-4">
                @foreach($precom->testing_certification as $key=>$file)
                    <li class="py-3 transition duration-300 hover:bg-gray-200 hover:dark:bg-gray-800 hover:text-gray-800 hover:dark:text-white text-gray-600 dark:text-gray-400">
                        <livewire:iptbm.staff.precom.file-holder wire:key="certification-{{$key}}-{{$file->id}}"
                                                                 univ-id="certification" :file="$file"/>
                    </li>
                @endforeach


            </ul>
        @else
            <x-sub-label>
                No data available
            </x-sub-label>
        @endif
    </x-card>
    <x-card class="shadow-lg">
        <div class="flex justify-between items-center">
            <x-input-label class="font-medium text-xl">
                Feasibility Study
            </x-input-label>
            <div wire:ignore.self id="authentication-feasibility-precom" tabindex="-1" aria-hidden="true"
                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="authentication-feasibility-precom">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add ddnew Attachment</h3>
                            <form class="space-y-6" wire:submit.prevent="saveFeasibilityModel">
                                <x-input-label>
                                    <div>
                                        File Description
                                    </div>
                                    <x-text-box wire:model="feasibilityDescription" rows="3"/>
                                    <x-sub-label class="uppercase"
                                                 value="Attachment basic description (MAX of 100 characters)"/>
                                    @error('feasibilityDescription')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>

                                <x-input-label>
                                    <div>
                                        Upload file
                                    </div>
                                    <x-text-input accept="application/pdf,image/png,image/jpeg"
                                                  wire:model="feasibilityFile" type="file"/>
                                    <x-sub-label value="PNG, JPG or PDF (MAX. 20 MB)"/>
                                    @error('feasibilityFile')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>

                                <x-submit-button wire:loading wire:target="saveFeasibilityModel" disabled>
                                    Processing...
                                </x-submit-button>
                                <x-submit-button wire:loading.remove wire:target="saveFeasibilityModel">
                                    Submit
                                </x-submit-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <x-secondary-button data-modal-target="authentication-feasibility-precom"
                                data-modal-toggle="authentication-feasibility-precom"
                                class="text-sky-600 dark:text-sky-600">
                <svg class="w-5 me-2 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 20 20">
                    <path
                        d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
                </svg>
                Add File
            </x-secondary-button>
        </div>

        @if($precom->feasibility_studies->count()>0)
            <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-4">
                @foreach($precom->feasibility_studies as $key=>$file)
                    <li class="py-3 transition duration-300 hover:bg-gray-200 hover:dark:bg-gray-800 hover:text-gray-800 hover:dark:text-white text-gray-600 dark:text-gray-400">
                        <livewire:iptbm.staff.precom.file-holder wire:key="feasibbility-{{$key}}-{{$file->id}}"
                                                                 univ-id="feasibbility" :file="$file"/>
                    </li>
                @endforeach


            </ul>
        @else
            <x-sub-label>
                No data available
            </x-sub-label>
        @endif
    </x-card>
    <x-card class="shadow-lg">
        <div class="flex justify-between items-center">
            <x-input-label class="font-medium text-xl">
                Business Model/Business Plan
            </x-input-label>
            <div wire:ignore.self id="authentication-business-precom" tabindex="-1" aria-hidden="true"
                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="authentication-business-precom">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add ddnew Attachment</h3>
                            <form class="space-y-6" wire:submit.prevent="saveBusinessModel">
                                <x-input-label>
                                    <div>
                                        File Description
                                    </div>
                                    <x-text-box wire:model="businessDescription" rows="3"/>
                                    <x-sub-label class="uppercase"
                                                 value="Attachment basic description (MAX of 100 characters)"/>
                                    @error('businessDescription')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>

                                <x-input-label>
                                    <div>
                                        Upload file
                                    </div>
                                    <x-text-input accept="application/pdf,image/png,image/jpeg"
                                                  wire:model="businessFile" type="file"/>
                                    <x-sub-label value="PNG, JPG or PDF (MAX. 20 MB)"/>
                                    @error('businessFile')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>

                                <x-submit-button wire:loading wire:target="saveBusinessModel" disabled>
                                    Processing...
                                </x-submit-button>
                                <x-submit-button wire:loading.remove wire:target="saveBusinessModel">
                                    Submit
                                </x-submit-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <x-secondary-button data-modal-target="authentication-business-precom"
                                data-modal-toggle="authentication-business-precom"
                                class="text-sky-600 dark:text-sky-600">
                <svg class="w-5 me-2 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 20 20">
                    <path
                        d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
                </svg>
                Add File
            </x-secondary-button>
        </div>

        @if($precom->business_plan->count()>0)
            <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-4">
                @foreach($precom->business_plan as $key=>$file)
                    <li class="py-3 transition duration-300 hover:bg-gray-200 hover:dark:bg-gray-800 hover:text-gray-800 hover:dark:text-white text-gray-600 dark:text-gray-400">
                        <livewire:iptbm.staff.precom.file-holder wire:key="business-{{$key}}-{{$file->id}}"
                                                                 univ-id="business" :file="$file"/>
                    </li>
                @endforeach


            </ul>
        @else
            <x-sub-label>
                No data available
            </x-sub-label>
        @endif
    </x-card>
    <x-card class="shadow-lg">
        <div class="flex justify-between items-center">
            <x-input-label class="font-medium text-xl">
                Fairness Opinion Report
            </x-input-label>
            <div wire:ignore.self id="authentication-report-precom" tabindex="-1" aria-hidden="true"
                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="authentication-report-precom">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add ddnew Attachment</h3>
                            <form class="space-y-6" wire:submit.prevent="savReportModel">
                                <x-input-label>
                                    <div>
                                        File Description
                                    </div>
                                    <x-text-box wire:model="reportDescription" rows="3"/>
                                    <x-sub-label class="uppercase"
                                                 value="Attachment basic description (MAX of 100 characters)"/>
                                    @error('reportDescription')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>

                                <x-input-label>
                                    <div>
                                        Upload file
                                    </div>
                                    <x-text-input accept="application/pdf,image/png,image/jpeg" wire:model="reportFile"
                                                  type="file"/>
                                    <x-sub-label value="PNG, JPG or PDF (MAX. 20 MB)"/>
                                    @error('reportFile')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                </x-input-label>

                                <x-submit-button wire:loading wire:target="savReportModel" disabled>
                                    Processing...
                                </x-submit-button>
                                <x-submit-button wire:loading.remove wire:target="savReportModel">
                                    Submit
                                </x-submit-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <x-secondary-button data-modal-target="authentication-report-precom"
                                data-modal-toggle="authentication-report-precom" class="text-sky-600 dark:text-sky-600">
                <svg class="w-5 me-2 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 20 20">
                    <path
                        d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
                </svg>
                Add File
            </x-secondary-button>
        </div>

        @if($precom->opinion_report->count()>0)
            <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-4">
                @foreach($precom->opinion_report as $key=>$file)
                    <li class="py-3 transition duration-300 hover:bg-gray-200 hover:dark:bg-gray-800 hover:text-gray-800 hover:dark:text-white text-gray-600 dark:text-gray-400">
                        <livewire:iptbm.staff.precom.file-holder wire:key="report-{{$key}}-{{$file->id}}"
                                                                 univ-id="report" :file="$file"/>
                    </li>
                @endforeach


            </ul>
        @else
            <x-sub-label>
                No data available
            </x-sub-label>
        @endif
    </x-card>

</div>

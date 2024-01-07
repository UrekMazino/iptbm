<div class="w-full space-y-6 md:col-span-2">
    <x-card-panel title="Market Study">
        <x-slot:button>
            <x-secondary-button data-modal-target="authentication-market-precom"
                                data-modal-toggle="authentication-market-precom" class="text-sky-600 dark:text-sky-600">
                <svg class="w-5 me-2 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 20 20">
                    <path
                        d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
                </svg>
                Add File
            </x-secondary-button>
            <x-pop-modal modal-title="Add new Attachment" name="authentication-market-precom" class="max-w-xl">
                <form class="space-y-6" wire:submit.prevent="saveMarketModel">
                    <div class="space-y-4">
                       <div>
                           <x-input-label value="File Description" />
                           <x-text-box wire:model="marketModelDescription" rows="3"/>
                           <x-sub-label value="Attachment basic description (MAX of 100 characters)"/>
                           <x-input-error :messages="$errors->get('marketModelDescription')"/>
                       </div>
                        <div>
                            <x-input-label value="Upload file"/>
                            <x-text-input class="w-full" accept="application/pdf,image/png,image/jpeg"
                                          wire:model="marketModelFile" type="file"/>
                            <x-sub-label value="PNG, JPG or PDF (MAX. 20 MB)"/>
                            <x-input-error :messages="$errors->get('marketModelFile')"/>
                        </div>
                    </div>
                    <div>
                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveMarketModel">
                            <div class="w-full text-center p-2" wire:loading.remove wire:target="saveMarketModel">
                                Submit
                            </div>
                            <div class="w-full text-center p-2" wire:loading wire:target="saveMarketModel">
                                Processing...
                            </div>
                        </x-submit-button>
                    </div>


                </form>
            </x-pop-modal>
        </x-slot:button>
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
    </x-card-panel>
    <x-card-panel title=" Valuation Summary">
        <x-slot:button>
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
            <x-pop-modal modal-title="Add new Attachment" class="max-w-xl" name="authentication-valuation-precom" static="true">
                <form class="space-y-6" wire:submit.prevent="saveValuationModel">
                    <div class="space-y-4">
                        <div>
                            <x-input-label value="File Description" />
                            <x-text-box wire:model="valuationDescription" rows="3"/>
                            <x-sub-label value="Attachment basic description (MAX of 100 characters)"/>
                            <x-input-error :messages="$errors->get('valuationDescription')"/>
                        </div>
                        <div>
                            <x-input-label value="Upload file"/>
                            <x-text-input class="w-full" accept="application/pdf,image/png,image/jpeg"
                                          wire:model="valuationFile" type="file"/>
                            <x-sub-label value="PNG, JPG or PDF (MAX. 20 MB)"/>
                            <x-input-error :messages="$errors->get('valuationFile')"/>
                        </div>
                    </div>
                    <div>
                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveValuationModel">
                            <div class="w-full text-center p-2" wire:loading.remove wire:target="saveValuationModel">
                                Submit
                            </div>
                            <div class="w-full text-center p-2" wire:loading wire:target="saveValuationModel">
                                Processing...
                            </div>
                        </x-submit-button>
                    </div>
                </form>
            </x-pop-modal>
        </x-slot:button>
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
    </x-card-panel>

   <x-card-panel title="Freedom to Operate Summary">
       <x-slot:button>
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
           <x-pop-modal name="authentication-freedom-precom" class="max-w-xl" static="true" modal-title="Add new Attachment">
               <form class="space-y-6" wire:submit.prevent="saveFreedomModel">
                   <div class="space-y-4">
                       <div>
                           <x-input-label value="File Description" />
                           <x-text-box wire:model="freedomDescription" rows="3"/>
                           <x-sub-label value="Attachment basic description (MAX of 100 characters)"/>
                           <x-input-error :messages="$errors->get('freedomDescription')"/>
                       </div>
                       <div>
                           <x-input-label value="Upload file"/>
                           <x-text-input class="w-full" accept="application/pdf,image/png,image/jpeg"
                                         wire:model="freedomFile" type="file"/>
                           <x-sub-label value="PNG, JPG or PDF (MAX. 20 MB)"/>
                           <x-input-error :messages="$errors->get('freedomFile')"/>
                       </div>
                   </div>
                   <div>
                       <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveFreedomModel">
                           <div class="w-full text-center p-2" wire:loading.remove wire:target="saveFreedomModel">
                               Submit
                           </div>
                           <div class="w-full text-center p-2" wire:loading wire:target="saveFreedomModel">
                               Processing...
                           </div>
                       </x-submit-button>
                   </div>
               </form>
           </x-pop-modal>
       </x-slot:button>
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
   </x-card-panel>

   <x-card-panel title=" Proposed Term Sheet">
       <x-slot:button>
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
           <x-pop-modal modal-title="Add new Attachment" static="true" name="authentication-termsheet-precom" class="max-w-xl">
               <form class="space-y-6" wire:submit.prevent="saveTermSheetModel">
                   <div class="space-y-4">
                       <div>
                           <x-input-label value="File Description" />
                           <x-text-box wire:model="termSheetDescription" rows="3"/>
                           <x-sub-label value="Attachment basic description (MAX of 100 characters)"/>
                           <x-input-error :messages="$errors->get('termSheetDescription')"/>
                       </div>
                       <div>
                           <x-input-label value="Upload file"/>
                           <x-text-input class="w-full" accept="application/pdf,image/png,image/jpeg"
                                         wire:model="termSheetFile" type="file"/>
                           <x-sub-label value="PNG, JPG or PDF (MAX. 20 MB)"/>
                           <x-input-error :messages="$errors->get('termSheetFile')"/>
                       </div>
                   </div>
                   <div>
                       <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveTermSheetModel">
                           <div class="w-full text-center p-2" wire:loading.remove wire:target="saveTermSheetModel">
                               Submit
                           </div>
                           <div class="w-full text-center p-2" wire:loading wire:target="saveTermSheetModel">
                               Processing...
                           </div>
                       </x-submit-button>
                   </div>


               </form>
           </x-pop-modal>
       </x-slot:button>
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
   </x-card-panel>

    <x-card-panel title="Licensing Agreement Copy">
        <x-slot:button>
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
            <x-pop-modal modal-title="Add new Attachment" name="authentication-agreement-precom" static="true" class="max-w-xl">
                <form class="space-y-6" wire:submit.prevent="saveAgreementModel">
                    <div class="space-y-4">
                        <div>
                            <x-input-label value="File Description" />
                            <x-text-box wire:model="agreementDescription" rows="3"/>
                            <x-sub-label value="Attachment basic description (MAX of 100 characters)"/>
                            <x-input-error :messages="$errors->get('agreementDescription')"/>
                        </div>
                        <div>
                            <x-input-label value="Upload file"/>
                            <x-text-input class="w-full" accept="application/pdf,image/png,image/jpeg"
                                          wire:model="agreementFile" type="file"/>
                            <x-sub-label value="PNG, JPG or PDF (MAX. 20 MB)"/>
                            <x-input-error :messages="$errors->get('agreementFile')"/>
                        </div>
                    </div>
                    <div>
                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveAgreementModel">
                            <div class="w-full text-center p-2" wire:loading.remove wire:target="saveAgreementModel">
                                Submit
                            </div>
                            <div class="w-full text-center p-2" wire:loading wire:target="saveAgreementModel">
                                Processing...
                            </div>
                        </x-submit-button>
                    </div>



                </form>
            </x-pop-modal>
        </x-slot:button>
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
    </x-card-panel>

    <x-card-panel title="Financial/Economic Analysis">
        <x-slot:button>
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
            <x-pop-modal class="max-w-xl" static="true" modal-title="Add new Attachment" name="authentication-financial-precom">
                <form class="space-y-6" wire:submit.prevent="saveFinancialModel">
                    <div class="space-y-4">
                        <div>
                            <x-input-label value="File Description" />
                            <x-text-box wire:model="financialDescription" rows="3"/>
                            <x-sub-label value="Attachment basic description (MAX of 100 characters)"/>
                            <x-input-error :messages="$errors->get('financialDescription')"/>
                        </div>
                        <div>
                            <x-input-label value="Upload file"/>
                            <x-text-input class="w-full" accept="application/pdf,image/png,image/jpeg"
                                          wire:model="financialFile" type="file"/>
                            <x-sub-label value="PNG, JPG or PDF (MAX. 20 MB)"/>
                            <x-input-error :messages="$errors->get('financialFile')"/>
                        </div>
                    </div>
                    <div>
                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveFinancialModel">
                            <div class="w-full text-center p-2" wire:loading.remove wire:target="saveFinancialModel">
                                Submit
                            </div>
                            <div class="w-full text-center p-2" wire:loading wire:target="saveFinancialModel">
                                Processing...
                            </div>
                        </x-submit-button>
                    </div>

                </form>
            </x-pop-modal>
        </x-slot:button>
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
    </x-card-panel>

    <x-card-panel title="Machine Testing and Certification">
        <x-slot:button>
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
            <x-pop-modal static="true" class="max-w-xl" name="authentication-certification-precom" modal-title="Machine Testing and Certification">
                <form class="space-y-6" wire:submit.prevent="saveMachineTestModel">
                    <div class="space-y-4">
                        <div>
                            <x-input-label value="File Description" />
                            <x-text-box wire:model="certificateDescription" rows="3"/>
                            <x-sub-label value="Attachment basic description (MAX of 100 characters)"/>
                            <x-input-error :messages="$errors->get('certificateDescription')"/>
                        </div>
                        <div>
                            <x-input-label value="Upload file"/>
                            <x-text-input class="w-full" accept="application/pdf,image/png,image/jpeg"
                                          wire:model="certificateFile" type="file"/>
                            <x-sub-label value="PNG, JPG or PDF (MAX. 20 MB)"/>
                            <x-input-error :messages="$errors->get('certificateFile')"/>
                        </div>
                    </div>
                    <div>
                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveMachineTestModel">
                            <div class="w-full text-center p-2" wire:loading.remove wire:target="saveMachineTestModel">
                                Submit
                            </div>
                            <div class="w-full text-center p-2" wire:loading wire:target="saveMachineTestModel">
                                Processing...
                            </div>
                        </x-submit-button>
                    </div>


                </form>
            </x-pop-modal>
        </x-slot:button>
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
    </x-card-panel>

    <x-card-panel title="Feasibility Study">
        <x-slot:button>
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
            <x-pop-modal class="max-w-xl" name="authentication-feasibility-precom" static="true" modal-title="Add new Attachment">
                <form class="space-y-6" wire:submit.prevent="saveFeasibilityModel">
                    <div class="space-y-4">
                        <div>
                            <x-input-label value="File Description" />
                            <x-text-box wire:model="feasibilityDescription" rows="3"/>
                            <x-sub-label value="Attachment basic description (MAX of 100 characters)"/>
                            <x-input-error :messages="$errors->get('feasibilityDescription')"/>
                        </div>
                        <div>
                            <x-input-label value="Upload file"/>
                            <x-text-input class="w-full" accept="application/pdf,image/png,image/jpeg"
                                          wire:model="feasibilityFile" type="file"/>
                            <x-sub-label value="PNG, JPG or PDF (MAX. 20 MB)"/>
                            <x-input-error :messages="$errors->get('feasibilityFile')"/>
                        </div>
                    </div>
                    <div>
                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveFeasibilityModel">
                            <div class="w-full text-center p-2" wire:loading.remove wire:target="saveFeasibilityModel">
                                Submit
                            </div>
                            <div class="w-full text-center p-2" wire:loading wire:target="saveFeasibilityModel">
                                Processing...
                            </div>
                        </x-submit-button>
                    </div>
                </form>
            </x-pop-modal>
        </x-slot:button>
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
    </x-card-panel>
    <x-card-panel title="Business Model/Business Plan">
        <x-slot:button>
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
            <x-pop-modal name="authentication-business-precom" static="true" class="max-w-xl" modal-title="Add new Attachment">
                <form class="space-y-6" wire:submit.prevent="saveBusinessModel">
                    <div class="space-y-4">
                        <div>
                            <x-input-label value="File Description" />
                            <x-text-box wire:model="businessDescription" rows="3"/>
                            <x-sub-label value="Attachment basic description (MAX of 100 characters)"/>
                            <x-input-error :messages="$errors->get('businessDescription')"/>
                        </div>
                        <div>
                            <x-input-label value="Upload file"/>
                            <x-text-input class="w-full" accept="application/pdf,image/png,image/jpeg"
                                          wire:model="businessFile" type="file"/>
                            <x-sub-label value="PNG, JPG or PDF (MAX. 20 MB)"/>
                            <x-input-error :messages="$errors->get('businessFile')"/>
                        </div>
                    </div>
                    <div>
                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveBusinessModel">
                            <div class="w-full text-center p-2" wire:loading.remove wire:target="saveBusinessModel">
                                Submit
                            </div>
                            <div class="w-full text-center p-2" wire:loading wire:target="saveBusinessModel">
                                Processing...
                            </div>
                        </x-submit-button>
                    </div>


                </form>
            </x-pop-modal>
        </x-slot:button>
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
    </x-card-panel>
    <x-card-panel title="Fairness Opinion Report">
        <x-slot:button>
            <x-secondary-button data-modal-target="authentication-report-precom"
                                data-modal-toggle="authentication-report-precom" class="text-sky-600 dark:text-sky-600">
                <svg class="w-5 me-2 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 20 20">
                    <path
                        d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
                </svg>
                Add File
            </x-secondary-button>
            <x-pop-modal name="authentication-report-precom" static="true" class="max-w-xl" modal-title="Add new Attachment">
                <form class="space-y-6" wire:submit.prevent="savReportModel">
                    <div class="space-y-4">
                        <div>
                            <x-input-label value="File Description" />
                            <x-text-box wire:model="reportDescription" rows="3"/>
                            <x-sub-label value="Attachment basic description (MAX of 100 characters)"/>
                            <x-input-error :messages="$errors->get('reportDescription')"/>
                        </div>
                        <div>
                            <x-input-label value="Upload file"/>
                            <x-text-input class="w-full" accept="application/pdf,image/png,image/jpeg"
                                          wire:model="reportFile" type="file"/>
                            <x-sub-label value="PNG, JPG or PDF (MAX. 20 MB)"/>
                            <x-input-error :messages="$errors->get('reportFile')"/>
                        </div>
                    </div>
                    <div>
                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="savReportModel">
                            <div class="w-full text-center p-2" wire:loading.remove wire:target="savReportModel">
                                Submit
                            </div>
                            <div class="w-full text-center p-2" wire:loading wire:target="savReportModel">
                                Processing...
                            </div>
                        </x-submit-button>
                    </div>


                </form>
            </x-pop-modal>
        </x-slot:button>
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
    </x-card-panel>


</div>

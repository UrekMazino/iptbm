<div class="w-full">
    <x-slot name="pagetitle">
        Pre com
    </x-slot>
    <nav class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="block md:flex p-3 justify-between items-center">
                <x-link-button :url="route('abh.staff.commercialization.precom')">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                    </svg>
                    Back
                </x-link-button>

            </div>

        </nav>

    </nav>
    <div class=" md:px-4">

        <div class="mt-16 space-y-4">
            <div class="border relative overflow-hidden border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-900 rounded shadow-md h-96 ">
                @if($technology->tech_photo)
                    <img src="{{\Illuminate\Support\Facades\Storage::url($technology->tech_photo)}}" class="absolute top-0 m-auto object-cover opacity-25 blur-sm  w-full  h-full left-0">
                @endif

                <div class="absolute w-full h-full p-4 gap-10 py-10 md:flex justify-start items-center ">
                    <div class="md:aspect-square h-full border  shadow-black shadow-lg rounded border-gray-200 dark:border-gray-600 flex justify-center items-center">
                        <div class="overflow-hidden ">
                            @if($technology->tech_photo)
                                <a href="{{ route('rtms.file.viewer',[
                                'type' => 'png',
                                'file'=>$technology->tech_photo,
                                'home'=>route('abh.staff.commercialization.precom.details',['precom' => $precom_tech->id]),
                                'base_layout' => \App\View\Components\abh\AbhLayout::class

                                ]) }}">
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($technology->tech_photo)}}" class="max-w-full hover:brightness-50 hover:scale-125 transition duration-300 w-auto max-h-full h-auto"/>
                                </a>

                            @else
                                <img src="{{asset('assets/logo/iptbm.ico')}}" class="max-w-full w-auto max-h-full h-auto"/>
                            @endif
                        </div>


                    </div>
                    <div class="w-full bg-gray-950 bg-opacity-20 p-5 rounded">
                        <p class="text-gray-700 dark:text-white text-xl">
                            {{__("$technology->title")}}
                        </p>
                    </div>
                </div>

            </div>
        </div>
        <div class="mt-10">
            <div class="grid  grid-cols-1 md:grid-cols-5 gap-x-10">
                <div class="md:col-span-3">
                    <div class="space-y-5">
                        <x-card-panel title="Market Study">
                            <x-slot:button>
                                <x-pop-modal name="addFile_market" modal-title="Upload Market Study files" class="max-w-xl" static="true">
                                    <form class="space-y-5" wire:submit.prevent="saveMarketStudyFile">
                                        <div class="space-y-4">
                                            <div>
                                                <x-input-label value="Upload file"/>
                                                <x-text-input wire:model.lazy="market_study_files" type="file" accept="application/pdf,image/png,image/jpeg" class="w-full"  />
                                                <x-sub-label>
                                                    PDF file format (MAX. 20MB).
                                                </x-sub-label>
                                                <x-input-error :messages="$errors->get('')"/>
                                            </div>
                                            <div>
                                                <x-input-label value="File Description"/>
                                                <x-text-box wire:model.lazy="market_study_descriptions" placeholder="enter text here"/>
                                                <x-sub-label>
                                                    Maximum of 100 characters
                                                </x-sub-label>
                                            </div>
                                        </div>
                                        <div>
                                            <x-submit-button wire:loading.attr="disabled" wire:target="saveMarketStudyFile">
                                                <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveMarketStudyFile">
                                                    Submit
                                                </div>
                                                <div class="p-2 w-full text-center" wire:loading wire:target="saveMarketStudyFile">
                                                    Processing
                                                </div>
                                            </x-submit-button>
                                        </div>
                                    </form>
                                </x-pop-modal>
                                <x-secondary-button data-modal-toggle="addFile_market">
                                    Add File
                                </x-secondary-button>
                            </x-slot:button>
                            <div>
                                <ul class="list-inside space-y-3">
                                    @foreach($precom_tech->market_study_files as $data)
                                        <li class="ho">
                                            <div class="flex justify-start items-center gap-3 hover:bg-gray-200 hover:dark:bg-gray-900 transition duration-300 rounded">
                                                <div class="w-1/12">
                                                    @if($data->file_type==='pdf')
                                                        <svg class="w-full h-full e" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                            <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7c0 1.1.9 2 2 2 0 1.1.9 2 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5c0 .6.4 1 1 1h1.4a2.6 2.6 0 0 0 2.6-2.6v-1.8a2.6 2.6 0 0 0-2.6-2.6H11Zm1 5v-3h.4a.6.6 0 0 1 .6.6v1.8a.6.6 0 0 1-.6.6H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
                                                        </svg>
                                                    @else
                                                        <svg class="w-full h-full" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M16 18H8l2.5-6 2 4 1.5-2 2 4Zm-1-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4c0 .6-.4 1-1 1H5m14-4v16c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1V8c0-.4.1-.6.3-.8l4-4 .6-.2H18c.6 0 1 .4 1 1ZM8 18h8l-2-4-1.5 2-2-4L8 18Zm7-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                        </svg>
                                                    @endif


                                                </div>
                                                <div>

                                                    <a  href="{{route('rtms.file.viewer',[

                                                'type'=>$data->file_type,
                                                'file'=>$data->file,
                                                'home'=>route('abh.staff.commercialization.precom.details',['precom'=>$precom_tech->id]),
                                                'base_layout'=>\App\View\Components\abh\AbhLayout::class


                                                ])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                        {{$data->description}}

                                                    </a>


                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </x-card-panel>
                        <x-card-panel title="Valuation Summary">
                            <x-slot:button>
                                <x-secondary-button>
                                    Add file
                                </x-secondary-button>
                            </x-slot:button>
                        </x-card-panel>
                        <x-card-panel title="Freedom to Operate Summary">
                            <x-slot:button>
                                <x-secondary-button>
                                    Add File
                                </x-secondary-button>
                            </x-slot:button>
                        </x-card-panel>
                        <x-card-panel title="Proposed Term Sheet">
                            <x-slot:button>
                                <x-secondary-button>
                                    Add File
                                </x-secondary-button>
                            </x-slot:button>
                        </x-card-panel>
                        <x-card-panel title="Licensing Agreement Copy">
                            <x-slot:button>
                                <x-secondary-button>
                                    Add File
                                </x-secondary-button>
                            </x-slot:button>
                        </x-card-panel>
                        <x-card-panel title="Financial/Economic Analysis">
                            <x-slot:button>
                                <x-secondary-button>
                                    Add File
                                </x-secondary-button>
                            </x-slot:button>
                        </x-card-panel>
                        <x-card-panel title="Machine Testing and Certification">
                            <x-slot:button>
                                <x-secondary-button>
                                    Add File
                                </x-secondary-button>
                            </x-slot:button>
                        </x-card-panel>
                        <x-card-panel title="Feasibility Study">
                            <x-slot:button>
                                <x-secondary-button>
                                    Add File
                                </x-secondary-button>
                            </x-slot:button>
                        </x-card-panel>
                        <x-card-panel title="Business Model/Business Plan">
                            <x-slot:button>
                                <x-secondary-button>
                                    Add File
                                </x-secondary-button>
                            </x-slot:button>
                        </x-card-panel>
                        <x-card-panel title="Fairness Opinion Report">
                            <x-slot:button>
                                <x-secondary-button>
                                    Add File
                                </x-secondary-button>
                            </x-slot:button>
                        </x-card-panel>
                    </div>


                </div>
                <div class="md:col-span-2">
                    <div class="space-y-5">
                        <x-card-panel title="Technology Video Clips">

                        </x-card-panel>
                        <x-card-panel title="Other Details">

                        </x-card-panel>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>

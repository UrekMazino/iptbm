<div>
    <x-slot name="pagetitle">
        Pre com
    </x-slot>
    <nav class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="block md:flex p-3 justify-between items-center">
                <x-link-button :url="route('abh.admin.commercialization.all_precom')">
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
                    <div class="space-y-10">
                        <x-card-panel title="Market Study">
                            <x-slot:button>
                                <x-pop-modal name="addFile_market" modal-title="Upload Market Study files" class="max-w-xl" static="true">
                                    <form class="space-y-5" wire:submit.prevent="saveMarketStudyFile">
                                        <div class="space-y-4">
                                            <div>
                                                <x-input-label value="Upload file"/>
                                                <x-text-input wire:model.lazy="market_study_files" type="file" accept="application/pdf,image/png,image/jpeg" class="w-full"  />
                                                <x-sub-label>
                                                    PDF or Image (png or jpg) file format (MAX. 20MB).
                                                </x-sub-label>
                                                <x-input-error :messages="$errors->get('market_study_files')"/>
                                            </div>
                                            <div>
                                                <x-input-label value="File Description"/>
                                                <x-text-box wire:model.lazy="market_study_descriptions" placeholder="enter text here"/>
                                                <x-sub-label>
                                                    Maximum of 100 characters
                                                </x-sub-label>
                                                <x-input-error :messages="$errors->get('market_study_descriptions')"/>
                                            </div>
                                        </div>
                                        <div>
                                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveMarketStudyFile">
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
                                <ul class="list-inside divide-y divide-gray-200 dark:divide-gray-600">
                                    @forelse($precom_tech->market_study_files as $data)
                                        <li>
                                            <div  class="space-y-5 rounded py-4 hover:bg-gray-200 group hover:dark:bg-gray-900 transition duration-200 px-4">
                                                <div class="flex justify-start items-center gap-4">
                                                    <div class="hidden md:block">
                                                        @if($data->file_type==='pdf')
                                                            <svg class="w-10 h-full " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7c0 1.1.9 2 2 2 0 1.1.9 2 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5c0 .6.4 1 1 1h1.4a2.6 2.6 0 0 0 2.6-2.6v-1.8a2.6 2.6 0 0 0-2.6-2.6H11Zm1 5v-3h.4a.6.6 0 0 1 .6.6v1.8a.6.6 0 0 1-.6.6H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
                                                            </svg>
                                                        @else
                                                            <svg class="w-10 h-full" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M16 18H8l2.5-6 2 4 1.5-2 2 4Zm-1-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4c0 .6-.4 1-1 1H5m14-4v16c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1V8c0-.4.1-.6.3-.8l4-4 .6-.2H18c.6 0 1 .4 1 1ZM8 18h8l-2-4-1.5 2-2-4L8 18Zm7-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                            </svg>
                                                        @endif

                                                    </div>
                                                    <div>
                                                        {{$data->description}}
                                                    </div>
                                                </div>
                                                <div class="flex justify-start items-center gap-4 ">
                                                    <div>
                                                        <a href="{{route('rtms.file.viewer',[
                                                'type'=>$data->file_type,
                                                'file'=>$data->file,
                                                'home'=>route('abh.staff.commercialization.precom.details',['precom'=>$precom_tech->id]),
                                                'base_layout'=>\App\View\Components\abh\AbhLayout::class
                                                ])}}" class="border px-4 py-1 text-sm font-medium hover:text-sky-500 dark:hover:text-sky-500 border-gray-200 group-hover:border-sky-500 transition duration-300  dark:border-gray-700 rounded-full">
                                                            Open Attachment
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <x-pop-modal class="max-w-md" :with-close="false"  name="delete-market-{{$data->id}}">
                                                            <div class="text-center ">
                                                                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                                <p class="mb-4 font-medium text-gray-500 dark:text-gray-300">
                                                                    {{$data->description}}
                                                                </p>

                                                                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>

                                                                <div class="flex justify-center items-center space-x-4">
                                                                    <button data-modal-toggle="delete-market-{{$data->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                        No, cancel
                                                                    </button>
                                                                    <button type="submit" wire:click.prevent="deleteMarketFile({{$data->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                        Yes, I'm sure
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </x-pop-modal>
                                                        <button data-modal-toggle="delete-market-{{$data->id}}" class="border flex gap-2 hover:text-red-500 hover:bg-red-200  dark:hover:bg-red-950 hover:dark:text-red-400 group-hover:border-red-600 transition duration-300 px-4 py-1 text-sm font-medium border-gray-200 dark:border-gray-700 rounded-full">
                                                            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                            </svg>
                                                            Delete File
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                    @empty
                                        <li>
                                            No data available
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                            <x-slot:footer>
                                <x-sub-label>
                                    <p class="text-sky-600 dark:text-sky-300">
                                        <i>
                                            Attachment can be in Image or PDF Format.
                                        </i>
                                    </p>
                                </x-sub-label>
                            </x-slot:footer>
                        </x-card-panel>
                        <x-card-panel title="Valuation Summary">
                            <x-slot:button>
                                <x-pop-modal name="addFile_valuation" modal-title="Upload Valuation of Summary files" class="max-w-xl" static="true">
                                    <form class="space-y-5" wire:submit.prevent="saveValuationFile">
                                        <div class="space-y-4">
                                            <div>
                                                <x-input-label value="Upload file"/>
                                                <x-text-input wire:model.lazy="valuation_files" type="file" accept="application/pdf,image/png,image/jpeg" class="w-full"  />
                                                <x-sub-label>
                                                    PDF or Image (png or jpg) file format (MAX. 20MB).
                                                </x-sub-label>
                                                <x-input-error :messages="$errors->get('valuation_files')"/>
                                            </div>
                                            <div>
                                                <x-input-label value="File Description"/>
                                                <x-text-box wire:model.lazy="valuation_descriptions" placeholder="enter text here"/>
                                                <x-sub-label>
                                                    Maximum of 100 characters
                                                </x-sub-label>
                                                <x-input-error :messages="$errors->get('valuation_descriptions')"/>
                                            </div>
                                        </div>
                                        <div>
                                            <x-submit-button class="min-w-full"  wire:loading.attr="disabled" wire:target="saveValuationFile">
                                                <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveValuationFile">
                                                    Submit
                                                </div>
                                                <div class="p-2 w-full text-center" wire:loading wire:target="saveValuationFile">
                                                    Processing
                                                </div>
                                            </x-submit-button>
                                        </div>
                                    </form>
                                </x-pop-modal>
                                <x-secondary-button data-modal-toggle="addFile_valuation">
                                    Add file
                                </x-secondary-button>

                            </x-slot:button>
                            <div>
                                <ul class="list-inside">
                                    @foreach($precom_tech->valuation_summary_files as $data)
                                        <li>
                                            <div  class="space-y-5 rounded py-4 hover:bg-gray-200 group hover:dark:bg-gray-900 transition duration-200 px-4">
                                                <div class="flex justify-start items-center gap-4">
                                                    <div class="hidden md:block">
                                                        @if($data->file_type==='pdf')
                                                            <svg class="w-10 h-full " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7c0 1.1.9 2 2 2 0 1.1.9 2 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5c0 .6.4 1 1 1h1.4a2.6 2.6 0 0 0 2.6-2.6v-1.8a2.6 2.6 0 0 0-2.6-2.6H11Zm1 5v-3h.4a.6.6 0 0 1 .6.6v1.8a.6.6 0 0 1-.6.6H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
                                                            </svg>
                                                        @else
                                                            <svg class="w-10 h-full" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M16 18H8l2.5-6 2 4 1.5-2 2 4Zm-1-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4c0 .6-.4 1-1 1H5m14-4v16c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1V8c0-.4.1-.6.3-.8l4-4 .6-.2H18c.6 0 1 .4 1 1ZM8 18h8l-2-4-1.5 2-2-4L8 18Zm7-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                            </svg>
                                                        @endif

                                                    </div>
                                                    <div>
                                                        {{$data->description}}
                                                    </div>
                                                </div>
                                                <div class="flex justify-start items-center gap-4 ">
                                                    <div>
                                                        <a href="{{route('rtms.file.viewer',[
                                                'type'=>$data->file_type,
                                                'file'=>$data->file,
                                                'home'=>route('abh.staff.commercialization.precom.details',['precom'=>$precom_tech->id]),
                                                'base_layout'=>\App\View\Components\abh\AbhLayout::class
                                                ])}}" class="border px-4 py-1 text-sm font-medium hover:text-sky-500 dark:hover:text-sky-500 border-gray-200 group-hover:border-sky-500 transition duration-300  dark:border-gray-700 rounded-full">
                                                            Open Attachment
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <x-pop-modal class="max-w-md" :with-close="false"  name="delete-valuation-{{$data->id}}">
                                                            <div class="text-center ">
                                                                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                                <p class="mb-4 font-medium text-gray-500 dark:text-gray-300">
                                                                    {{$data->description}}
                                                                </p>

                                                                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>

                                                                <div class="flex justify-center items-center space-x-4">
                                                                    <button data-modal-toggle="delete-valuation-{{$data->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                        No, cancel
                                                                    </button>
                                                                    <button type="submit" wire:click.prevent="deleteValuationFile({{$data->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                        Yes, I'm sure
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </x-pop-modal>
                                                        <button data-modal-toggle="delete-valuation-{{$data->id}}" class="border flex gap-2 hover:text-red-500 hover:bg-red-200  dark:hover:bg-red-950 hover:dark:text-red-400 group-hover:border-red-600 transition duration-300 px-4 py-1 text-sm font-medium border-gray-200 dark:border-gray-700 rounded-full">
                                                            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                            </svg>
                                                            Delete File
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <x-slot:footer>
                                <x-sub-label>
                                    <p class="text-sky-600 dark:text-sky-300">
                                        <i>
                                            Attachment can be in Image or PDF Format.
                                        </i>
                                    </p>
                                </x-sub-label>
                            </x-slot:footer>
                        </x-card-panel>
                        <x-card-panel title="Freedom to Operate Summary">
                            <x-slot:button>
                                <x-pop-modal name="addFile_Freedom" modal-title="Upload Freedom to Operate Summary files" class="max-w-xl" static="true">
                                    <form class="space-y-5" wire:submit.prevent="saveFreedomFile">
                                        <div class="space-y-4">
                                            <div>
                                                <x-input-label value="Upload file"/>
                                                <x-text-input wire:model.lazy="freedom_summary_files" type="file" accept="application/pdf,image/png,image/jpeg" class="w-full"  />
                                                <x-sub-label>
                                                    PDF or Image (png or jpg) file format (MAX. 20MB).
                                                </x-sub-label>
                                                <x-input-error :messages="$errors->get('freedom_summary_files')"/>
                                            </div>
                                            <div>
                                                <x-input-label value="File Description"/>
                                                <x-text-box wire:model.lazy="freedom_descriptions" placeholder="enter text here"/>
                                                <x-sub-label>
                                                    Maximum of 100 characters
                                                </x-sub-label>
                                                <x-input-error :messages="$errors->get('freedom_descriptions')"/>
                                            </div>
                                        </div>
                                        <div>
                                            <x-submit-button class="min-w-full"  wire:loading.attr="disabled" wire:target="saveFreedomFile">
                                                <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveFreedomFile">
                                                    Submit
                                                </div>
                                                <div class="p-2 w-full text-center" wire:loading wire:target="saveFreedomFile">
                                                    Processing
                                                </div>
                                            </x-submit-button>
                                        </div>
                                    </form>
                                </x-pop-modal>
                                <x-secondary-button data-modal-toggle="addFile_Freedom">
                                    Add File
                                </x-secondary-button>

                            </x-slot:button>
                            <div>
                                <ul class="list-inside">
                                    @forelse($precom_tech->freedom_summary_files as $data)
                                        <li>
                                            <div  class="space-y-5 rounded py-4 hover:bg-gray-200 group hover:dark:bg-gray-900 transition duration-200 px-4">
                                                <div class="flex justify-start items-center gap-4">
                                                    <div class="hidden md:block">
                                                        @if($data->file_type==='pdf')
                                                            <svg class="w-10 h-full " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7c0 1.1.9 2 2 2 0 1.1.9 2 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5c0 .6.4 1 1 1h1.4a2.6 2.6 0 0 0 2.6-2.6v-1.8a2.6 2.6 0 0 0-2.6-2.6H11Zm1 5v-3h.4a.6.6 0 0 1 .6.6v1.8a.6.6 0 0 1-.6.6H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
                                                            </svg>
                                                        @else
                                                            <svg class="w-10 h-full" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M16 18H8l2.5-6 2 4 1.5-2 2 4Zm-1-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4c0 .6-.4 1-1 1H5m14-4v16c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1V8c0-.4.1-.6.3-.8l4-4 .6-.2H18c.6 0 1 .4 1 1ZM8 18h8l-2-4-1.5 2-2-4L8 18Zm7-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                            </svg>
                                                        @endif

                                                    </div>
                                                    <div>
                                                        {{$data->description}}
                                                    </div>
                                                </div>
                                                <div class="flex justify-start items-center gap-4 ">
                                                    <div>
                                                        <a href="{{route('rtms.file.viewer',[
                                                'type'=>$data->file_type,
                                                'file'=>$data->file,
                                                'home'=>route('abh.staff.commercialization.precom.details',['precom'=>$precom_tech->id]),
                                                'base_layout'=>\App\View\Components\abh\AbhLayout::class
                                                ])}}" class="border px-4 py-1 text-sm font-medium hover:text-sky-500 dark:hover:text-sky-500 border-gray-200 group-hover:border-sky-500 transition duration-300  dark:border-gray-700 rounded-full">
                                                            Open Attachment
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <x-pop-modal class="max-w-md" :with-close="false"  name="delete-valuation-{{$data->id}}">
                                                            <div class="text-center ">
                                                                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                                <p class="mb-4 font-medium text-gray-500 dark:text-gray-300">
                                                                    {{$data->description}}
                                                                </p>

                                                                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>

                                                                <div class="flex justify-center items-center space-x-4">
                                                                    <button data-modal-toggle="delete-valuation-{{$data->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                        No, cancel
                                                                    </button>
                                                                    <button type="submit" wire:click.prevent="deleteFreedomFile({{$data->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                        Yes, I'm sure
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </x-pop-modal>
                                                        <button data-modal-toggle="delete-valuation-{{$data->id}}" class="border flex gap-2 hover:text-red-500 hover:bg-red-200  dark:hover:bg-red-950 hover:dark:text-red-400 group-hover:border-red-600 transition duration-300 px-4 py-1 text-sm font-medium border-gray-200 dark:border-gray-700 rounded-full">
                                                            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                            </svg>
                                                            Delete File
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                    @empty
                                        <li>
                                            No data available
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                            <x-slot:footer>
                                <x-sub-label>
                                    <p class="text-sky-600 dark:text-sky-300">
                                        <i>
                                            Attachment can be in Image or PDF Format.
                                        </i>
                                    </p>
                                </x-sub-label>
                            </x-slot:footer>
                        </x-card-panel>
                        <x-card-panel title="Proposed Term Sheet">
                            <x-slot:button>
                                <x-pop-modal name="addFile_Proposed" modal-title="Upload Proposed Term Sheet files" class="max-w-xl" static="true">
                                    <form class="space-y-5" wire:submit.prevent="saveProposedFile">
                                        <div class="space-y-4">
                                            <div>
                                                <x-input-label value="Upload file"/>
                                                <x-text-input wire:model.lazy="proposed_sheet_files" type="file" accept="application/pdf,image/png,image/jpeg" class="w-full"  />
                                                <x-sub-label>
                                                    PDF or Image (png or jpg) file format (MAX. 20MB).
                                                </x-sub-label>
                                                <x-input-error :messages="$errors->get('proposed_sheet_files')"/>
                                            </div>
                                            <div>
                                                <x-input-label value="File Description"/>
                                                <x-text-box wire:model.lazy="proposed_descriptions" placeholder="enter text here"/>
                                                <x-sub-label>
                                                    Maximum of 100 characters
                                                </x-sub-label>
                                                <x-input-error :messages="$errors->get('proposed_descriptions')"/>
                                            </div>
                                        </div>
                                        <div>
                                            <x-submit-button class="min-w-full"  wire:loading.attr="disabled" wire:target="saveProposedFile">
                                                <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveProposedFile">
                                                    Submit
                                                </div>
                                                <div class="p-2 w-full text-center" wire:loading wire:target="saveProposedFile">
                                                    Processing
                                                </div>
                                            </x-submit-button>
                                        </div>
                                    </form>
                                </x-pop-modal>
                                <x-secondary-button data-modal-toggle="addFile_Proposed">
                                    Add File
                                </x-secondary-button>
                            </x-slot:button>
                            <div>
                                <ul class="list-inside">
                                    @forelse($precom_tech->term_sheet_files as $data)
                                        <li>
                                            <div  class="space-y-5 rounded py-4 hover:bg-gray-200 group hover:dark:bg-gray-900 transition duration-200 px-4">
                                                <div class="flex justify-start items-center gap-4">
                                                    <div class="hidden md:block">
                                                        @if($data->file_type==='pdf')
                                                            <svg class="w-10 h-full " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7c0 1.1.9 2 2 2 0 1.1.9 2 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5c0 .6.4 1 1 1h1.4a2.6 2.6 0 0 0 2.6-2.6v-1.8a2.6 2.6 0 0 0-2.6-2.6H11Zm1 5v-3h.4a.6.6 0 0 1 .6.6v1.8a.6.6 0 0 1-.6.6H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
                                                            </svg>
                                                        @else
                                                            <svg class="w-10 h-full" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M16 18H8l2.5-6 2 4 1.5-2 2 4Zm-1-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4c0 .6-.4 1-1 1H5m14-4v16c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1V8c0-.4.1-.6.3-.8l4-4 .6-.2H18c.6 0 1 .4 1 1ZM8 18h8l-2-4-1.5 2-2-4L8 18Zm7-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                            </svg>
                                                        @endif

                                                    </div>
                                                    <div>
                                                        {{$data->description}}
                                                    </div>
                                                </div>
                                                <div class="flex justify-start items-center gap-4 ">
                                                    <div>
                                                        <a href="{{route('rtms.file.viewer',[
                                                'type'=>$data->file_type,
                                                'file'=>$data->file,
                                                'home'=>route('abh.staff.commercialization.precom.details',['precom'=>$precom_tech->id]),
                                                'base_layout'=>\App\View\Components\abh\AbhLayout::class
                                                ])}}" class="border px-4 py-1 text-sm font-medium hover:text-sky-500 dark:hover:text-sky-500 border-gray-200 group-hover:border-sky-500 transition duration-300  dark:border-gray-700 rounded-full">
                                                            Open Attachment
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <x-pop-modal class="max-w-md" :with-close="false"  name="delete-proposed-{{$data->id}}">
                                                            <div class="text-center ">
                                                                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                                <p class="mb-4 font-medium text-gray-500 dark:text-gray-300">
                                                                    {{$data->description}}
                                                                </p>

                                                                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>

                                                                <div class="flex justify-center items-center space-x-4">
                                                                    <button data-modal-toggle="delete-proposed-{{$data->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                        No, cancel
                                                                    </button>
                                                                    <button type="submit" wire:click.prevent="deleteProposedFile({{$data->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                        Yes, I'm sure
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </x-pop-modal>
                                                        <button data-modal-toggle="delete-proposed-{{$data->id}}" class="border flex gap-2 hover:text-red-500 hover:bg-red-200  dark:hover:bg-red-950 hover:dark:text-red-400 group-hover:border-red-600 transition duration-300 px-4 py-1 text-sm font-medium border-gray-200 dark:border-gray-700 rounded-full">
                                                            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                            </svg>
                                                            Delete File
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                    @empty
                                        <li>
                                            No data available
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                            <x-slot:footer>
                                <x-sub-label>
                                    <p class="text-sky-600 dark:text-sky-300">
                                        <i>
                                            Attachment can be in Image or PDF Format.
                                        </i>
                                    </p>
                                </x-sub-label>
                            </x-slot:footer>
                        </x-card-panel>
                        <x-card-panel title="Licensing Agreement Copy">
                            <x-slot:button>
                                <x-pop-modal name="addFile_License" modal-title="Licensing Agreement Copy" class="max-w-xl" static="true">
                                    <form class="space-y-5" wire:submit.prevent="saveLicenseFile">
                                        <div class="space-y-4">
                                            <div>
                                                <x-input-label value="Upload file"/>
                                                <x-text-input wire:model.lazy="licensing_files" type="file" accept="application/pdf,image/png,image/jpeg" class="w-full"  />
                                                <x-sub-label>
                                                    PDF or Image (png or jpg) file format (MAX. 20MB).
                                                </x-sub-label>
                                                <x-input-error :messages="$errors->get('licensing_files')"/>
                                            </div>
                                            <div>
                                                <x-input-label value="File Description"/>
                                                <x-text-box wire:model.lazy="licensing_descriptions" placeholder="enter text here"/>
                                                <x-sub-label>
                                                    Maximum of 100 characters
                                                </x-sub-label>
                                                <x-input-error :messages="$errors->get('licensing_descriptions')"/>
                                            </div>
                                        </div>
                                        <div>
                                            <x-submit-button class="min-w-full"  wire:loading.attr="disabled" wire:target="saveLicenseFile">
                                                <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveLicenseFile">
                                                    Submit
                                                </div>
                                                <div class="p-2 w-full text-center" wire:loading wire:target="saveLicenseFile">
                                                    Processing
                                                </div>
                                            </x-submit-button>
                                        </div>
                                    </form>
                                </x-pop-modal>
                                <x-secondary-button data-modal-toggle="addFile_License">
                                    Add File
                                </x-secondary-button>
                            </x-slot:button>
                            <div>
                                <ul class="list-inside">
                                    @forelse($precom_tech->license_agreement_copies as $data)
                                        <li>
                                            <div  class="space-y-5 rounded py-4 hover:bg-gray-200 group hover:dark:bg-gray-900 transition duration-200 px-4">
                                                <div class="flex justify-start items-center gap-4">
                                                    <div class="hidden md:block">
                                                        @if($data->file_type==='pdf')
                                                            <svg class="w-10 h-full " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7c0 1.1.9 2 2 2 0 1.1.9 2 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5c0 .6.4 1 1 1h1.4a2.6 2.6 0 0 0 2.6-2.6v-1.8a2.6 2.6 0 0 0-2.6-2.6H11Zm1 5v-3h.4a.6.6 0 0 1 .6.6v1.8a.6.6 0 0 1-.6.6H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
                                                            </svg>
                                                        @else
                                                            <svg class="w-10 h-full" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M16 18H8l2.5-6 2 4 1.5-2 2 4Zm-1-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4c0 .6-.4 1-1 1H5m14-4v16c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1V8c0-.4.1-.6.3-.8l4-4 .6-.2H18c.6 0 1 .4 1 1ZM8 18h8l-2-4-1.5 2-2-4L8 18Zm7-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                            </svg>
                                                        @endif

                                                    </div>
                                                    <div>
                                                        {{$data->description}}
                                                    </div>
                                                </div>
                                                <div class="flex justify-start items-center gap-4 ">
                                                    <div>
                                                        <a href="{{route('rtms.file.viewer',[
                                                'type'=>$data->file_type,
                                                'file'=>$data->file,
                                                'home'=>route('abh.staff.commercialization.precom.details',['precom'=>$precom_tech->id]),
                                                'base_layout'=>\App\View\Components\abh\AbhLayout::class
                                                ])}}" class="border px-4 py-1 text-sm font-medium hover:text-sky-500 dark:hover:text-sky-500 border-gray-200 group-hover:border-sky-500 transition duration-300  dark:border-gray-700 rounded-full">
                                                            Open Attachment
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <x-pop-modal class="max-w-md" :with-close="false"  name="delete-license-{{$data->id}}">
                                                            <div class="text-center ">
                                                                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                                <p class="mb-4 font-medium text-gray-500 dark:text-gray-300">
                                                                    {{$data->description}}
                                                                </p>

                                                                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>

                                                                <div class="flex justify-center items-center space-x-4">
                                                                    <button data-modal-toggle="delete-license-{{$data->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                        No, cancel
                                                                    </button>
                                                                    <button type="submit" wire:click.prevent="deleteLicenseFile({{$data->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                        Yes, I'm sure
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </x-pop-modal>
                                                        <button data-modal-toggle="delete-license-{{$data->id}}" class="border flex gap-2 hover:text-red-500 hover:bg-red-200  dark:hover:bg-red-950 hover:dark:text-red-400 group-hover:border-red-600 transition duration-300 px-4 py-1 text-sm font-medium border-gray-200 dark:border-gray-700 rounded-full">
                                                            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                            </svg>
                                                            Delete File
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                    @empty
                                        <li>
                                            No data available
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                            <x-slot:footer>
                                <x-sub-label>
                                    <p class="text-sky-600 dark:text-sky-300">
                                        <i>
                                            Attachment can be in Image or PDF Format.
                                        </i>
                                    </p>
                                </x-sub-label>
                            </x-slot:footer>
                        </x-card-panel>
                        <x-card-panel title="Financial/Economic Analysis">
                            <x-slot:button>
                                <x-pop-modal name="addFile_Financial" modal-title="Financial/Economic Analysis" class="max-w-xl" static="true">
                                    <form class="space-y-5" wire:submit.prevent="saveFinancialFile">
                                        <div class="space-y-4">
                                            <div>
                                                <x-input-label value="Upload file"/>
                                                <x-text-input wire:model.lazy="financial_files" type="file" accept="application/pdf,image/png,image/jpeg" class="w-full"  />
                                                <x-sub-label>
                                                    PDF or Image (png or jpg) file format (MAX. 20MB).
                                                </x-sub-label>
                                                <x-input-error :messages="$errors->get('financial_files')"/>
                                            </div>
                                            <div>
                                                <x-input-label value="File Description"/>
                                                <x-text-box wire:model.lazy="financial_descriptions" placeholder="enter text here"/>
                                                <x-sub-label>
                                                    Maximum of 100 characters
                                                </x-sub-label>
                                                <x-input-error :messages="$errors->get('financial_descriptions')"/>
                                            </div>
                                        </div>
                                        <div>
                                            <x-submit-button class="min-w-full"  wire:loading.attr="disabled" wire:target="saveFinancialFile">
                                                <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveFinancialFile">
                                                    Submit
                                                </div>
                                                <div class="p-2 w-full text-center" wire:loading wire:target="saveFinancialFile">
                                                    Processing
                                                </div>
                                            </x-submit-button>
                                        </div>
                                    </form>
                                </x-pop-modal>
                                <x-secondary-button data-modal-toggle="addFile_Financial">
                                    Add File
                                </x-secondary-button>
                            </x-slot:button>
                            <div>
                                <ul class="list-inside">
                                    @forelse($precom_tech->financial_annalysis as $data)
                                        <li>
                                            <div  class="space-y-5 rounded py-4 hover:bg-gray-200 group hover:dark:bg-gray-900 transition duration-200 px-4">
                                                <div class="flex justify-start items-center gap-4">
                                                    <div class="hidden md:block">
                                                        @if($data->file_type==='pdf')
                                                            <svg class="w-10 h-full " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7c0 1.1.9 2 2 2 0 1.1.9 2 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5c0 .6.4 1 1 1h1.4a2.6 2.6 0 0 0 2.6-2.6v-1.8a2.6 2.6 0 0 0-2.6-2.6H11Zm1 5v-3h.4a.6.6 0 0 1 .6.6v1.8a.6.6 0 0 1-.6.6H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
                                                            </svg>
                                                        @else
                                                            <svg class="w-10 h-full" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M16 18H8l2.5-6 2 4 1.5-2 2 4Zm-1-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4c0 .6-.4 1-1 1H5m14-4v16c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1V8c0-.4.1-.6.3-.8l4-4 .6-.2H18c.6 0 1 .4 1 1ZM8 18h8l-2-4-1.5 2-2-4L8 18Zm7-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                            </svg>
                                                        @endif

                                                    </div>
                                                    <div>
                                                        {{$data->description}}
                                                    </div>
                                                </div>
                                                <div class="flex justify-start items-center gap-4 ">
                                                    <div>
                                                        <a href="{{route('rtms.file.viewer',[
                                                'type'=>$data->file_type,
                                                'file'=>$data->file,
                                                'home'=>route('abh.staff.commercialization.precom.details',['precom'=>$precom_tech->id]),
                                                'base_layout'=>\App\View\Components\abh\AbhLayout::class
                                                ])}}" class="border px-4 py-1 text-sm font-medium hover:text-sky-500 dark:hover:text-sky-500 border-gray-200 group-hover:border-sky-500 transition duration-300  dark:border-gray-700 rounded-full">
                                                            Open Attachment
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <x-pop-modal class="max-w-md" :with-close="false"  name="delete-financial-{{$data->id}}">
                                                            <div class="text-center ">
                                                                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                                <p class="mb-4 font-medium text-gray-500 dark:text-gray-300">
                                                                    {{$data->description}}
                                                                </p>

                                                                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>

                                                                <div class="flex justify-center items-center space-x-4">
                                                                    <button data-modal-toggle="delete-financial-{{$data->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                        No, cancel
                                                                    </button>
                                                                    <button type="submit" wire:click.prevent="deleteFinancialFile({{$data->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                        Yes, I'm sure
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </x-pop-modal>
                                                        <button data-modal-toggle="delete-financial-{{$data->id}}" class="border flex gap-2 hover:text-red-500 hover:bg-red-200  dark:hover:bg-red-950 hover:dark:text-red-400 group-hover:border-red-600 transition duration-300 px-4 py-1 text-sm font-medium border-gray-200 dark:border-gray-700 rounded-full">
                                                            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                            </svg>
                                                            Delete File
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                    @empty
                                        <li>
                                            No data available
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                            <x-slot:footer>
                                <x-sub-label>
                                    <p class="text-sky-600 dark:text-sky-300">
                                        <i>
                                            Attachment can be in Image or PDF Format.
                                        </i>
                                    </p>
                                </x-sub-label>
                            </x-slot:footer>
                        </x-card-panel>
                        <x-card-panel title="Machine Testing and Certification">
                            <x-slot:button>
                                <x-pop-modal name="addFile_Machine" modal-title="Update Machine Testing and Certification files" class="max-w-xl" static="true">
                                    <form class="space-y-5" wire:submit.prevent="saveMachineFile">
                                        <div class="space-y-4">
                                            <div>
                                                <x-input-label value="Upload file"/>
                                                <x-text-input wire:model.lazy="machine_cert_files" type="file" accept="application/pdf,image/png,image/jpeg" class="w-full"  />
                                                <x-sub-label>
                                                    PDF or Image (png or jpg) file format (MAX. 20MB).
                                                </x-sub-label>
                                                <x-input-error :messages="$errors->get('machine_cert_files')"/>
                                            </div>
                                            <div>
                                                <x-input-label value="File Description"/>
                                                <x-text-box wire:model.lazy="machine_cert_descriptions" placeholder="enter text here"/>
                                                <x-sub-label>
                                                    Maximum of 100 characters
                                                </x-sub-label>
                                                <x-input-error :messages="$errors->get('machine_cert_descriptions')"/>
                                            </div>
                                        </div>
                                        <div>
                                            <x-submit-button class="min-w-full"  wire:loading.attr="disabled" wire:target="saveMachineFile">
                                                <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveMachineFile">
                                                    Submit
                                                </div>
                                                <div class="p-2 w-full text-center" wire:loading wire:target="saveMachineFile">
                                                    Processing
                                                </div>
                                            </x-submit-button>
                                        </div>
                                    </form>
                                </x-pop-modal>
                                <x-secondary-button data-modal-toggle="addFile_Machine">
                                    Add File
                                </x-secondary-button>
                            </x-slot:button>
                            <div>
                                <ul class="list-inside">
                                    @forelse($precom_tech->testing_certification as $data)
                                        <li>
                                            <div  class="space-y-5 rounded py-4 hover:bg-gray-200 group hover:dark:bg-gray-900 transition duration-200 px-4">
                                                <div class="flex justify-start items-center gap-4">
                                                    <div class="hidden md:block">
                                                        @if($data->file_type==='pdf')
                                                            <svg class="w-10 h-full " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7c0 1.1.9 2 2 2 0 1.1.9 2 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5c0 .6.4 1 1 1h1.4a2.6 2.6 0 0 0 2.6-2.6v-1.8a2.6 2.6 0 0 0-2.6-2.6H11Zm1 5v-3h.4a.6.6 0 0 1 .6.6v1.8a.6.6 0 0 1-.6.6H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
                                                            </svg>
                                                        @else
                                                            <svg class="w-10 h-full" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M16 18H8l2.5-6 2 4 1.5-2 2 4Zm-1-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4c0 .6-.4 1-1 1H5m14-4v16c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1V8c0-.4.1-.6.3-.8l4-4 .6-.2H18c.6 0 1 .4 1 1ZM8 18h8l-2-4-1.5 2-2-4L8 18Zm7-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                            </svg>
                                                        @endif

                                                    </div>
                                                    <div>
                                                        {{$data->description}}
                                                    </div>
                                                </div>
                                                <div class="flex justify-start items-center gap-4 ">
                                                    <div>
                                                        <a href="{{route('rtms.file.viewer',[
                                                'type'=>$data->file_type,
                                                'file'=>$data->file,
                                                'home'=>route('abh.staff.commercialization.precom.details',['precom'=>$precom_tech->id]),
                                                'base_layout'=>\App\View\Components\abh\AbhLayout::class
                                                ])}}" class="border px-4 py-1 text-sm font-medium hover:text-sky-500 dark:hover:text-sky-500 border-gray-200 group-hover:border-sky-500 transition duration-300  dark:border-gray-700 rounded-full">
                                                            Open Attachment
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <x-pop-modal class="max-w-md" :with-close="false"  name="delete-machine-{{$data->id}}">
                                                            <div class="text-center ">
                                                                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                                <p class="mb-4 font-medium text-gray-500 dark:text-gray-300">
                                                                    {{$data->description}}
                                                                </p>

                                                                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>

                                                                <div class="flex justify-center items-center space-x-4">
                                                                    <button data-modal-toggle="delete-machine-{{$data->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                        No, cancel
                                                                    </button>
                                                                    <button type="submit" wire:click.prevent="deleteMachineFile({{$data->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                        Yes, I'm sure
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </x-pop-modal>
                                                        <button data-modal-toggle="delete-machine-{{$data->id}}" class="border flex gap-2 hover:text-red-500 hover:bg-red-200  dark:hover:bg-red-950 hover:dark:text-red-400 group-hover:border-red-600 transition duration-300 px-4 py-1 text-sm font-medium border-gray-200 dark:border-gray-700 rounded-full">
                                                            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                            </svg>
                                                            Delete File
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                    @empty
                                        <li>
                                            No data available
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                            <x-slot:footer>
                                <x-sub-label>
                                    <p class="text-sky-600 dark:text-sky-300">
                                        <i>
                                            Attachment can be in Image or PDF Format.
                                        </i>
                                    </p>
                                </x-sub-label>
                            </x-slot:footer>
                        </x-card-panel>
                        <x-card-panel title="Feasibility Study">
                            <x-slot:button>
                                <x-pop-modal name="addFile_feasibility" modal-title="Update Feasibility Study files" class="max-w-xl" static="true">
                                    <form class="space-y-5" wire:submit.prevent="saveFeasibilityFile">
                                        <div class="space-y-4">
                                            <div>
                                                <x-input-label value="Upload file"/>
                                                <x-text-input wire:model.lazy="feasibility_files" type="file" accept="application/pdf,image/png,image/jpeg" class="w-full"  />
                                                <x-sub-label>
                                                    PDF or Image (png or jpg) file format (MAX. 20MB).
                                                </x-sub-label>
                                                <x-input-error :messages="$errors->get('feasibility_files')"/>
                                            </div>
                                            <div>
                                                <x-input-label value="File Description"/>
                                                <x-text-box wire:model.lazy="feasibility_descriptions" placeholder="enter text here"/>
                                                <x-sub-label>
                                                    Maximum of 100 characters
                                                </x-sub-label>
                                                <x-input-error :messages="$errors->get('feasibility_descriptions')"/>
                                            </div>
                                        </div>
                                        <div>
                                            <x-submit-button class="min-w-full"  wire:loading.attr="disabled" wire:target="saveFeasibilityFile">
                                                <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveFeasibilityFile">
                                                    Submit
                                                </div>
                                                <div class="p-2 w-full text-center" wire:loading wire:target="saveFeasibilityFile">
                                                    Processing
                                                </div>
                                            </x-submit-button>
                                        </div>
                                    </form>
                                </x-pop-modal>
                                <x-secondary-button data-modal-toggle="addFile_feasibility">
                                    Add File
                                </x-secondary-button>
                            </x-slot:button>
                            <div>
                                <ul class="list-inside">
                                    @forelse($precom_tech->feasibility_studies as $data)
                                        <li>
                                            <div  class="space-y-5 rounded py-4 hover:bg-gray-200 group hover:dark:bg-gray-900 transition duration-200 px-4">
                                                <div class="flex justify-start items-center gap-4">
                                                    <div class="hidden md:block">
                                                        @if($data->file_type==='pdf')
                                                            <svg class="w-10 h-full " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7c0 1.1.9 2 2 2 0 1.1.9 2 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5c0 .6.4 1 1 1h1.4a2.6 2.6 0 0 0 2.6-2.6v-1.8a2.6 2.6 0 0 0-2.6-2.6H11Zm1 5v-3h.4a.6.6 0 0 1 .6.6v1.8a.6.6 0 0 1-.6.6H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
                                                            </svg>
                                                        @else
                                                            <svg class="w-10 h-full" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M16 18H8l2.5-6 2 4 1.5-2 2 4Zm-1-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4c0 .6-.4 1-1 1H5m14-4v16c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1V8c0-.4.1-.6.3-.8l4-4 .6-.2H18c.6 0 1 .4 1 1ZM8 18h8l-2-4-1.5 2-2-4L8 18Zm7-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                            </svg>
                                                        @endif

                                                    </div>
                                                    <div>
                                                        {{$data->description}}
                                                    </div>
                                                </div>
                                                <div class="flex justify-start items-center gap-4 ">
                                                    <div>
                                                        <a href="{{route('rtms.file.viewer',[
                                                'type'=>$data->file_type,
                                                'file'=>$data->file,
                                                'home'=>route('abh.staff.commercialization.precom.details',['precom'=>$precom_tech->id]),
                                                'base_layout'=>\App\View\Components\abh\AbhLayout::class
                                                ])}}" class="border px-4 py-1 text-sm font-medium hover:text-sky-500 dark:hover:text-sky-500 border-gray-200 group-hover:border-sky-500 transition duration-300  dark:border-gray-700 rounded-full">
                                                            Open Attachment
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <x-pop-modal class="max-w-md" :with-close="false"  name="delete-feasibility-{{$data->id}}">
                                                            <div class="text-center ">
                                                                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                                <p class="mb-4 font-medium text-gray-500 dark:text-gray-300">
                                                                    {{$data->description}}
                                                                </p>

                                                                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>

                                                                <div class="flex justify-center items-center space-x-4">
                                                                    <button data-modal-toggle="delete-feasibility-{{$data->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                        No, cancel
                                                                    </button>
                                                                    <button type="submit" wire:click.prevent="deleteFeasibilityFile({{$data->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                        Yes, I'm sure
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </x-pop-modal>
                                                        <button data-modal-toggle="delete-feasibility-{{$data->id}}" class="border flex gap-2 hover:text-red-500 hover:bg-red-200  dark:hover:bg-red-950 hover:dark:text-red-400 group-hover:border-red-600 transition duration-300 px-4 py-1 text-sm font-medium border-gray-200 dark:border-gray-700 rounded-full">
                                                            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                            </svg>
                                                            Delete File
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                    @empty
                                        <li>
                                            No data available
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                            <x-slot:footer>
                                <x-sub-label>
                                    <p class="text-sky-600 dark:text-sky-300">
                                        <i>
                                            Attachment can be in Image or PDF Format.
                                        </i>
                                    </p>
                                </x-sub-label>
                            </x-slot:footer>
                        </x-card-panel>
                        <x-card-panel title="Business Model/Business Plan">
                            <x-slot:button>
                                <x-pop-modal name="addFile_Business" modal-title="Update Business Model/Business Plan files" class="max-w-xl" static="true">
                                    <form class="space-y-5" wire:submit.prevent="saveBusinessFile">
                                        <div class="space-y-4">
                                            <div>
                                                <x-input-label value="Upload file"/>
                                                <x-text-input wire:model.lazy="business_plan_files" type="file" accept="application/pdf,image/png,image/jpeg" class="w-full"  />
                                                <x-sub-label>
                                                    PDF or Image (png or jpg) file format (MAX. 20MB).
                                                </x-sub-label>
                                                <x-input-error :messages="$errors->get('business_plan_files')"/>
                                            </div>
                                            <div>
                                                <x-input-label value="File Description"/>
                                                <x-text-box wire:model.lazy="business_plan_descriptions" placeholder="enter text here"/>
                                                <x-sub-label>
                                                    Maximum of 100 characters
                                                </x-sub-label>
                                                <x-input-error :messages="$errors->get('business_plan_descriptions')"/>
                                            </div>
                                        </div>
                                        <div>
                                            <x-submit-button class="min-w-full"  wire:loading.attr="disabled" wire:target="saveBusinessFile">
                                                <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveBusinessFile">
                                                    Submit
                                                </div>
                                                <div class="p-2 w-full text-center" wire:loading wire:target="saveBusinessFile">
                                                    Processing
                                                </div>
                                            </x-submit-button>
                                        </div>
                                    </form>
                                </x-pop-modal>
                                <x-secondary-button data-modal-toggle="addFile_Business">
                                    Add File
                                </x-secondary-button>
                            </x-slot:button>
                            <div>
                                <ul class="list-inside">
                                    @forelse($precom_tech->business_plan as $data)
                                        <li>
                                            <div  class="space-y-5 rounded py-4 hover:bg-gray-200 group hover:dark:bg-gray-900 transition duration-200 px-4">
                                                <div class="flex justify-start items-center gap-4">
                                                    <div class="hidden md:block">
                                                        @if($data->file_type==='pdf')
                                                            <svg class="w-10 h-full " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7c0 1.1.9 2 2 2 0 1.1.9 2 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5c0 .6.4 1 1 1h1.4a2.6 2.6 0 0 0 2.6-2.6v-1.8a2.6 2.6 0 0 0-2.6-2.6H11Zm1 5v-3h.4a.6.6 0 0 1 .6.6v1.8a.6.6 0 0 1-.6.6H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
                                                            </svg>
                                                        @else
                                                            <svg class="w-10 h-full" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M16 18H8l2.5-6 2 4 1.5-2 2 4Zm-1-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4c0 .6-.4 1-1 1H5m14-4v16c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1V8c0-.4.1-.6.3-.8l4-4 .6-.2H18c.6 0 1 .4 1 1ZM8 18h8l-2-4-1.5 2-2-4L8 18Zm7-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                            </svg>
                                                        @endif

                                                    </div>
                                                    <div>
                                                        {{$data->description}}
                                                    </div>
                                                </div>
                                                <div class="flex justify-start items-center gap-4 ">
                                                    <div>
                                                        <a href="{{route('rtms.file.viewer',[
                                                'type'=>$data->file_type,
                                                'file'=>$data->file,
                                                'home'=>route('abh.staff.commercialization.precom.details',['precom'=>$precom_tech->id]),
                                                'base_layout'=>\App\View\Components\abh\AbhLayout::class
                                                ])}}" class="border px-4 py-1 text-sm font-medium hover:text-sky-500 dark:hover:text-sky-500 border-gray-200 group-hover:border-sky-500 transition duration-300  dark:border-gray-700 rounded-full">
                                                            Open Attachment
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <x-pop-modal class="max-w-md" :with-close="false"  name="delete-business-{{$data->id}}">
                                                            <div class="text-center ">
                                                                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                                <p class="mb-4 font-medium text-gray-500 dark:text-gray-300">
                                                                    {{$data->description}}
                                                                </p>

                                                                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>

                                                                <div class="flex justify-center items-center space-x-4">
                                                                    <button data-modal-toggle="delete-business-{{$data->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                        No, cancel
                                                                    </button>
                                                                    <button type="submit" wire:click.prevent="deleteBusinessFile({{$data->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                        Yes, I'm sure
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </x-pop-modal>
                                                        <button data-modal-toggle="delete-business-{{$data->id}}" class="border flex gap-2 hover:text-red-500 hover:bg-red-200  dark:hover:bg-red-950 hover:dark:text-red-400 group-hover:border-red-600 transition duration-300 px-4 py-1 text-sm font-medium border-gray-200 dark:border-gray-700 rounded-full">
                                                            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                            </svg>
                                                            Delete File
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                    @empty
                                        <li>
                                            No data available
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                            <x-slot:footer>
                                <x-sub-label>
                                    <p class="text-sky-600 dark:text-sky-300">
                                        <i>
                                            Attachment can be in Image or PDF Format.
                                        </i>
                                    </p>
                                </x-sub-label>
                            </x-slot:footer>
                        </x-card-panel>
                        <x-card-panel title="Fairness Opinion Report">
                            <x-slot:button>
                                <x-pop-modal name="addFile_Fairness" modal-title="Update Fairness Opinion Report files" class="max-w-xl" static="true">
                                    <form class="space-y-5" wire:submit.prevent="saveFairnessFile">
                                        <div class="space-y-4">
                                            <div>
                                                <x-input-label value="Upload file"/>
                                                <x-text-input wire:model.lazy="fairness_files" type="file" accept="application/pdf,image/png,image/jpeg" class="w-full"  />
                                                <x-sub-label>
                                                    PDF or Image (png or jpg) file format (MAX. 20MB).
                                                </x-sub-label>
                                                <x-input-error :messages="$errors->get('fairness_files')"/>
                                            </div>
                                            <div>
                                                <x-input-label value="File Description"/>
                                                <x-text-box wire:model.lazy="fairness_descriptions" placeholder="enter text here"/>
                                                <x-sub-label>
                                                    Maximum of 100 characters
                                                </x-sub-label>
                                                <x-input-error :messages="$errors->get('fairness_descriptions')"/>
                                            </div>
                                        </div>
                                        <div>
                                            <x-submit-button class="min-w-full"  wire:loading.attr="disabled" wire:target="saveFairnessFile">
                                                <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveFairnessFile">
                                                    Submit
                                                </div>
                                                <div class="p-2 w-full text-center" wire:loading wire:target="saveFairnessFile">
                                                    Processing
                                                </div>
                                            </x-submit-button>
                                        </div>
                                    </form>
                                </x-pop-modal>
                                <x-secondary-button data-modal-toggle="addFile_Fairness">
                                    Add File
                                </x-secondary-button>
                            </x-slot:button>
                            <div>
                                <ul class="list-inside">
                                    @forelse($precom_tech->opinion_report as $data)
                                        <li>
                                            <div  class="space-y-5 rounded py-4 hover:bg-gray-200 group hover:dark:bg-gray-900 transition duration-200 px-4">
                                                <div class="flex justify-start items-center gap-4">
                                                    <div class="hidden md:block">
                                                        @if($data->file_type==='pdf')
                                                            <svg class="w-10 h-full " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7c0 1.1.9 2 2 2 0 1.1.9 2 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5c0 .6.4 1 1 1h1.4a2.6 2.6 0 0 0 2.6-2.6v-1.8a2.6 2.6 0 0 0-2.6-2.6H11Zm1 5v-3h.4a.6.6 0 0 1 .6.6v1.8a.6.6 0 0 1-.6.6H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
                                                            </svg>
                                                        @else
                                                            <svg class="w-10 h-full" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M16 18H8l2.5-6 2 4 1.5-2 2 4Zm-1-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4c0 .6-.4 1-1 1H5m14-4v16c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1V8c0-.4.1-.6.3-.8l4-4 .6-.2H18c.6 0 1 .4 1 1ZM8 18h8l-2-4-1.5 2-2-4L8 18Zm7-8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                                            </svg>
                                                        @endif

                                                    </div>
                                                    <div>
                                                        {{$data->description}}
                                                    </div>
                                                </div>
                                                <div class="flex justify-start items-center gap-4 ">
                                                    <div>
                                                        <a href="{{route('rtms.file.viewer',[
                                                'type'=>$data->file_type,
                                                'file'=>$data->file,
                                                'home'=>route('abh.staff.commercialization.precom.details',['precom'=>$precom_tech->id]),
                                                'base_layout'=>\App\View\Components\abh\AbhLayout::class
                                                ])}}" class="border px-4 py-1 text-sm font-medium hover:text-sky-500 dark:hover:text-sky-500 border-gray-200 group-hover:border-sky-500 transition duration-300  dark:border-gray-700 rounded-full">
                                                            Open Attachment
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <x-pop-modal class="max-w-md" :with-close="false"  name="delete-fairness-{{$data->id}}">
                                                            <div class="text-center ">
                                                                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                                <p class="mb-4 font-medium text-gray-500 dark:text-gray-300">
                                                                    {{$data->description}}
                                                                </p>

                                                                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>

                                                                <div class="flex justify-center items-center space-x-4">
                                                                    <button data-modal-toggle="delete-fairness-{{$data->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                        No, cancel
                                                                    </button>
                                                                    <button type="submit" wire:click.prevent="deleteFairnessFile({{$data->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                        Yes, I'm sure
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </x-pop-modal>
                                                        <button data-modal-toggle="delete-fairness-{{$data->id}}" class="border flex gap-2 hover:text-red-500 hover:bg-red-200  dark:hover:bg-red-950 hover:dark:text-red-400 group-hover:border-red-600 transition duration-300 px-4 py-1 text-sm font-medium border-gray-200 dark:border-gray-700 rounded-full">
                                                            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                            </svg>
                                                            Delete File
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                    @empty
                                        <li>
                                            No data available
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                            <x-slot:footer>
                                <x-sub-label>
                                    <p class="text-sky-600 dark:text-sky-300">
                                        <i>
                                            Attachment can be in Image or PDF Format.
                                        </i>
                                    </p>
                                </x-sub-label>
                            </x-slot:footer>
                        </x-card-panel>
                    </div>


                </div>
                <div class="md:col-span-2">
                    <div class="space-y-5">
                        <div>
                            <livewire:abh.component.precom.abh-tech-video :precom="$precom_tech" />
                        </div>
                        <div>
                            <x-card-panel title="Other Details" >
                                <div class="space-y-5">
                                    <div class="border rounded border-gray-200 dark:border-gray-600 p-2 space-y-2">
                                        <div class="font-medium text-sm flex justify-between items-center">
                                            <div>
                                                Starting Capital
                                            </div>
                                            <x-pop-modal modal-title="Update Starting Capital" name="authentication-modal-capital" class="max-w-md" static="true" >
                                                <form class="space-y-6" wire:submit.prevent="saveCapitalModel">
                                                    <div class="space-y-4">
                                                        <x-input-label value="Amount" for="file_input"/>
                                                        <x-text-input class="w-full" wire:model.lazy="capitalModel" type="number" step="any" placeholder="0.00"/>
                                                        <x-input-error :messages="$errors->get('capitalModel')"/>
                                                        <x-alert-success :message="session('capitalModel')"/>

                                                    </div>
                                                    <div>
                                                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveCapitalModel">
                                                            <div class="w-full text-center p-2" wire:loading.remove wire:target="saveCapitalModel">
                                                                Submit
                                                            </div>
                                                            <div class="w-full text-center p-2" wire:loading wire:target="saveCapitalModel">
                                                                Processing...
                                                            </div>
                                                        </x-submit-button>
                                                    </div>
                                                </form>
                                            </x-pop-modal>
                                            <button data-modal-toggle="authentication-modal-capital" class="hover:text-sky-500 hover:border-sky-500 dark:hover:border-sky-500 border rounded-full px-4 py-1 border-gray-200 dark:border-gray-700">
                                                Update
                                            </button>
                                        </div>
                                        <div class="px-4 flex gap-2 text-gray-900 dark:text-white">
                                            @if($capitalModel)
                                                <svg class="w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 32C46.3 32 32 46.3 32 64v64c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 32c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 64v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384h80c68.4 0 127.7-39 156.8-96H352c17.7 0 32-14.3 32-32s-14.3-32-32-32h-.7c.5-5.3 .7-10.6 .7-16s-.2-10.7-.7-16h.7c17.7 0 32-14.3 32-32s-14.3-32-32-32H332.8C303.7 71 244.4 32 176 32H64zm190.4 96H96V96h80c30.5 0 58.2 12.2 78.4 32zM96 192H286.9c.7 5.2 1.1 10.6 1.1 16s-.4 10.8-1.1 16H96V192zm158.4 96c-20.2 19.8-47.9 32-78.4 32H96V288H254.4z"/></svg>
                                                {{number_format($capitalModel,2)}}
                                            @else
                                                Nodata available
                                            @endif

                                        </div>

                                    </div>
                                    <div class="border rounded border-gray-200 dark:border-gray-600 p-2 space-y-2">
                                        <div class="font-medium text-sm flex justify-between items-center">
                                            <div>
                                                Estimated cost of ownership
                                            </div>
                                            <x-pop-modal modal-title="Update cost of ownership" name="authentication-modal-cost" class="max-w-md" static="true" >
                                                <form class="space-y-6" wire:submit.prevent="saveCostModel">
                                                    <div class="space-y-4">
                                                        <x-input-label value="Estimated Cost" />
                                                        <x-text-input wire:model.lazy="costModel" required class="w-full" placeholder="0.00"/>
                                                        <x-input-error :messages="$errors->get('costModel')"/>
                                                        <x-alert-success :message="session('costModel')"/>
                                                    </div>
                                                    <div>
                                                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveCostModel">
                                                            <div class="w-full text-center p-2" wire:loading.remove wire:target="saveCostModel">
                                                                Submit
                                                            </div>
                                                            <div class="w-full text-center p-2" wire:loading wire:target="saveCostModel">
                                                                Processing...
                                                            </div>
                                                        </x-submit-button>
                                                    </div>


                                                </form>
                                            </x-pop-modal>
                                            <button data-modal-toggle="authentication-modal-cost" class="hover:text-sky-500 hover:border-sky-500 dark:hover:border-sky-500 border rounded-full px-4 py-1 border-gray-200 dark:border-gray-700">
                                                Update
                                            </button>
                                        </div>
                                        <div class="px-4 flex gap-2 text-gray-900 dark:text-white">
                                            @if($costModel)
                                                <svg class="w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 32C46.3 32 32 46.3 32 64v64c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 32c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 64v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384h80c68.4 0 127.7-39 156.8-96H352c17.7 0 32-14.3 32-32s-14.3-32-32-32h-.7c.5-5.3 .7-10.6 .7-16s-.2-10.7-.7-16h.7c17.7 0 32-14.3 32-32s-14.3-32-32-32H332.8C303.7 71 244.4 32 176 32H64zm190.4 96H96V96h80c30.5 0 58.2 12.2 78.4 32zM96 192H286.9c.7 5.2 1.1 10.6 1.1 16s-.4 10.8-1.1 16H96V192zm158.4 96c-20.2 19.8-47.9 32-78.4 32H96V288H254.4z"/></svg>
                                                {{number_format($costModel,2)}}
                                            @else
                                                No data available
                                            @endif

                                        </div>

                                    </div>
                                    <div class="border rounded border-gray-200 dark:border-gray-600 p-2 space-y-2">
                                        <div class="font-medium text-sm flex justify-between items-center">
                                            <div>
                                                Income Generated
                                            </div>
                                            <x-pop-modal modal-title="Update income generated" name="authentication-modal-income" class="max-w-md" static="true" >
                                                <form class="space-y-6" wire:submit.prevent="saveIncomeModel">
                                                    <div class="space-y-4">
                                                        <x-input-label value="Income" />
                                                        <x-text-input wire:model.lazy="incomeModel" required class="w-full" placeholder="0.00"/>
                                                        <x-input-error :messages="$errors->get('incomeModel')"/>
                                                        <x-alert-success :message="session('incomeModel')"/>
                                                    </div>
                                                    <div>
                                                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveIncomeModel">
                                                            <div class="w-full text-center p-2" wire:loading.remove wire:target="saveIncomeModel">
                                                                Submit
                                                            </div>
                                                            <div class="w-full text-center p-2" wire:loading wire:target="saveIncomeModel">
                                                                Processing...
                                                            </div>
                                                        </x-submit-button>
                                                    </div>


                                                </form>
                                            </x-pop-modal>
                                            <button data-modal-toggle="authentication-modal-income" class="hover:text-sky-500 hover:border-sky-500 dark:hover:border-sky-500 border rounded-full px-4 py-1 border-gray-200 dark:border-gray-700">
                                                Update
                                            </button>
                                        </div>
                                        <div class="px-4 flex gap-2 text-gray-900 dark:text-white">
                                            @if($incomeModel)
                                                <svg class="w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 32C46.3 32 32 46.3 32 64v64c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 32c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 64v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384h80c68.4 0 127.7-39 156.8-96H352c17.7 0 32-14.3 32-32s-14.3-32-32-32h-.7c.5-5.3 .7-10.6 .7-16s-.2-10.7-.7-16h.7c17.7 0 32-14.3 32-32s-14.3-32-32-32H332.8C303.7 71 244.4 32 176 32H64zm190.4 96H96V96h80c30.5 0 58.2 12.2 78.4 32zM96 192H286.9c.7 5.2 1.1 10.6 1.1 16s-.4 10.8-1.1 16H96V192zm158.4 96c-20.2 19.8-47.9 32-78.4 32H96V288H254.4z"/></svg>
                                                {{number_format($incomeModel,2)}}
                                            @else
                                                No data available
                                            @endif

                                        </div>

                                    </div>
                                    <div class="border rounded border-gray-200 dark:border-gray-600 p-2 space-y-2">
                                        <div class="font-medium text-sm flex justify-between items-center">
                                            <div>
                                                Return of Investment
                                            </div>
                                            <x-pop-modal modal-title="Return of Investment" name="authentication-modal-investment" class="max-w-md" static="true" >
                                                <form class="space-y-6" wire:submit.prevent="saveInvestmentModel">
                                                    <div class="space-y-4">
                                                        <x-input-label value="Amount" />
                                                        <x-text-input wire:model.lazy="investmentModel" required class="w-full" placeholder="0.00"/>
                                                        <x-input-error :messages="$errors->get('investmentModel')"/>
                                                        <x-alert-success :message="session('investmentModel')"/>
                                                    </div>
                                                    <div>
                                                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveInvestmentModel">
                                                            <div class="w-full text-center p-2" wire:loading.remove wire:target="saveInvestmentModel">
                                                                Submit
                                                            </div>
                                                            <div class="w-full text-center p-2" wire:loading wire:target="saveInvestmentModel">
                                                                Processing...
                                                            </div>
                                                        </x-submit-button>
                                                    </div>


                                                </form>
                                            </x-pop-modal>
                                            <button data-modal-toggle="authentication-modal-investment" class="hover:text-sky-500 hover:border-sky-500 dark:hover:border-sky-500 border rounded-full px-4 py-1 border-gray-200 dark:border-gray-700">
                                                Update
                                            </button>
                                        </div>
                                        <div class="px-4 flex gap-2 text-gray-900 dark:text-white">
                                            @if($investmentModel)

                                                <div>
                        <span class="text-gray-600 text-lg font-medium dark:text-gray-200">
                                   {{$investmentModel}}
                        </span>
                                                </div>
                                            @else
                                                <div class="text-gray-600 dark:text-gray-400 w-full  m-auto">
                                                    No data Available
                                                </div>

                                            @endif
                                        </div>

                                    </div>
                                    <div class="border rounded border-gray-200 dark:border-gray-600 p-2 space-y-2">
                                        <div class="font-medium text-sm flex justify-between items-center">
                                            <div>
                                                Break Even
                                            </div>
                                            <x-pop-modal modal-title="break Even" name="authentication-modal-breakeven" class="max-w-md" static="true" >

                                                <form class="space-y-6" wire:submit.prevent="saveBreakevenModel">
                                                    <div class="space-y-4">
                                                        <x-input-label value="Amount" />
                                                        <x-text-input wire:model.lazy="breakevenModel" required class="w-full" placeholder="0.00"/>
                                                        <x-input-error :messages="$errors->get('breakevenModel')"/>
                                                        <x-alert-success :message="session('breakevenModel')"/>
                                                    </div>
                                                    <div>
                                                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveBreakevenModel">
                                                            <div class="w-full text-center p-2" wire:loading.remove wire:target="saveBreakevenModel">
                                                                Submit
                                                            </div>
                                                            <div class="w-full text-center p-2" wire:loading wire:target="saveBreakevenModel">
                                                                Processing...
                                                            </div>
                                                        </x-submit-button>
                                                    </div>


                                                </form>
                                            </x-pop-modal>
                                            <button data-modal-toggle="authentication-modal-breakeven" class="hover:text-sky-500 hover:border-sky-500 dark:hover:border-sky-500 border rounded-full px-4 py-1 border-gray-200 dark:border-gray-700">
                                                Update
                                            </button>
                                        </div>
                                        <div class="px-4 flex justify-start items-center  text-gray-900 dark:text-white">
                                            @if($breakevenModel)
                                                {{$breakevenModel}}
                                                <i class="fa-sharp fa-light ms-1 fa-percent"></i>
                                            @else
                                                No data available
                                            @endif

                                        </div>

                                    </div>
                                    <div class="border rounded border-gray-200 dark:border-gray-600 p-2 space-y-2">
                                        <div class="font-medium text-sm flex justify-between items-center">
                                            <div>
                                                Mode Applicable
                                            </div>
                                            <x-pop-modal modal-title="break Even" name="authentication-modal-comMode" class="max-w-md" static="true" >

                                                <form class="space-y-6" wire:submit.prevent="saveCommercializationModeModel">
                                                    <div class="space-y-4">
                                                        <x-input-label value="Select Mode" />
                                                        <x-input-select  wire:model="commercializationModeModel" >
                                                            <option value="" selected>Select Mode</option>
                                                            <option value="Licensing Agreement/s">Licensing Agreement/s</option>
                                                            <option value="Outright sale">Outright sale</option>
                                                            <option value="Joint venture">Joint venture</option>
                                                            <option value="Start-up">Start-up</option>
                                                            <option value="Spin-off">Spin-off</option>
                                                        </x-input-select>

                                                        <x-input-error :messages="$errors->get('commercializationModeModel')"/>
                                                        <x-alert-success :message="session('commercializationModeModel')"/>
                                                    </div>
                                                    <div>
                                                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveCommercializationModeModel">
                                                            <div class="w-full text-center p-2" wire:loading.remove wire:target="saveCommercializationModeModel">
                                                                Submit
                                                            </div>
                                                            <div class="w-full text-center p-2" wire:loading wire:target="saveCommercializationModeModel">
                                                                Processing...
                                                            </div>
                                                        </x-submit-button>
                                                    </div>


                                                </form>
                                            </x-pop-modal>
                                            <button data-modal-toggle="authentication-modal-comMode" class="hover:text-sky-500 hover:border-sky-500 dark:hover:border-sky-500 border rounded-full px-4 py-1 border-gray-200 dark:border-gray-700">
                                                Update
                                            </button>
                                        </div>
                                        <div class="px-4   text-gray-900 dark:text-white">
                                            <ul class="mt-4 divide-y divide-gray-400 dark:divide-gray-600">
                                                @foreach($precom_tech->modes as $mode)
                                                    <li class="py-2">
                                                        <div class="justify-between flex items-center">
                                                            <x-input-label value="{{$mode->commercialization_mode}}"/>

                                                            <div wire:ignore.self id="popup-modal-deleteMode{{$mode->id}}" tabindex="-1"
                                                                 class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                <div class="relative w-full max-w-md max-h-full">
                                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                        <button type="button"
                                                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                                data-modal-hide="popup-modal-deleteMode{{$mode->id}}">
                                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                                 fill="none" viewBox="0 0 14 14">
                                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                            </svg>
                                                                            <span class="sr-only">Close modal</span>
                                                                        </button>
                                                                        <div class="p-6 text-center">
                                                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                                                 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                                 viewBox="0 0 20 20">
                                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                                                      stroke-width="2"
                                                                                      d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                                            </svg>
                                                                            <div class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                                                {{$mode->commercialization_mode}}
                                                                            </div>
                                                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure
                                                                                you want to delete this product?</h3>
                                                                            <button data-modal-hide="popup-modal" wire:click.prevent="deleteMode({{$mode->id}})"
                                                                                    type="button"
                                                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                                                <div wire:loading wire:target="deleteMode">
                                                                                    Processing...
                                                                                </div>
                                                                                <div wire:loading.remove wire:target="deleteMode">
                                                                                    Yes, I'm sure
                                                                                </div>
                                                                            </button>
                                                                            <button data-modal-hide="popup-modal-deleteMode{{$mode->id}}" type="button"
                                                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                                No, cancel
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <button data-modal-target="popup-modal-deleteMode{{$mode->id}}"
                                                                    data-modal-toggle="popup-modal-deleteMode{{$mode->id}}"
                                                                    class="hover:text-red-600 dark:hover:text-red-600 border rounded-full flex justify-center items-center gap-2 border-gray-200 dark:border-gray-700 px-2 py-1 hover:border-red-600 dark:hover:border-red-600">
                                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                     viewBox="0 0 18 20">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                          d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                                                </svg>
                                                                Delete
                                                            </button>
                                                        </div>

                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </x-card-panel>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>

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
                                <a href="{{ route('abh.admin.file',[
                                'type' => 'png',
                                'file'=>$technology->tech_photo,
                                'home'=>route('abh.admin.commercialization.precom-details.admin',['precom' => $precom_tech->id]),


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

                            <div>
                                <ul class="list-inside divide-y divide-gray-200 dark:divide-gray-600">
                                    @forelse($precom_tech->market_study_files as $data)
                                        <li>
                                            <div  class="space-y-5 rounded py-4 hover:bg-gray-200 group hover:dark:bg-gray-900 transition duration-200 px-4">

                                                <a href="{{route('abh.admin.file',[
                                                'type'=>$data->file_type,
                                                'file'=>$data->file,
                                                'home'=>route('abh.admin.commercialization.precom-details.admin',['precom'=>$precom_tech->id]),

                                                ])}}">
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
                                                </a>
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

                            <div>
                                <ul class="list-inside">
                                    @foreach($precom_tech->valuation_summary_files as $data)
                                        <li>
                                            <div  class="space-y-5 rounded py-4 hover:bg-gray-200 group hover:dark:bg-gray-900 transition duration-200 px-4">

                                                <a href="{{route('abh.admin.file',[
                                                'type'=>$data->file_type,
                                                'file'=>$data->file,
                                                'home'=>route('abh.admin.commercialization.precom-details.admin',['precom'=>$precom_tech->id]),

                                                ])}}">
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
                                                </a>
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

                            <div>
                                <ul class="list-inside">
                                    @forelse($precom_tech->freedom_summary_files as $data)
                                        <li>
                                            <div  class="space-y-5 rounded py-4 hover:bg-gray-200 group hover:dark:bg-gray-900 transition duration-200 px-4">

                                                <a href="{{route('abh.admin.file',[
                                                'type'=>$data->file_type,
                                                'file'=>$data->file,
                                                'home'=>route('abh.admin.commercialization.precom-details.admin',['precom'=>$precom_tech->id]),

                                                ])}}">
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
                                                </a>
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

                            <div>
                                <ul class="list-inside">
                                    @forelse($precom_tech->term_sheet_files as $data)
                                        <li>
                                            <div  class="space-y-5 rounded py-4 hover:bg-gray-200 group hover:dark:bg-gray-900 transition duration-200 px-4">

                                                <a href="{{route('abh.admin.file',[
                                                'type'=>$data->file_type,
                                                'file'=>$data->file,
                                                'home'=>route('abh.admin.commercialization.precom-details.admin',['precom'=>$precom_tech->id]),
                                                ])}}">
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
                                                </a>
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

                            <div>
                                <ul class="list-inside">
                                    @forelse($precom_tech->license_agreement_copies as $data)
                                        <li>
                                            <div  class="space-y-5 rounded py-4 hover:bg-gray-200 group hover:dark:bg-gray-900 transition duration-200 px-4">

                                                <a href="{{route('abh.admin.file',[
                                                'type'=>$data->file_type,
                                                'file'=>$data->file,
                                                'home'=>route('abh.admin.commercialization.precom-details.admin',['precom'=>$precom_tech->id]),
                                                ])}}">
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
                                                </a>
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

                            <div>
                                <ul class="list-inside">
                                    @forelse($precom_tech->financial_annalysis as $data)
                                        <li>
                                            <div  class="space-y-5 rounded py-4 hover:bg-gray-200 group hover:dark:bg-gray-900 transition duration-200 px-4">

                                                <a href="{{route('abh.admin.file',[
                                                'type'=>$data->file_type,
                                                'file'=>$data->file,
                                                'home'=>route('abh.admin.commercialization.precom-details.admin',['precom'=>$precom_tech->id]),
                                                ])}}">
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
                                                </a>
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

                            <div>
                                <ul class="list-inside">
                                    @forelse($precom_tech->testing_certification as $data)
                                        <li>
                                            <div  class="space-y-5 rounded py-4 hover:bg-gray-200 group hover:dark:bg-gray-900 transition duration-200 px-4">

                                                <a href="{{route('abh.admin.file',[
                                                'type'=>$data->file_type,
                                                'file'=>$data->file,
                                                'home'=>route('abh.admin.commercialization.precom-details.admin',['precom'=>$precom_tech->id]),
                                                ])}}">
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
                                                </a>
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

                            <div>
                                <ul class="list-inside">
                                    @forelse($precom_tech->feasibility_studies as $data)
                                        <li>
                                            <div  class="space-y-5 rounded py-4 hover:bg-gray-200 group hover:dark:bg-gray-900 transition duration-200 px-4">

                                                <a href="{{route('abh.admin.file',[
                                                'type'=>$data->file_type,
                                                'file'=>$data->file,
                                                'home'=>route('abh.admin.commercialization.precom-details.admin',['precom'=>$precom_tech->id]),
                                                ])}}">
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
                                                </a>
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

                            <div>
                                <ul class="list-inside">
                                    @forelse($precom_tech->business_plan as $data)
                                        <li>
                                            <div  class="space-y-5 rounded py-4 hover:bg-gray-200 group hover:dark:bg-gray-900 transition duration-200 px-4">

                                                <a href="{{route('abh.admin.file',[
                                                'type'=>$data->file_type,
                                                'file'=>$data->file,
                                                'home'=>route('abh.admin.commercialization.precom-details.admin',['precom'=>$precom_tech->id]),
                                                ])}}">
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
                                                </a>
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

                            <div>
                                <ul class="list-inside">
                                    @forelse($precom_tech->opinion_report as $data)
                                        <li>
                                            <div  class="space-y-5 rounded py-4 hover:bg-gray-200 group hover:dark:bg-gray-900 transition duration-200 px-4">

                                                <a href="{{route('abh.admin.file',[
                                                'type'=>$data->file_type,
                                                'file'=>$data->file,
                                                'home'=>route('abh.admin.commercialization.precom-details.admin',['precom'=>$precom_tech->id]),
                                                ])}}">
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
                                                </a>
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
                            <x-card-panel title="PreCommercialization Videos">
                                <ul class="mt-2 divide-y divide-gray-200 dark:divide-gray-600" >
                                    @forelse($precom_tech->video as $video)
                                        <li>
                                            <div class="p-2 ">

                                                <div class="w-full aspect-video bg-gray-950 rounded-lg flex justify-center items-center group">
                                                    <div class="border rounded-full px-4 py-2  group-hover:hidden transition duration-300">

                                                        <div class="flex justify-center items-center gap-2">
                                                            @if($video->type==='local')
                                                                <div>
                                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 4H5a1 1 0 0 0-1 1v14c0 .6.4 1 1 1h14c.6 0 1-.4 1-1V5c0-.6-.4-1-1-1Zm0 0-4 4m5 0H4m1 0 4-4m1 4 4-4m-4 7v6l4-3-4-3Z"/>
                                                                    </svg>
                                                                </div>
                                                                <div>
                                                                    Local video
                                                                </div>
                                                            @else
                                                                <div class="flex gap-1">
                                                                    <svg class="w-5 h-5 " id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                                         viewBox="0 0 461.001 461.001" xml:space="preserve">
                        <g>
                            <path style="fill:#F61C0D;"
                                  d="M365.257,67.393H95.744C42.866,67.393,0,110.259,0,163.137v134.728c0,52.878,42.866,95.744,95.744,95.744h269.513c52.878,0,95.744-42.866,95.744-95.744V163.137C461.001,110.259,418.135,67.393,365.257,67.393z M300.506,237.056l-126.06,60.123c-3.359,1.602-7.239-0.847-7.239-4.568V168.607c0-3.774,3.982-6.22,7.348-4.514l126.06,63.881C304.363,229.873,304.298,235.248,300.506,237.056z"/>
                        </g>
                    </svg>
                                                                    <svg class="w-5 h-5 mx-2" viewBox="0 -3 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg">

                                                                        <title>drive-color</title>
                                                                        <desc>Created with Sketch.</desc>
                                                                        <defs>

                                                                        </defs>
                                                                        <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <g id="Color-" transform="translate(-601.000000, -955.000000)">
                                                                                <g id="drive" transform="translate(601.000000, 955.000000)">
                                                                                    <polygon id="Shape" fill="#3777E3"
                                                                                             points="8.00048064 42 15.9998798 28 48 28 39.9998798 42">

                                                                                    </polygon>
                                                                                    <polygon id="Shape" fill="#FFCF63"
                                                                                             points="32.0004806 28 48 28 32.0004806 0 15.9998798 0">

                                                                                    </polygon>
                                                                                    <polygon id="Shape" fill="#11A861" points="0 28 8.00048064 42 24 14 15.9998798 0">

                                                                                    </polygon>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </svg>
                                                                </div>
                                                                <div>
                                                                    Embed/Online video
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                    <div class="hidden text-lg space-y-4 font-medium group-hover:block transition duration-300">
                                                        <a href="{{route('abh.admin.file',[
                                                'type'=>$video->type,
                                                'file'=>$video->url,
                                                'home'=>route('abh.admin.commercialization.precom-details.admin',['precom'=>$precom_tech->id]),

                                                ])}}"  class="flex hover:scale-110 transition duration-300 hover:text-white">
                                                            <div class="flex gap-2">

                                                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                                    <path fill-rule="evenodd" d="M8.6 5.2A1 1 0 0 0 7 6v12a1 1 0 0 0 1.6.8l8-6a1 1 0 0 0 0-1.6l-8-6Z" clip-rule="evenodd"/>
                                                                </svg>

                                                                Play Video
                                                            </div>
                                                        </a>


                                                    </div>
                                                </div>
                                                <div class="mt-2 font-medium mb-4">
                                                    {{$video->description}}
                                                </div>


                                            </div>

                                        </li>
                                    @empty
                                        <li>
                                            No videos uploaded
                                        </li>
                                    @endforelse


                                </ul>
                            </x-card-panel>
                        </div>
                        <div>
                            <x-card-panel title="Other Details" >
                                <div class="space-y-5">
                                    <div class="border rounded border-gray-200 dark:border-gray-600 p-2 space-y-2">
                                        <div class="font-medium text-sm flex justify-between items-center">
                                            <div>
                                                Starting Capital
                                            </div>

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

                                        </div>
                                        <div class="px-4   text-gray-900 dark:text-white">
                                            <ul class="mt-4 list-inside list-disc">
                                                @foreach($precom_tech->modes as $mode)
                                                    <li class="ps-5">
                                                        {{__($mode->commercialization_mode)}}
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

<div>
    <x-slot name="pagetitle">
        Adopter Details
    </x-slot>
    <nav class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="block md:flex p-3 justify-between items-center">
                <x-link-button :url="route('abh.staff.commercialization.adopter')">
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
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 relative border border-gray-300 dark:border-gray-700 md:p-4 rounded overflow-hidden">
                @if($technology->tech_photo)
                    <img src="{{\Illuminate\Support\Facades\Storage::url($technology->tech_photo)}}" class="hidden md:block absolute top-0 m-auto object-cover opacity-25 blur-sm  w-full  h-full left-0">
                @endif

                <div class="relative aspect-square">
                    <div class="p-2  md:absolute left-0 top-0 bottom-0 m-auto w-full flex justify-center items-center  md:rounded overflow-hidden md:shadow-lg md:shadow-black backdrop-blur-xl">
                        @if($technology->tech_photo)
                            <a href="{{ route('abh.admin.file',[
                                'type' => 'png',
                                'file'=>$technology->tech_photo,
                                'home'=>route('abh.admin.commercialization.adopter.details',['adopter' => $adopter->id]),


                                ]) }}" >
                                <div class="aspect-square flex justify-center items-center">
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($technology->tech_photo)}}" class="max-w-full w-auto max-h-full  h-auto hover:brightness-50 hover:scale-125 transition duration-300 "/>

                                </div>

                            </a>

                        @else
                            <img src="{{asset('assets/logo/iptbm.ico')}}" class="max-w-full w-auto max-h-full h-auto"/>
                        @endif
                    </div>
                </div>
                <div class="md:col-span-2 relative py-4">
                    <div class="w-full h-full flex justify-center items-center">
                        <div class="bg-gray-950 bg-opacity-20 text-gray-700 dark:text-white dark:bg-opacity-20 p-4 w-full font-medium text-xl">
                            {{__("$technology->title")}}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <x-header-label class="mt-10 mb-2">
            Technology Adopter Details
        </x-header-label>
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 gap-x-10">
            <div class="md:col-span-3">
                <x-card-panel>
                    <div class="space-y-4">
                        <div class="border border-gray-200 group hover:bg-gray-200 dark:hover:bg-gray-900 transition duration-300 dark:border-gray-600 p-2 rounded space-y-4">
                            <div class="flex justify-between items-center">
                                <div class="font-medium">
                                    Company Name
                                </div>

                            </div>
                            <div class="text-gray-800 dark:text-white">
                                {{$adopter->company_name}}
                            </div>
                        </div>
                        <div class="border border-gray-200 group hover:bg-gray-200 dark:hover:bg-gray-900 transition duration-300 dark:border-gray-600 p-2 rounded space-y-4">
                            <div class="flex justify-between items-center">
                                <div class="font-medium">
                                    Company Address
                                </div>

                            </div>
                            <div class="text-gray-800 dark:text-white">
                                {{$adopter->address}}
                            </div>
                        </div>
                        <div class="border border-gray-200 group hover:bg-gray-200 dark:hover:bg-gray-900 transition duration-300 dark:border-gray-600 p-2 rounded space-y-4">
                            <div class="flex justify-between items-center">
                                <div class="font-medium">
                                    Business Structure
                                </div>

                            </div>
                            <div class="text-gray-800 dark:text-white">
                                {{$adopter->business_structures}}
                            </div>
                        </div>
                        <div class="border border-gray-200 group hover:bg-gray-200 dark:hover:bg-gray-900 transition duration-300 dark:border-gray-600 p-2 rounded space-y-4">
                            <div class="flex justify-between items-center">
                                <div class="font-medium">
                                    Business Registration
                                </div>

                            </div>
                            <div class="text-gray-800 dark:text-white">
                                {{$adopter->business_registration}}
                            </div>
                        </div>
                        <div class="border border-gray-200 group hover:bg-gray-200 dark:hover:bg-gray-900 transition duration-300 dark:border-gray-600 p-2 rounded space-y-4">
                            <div class="flex justify-between items-center">
                                <div class="font-medium">
                                    Mode of Technology Acquisition
                                </div>

                            </div>
                            <div class="text-gray-800 dark:text-white">
                                {{$adopter->acquisition_model}}
                            </div>
                        </div>
                        <div class="border border-gray-200 group hover:bg-gray-200 dark:hover:bg-gray-900 transition duration-300 dark:border-gray-600 p-2 rounded space-y-4">
                            <div class="flex justify-between items-center">
                                <div class="font-medium">
                                    Commercialization, for incubation?
                                </div>

                            </div>
                            <div class="text-gray-800 dark:text-white">
                                {{$adopter->for_incubation? "YES":"NO"}}
                            </div>
                        </div>
                        <div class="border border-gray-200 group hover:bg-gray-200 dark:hover:bg-gray-900 transition duration-300 dark:border-gray-600 p-2 rounded space-y-4">
                            <div class="flex justify-between items-center">
                                <div class="font-medium">
                                    Brief Description of the Company
                                </div>

                            </div>
                            <div class="text-gray-800 dark:text-white">
                                {{$adopter->company_description}}
                            </div>
                        </div>
                    </div>
                </x-card-panel>
            </div>
            <div class="md:col-span-2">
                <x-card-panel title="Contact Details">
                    <div class="w-full mt-4">
                        <div class="space-y-5">
                            <div class="p-2">
                                <div class="flex justify-between items-center">
                                    <div class="flex">
                                        <svg class="w-5 me-2 h-5 text-gray-600 dark:text-gray-400" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
                                            <path
                                                d="M12 0H2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM7.5 17.5h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2ZM12 13H2V4h10v9Z"/>
                                        </svg>
                                        Mobile
                                    </div>

                                </div>
                                <div class="mt-2 ps-4">
                                    <ul class="list-inside list-disc ps-5">
                                        @forelse($mobiles as $mobile)
                                            <li>
                                                {{$mobile->contact}}
                                                {{------
                                                <livewire:iptbm.staff.adopter.contact wire:key="mobile-{{$mobile->id}}" :contact="$mobile"/>
                                                ----}}
                                            </li>
                                        @empty
                                            No data available
                                        @endforelse

                                    </ul>

                                </div>
                            </div>
                            <div class=" p-2">
                                <div class="flex justify-between items-center">
                                    <div class="flex">
                                        <svg class="w-5 h-5 me-2 text-gray-600 dark:text-gray-400" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                            <path
                                                d="M10 0A10.011 10.011 0 0 0 0 10v5a3 3 0 0 0 3 3h3a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1H3c-.326.004-.65.062-.957.171a8 8 0 0 1 15.914 0A2.954 2.954 0 0 0 17 9h-3a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h3a3 3 0 0 0 3-3v-5A10.011 10.011 0 0 0 10 0Z"/>
                                        </svg>
                                        Phone
                                    </div>

                                </div>
                                <div class="mt-2 ps-4">
                                    <ul class="list-inside list-disc ps-5">

                                            @forelse($phones as $phone)
                                                <li>
                                                    {{$mobile->contact}}
                                                    {{------
                                                    <livewire:iptbm.staff.adopter.contact wire:key="mobile-{{$mobile->id}}" :contact="$mobile"/>
                                                    ----}}
                                                </li>
                                            @empty
                                                No data available
                                            @endforelse

                                    </ul>

                                </div>
                            </div>

                            <div class=" p-2">
                                <div class="flex justify-between items-center">
                                    <div class="flex">
                                        <svg class="w-5 h-5 me-2 text-gray-600 dark:text-gray-400" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M5 20h10a1 1 0 0 0 1-1v-5H4v5a1 1 0 0 0 1 1Z"/>
                                            <path
                                                d="M18 7H2a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2v-3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-1-2V2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3h14Z"/>
                                        </svg>
                                        Fax
                                    </div>

                                </div>
                                <div class="mt-2 ps-4">
                                    <ul class="list-inside list-disc ps-5">
                                            @forelse($faxs as $fax)
                                                <li>
                                                    {{$fax->contact}}
                                                    {{---------
                                                    <livewire:iptbm.staff.adopter.contact wire:key="fax-{{$fax->id}}" :contact="$fax"/>
                                                    --------}}
                                                </li>
                                            @empty
                                                No data available
                                            @endforelse
                                    </ul>

                                </div>
                            </div>
                            <div class=" p-2">
                                <div class="flex justify-between items-center">
                                    <div class="flex">
                                        <svg class="w-5 h-5 me-2 text-gray-600 dark:text-gray-400" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        Email
                                    </div>

                                </div>
                                <div class="mt-2 ps-4">
                                    <ul class="list-inside list-disc ps-5">
                                            @forelse($emails as $email)
                                                <li>
                                                    {{$email->contact}}
                                                    {{--------
                                                          <livewire:iptbm.staff.adopter.contact wire:key="fax-{{$email->id}}" :contact="$email"/>
                                                    -------}}
                                                </li>
                                            @empty
                                                No data available
                                            @endforelse
                                    </ul>

                                </div>
                            </div>

                        </div>
                    </div>
                </x-card-panel>
            </div>
        </div>
    </div>
</div>

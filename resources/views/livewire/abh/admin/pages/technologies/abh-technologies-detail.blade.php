<div>
    <nav class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="block md:flex justify-between items-center">
                <div class="ms-2 py-2">
                    <x-link-button :url="route('abh.admin.all_technologies')">
                        Back to Technologies
                    </x-link-button>

                </div>

            </div>

        </nav>

    </nav>

    <x-slot name="pagetitle">
        Technologies
    </x-slot>
    <div class=" md:px-4">
        <x-header-label class="mt-10">
            Technology Details

        </x-header-label>
        <div class="mt-2">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 relative border border-gray-300 dark:border-gray-700 md:p-4 rounded overflow-hidden">
                <img  class="hidden md:block absolute top-0 m-auto object-cover opacity-25 blur-sm  w-full  h-full left-0" src="{{Storage::url($technology->tech_photo)}}">
                <div class="relative aspect-square">
                    <div class="p-2  absolute left-0 top-0 bottom-0 m-auto w-full flex justify-center items-center  md:rounded overflow-hidden md:shadow-lg md:shadow-black backdrop-blur-xl">
                        @if($technology->tech_photo)
                            <img  class="max-w-full max-h-full h-auto w-auto" src="{{Storage::url($technology->tech_photo)}}">
                        @else
                            <img  class="max-w-full max-h-full h-auto w-auto" src="{{asset('assets/icon/profile-blank.png')}}">
                        @endif
                    </div>
                </div>
                <div class="md:col-span-2 relative py-4">
                    <div class="w-full h-full flex justify-center items-center">
                        <div class="bg-gray-950 text-gray-600 dark:text-white bg-opacity-20 dark:bg-opacity-20 p-4 w-full font-medium text-xl">
                            @if($technology->title)
                                {{$technology->title}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-10 space-y-5">
                <x-card-panel title="Technology Description">
                    <p>
                        {{__($technology->tech_desc)}}
                    </p>
                </x-card-panel>

            </div>
            <div class="mt-10">
                <div class="grid grid-cols-5 gap-4 gap-x-10">
                    <div class="col-span-3 space-y-4">

                        <x-card-panel title="Technology Owner">
                            <div class="border border-gray-200 dark:border-gray-600 rounded p-4 p-2">
                                <div class="divide-y divide-gray-200 dark:divide-gray-600 text-center">
                                    <div class="font-medium">
                                        {{$technology->iptbmprofiles->agency->name}}
                                    </div>
                                    <div>
                                        Technology Owner
                                    </div>
                                </div>
                                <div class="mt-5">

                                    <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Co-Owner</h2>
                                    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                        @foreach($technology->owner as $coOwn)
                                            <li>
                                                {{$coOwn->agency->name}}
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                        </x-card-panel>

                    </div>
                    <div class="col-span-2">
                        <x-card-panel title="Technology Status">
                            @if($technology->statuses->count()>0)
                                {{$technology->statuses->last()->status}}
                            @else
                                No data available
                            @endif

                        </x-card-panel>
                    </div>
                </div>
                <div class="mt-16">
                    <x-item-header class="mb-2">
                        IP Application Details
                    </x-item-header>
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 gap-x-10">
                        <div class="md:col-span-3 space-y-4">
                            <x-card-panel title="Abstract">
                                @if($ip_tech->abstract)
                                    <p>
                                        {{$ip_tech->abstract}}
                                    </p>
                                @else
                                    No data available
                                @endif
                            </x-card-panel>
                            <x-card-panel title="Status of protection">
                                @if($ip_tech->protectionStatus)
                                    <p>
                                        {{$ip_tech->protectionStatus->protection_status}}
                                    </p>
                                @else
                                    No data available
                                @endif
                            </x-card-panel>
                        </div>
                        <div class="md:col-span-2">
                            <x-card-panel title="Total Cost">
                                <ol class="space-y-4 text-gray-500 list-decimal list-inside dark:text-gray-400">
                                    @forelse($ip_tech->expenses as $expense)
                                        <li>
                                            {{$expense->description}}
                                            <ul class="ps-5 mt-2 space-y-1 c list-inside">
                                                <li>
                                                    <div>
                                               <span class="font-medium text-gray-700 dark:text-white">
                                                   Amount :
                                               </span>
                                                        {{number_format($expense->amount,2)}}
                                                    </div>
                                                </li>


                                            </ul>
                                        </li>
                                    @empty
                                        No data available
                                    @endforelse

                                </ol>
                                <div class="mt-5">
                                    <div class="border border-gray-200 dark:border-gray-600 rounded p-2">
                                    <span class="font-medium text-gray-700 dark:text-white">
                                    Total :
                                    </span>
                                        {{number_format($ip_tech->expenses->sum('amount'),2)}}

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

<div class="w-full">

    <x-pop-modal name="addToPrecom" class="max-w-xl" static="true" modal-title="Add technology for Pre Commercialization">
        <form class="space-y-5" wire:submit.prevent="save_Precom">
            <div>
                <x-text-box wire:model.lazy="new_tech_title" row="5"  placeholder="enter new technology title"/>
                <x-input-error :messages="$errors->get('tech_id')"/>
                <x-input-error :messages="$errors->get('new_tech_title')"/>
            </div>
            <div>
                <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="save_Precom">
                    <div class="p-2 w-full text-center" wire:loading.remove wire:target="save_Precom">
                        submit
                    </div>
                    <div class="p-2 w-full text-center" wire:loading wire:target="save_Precom">
                        Processing
                    </div>
                </x-submit-button>
            </div>
        </form>
    </x-pop-modal>

    <nav class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="block md:flex p-3 justify-between items-center">
                <x-link-button :url="route('abh.staff.technology')">
                    Back to technologies
                </x-link-button>
                <div class="md:flex justify-between gap-4">
                    <x-secondary-button data-modal-toggle="addToPrecom">
                        Add for Pre-Com
                    </x-secondary-button>
                    <x-secondary-button>
                        Add for Adopter
                    </x-secondary-button>
                </div>

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
                                <a href="{{ route('abh.image-viewer',['technology'=>$technology->id]) }}">
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
            <x-card-panel title="Technology Description">
                <div>
                    {{$technology->tech_desc}}
                </div>
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
                <div class="grid grid-cols-5 gap-4 gap-x-10">
                    <div class="md:col-span-3 space-y-4">
                        <x-card-panel title="Abstract">
                            @if($application->abstract)
                                <p>
                                    {{$application->abstract}}
                                </p>
                            @else
                                No data available
                            @endif
                        </x-card-panel>
                        <x-card-panel title="Status of protection">
                            @if($application->protectionStatus)
                                <p>
                                    {{$application->protectionStatus->protection_status}}
                                </p>
                            @else
                                No data available
                            @endif
                        </x-card-panel>
                    </div>
                    <div class="md:col-span-2">
                        <x-card-panel title="Total Cost">
                            <ol class="space-y-4 text-gray-500 list-decimal list-inside dark:text-gray-400">
                                @forelse($application->expenses as $expense)
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
                                   {{number_format($application->expenses->sum('amount'),2)}}

                               </div>
                            </div>
                        </x-card-panel>
                    </div>

                </div>
            </div>
        </div>

        {{-----------------
        <div class="my-10">
            <livewire:abh.technology.tech-main-detail :technology="$technology" />
        </div>
        <div class="grid grid-cols-1 md:grid-cols-5 gap-x-14">
            <div class="col-span-3 space-y-5">
                <livewire:abh.technology.technology-owner :technology="$technology"/>
                <livewire:abh.technology.technology-generator :technology="$technology" />
                <livewire:abh.technology.tech-research-conducted :technology="$technology" />
            </div>
            <div class="col-span-2">
                <x-card-panel>

                </x-card-panel>
            </div>
        </div>
        --------------------}}
    </div>
</div>

<div>
    <div class="flex justify-between items-center">
        <x-item-header class="justify-start items-center">
            <div
                class="rounded-full hidden md:block me-2 border-gray-200  dark:border-gray-900 p-2 overflow-hidden border-8 bg-blue-300 dark:bg-blue-900">
                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 16 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M11 10H1m0 0 3-3m-3 3 3 3m1-9h10m0 0-3 3m3-3-3-3"/>
                </svg>
            </div>

            Technology Transfer Plan
        </x-item-header>
        <livewire:iptbm.staff.technology.techtrans.precom-modal modal-name="precomModal" :technology="$technology"/>
        <livewire:iptbm.staff.technology.techtrans.adopter-modal modal-name="adopterModal" :technology="$technology"/>
        <livewire:iptbm.staff.technology.techtrans.deployment-modal modal-name="deploymentModal"
                                                                    :technology="$technology"/>
        <livewire:iptbm.staff.technology.techtrans.extension-modal modal-name="extensionModal"
                                                                   :technology="$technology"/>


        <div data-popover id="popover-user-profile" role="tooltip"
             class="absolute z-10 invisible inline-block w-44 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-lg shadow-black opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
            <div class="my-3 p-3">
                <ul>

                    <li>
                        <div data-popover id="popover-user-commercial" role="tooltip"
                             class="absolute p-2 z-20 invisible inline-block w-44 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-lg shadow-black opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                            <div class="my-3">
                                <a data-modal-toggle="precomModal"
                                   class="inline-flex items-center justify-center p-2 text-sm font-medium text-gray-500 rounded-lg bg-gray-50 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="w-full">
                                Pre Com
                            </span>
                                    <svg class="w-4 h-4 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                                <a data-modal-toggle="adopterModal"
                                   class="inline-flex items-center justify-center p-2 text-sm font-medium text-gray-500 rounded-lg bg-gray-50 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="w-full">
                                        Adopter
                                    </span>
                                    <svg class="w-4 h-4 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                        <a data-popover-placement="left" data-popover-target="popover-user-commercial"
                           class="inline-flex items-center justify-center p-2 text-sm font-medium text-gray-500 rounded-lg bg-gray-50 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="w-full">
                                Commercialization
                            </span>
                            <svg class="w-4 h-4 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a data-modal-toggle="deploymentModal"
                           class="inline-flex items-center justify-center p-2 text-sm font-medium text-gray-500 rounded-lg bg-gray-50 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="w-full">
                                Deployment
                            </span>
                            <svg class="w-4 h-4 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </li>
                    <li>

                        <a data-modal-toggle="extensionModal"
                           class="inline-flex items-center justify-center p-2 text-sm font-medium text-gray-500 rounded-lg bg-gray-50 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="w-full">
                                Extension
                            </span>
                            <svg class="w-4 h-4 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>

                    </li>
                </ul>
            </div>

        </div>

        <x-secondary-button class="text-sky-600 dark:text-sky-600" data-popover-target="popover-user-profile"
                            data-popover-trigger="click">
            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                 viewBox="0 0 20 18">
                <path
                    d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                <path
                    d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
            </svg>
            Update
        </x-secondary-button>
    </div>
    <div class="mt-4">
        <livewire:iptbm.staff.technology.precom-coun :technology-id="$technology->id"/>
        <livewire:iptbm.staff.technology.com-adopter-count :technology-id="$technology->id"/>
        <livewire:iptbm.staff.technology.deployment-count :technology-id="$technology->id"/>
        <livewire:iptbm.staff.technology.extension-count :technology-id="$technology->id"/>
    </div>
    {{--
    <div class="mb-2 text-gray-600 dark:text-gray-400">
        <span class=" fa-solid fa-arrow-down-up-lock text-blue-900 dark:text-blue-300 rounded-full bg-blue-200 dark:bg-gray-900 p-2 text-sm">

        </span>
        Technology Transfer Plan
    </div>
    <div>


        @if($technology->pre_commercialization->count()>0)
            @foreach($technology->pre_commercialization as $precom)

                <div class="font-medium text-xl text-gray-600 dark:text-gray-400 mb-3">

                    <a href="{{route("iptbm.staff.precom.details",['id'=>$precom->id])}}"
                       class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Commercialization</a>
                </div>
            @endforeach
        @endif
        @if($technology->commercial_adopters->count()>0)
            @foreach($technology->commercial_adopters as $adopter)
                <div class="font-medium text-xl text-gray-600 dark:text-gray-400 mb-3">

                    <a href="{{route("iptbm.staff.commercialization.adoptedTech",['id'=>$adopter->id])}}"
                       class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        Adopter
                    </a>
                    <div class="text-sm font-medium text-gray-600 dark:text-gray-400">
                        {{$adopter->company_name}}
                    </div>
                </div>
            @endforeach
        @endif
        @if($technology->deployment)

            <div class="font-medium text-xl text-gray-600 dark:text-gray-400 mb-3">

                <a href="{{route("iptbm.staff.deployment.deployed_tech",['id'=>$technology->deployment->id])}}"
                   class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Deployment</a>
                <div class="text-sm font-medium text-gray-600 dark:text-gray-400">
                    {{$technology->deployment->adoptor_name}}
                </div>
            </div>
        @endif
        @if($technology->extension)
            <div class="font-medium text-xl text-gray-600 dark:text-gray-400 mb-3">

                <a href="{{route("iptbm.staff.extension.view_tech",['id'=>$technology->extension->id])}}"
                   class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Extension</a>

            </div>
        @endif


    </div>
    --}}
</div>

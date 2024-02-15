<aside
    class="fixed top-0 left-auto z-50 w-64 h-screen  transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav"
    id="drawer-navigation"
>
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800 pb-10">

        <ul class="space-y-2">

            <li>
                <div class="text-center font-bold text-lg mb-3 text-gray-600 dark:text-white ">
                    IP-TBM MS
                </div>
                <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                <div
                    class="aspect-square rounded-full overflow-hidden w-3/4 p-5 border border-gray-400 dark:border-gray-600 m-auto">
                    <img src="{{asset('assets/logo/img.png')}}"/>
                </div>

            </li>

        </ul>
        <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">


        <ul class=" space-y-2 ">
            <li>
                <div class="mt-10 flex justify-start items-center text-gray-500 dark:text-gray-500">
                    <svg class="w-5 h-5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                    Main Menu
                </div>
            </li>
            <li>
                <a href="{{\App\Providers\RouteServiceProvider::IPTBM_ADMIN_DASHBOARD}}"
                   class="flex items-center p-2 text-gray-900 rounded-lg dark:text-gray-400 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                    <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 8v10a1 1 0 0 0 1 1h4v-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5h4a1 1 0 0 0 1-1V8M1 10l9-9 9 9"/>
                    </svg>
                    Home
                </a>
            </li>

            <li>
                <div class="divide-y divide-slate-200 ">
                    <div x-data="{expanded: false}" class="text-gray-900 rounded-lg dark:text-gray-400 p-2">
                        <h2>
                            <button
                                id="faqs-title-iptbm"
                                type="button"
                                class="flex items-center justify-between w-full text-left font-semibold"
                                @click="expanded = !expanded"
                                :aria-expanded="expanded"
                                aria-controls="faqs-text-iptbm"
                            >
                                <div>
                                    <i class="fa-solid fa-building-shield me-1"></i>
                                    ABH Profiles
                                </div>

                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor"
                                          class="transform origin-center transition duration-200 ease-out"
                                          :class="{'!rotate-180': expanded}" stroke-linecap="round"
                                          stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div
                            id="faqs-text-iptbm"
                            role="region"
                            aria-labelledby="faqs-title-iptbm"
                            class="grid text-sm text-slate-600 overflow-hidden transition-all duration-300 ease-in-out"
                            :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'"
                        >
                            <div class="overflow-hidden">
                                <ul id="dropdown-profile" class="py-2 space-y-2 text-sm text-gray-900 dark:text-white ">

                                    <li>
                                        <a href="{{ route('iptbm.admin.iptbm_profiles.index') }}"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group  hover:bg-gray-200  dark:hover:bg-gray-600 ">Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('iptbm.admin.iptbm_profiles.profile-projects') }}"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group  hover:bg-gray-200  dark:hover:bg-gray-600 ">Projects</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="{{ route('iptbm.admin.technologies-report') }}"
                   class="flex items-center p-2 text-gray-900 rounded-lg dark:text-gray-400 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="w-4 h-4 me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="1em"
                         viewBox="0 0 512 512">
                        <path
                            d="M176 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64c-35.3 0-64 28.7-64 64H24c-13.3 0-24 10.7-24 24s10.7 24 24 24H64v56H24c-13.3 0-24 10.7-24 24s10.7 24 24 24H64v56H24c-13.3 0-24 10.7-24 24s10.7 24 24 24H64c0 35.3 28.7 64 64 64v40c0 13.3 10.7 24 24 24s24-10.7 24-24V448h56v40c0 13.3 10.7 24 24 24s24-10.7 24-24V448h56v40c0 13.3 10.7 24 24 24s24-10.7 24-24V448c35.3 0 64-28.7 64-64h40c13.3 0 24-10.7 24-24s-10.7-24-24-24H448V280h40c13.3 0 24-10.7 24-24s-10.7-24-24-24H448V176h40c13.3 0 24-10.7 24-24s-10.7-24-24-24H448c0-35.3-28.7-64-64-64V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H280V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H176V24zM160 128H352c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H160c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32zm192 32H160V352H352V160z"/>
                    </svg>
                    Technologies
                </a>
            </li>
            <li>
                <div class="divide-y divide-slate-200 ">
                    <div x-data="{expanded: false}" class="text-gray-900 rounded-lg dark:text-gray-400 p-2">
                        <h2>
                            <button
                                id="faqs-title-patent"
                                type="button"
                                class="flex items-center justify-between w-full text-left font-semibold"
                                @click="expanded = !expanded"
                                :aria-expanded="expanded"
                                aria-controls="faqs-text-patent"
                            >
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewBox="0 0 18 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2"
                                              d="m6 9 2 3 5-5M9 19A18.55 18.55 0 0 1 1 4l8-3 8 3a18.549 18.549 0 0 1-8 15Z"/>
                                    </svg>
                                    IP-Application
                                </div>

                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor"
                                          class="transform origin-center transition duration-200 ease-out"
                                          :class="{'!rotate-180': expanded}" stroke-linecap="round"
                                          stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div
                            id="faqs-text-patent"
                            role="region"
                            aria-labelledby="faqs-title-patent"
                            class="grid text-sm text-slate-600 overflow-hidden transition-all duration-300 ease-in-out"
                            :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'"
                        >
                            <div class="overflow-hidden">
                                <ul id="dropdown-profile" class="py-2 space-y-2 text-sm text-gray-900 dark:text-white ">

                                    <li>
                                        <a href="{{ route('iptbm.admin.ip-application-report') }}"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group  hover:bg-gray-200  dark:hover:bg-gray-600 ">Patent</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('iptbm.admin.iptbm_profiles.profile-projects') }}"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group  hover:bg-gray-200  dark:hover:bg-gray-600 ">Utility
                                            Model</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('iptbm.admin.iptbm_profiles.index') }}"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group  hover:bg-gray-200  dark:hover:bg-gray-600 ">Industrial
                                            Design</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('iptbm.admin.iptbm_profiles.profile-projects') }}"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group  hover:bg-gray-200  dark:hover:bg-gray-600 ">Trademark/Service
                                            Mark</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('iptbm.admin.iptbm_profiles.index') }}"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group  hover:bg-gray-200  dark:hover:bg-gray-600 ">Copyrights
                                            and Related Rights</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('iptbm.admin.iptbm_profiles.profile-projects') }}"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group  hover:bg-gray-200  dark:hover:bg-gray-600 ">Plant
                                            Variety Protection</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="mt-10 flex justify-start items-center text-gray-400 dark:text-gray-600">
                    <svg class="w-5 h-5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 20 20">
                        <path
                            d="M1 5h1.424a3.228 3.228 0 0 0 6.152 0H19a1 1 0 1 0 0-2H8.576a3.228 3.228 0 0 0-6.152 0H1a1 1 0 1 0 0 2Zm18 4h-1.424a3.228 3.228 0 0 0-6.152 0H1a1 1 0 1 0 0 2h10.424a3.228 3.228 0 0 0 6.152 0H19a1 1 0 0 0 0-2Zm0 6H8.576a3.228 3.228 0 0 0-6.152 0H1a1 1 0 0 0 0 2h1.424a3.228 3.228 0 0 0 6.152 0H19a1 1 0 0 0 0-2Z"/>
                    </svg>
                    Settings and Updates
                </div>
            </li>

            <li>
                <div class="divide-y divide-slate-200 ">
                    <div x-data="{expanded: false}" class="text-gray-900 rounded-lg dark:text-gray-400 p-2">
                        <h2>
                            <button
                                id="faqs-title-profile"
                                type="button"
                                class="flex items-center justify-between w-full text-left font-semibold"
                                @click="expanded = !expanded"
                                :aria-expanded="expanded"
                                aria-controls="faqs-text-profile"
                            >
                                <div>
                                    Updates
                                </div>

                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor"
                                          class="transform origin-center transition duration-200 ease-out"
                                          :class="{'!rotate-180': expanded}" stroke-linecap="round"
                                          stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div
                            id="faqs-text-profile"
                            role="region"
                            aria-labelledby="faqs-title-profile"
                            class="grid text-sm text-slate-600 overflow-hidden transition-all duration-300 ease-in-out"
                            :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'"
                        >
                            <div class="overflow-hidden">
                                <ul id="dropdown-profile" class="py-2 space-y-2 text-sm text-gray-900 dark:text-white ">

                                    <li>
                                        <a href="{{route("iptbm.admin.addrecord.region")}}"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group  hover:bg-gray-200  dark:hover:bg-gray-600 ">Regions</a>
                                    </li>
                                    <li>
                                        <a href="{{route('iptbm.admin.addrecord.agencies')}}"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group hover:bg-gray-200  dark:hover:bg-gray-600 ">Agencies</a>
                                    </li>
                                    <li>
                                        <a href="{{route('iptbm.admin.addrecord.account')}}"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group  hover:bg-gray-200  dark:hover:bg-gray-600 ">Accounts</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </li>
            <li>
                <div class="divide-y divide-slate-200 ">
                    <div x-data="{expanded: false}" class="text-gray-900 rounded-lg dark:text-gray-400 p-2">
                        <h2>
                            <button
                                id="faqs-title-profile"
                                type="button"
                                class="flex items-center justify-between w-full text-left font-semibold"
                                @click="expanded = !expanded"
                                :aria-expanded="expanded"
                                aria-controls="faqs-text-profile"
                            >
                                <div>
                                    Tech Components
                                </div>

                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor"
                                          class="transform origin-center transition duration-200 ease-out"
                                          :class="{'!rotate-180': expanded}" stroke-linecap="round"
                                          stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div
                            id="faqs-text-profile"
                            role="region"
                            aria-labelledby="faqs-title-profile"
                            class="grid text-sm text-slate-600 overflow-hidden transition-all duration-300 ease-in-out"
                            :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'"
                        >
                            <div class="overflow-hidden">
                                <ul id="dropdown-profile" class="py-2 space-y-2 text-sm text-gray-900 dark:text-white ">

                                    <li>
                                        <a href="{{route("iptbm.addrecord.tech-comp.industry")}}"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group  hover:bg-gray-200  dark:hover:bg-gray-600 ">Industries</a>
                                    </li>
                                    <li>

                                        <a data-popover-target="popover-commodity-profile"
                                           data-popover-placement="right"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group hover:bg-gray-200  dark:hover:bg-gray-600 ">Commodities</a>
                                    </li>
                                    <div data-popover id="popover-commodity-profile" role="tooltip"
                                         class="absolute z-50 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-lg shadow-black opacity-0 w-80 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                                        <livewire:iptbm.admin.side-nav-popup-industry
                                            route="iptbm.addrecord.techCommodities"/>
                                        <div data-popper-arrow></div>
                                    </div>

                                    <li>
                                        <a data-popover-target="popover-category-profile" data-popover-placement="right"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group  hover:bg-gray-200  dark:hover:bg-gray-600 ">Categories</a>
                                    </li>
                                    <div data-popover id="popover-category-profile" role="tooltip"
                                         class="absolute z-50 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-lg shadow-black opacity-0 w-80 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                                        <livewire:iptbm.admin.side-nav-popup-industry
                                            route="iptbm.addrecord.techCategories"/>
                                        <div data-popper-arrow></div>
                                    </div>
                                    <li>
                                        <a href="{{route("iptbm.addrecord.tech-adopter")}}"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group hover:bg-gray-200  dark:hover:bg-gray-600 ">Adopters</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </li>
        </ul>
    </div>

</aside>


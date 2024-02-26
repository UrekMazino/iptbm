<aside
    class="fixed top-0 left-auto z-40 w-64 h-screen  transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav"
    id="drawer-navigation"
>
    <div class="overflow-y-auto py-5 pb-10 px-3 h-full bg-gray-900 dark:bg-gray-800">
        <div class="my-1 mb-4  rounded-lg bg-gray-200 dark:bg-gray-700 p-2 py-3">
            <div class="divide-y divide-gray-500 dark:divide-gray-400">

                <div class="w-3/4 mx-auto">
                    <div class="aspect-square rounded-full overflow-hidden">
                        <div class="flex justify-center items-center w-fit h-full">
                            @if(Auth::user()->abh_profile->logo)
                                <img class="max-w-full w-auto h-auto" src="{{Storage::url(Auth::user()->abh_profile->logo)}}">
                            @else
                                <img class="max-w-full w-auto h-auto" src="{{asset('assets/icon/profile-blank.png')}}">
                            @endif

                        </div>
                    </div>
                </div>
                <div class="py-2">
                    <div class="text-gray-600 dark:text-gray-200">
                        {{Auth::user()->abh_profile->agency->name}}
                    </div>

                </div>

            </div>
        </div>

        <ul class="space-y-2  text-gray-300 dark:text-gray-400">

            <li>
                <a class="flex items-center   p-2 rounded-lg transition duration-300 @if(Request::segment(2)=='dashboard') bg-gray-300 dark:bg-gray-950 text-sky-700 @endif hover:bg-gray-700  dark:hover:bg-gray-700 group"
                   href="{{route("iptbm.staff.dashboard")}}">

                    <svg fill="currentColor"
                         class="h-4 w-4 me-2  @if(Request::segment(2)=='dashboard') bg-gray-300 dark:bg-gray-950 text-sky-700 @endif"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path
                            d="M160 80c0-26.5 21.5-48 48-48h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H208c-26.5 0-48-21.5-48-48V80zM0 272c0-26.5 21.5-48 48-48H80c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V272zM368 96h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H368c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48z"/>
                    </svg>
                    Dashboard</a>
            </li>
            <li>
                <div class="divide-y divide-slate-200">
                    <!-- Accordion item -->
                    <div x-data="{ expanded: @if(Request::segment(2)!='profile') false @else true @endif  }"
                         class="py-2">
                        <h2>
                            <button
                                id="faqs-title-profile"
                                type="button"
                                class="flex items-center justify-between w-full text-left font-semibold p-2"
                                @click="expanded = !expanded"
                                :aria-expanded="expanded"
                                aria-controls="faqs-text-profile"
                            >
                                <div class="flex justify-start items-center gap-2">

                                    <svg class="w-4 h-4  " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M3.656 12.115a3 3 0 0 1 5.682-.015M13 5h3m-3 3h3m-3 3h3M2 1h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Zm6.5 4.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                                    </svg>
                                    All
                                    Profiles
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
                            class="grid text-sm  overflow-hidden transition-all duration-300 ease-in-out"
                            :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'"
                        >
                            <div class="overflow-hidden">
                                <ul id="dropdown-profile"
                                    class="py-2 space-y-2 text-sm  ">

                                    <li>
                                        <a href="{{route("abh.staff.profile")}}"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group  hover:bg-gray-700  dark:hover:bg-gray-600   @if(Route::currentRouteName()=="abh.staff.profile") bg-gray-300 dark:bg-gray-950 text-sky-700 @endif">My
                                            Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{route("abh.staff.profile.all_profile")}}"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group hover:bg-gray-700  dark:hover:bg-gray-600 @if(Route::currentRouteName()=="abh.staff.profile.all_profile"||Route::currentRouteName()=="abh.staff.profile.public-view") bg-gray-300 dark:bg-gray-950 text-sky-700 @endif">All
                                            Profiles</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Accordion item -->


                </div>
            </li>




            <li>
                <a class="flex items-center gap-2 p-2 rounded-lg transition duration-300
                    @if(Route::currentRouteName()==='abh.staff.technology'||Route::currentRouteName()==="abh.staff.technology.tech_application.detail") bg-gray-300 dark:bg-gray-950 text-sky-700 @endif hover:bg-gray-700  dark:hover:bg-gray-700 group"
                   href="{{route("abh.staff.technology")}}">

                    <svg id="Layer_1" class="h-4 w-4" fill="currentColor"  data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 111.48"><defs><style>.cls-1{fill-rule:evenodd;}</style></defs><title>tech</title><path class="cls-1" d="M50.21,38.57A17.17,17.17,0,1,1,33,55.74,17.17,17.17,0,0,1,50.21,38.57ZM91.31,94V85.28H67.46a44,44,0,0,0,5.64-6.17H94.38a3.09,3.09,0,0,1,3.08,3.07V94A9,9,0,1,1,91.31,94ZM89.16,30.71H75.51A44.78,44.78,0,0,0,71,24.55H86.09v-7a9,9,0,1,1,6.15-.06V27.64a3.07,3.07,0,0,1-3.08,3.07ZM122.88,15a9,9,0,1,0-12.65,8.25v18H80.12a43.4,43.4,0,0,1,1.27,6.16H113.3a3.09,3.09,0,0,0,3.07-3.08V23.67A9,9,0,0,0,122.88,15Zm-.15,49.93a9,9,0,0,0-17.49-3.08H80.88A42.08,42.08,0,0,1,79.14,68h26.1a9,9,0,0,0,17.49-3.07ZM49.56,105.3H46a6.13,6.13,0,0,1-6.12-6.11V92.93a38.11,38.11,0,0,1-10-3.78l-4.18,4.18a6.13,6.13,0,0,1-8.65,0L12,88.24a6.14,6.14,0,0,1,0-8.65l3.81-3.81a38,38,0,0,1-4.47-10.33H6.12A6.13,6.13,0,0,1,0,59.34v-7.2A6.13,6.13,0,0,1,6.12,46h5.12a38,38,0,0,1,4.44-10.44L12,31.88a6.14,6.14,0,0,1,0-8.64l5.09-5.09a6.13,6.13,0,0,1,8.65,0l4,4a38,38,0,0,1,10.13-3.87v-6A6.13,6.13,0,0,1,46,6.18h7.19A6.13,6.13,0,0,1,59.27,12V32.48A24.54,24.54,0,0,0,50.84,31c-.43,0-.86,0-1.28,0s-.85,0-1.27,0a24.61,24.61,0,1,0,0,49.21c.42,0,.85,0,1.27,0s.85,0,1.28,0a24.54,24.54,0,0,0,8.43-1.48V99.48a6.13,6.13,0,0,1-6.11,5.82Z"/></svg>

                    Technologies
                </a>

            </li>
            <li>
                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                <div class="text-sm text-gray-500">
                    Tech trans Pathways
                </div>
            </li>
            <li>
                <div class="divide-y divide-slate-200">
                    <!-- Accordion item -->
                    <div
                        x-data="{ expanded: @if(Route::currentRouteName()==="abh.staff.commercialization.precom.show.images"||Route::currentRouteName()==="abh.staff.commercialization.precom.details"||Route::currentRouteName()==="abh.staff.commercialization.precom"||Route::currentRouteName()=='abh.staff.commercialization.adopter'||Route::currentRouteName()==='abh.staff.commercialization.adopter.details') true @else false @endif   }"
                        class="py-2">
                        <h2>
                            <button
                                id="faqs-title-profile"
                                type="button"
                                class="flex items-center justify-between w-full text-left font-semibold p-2"
                                @click="expanded = !expanded"
                                :aria-expanded="expanded"
                                aria-controls="faqs-text-technology"
                            >
                                <div class="flex justify-start items-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 640 512">
                                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M49.7 32c-10.5 0-19.8 6.9-22.9 16.9L.9 133c-.6 2-.9 4.1-.9 6.1C0 150.7 9.3 160 20.9 160h94L140.5 32H49.7zM272 160V32H173.1L147.5 160H272zm32 0h58c15.1-18.1 32.1-35.7 50.5-52.1c1.5-1.4 3.2-2.6 4.8-3.8L402.9 32H304V160zm209.9-23.7c17.4-15.8 43.9-16.2 61.7-1.2c-.1-.7-.3-1.4-.5-2.1L549.2 48.9C546.1 38.9 536.8 32 526.3 32H435.5l12.8 64.2c9.6 1 19 4.9 26.6 11.8c11.7 10.6 23 21.6 33.9 33.1c1.6-1.6 3.3-3.2 5-4.8zM325.2 210.7c3.8-6.2 7.9-12.5 12.3-18.7H32l4 32H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H44L64 448c0 17.7 14.3 32 32 32s32-14.3 32-32H337.6c-31-34.7-49.6-80.6-49.6-129.9c0-35.2 16.3-73.6 37.2-107.4zm128.4-78.9c-2.8-2.5-6.3-3.7-9.8-3.8c-3.6 0-7.2 1.2-10 3.7c-33.2 29.7-61.4 63.4-81.4 95.8c-19.7 31.9-32.4 66.2-32.4 92.6C320 407.9 390.3 480 480 480c88.7 0 160-72 160-159.8c0-20.2-9.6-50.9-24.2-79c-14.8-28.5-35.7-58.5-60.4-81.1c-5.6-5.1-14.4-5.2-20 0c-9.6 8.8-18.6 19.6-26.5 29.5c-17.3-20.7-35.8-39.9-55.5-57.7zM530 401c-15 10-31 15-49 15c-45 0-81-29-81-78c0-24 15-45 45-82c4 5 62 79 62 79l36-42c3 4 5 8 7 12c18 33 10 75-20 96z"/>
                                    </svg>
                                    Commercialization
                                </div>


                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>
                        </h2>
                        <div
                            id="faqs-text-technology"
                            role="region"
                            aria-labelledby="faqs-title-technology"
                            class="grid text-sm  overflow-hidden transition-all duration-300 ease-in-out"
                            :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'"
                        >
                            <div class="overflow-hidden">
                                <ul id="dropdown-example"
                                    class="ms-4 py-2 space-y-2 text-sm ">

                                    <li>
                                        <a class="flex items-center  p-2 rounded-lg transition duration-300
                                         @if(Route::currentRouteName()==="abh.staff.commercialization.precom.show.images"||Route::currentRouteName()==="abh.staff.commercialization.precom"||Route::currentRouteName()==="abh.staff.commercialization.precom.details")
                                          bg-gray-300 dark:bg-gray-950 text-sky-700 @endif
                                         hover:bg-gray-700  dark:hover:bg-gray-700 group"
                                            href="{{route("abh.staff.commercialization.precom")}}">
                                            <div
                                                class=" @if(Route::currentRouteName()==="abh.staff.commercialization.precom") text-blue-600 @endif">
                                                <i class="fa-solid fa-shop-lock  me-2 "></i>Pre Com
                                            </div>
                                        </a>
                                    </li>
                                    <li>

                                        <a
                                            class="flex items-center  p-2 rounded-lg transition duration-300 @if(Route::currentRouteName()=='abh.staff.commercialization.adopter'||Route::currentRouteName()==='abh.staff.commercialization.adopter.details') bg-gray-300 dark:bg-gray-950 text-sky-700 @endif hover:bg-gray-700  dark:hover:bg-gray-700 group"
                                            href="{{route("abh.staff.commercialization.adopter")}}">
                                            <div class=" @if(Route::currentRouteName()=='abh.staff.commercialization.adopter'||Route::currentRouteName()==='abh.staff.commercialization.adopter.details') text-blue-600 @endif">
                                                <i class="fa-solid fa-building-circle-arrow-right  me-2  "></i>Adopter
                                            </div>

                                        </a>
                                    </li>

                                </ul>


                            </div>
                        </div>
                    </div>
                    <!-- Accordion item -->


                </div>
            </li>

            <li>

                <a
                    class="flex items-center  p-2 rounded-lg transition duration-300  @if(Request::segment(2)=="deployment") bg-gray-300 dark:bg-gray-950 text-sky-700 @endif hover:bg-gray-700  dark:hover:bg-gray-700 group"
                    href="{{route("iptbm.staff.deployment.index")}}">
                    <i class="fa-solid fa-truck-arrow-right me-2  @if(Request::segment(2)=="deployment") text-blue-600 @endif"></i>Deployment</a>

            </li>
            <li>


                <a
                    class="flex items-center  p-2 rounded-lg transition duration-300  @if(Request::segment(2)=="extension") bg-gray-300 dark:bg-gray-950 text-sky-700 @endif hover:bg-gray-700  dark:hover:bg-gray-700 group"
                    href="{{route("iptbm.staff.extension.index")}}">
                    <i class="fa-solid fa-people-arrows  me-2  @if(Request::segment(2)=="extension") text-blue-600 @endif hover:bg-gray-200  dark:hover:bg-gray-700 group"></i>Extension</a>
            </li>


        </ul>


    </div>
</aside>

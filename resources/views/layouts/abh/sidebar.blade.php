<aside
    class="fixed top-0 left-auto z-40 w-64 h-screen  transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav"
    id="drawer-navigation"
>
    <div class="overflow-y-auto py-5 pb-10 px-3 h-full bg-white dark:bg-gray-800">
        <div class="my-1 mb-4  rounded-lg bg-gray-200 dark:bg-gray-700 p-2 py-3">
            {{----------
             <livewire:iptbm.staff.user.user-profile />
             -------------}}
        </div>

        <ul class="space-y-2  text-gray-600 dark:text-gray-400">

            <li>
                <a class="flex items-center   p-2 rounded-lg transition duration-300 @if(Request::segment(2)=='dashboard') bg-gray-300 dark:bg-gray-950 text-sky-700 @endif hover:bg-gray-200  dark:hover:bg-gray-700 group"
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
                            class="grid text-sm text-slate-600 overflow-hidden transition-all duration-300 ease-in-out"
                            :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'"
                        >
                            <div class="overflow-hidden">
                                <ul id="dropdown-profile"
                                    class="py-2 space-y-2 text-sm text-gray-900 dark:text-gray-400 ">

                                    <li>
                                        <a href="{{route("abh.staff.profile")}}"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group  hover:bg-gray-200  dark:hover:bg-gray-600   @if(Route::currentRouteName()=="abh.staff.profile") bg-gray-300 dark:bg-gray-950 text-sky-700 @endif">My
                                            Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{route("abh.staff.profile.all_profile")}}"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group hover:bg-gray-200  dark:hover:bg-gray-600 @if(Route::currentRouteName()=="abh.staff.profile.all_profile"||Route::currentRouteName()=="abh.staff.profile.public-view") bg-gray-300 dark:bg-gray-950 text-sky-700 @endif">All
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
                <a class="flex items-center  p-2 rounded-lg transition duration-300
                     @if(Request::segment(2)=='inventor') bg-gray-300 dark:bg-gray-950 text-sky-700 @endif hover:bg-gray-200  dark:hover:bg-gray-700 group"
                   href="{{route("iptbm.staff.inventor")}}">

                    <svg class="w-4 h-4 me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 640 512">
                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M144 160A80 80 0 1 0 144 0a80 80 0 1 0 0 160zm368 0A80 80 0 1 0 512 0a80 80 0 1 0 0 160zM0 298.7C0 310.4 9.6 320 21.3 320H234.7c.2 0 .4 0 .7 0c-26.6-23.5-43.3-57.8-43.3-96c0-7.6 .7-15 1.9-22.3c-13.6-6.3-28.7-9.7-44.6-9.7H106.7C47.8 192 0 239.8 0 298.7zM320 320c24 0 45.9-8.8 62.7-23.3c2.5-3.7 5.2-7.3 8-10.7c2.7-3.3 5.7-6.1 9-8.3C410 262.3 416 243.9 416 224c0-53-43-96-96-96s-96 43-96 96s43 96 96 96zm65.4 60.2c-10.3-5.9-18.1-16.2-20.8-28.2H261.3C187.7 352 128 411.7 128 485.3c0 14.7 11.9 26.7 26.7 26.7H455.2c-2.1-5.2-3.2-10.9-3.2-16.4v-3c-1.3-.7-2.7-1.5-4-2.3l-2.6 1.5c-16.8 9.7-40.5 8-54.7-9.7c-4.5-5.6-8.6-11.5-12.4-17.6l-.1-.2-.1-.2-2.4-4.1-.1-.2-.1-.2c-3.4-6.2-6.4-12.6-9-19.3c-8.2-21.2 2.2-42.6 19-52.3l2.7-1.5c0-.8 0-1.5 0-2.3s0-1.5 0-2.3l-2.7-1.5zM533.3 192H490.7c-15.9 0-31 3.5-44.6 9.7c1.3 7.2 1.9 14.7 1.9 22.3c0 17.4-3.5 33.9-9.7 49c2.5 .9 4.9 2 7.1 3.3l2.6 1.5c1.3-.8 2.6-1.6 4-2.3v-3c0-19.4 13.3-39.1 35.8-42.6c7.9-1.2 16-1.9 24.2-1.9s16.3 .6 24.2 1.9c22.5 3.5 35.8 23.2 35.8 42.6v3c1.3 .7 2.7 1.5 4 2.3l2.6-1.5c16.8-9.7 40.5-8 54.7 9.7c2.3 2.8 4.5 5.8 6.6 8.7c-2.1-57.1-49-102.7-106.6-102.7zm91.3 163.9c6.3-3.6 9.5-11.1 6.8-18c-2.1-5.5-4.6-10.8-7.4-15.9l-2.3-4c-3.1-5.1-6.5-9.9-10.2-14.5c-4.6-5.7-12.7-6.7-19-3L574.4 311c-8.9-7.6-19.1-13.6-30.4-17.6v-21c0-7.3-4.9-13.8-12.1-14.9c-6.5-1-13.1-1.5-19.9-1.5s-13.4 .5-19.9 1.5c-7.2 1.1-12.1 7.6-12.1 14.9v21c-11.2 4-21.5 10-30.4 17.6l-18.2-10.5c-6.3-3.6-14.4-2.6-19 3c-3.7 4.6-7.1 9.5-10.2 14.6l-2.3 3.9c-2.8 5.1-5.3 10.4-7.4 15.9c-2.6 6.8 .5 14.3 6.8 17.9l18.2 10.5c-1 5.7-1.6 11.6-1.6 17.6s.6 11.9 1.6 17.5l-18.2 10.5c-6.3 3.6-9.5 11.1-6.8 17.9c2.1 5.5 4.6 10.7 7.4 15.8l2.4 4.1c3 5.1 6.4 9.9 10.1 14.5c4.6 5.7 12.7 6.7 19 3L449.6 457c8.9 7.6 19.2 13.6 30.4 17.6v21c0 7.3 4.9 13.8 12.1 14.9c6.5 1 13.1 1.5 19.9 1.5s13.4-.5 19.9-1.5c7.2-1.1 12.1-7.6 12.1-14.9v-21c11.2-4 21.5-10 30.4-17.6l18.2 10.5c6.3 3.6 14.4 2.6 19-3c3.7-4.6 7.1-9.4 10.1-14.5l2.4-4.2c2.8-5.1 5.3-10.3 7.4-15.8c2.6-6.8-.5-14.3-6.8-17.9l-18.2-10.5c1-5.7 1.6-11.6 1.6-17.5s-.6-11.9-1.6-17.6l18.2-10.5zM472 384a40 40 0 1 1 80 0 40 40 0 1 1 -80 0z"/>
                    </svg>
                    Inventor
                </a>

            </li>

            <li>
                <div class="divide-y divide-slate-200">
                    <!-- Accordion item -->
                    <div x-data="{ expanded: @if(Request::segment(2)!='technology') false @else true @endif  }"
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
                                <div class="justify-start flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 512 512">
                                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M176 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64c-35.3 0-64 28.7-64 64H24c-13.3 0-24 10.7-24 24s10.7 24 24 24H64v56H24c-13.3 0-24 10.7-24 24s10.7 24 24 24H64v56H24c-13.3 0-24 10.7-24 24s10.7 24 24 24H64c0 35.3 28.7 64 64 64v40c0 13.3 10.7 24 24 24s24-10.7 24-24V448h56v40c0 13.3 10.7 24 24 24s24-10.7 24-24V448h56v40c0 13.3 10.7 24 24 24s24-10.7 24-24V448c35.3 0 64-28.7 64-64h40c13.3 0 24-10.7 24-24s-10.7-24-24-24H448V280h40c13.3 0 24-10.7 24-24s-10.7-24-24-24H448V176h40c13.3 0 24-10.7 24-24s-10.7-24-24-24H448c0-35.3-28.7-64-64-64V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H280V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H176V24zM160 128H352c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H160c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32zm192 32H160V352H352V160z"/>
                                    </svg>
                                    Technology
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
                            id="faqs-text-technology"
                            role="region"
                            aria-labelledby="faqs-title-technology"
                            class="grid text-sm text-slate-600 overflow-hidden transition-all duration-300 ease-in-out"
                            :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'"
                        >
                            <div class="overflow-hidden">
                                <ul id="dropdown-example"
                                    class="py-2 space-y-2 text-sm text-gray-600 dark:text-gray-400 ">

                                    <li>
                                        <a href="{{route("iptbm.staff.technology")}}"
                                           class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group  dark:hover:bg-gray-600 hover:bg-gray-200  @if(Route::currentRouteName()=="iptbm.staff.technology") bg-gray-300 dark:bg-gray-950 text-sky-700 @endif">My
                                            Technologies</a>
                                    </li>
                                    <li>
                                        <a href="{{route("iptbm.staff.technology.all")}}"
                                           class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group hover:bg-gray-200  dark:hover:bg-gray-600 @if(Route::currentRouteName()=="iptbm.staff.technology.all") bg-gray-300 dark:bg-gray-950 text-sky-700 @endif">All
                                            Technologies</a>
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
                    @if(Request::segment(2)=='ip-management') bg-gray-300 dark:bg-gray-950 text-sky-700 @endif hover:bg-gray-200  dark:hover:bg-gray-700 group"
                   href="{{route("iptbm.staff.ip-management")}}">

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 448 512">
                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/>
                    </svg>
                    IP Alert
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
                        x-data="{ expanded: @if(!(Request::segment(2)=="pre-commercialization" ||Request::segment(2)=="adopter")) false @else true @endif   }"
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
                            class="grid text-sm text-slate-600 overflow-hidden transition-all duration-300 ease-in-out"
                            :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'"
                        >
                            <div class="overflow-hidden">
                                <ul id="dropdown-example"
                                    class="ms-4 py-2 space-y-2 text-sm text-gray-900 dark:text-gray-400 ">

                                    <li>

                                        <a
                                            class="flex items-center  p-2 rounded-lg transition duration-300 @if(Request::segment(2)=="pre-commercialization") bg-gray-300 dark:bg-gray-950 text-sky-700 @endif hover:bg-gray-200  dark:hover:bg-gray-700 group"
                                            href="{{route("iptbm.staff.precom.index")}}">
                                            <div
                                                class=" @if(Request::segment(2)=="pre-commercialization") text-blue-600 @endif">
                                                <i class="fa-solid fa-shop-lock  me-2 "></i>Pre Com
                                            </div>
                                        </a>
                                    </li>
                                    <li>

                                        <a
                                            class="flex items-center  p-2 rounded-lg transition duration-300 @if(Request::segment(2)=="adopter") bg-gray-300 dark:bg-gray-950 text-sky-700 @endif hover:bg-gray-200  dark:hover:bg-gray-700 group"
                                            href="{{route("iptbm.staff.adopter.index")}}">
                                            <div class=" @if(Request::segment(2)=="adopter") text-blue-600 @endif">
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
                    class="flex items-center  p-2 rounded-lg transition duration-300  @if(Request::segment(2)=="deployment") bg-gray-300 dark:bg-gray-950 text-sky-700 @endif hover:bg-gray-200  dark:hover:bg-gray-700 group"
                    href="{{route("iptbm.staff.deployment.index")}}">
                    <i class="fa-solid fa-truck-arrow-right me-2  @if(Request::segment(2)=="deployment") text-blue-600 @endif"></i>Deployment</a>

            </li>
            <li>


                <a
                    class="flex items-center  p-2 rounded-lg transition duration-300  @if(Request::segment(2)=="extension") bg-gray-300 dark:bg-gray-950 text-sky-700 @endif hover:bg-gray-200  dark:hover:bg-gray-700 group"
                    href="{{route("iptbm.staff.extension.index")}}">
                    <i class="fa-solid fa-people-arrows  me-2  @if(Request::segment(2)=="extension") text-blue-600 @endif hover:bg-gray-200  dark:hover:bg-gray-700 group"></i>Extension</a>
            </li>


        </ul>


    </div>
</aside>

<aside
    class="fixed top-0 left-auto z-50 w-64 h-screen  transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav"
    id="drawer-navigation"
>
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800 pb-10">

        <ul class="space-y-2">

            <li>
                <div class="text-center font-bold text-lg mb-3 text-gray-600 dark:text-white ">
                    ABH MS
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
                   class="flex items-center p-2 text-gray-600 rounded-lg dark:text-gray-400 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @if(Route::currentRouteName()=='abh.admin.dashboard') bg-gray-400 dark:bg-gray-950 text-sky-950 font-bold @endif">

                    <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 8v10a1 1 0 0 0 1 1h4v-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5h4a1 1 0 0 0 1-1V8M1 10l9-9 9 9"/>
                    </svg>
                    Home
                </a>
            </li>

            <li>
                <div class="divide-y divide-slate-200 ">
                    <div x-data="{expanded: @if(Route::currentRouteName()=="abh.admin.my_profile"||Route::currentRouteName()==='abh.admin.all_projects') true @else false @endif}"
                         class="text-gray-600 rounded-lg dark:text-gray-400 p-2">
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
                                    ABH
                                </div>

                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 10 6">
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
                                <ul id="dropdown-profile" class="py-2 space-y-2 text-sm text-gray-600 dark:text-white ">

                                    <li>
                                        <a href="{{ route('abh.admin.my_profile') }}"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group  hover:bg-gray-200  dark:hover:bg-gray-600 @if(Route::currentRouteName()==='abh.admin.my_profile') bg-gray-300 dark:bg-gray-950 text-sky-950 dark:text-gray-400 font-bold @endif">
                                            <svg class="w-4 h-4 me-2" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"
                                                      d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            </svg>
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('abh.admin.all_projects') }}"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group  hover:bg-gray-200  dark:hover:bg-gray-600 @if(Route::currentRouteName()==='abh.admin.all_projects') bg-gray-300 dark:bg-gray-950 text-sky-950 dark:text-gray-400 font-bold @endif">
                                            <svg class="w-4 h-4 me-2" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 22 21">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                      d="M7.24 7.194a24.16 24.16 0 0 1 3.72-3.062m0 0c3.443-2.277 6.732-2.969 8.24-1.46 2.054 2.053.03 7.407-4.522 11.959-4.552 4.551-9.906 6.576-11.96 4.522C1.223 17.658 1.89 14.412 4.121 11m6.838-6.868c-3.443-2.277-6.732-2.969-8.24-1.46-2.054 2.053-.03 7.407 4.522 11.959m3.718-10.499a24.16 24.16 0 0 1 3.719 3.062M17.798 11c2.23 3.412 2.898 6.658 1.402 8.153-1.502 1.503-4.771.822-8.2-1.433m1-6.808a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/>
                                            </svg>
                                            Projects
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="{{ route('abh.admin.all_technologies') }}"
                   class="flex items-center p-2 text-gray-600 rounded-lg dark:text-gray-400 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @if(Route::currentRouteName()==='abh.admin.all_technologies') bg-gray-400 dark:bg-gray-950 text-sky-950 font-bold @endif">
                    <svg class="w-4 h-4 me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="1em"
                         viewBox="0 0 512 512">
                        <path
                            d="M176 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64c-35.3 0-64 28.7-64 64H24c-13.3 0-24 10.7-24 24s10.7 24 24 24H64v56H24c-13.3 0-24 10.7-24 24s10.7 24 24 24H64v56H24c-13.3 0-24 10.7-24 24s10.7 24 24 24H64c0 35.3 28.7 64 64 64v40c0 13.3 10.7 24 24 24s24-10.7 24-24V448h56v40c0 13.3 10.7 24 24 24s24-10.7 24-24V448h56v40c0 13.3 10.7 24 24 24s24-10.7 24-24V448c35.3 0 64-28.7 64-64h40c13.3 0 24-10.7 24-24s-10.7-24-24-24H448V280h40c13.3 0 24-10.7 24-24s-10.7-24-24-24H448V176h40c13.3 0 24-10.7 24-24s-10.7-24-24-24H448c0-35.3-28.7-64-64-64V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H280V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H176V24zM160 128H352c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H160c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32zm192 32H160V352H352V160z"/>
                    </svg>
                    Technologies
                </a>
            </li>
           {{-------------
            <li>
                <div class="divide-y divide-slate-200 ">
                    <div x-data="{expanded: @if(Request::segment(4)=="ip-application-report") true @else false @endif}"
                         class="text-gray-600 rounded-lg dark:text-gray-400 p-2">
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
                                <ul id="dropdown-profile" class="py-2 space-y-2 text-sm text-gray-600 dark:text-white ">
                                    @foreach($nav as $patent)
                                        <li>
                                            <a href="{{ route('iptbm.admin.ip-application-report',['iptype'=>$patent]) }}"
                                               class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group  hover:bg-gray-200  dark:hover:bg-gray-600 @if(Request::segment(5)==$patent->id)  bg-gray-300 dark:bg-gray-950 text-sky-950 dark:text-gray-400 font-bold @endif">

                                                @if(Request::segment(5)==$patent->id)
                                                    <svg class="w-4 h-4 me-2" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                         viewBox="0 0 10 16">
                                                        <path
                                                            d="M3.414 1A2 2 0 0 0 0 2.414v11.172A2 2 0 0 0 3.414 15L9 9.414a2 2 0 0 0 0-2.828L3.414 1Z"/>
                                                    </svg>
                                                @endif
                                                {{$patent->name}}
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
           -----------}}

            <li>
                <div class="mt-10 flex justify-start items-center text-gray-400 dark:text-gray-600">
                    <svg class="w-5 h-5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 20 20">
                        <path
                            d="M1 5h1.424a3.228 3.228 0 0 0 6.152 0H19a1 1 0 1 0 0-2H8.576a3.228 3.228 0 0 0-6.152 0H1a1 1 0 1 0 0 2Zm18 4h-1.424a3.228 3.228 0 0 0-6.152 0H1a1 1 0 1 0 0 2h10.424a3.228 3.228 0 0 0 6.152 0H19a1 1 0 0 0 0-2Zm0 6H8.576a3.228 3.228 0 0 0-6.152 0H1a1 1 0 0 0 0 2h1.424a3.228 3.228 0 0 0 6.152 0H19a1 1 0 0 0 0-2Z"/>
                    </svg>
                    Tech Trans Pathways
                </div>
            </li>
            <li>
                <div class="divide-y divide-slate-200 ">
                    <div
                        x-data="{expanded: @if(Route::currentRouteName()==='abh.admin.commercialization.all_precom'||Route::currentRouteName()==='abh.admin.commercialization.all_adopter') true @else false @endif}"
                        class="text-gray-600 rounded-lg dark:text-gray-400 p-2">
                        <h2>
                            <button
                                id="faqs-title-patent"
                                type="button"
                                class="flex items-center justify-between w-full text-left font-semibold"
                                @click="expanded = !expanded"
                                :aria-expanded="expanded"
                                aria-controls="faqs-text-patent"
                            >
                                <div class="flex items-center justify-start gap-2">

                                    <svg class="w-4 h-4 " fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 640 512">
                                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M49.7 32c-10.5 0-19.8 6.9-22.9 16.9L.9 133c-.6 2-.9 4.1-.9 6.1C0 150.7 9.3 160 20.9 160h94L140.5 32H49.7zM272 160V32H173.1L147.5 160H272zm32 0h58c15.1-18.1 32.1-35.7 50.5-52.1c1.5-1.4 3.2-2.6 4.8-3.8L402.9 32H304V160zm209.9-23.7c17.4-15.8 43.9-16.2 61.7-1.2c-.1-.7-.3-1.4-.5-2.1L549.2 48.9C546.1 38.9 536.8 32 526.3 32H435.5l12.8 64.2c9.6 1 19 4.9 26.6 11.8c11.7 10.6 23 21.6 33.9 33.1c1.6-1.6 3.3-3.2 5-4.8zM325.2 210.7c3.8-6.2 7.9-12.5 12.3-18.7H32l4 32H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H44L64 448c0 17.7 14.3 32 32 32s32-14.3 32-32H337.6c-31-34.7-49.6-80.6-49.6-129.9c0-35.2 16.3-73.6 37.2-107.4zm128.4-78.9c-2.8-2.5-6.3-3.7-9.8-3.8c-3.6 0-7.2 1.2-10 3.7c-33.2 29.7-61.4 63.4-81.4 95.8c-19.7 31.9-32.4 66.2-32.4 92.6C320 407.9 390.3 480 480 480c88.7 0 160-72 160-159.8c0-20.2-9.6-50.9-24.2-79c-14.8-28.5-35.7-58.5-60.4-81.1c-5.6-5.1-14.4-5.2-20 0c-9.6 8.8-18.6 19.6-26.5 29.5c-17.3-20.7-35.8-39.9-55.5-57.7zM530 401c-15 10-31 15-49 15c-45 0-81-29-81-78c0-24 15-45 45-82c4 5 62 79 62 79l36-42c3 4 5 8 7 12c18 33 10 75-20 96z"/>
                                    </svg>
                                    Commercialization
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
                                <ul id="dropdown-profile" class="py-2 space-y-2 text-sm text-gray-600 dark:text-white ">
                                    <li>
                                        <a href="{{route("abh.admin.commercialization.all_precom")}}" class="flex items-center w-full p-2
                                          transition duration-300 rounded-lg pl-11 group  hover:bg-gray-200  dark:hover:bg-gray-600   @if(Route::currentRouteName()==='abh.admin.commercialization.all_precom')  bg-gray-300 dark:bg-gray-950 text-sky-950 dark:text-gray-400 font-bold @endif">
                                            Pre Com
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('abh.admin.commercialization.all_adopter')}}" class="flex items-center w-full p-2
                                         transition duration-300 rounded-lg pl-11 group hover:bg-gray-200  dark:hover:bg-gray-600 @if(Route::currentRouteName()==='abh.admin.commercialization.all_adopter')  bg-gray-300 dark:bg-gray-950 text-sky-950 dark:text-gray-400 font-bold @endif">
                                            Adopter
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="{{ route('abh.admin.all_deployment') }}"
                   class="flex items-center p-2 text-gray-600 rounded-lg dark:text-gray-400 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @if(Route::currentRouteName()==="abh.admin.all_deployment") bg-gray-400 dark:bg-gray-950 text-sky-950 font-bold @endif">

                    <svg class="w-4 h-4 me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 640 512">
                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M0 48C0 21.5 21.5 0 48 0H368c26.5 0 48 21.5 48 48V96h50.7c17 0 33.3 6.7 45.3 18.7L589.3 192c12 12 18.7 28.3 18.7 45.3V256v32 64c17.7 0 32 14.3 32 32s-14.3 32-32 32H576c0 53-43 96-96 96s-96-43-96-96H256c0 53-43 96-96 96s-96-43-96-96H48c-26.5 0-48-21.5-48-48V48zM416 256H544V237.3L466.7 160H416v96zM160 464a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm368-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM257 95c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l39 39H96c-13.3 0-24 10.7-24 24s10.7 24 24 24H262.1l-39 39c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l80-80c9.4-9.4 9.4-24.6 0-33.9L257 95z"/>
                    </svg>
                    Deployment
                </a>
            </li>
            <li>
                <a href="{{ route('abh.admin.all_extension') }}"
                   class="flex items-center p-2 text-gray-600 rounded-lg dark:text-gray-400 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @if(Route::currentRouteName()==="abh.admin.all_extension")  bg-gray-400 dark:bg-gray-950 text-sky-950 font-bold @endif">
                    <svg class="w-4 h-4 me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 640 512">
                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M64 64a64 64 0 1 1 128 0A64 64 0 1 1 64 64zM25.9 233.4C29.3 191.9 64 160 105.6 160h44.8c27 0 51 13.4 65.5 34.1c-2.7 1.9-5.2 4-7.5 6.3l-64 64c-21.9 21.9-21.9 57.3 0 79.2L192 391.2V464c0 26.5-21.5 48-48 48H112c-26.5 0-48-21.5-48-48V348.3c-26.5-9.5-44.7-35.8-42.2-65.6l4.1-49.3zM448 64a64 64 0 1 1 128 0A64 64 0 1 1 448 64zM431.6 200.4c-2.3-2.3-4.9-4.4-7.5-6.3c14.5-20.7 38.6-34.1 65.5-34.1h44.8c41.6 0 76.3 31.9 79.7 73.4l4.1 49.3c2.5 29.8-15.7 56.1-42.2 65.6V464c0 26.5-21.5 48-48 48H496c-26.5 0-48-21.5-48-48V391.2l47.6-47.6c21.9-21.9 21.9-57.3 0-79.2l-64-64zM272 240v32h96V240c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2l64 64c9.4 9.4 9.4 24.6 0 33.9l-64 64c-6.9 6.9-17.2 8.9-26.2 5.2s-14.8-12.5-14.8-22.2V336H272v32c0 9.7-5.8 18.5-14.8 22.2s-19.3 1.7-26.2-5.2l-64-64c-9.4-9.4-9.4-24.6 0-33.9l64-64c6.9-6.9 17.2-8.9 26.2-5.2s14.8 12.5 14.8 22.2z"/>
                    </svg>
                    Extension
                </a>
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
                    <div
                        x-data="{expanded: @if(Route::currentRouteName()==='abh.admin.all_regions'||Route::currentRouteName()==='abh.admin.all_regions.details'||Route::currentRouteName()==='abh.admin.all_agencies'||Route::currentRouteName()==='abh.admin.all_accounts') true @else false @endif}"
                        class="text-gray-600 rounded-lg dark:text-gray-400 p-2">
                        <h2>
                            <button
                                id="faqs-title-profile"
                                type="button"
                                class="flex items-center justify-between w-full text-left font-semibold"
                                @click="expanded = !expanded"
                                :aria-expanded="expanded"
                                aria-controls="faqs-text-profile"
                            >
                                <div class="flex justify-start items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor"
                                         viewBox="0 0 512 512">
                                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"/>
                                    </svg>
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
                                        <a href="{{route("abh.admin.all_regions")}}" class="flex items-center w-full p-2
                                          transition duration-300 rounded-lg pl-11 group  hover:bg-gray-200  dark:hover:bg-gray-600   @if(Route::currentRouteName()==='abh.admin.all_regions'||Route::currentRouteName()==='abh.admin.all_regions.details')  bg-gray-300 dark:bg-gray-950 text-sky-950 dark:text-gray-400 font-bold @endif">
                                            Regions
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('abh.admin.all_agencies')}}" class="flex items-center w-full p-2
                                         transition duration-300 rounded-lg pl-11 group hover:bg-gray-200  dark:hover:bg-gray-600 @if(Route::currentRouteName()==='abh.admin.all_agencies')  bg-gray-300 dark:bg-gray-950 text-sky-950 dark:text-gray-400 font-bold @endif">
                                            Agencies
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('abh.admin.all_accounts')}}" class="flex items-center w-full p-2
                                         transition duration-300 rounded-lg pl-11 group  hover:bg-gray-200  dark:hover:bg-gray-600 @if(Route::currentRouteName()==='abh.admin.all_accounts')  bg-gray-300 dark:bg-gray-950 text-sky-950 dark:text-gray-400 font-bold @endif">
                                            Accounts
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </li>
            <li>
                <div class="divide-y divide-slate-200 ">
                    <div x-data="{expanded: @if(Route::currentRouteName()==='abh.admin.all_industries') true @else false @endif}"
                         class="text-gray-600 rounded-lg dark:text-gray-400 p-2">
                        <h2>
                            <button
                                id="faqs-title-profile"
                                type="button"
                                class="flex items-center justify-between w-full text-left font-semibold"
                                @click="expanded = !expanded"
                                :aria-expanded="expanded"
                                aria-controls="faqs-text-profile"
                            >
                                <div class="flex justify-start items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4"
                                         viewBox="0 0 448 512">
                                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M384 96V224H256V96H384zm0 192V416H256V288H384zM192 224H64V96H192V224zM64 288H192V416H64V288zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"/>
                                    </svg>
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
                                        <a href="{{route("abh.admin.all_industries")}}"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group  hover:bg-gray-200  dark:hover:bg-gray-600  @if(Route::currentRouteName()==='abh.admin.all_industries')  bg-gray-300 dark:bg-gray-950 text-sky-950 dark:text-gray-400 font-bold @endif">Industries</a>
                                    </li>
                                    <li>

                                        <a data-popover-target="popover-commodity-profile"
                                           data-popover-placement="right"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group hover:bg-gray-200  dark:hover:bg-gray-600  @if(Route::current()->getName()==="iptbm.addrecord.techCommodities")  bg-gray-300 dark:bg-gray-950 text-sky-950 dark:text-gray-400 font-bold @endif">Commodities</a>
                                    </li>
                                    <div data-popover id="popover-commodity-profile" role="tooltip"
                                         class="absolute z-50 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-lg shadow-black opacity-0 w-80 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                                        <livewire:iptbm.admin.side-nav-popup-industry
                                            route="iptbm.addrecord.techCommodities"/>
                                        <div data-popper-arrow></div>
                                    </div>

                                    <li>
                                        <a data-popover-target="popover-category-profile" data-popover-placement="right"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group  hover:bg-gray-200  dark:hover:bg-gray-600 @if(Route::current()->getName()==="iptbm.addrecord.techCategories")  bg-gray-300 dark:bg-gray-950 text-sky-950 dark:text-gray-400 font-bold @endif">Categories</a>
                                    </li>
                                    <div data-popover id="popover-category-profile" role="tooltip"
                                         class="absolute z-50 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-lg shadow-black opacity-0 w-80 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                                       {{--
                                        <livewire:iptbm.admin.side-nav-popup-industry
                                            route="iptbm.addrecord.techCategories"/>
                                       ---}}
                                        <div data-popper-arrow></div>
                                    </div>
                                    <li>
                                        <a href="{{route("iptbm.addrecord.tech-adopter")}}"
                                           class="flex items-center w-full p-2  transition duration-300 rounded-lg pl-11 group hover:bg-gray-200  dark:hover:bg-gray-600 @if(Route::current()->getName()==="iptbm.addrecord.tech-adopter")  bg-gray-300 dark:bg-gray-950 text-sky-950 dark:text-gray-400 font-bold @endif">Adopters</a>
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

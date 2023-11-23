<nav class="bg-white border-b border-gray-200  sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-end mx-auto p-4">

            <button data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{route("iptbm.admin.addrecord.region")}}" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent
                         md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Region</a>
                    </li>
                    <li>
                        <a href="{{route('iptbm.admin.addrecord.agencies')}}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100
                        md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700
                        dark:hover:text-white md:dark:hover:bg-transparent">Agencies</a>
                    </li>
                    <li>
                        <a href="{{route('iptbm.admin.addrecord.account')}}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100
                        md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700
                        dark:hover:text-white md:dark:hover:bg-transparent">Accounts</a>
                    </li>
                    <li>


                        <a data-dropdown-toggle="dropdownHover" href="#"
                           class=" text-center inline-flex items-center py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                            Tech Components
                            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </a>
                        <div id="dropdownHover"
                             class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownHoverButton">
                                <li>
                                    <a href="{{route("iptbm.addrecord.tech-comp.industry")}}"
                                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Industries</a>
                                </li>
                                <li>
                                    <a href="{{route("iptbm.addrecord.tech-comp.commodity")}}"
                                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Commodities</a>
                                </li>
                                <li>
                                    <a href="{{route("iptbm.addrecord.tech-category")}}"
                                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Categories</a>
                                </li>
                                <li>
                                    <a href="{{route("iptbm.addrecord.tech-adopter")}}"
                                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Adopters</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

</nav>

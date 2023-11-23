<div class="sticky-md-top z-30 bg-gray-50 dark:bg-gray-800">
    <nav class="bg-gray-50 dark:bg-gray-800  w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
        <div class="w-full flex flex-wrap  justify-between ">
            <div class="flex md:order-2">
                <button data-collapse-toggle="navbar-sticky" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
            <div class=" hidden w-full md:flex md:ms-0 md:w-full md:order-1" id="navbar-sticky">
                <ul class="flex flex-col md:p-0  font-medium w-full ps-4  md:py-2  bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-gray-600 dark:bg-gray-700 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{route("iptbm.admin.ipalerts")}}"
                           class="block  py-2 pl-3 pr-4 text-blue-50  rounded hover:text-blue-500   @if($route==='iptbm.admin.ipalerts') px-2 bg-blue-500  hover:text-blue-300 @endif   md:p-0   dark:border-gray-700">
                            Patent
                        </a>
                    </li>
                    <li>
                        <a href="{{route("iptbm.admin.utilityModel")}}"
                           class="block  py-2 pl-3 pr-4 text-gray-50  rounded hover:text-blue-500   @if($route==='iptbm.admin.utilityModel') px-2 bg-blue-500  hover:text-blue-300 @endif   md:p-0     dark:border-gray-700">
                            Utility Model
                        </a>
                    </li>
                    <li>
                        <a href="{{route("iptbm.admin.industrialDesign")}}"
                           class="block  py-2 pl-3 pr-4 text-gray-50  rounded hover:text-blue-500   @if($route==='iptbm.admin.industrialDesign') px-2 bg-blue-500  hover:text-blue-300 @endif   md:p-0     dark:border-gray-700">
                            Industrial Design
                        </a>
                    </li>
                    <li>
                        <a href="{{route("iptbm.admin.trademark")}}"
                           class="block  py-2 pl-3 pr-4 text-gray-50  rounded hover:text-blue-500   @if($route==='iptbm.admin.trademark') px-2 bg-blue-500  hover:text-blue-300 @endif   md:p-0     dark:border-gray-700">

                            Trademark/Service Mark
                        </a>
                    </li>

                    <li>
                        <a href="{{route("iptbm.admin.copyright")}}"
                           class="block  py-2 pl-3 pr-4 text-gray-50  rounded hover:text-blue-500   @if($route==='iptbm.admin.copyright') px-2 bg-blue-500  hover:text-blue-300 @endif   md:p-0     dark:border-gray-700">
                            Copyright & Related Rights
                        </a>
                    </li>
                    <li>
                        <a href="{{route("iptbm.admin.plantvariety")}}"
                           class="block  py-2 pl-3 pr-4 text-gray-50  rounded hover:text-blue-500   @if($route==='iptbm.admin.plantvariety') px-2 bg-blue-500  hover:text-blue-300 @endif   md:p-0     dark:border-gray-700">
                            Plant Variety Protection
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>



<div>
    <div class="my-4">

        @if($showAddressForm)
            <div class="rounded-lg bg-gray-50 shadow-lg dark:bg-gray-800 p-4">
                <form wire:submit.prevent="saveAddress">
                    <div class="relative">
                        <input wire:model="office_address" type="text" id="floating_outlined"
                               class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                               placeholder=" "/>
                        <label for="floating_outlined"
                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-gray-50 dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Office
                            Address</label>
                    </div>
                    @error('office_address')
                    <div id="alert-border-2"
                         class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                         role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="ml-3 text-sm font-medium">
                            {{$message}}
                        </div>
                    </div>
                    @enderror
                    <div class="w-1/2 m-auto flex justify-between mt-3">
                        <div>
                            <button wire:click="showAddressForm" type="button"
                                    class="transition duration-300 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                CANCEL
                            </button>
                        </div>
                        <div>
                            <button type="submit"
                                    class="transition duration-300 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                SAVE
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
        @if(session()->has('address'))
            <div
                class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    {{session('address')}}
                </div>
            </div>
        @endif
        <div class="text-lg text-gray-700 dark:text-gray-300 mb-3">
            @if($profile->office_address)
                {{$profile->office_address}}
            @else
                Empty
            @endif

            <div class="text-gray-500 ">
                Office Address
                @if(!$showAddressForm)
                    <button wire:click="showAddressForm" type="button"
                            class="hover:scale-125 transition duration-300 text-blue-500 text-lg ms-4">
                        <span class="fa-solid fa-edit me-2"></span>Edit
                    </button>
                @endif
            </div>

        </div>
    </div>
    <div class="my-4">

        @if($showProjectLeaderForm)
            <div class="rounded-lg bg-gray-50 shadow-lg dark:bg-gray-800 p-4">
                <form wire:submit.prevent="saveProjectLeader">
                    <div class="relative">
                        <input wire:model="project_leader" type="text" id="project_leader"
                               class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                               placeholder=""/>
                        <label for="project_leader"
                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-gray-50 dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Project
                            Leader</label>
                    </div>
                    @error('project_leader')
                    <div id="alert-border-2"
                         class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                         role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="ml-3 text-sm font-medium">
                            {{$message}}
                        </div>
                    </div>
                    @enderror
                    <div class="w-1/2 m-auto flex justify-between mt-3">
                        <div>
                            <button wire:click="showProjectLeaderForm" type="button"
                                    class="transition duration-300 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                CANCEL
                            </button>
                        </div>
                        <div>
                            <button type="submit"
                                    class="transition duration-300 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                SAVE
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
        @if(session()->has('project_leader'))
            <div
                class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    {{session('project_leader')}}
                </div>
            </div>
        @endif
        <div class="text-lg text-gray-700 dark:text-gray-300 mb-3">
            @if($profile->project_leader)
                {{$profile->project_leader}}
            @else
                Empty
            @endif

            <div class="text-gray-500 ">
                Project Leader
                @if(!$showProjectLeaderForm)
                    <button wire:click="showProjectLeaderForm" type="button"
                            class="hover:scale-125 transition duration-300 text-blue-500 text-lg ms-4">
                        <span class="fa-solid fa-edit me-2"></span>Edit
                    </button>
                @endif
            </div>

        </div>
    </div>
    <div class="my-4">
        @if($showManagerForm)
            <div class="rounded-lg bg-gray-50 shadow-lg dark:bg-gray-800 p-4">
                <form wire:submit.prevent="saveManager">
                    <div class="relative">
                        <input wire:model="manager" type="text" id="manager"
                               class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                               placeholder=""/>
                        <label for="manager"
                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-gray-50 dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">IP-TBM
                            Manager</label>
                    </div>
                    @error('manager')
                    <div id="alert-border-2"
                         class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                         role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="ml-3 text-sm font-medium">
                            {{$message}}
                        </div>
                    </div>
                    @enderror
                    <div class="w-1/2 m-auto flex justify-between mt-3">
                        <div>
                            <button wire:click="showManagerForm" type="button"
                                    class="transition duration-300 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                CANCEL
                            </button>
                        </div>
                        <div>
                            <button type="submit"
                                    class="transition duration-300 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                SAVE
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
        @if(session()->has('manager'))
            <div
                class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    {{session('manager')}}
                </div>
            </div>
        @endif
        <div class="text-lg text-gray-700 dark:text-gray-300 mb-3">
            @if($profile->manager)
                {{$profile->manager}}
            @else
                Empty
            @endif

            <div class="text-gray-500 ">
                IP-TBM Manager
                @if(!$showManagerForm)
                    <button wire:click="showManagerForm" type="button"
                            class="hover:scale-125 transition duration-300 text-blue-500 text-lg ms-4">
                        <span class="fa-solid fa-edit me-2"></span>Edit
                    </button>
                @endif
            </div>

        </div>
    </div>
    <div class="my-4">
        @if($showYearEstablishedForm)
            <div class="rounded-lg bg-gray-50 shadow-lg dark:bg-gray-800 p-4">
                <form wire:submit.prevent="saveYearEstablished">
                    <div class="relative">
                        <input id="datepicker2" min="1900" max="2099" step="1" wire:model="year_established"
                               type="number"
                               class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                               placeholder=""/>
                        <label for="datepicker2"
                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-gray-50 dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Year
                            Established</label>
                    </div>
                    @error('year_established')
                    <div id="alert-border-2"
                         class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                         role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="ml-3 text-sm font-medium">
                            {{$message}}
                        </div>
                    </div>
                    @enderror
                    <div class="w-1/2 m-auto flex justify-between mt-3">
                        <div>
                            <button wire:click="showYearEstablishedForm" type="button"
                                    class="transition duration-300 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                CANCEL
                            </button>
                        </div>
                        <div>
                            <button type="submit"
                                    class="transition duration-300 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                SAVE
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
        @if(session()->has('year_established'))
            <div
                class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    {{session('year_established')}}
                </div>
            </div>
        @endif
        <div class="text-lg text-gray-700 dark:text-gray-300 mb-3">
            @if($profile->year_established)
                {{$profile->year_established}}
            @else
                Empty
            @endif

            <div class="text-gray-500 ">
                Year Established
                @if(!$showYearEstablishedForm)
                    <button wire:click="showYearEstablishedForm" type="button"
                            class="hover:scale-125 transition duration-300 text-blue-500 text-lg ms-4">
                        <span class="fa-solid fa-edit me-2"></span>Edit
                    </button>
                @endif
            </div>

        </div>
    </div>

</div>


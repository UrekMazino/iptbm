<div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 w-full my-4">
        <div class=" col-start-3 col-end-5">
            <label for="default-search"
                   class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input wire:model="search" type="search" id="default-search"
                       class="block w-full ms-2 p-4 pl-20 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="Search Mockups, Logos..." required>
                <button type="submit"
                        class="text-white absolute right-2.5 bottom-2.5 top-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Search
                </button>
            </div>
        </div>

    </div>


    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        @foreach($technologies as $technology)
            @if($technology->full_description)
                <div class="aspect-square">
                    <div
                        class="max-w-sm bg-gray-50 border-t border-b border-l border-r border-gray-600 rounded-lg shadow dark:bg-gray-800 dark:border-gray-500">
                        <div class="aspect-square">
                            <div
                                class="w-full  h-full p-6 bg-black overflow-hidden border-t border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <img
                                    class="hover:scale-110 transition duration-300 max-w-lg rounded-lg object-contain w-full h-full"
                                    src="{{Storage::url($technology->tech_photo)}}" alt=""/>
                            </div>
                        </div>
                        <div class="p-3">
                            <a href="#">
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{$technology->title}}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$technology->full_description->narrative}}</p>
                            <a href="#"
                               class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Read more
                                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
            @endif

        @endforeach

    </div>

</div>

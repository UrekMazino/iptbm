<div class="my-2  mx-4 md:mx-0  ">
    <div class="divide-y divide-slate-200">
        <!-- Accordion item -->
        <div x-data="{ expanded: false  }" class="py-2">
            <h2>
                <button
                    id="faqs-title-industry-{{$industry->industry->id}}"
                    type="button"
                    class="flex items-center justify-between w-full text-left font-semibold py-2"
                    @click="expanded = !expanded"
                    :aria-expanded="expanded"
                    aria-controls="faqs-text-industry-{{$industry->industry->id}}"
                >
                    <div>
                        <span class="flex-1  text-left whitespace-nowrap">{{$industry->industry->name}}</span>
                    </div>


                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
            </h2>
            <div
                id="faqs-text-industry-{{$industry->industry->id}}"
                role="region"
                aria-labelledby="faqs-title-industry-{{$industry->industry->id}}"
                class="grid text-sm text-slate-600 overflow-hidden transition-all duration-300 ease-in-out"
                :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'"
            >
                <div class="overflow-hidden">
                    <div class="py-3  space-y-2 ">
                        <div class="border border-gray-300 dark:border-gray-600 p-4 rounded">
                            <div class="flex justify-between mb-4">
                                <div  class="font-medium  text-gray-500 dark:text-gray-400">
                                    <x-item-header>
                                        Commodities
                                    </x-item-header>
                                </div>
                                @if($showCommodity)
                                    <x-secondary-button wire:click.prevent="toggleShowCommodity" class="text-red-500 dark:text-red-500">
                                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m13 7-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        Close
                                    </x-secondary-button>
                                @else
                                    <x-secondary-button wire:click.prevent="toggleShowCommodity" class="text-sky-600 dark:text-sky-600">
                                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 5.757v8.486M5.757 10h8.486M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        Update
                                    </x-secondary-button>
                                @endif

                            </div>
                            @if($showCommodity)
                                <div class=" rounded-lg border-gray-400 dark:border-gray-600 p-4 bg-gray-200 dark:bg-gray-900">

                                    <form wire:submit.prevent="saveCommodity">
                                        <div class="mb-6">
                                            @if($showOtherCommodity)
                                                <label for="otherCom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter Commodities</label>
                                                <input wire:model="techCommodity" type="text" id="otherCom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="enter text here" required>
                                                <button wire:click.prevent="toggleShowOtherCommodity" class="mt-2 ">
                                            <span class="text-blue-700 font-bold hover:text-blue-600">
                                            Select from existing
                                        </span>
                                                </button>
                                            @else
                                                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Commodities</label>
                                                <select wire:model="techCommodity" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option value="" selected>Choose a Commodity</option>
                                                    @foreach($commodities as $commodity)
                                                        <option value="{{$commodity->name}}">{{$commodity->name}}</option>
                                                    @endforeach
                                                </select>
                                                <button wire:click.prevent="toggleShowOtherCommodity" class="mt-2">
                                    <span class="text-blue-700 font-bold hover:text-blue-600">
                                            Other
                                        </span>
                                                </button>
                                            @endif
                                            @if(session()->has('techCommodity'))
                                                <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                                                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                    </svg>
                                                    <span class="sr-only">Info</span>
                                                    <div>
                                                        <span class="font-medium">{{session('techCommodity')}}</span>
                                                    </div>
                                                </div>
                                            @endif

                                            @error('techCommodity')

                                            <div id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2" role="alert">
                                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                </svg>
                                                <div class="ml-3 text-sm font-medium">
                                                    {{$message}}
                                                </div>
                                            </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                    </form>

                                </div>
                            @endif
                            <ul class="divide-y divide-gray-400 divide-gray-600">
                                @foreach($techCommodityList as $list)
                                    <li >
                                        <livewire:iptbm.staff.technology.tech-commodity-list wire:key="commodity-{{$list->id}}" :commodity="$list"/>
                                    </li>


                                @endforeach
                            </ul>
                        </div>

                        <div class="border border-gray-300 dark:border-gray-600 p-4 rounded">
                            <div class="flex justify-between mb-4">
                                <div  class="font-medium  text-gray-500 dark:text-gray-400">
                                    <x-item-header>
                                        Categories
                                    </x-item-header>
                                </div>
                                @if($showCategory)
                                    <x-secondary-button wire:click.prevent="toggleShowCategory" class="text-red-600 dark:text-red-600">
                                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m13 7-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        Close
                                    </x-secondary-button>
                                @else
                                    <x-secondary-button wire:click.prevent="toggleShowCategory" class="text-sky-600 dark:text-sky-600">
                                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 5.757v8.486M5.757 10h8.486M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        Update
                                    </x-secondary-button>
                                @endif


                            </div>
                            @if($showCategory)
                                <div class=" rounded-lg p-4 bg-gray-400 dark:bg-gray-800">

                                    <form wire:submit.prevent="saveCategory">
                                        <div class="mb-6">
                                            @if($showOtherCategory)
                                                <label for="othercat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter Category</label>
                                                <input wire:model="techCategory" type="text" id="othercat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="enter text here" required>
                                                <button wire:click.prevent="toggleShowOtherCategory" class="mt-2 ">
                                        <span class="text-blue-700 font-bold hover:text-blue-600">
                                            Select from existing
                                        </span>
                                                </button>
                                            @else
                                                <label for="cat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                                <select wire:model="techCategory" id="cat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option selected>Choose a Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->name}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                                <button wire:click.prevent="toggleShowOtherCategory" class="mt-2">
                                         <span class="text-blue-700 font-bold hover:text-blue-600">
                                            Other
                                        </span>
                                                </button>
                                            @endif
                                            @if(session()->has('techCategory'))
                                                <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                                                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                    </svg>
                                                    <span class="sr-only">Info</span>
                                                    <div>
                                                        <span class="font-medium">{{session('techCategory')}}</span>
                                                    </div>
                                                </div>
                                            @endif

                                            @error('techCategory')

                                            <div id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2" role="alert">
                                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                </svg>
                                                <div class="ml-3 text-sm font-medium">
                                                    {{$message}}
                                                </div>
                                            </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                    </form>

                                </div>
                            @endif
                            <ul>
                                @foreach($techCategoryList as $list)
                                    <li class="p-1 bg-gray-50 dark:bg-gray-700 hover:bg-gray-400 transition duration-300 dark:hover:bg-gray-800">
                                        <livewire:iptbm.staff.technology.tech-category-list wire:key="category-{{$list->id}}" :category="$list"/>
                                    </li>
                                @endforeach
                            </ul>
                        </div>


                    </div>
                    <div class="my-2 mt-4">

                        <div wire:ignore.self id="deleteModal{{$industry->industry->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                <!-- Modal content -->
                                <form  wire:submit.prevent="deleteIndustry({{$industry->industry->id}})">
                                    <div class="relative p-4 text-center bg-gray-50 rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                        <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal{{$industry->industry->id}}">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                        <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item? <span class="font-medium text-lg mb-3">{{$industry->industry->name}}</span></p>

                                        <div class="flex justify-center items-center space-x-4">
                                            <button data-modal-toggle="deleteModal{{$industry->industry->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-gray-50 rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                No, cancel
                                            </button>
                                            <button data-modal-toggle="deleteModal{{$industry->industry->id}}"  type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                Yes, I'm sure
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <x-danger-button data-modal-toggle="deleteModal{{$industry->industry->id}}">
                            <span class="fa-solid fa-trash-can me-2"></span>Delete Industry
                        </x-danger-button>

                    </div>
                </div>
            </div>
        </div>
        <!-- Accordion item -->
    </div>
</div>

@extends('admin.iptbm.layout.app')

@section('title')
    {{"| admin: Industry"}}
@endsection

@section('content')
    <div class="w-full">
        <livewire:iptbm.admin.tech-component.add-industry/>
        <nav
            class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">


            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="flex justify-between items-center">
                    <div class="me-4 p-4">

                        <x-secondary-button data-modal-toggle="addIndus" class="text-sky-600 dark:text-sky-600">
                            Add Industry
                        </x-secondary-button>
                    </div>

                    <div id="botNav" class="me-4">

                    </div>

                </div>

            </nav>

        </nav>

        <div class="px-4 w-full mt-5">
            <x-header-label>
                Industries
            </x-header-label>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach($industries as $key=>$industry)
                    <div>
                        <x-card class="shadow-lg space-y-4">
                            <x-item-header>
                                {{$industry->name}}
                            </x-item-header>
                            <div class="space-y-4">
                                <x-secondary-button class=" w-full" data-modal-target="comMod{{$key}}"
                                                    data-modal-toggle="comMod{{$key}}">
                                    <div class="p-4">
                                        Show Commodities
                                    </div>
                                </x-secondary-button>
                                <x-secondary-button class=" w-full" data-modal-target="catMod{{$key}}"
                                                    data-modal-toggle="catMod{{$key}}">
                                    <div class="p-4">
                                        Show Categories
                                    </div>
                                </x-secondary-button>

                                <div id="comMod{{$key}}" tabindex="-1" aria-hidden="true"
                                     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-2xl max-h-full overflow-y-auto">
                                        <!-- Modal content -->
                                        <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-800 ">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    {{$industry->name}}
                                                </h3>
                                                <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="comMod{{$key}}">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                              clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6 h-75 ">
                                                <x-item-header class="justify-start items-center flex space-x-2">
                                                    <a href="{{route("iptbm.addrecord.techCommodities",["industry"=>$industry->id])}}"
                                                       class="font-medium text-sky-600 dark:text-sky-500 hover:underline">
                                                        Lis Of Commodities
                                                    </a>
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white"
                                                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                         fill="none" viewBox="0 0 14 10">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                                    </svg>
                                                </x-item-header>
                                                <x-card>
                                                    <ul class="divide-y divide-gray-400 dark:divide-gray-600 space-y-2">
                                                        @foreach($industry->commodities->sortBy('name') as $commodity)
                                                            <li class="pt-2">
                                                                {{$commodity->name}}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </x-card>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div id="catMod{{$key}}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                                     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-800">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    {{$industry->name}}
                                                </h3>
                                                <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="catMod{{$key}}">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                              clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">
                                                <x-item-header class="justify-start items-center flex space-x-2">
                                                    <a href="{{route("iptbm.addrecord.techCategories",["industry"=>$industry->id])}}"
                                                       class="font-medium text-sky-600 dark:text-sky-500 hover:underline">
                                                        Lis Of Categories
                                                    </a>
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white"
                                                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                         fill="none" viewBox="0 0 14 10">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                                    </svg>
                                                </x-item-header>
                                                <x-card>
                                                    <ul class="divide-y divide-gray-400 dark:divide-gray-600 space-y-2">
                                                        @foreach($industry->techcategory as $category)

                                                            <li class="pt-2">
                                                                {{$category->name}}
                                                            </li>

                                                        @endforeach
                                                    </ul>
                                                </x-card>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <livewire:iptbm.admin.tech-component.industry-control :industry="$industry"/>

                        </x-card>
                    </div>

                @endforeach
            </div>


        </div>


    </div>
@endsection

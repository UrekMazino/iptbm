@extends('admin.iptbm.layout.app')

@section('title')
    {{"| admin: Category"}}
@endsection

@section('content')
    <div class="w-full">
        <livewire:iptbm.admin.tech-component.add-category :industry="$industry" />
        <nav class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">


            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="flex justify-between px-5 py-3 items-center">
                    <div class="flex justify-start items-center gap-4 ">
                        <a href="{{route("iptbm.addrecord.tech-comp.industry")}}">
                            <x-secondary-button data-modal-toggle="addIndus" class="text-sky-600 dark:text-sky-600 flex justify-start items-center space-x-2">
                                <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                                </svg>
                                <div >
                                    Back
                                </div>
                            </x-secondary-button>
                        </a>


                        <x-secondary-button data-modal-toggle="addCategoryMod">
                            Add Category
                        </x-secondary-button>

                    </div>
                    <a href="{{route("iptbm.addrecord.techCommodities",["industry"=>$industry->id])}}" class="font-medium text-sky-600 dark:text-sky-500 hover:underline">
                        Lis Of Commodities
                    </a>
                </div>

            </nav>

        </nav>
        <div class="px-4 w-full mt-10">
            <div >
                <x-header-label >
                    {{$industry->name}} industry
                </x-header-label>

            </div>

            <x-card class="shadow-lg mt-4">
                <x-item-header>
                    Technology Categories
                </x-item-header>
                <ul class=" mt-4 divide-y divide-gray-400 dark:divide-gray-600">
                    @foreach($industry->techcategory->sortBy('name') as $category)
                        <li class="">
                            <div class="p-2 justify-between hover:text-sky-700 dark:hover:text-white items-center transition duration-300 flex hover:bg-gray-300 dark:hover:bg-gray-800">
                                <div class="text-lg truncate">
                                    {{$category->name}}
                                </div>
                                <livewire:iptbm.admin.tech-component.tech-category-buttons wire:key="category-{{$category->id}}" :category="$category" />

                            </div>
                        </li>
                    @endforeach
                </ul>
            </x-card>
        </div>
    </div>
@endsection

@extends('admin.iptbm.layout.app')

@section('title')
    {{"| admin: Category"}}
@endsection

@section('content')
    <div class="w-full">
        <livewire:iptbm.admin.tech-component.add-tech-adopter/>
        <nav
            class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">
            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="flex justify-between px-5 py-3 items-center">
                    <x-secondary-button data-modal-toggle="addAdopterMod">
                        Add Technology Adopter
                    </x-secondary-button>

                </div>


            </nav>

        </nav>

        <div class="px-4 w-full mt-5">
            <div class="text-3xl px-2 mb-2 font-medium text-gray-700 dark:text-white">
                Technology Adopters
            </div>
            <x-card class="shadow-lg">
                <ul class=" mt-4 divide-y divide-gray-400 dark:divide-gray-600">
                    @foreach($adopters as $adopter)
                        <li class="">
                            <div
                                class="p-2 justify-between hover:text-sky-700 dark:hover:text-white items-center transition duration-300 flex hover:bg-gray-300 dark:hover:bg-gray-800">
                                <div class="text-lg">
                                    {{$adopter->name}}
                                </div>
                                <livewire:iptbm.admin.tech-component.tech-adopter-buttons
                                    wire:key="adopeter-{{$adopter->id}}" :adopter="$adopter"/>
                            </div>
                        </li>
                    @endforeach

                </ul>

            </x-card>
        </div>


    </div>
@endsection

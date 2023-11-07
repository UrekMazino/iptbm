@extends('admin.iptbm.layout.app')

@section('title')
    {{"| admin: view agency"}}
@endsection

@section('content')
    <div class="w-full mb-10">
        <nav class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="flex justify-between items-center">
                    <div  class="me-4 p-4">

                        <a href="{{route("iptbm.admin.addrecord.agencies")}}">
                            <x-secondary-button data-modal-toggle="addAgency" class="text-sky-600 dark:text-sky-600">
                                back
                            </x-secondary-button>
                        </a>
                    </div>

                    <div id="botNav" class="me-4">

                    </div>

                </div>

            </nav>

        </nav>
        <div class="px-4 w-full mt-5">
            <livewire:iptbm.admin.agency.agency-details :agency="$agency" />
        </div>
    </div>
@endsection

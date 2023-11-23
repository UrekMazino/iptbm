@extends('admin.iptbm.layout.app')

@section('title')
    {{"| admin: add account"}}
@endsection

@section('content')
    <div class="container-fluid p-0">
        <div
            class="sticky-top left-0 z-40 w-full h-16 bg-gray-50 shadow border-t border-b border-gray-200 dark:bg-gray-800 dark:border-gray-600">
            <div class="grid h-full max-w-lg  font-medium">
                <div class="m-auto ms-2 text-gray-700 dark:text-gray-400">
                    <a href="{{route("iptbm.admin.addrecord.account")}}"
                       class="hover:bg-gray-200 dark:hover:bg-gray-800">
                        <i class="fa-solid fa-house scale-125 me-2 text-blue-500"></i><strong class="text-gray-500">
                            Users account </strong>
                    </a>

                </div>
            </div>
        </div>


        <div class="mt-5">
            <livewire:iptbm.admin.user-account :user="$user"/>
        </div>


    </div>

@endsection

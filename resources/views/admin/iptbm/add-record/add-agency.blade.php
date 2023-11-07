@extends('admin.iptbm.layout.app')

@section('title')
    {{"| admin: add agency"}}
@endsection

@section('content')
    <div class="w-full pb-10">
        <nav class="bg-white border-b border-gray-200  sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-end mx-auto p-4">
                    <a href="{{route("iptbm.admin.addrecord.agencies")}}" class="nav-link active"><i class="fa-solid fa-circle-arrow-left me-2" style="scale: 1.5"></i> Agencies</a>

                </div>
            </nav>
        </nav>

        <div class="mt-5 w-full mb-10">
           <livewire:iptbm.admin.agency.add-agency />
        </div>


    </div>
@endsection

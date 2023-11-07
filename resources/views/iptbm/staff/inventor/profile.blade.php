@extends('layouts.iptbm.staff')

@section('title')
    {{"| inventors-profile"}}
@endsection

@section('content')
    <div class="w-full">
        <nav class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">


            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-start mx-auto p-4">

                    <div class=" w-full flex justify-between items-center " id="navbar-default">
                        <a class="text-blue-500 dark:text-sky-500" href="{{route("iptbm.staff.inventor")}}">
                            <span class="fa-solid fa-user-gear scale-125 me-2"></span>Inventors
                        </a>




                    </div>
                </div>
            </nav>

        </nav>

        <livewire:iptbm.staff.inventor.inventors-profile :inventor="$inventor"/>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#inventors').DataTable({
                // serverSide: true,
                stateSave: true,
                pagingType: 'full_numbers',
                horizontalScroll: true
            });
        })
    </script>
@endsection

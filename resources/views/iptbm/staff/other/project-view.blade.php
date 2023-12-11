@extends('layouts.iptbm.staff')

@section('title')
    {{"| project"}}
@endsection

@section('content')
    <div class="w-full">
        <nav
            class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">


            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="flex justify-between items-center">
                    <div class="me-4 p-4">
                        <!-- Modal toggle -->
                        <a href="{{route("iptbm.staff.ipProfile")}}" class="inline-flex items-center justify-center p-2 px-6 text-base font-medium text-sky-500 rounded-lg bg-gray-50 hover:text-sky-900 hover:bg-gray-100 dark:text-sky-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-sky-300">
                            <span class="fa-solid fa-home"></span>
                            Profile
                        </a>


                    </div>


                </div>

            </nav>

        </nav>


        <livewire:iptbm.staff.profile.edit-project-detail :project="$project"></livewire:iptbm.staff.profile.edit-project-detail>

    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#datepicker2').datepicker({
                "format": "yyyy-mm-dd",
            });
            $('#datepicker3').datepicker({
                "format": "yyyy-mm-dd",
            });
        });
    </script>
@endsection

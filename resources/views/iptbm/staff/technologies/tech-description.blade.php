@extends('layouts.iptbm.staff')

@section('title')
    {{"| technology"}}
@endsection

@section('content')
    <div class="w-full">
        <nav
            class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-start mx-auto p-4">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li class="inline-flex items-center">
                                <a href="{{route("iptbm.staff.technology")}}"
                                   class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                                    </svg>
                                    Home
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <a href="{{route("iptbm.staff.technology.show",["id"=>$technology_description->technology_profile->id])}}"
                                       class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">Technology
                                        Details</a>

                                </div>
                            </li>

                            <li>
                                <div class="flex items-center">
                                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <a href=""
                                       class="ml-1 text-sm font-medium  hover:text-blue-600 md:ml-2 text-blue-700 ">Full
                                        Technology Description</a>

                                </div>
                            </li>

                        </ol>
                    </nav>

                </div>
            </nav>
        </nav>


        <livewire:iptbm.staff.technology.fulltechdescription.description
            :technology_description="$technology_description"/>
    </div>

@endsection
@section('script')
    <script>

        $(document).ready(function (e) {
            $('#input_tech_pic').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#image_holder').empty().append($('<img>').attr({
                        src: e.target.result,
                        height: '100%',
                        class: 'img-fluid',
                    }))
                }
                reader.readAsDataURL(this.files[0]);
            });
            $('#input_tech_flow').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#image_flow_holder').attr({height: '40rem'}).empty().append($('<iframe>').attr({
                        src: e.target.result,
                        class: 'img-fluid',
                    }).css({
                        height: '15rem',
                        width: '100%',
                    }))
                }
                reader.readAsDataURL(this.files[0]);
            });
            $('#input_tech_req').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#pdf_req').attr({height: '40rem'}).empty().append($('<iframe>').attr({
                        src: e.target.result,
                        class: 'img-fluid',
                    }).css({
                        height: '15rem',
                        width: '100%'
                    }))
                }
                reader.readAsDataURL(this.files[0]);
            });
            $('#input_tech_app').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#tech_app_pdf').attr({
                        height: '40rem',
                        class: 'border p-2 rounded mb-3'
                    }).empty().append($('<iframe>').attr({
                        src: e.target.result,
                        class: 'img-fluid',
                    }).css({
                        height: '15rem',
                        width: '100%'
                    }))
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('#input_tech_market').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#tech_market_pdf').attr({
                        height: '40rem',
                        class: 'border p-2 rounded mb-3'
                    }).empty().append($('<iframe>').attr({
                        src: e.target.result,
                        class: 'img-fluid',
                    }).css({
                        height: '15rem',
                        width: '100%'
                    }))
                }
                reader.readAsDataURL(this.files[0]);
            });
            $('#input_tech_signif').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#tech_signif_pdf').attr({
                        height: '40rem',
                        class: 'border p-2 rounded mb-3'
                    }).empty().append($('<iframe>').attr({
                        src: e.target.result,
                        class: 'img-fluid',
                    }).css({
                        height: '15rem',
                        width: '100%'
                    }))
                }
                reader.readAsDataURL(this.files[0]);
            });
            $('#input_tech_limit').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#tech_limit_pdf').attr({
                        height: '40rem',
                        class: 'border p-2 rounded mb-3'
                    }).empty().append($('<iframe>').attr({
                        src: e.target.result,
                        class: 'img-fluid',
                    }).css({
                        height: '15rem',
                        width: '100%'
                    }))
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection

@extends('layouts.iptbm.staff')

@section('title')
    {{"| Pre Commercialization"}}
@endsection

@section('meta_data')
    <meta name="pre-commercialization" content="Technology pre-commercialization">
@endsection

@section('content')
    <div class="w-full pb-5">
        <nav
            class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-start mx-auto p-4">
                    <div class=" w-full flex justify-between items-center " id="navbar-default">
                        <a href="{{route("iptbm.staff.precom.index")}}">
                            <i class="fa-solid fa-house scale-125 me-2 text-blue-500"></i><strong class="text-gray-500">Home </strong>
                        </a>
                    </div>
                </div>
            </nav>

        </nav>


        <div class="px-4 mt-10">
            <div class="text-gray-700 dark:text-gray-400 font-bold text-2xl mb-3">
                Technology Pre Commercialization Details
            </div>
            <x-card class="shadow-lg">
                <div class="grid grid-cols-1 relative overflow-hidden rounded-lg py-24">
                    <img src="{{Storage::url($precom->technology->tech_photo)}}" alt="Background Image"
                         class="absolute  top-0 left-0 w-full h-full object-cover filter blur">
                    <div class="absolute top-0 left-0 w-full h-full bg-black  bg-opacity-75 rounded-lg"></div>
                    <div class="z-10 p-4">
                        <div class="m-auto w-full md:w-3/4">
                            <div class="mx-auto px-3  ">
                                <div class="mx-auto px-3 text-center text-2xl">
                                    <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                       href="{{route("iptbm.staff.technology.show",["id"=>$precom->technology->id])}}">
                                        @if($precom->pre_com_tech_name)
                                            {{$precom->pre_com_tech_name}}
                                        @else
                                            {{$precom->technology->title}}
                                        @endif
                                    </a>

                                </div>
                            </div>
                            <hr class="h-px   border-0 bg-gray-400 dark:bg-gray-300">
                            <div class="mx-auto px-3 w-fit text-gray-400 dark:text-gray-400">
                                Technology Title
                            </div>
                        </div>

                    </div>
                </div>
            </x-card>
            <div class="inline-flex items-center justify-center w-full">
                <hr class="w-full h-0.5 my-10  bg-gray-400 border-0 dark:bg-gray-700">

            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 mt-5 gap-x-14">
                <livewire:iptbm.staff.precom.precom-details :precom="$precom"/>
                <div>
                    <livewire:iptbm.staff.precom.video-clip :precom="$precom"/>
                    <livewire:iptbm.staff.precom.precom-accounting :precom="$precom"/>
                </div>
            </div>


        </div>


    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#priH').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#fileCont').empty().attr({
                        height: '50rem',
                        class: 'border rounded p-2 shadow'
                    }).empty().append($('<iframe>').attr({
                        src: e.target.result,
                        class: 'img-fluid',
                    }).css({
                        height: '20rem',
                        width: '100%',
                    }))
                }
                reader.readAsDataURL(this.files[0]);
            });
            $('#inputFree').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#fileContFree').empty().attr({
                        height: '50rem',
                        class: 'border rounded p-2 shadow'
                    }).empty().append($('<iframe>').attr({
                        src: e.target.result,
                        class: 'img-fluid',
                    }).css({
                        height: '20rem',
                        width: '100%',
                    }))
                }
                reader.readAsDataURL(this.files[0]);
            });
            $('#inputTerm').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#fileContTerm').empty().attr({
                        height: '50rem',
                        class: 'border rounded p-2 shadow'
                    }).empty().append($('<iframe>').attr({
                        src: e.target.result,
                        class: 'img-fluid',
                    }).css({
                        height: '20rem',
                        width: '100%',
                    }))
                }
                reader.readAsDataURL(this.files[0]);
            });
            $('#inputRep').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#fileRep').empty().attr({
                        height: '50rem',
                        class: 'border rounded p-2 shadow'
                    }).empty().append($('<iframe>').attr({
                        src: e.target.result,
                        class: 'img-fluid',
                    }).css({
                        height: '20rem',
                        width: '100%',
                    }))
                }
                reader.readAsDataURL(this.files[0]);
            });
            $('#inputLic').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#fileLic').empty().attr({
                        height: '50rem',
                        class: 'border rounded p-2 shadow'
                    }).empty().append($('<iframe>').attr({
                        src: e.target.result,
                        class: 'img-fluid',
                    }).css({
                        height: '20rem',
                        width: '100%',
                    }))
                }
                reader.readAsDataURL(this.files[0]);
            });
            $('#inputFin').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#fileFin').empty().attr({
                        height: '50rem',
                        class: 'border rounded p-2 shadow'
                    }).empty().append($('<iframe>').attr({
                        src: e.target.result,
                        class: 'img-fluid',
                    }).css({
                        height: '20rem',
                        width: '100%',
                    }))
                }
                reader.readAsDataURL(this.files[0]);
            });
            $('#inputMach').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#fileMach').empty().attr({
                        height: '50rem',
                        class: 'border rounded p-2 shadow'
                    }).empty().append($('<iframe>').attr({
                        src: e.target.result,
                        class: 'img-fluid',
                    }).css({
                        height: '20rem',
                        width: '100%',
                    }))
                }
                reader.readAsDataURL(this.files[0]);
            });
            $('#inputFeas').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#fileFeas').empty().attr({
                        height: '50rem',
                        class: 'border rounded p-2 shadow'
                    }).empty().append($('<iframe>').attr({
                        src: e.target.result,
                        class: 'img-fluid',
                    }).css({
                        height: '20rem',
                        width: '100%',
                    }))
                }
                reader.readAsDataURL(this.files[0]);
            });
            $('#inputBus').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#fileBus').empty().attr({
                        height: '50rem',
                        class: 'border rounded p-2 shadow'
                    }).empty().append($('<iframe>').attr({
                        src: e.target.result,
                        class: 'img-fluid',
                    }).css({
                        height: '20rem',
                        width: '100%',
                    }))
                }
                reader.readAsDataURL(this.files[0]);
            });
            $('#inputTransIn').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#fileTransIn').empty().attr({
                        height: '50rem',
                        class: 'border rounded p-2 shadow'
                    }).empty().append($('<iframe>').attr({
                        src: e.target.result,
                        class: 'img-fluid',
                    }).css({
                        height: '20rem',
                        width: '100%',
                    }))
                }
                reader.readAsDataURL(this.files[0]);
            });
        })
    </script>
@endsection

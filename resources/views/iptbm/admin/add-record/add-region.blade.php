@extends('layouts.iptbm.admin')

@section('title')
    {{"| admin: add region"}}
@endsection

@section('content')
    <div class="sticky-md-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container nav-pills navbar-nav ms-3">
                <a href="{{route("iptbm.admin.addrecord.region")}}" class="nav-link active"><i
                        class="fa-solid fa-circle-arrow-left me-2" style="scale: 1.5"></i> Regions</a>
            </div>
        </nav>
    </div>

    <div class="row my-2 m-0 p-0">
        <div class="col-md-6 m-auto">
            @if(Session::has('add_region'))
                <div class="alert alert-success">
                    {{Session::get('add_region')}}
                </div>
            @endif
            <form method="post" action="{{route("iptbm.admin.addrecord.add_region_record")}}">
                @csrf
                <div class=" max-w-lg p-6 border m-auto mt-5  rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="mb-3">
                        <span class="dark:text-gray-200">RRDCC Chair</span>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-1">
                        <div>
                            <label for="region_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Region Name</label>
                            <input id="region_name" value="{{old('region_name')}}" type="text" name="region_name" placeholder="region name"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
                                w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control @if(old('region_name')) is-valid @endif @error('region_name') is-invalid @enderror ">
                            @error('region_name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-1">
                        <div>
                            <label for="region_rrdcc_chair" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RRDCC Chair</label>
                            <input id="region_rrdcc_chair" value="{{old('region_rrdcc_chair')}}" type="text" name="region_rrdcc_chair" placeholder="rrdcc chair"
                                   class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
                                w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control
                                 @if(old('region_rrdcc_chair')) is-valid @endif @error('region_rrdcc_chair') is-invalid @enderror ">
                            @error('region_rrdcc_chair')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-1">
                        <div>
                            <label for="region_consortium" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Consortium</label>
                            <input id="region_consortium" value="{{old('region_consortium')}}" type="text" name="region_consortium" placeholder="consortium"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
                                w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control
                                @if(old('region_consortium')) is-valid @endif @error('region_consortium') is-invalid @enderror ">
                            @error('region_consortium')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror

                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-1">
                        <div>
                            <label for="region_consortium_director" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Consortium Director</label>
                            <input id="region_consortium_director" value="{{old('region_consortium_director')}}" type="text" name="region_consortium_director" placeholder="region consortium director"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
                                w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control
                                 @if(old('region_consortium_director')) is-valid @endif @error('region_consortium_director') is-invalid @enderror ">
                            @error('region_consortium_director')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror

                        </div>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none
                         focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <span class="fa-solid fa-floppy-disk"></span> Save
                    </button>

                </div>

            </form>
        </div>
    </div>
@endsection

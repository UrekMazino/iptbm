@extends('layouts.iptbm.admin')

@section('title')
    {{"| admin: add agency"}}
@endsection

@section('content')
    <div class="w-full pb-10">
        <div class="sticky-md-top">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container nav-pills navbar-nav ms-3">
                    <a href="{{route("iptbm.admin.addrecord.agencies")}}" class="nav-link active"><i
                            class="fa-solid fa-circle-arrow-left me-2" style="scale: 1.5"></i> Agencies</a>
                </div>
            </nav>
        </div>
        <div class="mt-5 w-full mb-10">
            <livewire:iptbm.admin.agency.add-agency/>
        </div>


    </div>
@endsection

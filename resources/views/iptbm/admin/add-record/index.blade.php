@extends('layouts.iptbm.admin')

@section('title')
    {{"| admin: add record"}}
@endsection

@section('content')
    <x-iptbm.admin.add-record-nav ></x-iptbm.admin.add-record-nav>
    <div class="pb-10">
        @section('sub-content')
        @show
    </div>
@endsection

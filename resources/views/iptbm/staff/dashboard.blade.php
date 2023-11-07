@extends('layouts.iptbm.staff')

@section('title')
    {{"| dashboard"}}
@endsection


@section('content')
    <div class="px-4 w-full mt-5 space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <div class="col-span-3">
                <livewire:iptbm.dashboard.calendar />
            </div>
            <div class="col-span-2">
                <livewire:iptbm.dashboard.new-iptbm />
            </div>
        </div>
        <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-4  my-4">
            <livewire:iptbm.dashboard.iptbm-profiles />
            <livewire:iptbm.dashboard.technologies />
            <livewire:iptbm.dashboard.tech-transfer />

        </div>
        <div>
            <livewire:iptbm.dashboard.iptbm-istablished />
        </div>


        <livewire:iptbm.dashboard.map wire:key="map" />




    </div>
@endsection

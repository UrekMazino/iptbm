@extends('layouts.iptbm.staff')

@section('title')
    {{"| dashboard"}}
@endsection


@section('content')
    <div class="px-4 w-full mt-5 space-y-4">
        <x-header-label class="mt-10">
            IP-TBM Dashboard
        </x-header-label>
        <div class="space-y-4">

            <x-grid col="5" gap="4">
                <div class="md:col-span-3">
                    <livewire:iptbm.dashboard.calendar/>
                </div>
                <div class="md:col-span-2">
                    <livewire:iptbm.dashboard.new-iptbm/>
                </div>
            </x-grid>
        </div>

        <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-4  my-4">
            <livewire:iptbm.dashboard.iptbm-profiles/>
            <livewire:iptbm.dashboard.technologies/>
            <livewire:iptbm.dashboard.tech-transfer/>

        </div>
        <div>
            <livewire:iptbm.dashboard.iptbm-istablished/>
        </div>


        <livewire:iptbm.dashboard.map wire:key="map"/>


    </div>
@endsection

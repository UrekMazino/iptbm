@extends('iptbm.admin.iptbm-profiles.profile-details')

@section('title')
    {{"| admin: add record"}}
@endsection
@section('sub-content')
    <livewire:iptbm.admin.profile-technologies :profileId="$profile->id" :technologies="$profile->technologies"/>

@endsection

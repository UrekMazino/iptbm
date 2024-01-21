@extends('layouts.iptbm.staff')

@section('title')
    {{"| ip-profile"}}
@endsection


@section('content')
    <div class="w-full mb-10 p-0 md:px-4">


        @if(Session::has('status'))
            <div class="text-success fw-bold">
                {{Session::get('status')}}
            </div>
        @endif
        <div class=" mt-10 w-full space-y-4">
            <x-header-label>
                IP-TBM Profile Details
            </x-header-label>
            <x-grid col="3" gap="4">
                <div>
                    <livewire:iptbm.staff.profile.upload-profile :profile="$profile"/>

                </div>
                <div class="col-span-1 md:col-span-2">
                    <livewire:iptbm.staff.profile.update-tag-name :profile="$profile"/>
                </div>
            </x-grid>
        </div>
        <div class=" mt-10 w-full">


            <div class="my-3 mx-lg-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 gap-x-10">
                    <div class="space-y-10 md:space-y-4">
                        <x-card-panel title=" Profile Details">
                            <livewire:iptbm.staff.profile.details
                                :profile="$profile"></livewire:iptbm.staff.profile.details>
                        </x-card-panel>
                        <x-card-panel title="Region">
                            <div class="space-y-4">
                                <div
                                    class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 flex justify-between items-center">
                                    <div class="divide-y w-full divide-gray-300 dark:divide-gray-700 ">
                                        <x-item-header>
                                            @if($profile->agency->region->name)
                                                {{$profile->agency->region->name}}
                                            @else
                                                <div class="text-gray-400 dark:text-gray-500 text-base font-normal">
                                                    No data available
                                                </div>
                                            @endif
                                        </x-item-header>
                                        <div>
                                            Region Name
                                        </div>
                                    </div>

                                </div>
                                <div
                                    class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 flex justify-between items-center">
                                    <div class="divide-y w-full divide-gray-300 dark:divide-gray-700 ">
                                        <x-item-header>
                                            @if($profile->agency->region->rrdcc_chair)
                                                {{$profile->agency->region->rrdcc_chair}}
                                            @else
                                                <div class="text-gray-400 dark:text-gray-500 text-base font-normal">
                                                    No data available
                                                </div>
                                            @endif
                                        </x-item-header>
                                        <div>
                                            RRDCC Chair
                                        </div>
                                    </div>

                                </div>
                                <div
                                    class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 flex justify-between items-center">
                                    <div class="divide-y w-full divide-gray-300 dark:divide-gray-700 ">
                                        <x-item-header>
                                            @if($profile->agency->region->consortium_director)
                                                {{$profile->agency->region->consortium_director}}
                                            @else
                                                <div class="text-gray-400 dark:text-gray-500 text-base font-normal">
                                                    No data available
                                                </div>
                                            @endif
                                        </x-item-header>
                                        <div>
                                            Consortium Director
                                        </div>
                                    </div>

                                </div>
                                <div
                                    class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 flex justify-between items-center">
                                    <div class="divide-y w-full divide-gray-300 dark:divide-gray-700 ">
                                        <x-item-header>
                                            @if($profile->agency->region->consortium)
                                                {{$profile->agency->region->consortium}}
                                            @else
                                                <div class="text-gray-400 dark:text-gray-500 text-base font-normal">
                                                    No data available
                                                </div>
                                            @endif
                                        </x-item-header>
                                        <div>
                                            Consortium
                                        </div>
                                    </div>

                                </div>


                            </div>

                        </x-card-panel>


                        <x-card-panel title="Agency Details">


                            <livewire:iptbm.staff.profile.agency-form :profile="$profile"/>

                        </x-card-panel>


                    </div>
                    <div class="space-y-10 md:space-y-4">
                        <livewire:iptbm.staff.profile.projects :profile="$profile"/>
                        <livewire:iptbm.staff.profile.ip-policy :profile="$profile"/>
                        <livewire:iptbm.staff.profile.contact
                            :profile="$profile->id"></livewire:iptbm.staff.profile.contact>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>


        $('#profLog').change(function () {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#image_holder').empty().append($('<img>').attr({
                    src: e.target.result,
                    class: 'admin-logo-img',
                }).css({
                    'object-fit': 'contain'
                }))
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endsection

@extends('layouts.iptbm.staff')

@section('title')
    {{"| ip-profile"}}
@endsection


@section('content')
    <div class="w-full mb-10">
        @if($profile->logo)
            <div id="profile" tabindex="-1"
                 class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-7xl max-h-full">
                    <div class="relative bg-gray-50 rounded-lg shadow w-1/2 h-full m-auto dark:bg-gray-700">
                        <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                data-modal-hide="profile">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-10 text-center m-auto aspect-square">
                            <img class="  rounded-lg m-auto object-contain w-full h-full"
                                 src="{{Storage::url($profile->logo)}}" alt="image description">
                        </div>
                    </div>
                </div>
            </div>

        @endif

        @if(Session::has('status'))
            <div class="text-success fw-bold">
                {{Session::get('status')}}
            </div>
        @endif

        <div class="px-4 md:px-2 mt-10 w-full">
            <div class="mx-lg-5 my-4">
                <div class="grid grid-cols-1 md:grid-cols-3 p-5  gap-4 relative rounded-lg  overflow-hidden">

                    <img src="{{Storage::url($profile->logo)}}" alt="Background Image"
                         class="absolute  top-0 left-0 w-full h-full object-cover filter blur">
                    <div class="absolute top-0 left-0 w-full h-full bg-gray-900  opacity-25 rounded-lg"></div>
                    <!-- Your content here -->

                    <div class="aspect-square z-20">
                        <div
                            class="w-full  h-full p-6 bg-black overflow-hidden border-t border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            @if($profile->logo)

                                <a data-modal-target="authentication-modal" data-modal-toggle="profile" role="button">
                                    <img
                                        class="hover:scale-110 transition duration-300 max-w-lg rounded-lg object-contain w-full h-full"
                                        src="{{\Illuminate\Support\Facades\Storage::url($profile->logo)}}" alt="image description">
                                </a>
                            @endif
                        </div>
                    </div>
                    <div
                        class="col-span-2 bg-gray-500 text-gray-300 dark:bg-gray-800 bg-opacity-50 dark:bg-opacity-50 z-20 ">
                        <div class="flex items-center  h-full w-full m-auto">
                            <h1 class="text-3xl text-white text-center w-auto m-auto">
                                @if($profile->tag_line)
                                    {{$profile->tag_line}}
                                @else
                                    Tag line
                                @endif
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3">
                    <div class=" justify-center items-center flex ">
                        <livewire:iptbm.staff.profile.upload-profile :profile="$profile"/>
                    </div>
                    <div class="col-span-2 justify-center items-center flex ">
                        <livewire:iptbm.staff.profile.update-tag-name :profile="$profile"/>
                    </div>
                </div>
            </div>

            <hr class="w-full h-1 mx-auto my-4 bg-gray-400 border-0 rounded md:my-10 dark:bg-gray-500">
            <div class="my-3 mx-lg-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <x-card-panel title="Region">
                            <h1 class="text-2xl text-bold mb-4 text-gray-700 dark:text-gray-100">
                                Region
                            </h1>
                            <div class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                                {{$profile->agency->region->name}}
                                <div class="text-gray-500">
                                    Region Address
                                </div>
                            </div>
                            <div class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                                @if($profile->agency->region->rrdcc_chair)
                                    {{$profile->agency->region->rrdcc_chair}}
                                @else
                                    Empty
                                @endif
                                <div class="text-gray-500">
                                    RRDCC Chair
                                </div>
                            </div>
                            <div class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                                @if($profile->agency->region->consortium_director)
                                    {{$profile->agency->region->consortium_director}}
                                @else
                                    Empty
                                @endif
                                <div class="text-gray-500">
                                    Consortium Director
                                </div>
                            </div>
                        </x-card-panel>


                        <x-card-panel title="Agency Details">

                            <div class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                                @if($profile->agency->name)

                                    {{$profile->agency->name}}
                                @else
                                    Empty
                                @endif
                                <div class="text-gray-500">
                                    Agency
                                </div>
                            </div>

                            <livewire:iptbm.staff.profile.agency-form
                                :profile="$profile"></livewire:iptbm.staff.profile.agency-form>

                        </x-card-panel>


                        <x-card-panel title=" Profile Details">
                            <livewire:iptbm.staff.profile.details :profile="$profile"></livewire:iptbm.staff.profile.details>
                        </x-card-panel>

                    </div>
                    <div class="space-y-4">
                        <livewire:iptbm.staff.profile.projects :profile="$profile"></livewire:iptbm.staff.profile.projects>
                       <x-card>
                           <livewire:iptbm.staff.profile.ip-policy :profile="$profile"/>
                       </x-card>
                        <x-card-panel title="Contact Details">
                            <livewire:iptbm.staff.profile.contact :profile="$profile->id"></livewire:iptbm.staff.profile.contact>
                        </x-card-panel>

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


@extends('admin.iptbm.layout.app')

@section('title')
    {{"| Tech trans : admin"}}
@endsection

@section('content')
    <div class="w-full">
        <nav class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">
            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="block md:flex justify-start items-center">
                    <div class="p-4">
                        <x-link-button :url="route('iptbm.admin.techtrans.adopter')" class="text-sky-600 dark:text-sky-600">
                            <svg class="w-4 h-4 me-2 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                            </svg>
                            Back
                        </x-link-button>
                    </div>

                </div>

            </nav>

        </nav>
        <div class="px-0 md:px-4 w-full mt-10">
            <x-card class="shadow-lg sm:m-0">
                <div class="grid grid-cols-1 relative overflow-hidden rounded-lg py-24">
                    <img src="{{Storage::url($adopter->technology->tech_photo)}}" alt="Background Image"
                         class="absolute  top-0 left-0 w-full h-full object-cover filter blur">
                    <div class="absolute top-0 left-0 w-full h-full bg-black  bg-opacity-75 rounded-lg"></div>
                    <div class="z-10 p-4">
                        <div class="m-auto w-full md:w-3/4">
                            <div class="mx-auto px-3  ">
                                <div class="mx-auto px-3 text-center text-2xl">
                                    <a class="font-medium text-sky-600 dark:text-sky-500 hover:underline"
                                       href="{{route("iptbm.staff.technology.show",["id"=>$adopter->technology->id])}}">
                                        @if($adopter->pre_com_tech_name)
                                            {{$adopter->pre_com_tech_name}}
                                        @else
                                            {{$adopter->technology->title}}
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

            <div class="mt-4 space-y-4">
                <div class="mt-10">
                    <x-header-label>
                        Commercialization Adopter
                    </x-header-label>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="col-span-2">
                        <x-card class="shadow-lg">
                            <x-item-header>
                                Adopter Details
                            </x-item-header>
                            <div class="mt-4 space-y-4 py-4">
                              <div class="border border-gray-400 dark:border-gray-600 rounded-lg p-2 px-4  flex justify-start items-center">
                                  <div class="w-fit divide-y divide-gray-400 dark:divide-gray-600">
                                      <div class="font-medium text-gray-700 dark:text-gray-300">
                                          {{$adopter->company_name}}
                                      </div>
                                      <div >
                                          Company Name
                                      </div>
                                  </div>

                              </div>
                                <div class="border border-gray-400 dark:border-gray-600 rounded-lg p-2 px-4  flex justify-start items-center">
                                    <div class="w-fit divide-y divide-gray-400 dark:divide-gray-600">
                                        <div class="font-medium text-gray-700 dark:text-gray-300">
                                            {{$adopter->company_description}}
                                        </div>
                                        <div >
                                            Company Description
                                        </div>
                                    </div>

                                </div>
                                <div class="border border-gray-400 dark:border-gray-600 rounded-lg p-2 px-4  flex justify-start items-center">
                                    <div class="w-fit divide-y divide-gray-400 dark:divide-gray-600">
                                        <div class="font-medium text-gray-700 dark:text-gray-300">
                                            {{$adopter->business_structures}}
                                        </div>
                                        <div >
                                            Business Structure
                                        </div>
                                    </div>

                                </div>
                                <div class="border border-gray-400 dark:border-gray-600 rounded-lg p-2 px-4  flex justify-start items-center">
                                    <div class="w-fit divide-y divide-gray-400 dark:divide-gray-600">
                                        <div class="font-medium text-gray-700 dark:text-gray-300">
                                            {{$adopter->business_registration}}
                                        </div>
                                        <div >
                                            Business Registration
                                        </div>
                                    </div>

                                </div>
                                <div class="border border-gray-400 dark:border-gray-600 rounded-lg p-2 px-4  flex justify-start items-center">
                                    <div class="w-fit divide-y divide-gray-400 dark:divide-gray-600">
                                        <div class="font-medium text-gray-700 dark:text-gray-300">
                                            {{$adopter->acquisition_model}}
                                        </div>
                                        <div >
                                            Acquisition Mode
                                        </div>
                                    </div>

                                </div>
                                <div class="border border-gray-400 dark:border-gray-600 rounded-lg p-2 px-4  flex justify-start items-center">
                                    For Incubation :
                                    <div class="font-medium text-gray-700 dark:text-gray-300 ms-2">
                                        {{$adopter->for_incubation? "YES":"NO"}}
                                    </div>
                                </div>
                            </div>
                        </x-card>
                    </div>
                    <div>
                        <x-card class="shadow-lg">
                            <x-item-header>
                                Contact Details
                            </x-item-header>
                            <div class="mt-4 space-y-3">
                                <div >
                                    {{$adopter->address}}
                                </div>
                                @if($adopter->contacts->where('type','mobile')->count()>0)
                                    <ul>
                                        <x-input-label value="Mobile"/>
                                        @foreach($adopter->contacts->where('type','mobile') as $data)
                                            <li>
                                               {{$data->contact}}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                                @if($adopter->contacts->where('type','phone')->count()>0)
                                    <ul>
                                        <x-input-label value="Phone"/>
                                        @foreach($adopter->contacts->where('type','phone') as $data)
                                            <li>
                                                {{$data->contact}}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                                @if($adopter->contacts->where('type','fax')->count()>0)
                                    <ul>
                                        <x-input-label value="Fax"/>
                                        @foreach($adopter->contacts->where('type','fax') as $data)
                                            <li>
                                                {{$data->contact}}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                                @if($adopter->contacts->where('type','email')->count()>0)
                                    <ul>
                                        <x-input-label value="Email"/>
                                        @foreach($adopter->contacts->where('type','email') as $data)
                                            <li>
                                                {{$data->contact}}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </x-card>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

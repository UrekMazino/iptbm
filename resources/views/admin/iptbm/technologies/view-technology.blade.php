
@extends('admin.iptbm.layout.app')

@section('title')
    {{"| admin: view technology"}}
@endsection

@section('content')
    <div class="w-full">

        <nav class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">
            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="flex justify-between items-center">
                    <div  class="me-4 p-4">
                        <a href="{{route("iptbm.admin.technologies-report")}}">
                            <x-secondary-button class="text-sky-600 dark:text-sky-600">
                                <svg class="w-4 h-4 me-2 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                                </svg>
                                technologies
                            </x-secondary-button>
                        </a>

                    </div>

                </div>

            </nav>

        </nav>
        <div class="px-0 md:px-4 w-full mt-5 ">
            <x-card class="shadow-lg">
              <div class="grid grid-cols-1 md:grid-cols-3">
                  <div>
                      <x-card class="aspect-square border border-gray-300 dark:border-gray-600 flex justify-center items-center">
                          <img  class="w-full h-auto" src="{{\Illuminate\Support\Facades\Storage::url($technology->tech_photo)}}"  alt=""/>
                      </x-card>
                  </div>
                  <div class="col-span-2 flex justify-items-center items-center">
                      <div class="m-auto divide-y divide-gray-400 dark:divide-gray-600 w-full  p-0 md:p-4">
                          <div class="py-4 space-y-4">
                             <x-item-header>
                                 Technology Title
                             </x-item-header>
                              <div >
                                  {{$technology->title}}
                              </div>
                          </div>
                          <div class="py-4 space-y-4">
                              <x-item-header>
                                  Technology Description
                              </x-item-header>
                              <div>
                                  {{$technology->tech_desc}}
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </x-card>
            <x-header-label class="mt-10 mb-4">
                Technology Details
            </x-header-label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-4">
                    <x-card class="shadow-lg space-y-10">
                        <div>
                            <x-item-header>
                                Technology Owner
                            </x-item-header>
                            <ul class="mt-2 divide-y divide-gray-400 dark:divide-gray-600">
                                @foreach($technology->owner as $owner)
                                    <li>
                                        {{$owner->agency->name}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div>
                            <x-item-header>
                                Technology Generator
                            </x-item-header>
                            <ul class=" divide-y divide-gray-400 dark:divide-gray-600">
                                @foreach($technology->techgenerators as $generator)
                                    <li class="py-2">
                                        <div class="font-bold">
                                            {{$generator->inventor->name." ".(($generator->inventor->middle_name)? $generator->inventor->middle_name.".":" ")." ".$generator->inventor->last_name." ".$generator->inventor->suffixes }}
                                        </div>
                                        <div>
                                            {{$generator->inventor->address}}
                                        </div>
                                        <div>
                                            {{$generator->inventor->agency_name->name}}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </x-card>
                    <x-card class="shadow-lg ">
                        <x-item-header>
                            Research Project Conducted
                        </x-item-header>
                        <ul class="divide-y divide-gray-400 dark:divide-gray-600">
                            @foreach($technology->researchprojects as $research)
                                <li class="py-2">
                                    <div class="border border-gray-400 dark:border-gray-600 rounded-lg p-3 space-y-4">
                                        <div class="divide-y divide-gray-400 dark:divide-gray-600 w-fit">
                                            <div class="font-bold text-gray-700 dark:text-gray-300">
                                                {{$research->title}}
                                            </div>
                                            <div>
                                                Research Title
                                            </div>
                                        </div>
                                        <div>
                                            <x-input-label value="Funding Agencies"/>
                                            <ul class="list-disc">
                                                @foreach($research->funder as $funder)
                                                    <li class="ms-4">
                                                        {{$funder->agency->name}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="mt-2">
                                                <x-input-label value="Amount Invested"/>
                                                <div class="font-bold text-gray-700 dark:text-gray-300">
                                                    <span class="fa-solid fa-peso-sign">

                                                    </span>
                                                    {{number_format($research->amount,2)}}
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <x-input-label value="Industry Partner"/>
                                            <ul class="mt-2 divide-y divide-gray-400 dark:divide-gray-600">
                                                @foreach($research->researchpartners as $partner)
                                                    <li class="py-2">
                                                        <div class="font-bold">
                                                            {{$partner->industry_name}}
                                                        </div>
                                                        <div class="font-thin">
                                                            {{$partner->address}}
                                                        </div>

                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </x-card>
                </div>
                <div>
                    <x-card class="shadow-lg space-y-10">
                        <div>
                            <x-item-header>
                                IP Protection Application
                            </x-item-header>
                            <ul class="mt-2">
                                @foreach($technology->ip_applications as $application)
                                    <li>
                                        <a href="{{route("iptbm.admin.ip-application-report.task",['task'=>$application->ip_type->id])}}" class="font-medium text-sky-600 dark:text-sky-500 hover:underline">
                                            {{$application->ip_type->name}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div>
                            <x-item-header>
                                Technology Transfer Plan
                            </x-item-header>
                            <ul class="space-y-4 mt-2">
                              <li>
                                  <x-input-label value="Pre Commercialization" />
                                  <ul class="list-disc">
                                      @forelse($technology->pre_commercialization as $precom)
                                          <li class="ms-4">
                                              {{\Carbon\Carbon::make($precom->created_at)->format('F-d-Y')}}
                                          </li>
                                      @empty
                                          No data available
                                      @endforelse
                                  </ul>
                              </li>
                                <li>
                                    <x-input-label value="Commercialization Adopter" />
                                    <ul class="list-disc">
                                        @forelse($technology->commercial_adopters as $precom)
                                            <li class="ms-4">
                                                {{\Carbon\Carbon::make($precom->created_at)->format('F-d-Y')}}
                                            </li>
                                        @empty
                                            No data available
                                        @endforelse
                                    </ul>
                                </li>
                                <li>
                                    <x-input-label value="Deployment" />
                                    <ul class="list-disc">
                                        @forelse( $technology->deployment as $precom)
                                            <li class="ms-4">
                                                {{\Carbon\Carbon::make($precom->created_at)->format('F-d-Y')}}
                                            </li>
                                        @empty
                                            No data available
                                        @endforelse

                                    </ul>
                                </li>
                                <li>
                                    <x-input-label value="Deployment" />
                                    <ul class="list-disc">
                                        @forelse( $technology->extension as $precom)
                                            <li class="ms-4">
                                                {{\Carbon\Carbon::make($precom->created_at)->format('F-d-Y')}}
                                            </li>
                                        @empty
                                            No data available
                                        @endforelse

                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div>

                        </div>
                    </x-card>
                </div>
            </div>
        </div>
    </div>

@endsection

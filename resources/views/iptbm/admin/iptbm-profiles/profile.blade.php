@extends('iptbm.admin.iptbm-profiles.profile-details')

@section('title')
    {{"| admin: add record"}}
@endsection
@section('sub-content')
    <div class="mx-5 shadow-lg border-l border-t border-b rounded-lg border-r border-gray-200 dark:border-gray-600 p-4
    bg-gray
    dark:bg-gray-800
    ">

        <div class="grid grid-cols-[5fr,2fr,8fr] gap-2 border-b border-gray-700 w-2/3 m-auto">
            <div class=" p-2 text-gray-600 dark:text-gray-400">
                Region:
            </div>
            <div class=" p-2">
                <button class=" text-blue-500">
                    Edit
                    <span class="fa-solid fa-edit m-s-2 "></span>
                </button>
            </div>
            <div class=" p-2 text-gray-500">
                {{$profile->agency->region->name}}
            </div>
        </div>
        <div class="grid grid-cols-[5fr,2fr,8fr] gap-2 border-b border-gray-700 w-2/3 m-auto">
            <div class=" p-2 text-gray-600 dark:text-gray-400">
                RRDCC Chair:
            </div>
            <div class=" p-2">
                <button class=" text-blue-500">
                    Edit
                    <span class="fa-solid fa-edit m-s-2 "></span>
                </button>
            </div>
            <div class=" p-2 text-gray-500">
                @if($profile->rrdc_chair)
                    {{$profile->rrdc_chair}}
                @else
                    No data available
                @endif

            </div>
        </div>
        <div class="grid grid-cols-[5fr,2fr,8fr] gap-2 border-b border-gray-700 w-2/3 m-auto">
            <div class=" p-2 text-gray-600 dark:text-gray-400">
                Consortium Director:
            </div>
            <div class=" p-2">
                <button class=" text-blue-500">
                    Edit
                    <span class="fa-solid fa-edit m-s-2 "></span>
                </button>
            </div>
            <div class=" p-2 text-gray-500">
                @if($profile->consortium_dir)
                    {{$profile->consortium_dir}}
                @else
                    No data available
                @endif
            </div>
        </div>
        <div class="grid grid-cols-[5fr,2fr,8fr] gap-2 border-b border-gray-700 w-2/3 m-auto">
            <div class=" p-2 text-gray-600 dark:text-gray-400">
                Agency:
            </div>
            <div class=" p-2">
                <button class=" text-blue-500">
                    Edit
                    <span class="fa-solid fa-edit m-s-2 "></span>
                </button>
            </div>
            <div class=" p-2 text-gray-500">
                {{$profile->agency->name}}
            </div>
        </div>
        <div class="grid grid-cols-[5fr,2fr,8fr] gap-2 border-b border-gray-700 w-2/3 m-auto">
            <div class=" p-2 text-gray-600 dark:text-gray-400">
                Agency head:
            </div>
            <div class=" p-2">
                <button class=" text-blue-500">
                    Edit
                    <span class="fa-solid fa-edit m-s-2 "></span>
                </button>
            </div>
            <div class=" p-2 text-gray-500">
                @if(count($profile->agency->head)>0)
                    {{$profile->agency->head[0]->head}}
                @else
                    No data available
                @endif
            </div>
        </div>
        <div class="grid grid-cols-[5fr,2fr,8fr] gap-2 border-b border-gray-700 w-2/3 m-auto">
            <div class=" p-2 text-gray-600 dark:text-gray-400">
                Office Address:
            </div>
            <div class=" p-2">
                <button class=" text-blue-500">
                    Edit
                    <span class="fa-solid fa-edit m-s-2 "></span>
                </button>
            </div>
            <div class=" p-2 text-gray-500">
                @if($profile->office_address)
                    {{$profile->office_address}}
                @else
                    No data available
                @endif
            </div>
        </div>
        <div class="grid grid-cols-[5fr,2fr,8fr] gap-2 border-b border-gray-700 w-2/3 m-auto">
            <div class=" p-2 text-gray-600 dark:text-gray-400">
                Contact Details:
            </div>
            <div class=" p-2">
                <button class=" text-blue-500">
                    Edit
                    <span class="fa-solid fa-edit m-s-2 "></span>
                </button>
            </div>
            <div class=" p-2 text-gray-500">
                @if($profile->contact->count() > 0)
                    <ul>
                        @if($profile->contact->where("contact_type","mobile")->count() > 0)
                            <li class="list-group-item mt-2">
                                <label class="text-gray-700 dark:text-gray-400">
                                    <span class="fa-solid fa-mobile-retro me-2"></span>Mobile
                                </label>
                                <ul class="list-group">
                                    @foreach ($profile->contact->where("contact_type","mobile") as $contact)
                                        <li class="indent-5">
                                            {{$contact->contact}}
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                        @if($profile->contact->where("contact_type","phone")->count() > 0)
                            <li class="list-group-item  mt-3">
                                <label class="text-gray-700 dark:text-gray-400">
                                    <span class="fa-solid fa-phone-square me-2"></span>Phone
                                </label>
                                <ul class="list-group">
                                    @foreach ($profile->contact->where("contact_type","phone") as $contact)
                                        <li class="indent-5">
                                            {{$contact->contact}}
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                        @if($profile->contact->where("contact_type","fax")->count() > 0)
                            <li class="list-group-item  mt-3">
                                <label class="text-gray-700 dark:text-gray-400">
                                    <span class="fa-solid fa-fax me-2"></span>Fax
                                </label>
                                <ul class="list-group">
                                    @foreach ($profile->contact->where("contact_type","fax") as $contact)
                                        <li class="indent-5">
                                            {{$contact->contact}}
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                        @if($profile->contact->where("contact_type","email")->count() > 0)
                            <li class="list-group-item  mt-3">
                                <label class="text-gray-700 dark:text-gray-400">
                                    <span class="fa-solid fa-at me-2"></span>Email
                                </label>
                                <ul class="list-group">
                                    @foreach ($profile->contact->where("contact_type","email") as $contact)
                                        <li class="indent-5">
                                            {{$contact->contact}}
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif

                    </ul>

                @else
                    No data available
                @endif
            </div>
        </div>
        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

        <div class="grid grid-cols-[5fr,2fr,8fr] gap-2 border-b border-gray-700 w-2/3 m-auto">
            <div class=" p-2 text-gray-600 dark:text-gray-400">
                Project Leader:
            </div>
            <div class=" p-2">
                <button class=" text-blue-500">
                    Edit
                    <span class="fa-solid fa-edit m-s-2 "></span>
                </button>
            </div>
            <div class=" p-2 text-gray-500">
                @if($profile->project_leader)
                    {{$profile->project_leader}}
                @else
                    No data available
                @endif
            </div>
        </div>
        <div class="grid grid-cols-[5fr,2fr,8fr] gap-2 border-b border-gray-700 w-2/3 m-auto">
            <div class=" p-2 text-gray-600 dark:text-gray-400">
                Manager:
            </div>
            <div class=" p-2">
                <button class=" text-blue-500">
                    Edit
                    <span class="fa-solid fa-edit m-s-2 "></span>
                </button>
            </div>
            <div class=" p-2 text-gray-500">
                @if($profile->manager)
                    {{$profile->manager}}
                @else
                    No data available
                @endif
            </div>
        </div>
        <div class="grid grid-cols-[5fr,2fr,8fr] gap-2 border-b border-gray-700 w-2/3 m-auto">
            <div class=" p-2 text-gray-600 dark:text-gray-400">
                year_established:
            </div>
            <div class=" p-2">
                <button class=" text-blue-500">
                    Edit
                    <span class="fa-solid fa-edit m-s-2 "></span>
                </button>
            </div>
            <div class=" p-2 text-gray-500">
                @if($profile->year_established)
                    {{$profile->year_established}}
                @else
                    No data available
                @endif
            </div>
        </div>
        <div class="grid grid-cols-[5fr,2fr,8fr] gap-2 border-b border-gray-700 w-2/3 m-auto">
            <div class=" p-2 text-gray-600 dark:text-gray-400">
                IP Policy:
            </div>
            <div class=" p-2">
                <button class=" text-blue-500">
                    Edit
                    <span class="fa-solid fa-edit m-s-2 "></span>
                </button>
            </div>
            <div class=" p-2 text-gray-500">
                @if($profile->ip_policy)
                    <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 16 12">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M1 5.917 5.724 10.5 15 1.5"/>
                    </svg>
                @else
                    <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="m9.414 8 5.293-5.293a1 1 0 1 0-1.414-1.414L8 6.586 2.707 1.293a1 1 0 0 0-1.414 1.414L6.586 8l-5.293 5.293a1 1 0 1 0 1.414 1.414L8 9.414l5.293 5.293a1 1 0 0 0 1.414-1.414L9.414 8Z"/>
                    </svg>
                @endif
            </div>
        </div>
        <div class="grid grid-cols-[5fr,2fr,8fr] gap-2 border-b border-gray-700 w-2/3 m-auto">
            <div class=" p-2 text-gray-600 dark:text-gray-400">
                Tech Transfer:
            </div>
            <div class=" p-2">
                <button class=" text-blue-500">
                    Edit
                    <span class="fa-solid fa-edit m-s-2 "></span>
                </button>
            </div>
            <div class=" p-2 text-gray-500">
                @if($profile->techno_transfer)
                    <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 16 12">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M1 5.917 5.724 10.5 15 1.5"/>
                    </svg>
                @else
                    <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="m9.414 8 5.293-5.293a1 1 0 1 0-1.414-1.414L8 6.586 2.707 1.293a1 1 0 0 0-1.414 1.414L6.586 8l-5.293 5.293a1 1 0 1 0 1.414 1.414L8 9.414l5.293 5.293a1 1 0 0 0 1.414-1.414L9.414 8Z"/>
                    </svg>
                @endif
            </div>
        </div>
    </div>

@endsection

<x-sticky-navigation class="py-3">
    <x-slot:left_nav>
        <div class="flex justify-start items-baseline gap-6">
            <a href="{{route("abh.staff.profile.all_profile")}}">
                <button class="text-sky-500">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                </button>
            </a>
            <div class="text-xl text-gray-600 dark:text-gray-500">
                {{$profile->agency->region->name}}
            </div>
            <div class="text-base text-gray-700 dark:text-gray-400">
                {{$profile->agency->name}}
            </div>
        </div>



    </x-slot:left_nav>


</x-sticky-navigation>

<div class=" md:px-4">
    <div class="my-14">
        <x-grid col="3" gap="4">
            <div>
                <x-pop-modal name="openLogoAbh" class="max-w-3xl">
                    <div class="aspect-square w-full">
                        <div class="w-full h-full group-hover:scale-110 transition duration-300 flex justify-center items-center">
                            <img class="max-w-full w-auto max-h-full h-auto" src="{{Storage::url($profile->logo)}}" alt="Profile logo">
                        </div>
                    </div>
                </x-pop-modal>
                <div data-modal-toggle="openLogoAbh" data-modal-target="openLogoAbh" class="aspect-square group cursor-pointer  border border-gray-300 overflow-hidden dark:border-gray-600 md:rounded p-2">
                    <div class="w-full h-full group-hover:scale-110 transition duration-300 flex justify-center items-center">
                        <img class="max-w-full w-auto max-h-full h-auto" src="{{Storage::url($profile->logo)}}">
                    </div>
                </div>
            </div>
            <div class="md:col-span-2 flex justify-start items-center bg-gray-300 dark:bg-gray-950 rounded bg-opacity-60 p-4">
                <div class="max-w-full w-auto text text-lg font-medium text-gray-800 dark:text-gray-300">
                    {{$profile->tag_line}} kasjdhbkasdjnjlas dsaoidjasldkjas;d sapdojaspdlk; asjdaskl;dk;l saldja;sldkas;d
                </div>
            </div>
        </x-grid>
    </div>
    <x-header-label class="mb-2">
        {{$profile->agency->name}} Profile
    </x-header-label>
    <div class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-x-14">
            <div class="space-y-4">
                <x-card-panel title="Profile Information">
                    <div class="space-y-4">
                        <div class="divide-y divide-200 dark:divide-gray-700">
                            @if($profile->office_address)
                                <span class="text-gray-700 dark:text-gray-200">
                                    {{$profile->office_address}}
                                </span>

                            @else
                                <span class="text-gray-500 font-bold">
                                    No Data Available
                                </span>
                            @endif
                            <div class="text-gray-500 border-t border-gray-500">
                                Office Address
                            </div>
                        </div>
                        <div class="divide-y divide-200 dark:divide-gray-700">
                            @if($profile->project_leader)
                                <span class="text-gray-700 dark:text-gray-200">
                                    {{$profile->project_leader}}
                                </span>
                            @else
                                <span class="text-gray-500 font-bold">
                                    No Data Available
                                </span>
                            @endif
                            <div class="text-gray-500 border-t border-gray-500">
                                Project Leader
                            </div>
                        </div>
                        <div class="divide-y divide-200 dark:divide-gray-700">
                            @if($profile->manager)
                                <span class="text-gray-700 dark:text-gray-200">
                                    {{$profile->manager}}
                                </span>
                            @else
                                <span class="text-gray-500 font-bold">
                                    No Data Available
                                </span>
                            @endif
                            <div class="text-gray-500 border-t border-gray-500">
                                Project Manager
                            </div>
                        </div>
                        <div class="divide-y divide-200 dark:divide-gray-700">
                            @if($profile->manager)
                                <span class="text-gray-700 dark:text-gray-200">
                                    {{$profile->manager}}
                                </span>
                            @else
                                <span class="text-gray-500 font-bold">
                                    No Data Available
                                </span>
                            @endif
                            <div class="text-gray-500 border-t border-gray-500">
                                IP-TBM Manager
                            </div>
                        </div>
                        <div class="divide-y divide-200 dark:divide-gray-700">
                            @if($profile->year_established)
                                <span class="text-gray-700 dark:text-gray-200">
                                    {{$profile->year_established}}
                                </span>
                            @else
                                <span class="text-gray-500 font-bold">
                                    No Data Available
                                </span>
                            @endif
                            <div class="text-gray-500 border-t border-gray-500">
                                Year Established
                            </div>
                        </div>
                        <div class="divide-y divide-200 dark:divide-gray-700">
                            @if($profile->ip_policy)
                                <span class="text-gray-700 dark:text-gray-200">
                                   YES
                                </span>
                            @else
                                <span class="text-red-700">
                                   NO
                                </span>
                            @endif
                            <div class="text-gray-500 border-t border-gray-500">
                                Availability of IP Policy
                            </div>
                        </div>
                        <div class="divide-y divide-200 dark:divide-gray-700">
                            @if($profile->techno_transfer)
                                <span class="text-gray-700 dark:text-gray-200">
                                   YES
                                </span>
                            @else
                                <span class="text-red-500">
                                   NO
                                </span>
                            @endif
                            <div class="text-gray-500 border-t border-gray-500">
                                Availability of Technology Transfer Protocol
                            </div>
                        </div>

                    </div>
                </x-card-panel>
                <x-card-panel title="ABH Contact Details">
                    <div class="divide-y divide-200 dark:divide-gray-700">
                        @if($profile->contacts_mobiles->count()>0)
                            <div class="mt-2">
                                <h1 class="font-bold text-gray-600 dark:text-gray-500">
                                    <span class="fa-solid fa-mobile-retro me-2"></span> Mobile Number
                                </h1>
                                <ul class="ms-4 list-disc ps-4">
                                    @foreach($profile->contacts_mobiles as $contact)
                                        <li >
                                            {{$contact->contact}}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        @endif
                        @if($profile->contacts_phones->count()>0)
                            <div class="mt-2">
                                <h1 class="font-bold text-gray-600 dark:text-gray-500">
                                    <span class="fa-solid fa-phone-square me-2"></span> Phone Number
                                </h1>
                                <ul class="ms-4 list-disc ps-4">
                                    @foreach($profile->contacts_phones as $contact)
                                        <li class="text-gray-700 dark:text-gray-300">
                                            {{$contact->contact}}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        @endif
                        @if($profile->contacts_faxes->count()>0)
                            <div class="mt-2">
                                <h1 class="font-bold text-gray-600 dark:text-gray-500">
                                    <span class="fa-solid fa-fax me-2"></span> Fax Number
                                </h1>
                                <ul class="ms-4 list-disc ps-4">
                                    @foreach($profile->contacts_faxes as $contact)
                                        <li class="text-gray-700 dark:text-gray-300">
                                            {{$contact->contact}}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        @endif
                        @if($profile->contacts_emails->count()>0)
                            <div class="mt-2">
                                <h1 class="font-bold text-gray-600 dark:text-gray-500">
                                    <span class="fa-solid fa-at me-2"></span> Email Address
                                </h1>
                                <ul class="ms-4 list-disc ps-4">
                                    @foreach($profile->contacts_emails as $contact)
                                        <li class="text-gray-700 dark:text-gray-300">
                                            {{$contact->contact}}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        @endif
                    </div>

                </x-card-panel>
            </div>
            <div class="space-y-4">
                <x-card-panel title="ABH Projects">
                    @if($profile->projects->count()>0)
                        <ul class="space-y-4">
                            @foreach($profile->projects->take(5) as $project)
                                <li class="text-gray-700 dark:text-gray-400">
                                    <div class="border border-200 dark:border-gray-700 rounded p-2">
                                        {{$project->project_name}}
                                        <div class="divide-y mt-2 divide-gray-200 dark:divide-gray-700 w-fit">
                                            <div class="font-medium">
                                                {{$project->project_leader}}
                                            </div>
                                            <div >
                                                Project Leader
                                            </div>
                                        </div>
                                        <div class="divide-y mt-2 divide-gray-200 dark:divide-gray-700 w-fit">
                                            <div class="font-medium">

                                                <i class="fa-solid fa-peso-sign"></i>

                                                {{number_format($project->year_implemented->sum('budget'),2)}}
                                            </div>
                                            <div >
                                                Total Budget
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="font-bold text-gray-500">
                            No Data Available
                        </div>
                    @endif
                    <x-slot:footer>
                        <x-pop-modal>

                        </x-pop-modal>

                        <a href="{{route("abh.staff.profile.projects-list",['profile'=>$profile])}}" class="inline-flex items-center justify-center p-1 text-base font-medium text-sky-500 rounded-lg bg-gray-50 hover:text-sky-900 hover:bg-gray-100 dark:text-sky-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="w-full">View all projects</span>
                            <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </x-slot:footer>
                </x-card-panel>
                <x-card-panel title="Region Details">
                    <div class="space-y-4">
                        <div class="divide-y divide-200 dark:divide-gray-700">
                            @if($profile->rrdcc_chair)
                                <span class="text-gray-700 dark:text-gray-200">
                                    {{$profile->rrdcc_chair}}
                                </span>
                            @else
                                <span class="text-gray-500 font-bold">
                                    No Data Available
                                </span>
                            @endif
                            <div class="text-gray-500 border-t border-gray-500">
                                RRDCC Chair
                            </div>
                        </div>
                        <div class="divide-y divide-200 dark:divide-gray-700">
                            @if($profile->consortium_director)
                                <span class="text-gray-700 dark:text-gray-200">
                                    {{$profile->consortium_director}}
                                </span>
                            @else
                                <span class="text-gray-500 font-bold">
                                    No Data Available
                                </span>
                            @endif
                            <div class="text-gray-500 border-t border-gray-500">
                                Consortium Director
                            </div>
                        </div>
                    </div>
                </x-card-panel>
                <x-card-panel title="Agency Details">
                    <div class="space-y-4">
                        <div class="divide-y divide-200 dark:divide-gray-700">
                            @if($profile->agency)
                                <span class="text-gray-700 dark:text-gray-200">
                                    {{$profile->agency->name}}
                                </span>
                            @else
                                <span class="text-gray-500 font-bold">
                                    No Data Available
                                </span>
                            @endif
                            <div class="text-gray-500 border-t border-gray-500">
                                Agency
                            </div>
                        </div>
                        <div class="divide-y divide-200 dark:divide-gray-700">
                            @if($profile->agency)
                                <span class="text-gray-700 dark:text-gray-200">
                                    {{$profile->agency->head}}
                                </span>
                            @else
                                <span class="text-gray-500 font-bold">
                                    No Data Available
                                </span>
                            @endif
                            <div class="text-gray-500 border-t border-gray-500">
                                Agency head
                            </div>
                        </div>
                    </div>
                </x-card-panel>
            </div>
        </div>
    </div>
</div>

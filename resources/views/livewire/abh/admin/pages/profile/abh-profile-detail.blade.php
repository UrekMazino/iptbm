<div>
    <nav
        class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="block md:flex justify-between items-center">
                <div class="ps-4 py-2">
                    <x-link-button :url="route('abh.admin.my_profile')" class="text-sky-500 dark:text-sky-500">
                        Back to Profiles
                    </x-link-button>
                </div>
            </div>

        </nav>

    </nav>
    <div class=" md:px-4">
        <x-header-label class="mt-10">
            IP-TBM Profile Details

        </x-header-label>
        <div class="mt-2">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 relative border border-gray-300 dark:border-gray-700 md:p-4 rounded overflow-hidden">
                <img  class="hidden md:block absolute top-0 m-auto object-cover opacity-25 blur-sm  w-full  h-full left-0" src="{{asset('assets/logo/iptbm.ico')}}">
                <div class="relative aspect-square">
                    <div class="p-2  absolute left-0 top-0 bottom-0 m-auto w-full flex justify-center items-center  md:rounded overflow-hidden md:shadow-lg md:shadow-black backdrop-blur-xl">
                        @if($profile->logo)
                            <img  class="max-w-full max-h-full h-auto w-auto" src="{{Storage::url($profile->logo)}}">
                        @else
                            <img  class="max-w-full max-h-full h-auto w-auto" src="{{asset('assets/icon/profile-blank.png')}}">
                        @endif
                    </div>
                </div>
                <div class="md:col-span-2 relative py-4">
                    <div class="w-full h-full flex justify-center items-center">
                        <div class="bg-gray-950 bg-opacity-20 dark:bg-opacity-20 p-4 w-full font-medium text-xl">
                           @if($profile->tag_line)
                               {{$profile->tag_line}}
                            @else
                               <p class="text-gray-700 dark:text-white">
                                   Update tag line
                               </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <div class="mt-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10">
                <div>
                    <x-card-panel title="Profile Details">
                        <div>

                            <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                                <div class="flex flex-col pb-3">
                                    <dt class="mb-1 text-gray-500  dark:text-gray-400">Region</dt>
                                    <dd class=" font-semibold">
                                        <a href="{{route("abh.admin.all_regions.details",['region'=>$profile->agency->region->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            {{$profile->agency->region->name}}
                                        </a>

                                    </dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500  dark:text-gray-400">Agency</dt>
                                    <dd class=" font-semibold">
                                        <a href="{{route("abh.admin.all_agencies.updates",['agency'=>$profile->agency->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            {{$profile->agency->name}}
                                        </a>

                                    </dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500  dark:text-gray-400">Office Address</dt>
                                    <dd class=" font-semibold">
                                    @if($profile->office_address)
                                            {{$profile->office_address}}
                                    @else
                                        <p class="font-normal">
                                            No data available
                                        </p>
                                    @endif
                                    </dd>
                                </div>
                                <div class="flex flex-col py-3">
                                    <dt class="mb-1 text-gray-500  dark:text-gray-400">Project Leader</dt>
                                    <dd class=" font-semibold">
                                        @if($profile->project_leader)
                                            {{$profile->project_leader}}
                                        @else
                                            <p class="font-normal">
                                                No data available
                                            </p>
                                        @endif
                                    </dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500  dark:text-gray-400">ABH Manager</dt>
                                    <dd class="font-semibold">
                                        @if($profile->manager)
                                            {{$profile->manager}}
                                        @else
                                            <p class="font-normal">
                                                No data available
                                            </p>
                                        @endif
                                    </dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500  dark:text-gray-400">Year Established</dt>
                                    <dd class=" font-semibold">
                                        @if($profile->year_established)
                                            {{$profile->year_established}}
                                        @else
                                            <p class="font-normal">
                                                No data available
                                            </p>
                                        @endif
                                    </dd>
                                </div>

                            </dl>
                            <div class="mt-10">
                                <x-item-header>
                                    Contact Information
                                </x-item-header>
                                <div class="mt-3">

                                        <ul class="space-y-4 text-gray-500  text-sm list-inside dark:text-gray-400">
                                            @if($profile->contacts_mobiles->count() > 0)
                                                <li>

                                                    <div class="text-gray-800 dark:text-white">
                                                        Mobile
                                                    </div>
                                                    <ul class="ps-5 mt-2 text-xs  space-y-1 list-disc list-inside">
                                                        @foreach($profile->contacts_mobiles as $contact)
                                                            <li>
                                                                {{$contact->contact}}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endif
                                                @if($profile->contacts_phones->count() > 0)
                                                    <li>
                                                        Phone
                                                        <ul class="ps-5 mt-2 space-y-1 text-xs list-disc list-inside">
                                                            @foreach($profile->contacts_phones as $contact)
                                                                <li>
                                                                    {{$contact->contact}}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endif
                                                @if($profile->contacts_faxes->count() > 0)
                                                    <li>
                                                        Fax
                                                        <ul class="ps-5 mt-2 text-xs  space-y-1 list-disc list-inside">
                                                            @foreach($profile->contacts_faxes as $contact)
                                                                <li>
                                                                    {{$contact->contact}}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endif
                                                @if($profile->contacts_emails->count() > 0)
                                                    <li>
                                                        Email
                                                        <ul class="ps-5 mt-2  text-xs space-y-1 list-disc list-inside">
                                                            @foreach($profile->contacts_emails as $contact)
                                                                <li>
                                                                    {{$contact->contact}}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endif
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </x-card-panel>
                </div>
                <div>
                    <div class="space-y-5">
                        <x-card-panel title="Projects">
                           <div class="space-y-4 divide-y divide-gray-200 dark:divide-gray-600">
                               @forelse($profile->projects as $project)
                                 <div class="space-y-2">
                                     <div>
                                         <div>
                                             Project Name :
                                         </div>
                                         <div class="font-medium text-gray-700 dark:text-white">
                                             {{__($project->project_name)}}
                                         </div>
                                     </div>
                                     <div>
                                         <div>
                                             Project Leader :
                                         </div>
                                         <div class="font-medium text-gray-700 dark:text-white">
                                             {{__($project->project_leader)}}
                                         </div>
                                     </div>
                                     <div>
                                         <div>
                                             PApproved date of Implementation :
                                         </div>
                                         <div class="font-medium text-gray-700 dark:text-white">
                                             {{$project->implementation_period}}
                                         </div>
                                     </div>
                                 </div>
                               @empty
                                   No data available
                               @endforelse
                           </div>
                        </x-card-panel>
                        <x-card>
                            <div class="space-y-4 ">
                                <div class="border border0gray-200 dark:border-gray-700 p-2 rounded">
                                <span>
                                    IP Policy :
                                </span>
                                    @if($profile->ip_policy)
                                        <span class="text-sky-900 dark:text-sky-100 font-medium">
                                        YES
                                    </span>
                                    @else
                                        <span class="font-medium text-red-500 dark:text-red-500">
                                        No
                                    </span>
                                    @endif
                                    <span>

                                </span>
                                </div>
                                <div class="border border0gray-200 dark:border-gray-700 p-2 rounded">
                                <span>
                                    Tech Transfer Protocol :
                                </span>
                                    @if($profile->techno_transfer)
                                        <span class="text-sky-900 dark:text-sky-100 font-medium">
                                        YES
                                    </span>
                                    @else
                                        <span class="font-medium text-red-500 dark:text-red-500">
                                        No
                                    </span>
                                    @endif
                                    <span>

                                </span>
                                </div>
                            </div>

                        </x-card>
                        <x-card-panel title="Users account">
                            <x-slot:icon>
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 20a8 8 0 0 1-5-1.8v-.6c0-1.8 1.5-3.3 3.3-3.3h3.4c1.8 0 3.3 1.5 3.3 3.3v.6a8 8 0 0 1-5 1.8ZM2 12a10 10 0 1 1 10 10A10 10 0 0 1 2 12Zm10-5a3.3 3.3 0 0 0-3.3 3.3c0 1.7 1.5 3.2 3.3 3.2 1.8 0 3.3-1.5 3.3-3.3C15.3 8.6 13.8 7 12 7Z" clip-rule="evenodd"/>
                                </svg>
                            </x-slot:icon>
                            <ul class="divide-y divide-gray-200 dark:divide-gray-600">
                                @forelse($profile->users as $user)
                                    <li>

                                        <a href="{{route('abh.admin.all_accounts_details',['account'=>$user->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <div>
                                                {{$user->name}}
                                            </div>
                                            <div>
                                                {{$user->email}}
                                            </div>
                                        </a>
                                    </li>
                                @empty
                                    No data available
                                @endforelse
                            </ul>
                        </x-card-panel>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

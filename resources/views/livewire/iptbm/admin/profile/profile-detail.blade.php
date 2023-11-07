<div class="grid grid-cols-1 md:grid-cols-2  mt-4 gap-4">
    <div class="space-y-4">
        <x-card class="shadow-lg">
            <x-item-header>
                Profile Details
            </x-item-header>
            <div class="mt-4 space-y-4">
                <div>
                    <div class="text-lg text-gray-700 dark:text-gray-300">
                        {{$profile->office_address}}
                    </div>
                    Office Address
                </div>
                <div>
                    <div>
                        @if($profile->project_leader)
                            <div class="text-lg text-gray-700 dark:text-gray-300">
                                {{$profile->project_leader}}
                            </div>
                        @else
                            No data available
                        @endif
                    </div>
                    Project Leader
                </div>
                <div>
                    <div>
                        @if($profile->manager)
                            <div class="text-lg text-gray-700 dark:text-gray-300">
                                {{$profile->manager}}
                            </div>
                        @else
                            No data available
                        @endif
                    </div>
                    Ip-TBM Manager
                </div>
                <div>
                    <div>
                        @if($profile->year_established)
                            <div class="text-lg text-gray-700 dark:text-gray-300">
                                {{$profile->year_established}}
                            </div>
                        @else
                            No data available
                        @endif
                    </div>
                    Year Established
                </div>
            </div>
        </x-card>
        <x-card class="shadow-lg">
            <x-item-header>
                Region Details
            </x-item-header>
            <div class="mt-4 space-y-4">
                <div>
                    <div class="text-lg text-gray-700 dark:text-gray-300">
                        {{$profile->agency->region->name}}
                    </div>
                    Region name
                </div>
                <div>
                    <div>
                        @if($profile->rrdc_chair)
                            <div class="text-lg text-gray-700 dark:text-gray-300">
                                {{$profile->rrdc_chair}}
                            </div>
                        @else
                            No data available
                        @endif
                    </div>
                    RRDCC Chair
                </div>
                <div>
                    <div>
                        @if($profile->consortium_dir)
                            <div class="text-lg text-gray-700 dark:text-gray-300">
                                {{$profile->consortium_dir}}
                            </div>
                        @else
                            No data available
                        @endif
                    </div>
                    Consortium Director
                </div>
            </div>
        </x-card>
        <x-card class="shadow-lg">
            <x-item-header>
                Agency Details
            </x-item-header>
            <div class="mt-4 space-y-4">
                <div>
                    <div class="text-lg text-gray-700 dark:text-gray-300">
                        {{$profile->agency->name}}
                    </div>
                    Agency
                </div>
                <div>
                    <div>
                        @if($profile->agency->head)
                            <div class="text-lg text-gray-700 dark:text-gray-300">
                                {{$profile->agency->head->head}}
                            </div>
                        @else
                            No data available
                        @endif
                    </div>
                    Agency Head
                </div>

            </div>
        </x-card>
    </div>
    <div class="space-y-4">
        <x-card class="shadow-lg">
           <x-item-header>
               IP-TBM Projects
           </x-item-header>
            <div class="mt-4 space-y-4">
                <ul>
                    @foreach($profile->projects as $project)
                        <li class="py-2">
                            <x-card class="space-y-4 ">
                               <div >
                                   <div class="text-lg text-gray-700 dark:text-gray-300">

                                       <a href="{{route("iptbm.admin.iptbm_profiles.profile-projects")}}" class="font-medium text-sky-500 dark:text-sky-500 hover:underline">
                                           {{$project->project_name}}
                                       </a>


                                   </div>
                                   Project Title
                               </div>
                                <div >
                                    <div class="text-lg text-gray-700 dark:text-gray-300">
                                        {{$project->project_leader}}
                                    </div>
                                    Project Leader
                                </div>
                                <div >
                                    <div class="text-lg">
                                        Total budget:
                                               <span class="font-medium text-gray-700 dark:text-gray-300">

                                                    <span class="fa-solid fa-peso-sign"></span>
                                                    {{number_format($project->projectDetails->sum('year_budget'),'2')}}
                                                </span>
                                    </div>
                                </div>


                            </x-card>
                        </li>
                    @endforeach
                </ul>
            </div>
       </x-card>
        <x-card class="shadow-lg">
            <div class="space-y-4">
                <x-item-header>
                    IP Policy :
                    @if($profile->ip_policy)
                        <span class=" ms-2 text-sky-500">
                            Yes
                        </span>
                    @else
                        <span class="ms-2 text-red-600">
                            No
                        </span>
                    @endif

                </x-item-header>
                <x-item-header>
                    Tech Transfer Protocol:
                    @if($profile->techno_transfer)
                        <span class=" ms-2 text-sky-500">
                            Yes
                        </span>
                    @else
                        <span class="ms-2 text-red-600">
                            No
                        </span>
                    @endif
                </x-item-header>
            </div>
        </x-card>
        <x-card class="shadow-lg">
           <x-item-header>
               Contact Details
           </x-item-header>
            <div class="space-y-2 mt-4" >
                @if($profile->contact->where('contact_type','mobile')->count()>0)

                   <div>
                       <x-input-label value="Mobile"/>
                       <ul>

                           @foreach($profile->contact->where('contact_type','mobile') as $val)
                               <li>
                                   {{$val->contact}}
                               </li>
                           @endforeach
                       </ul>
                   </div>

                @endif
                    @if($profile->contact->where('contact_type','phone')->count()>0)

                        <div>
                            <x-input-label value="Phone number"/>
                            <ul>
                                @foreach($profile->contact->where('contact_type','phone') as $val)
                                    <li>
                                        {{$val->contact}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    @endif
                    @if($profile->contact->where('contact_type','fax')->count()>0)

                        <div>
                            <x-input-label value="Fax Number"/>
                            <ul>
                                @foreach($profile->contact->where('contact_type','email') as $val)
                                    <li>
                                        {{$val->contact}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    @endif
                @if($profile->contact->where('contact_type','email')->count()>0)

                      <div>
                          <x-input-label value="Email address"/>
                          <ul>
                              @foreach($profile->contact->where('contact_type','email') as $val)
                                  <li>
                                      {{$val->contact}}
                                  </li>
                              @endforeach
                          </ul>
                      </div>
                    @endif
            </div>
        </x-card>
    </div>

</div>

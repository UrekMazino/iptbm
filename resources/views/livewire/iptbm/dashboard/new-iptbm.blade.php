<div class="rounded-lg bg-gray-50 dark:bg-gray-700 w-full h-full p-2">
    <h1 class="text-gray-700 dark:text-gray-300 mt-2 font-medium text-lg">
        Recently added IP-TBMs
    </h1>
    <div class="mt-2 w-full h-3/4 overflow-y-auto ">
        <ul class="list-none space-y-3">
            @foreach($iptbmProfile->take(5) as $profile)
                <li>
                    <div class="text-gray-600 dark:text-gray-400">


                        <div>
                            <a href="{{route("iptbm.staff.viewProfile",['id'=>$profile->id])}}" class="font-medium text-sky-600 dark:text-sky-500 hover:underline">
                                {{$profile->agency->name}}
                            </a>
                        </div>
                       <div class="text-sm">
                           {{\Carbon\Carbon::parse($profile->created_at)->format('F-d-Y')}}
                       </div>

                    </div>

                </li>
            @endforeach
        </ul>

    </div>
</div>

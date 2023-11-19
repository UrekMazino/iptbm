<x-card>
   <x-item-header>
       Recently added IP-TBMs
   </x-item-header>
    <div class="mt-4 w-full h-3/4 overflow-y-auto ">
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
</x-card>

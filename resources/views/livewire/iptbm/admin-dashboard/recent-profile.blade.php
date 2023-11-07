<x-card class="h-full relative">
    <x-item-header>
        Recently added IP-TBMs
    </x-item-header>
    <div class="mt-2 w-full h-full overflow-y-auto mt-5 ">
        <ul class="space-y-2">
            @foreach($profiles as $profile)
                <li>
                   <x-input-label>

                       <a href="{{route("iptbm.admin.iptbm_profiles.view-profile",['profile'=>$profile])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                           {{$profile->agency->name}}
                       </a>
                       <div class="text-xs">
                           {{\Carbon\Carbon::parse($profile->created_at)->format("F-d-Y")}}
                       </div>
                   </x-input-label>
                </li>
            @endforeach
        </ul>
    </div>
</x-card>

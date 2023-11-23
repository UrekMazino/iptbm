<div>
    <div
        class="flex justify-content-center items-center aspect-square shadow shadow-gray-50a border-l border-r border-t border-b rounded-lg border-gray-400 dark:border-gray-600 overflow-hidden">

        <a href="{{route("iptbm.staff.viewProfile",['id'=>$profile->id])}}">
            @if($profile->logo)
                @if(Storage::exists($profile->logo))
                    <img src="{{Storage::url($profile->logo)}}"
                         class="w-auto h-auto hover:scale-110 duration-300 transition" alt="iptbm profile">
                @else
                    <div class="w-ful h-full">

                    </div>
                @endif
            @endif

        </a>

    </div>
    <div class="mt-2">
        <div class="text-gray-600 dark:text-gray-400">


            <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
               href="{{route("iptbm.staff.viewProfile",['id'=>$profile->id])}}">
                {{$profile->agency->name}}
            </a>


        </div>
    </div>
</div>

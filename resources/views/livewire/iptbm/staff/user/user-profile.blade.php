
<div class="divide-y divide-gray-500 dark:divide-gray-400">
    <div class="w-3/4 mx-auto">
        <div class="aspect-square rounded-full overflow-hidden">
            <div class="flex justify-center items-center w-fit h-full">
                @if($user->profile->logo)
                    <img class="max-w-full w-auto h-auto" src="{{Storage::url($user->profile->logo)}}">
                @else
                    <img class="max-w-full w-auto h-auto" src="{{asset('assets/icon/profile-blank.png')}}">
                @endif

            </div>
        </div>
    </div>
    <div class="py-2">
        <div class="flex justify-center items-center">
            <div class="text-gray-600 dark:text-gray-200">
                {{$user->profile->agency->name}}
            </div>
        </div>

    </div>

</div>

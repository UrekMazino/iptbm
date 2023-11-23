<div>
    <x-item-header>
        Pre Commercialization
    </x-item-header>
    <ul class="mb-2">

        @foreach($precom as $val)
            <li>
                <a href="{{route('iptbm.staff.precom.details',['id'=>$val->id])}}"
                   class="font-normal text-sky-500 dark:text-sky-400 hover:underline">
                    {{$val->created_at->format('F-d-Y')}}
                </a>
            </li>
        @endforeach
    </ul>

    <a href="{{route("iptbm.staff.precom.index")}}"
       class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
        See more...
    </a>


</div>

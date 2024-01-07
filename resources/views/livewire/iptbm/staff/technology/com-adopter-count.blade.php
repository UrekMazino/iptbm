<div class="border border-gray-200 dark:border-gray-600 rounded p-2">

    <x-item-header>
        Commercialization Adopte
    </x-item-header>
    <ul class="mb-2">
        @foreach($adopter->take(5) as $val)
            <li>
                <a href="{{route('iptbm.staff.commercialization.adoptedTech',['id'=>$val->id])}}"
                   class="font-normal text-sky-500 dark:text-sky-400 hover:underline">
                    {{$val->company_name}}
                </a>
            </li>
        @endforeach
    </ul>
    <a href="{{route("iptbm.staff.adopter.index")}}"
       class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
        See more...
    </a>
</div>

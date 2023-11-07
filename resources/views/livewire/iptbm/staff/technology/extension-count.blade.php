

<div class="mt-5">

    <x-item-header>
        Extension
    </x-item-header>
    <ul class="mb-2">
        @foreach($extension->take(5) as $val)
            <li>
                <a href="{{route('iptbm.staff.extension.view_tech',['id'=>$val->id])}}" class="font-normal text-sky-500 dark:text-sky-400 hover:underline">
                    {{$val->adoptor_name}}
                </a>
            </li>
        @endforeach
    </ul>
    <a href="{{route("iptbm.staff.extension.index")}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
        See more...
    </a>
</div>

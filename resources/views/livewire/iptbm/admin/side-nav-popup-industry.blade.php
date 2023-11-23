<div>
    <x-card>
        <ul class="divide-y divide-gray-400 dark:divide-gray-600">
            @foreach($industries as $industry)
                <li class="py-2">
                    <a href="{{ route($route,['industry'=>$industry->id]) }}"
                       class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        {{$industry->name}}
                    </a>

                </li>
            @endforeach
        </ul>
    </x-card>
</div>

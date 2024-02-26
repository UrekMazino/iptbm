<x-card>
    <x-item-header>
        Recently Added ABH Profiles
    </x-item-header>
    <div class="mt-4">
        <ul class="list-none space-y-3">
            @foreach($profile as $prof)

                <li>
                    <div class="text-gray-600 dark:text-gray-400">
                        <div>
                            <a href="{{route("abh.staff.profile.public-view",['profile'=>'1'])}}"
                               class="font-medium text-sky-600 dark:text-sky-500 hover:underline">
                                {{$prof->agency->name}}
                            </a>
                        </div>
                        <div class="text-sm">
                            {{$prof->created_at->format('F-d-Y')}}
                        </div>

                    </div>

                </li>
            @endforeach


        </ul>
    </div>
</x-card>

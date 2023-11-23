<x-card>
    <x-item-header>
        Recently Added ABH Profiles
    </x-item-header>
    <div class="mt-4">
        <ul class="list-none space-y-3">
            <li>
                <div class="text-gray-600 dark:text-gray-400">


                    <div>
                        <a href="{{route("iptbm.staff.viewProfile",['id'=>'1'])}}"
                           class="font-medium text-sky-600 dark:text-sky-500 hover:underline">
                            Sample
                        </a>
                    </div>
                    <div class="text-sm">
                        {{\Carbon\Carbon::parse(now())->format('F-d-Y')}}
                    </div>

                </div>

            </li>
            <li>
                <div class="text-gray-600 dark:text-gray-400">


                    <div>
                        <a href="{{route("iptbm.staff.viewProfile",['id'=>'1'])}}"
                           class="font-medium text-sky-600 dark:text-sky-500 hover:underline">
                            Sample
                        </a>
                    </div>
                    <div class="text-sm">
                        {{\Carbon\Carbon::parse(now())->format('F-d-Y')}}
                    </div>

                </div>

            </li>
        </ul>
    </div>
</x-card>

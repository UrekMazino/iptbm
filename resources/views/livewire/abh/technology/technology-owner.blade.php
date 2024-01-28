<x-card-panel title="Technology Owner/Co-owner">
    <x-slot:button>
        <x-pop-modal modal-title="Add Co owner" name="addCoOwner" class="max-w-2xl">

        </x-pop-modal>
        <x-secondary-button data-modal-toggle="addCoOwner" class="text-sky-500 dark:text-sky-500">
            Update
        </x-secondary-button>
    </x-slot:button>
    <div class="space-y-5">
        <div>
            <div class="border border-gray-200 dark:border-gray-600 rounded p-2 divide-y divide-gray-200 dark:divide-gray-600">
                <div class="text-center font-medium">
                   {{$technology->profile->agency->name}}
               </div>
                <div class="text-center">
                    Owner
                </div>
            </div>
        </div>
        <div>
            <div class="font-medium">
                Co Owners
            </div>
            <ul class="divide-y divide-gray-300 dark:divide-gray-600">
                @forelse($technology->co_owner as $value)
                    <li>
                        <div class="flex justify-between items-center p-2  ">
                            <div>
                                {{$value->agency->name}}
                            </div>
                            <x-secondary-button class="p-1">
                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                </svg>
                            </x-secondary-button>
                        </div>

                    </li>
                    @empty
                @endforelse
            </ul>
        </div>
    </div>
</x-card-panel>

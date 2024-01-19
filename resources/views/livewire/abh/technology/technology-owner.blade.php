<x-card-panel title="Technology Owner/Co-owner">
    <x-slot:button>
        <x-secondary-button class="text-sky-500 dark:text-sky-500">
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
            <ul>
                @forelse($technology->co_owner as $value) @endforelse
            </ul>
        </div>
    </div>
</x-card-panel>

<div class="border rounded shadow-lg border-gray-300 dark:border-gray-600">

    <div class="flex justify-between items-center border-b border-gray-200 dark:border-gray-700 p-2">
        <x-item-header>
            {{$title}}
        </x-item-header>
        <x-pop-modal name="updateMod-{{$univKey}}" modal-title="Updated {{$title}} attachment" class="max-w-xl" static="true">

            <form class="space-y-2" wire:submit.prevent="saveForm('{{$data}}')">
                <div>
                    <x-input-label value="Attachment"/>
                    <x-text-input wire:model="model" placeholder="upload pdf" type="file" class="w-full"/>
                    <x-input-error :messages="$errors->get('model')"/>
                </div>
                <div>
                    <x-submit-button disabled wire:loading wire:target="saveForm">
                        Processing
                    </x-submit-button>
                    <x-submit-button type="submit" wire:loading.remove wire:target="saveForm">
                        Upload
                    </x-submit-button>
                </div>
            </form>
        </x-pop-modal>
        <x-secondary-button data-modal-toggle="updateMod-{{$univKey}}">
            Update
        </x-secondary-button>
    </div>
    <div class="p-1 md:p-4">
        @if($fullTechDescription[$data])
            <div class="mt-4 flex justify-between items-center">
                <div class="flex justify-between items-center gap-2">
                    <div class="rounded-full p-2 bg-gray-400 dark:bg-gray-950 text-blue-950 dark:text-blue-400">
                        <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4.5 11H4v1h.5a.5.5 0 0 0 0-1ZM7 5V.13a2.96 2.96 0 0 0-1.293.749L2.879 3.707A2.96 2.96 0 0 0 2.13 5H7Zm3.375 6H10v3h.375a.624.624 0 0 0 .625-.625v-1.75a.624.624 0 0 0-.625-.625Z"/>
                            <path d="M19 7h-1V2a1.97 1.97 0 0 0-1.933-2H9v5a2 2 0 0 1-2 2H1a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h1a1.969 1.969 0 0 0 1.933 2h12.134c1.1 0 1.7-1.236 1.856-1.614a.988.988 0 0 0 .07-.386H19a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1ZM4.5 14H4v1a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1h1.5a2.5 2.5 0 1 1 0 5Zm8.5-.625A2.63 2.63 0 0 1 10.375 16H9a1 1 0 0 1-1-1v-5a1 1 0 0 1 1-1h1.375A2.63 2.63 0 0 1 13 11.625v1.75ZM17 12a1 1 0 0 1 0 2h-1v1a1 1 0 0 1-2 0v-5a1 1 0 0 1 1-1h2a1 1 0 1 1 0 2h-1v1h1Z"/>
                        </svg>
                    </div>
                    <div class="text-lg">
                        Attachment
                    </div>
                </div>
                <x-pop-modal name="pdfModFullTech-{{$univKey}}" class="max-w-7xl">
                    <iframe src="{{\Illuminate\Support\Facades\Storage::url($fullTechDescription[$data])}}" class="aspect-video w-full"></iframe>
                </x-pop-modal>
                <x-secondary-button class="text-sky-600 dark:text-sky-600" data-modal-toggle="pdfModFullTech-{{$univKey}}">
                    <div class="text-xs">
                        Open
                    </div>
                </x-secondary-button>
            </div>
        @else
            No data available
        @endif

    </div>

</div>

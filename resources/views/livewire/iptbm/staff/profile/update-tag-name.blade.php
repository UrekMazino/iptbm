
<x-card class="py-24 md:py-0 md:col-span-2 h-full flex justify-center items-center relative group overflow-hidden">
    <x-pop-modal  name="upload_tagname" modal-title="Update Profile Tag line"
                 static="true" class="max-w-2xl">
        <form class="space-y-4" wire:submit.prevent="update">
            <div>
                <x-input-label value="Tag line"/>
                <x-text-box wire:model.lazy="tagLine" rows="3"/>
                <x-input-error :messages="$errors->get('tagLine')"/>
            </div>
            <x-secondary-button type="submit" wire:loading.attr="disabled" wire:target="update"
                                class="py-2 w-full overflow-hidden">
                <div wire:loading wire:target="update" class="m-auto text-center p-2">
                    Processing...
                </div>
                <div wire:loading.remove wire:target="update" class="w-full h-full  text-center p-2">
                    Save Tag Line
                </div>
            </x-secondary-button>
        </form>
    </x-pop-modal>
    <div class="text-center">
        @if($profile->tag_line)
            <p class="font-medium text-2xl">
                {{$profile->tag_line}}
            </p>

        @else
            <div>
                <x-secondary-button data-modal-toggle="upload_tagname" class="gap-4">
                    <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path
                            d="M15.045.007 9.31 0a1.965 1.965 0 0 0-1.4.585L.58 7.979a2 2 0 0 0 0 2.805l6.573 6.631a1.956 1.956 0 0 0 1.4.585 1.965 1.965 0 0 0 1.4-.585l7.409-7.477A2 2 0 0 0 18 8.479v-5.5A2.972 2.972 0 0 0 15.045.007Zm-2.452 6.438a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                    </svg>
                    Update Tag name
                </x-secondary-button>
            </div>
        @endif

    </div>
    @if($profile->tag_line)
        <div
            class="opacity-100 md:opacity-0 absolute bottom-0 transition duration-300   group-hover:opacity-100 group-hover:block left-0 h-1/4 bg-gray-500 dark:bg-gray-950 bg-opacity-75 backdrop-blur-sm dark:bg-opacity-90 w-full">
            <div class="w-full h-full flex justify-center items-center">
                <x-secondary-button  data-modal-toggle="upload_tagname" data-modal-target="upload_tagname" class="gap-4">
                    <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path
                            d="M15.045.007 9.31 0a1.965 1.965 0 0 0-1.4.585L.58 7.979a2 2 0 0 0 0 2.805l6.573 6.631a1.956 1.956 0 0 0 1.4.585 1.965 1.965 0 0 0 1.4-.585l7.409-7.477A2 2 0 0 0 18 8.479v-5.5A2.972 2.972 0 0 0 15.045.007Zm-2.452 6.438a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                    </svg>
                    Update Tag name
                </x-secondary-button>
            </div>
        </div>

    @endif

</x-card>

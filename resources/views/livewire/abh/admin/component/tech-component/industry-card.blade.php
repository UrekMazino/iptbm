<x-card-panel title="{{$industry->name}}">
    <div class="space-y-2 my-4">
        <x-pop-modal name="commodity-{{$industry->id}}" class="max-w-2xl" modal-title="{{__($industry->name)}}">
            <div>
                <a href="#" class="font-medium text-lg text-blue-600 dark:text-blue-500 hover:underline">
                    <div class="flex justify-start gap-2 items-center">
                        <div>
                            {{__("List of commodities")}}
                        </div>
                        <div>
                            <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                      d="M3 4a1 1 0 0 0-.8 1.6L6.6 12l-4.4 6.4A1 1 0 0 0 3 20h13.2c.3 0 .6-.2.8-.4l4.8-7a1 1 0 0 0 0-1.2l-4.8-7a1 1 0 0 0-.8-.4H3Z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </a>

            </div>
            <div class="mt-4">
                <ol class="space-y-4 text-gray-500 list-decimal list-inside dark:text-gray-400">
                    @foreach($industry->commodities as $commodity)
                        <li>
                            {{__($commodity->name)}}
                        </li>
                    @endforeach
                </ol>

            </div>
        </x-pop-modal>
        <x-pop-modal name="category-{{$industry->id}}" class="max-w-2xl" modal-title="{{$industry->name}}">
            <div>

                <a href="#" class="font-medium text-lg text-blue-600 dark:text-blue-500 hover:underline">
                    <div class="flex justify-start gap-2 items-center">
                        <div>
                            List of Category
                        </div>
                        <div>
                            <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                      d="M3 4a1 1 0 0 0-.8 1.6L6.6 12l-4.4 6.4A1 1 0 0 0 3 20h13.2c.3 0 .6-.2.8-.4l4.8-7a1 1 0 0 0 0-1.2l-4.8-7a1 1 0 0 0-.8-.4H3Z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>

                </a>

            </div>
            <div class="mt-4">
                <ol class="space-y-4 text-gray-500 list-decimal list-inside dark:text-gray-400">
                    @foreach($industry->categories as $category)
                        <li>
                            {{__($category->name)}}
                        </li>
                    @endforeach
                </ol>

            </div>
        </x-pop-modal>
        <div data-modal-toggle="commodity-{{$industry->id}}"
             class="border overflow-hidden cursor-pointer font-medium group hover:bg-gray-200 hover:dark:bg-gray-900 rounded border-gray-200 dark:border-gray-600 p-4 ">
            <div
                class="group-hover:scale-125 group-hover:text-gray-900 group-hover:dark:text-gray-50 group-hover:transform group-hover:translate-x-10 transition duration-300">
                {{__('Commodities')}}
            </div>
        </div>
        <div data-modal-toggle="category-{{$industry->id}}"
             class="border cursor-pointer  overflow-hidden font-medium group hover:bg-gray-200 hover:dark:bg-gray-900 rounded border-gray-200 dark:border-gray-600 p-4 ">
            <div
                class="group-hover:scale-125 group-hover:text-gray-900 group-hover:dark:text-gray-50 group-hover:transform group-hover:translate-x-10 transition duration-300">
                {{__('Categories')}}
            </div>
        </div>
    </div>
    <x-slot:footer>
        <div class="space-x-5 justify-end flex items-center">
            <x-pop-modal close-action="reset_form" static="true" modal-title="Update Industry name" class="max-w-xl"
                         name="updatedIndustryName-{{$industry->id}}">
                <form class="space-y-5" wire:submit.prevent="save_industry_name">
                    <div>
                        <x-input-label value="Industry"/>
                        <x-text-input wire:model.lazy="industry_name" required placeholder="enter text here"
                                      class="w-full"/>
                        <x-input-error :messages="$errors->get('industry_name')"/>
                    </div>
                    <div>
                        <x-submit-button class="min-w-full" wire:loading.attr="disabled"
                                         wire:target="save_industry_name">
                            <div class="p-2 text-center w-full" wire:loading.remove wire:target="save_industry_name">
                                Submit
                            </div>
                            <div class="p-2 text-center w-full" wire:loading wire:target="save_industry_name">
                                Processing...
                            </div>
                        </x-submit-button>
                    </div>
                </form>
            </x-pop-modal>
            <x-primary-button class="gap-2" data-modal-toggle="updatedIndustryName-{{$industry->id}}">
                <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m14.3 4.8 2.9 2.9M7 7H4a1 1 0 0 0-1 1v10c0 .6.4 1 1 1h11c.6 0 1-.4 1-1v-4.5m2.4-10a2 2 0 0 1 0 3l-6.8 6.8L8 14l.7-3.6 6.9-6.8a2 2 0 0 1 2.8 0Z"/>
                </svg>
                Edit
            </x-primary-button>
            @if($industry->trashed())
                <x-pop-modal class="max-w-md" name="restoreIndustry-{{$industry->id}}">
                    <div class="text-center">
                        <div class="text-center mb-4 flex justify-center items-center">
                            <x-item-header class="mx-auto text-center">
                                {{$industry->name}}
                            </x-item-header>
                        </div>

                        <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to restore this item?</p>
                        <div class="flex justify-center items-center space-x-4">
                            <button data-modal-toggle="restoreIndustry-{{$industry->id}}" type="button"
                                    class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                No, cancel
                            </button>
                            <button type="submit" wire:click.prevent="restore_industry"
                                    class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                Yes, I'm sure
                            </button>
                        </div>
                    </div>
                </x-pop-modal>
                <x-pop-modal class="max-w-md" name="destroyIndustry-trash-{{$industry->id}}">
                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true"
                         fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <div class="text-center">
                        <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                    </div>
                    <div class="flex justify-center items-center space-x-4">
                        <button data-modal-toggle="destroyIndustry-{{$industry->id}}" type="button"
                                class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            No, cancel
                        </button>
                        <button type="submit" wire:click.prevent="destroy_industry"
                                class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                            Yes, I'm sure
                        </button>
                    </div>
                </x-pop-modal>

                <div data-popover id="popover-default-trash-{{$industry->id}}" role="tooltip"
                     class="absolute z-10 invisible inline-block w-44 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-lg shadow-black opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                    <div class="space-y-2 p-2">
                        <div>
                            <x-danger-button data-modal-toggle="destroyIndustry-trash-{{$industry->id}}"
                                             class="min-w-full p-2">
                                Destroy
                            </x-danger-button>
                        </div>
                        <div>
                            <x-secondary-button class="min-w-full" data-modal-toggle="restoreIndustry-{{$industry->id}}"
                                                class="text-sky-500 dark:text-sky-500 min-w-full">
                                <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="m16 10 3-3m0 0-3-3m3 3H5v3m3 4-3 3m0 0 3 3m-3-3h14v-3"/>
                                </svg>
                                Restore
                            </x-secondary-button>
                        </div>
                    </div>
                    <div data-popper-arrow></div>
                </div>
                <x-danger-button data-popover-trigger="click" data-popover-target="popover-default-trash-{{$industry->id}}">
                    <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                    </svg>
                    Disabled
                </x-danger-button>
            @else
                <x-pop-modal class="max-w-md" name="disableIndustry-{{$industry->id}}">
                    <div class="text-center">
                        <div class="text-center mb-4 flex justify-center items-center">
                            <x-item-header class="mx-auto text-center">
                                {{$industry->name}}
                            </x-item-header>
                        </div>
                        <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to disable this data?</p>
                        <div
                            class="flex items-center p-4 mb-4 text-sm text-yellow-700 rounded-lg bg-yellow-100 dark:bg-gray-900 dark:text-yellow-300"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">Warning alert!</span> This will not be accessible for all
                                users.
                            </div>
                        </div>
                        <div class="flex justify-center items-center space-x-4">
                            <button data-modal-toggle="disableIndustry-{{$industry->id}}" type="button"
                                    class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                No, cancel
                            </button>
                            <button type="submit" wire:click.prevent="soft_delete"
                                    class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                Yes, I'm sure
                            </button>
                        </div>
                    </div>
                </x-pop-modal>
                <x-pop-modal class="max-w-md" name="destroyIndustry-{{$industry->id}}">
                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true"
                         fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <div class="text-center">
                        <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                    </div>
                    <div class="flex justify-center items-center space-x-4">
                        <button data-modal-toggle="destroyIndustry-{{$industry->id}}" type="button"
                                class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            No, cancel
                        </button>
                        <button type="submit" wire:click.prevent="destroy_industry"
                                class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                            Yes, I'm sure
                        </button>
                    </div>
                </x-pop-modal>
                <div data-popover id="popover-default-{{$industry->id}}" role="tooltip"
                     class="absolute z-10 invisible inline-block w-44 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-lg shadow-black opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                    <div class="space-y-2 p-2">
                        <div>
                            <x-primary-button data-modal-toggle="disableIndustry-{{$industry->id}}"
                                              class="min-w-full p-2">
                                Disable
                            </x-primary-button>
                        </div>
                        <div>
                            <x-danger-button data-modal-toggle="destroyIndustry-{{$industry->id}}"
                                             class="min-w-full p-2">
                                Destroy
                            </x-danger-button>
                        </div>
                    </div>
                    <div data-popper-arrow></div>
                </div>
                <x-danger-button data-popover-trigger="click" data-popover-target="popover-default-{{$industry->id}}">
                    <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                    </svg>
                    Delete action
                </x-danger-button>
            @endif

        </div>
    </x-slot:footer>
</x-card-panel>

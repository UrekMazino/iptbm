<div class="my-4">
    <x-pop-modal modal-title="Update Tag line" name="upload_tagname" class="max-w-2xl" static="true">
        <form class="space-y-6" wire:submit.prevent="update">

            <x-text-box wire:model="tagLine" rows="4" placeholder="Enter text here"/>

            <x-secondary-button wire:loading.attr="disabled" class="w-full " type="submit">
                <div class="mx-auto text-center text-sky-600 p-2" wire:loading.remove wire:target="update">
                    Submit
                </div>
                <div class="mx-auto text-sky-600 text-center p-2" wire:loading wire:target="update">
                    Processing
                </div>
            </x-secondary-button>


        </form>
    </x-pop-modal>

    <x-secondary-button data-modal-toggle="upload_tagname">
        <div class="justify-center flex items-center gap-2">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 fill="currentColor" viewBox="0 0 18 18">
                <path
                    d="M15.045.007 9.31 0a1.965 1.965 0 0 0-1.4.585L.58 7.979a2 2 0 0 0 0 2.805l6.573 6.631a1.956 1.956 0 0 0 1.4.585 1.965 1.965 0 0 0 1.4-.585l7.409-7.477A2 2 0 0 0 18 8.479v-5.5A2.972 2.972 0 0 0 15.045.007Zm-2.452 6.438a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
            </svg>
            <div>
                Tag name
            </div>
        </div>
    </x-secondary-button>

    <!-- Main modal -->
    <div id="upload_tagname" wire:ignore.self data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700 ">
                <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="upload_tagname">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Tag line</h3>
                    <form class="space-y-6" wire:submit.prevent="update">


                        <label for="message" class="block  text-sm font-medium text-gray-900 dark:text-white">Tag
                            line</label>
                        <textarea wire:model="tagLine" id="message" rows="4"
                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  placeholder="Write your thoughts here..."></textarea>

                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div>
                                <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Update
                                </button>
                            </div>

                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

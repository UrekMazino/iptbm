<div class="my-4">
    <x-pop-modal modal-title="Upload Profile Photo" name="uploadProf" class="max-w-2xl" static="true">
        <form class="space-y-6" wire:submit.prevent="upload">

            <div class="flex items-center justify-center w-full ">
                <div class="w-full"
                    x-data="{ isUploading: false, progress: 0 }"
                    x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false, progress  =0"

                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                >
                    <!-- File Input -->
                    <label wire:loading.class="blur" wire:target="photo" for="dropzone-file" class="flex mx-auto flex-col backdrop-blur items-center justify-center w-3/4 aspect-square  border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-100 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-200 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        @if($photo)
                            <img class="w-auto h-auto max-h-full" src="{{$photo->temporaryUrl()}}" alt="">
                        @else
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400"> PNG, JPG  (MAX. 20mb)</p>
                            </div>
                        @endif
                        <input wire:model="photo" accept="image/jpeg,img/png" id="dropzone-file" type="file" class="hidden" />
                    </label>


                    <!-- Progress Bar -->
                    <div class="text-center mt-4 border border-gray-300 dark:border-gray-600 p-1 rounded-lg" x-show="isUploading">
                       <div class="text-center text-sky-600">
                           Loading
                       </div>
                        <progress max="100" class="w-full" x-bind:value="progress"></progress>
                    </div>
                </div>

            </div>
            <x-input-error :messages="$errors->get('photo')"/>

            <x-secondary-button wire:loading.attr="disabled" class="w-full " type="submit">
               <div class="mx-auto text-center text-sky-600 p-2" wire:loading.remove  wire:target="upload">
                   Submit
               </div>
                <div class="mx-auto text-sky-600 text-center p-2" wire:loading wire:target="upload">
                    Processing
                </div>
            </x-secondary-button>


        </form>
    </x-pop-modal>

    <x-secondary-button data-modal-toggle="uploadProf">
        <div class="justify-center flex items-center gap-2">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
            </svg>
            <div >
                Upload Photo
            </div>
        </div>
    </x-secondary-button>

</div>

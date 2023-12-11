<x-card class=" aspect-square relative group overflow-hidden ">
    <x-pop-modal static="true" class="max-w-4xl" name="showProf">
        <div class="p-5 text-center m-auto aspect-square">
            <img class="  rounded-lg m-auto object-contain w-full h-full"
                 src="{{Storage::url($profile->logo)}}" alt="image description">

        </div>
    </x-pop-modal>
    <x-pop-modal modal-title="Upload Profile Photo" name="profPhoto" class="max-w-2xl" static="true">
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
                    <label wire:loading.class="blur" wire:target="photo" for="dropzone-file"
                           class="flex mx-auto flex-col backdrop-blur items-center justify-center w-3/4 aspect-square  border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-100 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-200 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        @if($photo)
                            <img class="w-auto h-auto max-h-full" src="{{$photo->temporaryUrl()}}" alt="">
                        @else
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span>
                                    or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400"> PNG, JPG (MAX. 20mb)</p>
                            </div>
                        @endif
                        <input wire:model="photo" accept="image/jpeg,img/png" id="dropzone-file" type="file"
                               class="hidden"/>
                    </label>


                    <!-- Progress Bar -->
                    <div class="text-center mt-4 border border-gray-300 dark:border-gray-600 p-1 rounded-lg"
                         x-show="isUploading">
                        <div class="text-center text-sky-600">
                            Loading
                        </div>
                        <progress max="100" class="w-full" x-bind:value="progress"></progress>
                    </div>
                </div>

            </div>
            <x-input-error :messages="$errors->get('photo')"/>

            <x-secondary-button wire:loading.attr="disabled" class="w-full " type="submit">
                <div class="mx-auto text-center text-sky-600 p-2" wire:loading.remove wire:target="upload">
                    Submit
                </div>
                <div class="mx-auto text-sky-600 text-center p-2" wire:loading wire:target="upload">
                    Processing
                </div>
            </x-secondary-button>


        </form>
    </x-pop-modal>
    <div
        class="w-full h-full border border-gray-200 dark:border-gray-700 rounded flex justify-center items-center">
        @if($profile->logo)
            <img data-modal-toggle="showProf"
                 class="w-auto max-h-full cursor-pointer  transition duration-300 hover:scale-125"
                 src="{{Storage::url($profile->logo)}}" alt="profile photo">

        @else
            <img data-modal-toggle="showProf"
                 class="w-auto max-h-full cursor-pointer transition duration-300 hover:scale-125"
                 src="{{asset('assets/icon/profile-blank.png')}}" alt="profile photo">

        @endif

    </div>
    <div
        class="absolute bottom-0 transition duration-300 opacity-100 md:opacity-0  group-hover:opacity-100 group-hover:block left-0 h-1/4 bg-gray-500 dark:bg-gray-950 bg-opacity-75 backdrop-blur-sm dark:bg-opacity-90 w-full">
        <div class="w-full h-full flex justify-center items-center">
            <x-secondary-button data-modal-toggle="profPhoto" data-modal-target="profPhoto" class="gap-4">
                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path
                        d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z"/>
                </svg>
                Update Photo
            </x-secondary-button>
        </div>
    </div>
</x-card>

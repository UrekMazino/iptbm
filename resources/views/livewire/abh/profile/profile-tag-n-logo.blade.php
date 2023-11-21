<x-grid col="3" gap="4">
    <div>
        <x-card class=" aspect-square relative group overflow-hidden ">
            <x-pop-modal static="true" class="max-w-4xl" name="showProf">
                <div class="p-10 text-center m-auto aspect-square">
                    <img class="  rounded-lg m-auto object-contain w-full h-full"
                         src="{{Storage::url($profile->logo)}}" alt="image description">

                </div>
            </x-pop-modal>
            <div class="w-full h-full border border-gray-200 dark:border-gray-700 rounded flex justify-center items-center">
                @if($profile->logo)
                    <img data-modal-toggle="showProf"  class="w-auto max-h-full cursor-pointer  transition duration-300 hover:scale-125" src="{{Storage::url($profile->logo)}}" alt="profile photo">

                @else
                    <img data-modal-toggle="showProf"  class="w-auto max-h-full cursor-pointer transition duration-300 hover:scale-125" src="{{asset('assets/icon/profile-blank.png')}}" alt="profile photo">

                @endif

            </div>
            <x-pop-modal name="profPhoto" class="max-w-xl" modal-title="Update Profile Photo" static="true" close-action="reseter">
                <form class="space-y-4" wire:submit.prevent="savePhoto">
                    <div class="flex items-center justify-center w-3/4 mx-auto ">
                        <div class="w-full aspect-square"
                             x-data="{ isUploading: false, progress: 0 }"
                             x-on:livewire-upload-start="isUploading = true"
                             x-on:livewire-upload-finish="isUploading = false, progress  =0"

                             x-on:livewire-upload-error="isUploading = false"
                             x-on:livewire-upload-progress="progress = $event.detail.progress"
                        >
                            <label  wire:target="photo" wire:loading.class="blur-sm duration-300 transition" for="dropzone-file" class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">

                                @if($photo)
                                    <img class="w-auto h-auto max-h-full" src="{{$photo->temporaryUrl()}}" alt="photo">
                                @else
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400"> PNG, JPG (Max of 20mb)</p>
                                    </div>
                                @endif


                            </label>
                            <input wire:model="photo" id="dropzone-file" type="file" accept="image/png,image/jpeg" class="hidden" />
                            <x-input-error :messages="$errors->get('photo')"/>
                            <div class="text-center mt-4 border border-gray-300 dark:border-gray-600 p-1 rounded-lg" x-show="isUploading">
                                <div class="text-center text-sky-600">
                                    Loading
                                </div>
                                <progress max="100" class="w-full" x-bind:value="progress"></progress>
                            </div>
                        </div>

                    </div>
                    <div>

                        <x-secondary-button  type="submit" wire:loading.attr="disabled" wire:target="savePhoto" class="py-2 w-full overflow-hidden">
                            <div wire:loading wire:target="savePhoto" class="m-auto text-center p-2">
                                Processing...
                            </div>
                            <div wire:loading.remove   wire:target="savePhoto" class="w-full h-full  text-center p-2">
                                Save Photo
                            </div>
                        </x-secondary-button>
                    </div>

                </form>
            </x-pop-modal>
            <div class="absolute bottom-0 transition duration-300 opacity-0  group-hover:opacity-100 group-hover:block left-0 h-1/4 bg-gray-500 dark:bg-gray-950 bg-opacity-75 backdrop-blur-sm dark:bg-opacity-90 w-full">
                <div class="w-full h-full flex justify-center items-center">
                    <x-secondary-button data-modal-toggle="profPhoto" class="gap-4">
                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z"/>
                        </svg>
                        Update Photo
                    </x-secondary-button>
                </div>
            </div>
        </x-card>
    </div>



    <x-card class="md:col-span-2 flex justify-center items-center relative group overflow-hidden">
        <x-pop-modal close-action="resetTagline" name="updateTagLine" modal-title="Update Profile Tag line" static="true" class="max-w-2xl">
            <form class="space-y-4" wire:submit.prevent="saveTagline">
                <div>
                    <x-input-label value="Tag line"/>
                    <x-text-box wire:model.lazy="tagline" rows="3"/>
                    <x-input-error :messages="$errors->get('tagline')"/>
                </div>
                <x-secondary-button  type="submit" wire:loading.attr="disabled" wire:target="saveTagline" class="py-2 w-full overflow-hidden">
                    <div wire:loading wire:target="saveTagline" class="m-auto text-center p-2">
                        Processing...
                    </div>
                    <div wire:loading.remove   wire:target="saveTagline" class="w-full h-full  text-center p-2">
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
                    <x-secondary-button data-modal-toggle="updateTagLine" class="gap-4">
                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M15.045.007 9.31 0a1.965 1.965 0 0 0-1.4.585L.58 7.979a2 2 0 0 0 0 2.805l6.573 6.631a1.956 1.956 0 0 0 1.4.585 1.965 1.965 0 0 0 1.4-.585l7.409-7.477A2 2 0 0 0 18 8.479v-5.5A2.972 2.972 0 0 0 15.045.007Zm-2.452 6.438a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                        </svg>
                        Update Tag name
                    </x-secondary-button>
                </div>
            @endif

        </div>
        @if($profile->tag_line)
            <div class="absolute bottom-0 transition duration-300 opacity-0  group-hover:opacity-100 group-hover:block left-0 h-1/4 bg-gray-500 dark:bg-gray-950 bg-opacity-75 backdrop-blur-sm dark:bg-opacity-90 w-full">
                <div class="w-full h-full flex justify-center items-center">
                    <x-secondary-button data-modal-toggle="updateTagLine" class="gap-4">
                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M15.045.007 9.31 0a1.965 1.965 0 0 0-1.4.585L.58 7.979a2 2 0 0 0 0 2.805l6.573 6.631a1.956 1.956 0 0 0 1.4.585 1.965 1.965 0 0 0 1.4-.585l7.409-7.477A2 2 0 0 0 18 8.479v-5.5A2.972 2.972 0 0 0 15.045.007Zm-2.452 6.438a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                        </svg>
                        Update Tag name
                    </x-secondary-button>
                </div>
            </div>

        @endif

    </x-card>

</x-grid>

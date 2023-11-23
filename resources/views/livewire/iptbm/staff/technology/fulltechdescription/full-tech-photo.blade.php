<x-card>
    <div class="flex justify-between items-center">
        <x-item-header>
            Technology Photos
        </x-item-header>
        <x-pop-modal name="addPhotoTech" modal-title="Upload technology photo" class="max-w-xl">
            <form class="space-y-4" wire:submit.prevent="saveForm">
                <div>
                    <div class="flex">
                        <x-input-label class="me-4" value="Description"/>
                        Optional
                    </div>
                    <x-text-box placeholder="Max of 100 characters" wire:model.lazy="description"/>
                    <x-input-error :messages="$errors->get('description')"/>
                </div>
                <div>


                    <div class="flex items-center  justify-center w-full">
                        <label for="tech-photo-file"
                               class="flex flex-col  items-center justify-center w-full aspect-square border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">

                            @if($photoModel)
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <img class="" src="{{$photoModel->temporaryUrl()}}" alt="technology photo">
                                </div>
                            @else
                                <div class="flex flex-col items-center justify-center pt-5 pb-6 ">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 20MB)</p>
                                </div>
                            @endif

                            <x-text-input id="tech-photo-file" type="file" class="hidden" wire:model="photoModel"
                                          accept="image/png,image/jpeg"/>
                        </label>
                    </div>


                </div>
                <div>
                    <x-submit-button wire:loading wire:target="saveForm">
                        Processing...
                    </x-submit-button>
                    <x-submit-button wire:loading.remove wire:target="saveForm" class="max-w-full">
                        Upload Photo
                    </x-submit-button>
                </div>
            </form>
        </x-pop-modal>
        <x-secondary-button data-modal-toggle="addPhotoTech">
            Update
        </x-secondary-button>
    </div>
    <div class="mt-4">
        <x-pop-modal name="gallery">

        </x-pop-modal>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
            @if($photos->count()>0)
                @foreach($photos as $photo)
                    <x-pop-modal name="tech-photo-{{$photo->id}}" class="max-w-3xl">
                        <div class="w-full h-auto max-h-full flex justify-center items-center relative">
                            <img class="w-auto  max-h-full"
                                 src="{{\Illuminate\Support\Facades\Storage::url($photo->file)}}">
                            @if($photo->file_description)
                                <div
                                    class="opacity-0 hover:opacity-100 transition duration-300 absolute top-0 left-0 flex justify-center items-center w-full h-full">
                                    <div
                                        class="font-medium text-lg text-gray-200 dark:text-white  p-4 w-full h-auto bg-gray-900 dark:bg-gray-800 bg-opacity-90 dark:bg-opacity-90 rounded-lg shadow-lg">
                                        {{ $photo->file_description}}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </x-pop-modal>
                    <div
                        class="flex rounded overflow-hidden justify-center items-center aspect-square border border-gray-300 dark:border-gray-600 p-2 relative">
                        <div class="absolute top-0  right-0 w-fit h-fit p-2 rounded-full">
                            <x-pop-modal name="deletTechPhoto-{{$photo->id}}" class="max-w-md text-center">
                                <div class="w-1/2 m-auto aspect-square justify-center flex items-center">
                                    <img class="w-auto  max-h-full"
                                         src="{{\Illuminate\Support\Facades\Storage::url($photo->file)}}">
                                </div>
                                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this
                                    item?</p>
                                <div class="flex justify-center items-center space-x-4">
                                    <button data-modal-toggle="deletTechPhoto-{{$photo->id}}" type="button"
                                            class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                        No, cancel
                                    </button>
                                    <button type="submit" wire:click.prevent="deletePhoto('{{$photo->id}}')"
                                            data-modal-toggle="deletTechPhoto-{{$photo->id}}"
                                            class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                        Yes, I'm sure
                                    </button>
                                </div>
                            </x-pop-modal>
                            <button data-modal-toggle="deletTechPhoto-{{$photo->id}}">
                                <svg class="w-4 h-4 text-red-500 dark:text-red-500" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                </svg>
                            </button>
                        </div>
                        <img data-modal-toggle="tech-photo-{{$photo->id}}"
                             class="w-auto cursor-pointer h-auto hover:scale-110 transition duration-300 max-h-full"
                             src="{{\Illuminate\Support\Facades\Storage::url($photo->file)}}">
                    </div>

                @endforeach
                @if($photo->count()>3)
                    <div
                        class="flex rounded justify-center items-center aspect-square border border-gray-400 dark:border-gray-600 p-2">
                        <div>
                            <x-pop-modal name="galerryModal" class="max-w-3xl text-center" close-action="resetView">
                                @if($viewPictures)

                                    <ul class="space-y-10">
                                        @if($technology_photos)
                                            @foreach($technology_photos as $image)
                                                <li>
                                                    <div
                                                        class="w-full h-auto max-h-full  border border-gray-300 dark:border-gray-600 p-4">
                                                        <img class="w-auto m-auto max-h-full"
                                                             src="{{\Illuminate\Support\Facades\Storage::url($image->file)}}">
                                                        @if($image->file_description)
                                                            <div
                                                                class=" flex justify-center items-center w-full h-full">
                                                                <div
                                                                    class="font-medium text-lg text-gray-200 dark:text-white  p-4 w-full h-auto bg-gray-900 dark:bg-gray-800   ">
                                                                    {{ $image->file_description}}
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif

                                    </ul>
                                @else
                                    <x-secondary-button class="mx-auto" wire:click.prevent="viewPictures">
                                        View Images
                                    </x-secondary-button>
                                @endif

                            </x-pop-modal>
                            <button data-modal-toggle="galerryModal" class="hover:text-sky-600 duration-300 transition">
                                See more..
                            </button>
                        </div>
                    </div>
                @endif

            @else
                No data available
            @endif

        </div>

    </div>
</x-card>

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
                       <label for="tech-photo-file" class="flex flex-col  items-center justify-center w-full aspect-square border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">

                           @if($photoModel)
                               <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                   <img class="" src="{{$photoModel->temporaryUrl()}}" alt="technology photo">
                               </div>
                           @else
                               <div class="flex flex-col items-center justify-center pt-5 pb-6 ">
                                   <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                   </svg>
                                   <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                   <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG  (MAX. 20MB)</p>
                               </div>
                           @endif

                           <x-text-input id="tech-photo-file" type="file" class="hidden" wire:model="photoModel" accept="image/png,image/jpeg" />
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
            @foreach($photos as $photo)
                <div class="flex rounded justify-center items-center aspect-square border border-gray-400 dark:border-gray-600 p-2">
                    <img class="w-auto h-auto max-h-full" src="{{\Illuminate\Support\Facades\Storage::url($photo->file)}}">
                </div>

            @endforeach
                <div class="flex rounded justify-center items-center aspect-square border border-gray-400 dark:border-gray-600 p-2">
                    <div>
                        <button class="hover:text-sky-600 duration-300 transition">
                            See more..
                        </button>
                    </div>
                </div>
        </div>

    </div>
</x-card>

<x-card>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div >
            <div class="group aspect-square border border-gray-200 dark:border-gray-600 rounded p-4 relative overflow-hidden">
                <div class="w-fit h-full flex justify-center items-center">
                    @if($technology->tech_photo)
                        <a href="{{route("abh.image-viewer",['technology'=>$technology])}}">
                            <img class="group-hover:scale-110 transition cursor-pointer duration-300 max-w-full w-auto h-auto" src="{{Storage::url($technology->tech_photo)}}" alt="technology photo">

                        </a>

                    @else
                        <img class="max-w-full w-auto h-auto" src="{{asset('assets/icon/profile-blank.png')}}" alt="technology photo">
                    @endif


                </div>
                <div class="opacity-0 group-hover:opacity-100 bg-opacity-60 backdrop-blur dark:bg-opacity-60 transition duration-300 w-full py-4 absolute bottom-0 flex justify-center items-center left-0 bg-gray-500 dark:bg-gray-900">
                    <x-secondary-button class="text-sky-500 dark:text-sky-500 gap-2">
                        <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                            <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                        </svg>
                        Update Photo
                    </x-secondary-button>
                </div>
            </div>
        </div>
        <div class="md:col-span-2 flex justify-center items-center">
            <div class="w-full space-y-4">
                <x-card-panel class="border border-gray-200 dark:border-gray-600" title="Technology Title">
                   <div>
                       {{$tech->title}}
                   </div>
                    <x-slot:footer>
                        <x-pop-modal modal-title="Update Technology Title" name="techTitle" static="true" class="max-w-2xl">
                            <form class="space-y-4" wire:submit.prevent="save_title">
                                <div>
                                    <x-input-label value="Technology Title"/>
                                    <x-text-box wire:model.lazy="title" rows="4" placeholder="enter text here" required/>
                                    <x-sub-label value="Maximum of 150 characters."/>
                                    <x-input-error :messages="$errors->get('title')"/>
                                </div>
                                <div>
                                    <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="save_update">
                                        <div class="p-2 w-full text-center" wire:loading.remove wire:target="save_update">
                                            Submit
                                        </div>
                                        <div class="p-2 w-full text-center" wire:loading wire:target="save_update">
                                            Processing...
                                        </div>
                                    </x-submit-button>
                                </div>
                            </form>
                        </x-pop-modal>
                        <div class="w-fit me-0 ms-auto" >
                            <x-secondary-button class="gap-2 text-sky-500 dark:text-sky-500" data-modal-toggle="techTitle" modal-data-target="techTitle">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                    <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                </svg>
                                Edit
                            </x-secondary-button>
                        </div>
                    </x-slot:footer>
                </x-card-panel>
                <x-card-panel class="border border-gray-200 dark:border-gray-600" title="Technology Description">
                    <div>
                        {{$technology->tech_desc}}
                    </div>
                    <x-slot:footer>
                        <x-pop-modal modal-title="Update Technology Description" name="techDesc" static="true" class="max-w-4xl">
                            <form class="space-y-4" wire:submit.prevent="save_description">
                                <div>
                                    <x-input-label value="Technology Description"/>
                                    <x-text-box wire:model.lazy="description" rows="6" placeholder="enter text here" required/>
                                    <x-sub-label value="Maximum of 150 characters."/>
                                    <x-input-error :messages="$errors->get('description')"/>
                                </div>
                                <div>
                                    <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="save_description">
                                        <div class="p-2 w-full text-center" wire:loading.remove wire:target="save_description">
                                            Submit
                                        </div>
                                        <div class="p-2 w-full text-center" wire:loading wire:target="save_description">
                                            Processing...
                                        </div>
                                    </x-submit-button>
                                </div>
                            </form>
                        </x-pop-modal>
                        <div class="w-fit me-0 ms-auto" >
                            <x-secondary-button class="gap-2 text-sky-500 dark:text-sky-500" data-modal-toggle="techDesc" modal-data-target="techDesc">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                    <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                </svg>
                                Edit
                            </x-secondary-button>
                        </div>
                    </x-slot:footer>
                </x-card-panel>
            </div>
        </div>
    </div>
</x-card>

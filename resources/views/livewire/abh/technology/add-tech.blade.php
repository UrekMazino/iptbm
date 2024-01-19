<x-pop-modal name="addAbhTech" static="true" class="max-w-4xl" modal-title="Add new Technology">
    <form class="space-y-6" wire:submit.prevent="saveTechnology">
        <div class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <x-input-label value="Title"/>
                        <x-text-box wire:model.lazy="tech_title"  rows="5" placeholder="enter text here" required/>
                        <x-input-error :messages="$errors->get('tech_title')"/>
                    </div>
                    <div>
                        <x-input-label value="Description"/>
                        <x-text-box wire:model.lazy="tech_description"  rows="5" placeholder="enter text here" required/>
                        <x-input-error :messages="$errors->get('tech_description')"/>
                    </div>
                </div>
                <div>

                    <div
                        class="w-full h-full"
                        x-data="{ isUploading: false, progress: 0 }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false, progress = 0"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                        <div class="flex items-center justify-center w-full aspect-square border p-2 border-gray-200 dark:border-gray-600 rounded">
                            <label wire:loading.class="blur" wire:target="tech_photo" for="dropzone-file" class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                               @if($tech_photo)
                                   <img src="{{$tech_photo->temporaryUrl()}}" class="max-w-full w-auto h-auto" alt="technology photo">
                                @else
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400"> PNG or JPG (MAX. 10mb)</p>
                                    </div>
                                @endif
                                <input accept="image/jpeg,image/png" wire:model.lazy="tech_photo" id="dropzone-file" type="file" class="hidden" />
                            </label>

                        </div>

                        <!-- Progress Bar -->
                        <div class="text-center mt-4 border border-gray-300 dark:border-gray-600 p-1 rounded-lg"
                             x-show="isUploading">
                            <div class="text-center text-sky-600">
                                Loading
                            </div>
                            <progress max="100" x-bind:value="progress" class="w-full"></progress>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('tech_photo')"/>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <x-input-label value="Year Developed"/>
                        <x-text-input wire:model.lazy="tech_year_developed" type="number" min="2000"  class="w-full" required placeholder="YYYY"/>
                        <x-input-error :messages="$errors->get('tech_year_developed')"/>
                    </div>
                    <div>
                        <x-input-label value="Technology Owner"/>
                        <x-text-input wire:model.lazy="tech_owner" list="ownerList" type="search" class="w-full" type="search" placeholder="select agency" required/>
                        <x-data-list id="ownerList">
                            @foreach($agencies as $agency)
                                <option value="{{$agency->name}}"></option>
                            @endforeach
                        </x-data-list>
                        <x-input-error :messages="$errors->get('tech_owner')"/>
                    </div>
                </div>
                <div class="space-y-4">
                    <div>
                        <x-input-label value="Tech Industry"/>
                        <x-input-select wire:model.lazy="tech_industry">
                            <option value="" selected>- - Select - -</option>
                            @foreach($industries as $industry)
                                <option value="{{$industry->id}}">
                                    {{$industry->name}}
                                </option>
                            @endforeach
                        </x-input-select>
                        <x-input-error :messages="$errors->get('tech_industry')"/>
                    </div>
                    <div>
                        <x-input-label value="Tech Status/ Readiness"/>
                        <x-input-select wire:model.lazy="tech_status">
                            <option value="" selected>- - Select - -</option>
                            <option>
                                Laboratory experiment stage / Lab testing / Greenhouse testing
                            </option>
                            <option>
                                Pilot Testing stage
                            </option>
                            <option>
                                Upscaled Testing stage
                            </option>
                            <option>
                                Commercial scale testing stage
                            </option>
                            <option>
                                Technology ready for commercialization
                            </option>
                            <option>
                                Commercialized technology
                            </option>
                        </x-input-select>
                        <x-input-error :messages="$errors->get('tech_status')"/>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <x-submit-button class="min-w-full" wire:loading.attr="disabled">
                <div class="p-2 w-full text-center">
                    Submit
                </div>
            </x-submit-button>
        </div>
    </form>
</x-pop-modal>

<div class="px-4 mt-10 font-sans">
    <div wire:ignore.self id="techPhoto" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden shadow-lg overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-4xl max-h-full">
            <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-hide="techPhoto">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-10 text-center m-auto ">
                    @if($techPhoto)
                        <img class="  rounded-lg m-auto object-contain w-full h-full" src="{{Storage::url($techPhoto)}}"
                             alt="image description">
                    @else
                        <h1 class="text-3xl text-gray-600 dark:text-gray-400 font-medium">
                            Please Update the technology photo
                        </h1>
                    @endif


                </div>
            </div>
        </div>
    </div>

    <div class="my-3">
        <x-card>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 ">
                <div wire:ignore.self id="editProf" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="editProf">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-6 space-y-6 py-4">
                                <div class="my-2 w-1/2 m-auto">
                                    <h1 class="text-gray-600 dark:text-gray-400">
                                        Update Profile
                                    </h1>
                                </div>
                                <form wire:submit.prevent="saveTechPhoto">
                                    <div
                                        class="w-1/2 aspect-square border-l border-r border-t border-b m-auto rounded-lg p-2">
                                        <label wire:loading.class="blur" wire:target="tempPhoto" for="dropzone-file"
                                               class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            @if($tempPhoto)
                                                <img class="w-full h-full object-contain rounded-lg"
                                                     src="{{$tempPhoto->temporaryUrl()}}" alt="">
                                            @else
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                    </svg>
                                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                            class="font-semibold">Click to upload</span> or drag and drop
                                                    </p>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                                        (MAX. 800x400px)</p>
                                                </div>

                                            @endif
                                            <input accept="image/jpeg,png" wire:model="tempPhoto" id="dropzone-file"
                                                   type="file" class="hidden"/>
                                        </label>
                                        @if(session()->has('tempPhoto'))
                                            <div
                                                class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                                                role="alert">
                                                <span class="font-medium">{{session('tempPhoto')}}</span>
                                            </div>
                                        @endif
                                        @error('tempPhoto')
                                        <div id="alert-border-2"
                                             class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                                             role="alert">
                                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                            </svg>
                                            <div class="ml-3 text-sm font-medium">
                                                {{$message}}
                                            </div>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="w-1/2 m-auto mt-3">
                                        <button type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                            Save
                                        </button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 relative">
                    <label data-modal-target="techPhoto" data-modal-toggle="techPhoto"
                           class="block text-white  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center  dark:focus:ring-blue-800"
                           type="button">
                        <div
                            class="w-full aspect-square   mt-4 mb-3 rounded-lg p-4 shadow border-l  border-r border-t border-b  dark:border-gray-600">
                            @if($techPhoto)
                                <img class="w-full h-full object-contain" src="{{Storage::url($techPhoto)}}">
                            @else
                                <img class="w-full h-full object-contain"
                                     src="{{asset('assets/logo/image-placeholder.jpg')}}">
                            @endif

                        </div>

                    </label>

                    <button data-modal-target="editProf" data-modal-toggle="editProf"
                            class="absolute text-2xl top-7 px-2 py-1 rounded-full bg-gray-300 dark:bg-gray-800 border-l  border-r border-t border-b border-blue-700 right-3 cursor-pointer hover:shadow hover:scale-125 text-blue-600 transition duration-300">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>


                </div>
                <div class="col-span-2">
                    <div class="w-full   mt-4 mb-3 ">
                        <h1 class="text-xl text-gray-600 dark:text-gray-400 ">
                            Technology Title
                        </h1>
                        <div wire:loading wire:target="toggleTechTitle">
                            <div class="text-blue-500">
                                Loading ...
                            </div>
                        </div>

                        @if($toggleTechTitle)
                            <div class="p-2 border border-gray-400 dark:border-gray-600 bg-gray-200 dark:bg-gray-800">

                                <form wire:submit.prevent="saveTechTitle">

                                    <di class="flex justify-between">
                                        <div>
                                            <label for="title"
                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Technology Title</label>
                                        </div>
                                        <div>
                                            <button wire:click.prevent="toggleTechTitle" type="button"
                                                    class="text-blue-500">
                                                <i class="fa-solid fa-circle-xmark"></i>
                                            </button>
                                        </div>
                                    </di>
                                    <textarea wire:model.lazy="techTitle" id="title" rows="4"
                                              class="block my-2 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>

                                    @if(session()->has('techTitle'))
                                        <div
                                            class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                                            role="alert">
                                            <span class="font-medium">{{session('techTitle')}}</span>
                                        </div>
                                    @endif
                                    @error('techTitle')
                                    <div id="alert-border-2"
                                         class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                                         role="alert">
                                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <div class="ml-3 text-sm font-medium">
                                            {{$message}}
                                        </div>
                                    </div>
                                    @enderror
                                    <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Save
                                    </button>
                                </form>

                            </div>

                        @else
                            <p class="my-2 text-gray-600 dark:text-gray-300">
                                {{$techTitle}}
                            </p>
                            <div>

                                <x-secondary-button wire:click="toggleTechTitle" class="text-sky-600  dark:text-sky-600 ">
                                    <div class="m-auto text-center flex justify-center items-center">
                                        <svg class="w-[19px] h-[19px] " aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                            <path
                                                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                            <path
                                                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                        </svg>
                                        <div class="m-auto ms-2">
                                            Edit
                                        </div>
                                    </div>
                                </x-secondary-button>

                            </div>
                        @endif

                    </div>
                    <hr class="h-px my-8 bg-gray-700 border-0 dark:bg-gray-200">
                    <div class="w-full   mt-4 mb-3 ">
                        <h1 class="text-xl text-gray-600 dark:text-gray-400 ">
                            Description
                        </h1>

                        <div wire:loading wire:target="toggleDescription">
                            <div class="text-blue-500">
                                Loading ...
                            </div>
                        </div>
                        @if($toggleDescription)
                            <div class="p-2 border-l border-r border-t border-b rounded-lg bg-gray-200 dark:bg-gray-800">

                                <form wire:submit.prevent="saveDescription">

                                    <di class="flex justify-between">
                                        <div>
                                            <label for="title"
                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Technology
                                                Description</label>
                                        </div>
                                        <div>
                                            <button wire:click.prevent="toggleDescription" type="button"
                                                    class="text-blue-500">
                                                <i class="fa-solid fa-circle-xmark"></i>
                                            </button>
                                        </div>
                                    </di>
                                    <textarea wire:model="description" id="title" rows="4"
                                              class="block my-2 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                    @if(session()->has('description'))
                                        <div
                                            class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                                            role="alert">
                                            <span class="font-medium">{{session('description')}}</span>
                                        </div>
                                    @endif
                                    @error('description')
                                    <div id="alert-border-2"
                                         class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                                         role="alert">
                                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <div class="ml-3 text-sm font-medium">
                                            {{$message}}
                                        </div>
                                    </div>
                                    @enderror
                                    <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Save
                                    </button>
                                </form>

                            </div>

                        @else
                            <p class="my-2 text-gray-600 dark:text-gray-300">
                                " {{$description}} "
                            </p>
                            <div>
                                <x-secondary-button wire:click="toggleDescription" class="text-sky-600  dark:text-sky-600 ">
                                    <div class="m-auto text-center flex justify-center items-center">
                                        <svg class="w-[19px] h-[19px] " aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                            <path
                                                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                            <path
                                                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                        </svg>
                                        <div class="m-auto ms-2">
                                            Edit
                                        </div>
                                    </div>
                                </x-secondary-button>

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </x-card>

    </div>

    <div class="my-3 mt-5  md:mx-0">


        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 border-t pt-4 border-gray-600 dark:border-400">
            <div class="space-y-4">
                <livewire:iptbm.staff.technology.tech-owner :technology="$technology" />
                <livewire:iptbm.staff.technology.tech-inventor :technology="$technology"/>
                <x-card class="shadow-lg bg-gray-200 dark:bg-gray-800">
                    <livewire:iptbm.staff.technology.tech-research :technology="$technology"/>
                </x-card>
            </div>
            <div>
                <x-card>
                  <livewire:iptbm.staff.technology.ip-protection wire:key="ipProtection" :technology="$technology" />

                </x-card>
                <x-card class="my-3">
                    <livewire:iptbm.staff.technology.tech-trans-pathway :technology="$technology" />

                </x-card>
                <x-card class="my-3">
                    <div class="flex justify-between">
                        <div class="text-gray-600 dark:text-gray-300 font-bold text-lg">
                            Industry / Sector
                        </div>
                        @if($showIndustry)
                            <button wire:click.prevent="toggleShowIndustry"
                                    class="font-medium text-red-600 dark:text-red-500">
                                <i class="fa-solid fa-circle-minus"></i> Close
                            </button>
                        @else
                            <button wire:click.prevent="toggleShowIndustry"
                                    class="font-medium text-blue-600 dark:text-blue-500">
                                <i class="fa-solid fa-circle-plus"></i> Update
                            </button>
                        @endif
                    </div>
                    @if($showIndustry)
                        <div class="mb-4">
                            <div wire:ignore.self class="rounded-lg bg-gray-200 dark:bg-gray-800 p-4">

                                <form wire:submit.prevent="saveIndustry" wire:ignore.self>
                                    <div class="mb-6">
                                        <label for="indus"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Technology
                                            Industries</label>
                                        <select wire:model="industryModel" id="indus"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Choose an Industry</option>
                                            @foreach($techIndustry as $indus)
                                                <option value="{{$indus->id}}">{{$indus->name}}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('industryModel'))
                                            <div
                                                class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                                                role="alert">
                                                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                     viewBox="0 0 20 20">
                                                    <path
                                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                </svg>
                                                <span class="sr-only">Info</span>
                                                <div>
                                                    <span class="font-medium">{{session('industryModel')}}</span>
                                                </div>
                                            </div>
                                        @endif
                                        @error('industryModel')

                                        <div id="alert-border-2"
                                             class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                                             role="alert">
                                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                 viewBox="0 0 20 20">
                                                <path
                                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                            </svg>
                                            <div class="ml-3 text-sm font-medium">
                                                {{$message}}
                                            </div>
                                        </div>
                                        @enderror
                                    </div>
                                    <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Submit
                                    </button>
                                </form>

                            </div>
                        </div>

                    @endif

                   <div class="divide-y divide-gray-400 dark:divide-gray-600">
                       @foreach($industryList as $key=>$val)
                           <livewire:iptbm.staff.technology.industry-details wire:key="industry-{{$val->id}}"
                                                                             :industry="$val"/>
                       @endforeach
                   </div>
                </x-card>

                <x-card class="shadow-lg">
                    <div wire:ignore.self class="flex justify-between mb-3 ">
                        <h1 class="font-medium text-lg text-gray-700 dark:text-gray-400">
                            Technology Status
                        </h1>
                        @if($showStatusForm)
                            <button wire:ignore.self wire:click.prevent="toggleShowStatusForm"
                                    class=" font-medium text-red-600 dark:text-blue-500">
                                <i class="fa-solid fa-circle-minus"></i> Close
                            </button>
                        @else
                            <button wire:ignore.self wire:click.prevent="toggleShowStatusForm"
                                    class=" font-medium text-blue-600 dark:text-blue-500">
                                <i class="fa-solid fa-circle-plus"></i> Update
                            </button>
                        @endif

                    </div>
                    @if($showStatusForm)
                        <div
                            class="border-l bg-gray-200 dark:bg-gray-800 border-r border-t border-b border-opacity-25 border-gray-500 py-2 px-4 mb-4 rounded-lg">
                            <form wire:submit.prevent="saveStatusUpdate">
                                <div class="mb-6">
                                    <label for="countries"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                        an option</label>
                                    <select wire:model="statusModel" id="countries"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                                    </select>
                                    @if(session()->has('statusModel'))
                                        <div
                                            class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                                            role="alert">
                                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                 viewBox="0 0 20 20">
                                                <path
                                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <div>
                                                <span class="font-medium">{{session('statusModel')}}</span>
                                            </div>
                                        </div>
                                    @endif
                                    @error('statusModel')

                                    <div id="alert-border-2"
                                         class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                                         role="alert">
                                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <div class="ml-3 text-sm font-medium">
                                            {{$message}}
                                        </div>
                                    </div>
                                    @enderror
                                </div>
                                <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Submit
                                </button>

                            </form>
                        </div>
                    @endif

                    <div class="w-full">
                        <ol class="relative border-l  border-gray-500 dark:border-gray-400">

                            @foreach($techStatus->reverse() as $key=>$vv)
                                <li class="mb-10 ml-6">
                                    <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                        <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                    </span>
                                    <livewire:iptbm.staff.technology.technology-status wire:key="{{$key}}-stat" :technology="$technology" :techStatus="$vv"/>
                                </li>
                            @endforeach


                        </ol>
                    </div>
                </x-card>


            </div>
        </div>

    </div>


</div>

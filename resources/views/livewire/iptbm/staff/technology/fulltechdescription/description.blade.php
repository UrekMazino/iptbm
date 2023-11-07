<div class="px-4 mt-10 font-sans">
    <div
        class="border-1 border-l border-r  border-t border-b rounded-lg border-gray-300 dark:border-gray-600  mb-4 text-gray-300 bg-gray-300 dark:text-gray-400 dark:bg-gray-800 relative overflow-hidden">
        <div class="grid grid-cols-1 relative overflow-hidden rounded-lg py-24">
            <img src="{{Storage::url($technology_description->technology_profile->tech_photo)}}" alt="Background Image"
                 class="absolute  top-0 left-0 w-full h-full object-cover filter blur">
            <div class="absolute top-0 left-0 w-full h-full bg-black  bg-opacity-75 rounded-lg"></div>
            <div class="z-10 p-4">
                <div class="m-auto w-full md:w-3/4">
                    <div class="mx-auto px-3  ">
                        <div class="mx-auto px-3 text-center text-2xl">
                            {{$technology_description->technology_profile->title}}
                        </div>
                    </div>
                    <hr class="h-px   border-0 bg-gray-400 dark:bg-gray-300">
                    <div class="mx-auto px-3 w-fit text-gray-400 dark:text-gray-400">
                        Technology Title
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="p-0 mt-10 space-y-4">
        <x-grid col="2" gap="4">

            <div>
                <x-card>
                    <div class="space-y-10">
                        <livewire:iptbm.staff.technology.fulltechdescription.add-full-tech-file title="Narrative" univ-key="full-tech-mod-1" data="narrative" :full-tech-description="$technology_description" wire:key="key-mod-1"/>

                        <livewire:iptbm.staff.technology.fulltechdescription.add-full-tech-file title="Process Flow" univ-key="full-tech-mod-2" data="process_flow" :full-tech-description="$technology_description" wire:key="key-mod-2"/>

                        <livewire:iptbm.staff.technology.fulltechdescription.add-full-tech-file title="Technology Requirements" univ-key="full-tech-mod-3" data="requirements" :full-tech-description="$technology_description" wire:key="key-mod-3"/>

                        <livewire:iptbm.staff.technology.fulltechdescription.add-full-tech-file title="Significance of the technology" univ-key="full-tech-mod-4" data="significance_of_technology" :full-tech-description="$technology_description" wire:key="key-mod-4"/>
                        <livewire:iptbm.staff.technology.fulltechdescription.add-full-tech-file title="Limitation of the technology" univ-key="full-tech-mod-5" data="limitation_of_technology" :full-tech-description="$technology_description" wire:key="key-mod-5"/>
                        <livewire:iptbm.staff.technology.fulltechdescription.add-full-tech-file title="Application of the technology" univ-key="full-tech-mod-6" data="application_of_technology" :full-tech-description="$technology_description" wire:key="key-mod-6"/>
                    </div>
                </x-card>
            </div>
            <div class="space-y-4">
                <livewire:iptbm.staff.technology.fulltechdescription.add-full-tech-adopter :full-description="$technology_description" />
                <livewire:iptbm.staff.technology.fulltechdescription.full-tech-photo :full-description="$technology_description" />
            </div>
        </x-grid>

    </div>
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div class="border-1 border-l bg-gray-50 dark:bg-gray-700 shadow-lg border-r border-t border-b border-gray-300 rounded-lg dark:border-gray-600 p-4">

            <ul class="max-w-full divide-y divide-gray-200 dark:divide-gray-600">
                <li class=" sm:pb-4 py-2">
                    <div class="flex items-center space-x-4 ">
                        <div class="flex-shrink-0">
                            <div class="h-fit w-fit border-5 border-gray-900 rounded-full bg-gray-300 dark:bg-blue-900 text-blue-400 p-1">

                                <svg class=" w-6 h-6 text-gray-800 dark:text-blue-300" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M4.5 11H4v1h.5a.5.5 0 0 0 0-1ZM7 5V.13a2.96 2.96 0 0 0-1.293.749L2.879 3.707A2.96 2.96 0 0 0 2.13 5H7Zm3.375 6H10v3h.375a.624.624 0 0 0 .625-.625v-1.75a.624.624 0 0 0-.625-.625Z"/>
                                    <path
                                        d="M19 7h-1V2a1.97 1.97 0 0 0-1.933-2H9v5a2 2 0 0 1-2 2H1a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h1a1.969 1.969 0 0 0 1.933 2h12.134c1.1 0 1.7-1.236 1.856-1.614a.988.988 0 0 0 .07-.386H19a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1ZM4.5 14H4v1a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1h1.5a2.5 2.5 0 1 1 0 5Zm8.5-.625A2.63 2.63 0 0 1 10.375 16H9a1 1 0 0 1-1-1v-5a1 1 0 0 1 1-1h1.375A2.63 2.63 0 0 1 13 11.625v1.75ZM17 12a1 1 0 0 1 0 2h-1v1a1 1 0 0 1-2 0v-5a1 1 0 0 1 1-1h2a1 1 0 1 1 0 2h-1v1h1Z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0 text-2xl">
                            <h1 class="text-gray-600 dark:text-gray-400">
                                Narrative
                            </h1>
                        </div>
                        <div class="inline-flex items-center  font-medium text-gray-900 dark:text-gray-50  text-2xl">
                            <div wire:ignore.self id="narrative" data-modal-backdrop="static" tabindex="-1"
                                 aria-hidden="true"
                                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-lg max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                        <form wire:submit.prevent="saveNarrative">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Narrative
                                                </h3>
                                                <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="narrative">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">

                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                    for="file_input">Upload file</label>
                                                <input wire:model="narrative" accept="application/pdf"
                                                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                       aria-describedby="file_input_help" id="file_input" type="file">
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                                                   id="file_input_help">PDF (max: 20mb).</p>
                                            </div>
                                           @error('narrative')
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




                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button type="submit"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Upload
                                                </button>
                                                <button data-modal-hide="narrative" type="button"
                                                        class="text-gray-500 bg-gray-50 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                    Cancel
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <button data-modal-target="narrative" data-modal-toggle="narrative"
                                    class="text-blue-500  hover:scale-110 transition duration-300 hover:text-blue-700">
                                <i class="fa-solid fa-file-arrow-up"></i> <span class="text-sm">Upload</span>
                            </button>
                            @if($viewNarative)
                                <div class="ms-5">

                                    <!-- Modal toggle -->
                                    <button data-modal-target="staticModal" data-modal-toggle="staticModal"
                                            class="text-blue-500  hover:scale-110 transition duration-300 hover:text-blue-700"
                                            type="button">
                                        <i class="fa-solid fa-file-pdf"></i> <span class="text-sm">Open</span>
                                    </button>

                                    <!-- Main modal -->
                                    <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                                         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-7xl ">
                                            <!-- Modal content -->
                                            <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->

                                                <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="staticModal">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <!-- Modal body -->
                                                <div class="p-9  space-y-6 h-[calc(90vh-5rem)]">
                                                    <iframe class="w-full h-full" src="{{Storage::url($viewNarative)}}"></iframe>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </li>
                <li class=" sm:pb-4 py-2">
                    <div class="flex items-center space-x-4 ">
                        <div class="flex-shrink-0">
                            <div
                                class="h-fit w-fit border-5 border-gray-900 rounded-full bg-gray-300 dark:bg-blue-900 text-blue-400 p-1">

                                <svg class="w-6 h-6 text-gray-800 dark:text-blue-300" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                                    <path fill="currentColor"
                                          d="M11.045 7.514a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Zm-4.572 3.072L3.857 15.92h7.949l-1.811-3.37-1.61 2.716-1.912-4.679Z"/>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M6 1v4a1 1 0 0 1-1 1H1m14 12a.97.97 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2v16ZM11.045 7.514a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM3.857 15.92l2.616-5.333 1.912 4.68 1.61-2.717 1.81 3.37H3.858Z"/>
                                </svg>
                            </div>

                        </div>
                        <div class="flex-1 min-w-0 text-2xl">
                            <h1 class="text-gray-600 dark:text-gray-400">
                                Technology Pictures
                            </h1>
                        </div>
                        <div class="inline-flex items-center  font-medium text-gray-900 dark:text-gray-50  text-2xl">
                            <div wire:ignore.self id="technologyPicture" data-modal-backdrop="static" tabindex="-1"
                                 aria-hidden="true"
                                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-lg max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                        <form wire:submit.prevent="saveTechnologyPicture">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Technology Picture
                                                </h3>
                                                <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="technologyPicture">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">

                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                    for="technologyPicture">Upload file</label>
                                                <input wire:model="technologyPicture" accept="application/pdf"
                                                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                       aria-describedby="file_input_help" id="technologyPicture" type="file">
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                                                   id="file_input_help">PDF (max: 20mb).</p>
                                            </div>
                                            @error('technologyPicture')
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




                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button type="submit"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    I accept
                                                </button>
                                                <button data-modal-hide="technologyPicture" type="button"
                                                        class="text-gray-500 bg-gray-50 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                    Decline
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <button data-modal-target="technologyPicture" data-modal-toggle="technologyPicture"
                                    class="text-blue-500  hover:scale-110 transition duration-300 hover:text-blue-700">
                                <i class="fa-solid fa-file-arrow-up"></i> <span class="text-sm">Upload</span>
                            </button>
                            @if($viewTechnologyPicture)
                                <div class="ms-5">

                                    <!-- Modal toggle -->
                                    <button data-modal-target="viewTechnologyPicture" data-modal-toggle="viewTechnologyPicture"
                                            class="text-blue-500  hover:scale-110 transition duration-300 hover:text-blue-700"
                                            type="button">
                                        <i class="fa-solid fa-file-pdf"></i> <span class="text-sm">Open</span>
                                    </button>

                                    <!-- Main modal -->
                                    <div id="viewTechnologyPicture" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                                         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-7xl ">
                                            <!-- Modal content -->
                                            <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->

                                                <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="viewTechnologyPicture">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <!-- Modal body -->
                                                <div class="p-9  space-y-6 h-[calc(90vh-5rem)]">
                                                    <iframe class="w-full h-full" src="{{Storage::url($viewTechnologyPicture)}}"></iframe>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </li>
                <li class=" sm:pb-4 py-2">
                    <div class="flex items-center space-x-4 ">
                        <div
                            class="h-fit w-fit border-5 border-gray-900 rounded-full bg-gray-300 dark:bg-blue-900 text-blue-400 p-1">
                            <svg class="w-6 h-6 text-gray-800 dark:text-blue-300" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 14 3-3m-3 3 3 3m-3-3h16v-3m2-7-3 3m3-3-3-3m3 3H3v3"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0 text-2xl">
                            <h1 class="text-gray-600 dark:text-gray-400">
                                Process Flow
                            </h1>
                        </div>
                        <div class="inline-flex items-center  font-medium text-gray-900 dark:text-gray-50  text-2xl">
                            <div wire:ignore.self id="processFlow" data-modal-backdrop="static" tabindex="-1"
                                 aria-hidden="true"
                                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-lg max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                        <form wire:submit.prevent="saveProcessFlow">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Process Flow
                                                </h3>
                                                <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="processFlow">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">

                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                    for="processFlow">Upload file</label>
                                                <input wire:model="processFlow" accept="application/pdf"
                                                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                       aria-describedby="file_input_help" id="processFlow" type="file">
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                                                   id="file_input_help">PDF (max: 20mb).</p>
                                            </div>
                                            @error('processFlow')
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




                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button type="submit"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    I accept
                                                </button>
                                                <button data-modal-hide="processFlow" type="button"
                                                        class="text-gray-500 bg-gray-50 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                    Decline
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <button data-modal-target="processFlow" data-modal-toggle="processFlow"
                                    class="text-blue-500  hover:scale-110 transition duration-300 hover:text-blue-700">
                                <i class="fa-solid fa-file-arrow-up"></i> <span class="text-sm">Upload</span>
                            </button>
                            @if($viewProcessFlow)
                                <div class="ms-5">

                                    <!-- Modal toggle -->
                                    <button data-modal-target="viewProcessFlow" data-modal-toggle="viewProcessFlow"
                                            class="text-blue-500  hover:scale-110 transition duration-300 hover:text-blue-700"
                                            type="button">
                                        <i class="fa-solid fa-file-pdf"></i> <span class="text-sm">Open</span>
                                    </button>

                                    <!-- Main modal -->
                                    <div id="viewProcessFlow" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                                         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-7xl ">
                                            <!-- Modal content -->
                                            <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->

                                                <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="viewProcessFlow">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <!-- Modal body -->
                                                <div class="p-9  space-y-6 h-[calc(90vh-5rem)]">
                                                    <iframe class="w-full h-full" src="{{Storage::url($viewProcessFlow)}}"></iframe>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </li>
                <li class=" sm:pb-4 py-2">
                    <div class="flex items-center space-x-4 ">
                        <div
                            class="h-fit w-fit border-5 border-gray-900 rounded-full bg-gray-300 dark:bg-blue-900 text-blue-400 p-1">
                            <svg class="w-6 h-6 text-gray-800 dark:text-blue-300" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                <path
                                    d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2Zm-3 15H4.828a1 1 0 0 1 0-2h6.238a1 1 0 0 1 0 2Zm0-4H4.828a1 1 0 0 1 0-2h6.238a1 1 0 1 1 0 2Z"/>
                                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0 text-2xl">
                            <h1 class="text-gray-600 dark:text-gray-400">
                                Requirements
                            </h1>
                        </div>
                        <div class="inline-flex items-center  font-medium text-gray-900 dark:text-gray-50  text-2xl">
                            <div wire:ignore.self id="requirements" data-modal-backdrop="static" tabindex="-1"
                                 aria-hidden="true"
                                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-lg max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                        <form wire:submit.prevent="saveRequirements">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Requirements
                                                </h3>
                                                <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="requirements">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">

                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                    for="file_input">Upload file</label>
                                                <input wire:model="requirements" accept="application/pdf"
                                                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                       aria-describedby="file_input_help" id="file_input" type="file">
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                                                   id="file_input_help">PDF (max: 20mb).</p>
                                            </div>
                                            @error('requirements')
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




                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button type="submit"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    I accept
                                                </button>
                                                <button data-modal-hide="requirements" type="button"
                                                        class="text-gray-500 bg-gray-50 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                    Decline
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <button data-modal-target="requirements" data-modal-toggle="requirements"
                                    class="text-blue-500  hover:scale-110 transition duration-300 hover:text-blue-700">
                                <i class="fa-solid fa-file-arrow-up"></i> <span class="text-sm">Upload</span>
                            </button>
                            @if($viewRequirements)
                                <div class="ms-5">

                                    <!-- Modal toggle -->
                                    <button data-modal-target="viewRequirements" data-modal-toggle="viewRequirements"
                                            class="text-blue-500  hover:scale-110 transition duration-300 hover:text-blue-700"
                                            type="button">
                                        <i class="fa-solid fa-file-pdf"></i> <span class="text-sm">Open</span>
                                    </button>

                                    <!-- Main modal -->
                                    <div id="viewRequirements" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                                         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-7xl ">
                                            <!-- Modal content -->
                                            <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->

                                                <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="viewRequirements">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <!-- Modal body -->
                                                <div class="p-9  space-y-6 h-[calc(90vh-5rem)]">
                                                    <iframe class="w-full h-full" src="{{Storage::url($viewRequirements)}}"></iframe>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </li>
                <li class=" sm:pb-4 py-2">
                    <div class="flex items-center space-x-4 ">
                        <div
                            class="h-fit w-fit border-5 border-gray-900 rounded-full bg-gray-300 dark:bg-blue-900 text-blue-400 p-1">
                            <svg class="w-6 h-6 text-gray-800 dark:text-blue-300" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M7 19H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2v4M6 1v4a1 1 0 0 1-1 1H1m11 8h4m-2 2v-4m5 2a5 5 0 1 1-10 0 5 5 0 0 1 10 0Z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0 text-2xl">
                            <h1 class="text-gray-600 dark:text-gray-400">
                                Other Documents
                            </h1>
                        </div>
                        <div class="inline-flex items-center  font-medium text-gray-900 dark:text-gray-50  text-2xl">
                            <div wire:ignore.self id="otherDocuments" data-modal-backdrop="static" tabindex="-1"
                                 aria-hidden="true"
                                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-lg max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                        <form wire:submit.prevent="saveOtherDocuments">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Other Documents
                                                </h3>
                                                <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="otherDocuments">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">

                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                    for="file_input">Upload file</label>
                                                <input wire:model="otherDocuments" accept="application/pdf"
                                                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                       aria-describedby="file_input_help" id="file_input" type="file">
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                                                   id="file_input_help">PDF (max: 20mb).</p>
                                            </div>
                                            @error('otherDocuments')
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




                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button type="submit"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    I accept
                                                </button>
                                                <button data-modal-hide="otherDocuments" type="button"
                                                        class="text-gray-500 bg-gray-50 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                    Decline
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <button data-modal-target="otherDocuments" data-modal-toggle="otherDocuments"
                                    class="text-blue-500  hover:scale-110 transition duration-300 hover:text-blue-700">
                                <i class="fa-solid fa-file-arrow-up"></i> <span class="text-sm">Upload</span>
                            </button>
                            @if($viewOtherDocuments)
                                <div class="ms-5">

                                    <!-- Modal toggle -->
                                    <button data-modal-target="viewOtherDocuments" data-modal-toggle="viewOtherDocuments"
                                            class="text-blue-500  hover:scale-110 transition duration-300 hover:text-blue-700"
                                            type="button">
                                        <i class="fa-solid fa-file-pdf"></i> <span class="text-sm">Open</span>
                                    </button>

                                    <!-- Main modal -->
                                    <div id="viewOtherDocuments" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                                         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-7xl ">
                                            <!-- Modal content -->
                                            <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->

                                                <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="viewOtherDocuments">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <!-- Modal body -->
                                                <div class="p-9  space-y-6 h-[calc(90vh-5rem)]">
                                                    <iframe class="w-full h-full" src="{{Storage::url($viewOtherDocuments)}}"></iframe>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </li>
                <li class=" sm:pb-4 py-2">
                    <div class="flex items-center space-x-4 ">
                        <div
                            class="h-fit w-fit border-5 border-gray-900 rounded-full bg-gray-300 dark:bg-blue-900 text-blue-400 p-1">
                            <svg class="w-6 h-6 text-gray-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0 text-2xl">
                            <h1 class="text-gray-600 dark:text-gray-400">
                                Significance of the technology
                            </h1>
                        </div>
                        <div class="inline-flex items-center  font-medium text-gray-900 dark:text-gray-50  text-2xl">
                            <div wire:ignore.self id="techSignificant" data-modal-backdrop="static" tabindex="-1"
                                 aria-hidden="true"
                                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-lg max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                        <form wire:submit.prevent="saveTechSignificant">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Significance of the technology
                                                </h3>
                                                <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="techSignificant">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">

                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                    for="file_input">Upload file</label>
                                                <input wire:model="techSignificant" accept="application/pdf"
                                                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                       aria-describedby="file_input_help" id="file_input" type="file">
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                                                   id="file_input_help">PDF (max: 20mb).</p>
                                            </div>
                                            @error('techSignificant')
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




                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button type="submit"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    I accept
                                                </button>
                                                <button data-modal-hide="techSignificant" type="button"
                                                        class="text-gray-500 bg-gray-50 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                    Decline
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <button data-modal-target="techSignificant" data-modal-toggle="techSignificant"
                                    class="text-blue-500  hover:scale-110 transition duration-300 hover:text-blue-700">
                                <i class="fa-solid fa-file-arrow-up"></i> <span class="text-sm">Upload</span>
                            </button>
                            @if($viewTechSignificant)
                                <div class="ms-5">

                                    <!-- Modal toggle -->
                                    <button data-modal-target="viewTechSignificant" data-modal-toggle="viewTechSignificant"
                                            class="text-blue-500  hover:scale-110 transition duration-300 hover:text-blue-700"
                                            type="button">
                                        <i class="fa-solid fa-file-pdf"></i> <span class="text-sm">Open</span>
                                    </button>

                                    <!-- Main modal -->
                                    <div id="viewTechSignificant" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                                         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-7xl ">
                                            <!-- Modal content -->
                                            <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->

                                                <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="viewTechSignificant">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <!-- Modal body -->
                                                <div class="p-9  space-y-6 h-[calc(90vh-5rem)]">
                                                    <iframe class="w-full h-full" src="{{Storage::url($viewTechSignificant)}}"></iframe>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </li>
                <li class=" sm:pb-4 py-2">
                    <div class="flex items-center space-x-4 ">
                        <div
                            class="h-fit w-fit border-5 border-gray-900 rounded-full bg-gray-300 dark:bg-blue-900 text-blue-400 p-1">
                            <svg class="w-6 h-6 text-gray-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9h2v5m-2 0h4M9.408 5.5h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0 text-2xl">
                            <h1 class="text-gray-600 dark:text-gray-400">
                                Limitations of the technology
                            </h1>
                        </div>
                        <div class="inline-flex items-center  font-medium text-gray-900 dark:text-gray-50  text-2xl">
                            <div wire:ignore.self id="techLimmitation" data-modal-backdrop="static" tabindex="-1"
                                 aria-hidden="true"
                                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-lg max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                        <form wire:submit.prevent="saveTechLimmitation">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Limitations of the technology
                                                </h3>
                                                <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="techLimmitation">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">

                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                    for="file_input">Upload file</label>
                                                <input wire:model="techLimmitation" accept="application/pdf"
                                                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                       aria-describedby="file_input_help" id="file_input" type="file">
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                                                   id="file_input_help">PDF (max: 20mb).</p>
                                            </div>
                                            @error('techLimmitation')
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




                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button type="submit"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Save
                                                </button>
                                                <button data-modal-hide="techLimmitation" type="button"
                                                        class="text-gray-500 bg-gray-50 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                    Decline
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <button data-modal-target="techLimmitation" data-modal-toggle="techLimmitation"
                                    class="text-blue-500  hover:scale-110 transition duration-300 hover:text-blue-700">
                                <i class="fa-solid fa-file-arrow-up"></i> <span class="text-sm">Upload</span>
                            </button>
                            @if($viewTechLimmitation)
                                <div class="ms-5">

                                    <!-- Modal toggle -->
                                    <button data-modal-target="viewTechLimmitation" data-modal-toggle="viewTechLimmitation"
                                            class="text-blue-500  hover:scale-110 transition duration-300 hover:text-blue-700"
                                            type="button">
                                        <i class="fa-solid fa-file-pdf"></i> <span class="text-sm">Open</span>
                                    </button>

                                    <!-- Main modal -->
                                    <div id="viewTechLimmitation" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                                         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-7xl ">
                                            <!-- Modal content -->
                                            <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="viewTechLimmitation">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <!-- Modal body -->
                                                <div class="p-9  space-y-6 h-[calc(90vh-5rem)]">
                                                    <iframe class="w-full h-full" src="{{Storage::url($viewTechLimmitation)}}"></iframe>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </li>
            </ul>

        </div>
        <div class="border-1 border-l border-r border-t border-b border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600 p-4">
            <ul class="max-w-full divide-y divide-gray-200 dark:divide-gray-600">
                <li class=" sm:pb-4 py-2">
                    <div class="flex items-center space-x-4 ">
                        <div
                            class="h-fit w-fit border-5 border-gray-900 rounded-full bg-gray-300 dark:bg-blue-900 text-blue-400 p-1">
                            <svg class="w-6 h-6 text-gray-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
                            </svg>

                        </div>
                        <div class="flex-1 min-w-0 text-2xl">
                            <h1 class="text-gray-600 dark:text-gray-400">
                                Adoptors
                            </h1>
                        </div>
                        <div wire:ignore.self id="potential_Adopter" data-modal-backdrop="static" tabindex="-1"
                             aria-hidden="true"
                             class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-lg max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                    <form wire:submit.prevent="saveAdoptor">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Potential / Actual Adopters
                                            </h3>
                                            <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="potential_Adopter">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                     xmlns="http://www.w3.org/2000/svg" fill="none"
                                                     viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"
                                                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-6 space-y-6">
                                            @if($showOtherAdoptors)
                                                <div class="mb-6">
                                                    <label for="other_adopter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Adoptors</label>
                                                    <input wire:model.lazy="adoptorModel" type="text" id="other_adopter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter text here" required>
                                                </div>
                                            @else
                                                <label for="adopt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Adoptors</label>
                                                <select wire:model="adoptorModel" id="adopt" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option selected>Choose an Adoptor</option>
                                                    @foreach($adaptors as $adaptor)
                                                        <option value="{{$adaptor->name}}">{{$adaptor->name}}</option>
                                                    @endforeach
                                                </select>
                                            @endif

                                            <div>
                                                @error('adoptorModel')
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
                                                <button wire:click.prevent="showOtherAdoptors" class="font-medium text-blue-600 dark:text-blue-500 " type="button">
                                                    Add other potential adopter
                                                </button>
                                            </div>


                                        </div>





                                        <!-- Modal footer -->
                                        <div
                                            class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Save
                                            </button>
                                            <button data-modal-hide="potential_Adopter" type="button" class="text-gray-500 bg-gray-50 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                Cancel
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <button data-modal-target="potential_Adopter" data-modal-toggle="potential_Adopter"
                                class="text-blue-500 font-medium  hover:scale-110 transition duration-300 hover:text-blue-700">
                            <i class="fa-solid fa-file-arrow-up"></i> <span class="text-sm">Update</span>
                        </button>
                    </div>
                    <div class="w-full mt-3">
                        <dl class="max-w-md  text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-600">
                            @foreach($technology_description->adoptors as $adaptor)

                                <livewire:iptbm.staff.technology.fulltechdescription.technology-adoptor  wire:key="{{$adaptor->id}} " :techAdoptor="$adaptor" />
                            @endforeach
                        </dl>
                    </div>
                </li>
                <li class=" sm:pb-4 py-2">
                    <div class="flex items-center space-x-4 ">
                        <div
                            class="h-fit w-fit border-5 border-gray-900 rounded-full bg-gray-300 dark:bg-blue-900 text-blue-400 p-1">
                            <svg class="w-6 h-6 text-gray-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.143 1H1.857A.857.857 0 0 0 1 1.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 7 6.143V1.857A.857.857 0 0 0 6.143 1Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 17 6.143V1.857A.857.857 0 0 0 16.143 1Zm-10 10H1.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 7 16.143v-4.286A.857.857 0 0 0 6.143 11Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0 text-2xl">
                            <h1 class="text-gray-600 dark:text-gray-400">
                               Application of Technology
                            </h1>
                        </div>
                        <div class="inline-flex items-center  font-medium text-gray-900 dark:text-gray-50  text-2xl">
                            <div wire:ignore.self id="techApplication" data-modal-backdrop="static" tabindex="-1"
                                 aria-hidden="true"
                                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-lg max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                        <form wire:submit.prevent="saveTechApplication">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Application of Technology
                                                </h3>
                                                <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="techApplication">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">

                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                    for="file_input">Upload file</label>
                                                <input wire:model="techApplication" accept="application/pdf"
                                                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                       aria-describedby="file_input_help" id="file_input" type="file">
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                                                   id="file_input_help">PDF (max: 20mb).</p>
                                            </div>
                                            @error('techApplication')
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




                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button type="submit"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    I accept
                                                </button>
                                                <button data-modal-hide="techApplication" type="button"
                                                        class="text-gray-500 bg-gray-50 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                    Decline
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <button data-modal-target="techApplication" data-modal-toggle="techApplication"
                                    class="text-blue-500  hover:scale-110 transition duration-300 hover:text-blue-700">
                                <i class="fa-solid fa-file-arrow-up"></i> <span class="text-sm">Upload</span>
                            </button>
                            @if($viewTechApplication)
                                <div class="ms-5">

                                    <!-- Modal toggle -->
                                    <button data-modal-target="viewTechApplication" data-modal-toggle="viewTechApplication"
                                            class="text-blue-500  hover:scale-110 transition duration-300 hover:text-blue-700"
                                            type="button">
                                        <i class="fa-solid fa-file-pdf"></i> <span class="text-sm">Open</span>
                                    </button>

                                    <!-- Main modal -->
                                    <div id="viewTechApplication" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                                         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-7xl ">
                                            <!-- Modal content -->
                                            <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->

                                                <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="viewTechApplication">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <!-- Modal body -->
                                                <div class="p-9  space-y-6 h-[calc(90vh-5rem)]">
                                                    <iframe class="w-full h-full" src="{{Storage::url($viewTechApplication)}}"></iframe>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </li>
                <li class=" sm:pb-4 py-2">
                    <div class="flex items-center space-x-4 ">
                        <div
                            class="h-fit w-fit border-5 border-gray-900 rounded-full bg-gray-300 dark:bg-blue-900 text-blue-400 p-1">
                            <svg class="w-6 h-6 text-gray-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 14h6m-3 3v-6M1.857 1h4.286c.473 0 .857.384.857.857v4.286A.857.857 0 0 1 6.143 7H1.857A.857.857 0 0 1 1 6.143V1.857C1 1.384 1.384 1 1.857 1Zm10 0h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857h-4.286A.857.857 0 0 1 11 6.143V1.857c0-.473.384-.857.857-.857Zm-10 10h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857H1.857A.857.857 0 0 1 1 16.143v-4.286c0-.473.384-.857.857-.857Z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0 text-2xl">
                            <h1 class="text-gray-600 dark:text-gray-400">
                                Other Possible Application of Technology
                            </h1>
                        </div>
                        <div class="inline-flex items-center  font-medium text-gray-900 dark:text-gray-50  text-2xl">
                            <div wire:ignore.self id="otherApplications" data-modal-backdrop="static" tabindex="-1"
                                 aria-hidden="true"
                                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-lg max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                        <form wire:submit.prevent="saveOtherApplications">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                   Other Possible Application of Technology
                                                </h3>
                                                <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="otherApplications">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">

                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                    for="file_input">Upload file</label>
                                                <input wire:model="otherApplications" accept="application/pdf"
                                                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                       aria-describedby="file_input_help" id="file_input" type="file">
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                                                   id="file_input_help">PDF (max: 20mb).</p>
                                            </div>
                                            @error('otherApplications')
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




                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button type="submit"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    I accept
                                                </button>
                                                <button data-modal-hide="otherApplications" type="button"
                                                        class="text-gray-500 bg-gray-50 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                    Decline
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <button data-modal-target="otherApplications" data-modal-toggle="otherApplications"
                                    class="text-blue-500  hover:scale-110 transition duration-300 hover:text-blue-700">
                                <i class="fa-solid fa-file-arrow-up"></i> <span class="text-sm">Upload</span>
                            </button>
                            @if($viewOtherApplications)
                                <div class="ms-5">

                                    <!-- Modal toggle -->
                                    <button data-modal-target="viewOtherApplications" data-modal-toggle="viewOtherApplications"
                                            class="text-blue-500  hover:scale-110 transition duration-300 hover:text-blue-700"
                                            type="button">
                                        <i class="fa-solid fa-file-pdf"></i> <span class="text-sm">Open</span>
                                    </button>

                                    <!-- Main modal -->
                                    <div id="viewOtherApplications" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                                         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-7xl ">
                                            <!-- Modal content -->
                                            <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->

                                                <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="viewOtherApplications">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <!-- Modal body -->
                                                <div class="p-9  space-y-6 h-[calc(90vh-5rem)]">
                                                    <iframe class="w-full h-full" src="{{Storage::url($viewOtherApplications)}}"></iframe>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </li>
            </ul>


        </div>

    </div>

</div>

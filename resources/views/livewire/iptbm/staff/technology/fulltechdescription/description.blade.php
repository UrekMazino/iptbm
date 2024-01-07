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
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-x-10 border-t pt-4 border-gray-600 dark:border-400">
            <div class="space-y-10">
                <x-card>
                    <div class="space-y-10">
                        <livewire:iptbm.staff.technology.fulltechdescription.add-full-tech-file title="Narrative"
                                                                                                univ-key="full-tech-mod-1"
                                                                                                data="narrative"
                                                                                                :full-tech-description="$technology_description"
                                                                                                wire:key="key-mod-1"/>

                        <livewire:iptbm.staff.technology.fulltechdescription.add-full-tech-file title="Process Flow"
                                                                                                univ-key="full-tech-mod-2"
                                                                                                data="process_flow"
                                                                                                :full-tech-description="$technology_description"
                                                                                                wire:key="key-mod-2"/>

                        <livewire:iptbm.staff.technology.fulltechdescription.add-full-tech-file
                            title="Technology Requirements" univ-key="full-tech-mod-3" data="requirements"
                            :full-tech-description="$technology_description" wire:key="key-mod-3"/>

                        <livewire:iptbm.staff.technology.fulltechdescription.add-full-tech-file
                            title="Significance of the technology" univ-key="full-tech-mod-4"
                            data="significance_of_technology" :full-tech-description="$technology_description"
                            wire:key="key-mod-4"/>
                        <livewire:iptbm.staff.technology.fulltechdescription.add-full-tech-file
                            title="Limitation of the technology" univ-key="full-tech-mod-5"
                            data="limitation_of_technology" :full-tech-description="$technology_description"
                            wire:key="key-mod-5"/>
                        <livewire:iptbm.staff.technology.fulltechdescription.add-full-tech-file
                            title="Application of the technology" univ-key="full-tech-mod-6"
                            data="application_of_technology" :full-tech-description="$technology_description"
                            wire:key="key-mod-6"/>
                        <livewire:iptbm.staff.technology.fulltechdescription.add-full-tech-file
                            title="Other Possible Application " univ-key="full-tech-mod-7" data="other_application"
                            :full-tech-description="$technology_description" wire:key="key-mod-7"/>
                    </div>
                </x-card>
            </div>
            <div class="space-y-4">
                <livewire:iptbm.staff.technology.fulltechdescription.add-full-tech-adopter
                    :full-description="$technology_description"/>
                <livewire:iptbm.staff.technology.fulltechdescription.other-docs
                    :full-description="$technology_description"/>
                <livewire:iptbm.staff.technology.fulltechdescription.full-tech-photo
                    :full-description="$technology_description"/>

            </div>
        </div>

    </div>


</div>

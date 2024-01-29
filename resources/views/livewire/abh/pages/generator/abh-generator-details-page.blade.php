<x-header-label class="mt-10">
    Technology Generators Details
</x-header-label>
<div class=" md:px-4">

    <x-grid col="3" gap="4">
        <div class="md:col-span-2">
            <x-card-panel>
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    <div class="md:col-span-2 border border-gray-200 dark:border-gray-600 rounded gap-2 p-2">
                        <div class="p-5">
                            <div class=" rounded-full
                                 bg-gradient-to-tr  from-gray-900 to-gray-100 aspect-square border-gray-400 dark:border-gray-200  overflow-hidden border-8
                                ">
                                <svg class="w-full h-full text-gray-200 dark:text-gray-200" viewBox="0 0 96 96" fill="currentColor" xmlns="http://www.w3.org/2000/svg" id="Icons_Welder" overflow="hidden">
                                    <path d="M58 13 38 13C34.6863 13 32 15.6863 32 19L32 37.17C32.0055 44.2535 37.7465 49.9945 44.83 50L51.17 50C58.2535 49.9945 63.9945 44.2535 64 37.17L64 19C64 15.6863 61.3137 13 58 13ZM58 36 38 36 38 25 58 25ZM57 21.5 39 21.5C38.4477 21.5 38 21.0523 38 20.5 38 19.9477 38.4477 19.5 39 19.5L57 19.5C57.5523 19.5 58 19.9477 58 20.5 58 21.0523 57.5523 21.5 57 21.5Z"></path>
                                    <path d="M38 66 58 66 58 52.48C52.1547 57.16 43.8453 57.16 38 52.48Z"></path>
                                    <path d="M76.8 59.6C73.1566 56.9892 69.1902 54.8615 65 53.27L65 66C66.6569 66 68 67.3431 68 69L68 82 80 82 80 66C79.9478 63.4946 78.773 61.1451 76.8 59.6Z"></path>
                                    <path d="M28 82 28 69C28 67.3431 29.3431 66 31 66L31 53.22C27.2585 54.513 23.7198 56.3312 20.49 58.62 20.4954 58.7133 20.4954 58.8067 20.49 58.9L20.49 70.8C22.665 72.3428 23.9698 74.8336 24 77.5 23.9956 79.1035 23.5153 80.6697 22.62 82Z"></path>
                                    <path d="M18.52 71.89 18.52 58.89C18.5288 58.516 18.3843 58.1547 18.12 57.89L14.81 54.58 15.14 54.25 14.93 52.78 10.75 51.53C9.16 48 6.23 46.1 2.02 45.53 2.96022 49.2486 5.97166 52.0845 9.74 52.8L10.95 56.8 12.42 57.01 12.9 56.52 15.82 59.43 15.82 71.03C15.5474 71.0048 15.2737 70.9948 15 71 11.13 71 9 71 9 77.5 9 84 11.13 84 15 84 18.7268 84.1351 21.859 81.2266 22 77.5 21.9662 75.1305 20.6278 72.973 18.52 71.89Z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="border border-gray-200 dark:border-gray-600 p-2 rounded">
                            <livewire:abh.generator.generator-status :generator="$generator" />
                        </div>
                    </div>
                    <div class="md:col-span-3 h-full flex justify-start items-center">
                        <div class="w-full space-y-4">
                            <livewire:abh.generator.generators-name :generator="$generator" />

                            <livewire:abh.generator.generators-address :generator="$generator"/>
                        </div>
                    </div>
                </div>
            </x-card-panel>
        </div>
        <div>
            <x-card-panel>

            </x-card-panel>
        </div>
    </x-grid>
</div>

<div class="my-2  mx-4 md:mx-0  ">
    <div class="divide-y divide-slate-200">
        <!-- Accordion item -->
        <div x-data="{ expanded: false  }" class="py-2">
            <h2>
                <button
                    id="faqs-title-industry-{{$industry->industry->id}}"
                    type="button"
                    class="flex items-center justify-between w-full text-left font-semibold py-2"
                    @click="expanded = !expanded"
                    :aria-expanded="expanded"
                    aria-controls="faqs-text-industry-{{$industry->industry->id}}"
                >
                    <div>
                        <span class="flex-1  text-left whitespace-nowrap">{{$industry->industry->name}}</span>
                    </div>


                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
            </h2>
            <div
                id="faqs-text-industry-{{$industry->industry->id}}"
                role="region"
                aria-labelledby="faqs-title-industry-{{$industry->industry->id}}"
                class="grid text-sm text-slate-600 overflow-hidden transition-all duration-300 ease-in-out"
                :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'"
            >
                <div class="overflow-hidden">
                    <div class="py-3  space-y-2 ">
                        <div class="border border-gray-300 dark:border-gray-600 p-4 rounded">
                            <div class="flex justify-between mb-4">
                                <div class="font-medium  text-gray-500 dark:text-gray-400">
                                    <x-item-header>
                                        Commodities
                                    </x-item-header>
                                </div>

                                <x-secondary-button class="text-sky-500 dark:text-sky-500" data-modal-toggle="commodity-{{$industry->id}}">
                                    Update
                                </x-secondary-button>
                                <x-pop-modal class="max-w-lg" name="commodity-{{$industry->id}}" modal-title="Update Commodities">
                                    <form class="space-y-6" wire:submit.prevent="saveCommodity">

                                        <div class="space-y-4">
                                            @if($showOtherCommodity)
                                               <div>
                                                   <x-input-label value="{{ucwords(strtolower($industry->industry->name))}} Commodities" for="otherCom-{{$industry->id}}"/>
                                                   <x-text-input id="otherCom-{{$industry->id}}" wire:model.lazy="techCommodity" class="w-full" placeholder="enter text here" required />
                                               </div>
                                            <x-link-button wire:loading.attr="disabled" wire:target="toggleShowOtherCommodity" wire:click.prevent="toggleShowOtherCommodity">
                                                <div wire:loading wire:target="toggleShowOtherCommodity">

                                                    <div role="status">
                                                        <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                                        </svg>
                                                        <span class="sr-only">Loading...</span>
                                                    </div>

                                                </div>
                                                <div class="gap-4 flex justify-start" wire:target="toggleShowOtherCommodity" wire:loading.remove>
                                                    Select from existing
                                                    <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                                        <path d="m19.822 7.431-4.846-7A1 1 0 0 0 14.153 0H1a1 1 0 0 0-.822 1.569L4.63 8 .178 14.431A1 1 0 0 0 1 16h13.153a1.001 1.001 0 0 0 .823-.431l4.846-7a1 1 0 0 0 0-1.138Z"/>
                                                    </svg>

                                                </div>
                                            </x-link-button>

                                            @else
                                               <div>

                                                   <x-input-label value="{{ucwords(strtolower($industry->industry->name))}} Commodities" for="Com-{{$industry->id}}"/>
                                                   <x-input-select wire:model="techCommodity" id="Com-{{$industry->id}}">
                                                       <option value="" selected>Choose a Commodity</option>
                                                       @foreach($commodities as $commodity)
                                                           <option
                                                               value="{{$commodity->name}}">{{$commodity->name}}</option>
                                                       @endforeach
                                                   </x-input-select>
                                               </div>

                                                <x-link-button wire:loading.attr="disabled" wire:target="toggleShowOtherCommodity" wire:click.prevent="toggleShowOtherCommodity">
                                                    <div wire:loading wire:target="toggleShowOtherCommodity">
                                                        <div role="status">
                                                            <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                                            </svg>
                                                            <span class="sr-only">Loading...</span>
                                                        </div>
                                                    </div>
                                                    <div class="gap-4 flex justify-start" wire:target="toggleShowOtherCommodity" wire:loading.remove>
                                                        Other Commodity
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                                            <path d="m19.822 7.431-4.846-7A1 1 0 0 0 14.153 0H1a1 1 0 0 0-.822 1.569L4.63 8 .178 14.431A1 1 0 0 0 1 16h13.153a1.001 1.001 0 0 0 .823-.431l4.846-7a1 1 0 0 0 0-1.138Z"/>
                                                        </svg>
                                                    </div>
                                                </x-link-button>

                                            @endif
                                            @if(session()->has('techCommodity'))
                                                <x-alert-success :message="session('techCommodity')"/>
                                            @endif
                                                <x-input-error :messages="$errors->get('techCommodity')"/>
                                        </div>
                                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveCommodity">
                                            <div wire:loading wire:target="saveCommodity" class="p-2 w-full text-center">
                                                Processing...
                                            </div>
                                            <div wire:loading.remove wire:target="saveCommodity" class="p-2 w-full text-center">
                                                Submit
                                            </div>
                                        </x-submit-button>

                                    </form>
                                </x-pop-modal>


                            </div>

                            <ul class="divide-y divide-gray-400 divide-gray-600">
                                @foreach($techCommodityList as $list)
                                    <li>
                                        <livewire:iptbm.staff.technology.tech-commodity-list
                                            wire:key="commodity-{{$list->id}}" :commodity="$list"/>
                                    </li>

                                @endforeach
                            </ul>
                        </div>

                        <div class="border border-gray-300 dark:border-gray-600 p-4 rounded">
                            <div class="flex justify-between mb-4">
                                <div class="font-medium  text-gray-500 dark:text-gray-400">
                                    <x-item-header>
                                        Categories
                                    </x-item-header>
                                </div>
                                <x-secondary-button class="text-sky-500 dark:text-sky-500" data-modal-toggle="category-{{$industry->id}}">
                                    Update
                                </x-secondary-button>
                                <x-pop-modal class="max-w-lg" name="category-{{$industry->id}}">
                                    <form class="space-y-6" wire:submit.prevent="saveCategory">
                                        <div class="space-y-4">
                                            @if($showOtherCategory)
                                                <div>
                                                    <x-input-label value="{{ucwords(strtolower($industry->industry->name))}} Categories" for="otherCom-{{$industry->id}}"/>
                                                </div>
                                                <label for="othercat"
                                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter
                                                    Category</label>
                                                <input wire:model="techCategory" type="text" id="othercat"
                                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                       placeholder="enter text here" required>

                                                <x-link-button wire:loading.attr="disabled" wire:target="toggleShowOtherCategory" wire:click.prevent="toggleShowOtherCategory">
                                                    <div wire:loading wire:target="toggleShowOtherCategory">

                                                        <div role="status">
                                                            <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                                            </svg>
                                                            <span class="sr-only">Loading...</span>
                                                        </div>

                                                    </div>
                                                    <div class="gap-4 flex justify-start" wire:target="toggleShowOtherCategory" wire:loading.remove>
                                                        Select from existing Category
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                                            <path d="m19.822 7.431-4.846-7A1 1 0 0 0 14.153 0H1a1 1 0 0 0-.822 1.569L4.63 8 .178 14.431A1 1 0 0 0 1 16h13.153a1.001 1.001 0 0 0 .823-.431l4.846-7a1 1 0 0 0 0-1.138Z"/>
                                                        </svg>

                                                    </div>
                                                </x-link-button>

                                            @else
                                                <div>
                                                    <x-input-label value="{{ucwords(strtolower($industry->industry->name))}} Categories" for="otherCom-{{$industry->id}}"/>
                                                </div>
                                                <label for="cat"
                                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                                <select wire:model="techCategory" id="cat"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option selected>Choose a Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->name}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>

                                                <x-link-button wire:loading.attr="disabled" wire:target="toggleShowOtherCategory" wire:click.prevent="toggleShowOtherCategory">
                                                    <div wire:loading wire:target="toggleShowOtherCategory">

                                                        <div role="status">
                                                            <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                                            </svg>
                                                            <span class="sr-only">Loading...</span>
                                                        </div>

                                                    </div>
                                                    <div class="gap-4 flex justify-start" wire:target="toggleShowOtherCategory" wire:loading.remove>
                                                        Other Category
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                                            <path d="m19.822 7.431-4.846-7A1 1 0 0 0 14.153 0H1a1 1 0 0 0-.822 1.569L4.63 8 .178 14.431A1 1 0 0 0 1 16h13.153a1.001 1.001 0 0 0 .823-.431l4.846-7a1 1 0 0 0 0-1.138Z"/>
                                                        </svg>

                                                    </div>
                                                </x-link-button>
                                            @endif
                                            @if(session()->has('techCategory'))
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
                                                        <span class="font-medium">{{session('techCategory')}}</span>
                                                    </div>
                                                </div>
                                            @endif

                                            @error('techCategory')

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
                                       <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveCategory">
                                           <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveCategory">
                                               Submit
                                           </div>
                                           <div class="p-2 w-full text-center" wire:loading wire:target="saveCategory">
                                               Processing...
                                           </div>
                                       </x-submit-button>
                                    </form>
                                </x-pop-modal>


                            </div>

                            <ul>
                                @foreach($techCategoryList as $list)
                                    <li class="p-1 bg-gray-50 dark:bg-gray-800 hover:bg-gray-200 transition duration-300 dark:hover:bg-gray-700">
                                        <livewire:iptbm.staff.technology.tech-category-list
                                            wire:key="category-{{$list->id}}" :category="$list"/>
                                    </li>
                                @endforeach
                            </ul>
                        </div>


                    </div>
                    <div class="my-2 mt-4">

                        <div wire:ignore.self id="deleteModal{{$industry->industry->id}}" tabindex="-1"
                             aria-hidden="true"
                             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                <!-- Modal content -->
                                <form wire:submit.prevent="deleteIndustry({{$industry->industry->id}})">
                                    <div
                                        class="relative p-4 text-center bg-gray-50 rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                        <button type="button"
                                                class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-toggle="deleteModal{{$industry->industry->id}}">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                                             aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete
                                            this item? <span
                                                class="font-medium text-lg mb-3">{{$industry->industry->name}}</span>
                                        </p>

                                        <div class="flex justify-center items-center space-x-4">
                                            <button data-modal-toggle="deleteModal{{$industry->industry->id}}"
                                                    type="button"
                                                    class="py-2 px-3 text-sm font-medium text-gray-500 bg-gray-50 rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                No, cancel
                                            </button>
                                            <button data-modal-toggle="deleteModal{{$industry->industry->id}}"
                                                    type="submit"
                                                    class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                Yes, I'm sure
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <x-danger-button data-modal-toggle="deleteModal{{$industry->industry->id}}">
                            <span class="fa-solid fa-trash-can me-2"></span>Delete Industry
                        </x-danger-button>

                    </div>
                </div>
            </div>
        </div>
        <!-- Accordion item -->
    </div>
</div>

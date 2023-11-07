<div>
    @if($showPolicyForm)
        <div
            class="rounded-lg p-4 mt-4 w-full border-l border-r border-t border-b  border-gray-700 dark:border-gray-400 border-opacity-25 bg-gray-400 dark:bg-gray-800">
            <form wire:submit.prevent="savePolicy">
                <ul class="grid w-full gap-6 md:grid-cols-2">
                    <li>
                        <input wire:model="ip_policy" value="1" type="radio" id="hosting-small" name="hosting"
                               class="hidden peer" required>
                        <label for="hosting-small"
                               class="inline-flex items-center justify-between w-full p-3 text-gray-500 bg-gray-50 border-l border-r border-t border-b border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <span class="font-bold scale-125">YES</span>
                        </label>
                    </li>
                    <li>
                        <input wire:model="ip_policy" value="0" type="radio" id="hosting-big" name="hosting"
                               class="hidden peer">
                        <label for="hosting-big"
                               class="inline-flex items-center justify-between w-full p-3 text-gray-500 bg-gray-50 border-l border-r border-t border-b border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <span class="font-bold scale-125">NO</span>
                        </label>
                    </li>
                </ul>
                <div class="grid grid-cols-1 md:grid-cols-2 text-center  mt-3">
                    <div>
                        <button wire:click="showPolicyForm" type="button" class="font-bold text-xl text-red-500">
                            CANCEL
                        </button>
                    </div>
                    <div>
                        <button type="submit" class="font-bold text-xl text-blue-500">
                            SAVE
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @endif
    @if(session()->has('ip_policy'))
        <div
            class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                {{session('ip_policy')}}
            </div>
        </div>
    @endif
    @error('ip_policy')
    <div id="alert-border-2"
         class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
         role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
             viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <div class="ml-3 text-sm font-medium">
            {{$message}}
        </div>
    </div>
    @enderror
    <div class="flex justify-start items-center mb-4">
        <div class="text-gray-700 dark:text-gray-200 font-bold me-3">
            IP Policy :
        </div>
        <div class="text-xl font-bold me-4">


            @if($ip_policy)
                <div class="text-blue-500">
                    YES
                </div>
            @else
                <div class="text-red-500">
                    NO
                </div>
            @endif
        </div>
        @if(!$showPolicyForm)
            <button wire:click.prevent="showPolicyForm"
                    class="text-xl text-blue-500 hover:scale-125 transition duration-300">
                <span class="fa-solid fa-edit"></span> Edit
            </button>
        @endif

    </div>

        @if($showTechTrans)
            <div
                class="rounded-lg p-4 mt-4 w-full border-l border-r border-t border-b border-gray-700 dark:border-gray-400 border-opacity-25 bg-gray-400 dark:bg-gray-800">
                <form wire:submit.prevent="saveTechTrans">
                    <ul class="grid w-full gap-6 md:grid-cols-2">
                        <li>
                            <input wire:model="techno_transfer" value="1" type="radio" id="hosting-small2" name="host"
                                   class="hidden peer" required>
                            <label for="hosting-small2"
                                   class="inline-flex items-center justify-between w-full p-3 text-gray-500 bg-gray-50 border-l border-r border-t border-b border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <span class="font-bold scale-125">YES</span>
                            </label>
                        </li>
                        <li>
                            <input wire:model="techno_transfer" value="0" type="radio" id="hosting-big2" name="host"
                                   class="hidden peer">
                            <label for="hosting-big2"
                                   class="inline-flex items-center justify-between w-full p-3 text-gray-500 bg-gray-50 border-l border-r border-t border-b border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <span class="font-bold scale-125">NO</span>
                            </label>
                        </li>
                    </ul>
                    <div class="grid grid-cols-1 md:grid-cols-2 text-center  mt-3">
                        <div>
                            <button wire:click="showTechTrans" type="button" class="font-bold text-xl text-red-500">
                                CANCEL
                            </button>
                        </div>
                        <div>
                            <button type="submit" class="font-bold text-xl text-blue-500">
                                SAVE
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
        @if(session()->has('techno_transfer'))
            <div
                class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    {{session('techno_transfer')}}
                </div>
            </div>
        @endif
        @error('techno_transfer')
        <div id="alert-border-2"
             class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
             role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                 viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="ml-3 text-sm font-medium">
                {{$message}}
            </div>
        </div>
        @enderror
        <div class="flex justify-start items-center mb-4">
            <div class="text-gray-700 dark:text-gray-200 font-bold me-3">
                 Tech Transfer Protocol:
            </div>
            <div class="text-xl font-bold me-4">
                @if($techno_transfer)
                    <div class="text-blue-500">
                        YES
                    </div>
                @else
                    <div class="text-red-500">
                        NO
                    </div>
                @endif
            </div>
            @if(!$showTechTrans)
                <button wire:click.prevent="showTechTrans"
                        class="text-xl text-blue-500 hover:scale-125 transition duration-300">
                    <span class="fa-solid fa-edit"></span> Edit
                </button>
            @endif

        </div>

</div>

<x-card wire:ignore.self class="shadow-lg">
    <h1 class="text-gray-600 dark:text-gray-400 font-medium text-lg">
        <div class="flex justify-between">
            <x-item-header>
                Patent Agent
            </x-item-header>
            <x-pop-modal static="true" class="max-w-md" name="updateAgent" modal-title="Update Patent Agent">
                <form wire:submit.prevent="savePatentAgent" >
                    <div class="mb-6">
                        <div class="mb-6">
                            <label for="agentModel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Patent Agent</label>
                            <input wire:model.lazy="patentAgentModel" type="text" id="agentModel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter name" autocomplete="off">
                        </div>

                        @error('patentAgentModel')
                        <div  id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <div class="ml-3 text-sm font-medium">
                                {{$message}}
                            </div>
                        </div>
                        @enderror

                        <div class="mb-6">
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                            <input wire:model.lazy="agentAddressModel" type="text" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter address" required>
                        </div>

                        @error('agentAddressModel')
                        <div  id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <div class="ml-3 text-sm font-medium">
                                {{$message}}
                            </div>
                        </div>
                        @enderror
                        @if(session()->has('agentAddressModel'))
                            <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">{{session('agentAddressModel')}}!</span>
                                </div>
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                </form>
            </x-pop-modal>
            <x-secondary-button data-modal-toggle="updateAgent" class="text-sky-600 dark:text-sky-600">
                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                    <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                </svg>
                Update
            </x-secondary-button>


        </div>
    </h1>
    <div class="mt-3">
        <div wire:loading wire:target="patentAgentModel" class="text-blue-600 font-medium">
            Loading...
        </div>
        <div wire:loading wire:target="showPatentAgentForm" class="text-blue-600 font-medium">
            Loading...
        </div>


            @if($ipAlert->patent_agent->count() > 0)
                <ul>
                    @foreach($ipAlert->patent_agent as $agent)
                        <li class="border-b border-gray-400 dark:border-gray-600 mt-4">
                            <livewire:iptbm.staff.ip-management.agent-details  wire:key="agent-{{$agent->id}}" :agent="$agent" />
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="text-xl font-medium text-gray-600 dark:text-gray-400">
                    No data available
                </div>
            @endif

    </div>
</x-card>

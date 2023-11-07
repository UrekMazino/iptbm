<div class="w-full p-2 ">
    <div class="flex justify-between">
        <h1 class="  text-gray-600 dark:text-gray-400">
            {{$agentNameModel}}
        </h1>
        <button data-tooltip-target="tooltip-animation{{$agent->id}}" data-modal-toggle="deleteModal{{$agent->id}}"  class="text-red-600 hover:text-red-700 transition duration-300"  type="button">
            <span class="fa-solid fa-trash-can "></span>
        </button>
        <div id="tooltip-animation{{$agent->id}}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-50 transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-600">
            Delete Agent?
            <div class="tooltip-arrow " data-popper-arrow></div>
        </div>
        <!-- Modal toggle -->


        <!-- Main modal -->
        <div id="deleteModal{{$agent->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 text-center bg-gray-50 rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal{{$agent->id}}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                   <div class="font-medium text-gray-700 dark:text-gray-300">
                       {{$agent->name}}
                   </div>
                    <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                    <div class="flex justify-center items-center space-x-4">
                        <button data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-gray-50 rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-500 dark:hover:text-gray-50 dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            No, cancel
                        </button>
                        <button data-modal-toggle="deleteModal" wire:click="deleteAgent"  type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div  class="mt-2">
        <ul>
            <div class="flex justify-between border-b border-gray-400 dark:border-gray-600 border-opacity-75 w-1/2">
                <h1 class="text-sm font-medium text-gray-500 dark:text-gray-400">Mobile</h1>


                <div id="addMob" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-800">
                    Add Mobile number
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                @if($showContactPanel['mobile'])
                    <button data-tooltip-target="addMob" wire:click.prevent="toggleShowContactPanel('mobile')">
                        <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                @else
                    <button data-tooltip-target="addMob" wire:click.prevent="toggleShowContactPanel('mobile')">
                        <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                        </svg>
                    </button>
                @endif

            </div>
            <div wire:loading class="font-medium text-blue-600" wire:target="toggleShowContactPanel('mobile')">
                Loading...
            </div>
            @if($showContactPanel['mobile'])
                <div class="w-full bg-gray-300 dark:bg-gray-800 rounded-lg p-2 mt-2 mb-4">

                    <form wire:submit.prevent="saveMobile">
                        <div class="mb-6">
                            <label for="mobile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobile #</label>
                            <input wire:model="mobileModel" type="number" id="mobile" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="09xxx xxx xxx" required>
                            @error('mobileModel')
                            <div  id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2" role="alert">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <div class="ml-3 text-sm font-medium">
                                    {{$message}}
                                </div>
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    </form>

                </div>
            @endif
            @foreach($agent->agent_contact->where('type','mobile') as $contact)
                <li>
                    <livewire:iptbm.staff.ip-management.agent-contact :contact="$contact"/>
                </li>
            @endforeach
        </ul>
        <ul>
            <div class="flex justify-between border-b border-gray-400 dark:border-gray-600 border-opacity-75 w-1/2">
                <h1 class="text-sm font-medium text-gray-500 dark:text-gray-400">Phone</h1>
                <div id="addPhone" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-800">
                    Add Phone number
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                @if($showContactPanel['phone'])
                    <button data-tooltip-target="addMob" wire:click.prevent="toggleShowContactPanel('phone')">
                        <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                @else
                    <button data-tooltip-target="addMob" wire:click.prevent="toggleShowContactPanel('phone')">
                        <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                        </svg>
                    </button>
                @endif
            </div>
            <div wire:loading class="font-medium text-blue-600" wire:target="toggleShowContactPanel('phone')">
                Loading...
            </div>
            @if($showContactPanel['phone'])
                <div class="w-full bg-gray-300 dark:bg-gray-800 rounded-lg p-2 mt-2 mb-4">
                    <form wire:submit.prevent="savePhone">
                        <div class="mb-6">
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone #</label>
                            <input wire:model.lazy="phoneModel" type="number" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="(xxx)/(xx) xxx xxxx" required>
                            @error('phoneModel')
                            <div  id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2" role="alert">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <div class="ml-3 text-sm font-medium">
                                    {{$message}}
                                </div>
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    </form>

                </div>
            @endif
            @foreach($agent->agent_contact->where('type','phone') as $contact)
                <li>
                    <livewire:iptbm.staff.ip-management.agent-contact :contact="$contact"/>
                </li>
            @endforeach
        </ul>
        <ul>
            <div class="flex justify-between border-b border-gray-400 dark:border-gray-600 border-opacity-75 w-1/2">
                <h1 class="text-sm font-medium text-gray-500 dark:text-gray-400">Fax</h1>


                <div id="addFax" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-800">
                    Add Fax number
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                @if($showContactPanel['fax'])
                    <button data-tooltip-target="addMob" wire:click.prevent="toggleShowContactPanel('fax')">
                        <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                @else
                    <button data-tooltip-target="addMob" wire:click.prevent="toggleShowContactPanel('fax')">
                        <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                        </svg>
                    </button>
                @endif
            </div>
            <div wire:loading class="font-medium text-blue-600" wire:target="toggleShowContactPanel('fax')">
                Loading...
            </div>
            @if($showContactPanel['fax'])
                <div class="w-full bg-gray-300 dark:bg-gray-800 rounded-lg p-2 mt-2 mb-4">

                    <form wire:submit.prevent="saveFax">
                        <div class="mb-6">
                            <label for="fax" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fax #</label>
                            <input wire:model.lazy="faxModel" type="number" id="fax" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="(xxx)/(xx) xxx xxxx" required>
                            @error('faxModel')
                            <div  id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2" role="alert">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <div class="ml-3 text-sm font-medium">
                                    {{$message}}
                                </div>
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    </form>

                </div>
            @endif
            @foreach($agent->agent_contact->where('type','fax') as $contact)
                <li>
                    <livewire:iptbm.staff.ip-management.agent-contact :contact="$contact"/>
                </li>
            @endforeach
        </ul>
        <ul>
            <div class="flex justify-between border-b border-gray-400 dark:border-gray-600 border-opacity-75 w-1/2">
                <h1 class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</h1>


                <div id="addMail" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-800">
                    Add Email
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                @if($showContactPanel['email'])
                    <button data-tooltip-target="addMob" wire:click.prevent="toggleShowContactPanel('email')">
                        <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                @else
                    <button data-tooltip-target="addMob" wire:click.prevent="toggleShowContactPanel('email')">
                        <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                        </svg>
                    </button>
                @endif
            </div>
            <div wire:loading class="font-medium text-blue-600" wire:target="toggleShowContactPanel('email')">
                Loading...
            </div>
            @if($showContactPanel['email'])
                <div class="w-full bg-gray-300 dark:bg-gray-800 rounded-lg p-2 mt-2 mb-4">

                    <form wire:submit.prevent="saveEmail">
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address </label>
                            <input wire:model.lazy="emailModel"  type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="sample@mail.com" required>
                            @error('emailModel')
                            <div  id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2" role="alert">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <div class="ml-3 text-sm font-medium">
                                    {{$message}}
                                </div>
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    </form>

                </div>
            @endif
            @foreach($agent->agent_contact->where('type','email') as $contact)
                <li>
                    <livewire:iptbm.staff.ip-management.agent-contact :contact="$contact"/>
                </li>
            @endforeach
        </ul>
    </div>

</div>

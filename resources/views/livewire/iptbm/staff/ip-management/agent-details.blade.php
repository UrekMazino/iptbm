<div class="border border-gray-200 dark:border-gray-600 rounded p-2  group relative overflow-hidden">
    <div class="transition duration-300 absolute w-fit -top-20 -right-32 rounded-l-full  bg-gray-500 dark:bg-gray-950 bg-opacity-50 dark:bg-opacity-50 p-4 px-10 pt-10 group-hover:transform group-hover:-translate-x-28 group-hover:translate-y-14">
        <button data-modal-toggle="deleteAgentName-{{$agent->id}}" data-modal-target="deleteAgentName-{{$agent->id}}">
            <svg class="w-5 h-5 text-red-500 dark:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
            </svg>
        </button>
    </div>
    <x-pop-modal name="deleteAgentName-{{$agent->id}}" class="max-w-md">
        <div class="text-center">
            <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true"
                 fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                      clip-rule="evenodd"></path>
            </svg>
            <div class="font-medium text-gray-700 dark:text-gray-300">
                {{$agent->name}}
            </div>
            <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
        </div>
        <div class="flex justify-center items-center space-x-4">
            <button data-modal-toggle="deleteAgentName-{{$agent->id}}" type="button"
                    class="py-2 px-3 text-sm font-medium text-gray-500 bg-gray-50 rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-500 dark:hover:text-gray-50 dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                No, cancel
            </button>
            <button data-modal-toggle="deleteAgentName-{{$agent->id}}" wire:click="deleteAgent" type="submit"
                    class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                Delete
            </button>
        </div>
    </x-pop-modal>
    <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
        <div class="flex flex-col pb-3">
            <dt class="mb-1 text-gray-500  dark:text-gray-400">Agent Name</dt>
            <dd class=" font-semibold">{{$agentNameModel}}</dd>
        </div>
        <div class="flex flex-col pt-3">
            Contact Details
            <dl class="space-y-4 mt-4  divide-y divide-gray-200 dark:divide-gray-600">
                <div>
                    <dt class="mb-1 text-gray-500  dark:text-gray-400">
                       <div class="w-full flex justify-between">
                           <div>
                               Mobile number
                           </div>
                           <div>
                               <button class="text-sky-500 font-medium" data-modal-toggle="addMobAg">
                                   Add
                               </button>
                           </div>
                           <x-pop-modal name="addMobAg" modal-title="Add Mobile number" static="true" class="max-w-md">
                               <form wire:submit.prevent="saveMobile"  class="space-y-4">
                                   <div class="mb-6">
                                       <x-input-label value="Mobile Number"/>
                                       <x-text-input wire:model="mobileModel"  type="number" step="any" placeholder="09xx xxxx xxx" class="w-full"/>
                                       <x-input-error :messages="$errors->get('mobileModel')"/>
                                   </div>
                                   <div>
                                       <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveMobile">
                                           <div class="w-full text-center p-2" wire:loading.remove wire:target="saveMobile">
                                               Submit
                                           </div>
                                           <div class="w-full text-center p-2" wire:loading wire:target="saveMobile">
                                               Processing...
                                           </div>
                                       </x-submit-button>
                                   </div>
                               </form>
                           </x-pop-modal>

                       </div>
                    </dt>
                    <dd class=" font-semibold">
                        <ul>
                            @foreach($agent->agent_contact->where('type','mobile') as $contact)
                                <li>
                                    <livewire:iptbm.staff.ip-management.agent-contact wire:key="mobile-{{$contact->id}}" :contact="$contact"/>
                                </li>
                            @endforeach
                        </ul>
                    </dd>
                </div>
                <div>
                    <dt class="mb-1 text-gray-500  dark:text-gray-400">
                        <div class="w-full flex justify-between">
                            <div>
                                Phone number
                            </div>
                            <div>
                                <button class="text-sky-500 font-medium" data-modal-toggle="addPhoneAg">
                                    Add
                                </button>
                            </div>
                            <x-pop-modal name="addPhoneAg" modal-title="Add Phone number" static="true" class="max-w-md">
                                <form wire:submit.prevent="savePhone"  class="space-y-4">
                                    <div class="mb-6">
                                        <x-input-label value="Phone Number"/>
                                        <x-text-input wire:model="phoneModel"  type="number" step="any" placeholder="(xxx)/(xx) xxx xxxx" class="w-full"/>
                                        <x-input-error :messages="$errors->get('phoneModel')"/>
                                    </div>
                                    <div>
                                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="savePhone">
                                            <div class="w-full text-center p-2" wire:loading.remove wire:target="savePhone">
                                                Submit
                                            </div>
                                            <div class="w-full text-center p-2" wire:loading wire:target="savePhone">
                                                Processing...
                                            </div>
                                        </x-submit-button>
                                    </div>
                                </form>
                            </x-pop-modal>

                        </div>
                    </dt>
                    <dd class=" font-semibold">
                        <ul>
                            @foreach($agent->agent_contact->where('type','phone') as $contact)
                                <li>
                                    <livewire:iptbm.staff.ip-management.agent-contact wire:key="phone-{{$contact->id}}"  :contact="$contact"/>
                                </li>
                            @endforeach
                        </ul>
                    </dd>
                </div>
                <div>
                    <dt class="mb-1 text-gray-500  dark:text-gray-400">
                        <div class="w-full flex justify-between">
                            <div>
                                Fax number
                            </div>
                            <div>
                                <button class="text-sky-500 font-medium" data-modal-toggle="addFaxAg">
                                    Add
                                </button>
                            </div>
                            <x-pop-modal name="addFaxAg" modal-title="Add Fax number" static="true" class="max-w-md">
                                <form wire:submit.prevent="saveFax"  class="space-y-4">
                                    <div class="mb-6">
                                        <x-input-label value="Fax Number"/>
                                        <x-text-input wire:model="faxModel"  type="number" step="any" placeholder="(xxx)/(xx) xxx xxxx" class="w-full"/>
                                        <x-input-error :messages="$errors->get('faxModel')"/>
                                    </div>
                                    <div>
                                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="savePhone">
                                            <div class="w-full text-center p-2" wire:loading.remove wire:target="savePhone">
                                                Submit
                                            </div>
                                            <div class="w-full text-center p-2" wire:loading wire:target="savePhone">
                                                Processing...
                                            </div>
                                        </x-submit-button>
                                    </div>
                                </form>
                            </x-pop-modal>

                        </div>
                    </dt>
                    <dd class=" font-semibold">
                        <ul>
                            @foreach($agent->agent_contact->where('type','fax') as $contact)
                                <li>
                                    <livewire:iptbm.staff.ip-management.agent-contact wire:key="fax-{{$contact->id}}"  :contact="$contact"/>
                                </li>
                            @endforeach
                        </ul>
                    </dd>
                </div>
                <div>
                    <dt class="mb-1 text-gray-500  dark:text-gray-400">
                        <div class="w-full flex justify-between">
                            <div>
                                Email Address
                            </div>
                            <div>
                                <button class="text-sky-500 font-medium" data-modal-toggle="addEmailAg">
                                    Add
                                </button>
                            </div>
                            <x-pop-modal name="addEmailAg" modal-title="Add Email Address" static="true" class="max-w-md">
                                <form wire:submit.prevent="saveEmail"  class="space-y-4">
                                    <div class="mb-6">
                                        <x-input-label value="Email "/>
                                        <x-text-input wire:model="emailModel"  type="email"  placeholder="sample@mail.com" class="w-full"/>
                                        <x-input-error :messages="$errors->get('emailModel')"/>
                                    </div>
                                    <div>
                                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveEmail">
                                            <div class="w-full text-center p-2" wire:loading.remove wire:target="saveEmail">
                                                Submit
                                            </div>
                                            <div class="w-full text-center p-2" wire:loading wire:target="saveEmail">
                                                Processing...
                                            </div>
                                        </x-submit-button>
                                    </div>
                                </form>
                            </x-pop-modal>

                        </div>
                    </dt>
                    <dd class=" font-semibold">
                        <ul>
                            @foreach($agent->agent_contact->where('type','email') as $contact)
                                <li>
                                    <livewire:iptbm.staff.ip-management.agent-contact wire:key="email-{{$contact->id}}"  :contact="$contact"/>
                                </li>
                            @endforeach
                        </ul>
                    </dd>
                </div>
            </dl>
        </div>
    </dl>

</div>



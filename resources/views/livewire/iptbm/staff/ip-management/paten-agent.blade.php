<x-card-panel title="Patent Agent">
    <x-slot:button>
        <x-pop-modal static="true" class="max-w-md" name="updateAgent" modal-title="Update Patent Agent">
            <form wire:submit.prevent="savePatentAgent" class="space-y-6">
                <div class="space-y-4">
                    <div>
                        <x-input-label value="Patent Agent"/>
                        <x-text-input class="w-full"  wire:model.lazy="patentAgentModel" placeholder="Enter name" autocomplete="off" required />
                        <x-input-error :messages="$errors->get('patentAgentModel')"/>
                    </div>
                    <div>
                        <x-input-label value="Address"/>
                        <x-text-input class="w-full"  wire:model.lazy="agentAddressModel" placeholder="Enter address" autocomplete="off" required />
                        <x-input-error :messages="$errors->get('agentAddressModel')"/>
                    </div>
                </div>
                <div>
                    <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="savePatentAgent">
                        <div class="w-full text-center p-2" wire:loading.remove wire:target="savePatentAgent">
                            Submit
                        </div>
                        <div class="w-full text-center p-2" wire:loading wire:target="savePatentAgent">
                            Processing...
                        </div>
                    </x-submit-button>
                </div>

            </form>
        </x-pop-modal>
        <x-secondary-button data-modal-toggle="updateAgent" class="text-sky-600 dark:text-sky-600">
            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                 viewBox="0 0 20 18">
                <path
                    d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                <path
                    d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
            </svg>
            Update
        </x-secondary-button>
    </x-slot:button>
    <div class="mt-3">
        @if($ipAlert->patent_agent->count() > 0)
            <ul>
                @foreach($ipAlert->patent_agent as $agent)
                    <li class="border-b border-gray-400 dark:border-gray-600 mt-4">
                        <livewire:iptbm.staff.ip-management.agent-details wire:key="agent-{{$agent->id}}"
                                                                          :agent="$agent"/>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="text-xl font-medium text-gray-600 dark:text-gray-400">
                No data available
            </div>
        @endif

    </div>
</x-card-panel>

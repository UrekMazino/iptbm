<x-card-panel>
    <div class="space-y-4">
        <div class="border border-gray-300 dark:border-gray-700 rounded p-2 flex justify-between items-center">
            <div class="justify-start flex items-center gap-4">
                <x-input-label>
                    IP POLICY :
                </x-input-label>
                <div>
                    @if($profile->ip_policy)
                        <div class="text-blue-500">
                            YES
                        </div>
                    @else
                        <div class="text-red-500">
                            NO
                        </div>
                    @endif
                </div>
            </div>
            <x-pop-modal name="EditPolicy" class="max-w-md" static="true" modal-title="IP Policy Update">
                <form wire:submit.prevent="savePolicy" class="space-y-5">
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
                    @if(session()->has('ip_policy'))
                        <x-alert-success :message="session('ip_policy')"/>
                    @endif
                    <x-submit-button wire:loading.attr="disabled" wire:target="savePolicy" class="min-w-full">
                        <div wire:loading wire:target="savePolicy" class="w-full text-center p-2">
                            Processing...
                        </div>
                        <div  wire:loading.remove wire:target="savePolicy" class="w-full text-center p-2">
                            Save
                        </div>
                    </x-submit-button>
                </form>
            </x-pop-modal>


            <x-secondary-button class="text-sky-500 dark:text-sky-500" data-modal-toggle="EditPolicy" data-modal-target="EditPolicy">
                Update
            </x-secondary-button>
        </div>
        <div class="border border-gray-300 dark:border-gray-700 rounded p-2 flex justify-between items-center">
            <div class="justify-start flex items-center gap-4">
                <x-input-label>
                    TECH TRANSFER PROTOCOL :
                </x-input-label>
                <div>
                    @if($profile->techno_transfer)
                        <div class="text-blue-500">
                            YES
                        </div>
                    @else
                        <div class="text-red-500">
                            NO
                        </div>
                    @endif
                </div>
            </div>
            <x-pop-modal name="EditTechTrans" class="max-w-md" static="true" modal-title="Tech Trans Protocol">
                <form wire:submit.prevent="saveTechTrans" class="space-y-5">
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
                    <x-input-error :messages="$errors->get('techno_transfer')"/>
                    @if(session()->has('techno_transfer'))
                        <x-alert-success :message="session('techno_transfer')"/>
                    @endif
                    <x-submit-button wire:loading.attr="disabled" wire:target="saveTechTrans" class="min-w-full">
                        <div wire:loading wire:target="saveTechTrans" class="w-full text-center p-2">
                            Processing...
                        </div>
                        <div  wire:loading.remove wire:target="saveTechTrans" class="w-full text-center p-2">
                            Save
                        </div>
                    </x-submit-button>
                </form>
            </x-pop-modal>


            <x-secondary-button class="text-sky-500 dark:text-sky-500" data-modal-toggle="EditTechTrans" data-modal-target="EditTechTrans">
                Update
            </x-secondary-button>
        </div>
    </div>

</x-card-panel>

<div class="px-4 mt-4">
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
        <div class="md:col-span-3 space-y-4">
            <x-card class="shadow-lg">
                <div class="flex justify-between">
                    <x-item-header>
                        Notes/Description
                    </x-item-header>
                    <x-pop-modal static="true" class="max-w-4xl" name="updateDesc" modal-title="Notes/Description">
                        <form wire:submit.prevent="saveNote">
                            <div class="mb-6">

                                <div wire:ignore>
                                    <textarea wire:model.lazy="notesModel" rows="5" name="content"
                                              id="editorNote"></textarea>

                                </div>
                                <div wire:loading wire:target="noteModel" class="text-blue-600 font-medium">
                                    Loading...
                                </div>
                                @error('notesModel')
                                <div id="alert-border-2"
                                     class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                                     role="alert">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <div class="ml-3 text-sm font-medium">
                                        {{$message}}
                                    </div>
                                </div>
                                @enderror
                            </div>
                            <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Submit
                            </button>
                        </form>
                    </x-pop-modal>
                    <x-secondary-button data-modal-toggle="updateDesc" class="text-sky-600 dark:text-sky-600">
                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             fill="currentColor" viewBox="0 0 20 18">
                            <path
                                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                            <path
                                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                        </svg>
                        Update
                    </x-secondary-button>


                </div>
                <div class="my-4 text-gray-500 font-normal dark:text-gray-300">
                    {!! $notesModel !!}
                </div>
            </x-card>
            <x-card class="shadow-lg">
                <div class="flex justify-between">

                    <x-item-header>
                        Personnel In-charge
                    </x-item-header>
                    <x-pop-modal static="true" class="max-w-3xl" name="updatePersonel"
                                 modal-title="Update personnel in-charge">
                        <form wire:submit.prevent="savePersonel">
                            <div class="mb-6">
                                <div class="mb-6">
                                    <label for="nameCh"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full
                                        name</label>
                                    <input wire:model="inChargeNameModel" type="text" id="nameCh"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                           required>
                                </div>
                                <div wire:loading wire:target="inChargeNameModel" class="text-blue-600 font-medium">
                                    Loading...
                                </div>
                                @error('inChargeNameModel')
                                <div id="alert-border-2"
                                     class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                                     role="alert">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <div class="ml-3 text-sm font-medium">
                                        {{$message}}
                                    </div>
                                </div>
                                @enderror

                                <div class="mb-6">
                                    <label for="emailAdd"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input wire:model="inChargeEmailModel" type="email" id="emailAdd"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                           placeholder="sample@email.com" equired>
                                </div>
                                <div wire:loading wire:target="inChargeEmailModel" class="text-blue-600 font-medium">
                                    Loading...
                                </div>
                                @error('inChargeEmailModel')
                                <div id="alert-border-2"
                                     class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                                     role="alert">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <div class="ml-3 text-sm font-medium">
                                        {{$message}}
                                    </div>
                                </div>
                                @enderror
                            </div>
                            <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Submit
                            </button>
                        </form>
                    </x-pop-modal>
                    <x-secondary-button data-modal-toggle="updatePersonel" class="text-sky-600 dark:text-sky-600">
                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             fill="currentColor" viewBox="0 0 20 18">
                            <path
                                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                            <path
                                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                        </svg>
                        Update
                    </x-secondary-button>


                </div>
                @if($ip_task->personnel->count()>0)
                    <div
                        class="hidden md:my-2 border-b md:shadow-lg border-t border-gray-400 dark:border-gray-500 md:grid md:grid-cols-5 text-gray-500 dark:text-gray-400 font-medium">
                        <div class="col-span-2">
                            Full name
                        </div>
                        <div class="col-span-2">
                            Email
                        </div>
                        <div>
                            Action
                        </div>
                    </div>

                    <ul class="w-full divide-y divide-gray-200 dark:divide-gray-600">
                        @foreach($ip_task->personnel as $person)
                            <li class="py-2">
                                <div class="mb-2 md:grid grid-cols-1 md:grid-cols-5 text-gray-700 dark:text-gray-300">
                                    <div class="col-span-2">
                                        {{$person->name}}
                                    </div>
                                    <div class="col-span-2">
                                        {{$person->email}}
                                    </div>
                                    <div>
                                        <livewire:iptbm.staff.ip-management.iptask.delete-personel
                                            wire:key="person-{{$person->id}}" :personel="$person"/>
                                    </div>
                                </div>
                            </li>

                        @endforeach

                    </ul>

                @else
                    <div class="my-4 text-gray-500 font-medium dark:text-gray-400">
                        No Data Available!
                    </div>
                @endif
            </x-card>
            <x-card class="shadow-lg">
                <div class="flex justify-between">
                    <x-item-header>
                        Unit In-charge
                    </x-item-header>
                    <x-pop-modal static="true" class="max-w-3xl" name="updateUnit" modal-title="Update Unit in-charge">
                        <form wire:submit.prevent="saveUnit">
                            <div class="mb-6">
                                <div class="mb-6">
                                    <label for="nameCh"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit
                                        Name</label>
                                    <input wire:model="unitInChargeModel" type="text" id="nameCh"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                           required>
                                </div>
                                <div wire:loading wire:target="unitInChargeModel" class="text-blue-600 font-medium">
                                    Loading...
                                </div>
                                @error('unitInChargeModel')
                                <div id="alert-border-2"
                                     class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                                     role="alert">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <div class="ml-3 text-sm font-medium">
                                        {{$message}}
                                    </div>
                                </div>
                                @enderror

                            </div>
                            <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Submit
                            </button>
                        </form>
                    </x-pop-modal>
                    <x-secondary-button data-modal-toggle="updateUnit" class="text-sky-600 dark:text-sky-600">
                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             fill="currentColor" viewBox="0 0 20 18">
                            <path
                                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                            <path
                                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                        </svg>
                        Update
                    </x-secondary-button>


                </div>
                @if($ip_task->units->count()>0)
                    <div
                        class="hidden md:my-2 border-b md:shadow-lg border-t border-gray-400 dark:border-gray-500 md:grid md:grid-cols-5 text-gray-500 dark:text-gray-400 font-medium">
                        <div class="col-span-4">
                            Unit Name
                        </div>
                        <div>
                            Action
                        </div>
                    </div>

                    <ul class="w-full divide-y divide-gray-200 dark:divide-gray-600">
                        @foreach($ip_task->units as $units)
                            <li class="py-2">
                                <div class="mb-2 md:grid grid-cols-1 md:grid-cols-5 text-gray-700 dark:text-gray-300">
                                    <div class="col-span-4">
                                        {{$units->name}}
                                    </div>
                                    <div>
                                        <livewire:iptbm.staff.ip-management.iptask.delete-unit
                                            wire:key="unit-{{$units->id}}" :unit="$units"/>
                                    </div>
                                </div>
                            </li>

                        @endforeach

                    </ul>

                @else
                    <div class="my-4 text-gray-500 font-medium dark:text-gray-400">
                        No Data Available!
                    </div>
                @endif

            </x-card>
        </div>
        <div class="md:col-span-2 space-y-4">
            <x-card class="shadow-lg">
                <div class="flex justify-between">
                    <x-item-header>
                        Deadline
                    </x-item-header>

                    <x-pop-modal modal-title="Update Deadline" name="deadlineModal" static="true" class="max-w-md">
                        <form class="space-y-6" wire:submit.prevent="saveDeadline">
                            <div class="my-3">
                                <x-item-header>
                                    Current
                                </x-item-header>
                                <div
                                    class="my-4 text-gray-500 font-normal bg-gray-300 shadow dark:bg-gray-800 dark:text-gray-300 border-l border-r border-t border-b rounded-lg p-2">
                                    <div>
                                        <span
                                            class="font-medium text-gray-600 dark:text-gray-200 me-3">DATE:</span> {{\Carbon\Carbon::parse($this->ip_task->deadline)->format('d-M-Y ')}}
                                    </div>
                                    <div>
                                        <span
                                            class="font-medium text-gray-600 dark:text-gray-200 me-3">TIME : </span> {{\Carbon\Carbon::parse($this->ip_task->deadline)->format('g:i A')}}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <x-item-header>
                                    Date
                                </x-item-header>
                                <x-text-input class="w-full" wire:ignore wire:model="deadLineModel"
                                              type="datetime-local" name="deadline" placeholder="Enter date and time"/>
                                <div wire:loading wire:target="deadLineModel" class="text-blue-600 font-medium">
                                    Loading...
                                </div>
                                <x-input-error :messages="$errors->get('deadLineModel')"/>

                            </div>
                            <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Update
                            </button>

                        </form>
                    </x-pop-modal>
                    <x-secondary-button data-modal-target="deadlineModal" data-modal-toggle="deadlineModal"
                                        class="text-sky-600 dark:text-sky-600">
                        <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                             viewBox="0 0 20 18">
                            <path
                                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                            <path
                                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                        </svg>
                        update
                    </x-secondary-button>


                </div>
                <div class="my-4 text-gray-500 font-normal dark:text-gray-300">
                    <div>
                        <span
                            class="font-medium text-gray-600 dark:text-gray-200 me-3">DATE:</span> {{\Carbon\Carbon::parse($deadLineModel)->format('d-M-Y ')}}
                    </div>
                    <div>
                        <span
                            class="font-medium text-gray-600 dark:text-gray-200 me-3">TIME : </span> {{\Carbon\Carbon::parse($deadLineModel)->format('g:i A')}}
                    </div>
                </div>

            </x-card>
            <x-card class="shadow-lg">
                <div class="flex justify-between">


                    <x-item-header>
                        IP Alert Notification
                    </x-item-header>

                    <x-pop-modal modal-title="Update IP Notifications" name="ipAlertMod" static="true" class="max-w-md">
                        <form class="space-y-6" wire:submit.prevent="saveNotification">
                            <div>

                                <label for="message"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notification
                                    Details</label>
                                <textarea wire:model="noteDescModel" id="message" rows="4"
                                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                          placeholder="Write your thoughts here..."></textarea>
                                <div wire:loading wire:target="noteDescModel" class="text-blue-500 font-medium">
                                    Loading...
                                </div>
                                @error('noteDescModel')
                                <div id="alert-border-2"
                                     class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                                     role="alert">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <div class="ml-3 text-sm font-medium">
                                        {{$message}}
                                    </div>
                                </div>
                                @enderror
                            </div>
                            <div class="my-4">
                                <label for="message"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Frequency</label>
                                <div>

                                    <div class="flex items-center mb-4">
                                        <input wire:model="frequencyModel" id="default-radio-1" type="radio"
                                               value="weekly" name="default-radio"
                                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-600">
                                        <label for="default-radio-1"
                                               class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Weekly</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input wire:model="frequencyModel" id="default-radio-2" type="radio"
                                               value="daily" name="default-radio"
                                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-600">
                                        <label for="default-radio-2"
                                               class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Daily</label>
                                    </div>

                                </div>
                                <div wire:loading wire:target="frequencyModel" class="text-blue-500 font-medium">
                                    Loading...
                                </div>
                                <div class="my-4 @if($frequencyModel!=='daily') hidden @endif">
                                    <label for="message"
                                           class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Daily
                                        Notification</label>
                                </div>
                                <div class="my-4 @if($frequencyModel!=='weekly') hidden @endif">
                                    <label for="message"
                                           class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Weekly
                                        Notification</label>
                                    <div class="mb-6">
                                        <label for="day"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Day
                                            of the week</label>
                                        <select wire:model="weeklyModel" id="day"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Select</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                            <option value="Sunday">Sunday</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="my-4"
                                     @if($frequencyModel!=='weekly'&& $frequencyModel!=='daily') hidden @endif>
                                    <div class="mb-6">
                                        <label for="time"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter
                                            Time of the day</label>
                                        <input wire:model="dailyModel" type="text" id="time"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="day time" required>
                                    </div>
                                </div>
                            </div>

                            <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Update
                            </button>

                        </form>
                    </x-pop-modal>
                    <x-secondary-button data-modal-target="ipAlertMod" data-modal-toggle="ipAlertMod"
                                        class="text-sky-600 dark:text-sky-600">
                        <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                             viewBox="0 0 20 18">
                            <path
                                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                            <path
                                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                        </svg>
                        update
                    </x-secondary-button>

                </div>
                <div class="my-4 text-gray-500 font-normal dark:text-gray-300">
                    @if($ip_task->ip_task_stage_notifications)
                        @if ($ip_task->ip_task_stage_notifications->time_of_day)
                            @if($ip_task->ip_task_stage_notifications->frequency==='daily')
                                <label for="message"
                                       class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Notification
                                    will be sent everyday at</label>

                                <span class="font-medium text-lg text-gray-700 dark:text-gray-300 border-b">

                             {{\Carbon\Carbon::parse($ip_task->ip_task_stage_notifications->time_of_day)->format('g:i A')}}
                        </span>
                            @else
                                <label for="message"
                                       class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Notification
                                    will be sent every</label>
                                <span
                                    class="font-medium text-lg text-gray-700 dark:text-gray-300"> {{$ip_task->ip_task_stage_notifications->day_of_week}}</span>
                                <span class="font-medium text-lg text-gray-700 dark:text-gray-300 border-b">

                             {{\Carbon\Carbon::parse($ip_task->ip_task_stage_notifications->time_of_day)->format('g:i A')}}

                            </span>
                            @endif
                            <div class="border-l border-r border-t border-b rounded-lg shadow my-3 p-2">
                                <h1 class="flex font-medium">
                                    <svg class="w-6 h-6 text-green-500" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    <span class="ms-2 text-green-500">
                                    Note!
                                </span>
                                </h1>
                                {{$ip_task->ip_task_stage_notifications->notification_details}}
                            </div>

                        @else
                            <div class="text-gray-600 dark:text-gray-400">
                                Notification time has not been set
                                yet {{$ip_task->ip_task_stage_notifications->day_of_week}}
                            </div>
                        @endif
                    @endif

                </div>


            </x-card>
            <x-card class="shadow-lg">
                <div class="flex justify-between">
                    <x-item-header>
                        Priority
                    </x-item-header>

                    <x-pop-modal modal-title="Update Priority" name="priorityMod" static="true" class="max-w-md">
                        <form wire:submit.prevent="updatePriority">
                            <div class="my-3">
                                <div class="flex justify-start items-center mb-4">
                                    <x-input-label>
                                        <x-text-input wire:model="priorityModel" type="radio" class="me-2"
                                                      value="HIGH"/>
                                        HIGH
                                    </x-input-label>

                                </div>
                                <div class="flex items-center">
                                    <x-input-label>
                                        <x-text-input wire:model="priorityModel" type="radio" class="me-2" value="LOW"/>
                                        LOW
                                    </x-input-label>
                                </div>

                            </div>
                            <x-submit-button wire:loading wire:target="updatePriority">
                                Process
                            </x-submit-button>
                            <x-submit-button wire:loading.remove wire:target="updatePriority">
                                Submit
                            </x-submit-button>
                        </form>
                    </x-pop-modal>
                    <x-secondary-button data-modal-target="priorityMod" data-modal-toggle="priorityMod"
                                        class="text-sky-600 dark:text-sky-600">
                        <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                             viewBox="0 0 20 18">
                            <path
                                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                            <path
                                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                        </svg>
                        update
                    </x-secondary-button>

                </div>
                <div class="my-4 text-gray-500 font-medium text-xl dark:text-gray-300">
                    {!! $priorityModel !!}
                </div>

            </x-card>
            <x-card class="shadow-lg">
                <div class="flex justify-between">
                    <x-item-header>
                        Task Status
                    </x-item-header>
                    <x-pop-modal modal-title="Update Priority" name="statMod" static="true" class="max-w-md">
                        <form wire:submit.prevent="SaveStatus">
                            <div class="my-3">
                                <div class="flex items-center mb-4">
                                    <input wire:model="taskStatusModel" id="stat1" type="radio" value="DONE"
                                           name="default-radio"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="stat1"
                                           class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">DONE</label>
                                </div>
                                <div class="flex items-center">
                                    <input wire:model="taskStatusModel" checked id="stat2" type="radio" value="ONGOING"
                                           name="default-radio"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="stat2"
                                           class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">ONGOING</label>
                                </div>
                                <div wire:loading wire:target="taskStatusModel" class="text-blue-600 font-medium">
                                    Loading...
                                </div>
                                <x-input-error :messages="$errors->get('taskStatusModel')"/>


                            </div>
                            <x-submit-button wire:loading wire:target="SaveStatus">
                                Process
                            </x-submit-button>
                            <x-submit-button wire:loading.remove wire:target="SaveStatus">
                                Submit
                            </x-submit-button>
                        </form>

                    </x-pop-modal>
                    <x-secondary-button data-modal-target="statMod" data-modal-toggle="statMod"
                                        class="text-sky-600 dark:text-sky-600">
                        <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                             viewBox="0 0 20 18">
                            <path
                                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                            <path
                                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                        </svg>
                        update
                    </x-secondary-button>


                </div>
                @if($showTaskStatusForm)
                    <div class="mt-3 bg-gray-300 dark:bg-gray-800 p-2 rounded-lg">


                    </div>
                @else
                    <div class="my-4 text-gray-500 font-medium text-xl dark:text-gray-300">
                        {{$taskStatusModel}}
                    </div>
                @endif
            </x-card>
            <x-card class="shadow-lg">
                <div class="flex justify-between">
                    <x-item-header>
                        Attachment
                    </x-item-header>
                    <x-pop-modal modal-title="Upload Attachment" name="attachMod" static="true" class="max-w-lg">
                        <form wire:submit.prevent="saveAttachment" class="space-y-2">
                            <div>
                                <x-input-label value="Description"/>
                                <x-text-box wire:model.lazy="descriptionModel" rows="3" class="w-full"/>
                                <x-sub-label>
                                    Short file description max of 100 characters
                                </x-sub-label>
                                <div wire:loading wire:target="descriptionModel" class="text-blue-500 font-medium">
                                    Loading...
                                </div>
                                <x-input-error :messages="$errors->get('descriptionModel')"/>
                            </div>
                            <div>
                                <x-input-label value="Upload file"/>
                                <x-text-input wire:model="attachmentModel" accept="application/pdf,image/jpg,image/png"
                                              class="w-full" type="file"/>
                                <x-sub-label value="PDF (MAX> 20mb)."/>
                                <div wire:loading wire:target="attachmentModel" class="text-blue-500 font-medium">
                                    Loading...
                                </div>
                                <x-input-error :messages="$errors->get('attachmentModel')"/>

                            </div>
                            <x-submit-button wire:loading wire:target="saveAttachment">
                                Process
                            </x-submit-button>
                            <x-submit-button wire:loading.remove wire:target="saveAttachment">
                                Submit
                            </x-submit-button>
                        </form>

                    </x-pop-modal>
                    <x-secondary-button data-modal-target="attachMod" data-modal-toggle="attachMod"
                                        class="text-sky-600 dark:text-sky-600 ">
                        <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                             viewBox="0 0 20 18">
                            <path
                                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                            <path
                                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                        </svg>
                        update
                    </x-secondary-button>


                </div>
                <div class="my-4 text-gray-500 font-normal dark:text-gray-300">

                    <ul class="divide-y divide-gray-400 dark:divide-gray-600 space-y-2">
                        @forelse($ip_task->attachments as $file)
                            <li class="pt-2">
                                <div class="justify-between flex items-center">
                                    <div class="justify-start flex items-center">
                                        @if($file->type==='pdf')
                                            <div>
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"
                                                          d="M1 18a.969.969 0 0 0 .933 1h12.134A.97.97 0 0 0 15 18M1 7V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2v5M6 1v4a1 1 0 0 1-1 1H1m0 9v-5h1.5a1.5 1.5 0 1 1 0 3H1m12 2v-5h2m-2 3h2m-8-3v5h1.375A1.626 1.626 0 0 0 10 13.375v-1.75A1.626 1.626 0 0 0 8.375 10H7Z"/>
                                                </svg>
                                            </div>
                                            <div class="truncate">
                                                <x-pop-modal name="taskAttachment-{{$file->id}}" class="max-w-5xl">
                                                    <iframe class="w-full md:h-full  aspect-video h-screen"
                                                            src="{{Storage::url($file->file)}}"></iframe>

                                                </x-pop-modal>
                                                <button data-modal-toggle="taskAttachment-{{$file->id}}"
                                                        class="cursor-pointer">
                                                    {{$file->description}}
                                                </button>
                                            </div>
                                        @else
                                            <div>
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                                                    <path fill="currentColor"
                                                          d="M11.045 7.514a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Zm-4.572 3.072L3.857 15.92h7.949l-1.811-3.37-1.61 2.716-1.912-4.679Z"/>
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"
                                                          d="M6 1v4a1 1 0 0 1-1 1H1m14 12a.97.97 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2v16ZM11.045 7.514a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM3.857 15.92l2.616-5.333 1.912 4.68 1.61-2.717 1.81 3.37H3.858Z"/>
                                                </svg>
                                            </div>
                                            <div class="truncate">
                                                <x-pop-modal name="taskAttachment-{{$file->id}}" class="max-w-5xl">
                                                    <img src="{{Storage::url($file->file)}}"
                                                         class="w-full md:h-full  aspect-video h-screen"/>
                                                </x-pop-modal>
                                                <button data-modal-toggle="taskAttachment-{{$file->id}}"
                                                        class="cursor-pointer">
                                                    {{$file->description}}
                                                </button>
                                            </div>

                                        @endif


                                    </div>

                                    <x-pop-modal name="deleteAt-{{$file->id}}" class="max-w-md">
                                        <div class="text-center">
                                            <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                                                 aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                            <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to
                                                delete this item?</p>
                                        </div>
                                        <div class="flex justify-center items-center space-x-4">
                                            <button data-modal-toggle="deleteAt" type="button"
                                                    class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                No, cancel
                                            </button>
                                            <button disabled wire:loading wire:target="deleteData" type="submit"
                                                    class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                Processing...
                                            </button>
                                            <button wire:loading.remove wire:target="deleteData"
                                                    wire:click.prevent="deleteData({{$file->id}})" type="submit"
                                                    class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                Yes, I'm sure
                                            </button>
                                        </div>
                                    </x-pop-modal>

                                    <x-secondary-button data-modal-toggle="deleteAt-{{$file->id}}"
                                                        class="text-red-500 dark:text-red-500">
                                        <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 18 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                        </svg>
                                    </x-secondary-button>
                                </div>

                            </li>
                        @empty
                            No data Available
                        @endforelse
                    </ul>

                </div>
            </x-card>

        </div>
    </div>
</div>

@push('scripts')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            flatpickr("input[type=datetime-local]", {
                enableTime: true,
                dateFormat: 'Y-m-d H:i',
                disableMobile: true,
            });
            flatpickr("input[id=time]", {
                enableTime: true,
                disableMobile: true,
                noCalendar: true,
                dateFormat: "h:i K", // Format to display the selected time
                time_24hr: false,
                input: true
            });
            ClassicEditor
                .create(document.querySelector('#editorNote'))
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                        @this.
                        set('notesModel', editor.getData());
                    })
                })


        })
    </script>
@endpush

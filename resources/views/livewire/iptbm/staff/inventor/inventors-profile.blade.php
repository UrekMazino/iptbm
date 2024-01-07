<div class="my-3 mt-10 mx-3">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
        <div class="col-start-1 col-end-3">
            <x-card class="shadow-lg mb-4">

                <div class="justify-start items-center block md:flex">
                    <div class="border rounded-lg border-gray-400 dark:border-gray-600 p-2">
                        <div
                            class="aspect-square bg-gradient-to-tr mx-5 from-gray-900 to-gray-100 w-52 h-52 rounded-full border-gray-400 dark:border-gray-200  overflow-hidden border-8">
                            <svg class="w-60 h-60 text-gray-200 dark:text-gray-200" viewBox="0 0 96 96"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                 id="Icons_Welder" overflow="hidden">
                                <path
                                    d="M58 13 38 13C34.6863 13 32 15.6863 32 19L32 37.17C32.0055 44.2535 37.7465 49.9945 44.83 50L51.17 50C58.2535 49.9945 63.9945 44.2535 64 37.17L64 19C64 15.6863 61.3137 13 58 13ZM58 36 38 36 38 25 58 25ZM57 21.5 39 21.5C38.4477 21.5 38 21.0523 38 20.5 38 19.9477 38.4477 19.5 39 19.5L57 19.5C57.5523 19.5 58 19.9477 58 20.5 58 21.0523 57.5523 21.5 57 21.5Z"/>
                                <path d="M38 66 58 66 58 52.48C52.1547 57.16 43.8453 57.16 38 52.48Z"/>
                                <path
                                    d="M76.8 59.6C73.1566 56.9892 69.1902 54.8615 65 53.27L65 66C66.6569 66 68 67.3431 68 69L68 82 80 82 80 66C79.9478 63.4946 78.773 61.1451 76.8 59.6Z"/>
                                <path
                                    d="M28 82 28 69C28 67.3431 29.3431 66 31 66L31 53.22C27.2585 54.513 23.7198 56.3312 20.49 58.62 20.4954 58.7133 20.4954 58.8067 20.49 58.9L20.49 70.8C22.665 72.3428 23.9698 74.8336 24 77.5 23.9956 79.1035 23.5153 80.6697 22.62 82Z"/>
                                <path
                                    d="M18.52 71.89 18.52 58.89C18.5288 58.516 18.3843 58.1547 18.12 57.89L14.81 54.58 15.14 54.25 14.93 52.78 10.75 51.53C9.16 48 6.23 46.1 2.02 45.53 2.96022 49.2486 5.97166 52.0845 9.74 52.8L10.95 56.8 12.42 57.01 12.9 56.52 15.82 59.43 15.82 71.03C15.5474 71.0048 15.2737 70.9948 15 71 11.13 71 9 71 9 77.5 9 84 11.13 84 15 84 18.7268 84.1351 21.859 81.2266 22 77.5 21.9662 75.1305 20.6278 72.973 18.52 71.89Z"/>
                            </svg>
                        </div>
                        <div class="border rounded border-gray-400 dark:border-gray-600 px-4 py-2 mt-2 relative">
                            <div>
                                <div class="text-gray-700 text-center dark:text-gray-200">
                                    {{$statusModel}}
                                </div>
                                <x-sub-label class="text-xs">
                                    last update:
                                    {{\Carbon\Carbon::parse($inventor->updated_at)->format('F-d-Y')}}
                                </x-sub-label>
                            </div>
                            <x-pop-modal close-action="resetStatusModel" static="true" class="max-w-md"
                                         name="inventor-status-update" modal-title="Update Status">
                                <form wire:submit.prevent="updateStatus">
                                    <x-input-select wire:model="statusModel" class="mt-2">
                                        <option value="">
                                            Select Status
                                        </option>
                                        <option value="ACTIVE">
                                            ACTIVE
                                        </option>
                                        <option value="RETIRED">
                                            RETIRED
                                        </option>
                                        <option value="DECEASED">
                                            DECEASED
                                        </option>
                                    </x-input-select>
                                    @if(session()->has('success-status'))
                                        <x-alert-success :message="session()->get('success-status')"/>
                                    @endif
                                    @error('statusModel')
                                    <x-input-error :messages="$message"/>
                                    @enderror
                                    <x-submit-button class="w-full mt-3">
                                        Update
                                    </x-submit-button>


                                </form>
                            </x-pop-modal>
                            <button data-modal-toggle="inventor-status-update" class="absolute top-0 right-0">
                                <svg class="w-5 h-5 text-sky-600 dark:text-sky-600" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path
                                        d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                    <path
                                        d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-0 md:px-4">
                        <h1 class="text-2xl font-medium text-gray-600 dark:text-gray-400 mb-4">
                            Technology Generator/Inventors Profile
                        </h1>
                        <div class="divide-y-2 divide-gray-400 dark:divide-gray-600">
                            <div class="text-gray-700 text-xl dark:text-gray-200 justify-between flex items-center">
                                <div>
                                    {{$inventor->name.' '.(($inventor->middle_name)? $inventor->middle_name.".":" ").' '.$inventor->last_name.' '.$inventor->suffixes}}
                                </div>
                                <div class="py-2">
                                    <x-pop-modal name="updateInventorName" modal-title="Update Full name" static="true"
                                                 class="max-w-md">
                                        <form class="mt-4" wire:submit.prevent="updateFullName">
                                            <x-input-label class="my-2">
                                                <div>
                                                    First Name
                                                </div>
                                                <x-text-input wire:model.lazy="fname" class="w-full"
                                                              placeholder="first name"/>
                                                @error('fname')
                                                <x-input-error :messages="$message"/>
                                                @enderror
                                            </x-input-label>
                                            <x-input-label class="my-2">
                                                <div>
                                                    Middle Name
                                                </div>
                                                <x-text-input wire:model.lazy="mname" class="w-full"
                                                              placeholder="middle name"/>
                                                @error('mname')
                                                <x-input-error :messages="$message"/>
                                                @enderror
                                            </x-input-label>
                                            <x-input-label class="my-2">
                                                <div>
                                                    Last Name Name
                                                </div>
                                                <x-text-input wire:model.lazy="lname" class="w-full"
                                                              placeholder="last name"/>
                                                @error('lname')
                                                <x-input-error :messages="$message"/>
                                                @enderror
                                            </x-input-label>
                                            <x-input-label class="my-2">
                                                <div>
                                                    Suffix
                                                </div>
                                                <x-text-input wire:model.lazy="sname" class="w-1/2"
                                                              placeholder="last name"/>
                                                @error('sname')
                                                <x-input-error :messages="$message"/>
                                                @enderror
                                            </x-input-label>
                                            @error('fullName')
                                            <x-input-error :messages="$message"/>
                                            @enderror

                                            <x-submit-button type="submit" class="mt-5">
                                                Submit
                                            </x-submit-button>
                                        </form>
                                    </x-pop-modal>
                                    <x-secondary-button data-modal-toggle="updateInventorName"
                                                        class="text-sky-600 dark:text-sky-600">
                                        <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                             fill="currentColor" viewBox="0 0 20 18">
                                            <path
                                                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                            <path
                                                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                        </svg>
                                    </x-secondary-button>
                                </div>
                            </div>
                            <div class="text-gray-600 dark:text-gray-400 border-t border-gray-500">
                                Full Name
                            </div>
                        </div>
                        <div class="divide-y-2 divide-gray-400 dark:divide-gray-600">
                            <div class="text-gray-700 text-xl dark:text-gray-200 justify-between flex items-center">
                                <div>
                                    {{$address}}
                                </div>
                                <div class="py-2">
                                    <x-pop-modal close-action="resetAddress" static="true" class="max-w-xl space-y-2"
                                                 modal-title="Update Inventor Address" name="updateInventorAddress">
                                        <form wire:submit.prevent="updateAddress">
                                            <div class="mt-4">
                                                <x-input-label class="my-2">
                                                    <div>
                                                        New Address
                                                    </div>
                                                    <x-text-input wire:model.lazy="address" class="w-full"
                                                                  placeholder="enter text here"/>
                                                    @error('address')
                                                    <x-input-error :messages="$message"/>
                                                    @enderror
                                                </x-input-label>
                                                <x-submit-button wire:loading wire:target="updateAddress" class="mt-3"
                                                                 type="submit">
                                                    Processing...
                                                </x-submit-button>
                                                <x-submit-button wire:loading.remove wire:target="updateAddress"
                                                                 class="mt-3" type="submit">
                                                    Submit
                                                </x-submit-button>
                                            </div>
                                        </form>
                                    </x-pop-modal>
                                    <x-secondary-button data-modal-toggle="updateInventorAddress"
                                                        class="text-sky-600 dark:text-sky-600">
                                        <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                             fill="currentColor" viewBox="0 0 20 18">
                                            <path
                                                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                            <path
                                                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                        </svg>
                                    </x-secondary-button>
                                </div>
                            </div>

                            <div class="text-gray-600 dark:text-gray-400 border-t border-gray-500">
                                <x-sub-label>
                                    Address
                                </x-sub-label>

                            </div>
                        </div>
                    </div>


                </div>


                <div class="p-2 mt-4">
                    <div class="flex justify-between items-baseline">
                           <span class="text-gray-700 dark:text-gray-200">
                        @if($latestAffiliation)
                                   {{ $latestAffiliation->latest_agency}}
                               @else
                                   {{$inventor->agency_name->name}}
                               @endif
                    </span>

                    </div>

                    <div class=" border-t border-gray-500">
                        <x-sub-label class="text-base">
                            Latest Agency Affiliation
                        </x-sub-label>

                    </div>
                </div>

                <div class="p-2 mt-4">

                    <div class="flex justify-between items-center">
                        <x-item-header>
                            Filed of Expertise
                        </x-item-header>
                        <x-pop-modal name="addExpertiseMod" modal-title="Update Field of Expertise" static="true"
                                     class="max-w-xl">
                            <form wire:submit.prevent="addExpertise" wire:ignore.self class="space-y-4">
                                <div>
                                    <x-input-label value="Expertise"/>
                                    <x-text-input  class="w-full" wire:model.lazy="expertise" placeholder="enter text here" />
                                    <x-input-error :messages="$errors->get('expertise')" />
                                </div>
                                <div>
                                    <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="addExpertise">
                                        <div class="w-full text-center p-2" wire:target="addExpertise" wire:loading>
                                            Processing...
                                        </div>
                                        <div class="w-full text-center p-2" wire:target="addExpertise" wire:loading.remove>
                                            Submit
                                        </div>
                                    </x-submit-button>
                                </div>

                            </form>
                        </x-pop-modal>
                        <x-secondary-button data-modal-toggle="addExpertiseMod" class="text-sky-600 dark:text-sky-600 gap-2">
                            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
                            </svg>
                            Add Field
                        </x-secondary-button>
                    </div>
                </div>
                <div class="p-2">
                    @if($inventor->expertise->count()>0)
                        <ul>
                            @foreach($inventor->expertise as $key=>$expertise)
                                <li class="p-2 flex justify-between items-center hover:bg-gray-300 dark:hover:bg-gray-950 dark:hover:bg-opacity-25 rounded-lg transition duration-300">

                                    <div class="text-base text-gray-600 dark:text-gray-400 flex">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white me-3" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                            <path
                                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                                        </svg>
                                        {{$expertise->field}}
                                    </div>

                                    <div>
                                        <livewire:iptbm.staff.inventor.delete-experties-popup :id="$inventor->id"
                                                                                              wire:key="{{$key}}"
                                                                                              :expertise="$expertise"/>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                </div>
            </x-card>

        </div>
        <div>
            <livewire:iptbm.staff.inventor.contact-details :inventor="$inventor"/>
        </div>

    </div>

</div>

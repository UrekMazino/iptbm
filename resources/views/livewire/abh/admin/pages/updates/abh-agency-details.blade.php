<div class="w-full">
    <nav wire:ignore
         class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="block md:flex justify-start items-center">
                <div class="ps-4 py-3">
                    <x-link-button :url="route('abh.admin.all_agencies')">
                        Agencies
                    </x-link-button>

                </div>

            </div>

        </nav>

    </nav>
    <div class=" md:px-4 ">
        <div class=" text-xl mt-10 text-sky-600 dark:text-sky-100">
            {{$agency->name}} @if($agency->code) ({{$agency->code}}) @endif
        </div>
        <div class="space-y-10">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-14">
                <div class="md:col-span-3 space-y-5">
                    <x-card-panel title="Agency Details">
                        <div class="space-y-5">
                            <div class="p-4 border rounded border-gray-200 dark:border-gray-600 ">
                                <div class="w-fit  me-0 ms-auto">
                                    <x-pop-modal name="agencyNameAbh" modal-title="Update Agency Name" static="true" class="max-w-xl">
                                        <form class="space-y-5" wire:submit.prevent="save_agency_name_code">
                                            <div>
                                                <x-input-label value="Agency name"/>
                                                <x-text-input wire:model.lazy="agency_name" class="w-full" placeholder="enter text here" />
                                                <x-input-error :messages="$errors->get('agency_name')"/>
                                            </div>
                                            <div>
                                                <x-input-label value="Agency Code"/>
                                                <x-text-input wire:model.lazy="agency_code" class="w-full" placeholder="enter text here" required/>
                                                <x-input-error :messages="$errors->get('agency_code')"/>
                                            </div>
                                            <x-alert-success :message="session('success_agency_name')" />
                                            <div>
                                                <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="save_agency_name_code">
                                                    <div class="p-2 w-full text-center" wire:loading.remove wire:target="save_agency_name_code">
                                                        Submit
                                                    </div>
                                                    <div class="p-2 w-full text-center" wire:loading wire:target="save_agency_name_code">
                                                        Processing...
                                                    </div>
                                                </x-submit-button>
                                            </div>
                                        </form>
                                    </x-pop-modal>
                                    <x-secondary-button data-modal-toggle="agencyNameAbh">
                                        Update
                                    </x-secondary-button>
                                </div>
                                <div class="divide-y divide-gray-200 dark:divide-gray-600">
                                    <div class="font-medium text-lg text-gray-700 dark:text-gray-400">
                                        {{$agency->name}} @if($agency->code) ({{$agency->code}}) @endif
                                    </div>
                                    <div>
                                        Agency Name
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 border rounded border-gray-200 dark:border-gray-600 ">
                                <div class="w-fit  me-0 ms-auto">
                                    <x-pop-modal name="agencyAddressAbh" modal-title="Update Agency Address" static="true" class="max-w-xl">
                                        <form class="space-y-5" wire:submit.prevent="save_agency_address">
                                            <div>
                                                <x-input-label value="Agency name"/>
                                                <x-text-input wire:model.lazy="agency_address" class="w-full" placeholder="enter text here" required/>
                                                <x-input-error :messages="$errors->get('save_agency_address')"/>
                                            </div>

                                            <x-alert-success :message="session('success_agency_address')" />
                                            <div>
                                                <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="save_agency_address">
                                                    <div class="p-2 w-full text-center" wire:loading.remove wire:target="save_agency_address">
                                                        Submit
                                                    </div>
                                                    <div class="p-2 w-full text-center" wire:loading wire:target="save_agency_address">
                                                        Processing...
                                                    </div>
                                                </x-submit-button>
                                            </div>
                                        </form>
                                    </x-pop-modal>
                                    <x-secondary-button data-modal-toggle="agencyAddressAbh">
                                        Update
                                    </x-secondary-button>
                                </div>
                                <div class="divide-y divide-gray-200 dark:divide-gray-600">
                                    <div class="font-medium text-lg text-gray-700 dark:text-gray-400">
                                        {{$agency->address}}
                                    </div>
                                    <div>
                                        Agency Address
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-card-panel>
                    <x-card-panel title="Contact Details">
                        <div class="space-y-4">
                            <div class="p-4 border rounded border-gray-200 dark:border-gray-600">
                                <div class="w-full ms-auto me-0 flex justify-between items-center">
                                    <div class="font-semibold">
                                        Mobile Number
                                    </div>
                                    <livewire:abh.admin.component.agency.add-contact wire:key="mobile" :agency="$agency" type="mobile" />
                                </div>
                                <ul class="mt-4">
                                    @forelse($mobile_contact as $contact)
                                        <li>
                                            <div class="px-2 flex justify-between items-center rounded transition duration-300 hover:bg-gray-300 hover:dark:bg-gray-900">
                                                <div>
                                                    {{$contact->contact}}
                                                </div>
                                                <div>
                                                    <x-pop-modal class="max-w-md" name="delMob-{{$contact->id}}">
                                                        <form wire:submit.prevent="delete_contact({{$contact->id}})">
                                                            <div class="text-center">
                                                                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                                                <div class="flex justify-center items-center space-x-4">
                                                                    <button data-modal-toggle="delMob-{{$contact->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                        No, cancel
                                                                    </button>
                                                                    <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                        Yes, I'm sure
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </x-pop-modal>
                                                    <button data-modal-toggle="delMob-{{$contact->id}}">
                                                        <svg class="w-6 h-6 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        No data available
                                    @endforelse
                                </ul>
                            </div>
                            <div class="p-4 border rounded border-gray-200 dark:border-gray-600">
                                <div class="w-full ms-auto me-0 flex justify-between items-center">
                                    <div class="font-semibold">
                                        Phone Number
                                    </div>
                                    <livewire:abh.admin.component.agency.add-contact wire:key="phone" :agency="$agency" type="phone" />
                                </div>
                                <ul class="mt-4">
                                    @forelse($phone_contact as $contact)
                                        <li>
                                            <div class="px-2 flex justify-between items-center rounded transition duration-300 hover:bg-gray-300 hover:dark:bg-gray-900">
                                                <div>
                                                    {{$contact->contact}}
                                                </div>
                                                <div>
                                                    <x-pop-modal class="max-w-md" name="delMob-{{$contact->id}}">
                                                        <form wire:submit.prevent="delete_contact({{$contact->id}})">
                                                            <div class="text-center">
                                                                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                                                <div class="flex justify-center items-center space-x-4">
                                                                    <button data-modal-toggle="delMob-{{$contact->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                        No, cancel
                                                                    </button>
                                                                    <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                        Yes, I'm sure
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </x-pop-modal>
                                                    <button data-modal-toggle="delMob-{{$contact->id}}">
                                                        <svg class="w-6 h-6 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        No data available
                                    @endforelse
                                </ul>
                            </div>
                            <div class="p-4 border rounded border-gray-200 dark:border-gray-600">
                                <div class="w-full ms-auto me-0 flex justify-between items-center">
                                    <div class="font-semibold">
                                        Fax Number
                                    </div>
                                    <livewire:abh.admin.component.agency.add-contact wire:key="fax" :agency="$agency" type="fax" />
                                </div>
                                <ul class="mt-4">
                                    @forelse($fax_contact as $contact)
                                        <li>
                                            <div class="px-2 flex justify-between items-center rounded transition duration-300 hover:bg-gray-300 hover:dark:bg-gray-900">
                                                <div>
                                                    {{$contact->contact}}
                                                </div>
                                                <div>
                                                    <x-pop-modal class="max-w-md" name="delMob-{{$contact->id}}">
                                                        <form wire:submit.prevent="delete_contact({{$contact->id}})">
                                                            <div class="text-center">
                                                                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                                                <div class="flex justify-center items-center space-x-4">
                                                                    <button data-modal-toggle="delMob-{{$contact->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                        No, cancel
                                                                    </button>
                                                                    <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                        Yes, I'm sure
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </x-pop-modal>
                                                    <button data-modal-toggle="delMob-{{$contact->id}}">
                                                        <svg class="w-6 h-6 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        No data available
                                    @endforelse
                                </ul>
                            </div>
                            <div class="p-4 border rounded border-gray-200 dark:border-gray-600">
                                <div class="w-full ms-auto me-0 flex justify-between items-center">
                                    <div class="font-semibold">
                                        Email address
                                    </div>
                                    <livewire:abh.admin.component.agency.add-contact wire:key="email" :agency="$agency" type="email" />
                                </div>
                                <ul class="mt-4">
                                    @forelse($email_contact as $contact)
                                        <li>
                                            <div class="px-2 flex justify-between items-center rounded transition duration-300 hover:bg-gray-300 hover:dark:bg-gray-900">
                                                <div>
                                                    {{$contact->contact}}
                                                </div>
                                                <div>
                                                    <x-pop-modal class="max-w-md" name="delMob-{{$contact->id}}">
                                                        <form wire:submit.prevent="delete_contact({{$contact->id}})">
                                                            <div class="text-center">
                                                                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                                                <div class="flex justify-center items-center space-x-4">
                                                                    <button data-modal-toggle="delMob-{{$contact->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                        No, cancel
                                                                    </button>
                                                                    <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                        Yes, I'm sure
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </x-pop-modal>
                                                    <button data-modal-toggle="delMob-{{$contact->id}}">
                                                        <svg class="w-6 h-6 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        No data available
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </x-card-panel>
                </div>
                <div class="md:col-span-2">
                    <div class="space-y-5">
                        <x-card-panel title="Agency Head">
                            <div class="space-y-4">
                                <div class="p-4 border rounded border-gray-200 dark:border-gray-600">
                                    <div class="flex justify-end items-center">
                                        <x-pop-modal modal-title="Update Agency Head" class="max-w-xl" static="true" name="updaedAgencyHeadName">
                                            <form class="space-y-5" wire:submit.prevent="save_agency_head">
                                                <div>
                                                    <x-input-label value="Full name"/>
                                                    <x-text-input wire:model.lazy="agency_head" class="w-full" required placeholder="enter text here"/>
                                                    <x-input-error :messages="$errors->get('agency_head')"/>
                                                </div>
                                                <x-alert-success :message="session('agency_head')"/>
                                                <div>
                                                    <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="save_agency_head">
                                                        <div class="p-2 w-full text-center" wire:loading.remove wire:target="save_agency_head">
                                                            Submit
                                                        </div>
                                                        <div class="p-2 w-full text-center" wire:loading wire:target="save_agency_head">
                                                            Processing...
                                                        </div>
                                                    </x-submit-button>
                                                </div>
                                            </form>
                                        </x-pop-modal>
                                        <x-secondary-button data-modal-toggle="updaedAgencyHeadName">
                                            Update
                                        </x-secondary-button>
                                    </div>
                                    <div class="mt-4 divide-y divide-gray-200 dark:divide-gray-600">
                                        <div class="font-semibold text-lg">
                                            {{$agency->head}}
                                        </div>
                                        <div>
                                            Full name
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4 border rounded border-gray-200 dark:border-gray-600">
                                    <div class="flex justify-end items-center">
                                        <x-pop-modal modal-title="Update Designation" class="max-w-xl" static="true" name="updaedAgencyHeadDesignation">
                                            <form class="space-y-5" wire:submit.prevent="save_agency_head_designation">
                                                <div>
                                                    <x-input-label value="Full name"/>
                                                    <x-text-input wire:model.lazy="agency_head_designation" class="w-full" required placeholder="enter text here"/>
                                                    <x-input-error :messages="$errors->get('agency_head')"/>
                                                </div>
                                                <x-alert-success :message="session('agency_head_designation')"/>
                                                <div>
                                                    <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="save_agency_head_designation">
                                                        <div class="p-2 w-full text-center" wire:loading.remove wire:target="save_agency_head_designation">
                                                            Submit
                                                        </div>
                                                        <div class="p-2 w-full text-center" wire:loading wire:target="save_agency_head_designation">
                                                            Processing...
                                                        </div>
                                                    </x-submit-button>
                                                </div>
                                            </form>
                                        </x-pop-modal>
                                        <x-secondary-button data-modal-toggle="updaedAgencyHeadDesignation">
                                            Update
                                        </x-secondary-button>
                                    </div>
                                    <div class="mt-4 divide-y divide-gray-200 dark:divide-gray-600">
                                        <div class="font-semibold text-lg">
                                            {{$agency->designation}}
                                        </div>
                                        <div>
                                            Designation
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </x-card-panel>
                        <x-card-panel title="User Accounts">
                            <ul>
                                @forelse($users as $user)

                                    <li class="">
                                        <a href="{{route('abh.admin.all_accounts_details',['account'=>$user->id])}}" class="inline-flex w-full items-center justify-start border border-gray-200 dark:border-gray-600 px-3 py-2 text-base font-medium text-gray-500 rounded-lg bg-gray-50 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                                           <div>
                                               <div class="font-medium">
                                                   {{$user->name}}
                                               </div>
                                               <div>
                                                   {{$user->email}}

                                               </div>
                                           </div>
                                        </a>


                                    </li>
                                @empty
                                    No users available
                                @endforelse
                            </ul>
                        </x-card-panel>
                    </div>

                </div>
            </div>
            <x-card-panel title="Current Region">
                <x-slot:button>
                    <x-pop-modal name="updateRegion" static="true" modal-title="Update Agency Region"  class="max-w-2xl">
                        <form class="space-y-5" wire:submit.prevent="save_region">
                            <div>
                                <x-input-label value="Region name"/>
                                <x-text-input wire:model="region_model" class="w-full" list="regionData" type="search" required placeholder="enter region name"/>
                                <x-data-list id="regionData">
                                    @foreach($regions as $region)
                                        <option value="{{$region->name}}"></option>
                                    @endforeach
                                </x-data-list>
                                <x-input-error :messages="$errors->get('region_model')"/>
                            </div>
                            <x-alert-success :message="session('region_agency')"/>
                            <div>
                                <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="save_region">
                                    <div class="w-full text-center p-2" wire:loading.remove wire:target="save_region">
                                        Submit
                                    </div>
                                    <div class="w-full text-center p-2" wire:loading wire:target="save_region">
                                        Processing...
                                    </div>
                                </x-submit-button>
                            </div>
                        </form>
                    </x-pop-modal>
                    <x-secondary-button data-modal-toggle="updateRegion">
                        Update Region
                    </x-secondary-button>
                </x-slot:button>
                <div class="text-xl">
                    {{$agency->region->name}}
                </div>
            </x-card-panel>
        </div>
    </div>
</div>

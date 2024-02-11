<div class="space-y-4">
    <div>
        <x-input-label value="Agency"/>
        <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 flex justify-between items-center">
            <div class="divide-y w-full divide-gray-300 dark:divide-gray-700 ">
                @if($profile->agency->name)
                    <div class="text-gray-600 dark:text-white font-medium">
                        {{$profile->agency->name}} @if($profile->agency->code) ({{$profile->agency->code}}) @endif
                    </div>
                    <div>
                        {{$profile->agency->address}}
                    </div>
                @else
                    <div class="text-gray-400 dark:text-gray-500 text-base font-normal">
                        No data available
                    </div>
                @endif

            </div>
            <div>
                <x-pop-modal class="max-w-xl" name="editName" static="true" modal-title="Update Agency Name" close-action="reseterAgecnyDetails">
                    <form class="space-y-4" wire:submit.prevent="agencyName">
                        <div>
                            <x-input-label value="Agency"/>
                            <x-text-input wire:model.lazy="agency_name" class="w-full" placeholder="Enter text here.."/>
                            <x-input-error :messages="$errors->get('agency_name')"/>
                        </div>
                        <div>
                            <x-input-label value="Code"/>
                            <x-text-input wire:model.lazy="agency_code" class="w-full" placeholder="Enter text here.."/>
                            <x-input-error :messages="$errors->get('agency_code')"/>
                        </div>
                        <div>
                            <x-input-label value="Agency Address"/>
                            <x-text-input wire:model.lazy="agency_address" class="w-full" placeholder="Enter text here.."/>
                            <x-input-error :messages="$errors->get('agency_address')"/>
                        </div>

                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled"
                                             wire:target="agencyName">
                                <div class="p-2 mx-auto text-center" wire:loading.remove wire:target="agencyName">
                                    Submit
                                </div>
                                <div class="p-2 mx-auto text-center" wire:loading wire:target="agencyName">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>
                <x-secondary-button data-modal-toggle="editName"  class="text-sky-500 dark:text-sky-500" >
                    Edit
                </x-secondary-button>
            </div>
        </div>
    </div>

    <div>
        <x-input-label value="Agency head"/>
        <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 flex justify-between items-center">

            <div class="divide-y w-full divide-gray-300 dark:divide-gray-700 ">

                @if($profile->agency->head)
                    <div class="text-gray-600 dark:text-white font-medium">
                        {{$profile->agency->head}}
                    </div>
                    <div>
                        {{$profile->agency->designation}}
                    </div>
                @else
                    <div class="text-gray-400 dark:text-gray-500 text-base font-normal">
                        No data available
                    </div>
                @endif

            </div>
            <div>
                <x-pop-modal class="max-w-xl" name="editHead" static="true" modal-title="Update Agency Head" close-action="resetHeadDetails">
                    <form class="space-y-4" wire:submit.prevent="agencyHead">
                        <div>
                            <x-input-label value="Agency Head"/>
                            <x-text-input wire:model.lazy="agency_head" class="w-full" placeholder="Enter text here.."/>
                            <x-input-error :messages="$errors->get('agency_head')"/>
                        </div>
                        <div>
                            <x-input-label value="Designation"/>
                            <x-text-input wire:model.lazy="designation" class="w-full" placeholder="Enter text here.."/>
                            <x-input-error :messages="$errors->get('designation')"/>
                        </div>
                        @if(session()->has('saveHead'))
                            <x-alert-success :message="session('saveHead')"/>
                        @endif
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled"
                                             wire:target="agencyName">
                                <div class="p-2 mx-auto text-center" wire:loading.remove wire:target="agencyHead">
                                    Submit
                                </div>
                                <div class="p-2 mx-auto text-center" wire:loading wire:target="agencyHead">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>
                <x-secondary-button data-modal-target="editHead" data-modal-toggle="editHead" class="text-sky-500 dark:text-sky-500" >
                    Edit
                </x-secondary-button>
            </div>
        </div>
    </div>
    <div class="space-y-4 pt-5">
        <x-input-label>
          Agency Contact Details
        </x-input-label>
        <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 ">
            <div class="flex justify-between items-center">
                <x-input-label>
                    <div class="flex justify-start items-center gap-3">
                        <i class="fa-solid fa-mobile-retro"></i>
                        <div>
                            Mobile Number
                        </div>
                    </div>
                </x-input-label>

                <x-pop-modal static="true" modal-title="Add new Mobile number" name="addMobile" class="max-w-md">
                    <form class="space-y-4" wire:submit.prevent="saveContact('mobile','mobile')">
                        <div>
                            <x-input-label value="Mobile Number"/>
                            <x-text-input wire:model.lazy="mobile" type="number" class="w-full" placeholder="09xx xxx xxxx"/>
                            <x-input-error :messages="$errors->get('mobile')"/>
                        </div>
                        @if(session()->has('mobile'))
                            <x-alert-success :message="session('mobile')"/>
                        @endif

                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveContact">
                                <div class="text-center m-auto p-2" wire:target="saveContact" wire:loading>
                                    Processing...
                                </div>
                                <div class="text-center m-auto p-2" wire:target="saveContact" wire:loading.remove>
                                    Submit
                                </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>
                <x-secondary-button data-modal-toggle="addMobile" data-modal-target="addMobile"  class="text-sky-500 dark:text-sky-500" >
                    Add Mobile
                </x-secondary-button>
            </div>
            <ul class="mt-5">

                @if($contact_mobile->count()>0)
                    @foreach($contact_mobile as $contact)
                        <li class="flex justify-between items-center hover:bg-gray-300 dark:hover:bg-gray-900 duration-300 transition cursor-pointer p-1">
                           <div>
                               {{$contact->contact}}
                           </div>
                            <x-pop-modal name="delContact-{{$contact->id}}" class="max-w-md" static="true">
                                <div class="text-center">
                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300 text-lg">{{$contact->contact}}</p>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this number?</p>
                                    <div class="flex justify-center items-center space-x-4">
                                        <button data-modal-toggle="delContact-{{$contact->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            No, cancel
                                        </button>
                                        <button type="submit" wire:click.prevent="deleteContact({{$contact->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            Yes, I'm sure
                                        </button>
                                    </div>
                                </div>
                            </x-pop-modal>
                            <button data-modal-toggle="delContact-{{$contact->id}}">
                                <i class="fa-solid fa-trash text-red-500"></i>
                            </button>
                        </li>
                    @endforeach
                @else
                    No data available
                @endif

            </ul>
        </div>
        <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 ">
            <div class="flex justify-between items-center">
                <x-input-label>
                    <div class="flex justify-start items-center gap-3">
                        <i class="fa-solid fa-phone-square"></i>
                        <div>
                            Phone Number
                        </div>
                    </div>
                </x-input-label>

                <x-pop-modal static="true" modal-title="Add new Phone number" name="addPhone" class="max-w-md">
                    <form class="space-y-4" wire:submit.prevent="saveContact('phone','phone')">
                        <div>
                            <x-input-label value="Phone Number"/>
                            <x-text-input wire:model.lazy="phone" type="number" class="w-full" placeholder="enter phone number"/>
                            <x-input-error :messages="$errors->get('phone')"/>
                        </div>
                        @if(session()->has('phone'))
                            <x-alert-success :message="session('phone')"/>
                        @endif

                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveContact">
                                <div class="text-center m-auto p-2" wire:target="saveContact" wire:loading>
                                    Processing...
                                </div>
                                <div class="text-center m-auto p-2" wire:target="saveContact" wire:loading.remove>
                                    Submit
                                </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>
                <x-secondary-button data-modal-toggle="addPhone" data-modal-target="addPhone" class="text-sky-500 dark:text-sky-500" >
                    Add Phone
                </x-secondary-button>
            </div>
            <ul class="mt-5">

                @if($contact_phone->count()>0)
                    @foreach($contact_phone as $contact)
                        <li class="flex justify-between items-center hover:bg-gray-300 dark:hover:bg-gray-900 duration-300 transition cursor-pointer p-1">
                            <div>
                                {{$contact->contact}}
                            </div>
                            <x-pop-modal name="delContact-{{$contact->id}}" class="max-w-md" static="true">
                                <div class="text-center">
                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300 text-lg">{{$contact->contact}}</p>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this number?</p>
                                    <div class="flex justify-center items-center space-x-4">
                                        <button data-modal-toggle="delContact-{{$contact->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            No, cancel
                                        </button>
                                        <button type="submit" wire:click.prevent="deleteContact({{$contact->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            Yes, I'm sure
                                        </button>
                                    </div>
                                </div>
                            </x-pop-modal>
                            <button data-modal-toggle="delContact-{{$contact->id}}">
                                <i class="fa-solid fa-trash text-red-500"></i>
                            </button>
                        </li>
                    @endforeach
                @else
                    No data available
                @endif

            </ul>
        </div>
        <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 ">
            <div class="flex justify-between items-center">
                <x-input-label>
                    <div class="flex justify-start items-center gap-3">
                        <i class="fa-solid fa-fax"></i>
                        <div>
                            Fax Number
                        </div>
                    </div>

                </x-input-label>

                <x-pop-modal static="true" modal-title="Add new Fax number" name="addFax" class="max-w-md">
                    <form class="space-y-4" wire:submit.prevent="saveContact('fax','fax')">
                        <div>
                            <x-input-label value="Fax Number"/>
                            <x-text-input wire:model.lazy="fax" type="number" class="w-full" placeholder="enter fax number"/>
                            <x-input-error :messages="$errors->get('fax')"/>
                        </div>
                        @if(session()->has('fax'))
                            <x-alert-success :message="session('fax')"/>
                        @endif

                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveContact">
                                <div class="text-center m-auto p-2" wire:target="saveContact" wire:loading>
                                    Processing...
                                </div>
                                <div class="text-center m-auto p-2" wire:target="saveContact" wire:loading.remove>
                                    Submit
                                </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>
                <x-secondary-button data-modal-toggle="addFax" data-modal-target="addFax"  class="text-sky-500 dark:text-sky-500" >
                    Add Fax
                </x-secondary-button>
            </div>
            <ul class="mt-5">

                @if($contact_fax->count()>0)
                    @foreach($contact_fax as $contact)
                        <li class="flex justify-between items-center hover:bg-gray-300 dark:hover:bg-gray-900 duration-300 transition cursor-pointer p-1">
                            <div>
                                {{$contact->contact}}
                            </div>
                            <x-pop-modal name="delContact-{{$contact->id}}" class="max-w-md" static="true">
                                <div class="text-center">
                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300 text-lg">{{$contact->contact}}</p>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this number?</p>
                                    <div class="flex justify-center items-center space-x-4">
                                        <button data-modal-toggle="delContact-{{$contact->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            No, cancel
                                        </button>
                                        <button type="submit" wire:click.prevent="deleteContact({{$contact->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            Yes, I'm sure
                                        </button>
                                    </div>
                                </div>
                            </x-pop-modal>
                            <button data-modal-toggle="delContact-{{$contact->id}}">
                                <i class="fa-solid fa-trash text-red-500"></i>
                            </button>
                        </li>
                    @endforeach
                @else
                    No data available
                @endif

            </ul>
        </div>
        <div class="border border-gray-400 dark:border-gray-600 rounded p-2 gap-2 ">
            <div class="flex justify-between items-center">
                <x-input-label>
                    <div class="flex justify-start items-center gap-3">
                        <i class="fa-solid fa-at"></i>
                        <div>
                            Email
                        </div>
                    </div>

                </x-input-label>

                <x-pop-modal static="true" modal-title="Add new Fax number" name="addEmail" class="max-w-md">
                    <form class="space-y-4" wire:submit.prevent="saveContact('email','email')">
                        <div>
                            <x-input-label value="Email Address"/>
                            <x-text-input wire:model.lazy="email" type="email" class="w-full" placeholder="enter email address"/>
                            <x-input-error :messages="$errors->get('email')"/>
                        </div>
                        @if(session()->has('email'))
                            <x-alert-success :message="session('email')"/>
                        @endif

                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveContact">
                                <div class="text-center m-auto p-2" wire:target="saveContact" wire:loading>
                                    Processing...
                                </div>
                                <div class="text-center m-auto p-2" wire:target="saveContact" wire:loading.remove>
                                    Submit
                                </div>
                            </x-submit-button>
                        </div>
                    </form>
                </x-pop-modal>
                <x-secondary-button data-modal-toggle="addEmail" data-modal-target="addEmail" class="text-sky-500 dark:text-sky-500" >
                    Add Email
                </x-secondary-button>
            </div>
            <ul class="mt-5">

                @if($contact_email->count()>0)
                    @foreach($contact_email as $contact)
                        <li class="flex justify-between items-center hover:bg-gray-300 dark:hover:bg-gray-900 duration-300 transition cursor-pointer p-1">
                            <div>
                                {{$contact->contact}}
                            </div>
                            <x-pop-modal name="delContact-{{$contact->id}}" class="max-w-md" static="true">
                                <div class="text-center">
                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300 text-lg">{{$contact->contact}}</p>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this email?</p>
                                    <div class="flex justify-center items-center space-x-4">
                                        <button data-modal-toggle="delContact-{{$contact->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            No, cancel
                                        </button>
                                        <button type="submit" wire:click.prevent="deleteContact({{$contact->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            Yes, I'm sure
                                        </button>
                                    </div>
                                </div>
                            </x-pop-modal>
                            <button data-modal-toggle="delContact-{{$contact->id}}">
                                <i class="fa-solid fa-trash text-red-500"></i>
                            </button>
                        </li>
                    @endforeach
                @else
                    No data available
                @endif

            </ul>
        </div>
    </div>

</div>


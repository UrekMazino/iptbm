<div>
    <x-slot name="pagetitle">
        Pre com
    </x-slot>
    <nav class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="block md:flex p-3 justify-between items-center">
                <x-link-button :url="route('abh.staff.commercialization.adopter')">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                    </svg>
                    Back
                </x-link-button>

            </div>

        </nav>

    </nav>
    <div class=" md:px-4">
        <div class="mt-16 space-y-4">
            <div class="border relative overflow-hidden border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-900 rounded shadow-md h-96 ">
                @if($technology->tech_photo)
                    <img src="{{\Illuminate\Support\Facades\Storage::url($technology->tech_photo)}}" class="absolute top-0 m-auto object-cover opacity-25 blur-sm  w-full  h-full left-0">
                @endif

                <div class="absolute w-full h-full p-4 gap-10 py-10 md:flex justify-start items-center ">
                    <div class="md:aspect-square h-full border  shadow-black shadow-lg rounded border-gray-200 dark:border-gray-600 flex justify-center items-center">
                        <div class="overflow-hidden ">
                            @if($technology->tech_photo)
                                <a href="{{ route('rtms.file.viewer',[
                                'type' => 'png',
                                'file'=>$technology->tech_photo,
                                'home'=>route('abh.staff.commercialization.adopter.details',['adopter' => $adopter->id]),
                                'base_layout' => \App\View\Components\abh\AbhLayout::class

                                ]) }}">
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($technology->tech_photo)}}" class="max-w-full hover:brightness-50 hover:scale-125 transition duration-300 w-auto max-h-full h-auto"/>
                                </a>

                            @else
                                <img src="{{asset('assets/logo/iptbm.ico')}}" class="max-w-full w-auto max-h-full h-auto"/>
                            @endif
                        </div>


                    </div>
                    <div class="w-full bg-gray-950 bg-opacity-20 p-5 rounded">
                        <p class="text-gray-700 dark:text-white text-xl">
                            {{__("$technology->title")}}
                        </p>
                    </div>
                </div>

            </div>
        </div>
        <x-header-label class="mt-10 mb-2">
            Technology Adopter Details
        </x-header-label>
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 gap-x-10">
            <div class="md:col-span-3">
                <x-card-panel>
                    <div class="space-y-4">
                        <div class="border border-gray-200 group hover:bg-gray-200 dark:hover:bg-gray-900 transition duration-300 dark:border-gray-600 p-2 rounded space-y-4">
                            <div class="flex justify-between items-center">
                                <div class="font-medium">
                                    Company Name
                                </div>
                                <div>
                                    <x-pop-modal name="updateCompName" class="max-w-xl" static="true" modal-title="Update Company Name">
                                        <form class="space-y-6" wire:submit.prevent="saveCompName">
                                            <div class="space-y-4">
                                                <div>
                                                    <x-input-label value="Company" for="compName"/>
                                                    <x-text-input class="w-full" wire:model.lazy="compName" placeholder="enter text here" required/>
                                                    <x-input-error :messages="$errors->get('compName')"/>
                                                </div>
                                                <x-alert-success :message="session('saveComp')"/>


                                            </div>
                                            <div>
                                                <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveCompName">
                                                    <div class="w-full text-center p-2" wire:loading.remove wire:target="saveCompName">
                                                        Submit
                                                    </div>
                                                    <div class="w-full text-center p-2" wire:loading wire:target="saveCompName">
                                                        Processing...
                                                    </div>
                                                </x-submit-button>
                                            </div>

                                        </form>
                                    </x-pop-modal>
                                    <button  data-modal-toggle="updateCompName"
                                             class="rounded-full group-hover:border-sky-600 dark:group-hover:border-sky-600 hover:text-sky-500 hover:bg-gray-200 dark:hover:bg-gray-950 dark:hover:text-sky-500 transition duration-300 px-4 py-1 border border-gray-200 dark:border-gray-700">
                                        Update
                                    </button>
                                </div>
                            </div>
                            <div class="text-gray-800 dark:text-white">
                                {{$adopter->company_name}}
                            </div>
                        </div>
                        <div class="border border-gray-200 group hover:bg-gray-200 dark:hover:bg-gray-900 transition duration-300 dark:border-gray-600 p-2 rounded space-y-4">
                            <div class="flex justify-between items-center">
                                <div class="font-medium">
                                    Company Address
                                </div>
                                <div>
                                    <x-pop-modal name="updateCompAdd" class="max-w-xl" static="true" modal-title="Update Company Address">
                                        <form class="space-y-6" wire:submit.prevent="saveCompAddress">
                                            <div class="space-y-4">
                                                <div>
                                                    <x-input-label value="Company Address" for="compName"/>
                                                    <x-text-input class="w-full" wire:model.lazy="compAddress" placeholder="enter text here" required/>
                                                    <x-input-error :messages="$errors->get('compAddress')"/>
                                                </div>
                                                <x-alert-success :message="session('saveCompAddress')"/>


                                            </div>
                                            <div>
                                                <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveCompAddress">
                                                    <div class="w-full text-center p-2" wire:loading.remove wire:target="saveCompAddress">
                                                        Submit
                                                    </div>
                                                    <div class="w-full text-center p-2" wire:loading wire:target="saveCompAddress">
                                                        Processing...
                                                    </div>
                                                </x-submit-button>
                                            </div>

                                        </form>
                                    </x-pop-modal>
                                    <button  data-modal-toggle="updateCompAdd"
                                             class="rounded-full group-hover:border-sky-600 dark:group-hover:border-sky-600 hover:text-sky-500 hover:bg-gray-200 dark:hover:bg-gray-950 dark:hover:text-sky-500 transition duration-300 px-4 py-1 border border-gray-200 dark:border-gray-700">
                                        Update
                                    </button>
                                </div>
                            </div>
                            <div class="text-gray-800 dark:text-white">
                                {{$adopter->address}}
                            </div>
                        </div>
                        <div class="border border-gray-200 group hover:bg-gray-200 dark:hover:bg-gray-900 transition duration-300 dark:border-gray-600 p-2 rounded space-y-4">
                            <div class="flex justify-between items-center">
                                <div class="font-medium">
                                    Business Structure
                                </div>
                                <div>
                                    <x-pop-modal name="updateCompStruct" class="max-w-xl" static="true" modal-title="Update Business Structure">
                                        <form class="space-y-6" wire:submit.prevent="saveBusinessStructure">
                                            <div>
                                                <x-input-select wire:model="businessStructure">
                                                    <option value="" disabled selected>
                                                        - - Select Business Structure - -
                                                    </option>
                                                    <option value="Sole Proprietorship">
                                                        Sole Proprietorship
                                                    </option>
                                                    <option value="Corporation">
                                                        Corporation
                                                    </option>
                                                    <option value="Partnership">
                                                        Partnership
                                                    </option>
                                                    <option value="Coop">
                                                        Coop
                                                    </option>
                                                </x-input-select>
                                                <x-input-error :messages="$errors->get('businessStructure')"/>
                                                <x-alert-success :message="session('saveBbusinessStructure')"/>
                                            </div>
                                            <div>
                                                <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveBusinessStructure">
                                                    <div class="w-full text-center p-2" wire:loading.remove wire:target="saveBusinessStructure">
                                                        Submit
                                                    </div>
                                                    <div class="w-full text-center p-2" wire:loading wire:target="saveBusinessStructure">
                                                        Processing
                                                    </div>
                                                </x-submit-button>
                                            </div>

                                        </form>

                                    </x-pop-modal>
                                    <button  data-modal-toggle="updateCompStruct"
                                             class="rounded-full group-hover:border-sky-600 dark:group-hover:border-sky-600 hover:text-sky-500 hover:bg-gray-200 dark:hover:bg-gray-950 dark:hover:text-sky-500 transition duration-300 px-4 py-1 border border-gray-200 dark:border-gray-700">
                                        Update
                                    </button>
                                </div>
                            </div>
                            <div class="text-gray-800 dark:text-white">
                                {{$adopter->business_structures}}
                            </div>
                        </div>
                        <div class="border border-gray-200 group hover:bg-gray-200 dark:hover:bg-gray-900 transition duration-300 dark:border-gray-600 p-2 rounded space-y-4">
                            <div class="flex justify-between items-center">
                                <div class="font-medium">
                                    Business Registration
                                </div>
                                <div>
                                    <x-pop-modal name="updateBusReg" class="max-w-xl" static="true" modal-title="Update Business Registration">
                                        <form class="space-y-6" wire:submit.prevent="saveBusinessRegistration">
                                            <div class="mb-6">
                                                <x-input-select wire:model="businessRegistration">
                                                    <option value="" disabled selected>
                                                        - - Select Business Registration - -
                                                    </option>
                                                    <option>
                                                        Not yet registered
                                                    </option>
                                                    <option>
                                                        SEC-registered
                                                    </option>
                                                    <option>
                                                        DTI-registered
                                                    </option>
                                                </x-input-select>
                                                <x-input-error :messages="$errors->get('businessRegistration')"/>
                                                <x-alert-success :message="session('saveBusinessRegistration')"/>

                                            </div>
                                            <div>
                                                <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveBusinessRegistration">
                                                    <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveBusinessRegistration">
                                                        Submit
                                                    </div>
                                                    <div class="p-2 w-full text-center" wire:loading wire:target="saveBusinessRegistration">
                                                        Processing...
                                                    </div>
                                                </x-submit-button>
                                            </div>

                                        </form>
                                    </x-pop-modal>
                                    <button  data-modal-toggle="updateBusReg"
                                             class="rounded-full group-hover:border-sky-600 dark:group-hover:border-sky-600 hover:text-sky-500 hover:bg-gray-200 dark:hover:bg-gray-950 dark:hover:text-sky-500 transition duration-300 px-4 py-1 border border-gray-200 dark:border-gray-700">
                                        Update
                                    </button>
                                </div>
                            </div>
                            <div class="text-gray-800 dark:text-white">
                                {{$adopter->business_registration}}
                            </div>
                        </div>
                         <div class="border border-gray-200 group hover:bg-gray-200 dark:hover:bg-gray-900 transition duration-300 dark:border-gray-600 p-2 rounded space-y-4">
                            <div class="flex justify-between items-center">
                                <div class="font-medium">
                                    Mode of Technology Acquisition
                                </div>
                                <div>
                                    <x-pop-modal name="updateAquic" class="max-w-xl" static="true" modal-title="Update Mode of Technology Acquisition">
                                        <form class="space-y-6" wire:submit.prevent="saveTechAcquisition">
                                            <div class="mb-6">
                                                <x-input-select wire:model="techAcquisition">
                                                    <option value="" disabled selected>
                                                        - - Select Mode of Technology Acquisition - -
                                                    </option>
                                                    <option>
                                                        LIcensing
                                                    </option>
                                                    <option>
                                                        Joint Venture
                                                    </option>
                                                    <option>
                                                        Partnership
                                                    </option>
                                                    <option>
                                                        Outright Sale
                                                    </option>
                                                    <option>
                                                        Distributorship
                                                    </option>
                                                </x-input-select>
                                                <x-input-error :messages="$errors->get('techAcquisition')"/>
                                                <x-alert-success :message="session('saveTechAcquisition')"/>
                                            </div>
                                            <div>
                                                <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveTechAcquisition">
                                                    <div class="w-full text-center p-2" wire:loading.remove wire:target="saveTechAcquisition">
                                                        Submit
                                                    </div>
                                                    <div class="w-full text-center p-2" wire:loading wire:target="saveTechAcquisition">
                                                        Processing...
                                                    </div>
                                                </x-submit-button>
                                            </div>

                                        </form>
                                    </x-pop-modal>
                                    <button  data-modal-toggle="updateAquic"
                                             class="rounded-full group-hover:border-sky-600 dark:group-hover:border-sky-600 hover:text-sky-500 hover:bg-gray-200 dark:hover:bg-gray-950 dark:hover:text-sky-500 transition duration-300 px-4 py-1 border border-gray-200 dark:border-gray-700">
                                        Update
                                    </button>
                                </div>
                            </div>
                            <div class="text-gray-800 dark:text-white">
                                {{$adopter->acquisition_model}}
                            </div>
                        </div>
                        <div class="border border-gray-200 group hover:bg-gray-200 dark:hover:bg-gray-900 transition duration-300 dark:border-gray-600 p-2 rounded space-y-4">
                            <div class="flex justify-between items-center">
                                <div class="font-medium">
                                    Commercialization, for incubation?
                                </div>
                                <div>
                                    <x-pop-modal name="updateConForIncu" class="max-w-xl" static="true" modal-title="Commercialization for Incubation?">
                                        <form class="space-y-6" wire:submit.prevent="saveCommercialForIncubation">
                                            <div class="space-y-4">


                                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                                    <x-text-input wire:model="commercialForIncubation" id="bordered-radio-1" type="radio" value="1" name="bordered-radio"/>
                                                    <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">YES</label>
                                                </div>
                                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                                    <x-text-input wire:model="commercialForIncubation" checked id="bordered-radio-2" type="radio" value="0" name="bordered-radio"/>
                                                    <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NO</label>
                                                </div>
                                                <x-input-error :messages="$errors->get('commercialForIncubation')"/>
                                                <x-alert-success :message="session('saveComForIncubate')"/>



                                            </div>
                                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveCommercialForIncubation">
                                                <div class="p-2.5 w-full text-center" wire:loading.remove wire:target="saveCommercialForIncubation">
                                                    Submit
                                                </div>
                                                <div class="p-2.5 w-full text-center" wire:loading wire:target="saveCommercialForIncubation">
                                                    Processing...
                                                </div>
                                            </x-submit-button>

                                        </form>
                                    </x-pop-modal>
                                    <button  data-modal-toggle="updateCompName"
                                             class="rounded-full group-hover:border-sky-600 dark:group-hover:border-sky-600 hover:text-sky-500 hover:bg-gray-200 dark:hover:bg-gray-950 dark:hover:text-sky-500 transition duration-300 px-4 py-1 border border-gray-200 dark:border-gray-700">
                                        Update
                                    </button>
                                </div>
                            </div>
                            <div class="text-gray-800 dark:text-white">
                                {{$adopter->for_incubation? "YES":"NO"}}
                            </div>
                        </div>
                        <div class="border border-gray-200 group hover:bg-gray-200 dark:hover:bg-gray-900 transition duration-300 dark:border-gray-600 p-2 rounded space-y-4">
                            <div class="flex justify-between items-center">
                                <div class="font-medium">
                                    Brief Description of the Company
                                </div>
                                <div>
                                    <x-pop-modal name="updateBrfDes" class="max-w-xl" static="true" modal-title="Update Company Description">
                                        <form class="space-y-6" wire:submit.prevent="saveCompDescription">
                                            <div class="space-y-4">
                                                <x-text-box rows="10" wire:model.lazy="compDescription" rows="4" placeholder="enter text here..."/>
                                                <x-input-error :messages="$errors->get('compDescription')"/>
                                                <x-alert-success :message="session('saveCompDesc')"/>
                                            </div>
                                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveCompDescription">
                                                <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveCompDescription">
                                                    Submit
                                                </div>
                                                <div class="p-2 w-full text-center" wire:loading wire:target="saveCompDescription">
                                                    Processing...
                                                </div>
                                            </x-submit-button>
                                        </form>
                                    </x-pop-modal>
                                    <button  data-modal-toggle="updateBrfDes"
                                             class="rounded-full group-hover:border-sky-600 dark:group-hover:border-sky-600 hover:text-sky-500 hover:bg-gray-200 dark:hover:bg-gray-950 dark:hover:text-sky-500 transition duration-300 px-4 py-1 border border-gray-200 dark:border-gray-700">
                                        Update
                                    </button>
                                </div>
                            </div>
                            <div class="text-gray-800 dark:text-white">
                                {{$adopter->company_description}}
                            </div>
                        </div>
                    </div>
                </x-card-panel>
            </div>
            <div class="md:col-span-2">
                <x-card-panel title="Contact Details">
                    <div class="w-full mt-4">
                        <div class="space-y-10">
                            <div class="border rounded border-gray-200 dark:border-gray-600 p-2">
                                <div class="flex justify-between items-center">
                                    <div class="flex">
                                        <svg class="w-5 me-2 h-5 text-gray-600 dark:text-gray-400" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
                                            <path
                                                d="M12 0H2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM7.5 17.5h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2ZM12 13H2V4h10v9Z"/>
                                        </svg>
                                        Mobile
                                    </div>
                                    <x-pop-modal name="addMobile" class="max-w-md" modal-title="Add mobile number">
                                        <form class="space-y-6" wire:submit.prevent="saveMobile">
                                            <div class="space-y-4">
                                                <div>
                                                    <x-input-label  value="Mobile number"/>
                                                    <x-text-input class="w-full"  wire:model.lazy="mobileModel" type="number"  placeholder="09## #### ###"/>
                                                    <x-input-error :messages="$errors->get('mobileModel')" />
                                                </div>
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
                                    <x-secondary-button class="gap-2 text-sky-500 dark:text-sky-500" data-modal-toggle="addMobile" data-modal-target="addMobile">

                                        Add
                                    </x-secondary-button>
                                </div>
                                <div class="mt-2 ps-4">
                                    <ul class="divide-y divide-gray-200 dark:divide-gray-600">
                                        @foreach($mobiles as $mobile)
                                            <li>
                                                <livewire:iptbm.staff.adopter.contact wire:key="mobile-{{$mobile->id}}" :contact="$mobile"/>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                            <div class="border rounded border-gray-200 dark:border-gray-600 p-2">
                                <div class="flex justify-between items-center">
                                    <div class="flex">
                                        <svg class="w-5 h-5 me-2 text-gray-600 dark:text-gray-400" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                            <path
                                                d="M10 0A10.011 10.011 0 0 0 0 10v5a3 3 0 0 0 3 3h3a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1H3c-.326.004-.65.062-.957.171a8 8 0 0 1 15.914 0A2.954 2.954 0 0 0 17 9h-3a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h3a3 3 0 0 0 3-3v-5A10.011 10.011 0 0 0 10 0Z"/>
                                        </svg>
                                        Phone
                                    </div>
                                    <x-pop-modal name="addPhone" class="max-w-md" modal-title="Add Phone number">
                                        <form class="space-y-6" wire:submit.prevent="savePhone">
                                            <div class="space-y-4">
                                                <div>
                                                    <x-input-label  value="Phone number"/>
                                                    <x-text-input class="w-full"  wire:model.lazy="phoneModel" type="number"  placeholder="##/### #######"/>
                                                    <x-input-error :messages="$errors->get('phoneModel')" />
                                                </div>
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
                                    <x-secondary-button class="gap-2 text-sky-500 dark:text-sky-500" data-modal-toggle="addPhone" data-modal-target="addPhone">

                                        Add
                                    </x-secondary-button>
                                </div>
                                <div class="mt-2 ps-4">
                                    <ul class="divide-y divide-gray-200 dark:divide-gray-600">
                                        @foreach($phones as $phone)
                                            <li>
                                                <livewire:iptbm.staff.adopter.contact wire:key="phone-{{$phone->id}}" :contact="$phone"/>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>

                            <div class="border rounded border-gray-200 dark:border-gray-600 p-2">
                                <div class="flex justify-between items-center">
                                    <div class="flex">
                                        <svg class="w-5 h-5 me-2 text-gray-600 dark:text-gray-400" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M5 20h10a1 1 0 0 0 1-1v-5H4v5a1 1 0 0 0 1 1Z"/>
                                            <path
                                                d="M18 7H2a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2v-3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-1-2V2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3h14Z"/>
                                        </svg>
                                        Fax
                                    </div>
                                    <x-pop-modal name="addFax" class="max-w-md" modal-title="Add Fax number">
                                        <form class="space-y-6" wire:submit.prevent="saveFax">
                                            <div class="space-y-4">
                                                <div>
                                                    <x-input-label  value="Fax number"/>
                                                    <x-text-input class="w-full"  wire:model.lazy="faxModel" type="number"  placeholder="##/### #######"/>
                                                    <x-input-error :messages="$errors->get('faxModel')" />
                                                </div>
                                            </div>
                                            <div>
                                                <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveFax">
                                                    <div class="w-full text-center p-2" wire:loading.remove wire:target="saveFax">
                                                        Submit
                                                    </div>
                                                    <div class="w-full text-center p-2" wire:loading wire:target="saveFax">
                                                        Processing...
                                                    </div>
                                                </x-submit-button>
                                            </div>

                                        </form>
                                    </x-pop-modal>
                                    <x-secondary-button class="gap-2 text-sky-500 dark:text-sky-500" data-modal-toggle="addFax" data-modal-target="addFax">

                                        Add
                                    </x-secondary-button>
                                </div>
                                <div class="mt-2 ps-4">
                                    <ul class="divide-y divide-gray-200 dark:divide-gray-600">
                                        @foreach($faxs as $fax)
                                            <li>
                                                <livewire:iptbm.staff.adopter.contact wire:key="fax-{{$fax->id}}" :contact="$fax"/>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                            <div class="border rounded border-gray-200 dark:border-gray-600 p-2">
                                <div class="flex justify-between items-center">
                                    <div class="flex">
                                        <svg class="w-5 h-5 me-2 text-gray-600 dark:text-gray-400" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        Email
                                    </div>
                                    <x-pop-modal name="addEmail" class="max-w-md" modal-title="Add Email Address">
                                        <form class="space-y-6" wire:submit.prevent="saveEmail">
                                            <div class="space-y-4">
                                                <div>
                                                    <x-input-label  value="Email Address"/>
                                                    <x-text-input class="w-full"  wire:model.lazy="emailModel" type="email"  placeholder="sample@email.com"/>
                                                    <x-input-error :messages="$errors->get('emailModel')" />
                                                </div>
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
                                    <x-secondary-button class="gap-2 text-sky-500 dark:text-sky-500" data-modal-toggle="addEmail" data-modal-target="addEmail">

                                        Add
                                    </x-secondary-button>
                                </div>
                                <div class="mt-2 ps-4">
                                    <ul class="divide-y divide-gray-200 dark:divide-gray-600">
                                        @foreach($emails as $email)
                                            <li>
                                                <livewire:iptbm.staff.adopter.contact wire:key="fax-{{$email->id}}" :contact="$email"/>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>

                        </div>
                    </div>
                </x-card-panel>
            </div>
        </div>
    </div>

</div>

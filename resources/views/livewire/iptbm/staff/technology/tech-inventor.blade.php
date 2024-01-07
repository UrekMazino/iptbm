
<x-card-panel title="Technology Generator">
    <x-slot:button>
        <x-pop-modal static="true" name="updateTechInventor" class="max-w-2xl" modal-title=" Update Technology Inventor">
            <form wire:submit.prevent="saveInventor" class="space-y-4">
                <div>
                    <x-input-label value="Inventor/Generator"/>
                    <x-text-input class="w-full" wire:model.lazy="techInventor" list="inventorList" type="search"
                                  placeholder="type to search"/>
                    <datalist id="inventorList">
                        @foreach($inventors as $inventor)
                            <option
                                value="{{$inventor->id.") ".$inventor->name." ".(($inventor->middle_name)? $inventor->middle_name.".":" ")." ".$inventor->last_name." ".$inventor->suffixes }}">

                            </option>
                        @endforeach
                    </datalist>
                    <x-input-error :messages="$errors->get('inventorId')"/>
                    <x-input-error :messages="$errors->get('techInventor')"/>
                </div>
                <div>
                    <x-input-label value=" Date affiliated"/>
                    <div class="relative w-full ">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <x-text-input  id="datedAff" autocomplete="off" wire:model.lazy="dateAffiliated"
                                      type="text" class="pl-10 p-2.5 w-full" datepicker datepicker-format="MM-dd-yyyy"
                                      placeholder="select date"/>
                    </div>
                </div>

                <div class="mb-6 text-end">
                    <a href="{{route("iptbm.staff.inventor")}}"
                       class="font-medium text-blue-600 dark:text-blue-500 hover:underline"> <span
                            class="fa-solid fa-plus-circle"></span> Add new Technology Generator?</a>
                </div>
                <div>
                    <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveInventor">
                        <div class="p-2 w-full text-center" wire:loading wire:target="saveInventor">
                            Processing...
                        </div>
                        <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveInventor">
                            Submit
                        </div>
                    </x-submit-button>
                </div>
            </form>

        </x-pop-modal>
        <x-secondary-button data-modal-toggle="updateTechInventor" class="text-sky-600 dark:text-sky-600">
            Update
        </x-secondary-button>
    </x-slot:button>
    <div class="mt-4">
        <dl class="w-full text-gray-900  space-y-4 py-2  dark:text-gray-50 ">
            @forelse($technologyInventors as $generator)
                <div>
                    <div
                        class="group overflow-hidden relative border border-gray-200 dark:border-gray-700 rounded flex justify-between hover:bg-gray-500 dark:hover:bg-gray-950 hover:bg-opacity-25 px-2 transition duration-300">
                        <div class="flex flex-col py-2">
                            <dt class=" text-gray-500 md:text-lg dark:text-gray-300">
                                <a href="{{route("iptbm.inventor.show.profile",['id'=>$generator->inventor->id])}}"
                                   class=" text-blue-500 dark:text-blue-400 hover:underline">
                                    {{$generator->inventor->name." ".(($generator->inventor->middle_name)? $generator->inventor->middle_name.".":" ")." ".$generator->inventor->last_name." ".$generator->inventor->suffixes }}
                                </a>
                            </dt>
                            <dt class=" text-gray-500 md:text-base font-normal dark:text-gray-300">{{$generator->inventor->address}}</dt>
                            <dd class="text-sm text-gray-400">{{$generator->inventor->agency_name->name}}</dd>
                        </div>
                        <x-pop-modal class="max-w-md" name="delete-owner-{{$generator->id}}">
                            <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                            <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                            <div class="flex justify-center items-center space-x-4">
                                <button data-modal-toggle="delete-owner-{{$generator->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                    No, cancel
                                </button>
                                <button type="submit" wire:click.prevent="deleteTechInventor({{$generator->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                    Yes, I'm sure
                                </button>
                            </div>
                        </x-pop-modal>
                        <div class="flex transition duration-300 rounded-l-full bg-gray-500 dark:bg-gray-900 bg-opacity-80 justify-center items-center absolute group-hover:transform group-hover:-translate-x-36 -right-40 top-0 h-full w-fit px-10">


                            <x-secondary-button class="text-red-500 dark:text-red-500" data-modal-target="delete-owner-{{$generator->id}}" data-modal-toggle="delete-owner-{{$generator->id}}">
                                <span class="fa-solid fa-trash-can "></span>
                            </x-secondary-button>
                        </div>

                    </div>
                </div>

            @empty
                No data available

            @endforelse

        </dl>

    </div>
</x-card-panel>
@push('scripts')
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {

            document.getElementById('datedAff').addEventListener('changeDate', (event) => {

                @this.dateAffiliated = event.target.value;

            });

        });
    </script>
@endpush

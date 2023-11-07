<x-card class="shadow-lg">
    <div class="text-gray-600 dark:text-gray-300 font-medium text-base flex justify-between">
        <div>
            <span class="fa-solid fa-user-tie text-blue-900 dark:text-blue-300 rounded-full bg-blue-200 dark:bg-gray-900 p-1 px-2 text-sm"></span>
            Technology Generator
        </div>
        <div>
            <x-pop-modal  static="true" name="updateTechInventor" class="max-w-2xl" >
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                    Update Technology Inventor
                </h3>
                <form wire:submit.prevent="saveInventor">
                    <div class="mb-6">
                        <label for="search" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Inventor</label>
                        <x-text-input class="w-full" wire:model.lazy="techInventor" list="inventorList" type="search" placeholder="type to search" />
                        <datalist id="inventorList">
                            @foreach($inventors as $inventor)
                                <option value="{{$inventor->id.") ".$inventor->name." ".(($inventor->middle_name)? $inventor->middle_name.".":" ")." ".$inventor->last_name." ".$inventor->suffixes }}">

                                </option>
                            @endforeach
                        </datalist>
                        @error('inventorId')
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
                        @error('techInventor')

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
                        <x-input-label class="mt-4">
                            <div>
                                Date affiliated
                            </div>
                            <div class="relative max-w-sm ">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <x-text-input id="datedAff"  autocomplete="off" wire:model.lazy="dateAffiliated" type="text" class="pl-10 p-2.5" datepicker datepicker-format="MM-dd-yyyy" placeholder="select date" />
                            </div>
                        </x-input-label>



                    </div>

                    @if(session()->has('inventor'))
                        <div
                            class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            <span class="font-medium">{{session('inventor')}}</span>
                        </div>
                    @endif
                    <div class="mb-6">
                        <a href="{{route("iptbm.staff.inventor")}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"> <span class="fa-solid fa-plus-circle"></span>  Add new Technology Generator?</a>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>

            </x-pop-modal>
            <x-secondary-button data-modal-toggle="updateTechInventor" class="text-sky-600 dark:text-sky-600">
                Update
            </x-secondary-button>
        </div>
    </div>

    @if($technologyInventors->count() > 0)
        <div class="mt-4 p-4">
            <div wire:loading wire:target="deleteTechInventor">
                Loading...
            </div>
            <dl class="w-full text-gray-900 divide-y divide-gray-200 dark:text-gray-50 dark:divide-gray-600">
                @foreach($technologyInventors as $generator)
                    <div class="flex justify-between hover:bg-gray-500 dark:hover:bg-gray-800 hover:bg-opacity-25 px-4 transition duration-300">
                        <div class="flex flex-col py-2">
                            <dt class=" text-gray-500 md:text-lg dark:text-gray-300">
                                <a href="{{route("iptbm.inventor.show.profile",['id'=>$generator->inventor->id])}}" class=" text-blue-500 dark:text-blue-400 hover:underline">
                                    {{$generator->inventor->name." ".(($generator->inventor->middle_name)? $generator->inventor->middle_name.".":" ")." ".$generator->inventor->last_name." ".$generator->inventor->suffixes }}
                                </a>
                            </dt>
                            <dt class=" text-gray-500 md:text-base font-normal dark:text-gray-300">{{$generator->inventor->address}}</dt>
                            <dd class="text-sm text-gray-400">{{$generator->inventor->agency_name->name}}</dd>
                        </div>
                        <button wire:click.prevent="deleteTechInventor({{$generator->id}})">
                            <span class="fa-solid fa-trash-can"></span>
                        </button>
                    </div>
                @endforeach


            </dl>

        </div>
    @endif
</x-card>
@push('scripts')
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {

            document.getElementById('datedAff').addEventListener('changeDate', (event) => {

                @this.dateAffiliated=event.target.value;

            });

        });
    </script>
@endpush

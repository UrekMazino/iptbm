<div>
    <div class="flex justify-between items-center">
        <x-item-header class="justify-start items-center">
            <div class="rounded-full hidden md:block me-2 border-gray-200  dark:border-gray-900 p-2 overflow-hidden border-8 bg-blue-300 dark:bg-blue-900">
                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 9 2 3 5-5M9 19A18.55 18.55 0 0 1 1 4l8-3 8 3a18.549 18.549 0 0 1-8 15Z"/>
                </svg>
            </div>

            IP protection application
        </x-item-header>
        <x-pop-modal static="true"  class="max-w-xl " name="applicationModal" modal-title="IP Protection Application">
            <form class="mt-3" wire:submit.prevent="saveForm">
                <x-input-label >
                    Types of Protection
                    <x-input-select wire:model="ipTypeModel" required>
                        <option value="">
                            Select Protection
                        </option>
                        @foreach($ipType as $type)
                            <option value="{{$type->id}}">
                                {{$type->name}}
                            </option>
                        @endforeach
                    </x-input-select>
                    @error('ipTypeModel')
                    <x-input-error :messages="$message"/>
                    @enderror
                </x-input-label>
                <x-input-label class="mt-4">
                    Application number
                    <x-text-input wire:model.lazy="applicationNumberModel" placeholder="enter text here" class="w-full"/>
                    @error('applicationNumberModel')
                    <x-input-error :messages="$message"/>
                    @enderror
                </x-input-label>

                <x-input-label class="mt-4">
                    Date Filed
                    <div class="relative w-full ">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <x-text-input wire:model="dateFiledModel" id="dateFiled" readonly class="pl-10 p-2.5 w-full" autocomplete="off" datepicker datepicker-format="MM-dd-yyyy" placeholder="select date" />
                    </div>
                    {{$applicationNumberModel}}
                    @error('dateFiledModel')
                    <x-input-error :messages="$message"/>
                    @enderror
                </x-input-label>

                <x-submit-button disabled wire:loading wire:target="saveForm" class="py-2 mt-4">
                    Processing...
                </x-submit-button>
                <x-submit-button wire:loading.remove wire:target="saveForm" class="py-2 mt-4">
                    Submit
                </x-submit-button>
            </form>
        </x-pop-modal>
        <x-secondary-button data-modal-toggle="applicationModal" class="text-sky-600 dark:text-sky-600">
            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
            </svg>
            Update
        </x-secondary-button>
    </div>

    @if($technology->ip_applications->count()>0)
        <ul class="space-y-2 indent-0  mt-5">
            @foreach($technology->ip_applications as $protection)
                <li>

                    <a href="{{route("iptbm.staff.ip-management.application.index",['id'=>$protection->id])}}" class="inline-flex shadow-lg items-center justify-center p-2 text-base font-medium text-gray-500 rounded-lg bg-gray-50 hover:text-gray-900 hover:bg-gray-300 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-600 dark:hover:text-white">
                        <span class="w-full">
                              {{$protection->ip_type->name}}
                        </span>
                        <svg class="w-4 h-4 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>


                </li>
            @endforeach
        </ul>
    @else
        <div class="justify-center w-full flex">
            <x-sub-label>
                No data Available
            </x-sub-label>
        </div>

    @endif
</div>
@push('scripts')
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {

            document.getElementById('dateFiled').addEventListener('changeDate', (event) => {

                @this.dateFiledModel=event.target.value;

            });

        });
    </script>
@endpush

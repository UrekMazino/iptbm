<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="border rounded border-gray-200 dark:border-gray-700 p-4 flex justify-center items-center gap-4">
        <div class="font-medium text-base divide-y divide-gray-300 dark:divide-gray-700 w-full">
            <div class="text-center">
                {{$project->project_leader}}
            </div>
            <div class="text-center text-base font-normal">
                Project Leader
            </div>
        </div>
        <x-pop-modal name="updatedLeader" class="max-w-xl" modal-title="Updated Project Leader" static="true">
            <form class="space-y-7" wire:submit.prevent="saveLeader">
                <div>
                    <x-input-label value="Full name" />
                    <x-text-input wire:model.lazy="leader" class="w-full" placeholder="Enter text here..."/>
                    <x-input-error :messages="$errors->get('leader')"/>
                </div>
                <div>
                    <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveLeader">
                        <div class="p-2 w-full text-center" wire:loading wire:target="saveLeader">
                            Processing...
                        </div>
                        <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveLeader">
                            Submit
                        </div>
                    </x-submit-button>
                </div>
            </form>
        </x-pop-modal>
        <x-secondary-button class="text-sky-500 dark:text-sky-500" data-modal-toggle="updatedLeader">
            Edit
        </x-secondary-button>
    </div>
    <div class="border rounded border-gray-200 dark:border-gray-700 p-4 font-medium text-base divide-y divide-gray-300 dark:divide-gray-700">
        <div class="text-center">
            {{\Carbon\Carbon::parse($project->implementation_period)->format('F-d-Y')}}
        </div>
        <div class="text-center text-base font-normal">
            Approve Implementation Date
        </div>
    </div>
    <div class="border rounded border-gray-200 dark:border-gray-700 p-4 flex justify-center items-center gap-4">
        <x-pop-modal name="updateDateImp" class="max-w-md" static="true" modal-title="Update implementation date">
            <form class="space-y-4" wire:submit.prevent="saveChangeDate">
                <div>

                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <x-text-input wire:model="changeDate" type="text" id="DateChangeImp" datepicker datepicker-format="MM-dd-yyyy" placeholder="select date" class="w-full ps-10" />
                    </div>
                    <x-input-error :messages="$errors->get('changeDate')" />

                </div>
                <div>
                    <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveChangeDate">
                        <div class="p-2 w-full" wire:loading wire:target="saveChangeDate">
                            Processing...
                        </div>
                        <div class="p-2 w-full" wire:loading.remove wire:target="saveChangeDate">
                            Submit
                        </div>
                    </x-submit-button>
                </div>
            </form>
        </x-pop-modal>
        @if($project->change_in_implementation)
            <div class="font-medium text-base divide-y divide-gray-300 dark:divide-gray-700 w-full">
                <div class="text-center">
                    {{\Carbon\Carbon::parse($project->change_in_implementation)->format('F-d-Y')}}
                </div>
                <div class="text-center text-base font-normal">
                   Change in date of Implementation
                </div>
            </div>
            <x-secondary-button class="text-sky-500 dark:text-sky-500" data-modal-toggle="updateDateImp">
                Update
            </x-secondary-button>
        @else

            <x-secondary-button class="text-sky-500 dark:text-sky-500" data-modal-toggle="updateDateImp">
                Change in date of implementation
            </x-secondary-button>
        @endif

    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {
            document.getElementById('DateChangeImp').addEventListener('changeDate', (event) => {

                @this.changeDate = event.target.value;
            });
        })

    </script>
@endpush

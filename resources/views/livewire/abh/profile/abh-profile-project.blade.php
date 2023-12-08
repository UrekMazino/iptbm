<x-card-panel title="Projects">
    <x-slot:button>
        <x-pop-modal modal-title="Add new Project" name="addProj" class="max-w-2xl" static="true">
            <div class="border rounded border-gray-200 dark:border-gray-700 p-2 bg-gray-200 dark:bg-gray-800">
                <form class="space-y-4" wire:submit.prevent="saveProject">
                    <div>
                        <x-input-label for="projectTitle" value="Project Title"/>
                        <x-text-box wire:model="title" rows="3" id="projectTitle" placeholder="Enter text here..."/>
                        <x-input-error :messages="$errors->get('title')" />
                    </div>
                    <div>
                        <x-input-label value="Project Leader"/>
                        <x-text-input wire:model="leader" placeholder="enter full name" class="w-full"/>
                        <x-input-error :messages="$errors->get('leader')" />
                    </div>
                    <div>
                        <x-input-label value="Approve Implementation Date"/>
                        <div class="relative max-w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <x-text-input wire:model="approvedDate" id="DateApprove" datepicker  datepicker-format="MM-dd-yyyy" placeholder="insert date" class="w-full ps-10" />

                        </div>
                        <x-input-error :messages="$errors->get('approvedDate')"/>
                    </div>
                    <div>
                        <div class="grid grid-cols-1 md:grid-cols-2 border border-gray-300 dark:border-gray-700 rounded p-2 gap-2">
                            <div class="w-full">
                                <x-input-label value="Duration"/>
                                <x-text-input disabled="{{(!$approvedDate)}}" wire:model="duration"  type="number" max="100" min="0" placeholder="Enter number of duration" class="w-full"/>
                            </div>
                            <div>
                                <x-input-label value="Project Ends"/>
                                <div class="text-xl mt-2">
                                    {{$endDate}}
                                </div>
                            </div>
                        </div>
                        <div>
                            <x-input-error :messages="$errors->get('duration')"/>
                        </div>
                    </div>
                    <div>
                        <x-input-label value="Budget" />
                        <x-text-input wire:model="budget" type="number" step="any" placeholder="enter amount" class="w-full"/>
                        <x-input-error :messages="$errors->get('budget')" />
                    </div>
                    <div class="pt-10">
                        <x-submit-button type="submit" class="min-w-full" wire:loading.attr="disabled" wire:target="saveProject" >
                            <div  class="w-full items-center justify-center flex p-2" wire:loading wire:target="saveProject">
                                Processing...
                            </div>
                            <div  class="w-full items-center justify-center flex p-2" wire:loading.remove wire:target="saveProject">
                                Submit
                            </div>
                        </x-submit-button>
                    </div>


                </form>
            </div>
        </x-pop-modal>
        <x-secondary-button class="text-xs text-sky-600 dark:text-sky-600 gap-2" data-modal-toggle="addProj" >
            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
            </svg>
            Add Project
        </x-secondary-button>
    </x-slot:button>
    <div>
        <ul class="list-disc px-4 space-y-4">
            @forelse($profile->projects as $project)
                <li>

                    <a href="{{route("abh.staff.profile.project",['project'=>$project->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{$project->project_name}}</a>

                </li>
            @empty
                No data available
            @endforelse
        </ul>
    </div>
</x-card-panel>
@push('scripts')
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {
            document.getElementById('DateApprove').addEventListener('changeDate', (event) => {

                @this.approvedDate = event.target.value;

            });
        })

    </script>
@endpush

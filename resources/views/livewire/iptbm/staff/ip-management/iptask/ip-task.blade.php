<div class="w-full mb-20">
    <x-card-panel title="{{$task->task_name}}">
        <x-slot:button>
            <!-- Main modal -->
            <x-pop-modal name="modal{{$task->id}}" class="max-w-4xl" static="true"
                         modal-title="{{$task->task_name}} Task">
                <form wire:submit.prevent="saveTask" class="space-y-6">
                    <div class="space-y-4">
                        <div>
                            <x-input-label value="Select Task"/>
                            <x-input-select class="w-full" required wire:model.lazy="taskModel">
                                <option value="" selected>Select</option>
                                @foreach($task->stages as $stage)
                                    <option value="{{$stage->id}}">{{$stage->stage_name}}</option>
                                @endforeach
                            </x-input-select>
                            <x-input-error :messages="$errors->get('taskModel')"/>
                        </div>
                        <div>
                            <x-input-label value="Upload File"/>
                            <x-text-input class="w-full" required wire:model.lazy="attachmentModel" accept="application/pdf" type="file"/>
                            <x-input-error :messages="$errors->get('attachmentModel')"/>
                        </div>
                        <div>
                            <x-input-label value="Deadline"/>


                            <div class="relative w-full ">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <x-text-input  id="dateDeadline" autocomplete="off" wire:model.lazy="deadlineModel"
                                               type="text" class="pl-10 p-2.5 w-full" datepicker datepicker-format="MM-dd-yyyy"
                                               placeholder="select date"/>
                            </div>

                            <x-input-error :messages="$errors->get('deadlineModel')"/>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 my-6">
                            <div class="border border-gray-200 dark:border-gray-600 rounded p-4">
                                <x-item-header class="mb-3">
                                    Prioritization/Urgency
                                </x-item-header>
                                <div class="space-y-2">
                                    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input type="radio"  required wire:model="priorityModel" value="LOW" id="default-radio-1" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">LOW </label>
                                    </div>
                                    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input type="radio" required wire:model="priorityModel" value="HIGH" id="default-radio-2" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">HIGH</label>
                                    </div>
                                </div>

                                <x-input-error :messages="$errors->get('priorityModel')"/>


                            </div>
                            <div class="border border-gray-200 dark:border-gray-600 rounded p-4">
                                <x-item-header class="mb-3">
                                    Task Status
                                </x-item-header>
                                <div class="space-y-2">
                                    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input type="radio" required wire:model.lazy="taskStatusModel" value="ONGOING" id="statOnGoing" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="statOnGoing" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">ONGOING </label>
                                    </div>
                                    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input type="radio" required wire:model.lazy="taskStatusModel" value="DONE" id="statDone" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="statDone" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">DONE</label>
                                    </div>
                                </div>

                                <x-input-error :messages="$errors->get('taskStatusModel')"/>

                            </div>
                        </div>
                        <div class="text-black dark:text-black">
                            <x-input-label value="Notes/Description"/>
                            <div wire:ignore>
                                <x-text-box wire:model.lazy="noteModel" class="text-black dark:text-black" style="text-decoration-color: black" name="content" id="editor{{$task->id}}"/>
                            </div>

                            <x-input-error :messages="$errors->get('noteModel')"/>
                        </div>
                    </div>


                    <div>
                        <x-submit-button class="min-w-full" wire:loading.attr.remove="disabled" wire:target="saveTask">
                            <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveTask">
                                Submit
                            </div>
                            <div class="p-2 w-full text-center" wire:loading wire:target="saveTask">
                                Processing...
                            </div>
                        </x-submit-button>
                    </div>

                </form>
            </x-pop-modal>


            <x-secondary-button class="text-sky-500 dark:text-sky-500" data-modal-target="modal{{$task->id}}"
                                data-modal-toggle="modal{{$task->id}}">
                <svg class="w-4 h-4 me-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 18 18">
                    <path
                        d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10ZM17 13h-2v-2a1 1 0 0 0-2 0v2h-2a1 1 0 0 0 0 2h2v2a1 1 0 0 0 2 0v-2h2a1 1 0 0 0 0-2Z"/>
                </svg>
                Add New Task
            </x-secondary-button>


        </x-slot:button>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Task Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Task Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 w-20">
                       Action
                    </th>

                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($stagesList as $stage)
                    <tr class="bg-white  dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$stage->stage->stage_name}}
                        </th>
                        <td class="px-6 py-4">
                            {{\Carbon\Carbon::parse($task->deadline)->format('d-M-Y')}}
                        </td>
                        <td class="px-6 py-4">
                            {{$stage->task_status}}
                        </td>
                        <td class="px-6 py-4">
                           <div class="w-full flex justify-start gap-4 items-center">

                               <x-link-button :url="route('iptbm.staff.iptask.view',['id'=>$stage->id])">
                                   View
                               </x-link-button>
                               <livewire:iptbm.staff.ip-management.iptask.delete-stage wire:key="{{$stage->id}}" :stage="$stage"/>
                           </div>
                        </td>

                    </tr>
                @empty

                    <tr>
                        <td colspan="4">
                            <div class="py-4 sm:pb-4 text-sm  hover:bg-gray-300 hover:text-gray-700 transition hover:shadow-lg dark:hover:text-gray-200 dark:hover:bg-gray-800  duration-300">
                                <div class="text-center m-auto text-gray-500 dark:text-gray-400">
                                    No Data Available
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforelse



                </tbody>
            </table>
        </div>


    </x-card-panel>

</div>
@push('scripts')
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
    <script type="text/javascript">

        document.addEventListener('livewire:load', function () {

            document.getElementById('dateDeadline').addEventListener('changeDate', (event) => {

                @this.deadlineModel = event.target.value;

            });

        });
        $(document).ready(function () {


            ClassicEditor
                .create(document.querySelector('#editor{{$task->id}}'),{

                })
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                        @this.
                        set('noteModel', editor.getData());
                    })
                })
                .catch(handleSampleError);

            function handleSampleError(error) {
                const issueUrl = 'https://github.com/ckeditor/ckeditor5/issues';

                const message = [
                    'Oops, something went wrong!',
                    `Please, report the following error on ${issueUrl} with the build id "pojnoujc5m6d-a9ruuufzvrb5" and the error stack trace:`
                ].join('\n');

                console.error(message);
                console.error(error);
            }



        })
    </script>
@endpush

<div class="w-full mb-20">
    <x-card-panel title="{{$task->task_name}}">
        <x-slot:button>
            <!-- Main modal -->
            <x-pop-modal name="modal{{$task->id}}" class="max-w-4xl" static="true"
                         modal-title="{{$task->task_name}} Task">
                <form wire:submit.prevent="saveTask" class="space-y-4">
                    <div>
                        <x-input-label value="Select Task"/>
                        <x-input-select class="w-full" required wire:model.lazy="taskModel">
                            <option value="" selected>Select</option>
                            @foreach($task->stages as $stage)
                                <option value="{{$stage->id}}">{{$stage->stage_name}}</option>
                            @endforeach
                        </x-input-select>
                        <div wire:loading wire:target="taskModel" class="text-blue-600 font-medium">
                            Loading...
                        </div>
                        <x-input-error :messages="$errors->get('taskModel')"/>
                    </div>
                    <div>
                        <x-input-label value="Upload File"/>
                        <x-text-input class="w-full" required wire:model.lazy="attachmentModel" type="file"/>
                        <div wire:loading wire:target="attachmentModel" class="text-blue-600 font-medium">
                            Loading...
                        </div>
                        <x-input-error :messages="$errors->get('attachmentModel')"/>
                    </div>
                    <div>
                        <x-input-label value="Deadline"/>
                        <x-text-input class="w-full" wire:ignore wire:model.lazy="deadlineModel" id="deadline"
                                      type="datetime-local"/>
                        <div wire:loading wire:target="deadlineModel" class="text-blue-600 font-medium">
                            Loading...
                        </div>
                        <x-input-error :messages="$errors->get('deadlineModel')"/>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-6">
                        <x-card>
                            <x-item-header class="mb-3">
                                Prioritization/Urgency
                            </x-item-header>
                            <div class="grid grid-cols-2">
                                <div class="flex items-center mb-1">
                                    <input required wire:model="priorityModel" value="LOW" id="default-radio-1"
                                           type="radio"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="default-radio-1"
                                           class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Low</label>
                                </div>
                                <div class="flex items-center">
                                    <input required wire:model="priorityModel" value="HIGH" id="default-radio-2"
                                           type="radio"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="default-radio-2"
                                           class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">High</label>
                                </div>
                            </div>

                            @error('priorityModel')
                            <div id="alert-border-2"
                                 class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                                 role="alert">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <div class="ml-3 text-sm font-medium">
                                    {{$message}}
                                </div>
                            </div>
                            @enderror

                        </x-card>
                        <x-card>
                            <x-item-header class="mb-3">
                                Task Status
                            </x-item-header>
                            <div class="grid grid-cols-2">
                                <div class="flex items-center mb-1">
                                    <input required wire:model.lazy="taskStatusModel" value="ONGOING" id="statOnGoing"
                                           type="radio"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="statOnGoing"
                                           class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ongoing</label>
                                </div>
                                <div class="flex items-center">
                                    <input required wire:model.lazy="taskStatusModel" value="DONE" id="statDone"
                                           type="radio"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="statDone"
                                           class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Done</label>
                                </div>
                            </div>

                            @error('taskStatusModel')
                            <div id="alert-border-2"
                                 class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                                 role="alert">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <div class="ml-3 text-sm font-medium">
                                    {{$message}}
                                </div>
                            </div>
                            @enderror
                        </x-card>
                    </div>


                    <div>

                        <x-input-label value="Notes/Description"/>
                        <div wire:ignore>
                            <x-text-box wire:model.lazy="noteModel" name="content" id="editor{{$task->id}}"/>
                        </div>
                        <div wire:loading wire:target="noteModel" class="text-blue-600 font-medium">
                            Loading...
                        </div>
                        <x-input-error :messages="$errors->get('noteModel')"/>
                    </div>

                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Submit
                    </button>
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
        <div class=" border-b border-t border-gray-300 dark:border-gray-600 py-1 mt-2 shadow-lg">
            <div class="grid grid-cols-7 text-gray-600 dark:text-gray-400 gap-2 ">
                <div class="col-span-3">
                    Task Name
                </div>
                <div class="col-span-2">
                    Deadline
                </div>
                <div>
                    Status
                </div>
                <div>
                    Action
                </div>
            </div>
        </div>
        <div class="mt-2">
            <ul class="max-w-full pb-4 w-full divide-y divide-gray-200 dark:divide-gray-400">
                @if($stagesList->count()>0)
                    @foreach($stagesList as $stage)

                        <li class=" text-sm p-2  hover:bg-gray-300 hover:text-gray-700 transition hover:shadow-lg dark:hover:text-gray-200 dark:hover:bg-gray-800  duration-300">
                            <div class="grid grid-cols-7 text-gray-600 dark:text-gray-300 gap-2">
                                <div class="col-span-3">
                                    {{$stage->stage->stage_name}}
                                </div>
                                <div class="col-span-2">
                                    {{\Carbon\Carbon::parse($task->deadline)->format('d-M-Y || g:i:s A')}}
                                </div>
                                <div>
                                    {{$stage->task_status}}
                                </div>
                                <div class="flex justify-content-center items-center">
                                    <a class="m-auto" href="{{route("iptbm.staff.iptask.view",['id'=>$stage->id])}}">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                            <path
                                                d="M4.09 7.586A1 1 0 0 1 5 7h13V6a2 2 0 0 0-2-2h-4.557L9.043.8a2.009 2.009 0 0 0-1.6-.8H2a2 2 0 0 0-2 2v14c.001.154.02.308.058.457L4.09 7.586Z"/>
                                            <path
                                                d="M6.05 9 2 17.952c.14.031.281.047.424.048h12.95a.992.992 0 0 0 .909-.594L20 9H6.05Z"/>
                                        </svg>
                                    </a>
                                    <livewire:iptbm.staff.ip-management.iptask.delete-stage wire:key="{{$stage->id}}"
                                                                                            :stage="$stage"/>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                    <li class="pb-3 sm:pb-4 text-sm  hover:bg-gray-300 hover:text-gray-700 transition hover:shadow-lg dark:hover:text-gray-200 dark:hover:bg-gray-800  duration-300">
                        <div class="text-center m-auto text-gray-500 dark:text-gray-400">
                            No Data Available
                        </div>
                    </li>
                @endif


            </ul>
        </div>
    </x-card-panel>

</div>
@push('scripts')
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
    <script type="text/javascript">


        $(document).ready(function () {


            ClassicEditor
                .create(document.querySelector('#editor{{$task->id}}'))
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

            flatpickr("input[type=datetime-local]", {
                enableTime: true,
                dateFormat: 'Y-m-d H:i',
                disableMobile: true,
            });

        })
    </script>
@endpush

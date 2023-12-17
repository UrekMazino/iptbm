<div>
    <x-pop-modal class="max-w-md" name="popup-modal-restore-{{$project->id}}">
        <div class="w-full text-center">
            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M16 1v5h-5M2 19v-5h5m10-4a8 8 0 0 1-14.947 3.97M1 10a8 8 0 0 1 14.947-3.97"/>
            </svg>
            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{$project->project_name}}</h3>

            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete
                this project?</h3>

            <button data-modal-hide="popup-modal-restore-{{$project->id}}" wire:click.prevent="RestoreProject" type="button"
                    class="text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                Yes, I'm sure
            </button>
            <button data-modal-hide="popup-modal-restore-{{$project->id}}" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                No, cancel
            </button>
            <div class="text-gray-600 text-xs dark:text-gray-400 mt-4 ">
                Completely deleted on {{$complete}}
            </div>
        </div>
    </x-pop-modal>

    <x-secondary-button data-modal-target="popup-modal-restore-{{$project->id}}"
                        data-modal-toggle="popup-modal-restore-{{$project->id}}">
        <svg class="w-[17px] h-[17px] text-gray-800 dark:text-white" aria-hidden="true"
             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                  stroke-width="2"
                  d="M16 1v5h-5M2 19v-5h5m10-4a8 8 0 0 1-14.947 3.97M1 10a8 8 0 0 1 14.947-3.97"/>
        </svg>
        Restore
    </x-secondary-button>
</div>

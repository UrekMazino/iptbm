<x-abh.abh-layout>
    <x-slot name="stickyNavigation">

        <a href="{{route("abh.staff.profile")}}" class="inline-flex items-center justify-center p-2 px-6 text-base font-medium text-sky-500 rounded-lg bg-gray-50 hover:text-sky-900 hover:bg-gray-100 dark:text-sky-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-sky-300">
            <span class="w-full">ABH Profile</span>
        </a>

    </x-slot>
    <div class=" md:px-4 mt-10">
        <x-header-label>
           ABH Project
        </x-header-label>
        <div class="space-y-4 mt-4">
            <x-card-panel title="Project Details">
                <div  class="space-y-4">
                    <div class="border rounded border-gray-200 dark:border-gray-700 p-4 font-medium text-base">
                        {{$project->project_name}}
                    </div>
                    <livewire:abh.profile.project-detail :project="$project"/>

                </div>

            </x-card-panel>
           <livewire:abh.profile.project-year-detail :project="$project" />

            <x-card>
                <x-pop-modal name="deleteProject" static="true" class="max-w-md">
                    <div class="text-center">
                        <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this project?</p>
                    </div>
                    <div class="flex justify-center items-center space-x-4">
                        <form method="post" action="{{route("abh.staff.profile.project.delete",['project'=>$project])}}">
                            @csrf
                            <button data-modal-toggle="deleteProject" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                No, cancel
                            </button>
                            <button type="submit" wire:click.prevent="delete({{$project->id}})" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                Yes, I'm sure
                            </button>
                        </form>

                    </div>
                </x-pop-modal>

                <x-danger-button data-modal-toggle="deleteProject">
                    Delete Project
                </x-danger-button>
            </x-card>
        </div>
    </div>
</x-abh.abh-layout>

<x-card-panel title="Projects">
    <x-slot:button>
        <x-pop-modal modal-title="Add new Project" name="addProj" class="max-w-2xl" static="true">
            <div class="border rounded border-gray-200 dark:border-gray-700 p-2 bg-gray-200 dark:bg-gray-800">
                <form class="space-y-4">
                    <div>
                        <x-input-label for="projectTitle" value="Project Title"/>
                        <x-text-box rows="3" id="projectTitle" placeholder="Enter text here..."/>
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
</x-card-panel>

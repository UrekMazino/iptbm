<div>
    <a href="{{route("iptbm.admin.iptbm_profiles.profile-projects.view",['project'=>$project->id])}}">
        <x-secondary-button class="text-sky-60 dark:text-sky-600">
            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                <path d="M4.09 7.586A1 1 0 0 1 5 7h13V6a2 2 0 0 0-2-2h-4.557L9.043.8a2.009 2.009 0 0 0-1.6-.8H2a2 2 0 0 0-2 2v14c.001.154.02.308.058.457L4.09 7.586Z"/>
                <path d="M6.05 9 2 17.952c.14.031.281.047.424.048h12.95a.992.992 0 0 0 .909-.594L20 9H6.05Z"/>
            </svg>
        </x-secondary-button>
    </a>

    <x-secondary-button class="text-red-600 dark:text-red-600">
        <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
        </svg>
    </x-secondary-button>
</div>

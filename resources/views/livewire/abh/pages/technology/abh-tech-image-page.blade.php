<div class="w-full">
    <div class="md:p-4 mt-10 md:w-3/4 m-auto aspect-square flex justify-center items-center relative">
        <a href="{{route("abh.staff.technology.view-technology",['technology'=>$technology])}}" class="absolute top-0 p-4 hover:scale-110 duration-300 transition right-0 rounded-full bg-gray-500 dark:bg-gray-950 bg-opacity-60 dark:bg-opacity-60">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </a>
        <img src="{{Storage::url($technology->tech_photo)}}">
    </div>
</div>

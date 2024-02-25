<div>
    <nav
        class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="block md:flex p-3 justify-between items-center">
                <x-link-button :url="$return_path">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                    </svg>
                    Back
                </x-link-button>

            </div>

        </nav>

    </nav>
    <div class=" md:px-4">
        <div class="mt-10">
            @if($file_type==='pdf')
                <iframe src="{{Storage::url($file)}}" class="w-full h-screen"></iframe>

            @endif

            @if($file_type==='png'||$file_type==='jpg')
                <div class="w-full flex justify-center">
                    <img src="{{Storage::url($file)}}" class="max-w-full w-auto h-full">
                </div>
            @endif
            @if($file_type==='local')
                <div class="aspect-video w-full">

                    <video class="w-full" autoplay controls>
                        <source src="{{Storage::url($file)}}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>

                </div>
            @endif
            @if($file_type==='online')
                <div class="aspect-video w-full">

                    <iframe class="w-full m-auto h-full"
                            src="{{$file}}" frameborder="0"
                            allow="accelerometer;pause;  encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>

                </div>
            @endif

        </div>
    </div>
</div>

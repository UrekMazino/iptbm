

<div class="grid grid-cols-1 md:grid-cols-3 p-4  gap-4 relative md:rounded-lg overflow-hidden">

    <img src="{{Storage::url($profile->logo)}}" alt="Background Image"
         class="absolute  top-0 left-0 w-full h-full object-cover filter blur">
    <div class="absolute top-0 left-0 w-full h-full bg-black  opacity-25 rounded-lg"></div>
    <!-- Your content here -->
    <div class="aspect-square z-10">
        <div
            class="w-full  h-full p-6 bg-black overflow-hidden border-t border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            @if($profile->logo)
                <a data-modal-target="authentication-modal" data-modal-toggle="profile" role="button">
                    <img class="hover:scale-110 transition duration-300 max-w-lg rounded-lg object-contain w-full h-full" src="{{Storage::url($profile->logo)}}" alt="image description">
                </a>
            @endif
        </div>
    </div>
    <div class="col-span-2
            bg-gray-500
            text-gray-300
            dark:bg-gray-800
            bg-opacity-25
            dark:bg-opacity-25
            z-10
            ">
        <div class="flex items-center  h-full w-full m-auto">
            <h1 class="text-4xl text-center w-auto m-auto">
                @if($profile->tag_line)
                    {{$profile->tag_line}}
                @else
                    Tag line
                @endif
            </h1>
        </div>
    </div>
</div>

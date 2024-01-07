@props([
    'title'=>null
])

<div {!!  $attributes->merge([
    'class' => 'w-full pb-5 md:pb-10 md:pt-2 bg-white shadow-lg text-sm text-gray-500 dark:text-gray-400 dark:bg-gray-800  md:rounded relative'
]) !!} >
    @if($title)
        <div class="  border-b w-full border-gray-300 dark:border-gray-700 px-2 py-3">
            @if(isset($button))
                <div class="justify-between flex items-center">
                    @if(isset($icon))
                        <div class="gap-2 flex justify-start items-center ms-0 w-fit">
                            {{$icon}}
                            <label class="block font-normal  text-xl text-sky-950 dark:text-sky-200">
                                {{$title}}
                            </label>
                        </div>
                    @else
                        <label class="block font-normal  text-xl text-sky-950 dark:text-sky-200">
                            {{$title}}
                        </label>
                    @endif

                    <div>
                        {{$button}}
                    </div>
                </div>
            @else
                @if(isset($icon))
                    <div class="gap-2 flex justify-start items-center ms-0 w-fit">
                        {{$icon}}
                        <label class="block font-normal  text-xl text-sky-950 dark:text-sky-200">
                            {{$title}}
                        </label>
                    </div>
                @else
                    <label class="block font-normal  text-xl text-sky-950 dark:text-sky-200">
                        {{$title}}
                    </label>
                @endif
            @endif



        </div>
        <div class="p-0 px-2 pt-4 md:p-4 mt-auto pb-6">
            {{$slot}}
        </div>
    @else
        <div class="p-0 px-2 pt-4 md:p-4 mt-auto pb-6">
            {{$slot}}
        </div>
    @endif
        @if(isset($footer))
            <div class="absolute left-0 p-2 bottom-0 w-full">
                {{$footer}}
            </div>
        @endif
</div>

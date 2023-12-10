@props([
    'title'=>null
])

<div {!!  $attributes->merge([
    'class' => 'w-full pb-5 md:pb-10 md:pt-2 bg-white shadow-lg text-sm text-gray-500 dark:text-gray-400 dark:bg-gray-800  md:rounded '
]) !!} >
    @if($title)
        <div class="  border-b w-full border-gray-300 dark:border-gray-700 px-2 py-3">
            @if(isset($button))
                <div class="justify-between flex items-center">
                    <label class="block font-normal  text-xl text-sky-950 dark:text-sky-200">
                        {{$title}}
                    </label>
                    <div>
                        {{$button}}
                    </div>
                </div>
            @else
                <label class="block font-normal  text-xl text-sky-950 dark:text-sky-200">
                    {{$title}}
                </label>
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

</div>

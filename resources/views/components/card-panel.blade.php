@props([
    'title'=>null
])

<div {{$attributes->merge([
    'class' => 'w-full    md:pt-2 bg-white shadow-lg text-sm text-gray-500 dark:text-gray-400 dark:bg-gray-800  md:rounded '
])}}>
    @if($title)
        <div class="  border-b w-full border-gray-300 dark:border-gray-700 px-2 py-3">
            <label class="block font-normal  text-xl text-sky-950 dark:text-sky-200">
                {{$title}}
            </label>
        </div>
        <div class="p-5 mt-auto">
            {{$slot}}
        </div>
    @else
        <div class="p-5  mt-auto">
            {{$slot}}
        </div>
    @endif

</div>

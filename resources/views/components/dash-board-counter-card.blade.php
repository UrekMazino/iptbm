

<div {{$attributes->merge([
    'class' => 'md:rounded-lg relative group overflow-hidden'
])}}>
    <div class="px-2">
        {{$slot}}
    </div>
    <div class="w-full  text-center py-2 bg-gray-700 bg-opacity-40 group-hover:bg-opacity-60 transition duration-300">
        <div class="w-full mx-auto">
            @if(isset($button))
                {{$button}}
            @endif
        </div>
    </div>
</div>

@props([
    'url'
])

<div {{$attributes->merge([
    'class'=>'aspect-square   flex justify-center item-center'
])}}>
    @if(isset($url))
        <div class="m-auto">
            <img src="{{\Illuminate\Support\Facades\Storage::url($url)}}" class="w-full h-auto" alt="profile">
        </div>
    @endif

</div>

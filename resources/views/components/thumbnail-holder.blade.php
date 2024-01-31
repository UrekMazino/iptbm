@props([
    'url'
])

<div {{$attributes->merge([
    'class'=>'  flex justify-center item-center'
])}}>
    @if(isset($url))
        <img src="{{\Illuminate\Support\Facades\Storage::url($url)}}" class="w-auto max-h-full h-auto" alt="profile">
    @endif

</div>

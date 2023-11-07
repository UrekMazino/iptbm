@props([
    'col'=>1,
    'gap'=>0,
])

<div class="grid grid-cols-1 md:grid-cols-{{$col}} gap-{{$gap}}">
    {{$slot}}
</div>

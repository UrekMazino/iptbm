@props([
    'data'=>null
])

<datalist {{$attributes->merge()}}>
    @if($data)
        @foreach($data as $val)
            <option value="{{$val}}"></option>
        @endforeach
    @else
        {{$slot}}
    @endif

</datalist>

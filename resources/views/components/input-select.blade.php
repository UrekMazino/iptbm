@props(['data'=>null,'title'=>null])

<select {{$attributes->merge([
    'class'=>'w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'
])}}>
    @if($data)
        <option value="">
            {{$title}}
        </option>
        @foreach($data as $val)
            <option value="{{$val}}">
                {{$val}}
            </option>
        @endforeach
    @else
        {{$slot}}
    @endif
</select>

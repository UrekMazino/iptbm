@props([
    'disabled' => false,
    'rows'=>5,

    ])
<textarea
    rows="{{$rows}}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'font-normal text-base p-4 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}></textarea>

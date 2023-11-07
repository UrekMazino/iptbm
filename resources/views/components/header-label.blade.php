@props(['value'])

<label {{$attributes->merge([
    'class' => 'block text-3xl px-2 font-medium text-sky-900 dark:text-sky-200'
])}}>
    {{ $value ?? $slot }}
</label>


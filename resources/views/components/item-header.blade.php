@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium flex text-lg text-sky-950 dark:text-sky-200']) }}>
    {{ $value ?? $slot }}
</label>

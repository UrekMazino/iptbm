@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium flex text-base text-gray-500 dark:text-gray-400']) }}>
    {{ $value ?? $slot }}
</label>

@props(['value'])

<p {{ $attributes->merge(['class' => 'text-gray-500 dark:text-gray-400']) }}>
    {{ $value ?? $slot }}
</p>

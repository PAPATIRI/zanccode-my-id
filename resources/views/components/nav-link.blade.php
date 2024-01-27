@props(['active', 'navigate'])

@php
    $classes = ($active ?? false)
                ? 'flex space-x-2 items-center hover:text-yellow-900 text-yellow-500'
                : 'flex space-x-2 items-center hover:text-gray-900 text-gray-500';
@endphp

<a {{$navigate ?? true ? 'wire:navigate' : '' }} {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

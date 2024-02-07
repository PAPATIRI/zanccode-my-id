@props(['active', 'navigate'])

@php
    $classes = ($active ?? false)
                ? 'flex space-x-2 items-center hover:text-indigo-700 text-indigo-500'
                : 'flex space-x-2 items-center hover:text-indigo-500 text-zinc-600';
@endphp

<a {{$navigate ?? true ? 'wire:navigate' : '' }} {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

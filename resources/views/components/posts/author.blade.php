@props(['author', 'size'])

@php
    $imageSize = match ($size ?? null){
        'xs'=>'w-7 h-7',
        'sm'=>'w-7 h-7',
        'md'=>'w-10 h-10',
        'lg'=>'w-13 h-13',
        default => 'w-10 h-10'
    };
    $textSize = match ($size ?? null){
        'xs'=>'text-xs',
        'sm'=>'text-sm',
        'md'=>'text-base',
        'lg'=>'text-lg',
        default => 'text-base'
    };
@endphp

<div class="flex items-center gap-1.5">
    <img src="{{ $author->profile_photo_url }}" alt="avatar" class="{{$imageSize}} rounded-full">
    <span class="mr-1 text-slate-600 {{$textSize}}">{{$author->name}}</span>
</div>
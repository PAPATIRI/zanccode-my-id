@props(['textColor'])
@php
    $textColor = match ($textColor){
        'blue'=>'text-blue-800',
        'blue2'=>'text-blue-600',
        'red'=>'text-red-700',
        'yellow'=>'text-yellow-800',
        'green'=>'text-green-800',
        'cyan'=>'text-cyan-500',
        default=>'text-gray-900'
    };
@endphp

<button {{$attributes}} class="{{$textColor}} bg-slate-100 rounded-md px-3 py-1 font-medium text-base">{{$slot}}</button>
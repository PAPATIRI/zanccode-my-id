@props(['textColor'])
@php
    $textColor = match ($textColor){
        'blue'=>'text-blue-800',
        'blue-light'=>'text-blue-600',
        'red'=>'text-red-800',
        'red-light'=>'text-red-600',
        'yellow'=>'text-yellow-800',
        'yellow-light'=>'text-yellow-600',
        'green'=>'text-green-800',
        'green-light'=>'text-green-600',
        'indigo'=>'text-indigo-800',
        'indigo-light'=>'text-indigo-600',
        'cyan'=>'text-cyan-800',
        'cyan-light'=>'text-cyan-600',
        default=>'text-gray-900'
    };
@endphp

<button {{$attributes}} class="{{$textColor}} bg-slate-100 rounded-full px-3 py-1 font-medium text-base">{{$slot}}</button>
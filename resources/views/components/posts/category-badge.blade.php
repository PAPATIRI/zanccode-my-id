@props(['category'])
<x-badge textColor="{{$category->text_color}}"
         wire:navigate href="{{route('posts.index', ['category'=>$category->title])}}"
         :bgColor="$category->bg_color">{{$category->title}}</x-badge>

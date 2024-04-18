@props(['text', 'href', 'primary', 'type'])
<a href="{{$href}}"
   class="{{$type === 'primary'?'bg-primary': 'bg-danger'}} rounded-full min-w-[75px] py-2 text-center text-sm font-medium text-white hover:bg-opacity-90">{{$text}}</a>

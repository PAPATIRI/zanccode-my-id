@props(['post'])
<div {{$attributes}}>
    <a wire:navigate href="{{route('posts.show', $post->slug)}}">
        <div class="w-full overflow-hidden  h-[150px] lg:h-[200px] rounded-xl bg-slate-400 flex items-center justify-center">
            <img alt="thumbnail" class="w-full h-full object-cover" src="{{$post->getThumbnailImage()}}">
        </div>
    </a>
    <div class="mt-3">
        <div class="flex items-center justify-between mb-2 font-sans">
            <div class="flex-items-center gap-2">
                @if($category = $post->categories->first())
                    <x-posts.category-badge :category="$category"/>
                @endif
            </div>
            <p class="text-slate-500 text-sm">{{$post->published_at->diffForHumans()}}</p>
        </div>
        <a wire:navigate href="{{route('posts.show', $post->slug)}}"
           class="text-lg lg:text-xl font-serif font-bold text-slate-900">{{$post->title}}</a>
    </div>
</div>
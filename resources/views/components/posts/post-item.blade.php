@props(['post'])
<article {{ $attributes->merge(['class' => '[&:not(:last-child)]:border-gray-100 pb-10']) }}>
    <div class="article-body grid grid-cols-12 gap-3 mt-5 items-start">
        <div class="hidden md:flex article-thumbnail col-span-4 items-center">
            <a wire:navigate href="{{route('posts.show', $post->slug)}}"
               class="w-full h-[150px] lg:h-[200px] overflow-hidden bg-gray-400 rounded-xl flex items-center">
                <img src="{{$post->getThumbnailImage()}}" class="w-full h-[100%] object-cover rounded-xl"
                     alt="thumbnailpost">
            </a>
        </div>
        <div class="col-span-12 md:col-span-8">
            <div class="article-thumbnail flex md:hidden items-center">
                <a wire:navigate href="{{route('posts.show', $post->slug)}}"
                   class="w-full h-[150px] lg:h-[200px] overflow-hidden bg-gray-400 rounded-xl flex items-center mb-2">
                    <img src="{{$post->getThumbnailImage()}}" class="w-full h-[100%] object-cover rounded-xl"
                         alt="thumbnailpost">
                </a>
            </div>
            <div class="article-meta flex py-1 text-sm items-center justify-between">
                <x-posts.author :author="$post->author" size="sm"/>
                <span class="text-gray-500 text-sm font-sans">{{$post->published_at->diffForHumans()}}</span>
            </div>
            <h2 class="text-lg lg:text-xl font-serif font-bold capitalize text-gray-800">
                <a wire:navigate href="{{route('posts.show', $post->slug)}}">{{$post->title}}</a>
            </h2>
            <p class="mt-2 text-base text-gray-700 font-sans">{{$post->getExcerpt()}}</p>
            <div class="article-actions-bar mt-6 flex items-center justify-between">
                <div class="flex gap-2">
                    @foreach($post->categories as $category)
                        <x-posts.category-badge :category="$category"/>
                    @endforeach
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-500 text-sm md:text-base">{{$post->getReadingTime()}} min read</span>
                    </div>
                </div>
                <div>
                    <livewire:like-button :key="'likebutton-'.$post->id" :$post/>
                </div>
            </div>
        </div>

    </div>
</article>
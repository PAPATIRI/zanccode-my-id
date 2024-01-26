@props(['post'])
<article class="[&:not(:last-child)]:border-gray-100 pb-10">
    <div class="article-body grid grid-cols-12 gap-3 mt-5 items-start">
        <div class="article-thumbnail col-span-4 flex items-center">
            <a href="#" class="w-full h-[150px] lg:h-[200px] overflow-hidden bg-gray-400 rounded-xl flex items-center">
                <img src="{{$post->getThumbnailImage()}}" class="w-full h-[100%] object-cover rounded-xl"
                     alt="thumbnailpost">
            </a>
        </div>
        <div class="col-span-8">
            <div class="article-meta flex py-1 text-sm items-center">
                <img src="{{ $post->author->profile_photo_url }}" alt="avatar" class="w-7 h-7 rounded-full mr-3">
                <span class="mr-1 text-base">{{$post->author->name}}</span>
                <span class="text-gray-500 text-base">{{$post->published_at->diffForHumans()}}</span>
            </div>
            <h2 class="text-xl font-bold text-gray-800">
                <a href="#">{{$post->title}}</a>
            </h2>
            <p class="mt-2 text-base text-gray-700 font-light">{{$post->getExcerpt()}}</p>
            <div class="article-actions-bar mt-6 flex items-center justify-between">
                <div class="flex gap-2">
                    @foreach($post->categories as $category)
                        <x-badge textColor="{{$category->text_color}}"
                                 wire:navigate href="{{route('posts.index', ['category'=>$category->title])}}"
                                 :bgColor="$category->bg_color">{{$category->title}}</x-badge>
                    @endforeach
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-500 text-base">{{$post->getReadingTime()}} min read</span>
                    </div>
                </div>
                <div>
                    {{-- :$post sama dengan :post="$post" --}}
                    <livewire:like-button :key="$post->id" :$post/>
                </div>
            </div>
        </div>

    </div>
</article>
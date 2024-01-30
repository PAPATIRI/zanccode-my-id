@push('css')
    <link rel="stylesheet" href="{{asset("css/custom-style.css")}}">
@endpush
<x-app-layout :title="$post->title">
    <article class="col-span-4 md:col-span-3 mt-10 mx-auto py-5 w-full max-w-2xl">
        <div class="w-full mb-4 h-[200px] md:h-[300px] overflow-hidden rounded-xl flex items-center">
            <img class="object-cover" src="{{$post->getThumbnailImage()}}" alt="">
        </div>
        <h1 class="text-3xl capitalize font-bold text-left text-gray-800">{{$post->title}}</h1>
        <div class="mt-2 flex justify-between items-center">
            <div class="flex py-5 text-base items-center">
                <x-posts.author :author="$post->author"/>
                <span class="text-gray-500 text-base"> | {{$post->getReadingtime()}} min read</span>
            </div>
            <div class="flex items-center">
                <span class="text-gray-500 mr-2">{{$post->published_at->diffForHumans()}}</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3"
                     stroke="currentColor" class="w-5 h-5 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
        <div class="article-content py-3 text-gray-800 text-lg">
            {!! $post->body !!}
        </div>
        <div class="flex items-center justify-between mt-10 space-x-4">
            <div class="flex items-center gap-4">
            @foreach($post->categories as $category)
                <x-posts.category-badge :category="$category"/>
            @endforeach
            </div>
            <livewire:like-button :key="'likebutton-'.$post->id" :$post/>
        </div>
        <livewire:post-comments :key="'comments-'.$post->id" :$post/>
    </article>
</x-app-layout>

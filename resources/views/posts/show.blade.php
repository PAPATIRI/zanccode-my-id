@push('css')
    <link rel="stylesheet" href="{{asset("css/custom-style.css")}}">
@endpush
<x-app-layout>
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
        <div class="article-actions-bar my-6 flex text-sm items-center justify-between border-t border-b border-gray-100 py-4 px-2">
            <livewire:like-button :key="$post->id" :$post/>
            <div class="flex items-center">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3"
                         stroke="currentColor" class="w-6 h-6 text-gray-500 hover:text-gray-800">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="article-content py-3 text-gray-800 text-lg">
            {!! $post->body !!}
        </div>
        <div class="flex items-center mt-10 space-x-4">
            @foreach($post->categories as $category)
                <x-posts.category-badge :category="$category"/>
            @endforeach
        </div>
        <div class="comment-box mt-10 border-t border-gray-200 py-10">
            <h2 class="text-2xl font-semibold text-gray-900 mb-5">Komentar</h2>
            <textarea class="w-full rounded-lg p-4 bg-gray-50 focus:outline-none text-sm text-gray-700 border-gray-200 placeholder:text-gray-400" cols="30" row="7"></textarea>
            <button class="mt-3 inline-flex items-center justify-center h-10 px-4 font-medium tracking-wider text-white transition duration-200 rounded-lg bg-gray-900 hover:bg-gray-800 focus:shadow-outline focus:outline-none">Kirim Komentar</button>
        </div>
{{--        <a href="" class="text-yellow-500 underline py-1">Login to Post Comment</a>--}}
        <div class="user-comments px-3 py-2 mt-5">
            <div class="comment border-gray-100 py-5 [&:not(:last-child)]:border-b">
                <div class="user-meta flex gap-2 mb-4 text-sm items-center">
{{--                    <x-posts.author :author="$post->author" size="sm" />--}}
                    <img src="" alt="" class="w-7 h-7 rounded-full mr-3">
                    <span class="mr-1">syarif th</span>
                    <span class="text-gray-500">.13 days ago</span>
                </div>
                <div class="text-justify text-gray-700 text-sm">comment to a content lol</div>
            </div>
{{--            <div class="text-gray-500 text-center">--}}
{{--                <span>no comment posted</span>--}}
{{--            </div>--}}
        </div>
    </article>
</x-app-layout>

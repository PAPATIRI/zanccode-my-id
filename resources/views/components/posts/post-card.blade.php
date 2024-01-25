@props(['post'])
<div {{$attributes}}>
    <a href="#">
        <div class="w-full overflow-hidden  h-[150px] lg:h-[200px] rounded-xl bg-gray-400 flex items-center justify-center">
            <img alt="thumbnail" class="w-full h-full object-cover" src="{{$post->getThumbnailImage()}}">
        </div>
    </a>
    <div class="mt-3">
        <div class="flex items-center gap-2 mb-2">
            @foreach($post->categories as $category)
                <x-badge wire:navigate href="{{route('posts.index', ['category'=>$category->slug])}}"
                         textColor="{{$category->text_color}}"
                         :bgColor="$category->bg_color">{{$category->title}}</x-badge>
            @endforeach
            <p class="text-gray-500 text-sm">{{$post->published_at}}</p>
        </div>
        <a href="#" class="text-xl font-bold text-gray-900">{{$post->title}}</a>
    </div>
</div>
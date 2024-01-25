<div>
    <h3 class="text-lg font-semibold text-gray-900 mb-3">Recommended Topics</h3>
    <div class="topics flex flex-wrap justify-content gap-2">
        <button wire:navigate href="{{route('posts.index')}}" class="rounded-md bg-gray-100 px-3 py-1 font-medium text-base">all kategory</button>
        @foreach($categories as $category)
            <x-badge wire:navigate href="{{route('posts.index', ['category'=>$category->slug])}}" :textColor="$category->text_color" :bgColor="$category->bg_color">{{$category->title}}</x-badge>
        @endforeach
    </div>
</div>

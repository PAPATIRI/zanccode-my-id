<div>
    <div id="posts" class="px-3 lg:px-7 py-6">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-4">
                @if($search || $this->activeCategory)
                    <button wire:click="clearFilters()"
                            class="text-red-600 font-bold bg-gray-100 px-2.5 py-0.5 rounded">x
                    </button>
                @endif
                @if($this->activeCategory)
                    <div>
                        <x-badge wire:navigate
                                 href="{{route('posts.index', ['category'=>$this->activeCategory->slug])}}"
                                 :textColor="$this->activeCategory->text_color"
                                 :bgColor="$this->activeCategory->bg_color">{{$this->activeCategory->title}}</x-badge>
                    </div>
                @endif
                @if($search)
                        <p class="text-gray-700">{{__('blog.keyword')}}: <span
                                    class="font-bold text-gray-800">{{$search}}</span>
                    </p>
                @endif
            </div>
            <div id="filter-selector" class="flex items-center space-x-4 font-normal">
                <div class="flex items-center gap-2 text-base">
                    <x-checkbox wire:model.live="popular"/>
                    <x-label>{{__('blog.popular')}}</x-label>
                </div>
                <button wire:click="setSort('desc')"
                        class="{{$sort === 'desc' ? 'text-gray-900 border-b border-gray-700': 'text-gray-500'}} py-4">{{__('blog.latest')}}</button>
                <button wire:click="setSort('asc')"
                        class="{{$sort === 'asc' ? 'text-gray-900 border-b border-gray-700': 'text-gray-500'}} py-4">{{__('blog.oldest')}}</button>
            </div>
        </div>
        <div class="py-4">
            @foreach($this->posts as $post)
                <x-posts.post-item wire:key="post-{{$post->id}}" :post="$post"/>
            @endforeach
        </div>
        <div class="my-3">
            {{$this->posts->onEachSide(0)->links()}}
        </div>
    </div>
</div>

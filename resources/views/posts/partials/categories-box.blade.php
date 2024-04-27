<div>
    <h3 class="text-lg font-serif text-slate-700 mb-3">{{__('blog.recommended_topics')}}</h3>
    <div class="topics flex flex-wrap justify-content gap-2">
        @foreach($categories as $category)
            <x-posts.category-badge :category="$category"/>
        @endforeach
    </div>
</div>

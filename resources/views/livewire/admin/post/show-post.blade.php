<div>
    <div class="flex items-center font-sans gap-2 mb-4">
        <a wire:navigate href="{{route('admin.dashboard')}}"
           class="{{request()->routeIs('admin.dashboard') ? 'text-primary' : 'text-slate-700 dark:text-slate-300'}}">
            Dashboard
        </a>
        <p class="text-slate-700 dark:text-slate-300">
            <x-radix-slash class="w-4 h-4"/>
        </p>
        <a wire:navigate href="{{route('admin.posts')}}"
           class="{{request()->routeIs('admin.posts') ? 'text-primary' : 'text-slate-700 dark:text-slate-300'}}">Artikel</a>
        <p class="text-slate-700 dark:text-slate-300">
            <x-radix-slash class="w-4 h-4"/>
        </p>
        <a wire:navigate href="{{route('admin.posts.show', $post->id)}}"
           class="{{request()->routeIs('admin.posts.show') ? 'text-primary' : 'text-slate-700 dark:text-slate-300'}}">{{$post->slug}}</a>
    </div>
    <div class="bg-white dark:bg-boxdark p-5 rounded font-sans">
        <p class="text text-slate-800 dark:text-slate-200 lg md:text-2xl capitalize font-bold font-serif">Detail Artikel</p>
        <div class="flex flex-col md:flex-row items-start gap-4 mt-3 md:mt-6">
            <div class="h-[250px] rounded-lg w-full md:w-[50%] overflow-hidden">
                <img src="{{$post->getThumbnailImage()}}" class="w-full h-full object-cover" alt="">
            </div>
            <div>
                <div class="mb-4">
                    <p class="text-sm font-bold mb-1">Judul Artikel</p>
                    <p class="text-lg text-slate-700 dark:text-slate-200">{{$post->title}}</p>
                </div>
                <div class="mb-4">
                    <p class="text-sm font-bold mb-1">Status Artikel</p>
                    <p class="text-lg text-slate-700 dark:text-slate-200">{{$post->status}}</p>
                </div>
                <div class="mb-4">
                    <p class="text-sm font-bold mb-1">Kategori Artikel</p>
                    <div class="flex items-center gap-3">
                        @foreach($post->categories as $category)
                            <p class="text-lg text-slate-700 dark:text-slate-200">{{$category->title}}</p>
                        @endforeach
                    </div>
                </div>
                <div class="mb-4">
                    <p class="text-sm font-bold mb-1">Tanggal Dibuat</p>
                    <p class="text-lg text-slate-700 dark:text-slate-200">{{$post->created_at->format('l, d M Y')}}
                        ({{$post->created_at->diffForHumans()}})</p>
                </div>
            </div>
        </div>
        <div class="my-8">
            <div class="w-full md:max-w-[720px]">
                <p class="text-sm font-bold mb-1">Konten Artikel</p>
                <p class="text-base md:text-lg">{!!$post->body!!}</p>
            </div>
        </div>
    </div>
</div>
</div>

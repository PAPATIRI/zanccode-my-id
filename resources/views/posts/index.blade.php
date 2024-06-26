<x-app-layout title="Blog">
    <div class="w-full grid grid-cols-6">
        <div class="md:col-span-4 col-span-6">
            <livewire:post-list/>
        </div>
        <div id="side-bar"
             class="col-span-6 md:col-span-2 md:px-6 space-y-10 py-6 pt-10 h-full md:h-screen sticky top-0">
            @include('posts.partials.search-box')
            @include('posts.partials.categories-box')
        </div>
    </div>
</x-app-layout>
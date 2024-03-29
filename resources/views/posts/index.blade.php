<x-app-layout title="Blog">
    <div class="w-full grid grid-cols-6 gap-10">
        <div class="lg:col-span-4 col-span-6">
            <livewire:post-list/>
        </div>
        <div id="side-bar"
             class="border-t border-t-gray-100 md:border-t-none col-span-6 lg:col-span-2 px-3 md:px-6 space-y-10 py-6 pt-10 md:border-1 border-gray-100 h-screen sticky top-0">
            @include('posts.partials.search-box')
            @include('posts.partials.categories-box')
        </div>
    </div>
</x-app-layout>
<x-admin-layout::app>
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
    </div>
    <livewire:admin.post.post-list/>
</x-admin-layout::app>
<x-admin-layout::app>
    <div class="grid grid-cols-8 gap-2">
        <div class="p-3 bg-white dark:bg-boxdark rounded col-span-4 md:col-span-2">
            <p class="text-sm md:text-base font-serif text-slate-700 dark:text-slate-200 capitalize mb-2 md:mb-4">jumlah post</p>
            <p class="text-xl md:text-3xl font-bold font-sans text-indigo-700 dark:text-indigo-500">{{$posts->count()}}</p>
        </div>
        <div class="p-3 bg-white dark:bg-boxdark rounded col-span-4 md:col-span-2">
            <p class="text-sm md:text-base font-serif text-slate-700 dark:text-slate-200 capitalize mb-2 md:mb-4">jumlah category</p>
            <p class="text-xl md:text-3xl font-bold font-sans text-indigo-700 dark:text-indigo-500">{{$categories->count()}}</p>
        </div>
        <div class="p-3 bg-white dark:bg-boxdark rounded col-span-4 md:col-span-2">
            <p class="text-sm md:text-base font-serif text-slate-700 dark:text-slate-300 capitalize mb-2 md:mb-4">jumlah penulis</p>
            <p class="text-xl md:text-3xl font-bold font-sans text-indigo-700 dark:text-indigo-500">{{$users->count()}}</p>
        </div>
        <div class="p-3 bg-white dark:bg-boxdark rounded col-span-4 md:col-span-2">
            <p class="text-sm md:text-base font-serif text-slate-700 dark:text-slate-300 capitalize mb-2 md:mb-4">jumlah komentar</p>
            <p class="text-xl md:text-3xl font-bold font-sans text-indigo-700 dark:text-indigo-500">{{$comments->count()}}</p>
        </div>
    </div>
</x-admin-layout::app>

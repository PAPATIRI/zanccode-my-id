<div>
    <div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <div class="flex items-center justify-between mb-5">
            <h4 class="text-xl font-bold text-black dark:text-white">Artikel</h4>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <x-bx-search class="h-7 w-7"/>
                </div>
                <input wire:model.live.debounce.500ms="search" type="text" placeholder="Cari Judul"
                       class="w-[200px] md:w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-15 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"/>
            </div>
        </div>

        <div class="flex flex-col">
            <div class="grid grid-cols-3 rounded-sm bg-gray-2 dark:bg-meta-4 sm:grid-cols-5">
                <div class="p-2.5 xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">Judul</h5>
                </div>
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">Category</h5>
                </div>
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">Status</h5>
                </div>
                <div class="hidden p-2.5 text-center sm:block xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">Waktu Publikasi</h5>
                </div>
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">Manage Artikel</h5>
                </div>
            </div>

            <div class="grid grid-cols-3 border-b border-stroke dark:border-strokedark sm:grid-cols-5">
                @foreach($posts as $post)
                        <div class="flex items-center p-2.5 xl:p-5">
                            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                                <div class="w-15 h-15 flex-shrink-0 overflow-hidden">
                                    <img src="{{$post->getThumbnailImage()}}" class="w-full h-full object-cover"
                                         alt="Product"/>
                                </div>
                                <p class="text-base font-sans font-medium text-black dark:text-white">{{$post->title}}</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-center p-2.5 xl:p-5">
                            @foreach($post->categories as $category)
                                <x-posts.category-badge :category="$category"/>
                            @endforeach
                        </div>
                        <div class="hidden sm:flex items-center justify-center p-2.5 xl:p-5">
                            <p class="text-base font-sans items-center justify-center text-black dark:text-white">{{$post->status}}</p>
                        </div>

                        <div class="hidden sm:flex items-center justify-center p-2.5 xl:p-5">
                            <p class="font-medium font-sans items-center justify-center text-black dark:text-white">{{$post->created_at->diffForHumans()}}</p>
                        </div>

                        <div class="flex flex-col md:flex-row items-center justify-center p-2.5 xl:p-5 gap-2">
                            <x-admin.button text="Edit" href="#" type="primary"/>
                            <x-admin.button text="Hapus" href="#" type="danger"/>
                        </div>
                @endforeach
            </div>
        </div>
        <div class="py-4 px-3 flex flex-col w-full">
            <div class="flex items-center gap-3 self-center md:self-start">
                Per Page
                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-white dark:bg-form-input">
                    <select wire:model.live="perPage"
                            class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input"
                            :class="isOptionSelected && 'text-black dark:text-white'" @change="isOptionSelected = true">
                        <option value="5" class="text-body">5</option>
                        <option value="10" class="text-body">10</option>
                        <option value="20" class="text-body">20</option>
                        <option value="50" class="text-body">50</option>
                    </select>
                </div>
            </div>
            <div>
                {{$posts->onEachSide(0)->links('vendor/livewire/tailwind')}}
            </div>
        </div>
    </div>
</div>

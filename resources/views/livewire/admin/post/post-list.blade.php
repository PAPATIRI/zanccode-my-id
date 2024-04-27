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
            <a wire:navigate href="{{route('admin.posts.create')}}" class="bg-primary rounded-lg px-4 py-3 md:px-8 text-white font-sans flex items-center gap-1"><x-bx-plus class="w-6 h-6"/><span class="hidden md:block">Tulis Artikel</span></a>
        </div>

        <div class="flex flex-col">
            <div class="grid grid-cols-3 rounded-sm bg-gray-2 dark:bg-meta-4 sm:grid-cols-5">
                <div wire:click="setSortBy('title')" class="p-2.5 xl:p-5 flex items-center justify-center">
                    <x-admin.column-table-title title="Judul" data="title" sortBy="{{$sortBy}}" sortDir="{{$sortDir}}"/>
                </div>
                <div wire:click="setSortBy('status')" class="p-2.5 xl:p-5 hidden sm:flex items-center justify-center">
                    <x-admin.column-table-title title="Status" data="status" sortBy="{{$sortBy}}"
                                                sortDir="{{$sortDir}}"/>
                </div>
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">Kategori</h5>
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

                    <div class="hidden sm:flex items-center justify-center p-2.5 xl:p-5">
                        <p class="text-base font-sans items-center justify-center text-black dark:text-white">{{$post->status}}</p>
                    </div>

                    <div class="flex flex-col md:flex-row items-center gap-2 justify-center p-2.5 xl:p-5">
                        @foreach($post->categories as $category)
                            <x-posts.category-badge :category="$category"/>
                        @endforeach
                    </div>

                    <div class="hidden sm:flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium font-sans items-center justify-center text-black dark:text-white">{{$post->created_at->diffForHumans()}}</p>
                    </div>

                    <div wire:key="{{$post->id}}"
                         class="flex flex-col lg:flex-row items-center justify-center p-2.5 xl:p-5 gap-2">
                        <a href="{{route('admin.posts.edit', $post->id)}}" wire:key="{{$post->id}}" wire:navigate class="bg-orange-500 rounded-full p-2 text-white hover:bg-opacity-90">
                            <x-bx-pencil class="w-5 h-5"/>
                        </a>
                        <button wire:click="openModal({{$post}})" wire:key="post-{{$post->id}}"
                                type="button"
                                class="bg-danger rounded-full p-2 text-white hover:bg-opacity-90">
                            <x-radix-trash class="w-5 h-5"/>
                        </button>
                        <a wire:navigate href="{{route('admin.posts.show', $post->id)}}" class="bg-green-700 rounded-full p-2 text-white hover:bg-opacity-90">
                            <x-radix-eye-open class="w-5 h-5"/>
                        </a>
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
    {{--MODAL--}}
    @if($selectedPost)
        <div x-data="{showModal: @entangle('showModal')}" x-show="showModal" class="fixed z-99999 inset-0">
            <div x-on:click="showModal=false" class="fixed z-99999 inset-0 bg-slate-500 opacity-50"></div>
            <div class="bg-white dark:bg-boxdark z-99999 rounded-lg text-black dark:text-white m-auto fixed inset-0 w-[90%] md:max-w-2xl h-fit p-4 overflow-y-auto">
                <div class="flex items-center justify-between">
                    <p class="text-lg capitalize font-medium">Konfirmasi</p>
                    <x-bx-plus x-on:click="showModal=false" class="w-6 h-6 rotate-45 cursor-pointer text-red-500"/>
                </div>
                <div class="my-5">
                    <p class="text-2xl font-medium font-serif text-center mb-3 text-warning">Yakin?</p>
                    <p class="text-lg font-medium font-sans text-center">ingin menghapus artikel <span class="text-primary">{{$selectedPost->title}} </span>?</p>
                    <div class="flex items-center gap-3 mt-10 justify-center">
                        <button wire:click="delete({{$selectedPost->id}})" class="bg-danger py-2 px-8 rounded-lg text-white">Hapus
                        </button>
                        <button x-on:click="showModal=false" class="bg-slate-500 py-2 px-8 rounded-lg text-white">Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{--MODAL--}}
</div>

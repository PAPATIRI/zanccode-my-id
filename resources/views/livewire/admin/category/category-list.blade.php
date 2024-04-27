<div>
    <div class="flex items-center font-sans gap-2 mb-4">
        <a wire:navigate href="{{route('admin.dashboard')}}"
           class="{{request()->routeIs('admin.dashboard') ? 'text-primary' : 'text-slate-700 dark:text-slate-300'}}">
            Dashboard
        </a>
        <p class="text-slate-700 dark:text-slate-300">
            <x-radix-slash class="w-4 h-4"/>
        </p>
        <p class="text-primary dark:text-slate-300'}}">Kategori</p>
    </div>
    <div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <div class="flex items-center justify-between mb-5">
            <h4 class="hidden sm:block text-xl font-bold text-black dark:text-white">Kategori</h4>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <x-bx-search class="h-7 w-7"/>
                </div>
                <input wire:model.live.debounce.500ms="search" type="text" placeholder="Cari Judul"
                       class="w-[200px] md:w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-15 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"/>
            </div>
            <button wire:click="createCategory"
                    class="bg-primary rounded-lg px-4 py-3 md:px-8 text-white font-sans flex items-center gap-1">
                <x-bx-plus class="w-6 h-6"/>
                <span class="hidden md:block">Tambah Kategori</span></button>
        </div>

        <div class="flex flex-col">
            <div class="grid grid-cols-3 rounded-sm bg-gray-2 dark:bg-meta-4 sm:grid-cols-4">
                <div class="p-2.5 xl:p-5 text-center">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">NAMA KATEGORI</h5>
                </div>
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">TEXT COLOR</h5>
                </div>
                <div class="p-2.5 text-center xl:p-5 hidden sm:block">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">Waktu Publikasi</h5>
                </div>
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">MANAGE KATEGORI</h5>
                </div>
            </div>

            <div class="grid grid-cols-3 border-b border-stroke dark:border-strokedark sm:grid-cols-4">
                @foreach($categories as $category)
                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="text-base font-sans items-center justify-center text-black dark:text-white">{{$category->title}}</p>
                    </div>
                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="text-base font-sans items-center justify-center text-black dark:text-white">{{$category->text_color}}</p>
                    </div>
                    <div class="hidden sm:flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium font-sans items-center justify-center text-black dark:text-white">{{$category->created_at->format('d F Y')}}</p>
                    </div>

                    <div wire:key="{{$category->id}}"
                         class="flex flex-col lg:flex-row items-center justify-center p-2.5 xl:p-5 gap-2">
                        <button wire:click="editCategory({{$category}})" type="button"
                                wire:key="category-{{$category->id}}"
                                class="bg-orange-500 rounded-full p-2 text-white hover:bg-opacity-90">
                            <x-bx-pencil class="w-5 h-5"/>
                        </button>
                        <button wire:click="deleteCategory({{$category}})" wire:key="category-{{$category->id}}"
                                type="button"
                                class="bg-danger rounded-full p-2 text-white hover:bg-opacity-90">
                            <x-radix-trash class="w-5 h-5"/>
                        </button>
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
            <div class="my-4">
                {{$categories->onEachSide(0)->links('vendor/livewire/tailwind')}}
            </div>
        </div>
    </div>
    {{--MODAL--}}
    <div x-cloak wire:ignore x-data="{showModal: @entangle('showModal'), modalType : @entangle('modalType')}"
         x-show="showModal">
        <div x-on:click.away="showModal=false" class="fixed z-99999 inset-0 overflow-y-auto"
             aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 sm:block sm:p-0">
                {{--Modal Create--}}
                <div x-show="modalType === 'create'" class="fixed z-99999 inset-0 overflow-y-auto"
                     aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div x-on:click="showModal=false" class="fixed z-99999 inset-0 bg-slate-500 opacity-50"></div>
                    <div class="bg-white dark:bg-boxdark z-99999 rounded-lg text-black dark:text-white m-auto fixed inset-0 w-[90%] md:max-w-2xl h-fit p-4 overflow-y-auto">
                        <div class="flex items-center justify-between">
                            <p class="text-lg md:text-2xl font-serif capitalize font-bold">Menambah Kategori</p>
                            <x-bx-plus x-on:click="showModal=false"
                                       class="w-6 h-6 rotate-45 cursor-pointer text-red-500"/>
                        </div>
                        <div class="my-4">
                            <form action="">
                                <div class="mb-10 flex flex-col lg:flex-row gap-4 items-center">
                                    <div class="w-full">
                                        <label for="title"
                                               class="text-left mb-3 block text-sm font-medium text-black dark:text-white">Nama
                                            Kategori</label>
                                        <input id="title" wire:model="title" type="text" placeholder="nama kategori..."
                                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"/>
                                        @error('title')
                                        <span class="text-red-500 text-left text-xs md:text-sm mt-3 block ">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-10 flex flex-col lg:flex-row gap-4 items-center">
                                    <div class="w-full">
                                        <label for="text-color"
                                               class="text-left mb-3 block text-sm font-medium text-black dark:text-white">Nama
                                            Warna Teks</label>
                                        <div x-data="{ isOptionSelected: false }"
                                             class="relative z-20 bg-white dark:bg-form-input">
                                            <select id="text-color" wire:model="text_color"
                                                    class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input"
                                                    :class="isOptionSelected && 'text-black dark:text-white'"
                                                    @change="isOptionSelected = true">
                                                <option class="text-body" selected>Pilih Warna Teks</option>
                                                @foreach($textColors as $color)
                                                    <option value="{{$color}}" class="text-body">{{$color}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('text_color')
                                        <span class="text-red-500 text-left text-xs md:text-sm mt-3 block ">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button wire:click.prevent="create"
                                        class="bg-primary py-4 px-8 rounded-lg text-white w-full" type="submit">Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div x-show="modalType === 'edit'" class="fixed z-99999 inset-0 overflow-y-auto"
                     aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div x-on:click="showModal=false" class="fixed z-99999 inset-0 bg-slate-500 opacity-50"></div>
                    <div class="bg-white dark:bg-boxdark z-99999 rounded-lg text-black dark:text-white m-auto fixed inset-0 w-[90%] md:max-w-2xl h-fit p-4 overflow-y-auto">
                        <div class="flex items-center justify-between">
                            <p class="text-lg md:text-2xl font-serif capitalize font-medium">Edit Kategori</p>
                            <x-bx-plus x-on:click="showModal=false"
                                       class="w-6 h-6 rotate-45 cursor-pointer text-red-500"/>
                        </div>
                        <div class="my-4">
                            <form action="" wire:submit.prevent="update">
                                <div class="mb-10 flex flex-col lg:flex-row gap-4 items-center">
                                    <div class="w-full">
                                        <label for="title"
                                               class="text-left mb-3 block text-sm font-medium text-black dark:text-white">Nama
                                            Kategori</label>
                                        <input id="title" wire:model="title" type="text" placeholder="nama kategori..."
                                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"/>
                                        @error('title')
                                        <span class="text-red-500 text-left text-xs md:text-sm mt-3 block ">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-10 flex flex-col lg:flex-row gap-4 items-center">
                                    <div class="w-full">
                                        <label for="text-color"
                                               class="text-left mb-3 block text-sm font-medium text-black dark:text-white">Nama
                                            Warna Teks</label>
                                        <div x-data="{ isOptionSelected: false }"
                                             class="relative z-20 bg-white dark:bg-form-input">
                                            <select id="text-color" wire:model="text_color"
                                                    class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input"
                                                    :class="isOptionSelected && 'text-black dark:text-white'"
                                                    @change="isOptionSelected = true">
                                                <option class="text-body" selected>Pilih Warna Teks</option>
                                                @foreach($textColors as $color)
                                                    <option value="{{$color}}" class="text-body">{{$color}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('text_color')
                                        <span class="text-red-500 text-left text-xs md:text-sm mt-3 block ">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button class="bg-primary py-4 px-8 rounded-lg text-white w-full" type="submit">Simpan
                                    Perubahan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div x-show="modalType === 'delete'"
                     class="fixed z-99999 inset-0 overflow-y-auto"
                     aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div x-on:click="showModal=false" class="fixed z-99999 inset-0 bg-slate-500 opacity-50"></div>
                    <div class="bg-white dark:bg-boxdark z-99999 rounded-lg text-black dark:text-white m-auto fixed inset-0 w-[90%] md:max-w-2xl h-fit p-4 overflow-y-auto">
                        <div class="flex items-center justify-between">
                            <p class="text-lg capitalize font-medium">Hapus Kategori</p>
                            <x-bx-plus x-on:click="showModal=false"
                                       class="w-6 h-6 rotate-45 cursor-pointer text-red-500"/>
                        </div>
                        <div class="my-5">
                            <p class="text-2xl font-medium font-serif text-center mb-3 text-warning">Yakin?</p>
                            <p class="text-lg font-medium font-sans text-center">ingin menghapus kategori ini?</p>
                            <div class="flex items-center gap-3 mt-10 justify-center">
                                <button wire:click="delete()"
                                        class="bg-danger py-2 px-8 rounded-lg text-white">Hapus
                                </button>
                                <button x-on:click="showModal=false"
                                        class="bg-slate-500 py-2 px-8 rounded-lg text-white">Batal
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--MODAL--}}
</div>
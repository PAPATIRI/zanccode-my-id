<div class="pb-10">
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
        <p class="text-primary">Edit Artikel</p>
    </div>
    <div class="bg-white dark:bg-boxdark rounded p-5">
        <p class="text text-slate-800 dark:text-slate-200 lg md:text-2xl capitalize font-bold font-serif">create
            post</p>
        <div class="my-3 md:my-6">
            <form action="" wire:submit.prevent="updatePost">
                <div class="mb-10 flex flex-col lg:flex-row gap-4 items-center">
                    <div class="w-full">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">Judul Artikel</label>
                        <input wire:model="title" type="text" placeholder="judul artikel..."
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"/>
                        @error('title')
                        <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-10" wire:ignore>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">Konten Artikel</label>
                    <textarea wire:model="body" name="desc" id="body" cols="20"
                              rows="10"
                              placeholder="konten artikel"
                              class="form-control"></textarea>
                    @error('body')
                    <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
                    @enderror
                </div>
                <div class="flex flex-col lg:flex-row items-center w-full gap-4">
                    <div class="mb-10 w-full" wire:ignore>
                        <label for="select-category" class="mb-3 block text-sm font-medium text-black dark:text-white">Kategori
                            Artikel</label>
                        <div class="flex items-center gap-3 self-center md:self-start w-full">
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 w-full">
                                <select wire:model="selectedCategories" id="select-category" multiple="multiple"
                                        class="w-full"
                                        @change="isOptionSelected = true">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                                class="text-body select-catetory" {{ in_array($category->id, $selectedCategories) ? 'selected' : '' }} >{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @error('category')
                        <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-10 w-full">
                        <label for="thumbnail" class="mb-3 block text-sm font-medium text-black dark:text-white">Thumbnail
                            Artikel</label>
                        <div class="flex flex-col lg:flex-row items-start lg:items-center gap-2">
                            <span class="px-4 cursor-pointer py-2 bg-slate-200 dark:bg-slate-500 rounded">
                                <a id="lfm" data-input="image" data-preview="holder"
                                   class="text-slate-700 dark:text-slate-200">Pilih File</a>
                            </span>
                            <input wire:model="image" id="image" type="text" placeholder="image url"
                                   class="rounded bg-white dark:bg-boxdark" name="filepath"/>
                        </div>
                        @error('image')
                        <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center gap-4">
                    <div class="mb-10 w-full">
                        <label for="date" class="mb-3 block text-sm font-medium text-black dark:text-white">Tanggal
                            Publish</label>
                        <input wire:model="published_at" id="date"
                               class="form-datepicker w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                               type="datetime-local"
                        />
                        @error('publishedAt')
                        <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-10 w-full">
                        <label for="status"
                               class="mb-3 block text-sm font-medium text-black dark:text-white">Status</label>
                        <div class="flex items-center gap-3 self-center md:self-start w-full">
                            <div x-data="{ isOptionSelected: false }"
                                 class="relative z-20 bg-white dark:bg-form-input w-full">
                                <select wire:model="status" id="status" @change="isOptionSelected = true"
                                        class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input">
                                    <option class="text-body" selected>Pilih Status</option>
                                    <option value="PUBLISHED" class="text-body">PUBLISHED</option>
                                    <option value="DRAFT" class="text-body">DRAFT</option>
                                </select>
                            </div>
                        </div>
                        @error('status')
                        <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    <div x-data="{ checkboxToggle: @json($featured) }" x-init="$watch('checkboxToggle', value => {
                            $nextTick(() => {
                                @this.set('featured', value);
                            });
                        })">
                        <label for="checkboxLabelTwo"
                               class="w-fit py-3 flex cursor-pointer select-none items-center text-sm font-medium">
                            <div class="relative">
                                <input wire:model="featured" type="checkbox" id="checkboxLabelTwo" class="sr-only"
                                       @change="checkboxToggle = !checkboxToggle"/>
                                <div :class="checkboxToggle && 'border-primary bg-gray dark:bg-transparent'"
                                     class="mr-4 flex h-5 w-5 items-center justify-center rounded border">
                                    <span :class="checkboxToggle && '!opacity-100'" class="opacity-0">
                                        <svg width="11" height="8" viewBox="0 0 11 8" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.0915 0.951972L10.0867 0.946075L10.0813 0.940568C9.90076 0.753564 9.61034 0.753146 9.42927 0.939309L4.16201 6.22962L1.58507 3.63469C1.40401 3.44841 1.11351 3.44879 0.932892 3.63584C0.755703 3.81933 0.755703 4.10875 0.932892 4.29224L0.932878 4.29225L0.934851 4.29424L3.58046 6.95832C3.73676 7.11955 3.94983 7.2 4.1473 7.2C4.36196 7.2 4.55963 7.11773 4.71406 6.9584L10.0468 1.60234C10.2436 1.4199 10.2421 1.1339 10.0915 0.951972ZM4.2327 6.30081L4.2317 6.2998C4.23206 6.30015 4.23237 6.30049 4.23269 6.30082L4.2327 6.30081Z"
                                                  fill="#3056D3" stroke="#3056D3" stroke-width="0.4"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            Featured
                        </label>
                    </div>
                </div>
                <div class="flex items-center justify-end">
                    <button type="submit" wire:loading.attr="disabled"
                            class="bg-primary py-2 px-8 rounded text-slate-200">Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
    @push('head-js')
        @assets
        <script src="{{asset('/ckeditor4/ckeditor.js')}}"></script>
        <script src="{{asset('/js/jquery-v3.7.1.min.js')}}"></script>
        <script src="{{asset('/js/select2.min.js')}}"></script>
        <script src="{{asset('/vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
        @endassets
    @endpush

    @push('js')
        @script
        {{--select2 script--}}
        <script>
            $(document).ready(function () {
                $('#select-category').select2({
                    width: 'resolve',
                })
                $('#select-category').on('change', function (event) {
                    var selectedValue = $(this).val()
                @this.set('selectedCategories', selectedValue)
                })
                //edit category part
                @this.on('selectedCategoriesChanged', function () {
                    $('#select-category').trigger('change');
                })
                        {{--CKEditor script--}}
                var options = {
                        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
                        clipboard_handleImages: false,
                        removePlugins: 'exportpdf'
                    }
                const editor = CKEDITOR.replace('body', options);
                editor.on('change', function (event) {
                    // editor.updateElement();
                @this.set('body', event.editor.getData())
                });
                // laravel file manager
                $('#lfm').filemanager('image');

                $('#image').on('change', function (event) {
                @this.set('image', event.target.value)
                })
            })
        </script>
        @endscript
    @endpush
</div>

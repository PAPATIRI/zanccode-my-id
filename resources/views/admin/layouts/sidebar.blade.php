<aside x-cloak="true" :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
       class="absolute left-0 top-0 z-99 flex h-screen w-72.5 flex-col overflow-y-hidden bg-black duration-300 ease-linear dark:bg-boxdark lg:static lg:translate-x-0"
       @click.outside="sidebarToggle = false">
    <!-- SIDEBAR HEADER -->
    <div class="flex items-center justify-between gap-2 px-10 py-3">
        <a href="{{route('admin.dashboard')}}" class="font-serif font-medium uppercase text-4xl text-indigo-500">
            zanccode
            <div class="h-1 mt-1 w-full bg-indigo-500 rounded"></div>
        </a>

        <button class="block lg:hidden" @click.stop="sidebarToggle = !sidebarToggle">
            @include('admin.layouts.includes.svg-arrow-left')
        </button>
    </div>
    <!-- SIDEBAR HEADER -->

    <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
        <!-- Sidebar Menu -->
        <nav class="mt-5 px-4 py-4 lg:mt-9 lg:px-6">
            <!-- Menu Group -->
            <div>
                <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark2">MENU</h3>
                <ul class="mb-6 flex flex-col gap-1.5">
                    <!-- Menu Item Dashboard -->
                    <li>
                        <a wire:navigate class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                           href="{{route('admin.dashboard')}}">
                            @include('admin.layouts.includes.svg-dashboard')
                            Dashboard
                        </a>
                    </li>
                    <!-- Menu Item Dashboard -->


                    <!-- Menu Item Tables -->
                    <li>
                        <a wire:navigate class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4" href="{{route('admin.posts')}}">
                            @include('admin.layouts.includes.svg-calender')
                            Artikel
                        </a>
                    </li>
                    <!-- Menu Item Tables -->

                    <!-- Menu Item Categories -->
                    <li>
                        <a class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                           href="{{route('admin.categories')}}">
                            @include('admin.layouts.includes.svg-category')
                            Category
                        </a>
                    </li>
                    <!-- Menu Item Categories -->

                    <!-- Menu Item Profile -->
                    <li>
                        <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4">
                            @include('admin.layouts.includes.svg-user2')
                            Penulis
                        </a>
                    </li>
                    <!-- Menu Item Profile -->

                    <!-- Menu Item Settings -->
                    <li>
                        <a class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                           href="#">
                            @include('admin.layouts.includes.svg-setting')
                            Settings
                        </a>
                    </li>
                    <!-- Menu Item Settings -->
                </ul>
            </div>

            <!-- Others Group -->
            <div>
                <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark2">OTHERS</h3>
                <ul class="mb-6 flex flex-col gap-1.5">
                    <!-- Menu Item Auth Pages -->
                    <a class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                       href="settings.html">
                        @include('admin.layouts.includes.svg-logout')
                        Keluar Akun
                    </a>
                    <!-- Menu Item Auth Pages -->
                </ul>
            </div>
        </nav>
        <!-- Sidebar Menu -->
    </div>
</aside>

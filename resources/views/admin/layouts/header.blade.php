<header class="sticky top-0 z-9 flex w-full bg-white drop-shadow-1 dark:bg-boxdark dark:drop-shadow-none">
    <div class="flex flex-grow items-center justify-between px-4 py-4 shadow-2 md:px-6 2xl:px-11">
        <div class="flex items-center gap-2 sm:gap-4 lg:hidden">
            <!-- Hamburger Toggle BTN -->
            @include('admin.layouts.includes.hamburger-menu-icon')
        </div>
        <div></div>
        <div class="flex items-center gap-3 2xsm:gap-7">
            <!-- Dark Mode Toggler -->
            @include('admin.layouts.includes.darkmode-toggler')
            <!-- Dark Mode Toggler -->

            <!-- User Area -->
            <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                <a class="flex items-center gap-4" href="#" @click.prevent="dropdownOpen = ! dropdownOpen">
                    <span class="hidden text-right lg:block">
                        <span class="block text-sm font-medium text-black dark:text-white">{{auth()->user()->name}}</span>
                        <span class="block text-xs font-medium">{{auth()->user()->role}}</span>
                    </span>
                    <span class="h-12 w-12 rounded-full overflow-hidden">
                        <img class="w-full h-full object-cover"
                             src="{{\Illuminate\Support\Facades\Auth::user()->profile_photo_url}}"
                             alt="{{\Illuminate\Support\Facades\Auth::user()->name}}"/>
                    </span>
                    <svg :class="dropdownOpen && 'rotate-180'" class="hidden fill-current sm:block" width="12"
                         height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M0.410765 0.910734C0.736202 0.585297 1.26384 0.585297 1.58928 0.910734L6.00002 5.32148L10.4108 0.910734C10.7362 0.585297 11.2638 0.585297 11.5893 0.910734C11.9147 1.23617 11.9147 1.76381 11.5893 2.08924L6.58928 7.08924C6.26384 7.41468 5.7362 7.41468 5.41077 7.08924L0.410765 2.08924C0.0853277 1.76381 0.0853277 1.23617 0.410765 0.910734Z"
                              fill=""/>
                    </svg>
                </a>

                <!-- Dropdown Start -->
                <div x-cloak x-show="dropdownOpen"
                     class="absolute right-0 mt-4 flex w-62.5 flex-col rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <ul class="flex flex-col gap-5 border-b border-stroke px-6 py-7.5 dark:border-strokedark">
                        <li>
                            <a href="{{route('profile.show')}}"
                               class="flex items-center gap-3.5 text-sm font-medium duration-300 ease-in-out hover:text-primary lg:text-base">
                                @include('admin.layouts.includes.svg-user')
                                My Profile
                            </a>
                        </li>
                    </ul>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <a href="{{route('logout')}}" @click.prevent="$root.submit()"
                           class="flex items-center gap-3.5 px-6 py-4 text-sm font-medium duration-300 ease-in-out hover:text-primary lg:text-base">
                            @include('admin.layouts.includes.svg-logout')
                            Log Out
                        </a>
                    </form>
                </div>
                <!-- Dropdown End -->
            </div>
            <!-- User Area -->
        </div>
    </div>
</header>

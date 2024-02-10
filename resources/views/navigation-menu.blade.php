<div x-data="{isOpen: false}">
    <nav class="py-3 px-6 border-b border-slate-300 flex justify-center">
        <div class="w-full max-w-6xl flex items-center justify-between">
            <a href="{{route('home')}}">
                <x-application-mark/>
            </a>
            <button class="lg:hidden" @click="isOpen=!isOpen">
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 12H40V16H8V12ZM16 22H40V26H16V22ZM26 32H40V36H26V32Z" fill="black"/>
                </svg>
            </button>

            {{--desktop navbar--}}
            <div class="hidden lg:flex w-full items-center justify-between">
                <div></div>
                <div id="nav-left" class="flex items-center gap-3">
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('menu.home') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                        {{ __('menu.blog') }}
                    </x-nav-link>
                </div>
                <div id="nav-right" class="flex items-center">
                    @auth()
                        @include('layouts.partials.header-right-auth')
                    @else
                        @include('layouts.partials.header-right-guest')
                    @endauth
                </div>
            </div>

            {{--mobile navbar --}}
            <div class="bg-slate-900/40 fixed right-0 top-0 h-full w-full z-30 filter blur-xs backdrop-filter backdrop-blur-sm"
                 x-show="isOpen" x-cloak></div>
            <div class="bg-indigo-300 p-4 fixed right-0 z-50 top-0 w-[50%] h-screen bg-slate-100" x-cloak x-show="isOpen"
                 @click.away="isOpen=!isOpen">
                <div class="w-full text-right">
                    <button @click="isOpen=!isOpen">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M32.6133 12.9452L24.1273 21.4292L15.6433 12.9452L12.8153 15.7732L21.2993 24.2572L12.8153 32.7412L15.6433 35.5692L24.1273 27.0852L32.6133 35.5692L35.4413 32.7412L26.9573 24.2572L35.4413 15.7732L32.6133 12.9452Z"
                                  fill="black"/>
                        </svg>
                    </button>
                </div>
                <div class="flex flex-col gap-3 text-lg">
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('menu.home') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                        {{ __('menu.blog') }}
                    </x-nav-link>
                    @can('viewAdmin', \App\Models\User::class)
                        <x-nav-link :navigate='false' href="{{ route('filament.admin.auth.login') }}"
                                    :active="request()->routeIs('filament.admin.auth.login')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    @endcan
                    <hr class="w-full">
                    @auth()
                        <div class="text-base text-slate-500">
                            {{ __('menu.manage_account') }}
                        </div>
                        <x-nav-link wire:navigate href="{{route('profile.show')}}">{{__('menu.profile')}}</x-nav-link>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <x-nav-link class="text-slate-100 rounded p-2 bg-red-500 hover:text-slate-100"
                                        href="{{route('logout')}}"
                                        @click.prevent="$root.submit();">{{__('menu.logout')}}</x-nav-link>
                        </form>
                    @else
                        <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                            {{ __('menu.login') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                            {{ __('menu.register') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</div>

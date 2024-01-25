<nav class="py-3 px-6 border-b border-gray-100 flex justify-center">
    <div class="w-full max-w-6xl flex items-center justify-between ">
        <div id="nav-left" class="flex items-center">
            <a href="{{route('home')}}">
                <x-application-mark/>
            </a>
            <div class="top-menu ml-10">
                <div class="flex space-x-4 text-base">
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                        {{ __('Posts') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
        <div id="nav-right" class="flex items-center md:space-x-6">
            @auth()
                @include('layouts.partials.header-right-auth')
            @else
                @include('layouts.partials.header-right-guest')
            @endauth
        </div>
    </div>
</nav>

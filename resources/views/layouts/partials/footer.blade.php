<footer class="text-base space-x-4 flex items-center border-t border-gray-100 flex-wrap justify-center py-4 ">
    <div>
        @foreach(config('app.supported_locales') as $data)
            <a href="{{route('locale', $data['icon'])}}" class="text-gray-500 hover:text-yellow-500">
                {{$data['icon']}}
            </a>
        @endforeach
    </div>
    <a class="text-gray-500 hover:text-yellow-500" href="{{route('home')}}">{{__('menu.home')}}</a>
    <a class="text-gray-500 hover:text-yellow-500" href="{{route('posts.index')}}">{{__('menu.blog')}}</a>
    <a class="text-gray-500 hover:text-yellow-500" href="">{{__('About Me')}}</a>
    @if(!auth()->user())
        <a class="text-gray-500 hover:text-yellow-500" href="{{route('login')}}">{{__('menu.login')}}</a>
    @endif
</footer>

@push('css')
    <link rel="stylesheet" href="{{asset("css/custom-style.css")}}">
@endpush
<x-app-layout title="Home Page">
    @section('hero')
        <div class="w-full text-center py-32">
            <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-5xl font-serif text-slate-700">
                {{__('home.hero.title')}} <span class="text-indigo-500">zanc</span>code
                <span class="custom-animation">👋</span>
            </h1>
            <div class="max-w-[500px] mx-auto my-6 px-3">
                <p class="text-slate-700 text-base md:text-lg font-serif">" {{$quotes['quote']}}"</p>
                <p class="text-slate-500 text-sm md:text-base italic mt-2 font-sans">{{$quotes['author']}}</p>
            </div>
            <a class="px-3 py-2 text-base md:text-lg text-slate-200 bg-slate-800 rounded mt-5 inline-block"
               href="{{route('posts.index')}}">{{__('home.hero.cta')}}</a>
        </div>
    @endsection
    <div class="mb-10 w-full">
        <div class="mb-20">
            <h2 class="mt-16 mb-5 text-base lg:text-lg font-serif text-slate-700 font-bold">{{__('home.featured_post')}}</h2>
            <div class="w-full">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 w-full">
                    @foreach($featuredPost as $post)
                        <x-posts.post-card :post="$post" class="col-span-3 md:col-span-1"/>
                    @endforeach
                </div>
            </div>
            <a class="mt-10 block text-center text-base lg:text-lg font-serif text-indigo-500 font-semibold"
               href="{{route('posts.index')}}">{{__('home.more_post')}}</a>
        </div>

        <div class="w-full mb-5">
            <h2 class="mt-16 mb-5 text-base lg:text-lg font-serif text-slate-700 font-bold">{{__('home.latest_post')}}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 w-full">
                @foreach($latestPost as $post)
                    <x-posts.post-card :post="$post" class="md:col-span-1 col-span-3"/>
                @endforeach
            </div>
        </div>
        <a class="mt-10 block text-center text-base lg:text-lg font-serif text-indigo-500 font-semibold"
           href="{{route('posts.index')}}">{{__('home.more_post')}}</a>
    </div>
</x-app-layout>

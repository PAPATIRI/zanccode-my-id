@push('css')
    <link rel="stylesheet" href="{{asset("css/custom-style.css")}}">
@endpush
<x-app-layout title="Home Page">
    @section('hero')
        <div class="w-full text-center py-32">
            <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-5xl text-slate-700">
                {{__('home.hero.title')}} <span class="text-indigo-500">zanc</span>code
                <span class="custom-animation">👋</span>
            </h1>
            <p class="text-slate-500 text-base md:text-lg mt-1">{{__('home.hero.desc')}}</p>
            <a class="px-3 py-2 text-base md:text-lg text-slate-200 bg-slate-800 rounded mt-5 inline-block"
               href="{{route('posts.index')}}">{{__('home.hero.cta')}}</a>
        </div>
    @endsection
    <div class="mb-10 w-full">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl text-indigo-500 font-bold">{{__('home.featured_post')}}</h2>
            <div class="w-full">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 w-full">
                    @foreach($featuredPost as $post)
                        <x-posts.post-card :post="$post" class="col-span-3 md:col-span-1"/>
                    @endforeach
                </div>
            </div>
            <a class="mt-10 block text-center text-lg text-indigo-500 font-semibold"
               href="{{route('posts.index')}}">{{__('home.more_post')}}</a>
        </div>
        <hr>

        <h2 class="mt-16 mb-5 text-3xl text-indigo-500 font-bold">{{__('home.latest_post')}}</h2>
        <div class="w-full mb-5">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 w-full">
                @foreach($latestPost as $post)
                    <x-posts.post-card :post="$post" class="md:col-span-1 col-span-3"/>
                @endforeach
            </div>
        </div>
        <a class="mt-10 block text-center text-lg text-indigo-500 font-semibold"
           href="{{route('posts.index')}}">{{__('home.more_post')}}</a>
    </div>
</x-app-layout>

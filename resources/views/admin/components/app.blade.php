<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{isset($title) ? $title . ' - ' : ''}}{{ config('app.name', '') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('/site.webmanifest')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{--    <link rel="stylesheet" href="{{asset('build/assets/app-52yMM1R5.css')}}">--}}
    {{--    <link rel="stylesheet" href="{{asset('build/assets/app-DAFGJXeN.css')}}">--}}
    {{--    <script src="{{asset('build/assets/app-DkDdL2UM.js')}}"></script>--}}

    <!-- Styles -->
    @stack('css')
    @stack('head-js')
    @livewireStyles
</head>
<body x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
      x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
      :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}">

<div class="flex h-screen overflow-hidden">
    @include('admin.layouts.sidebar')
    <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
        @include('admin.layouts.header')
        <main class="p-4 m-4 h-full">
            {{$slot}}
        </main>
    </div>
</div>
@livewireScripts
@stack('js')
</body>
</html>

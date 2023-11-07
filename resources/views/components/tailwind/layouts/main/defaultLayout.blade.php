<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('hive-newsletter.title') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="icon" type="image/x-icon" href="{{asset('/vendor/hive-newsletter/img/favicon.png')}}">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.9.0/cdn.min.js" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        @livewireStyles
        @stack('styles')

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body id="app" class="font-sans antialiased">
        <div class="min-h-screen relative isolate bg-white overflow-hidden">
          <svg class="absolute inset-0 -z-10 h-full w-full stroke-slate-100 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]" aria-hidden="true">
            <defs>
             <pattern id="83fd4e5a-9d52-42fc-97b6-718e5d7ee527" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
               <path d="M100 200V.5M.5 .5H200" fill="none" />
             </pattern>
            </defs>
            <svg x="50%" y="-1" class="overflow-visible fill-gray-50/40">
             <path d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M-300.5 600h201v201h-201Z" stroke-width="0" />
            </svg>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#83fd4e5a-9d52-42fc-97b6-718e5d7ee527)" />
          </svg>
             <!-- Page Content -->
            <div class="">
              <x-hive-display-nav/>
              <main id="main">
                {{ $slot }}
              </main>
              <x-hive-display-footer />
            </div>
        </div>
        @stack('modals')
        @livewireScripts
        @stack('scripts')
    </body>
</html>

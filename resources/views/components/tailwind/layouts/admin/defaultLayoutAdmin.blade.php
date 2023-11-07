<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('hive-newsletter.title') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.9.0/cdn.min.js" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        @livewireStyles
        @stack('styles')

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">

        <div class="min-h-screen bg-white overflow-hidden dark:bg-gray-700 " x-data="{ sidebarOpen : true, modalOpen : false }">
          <div class="hidden lg:fixed lg:inset-y-0 lg:flex lg:w-64 lg:flex-col lg:border-r lg:border-blue-200 lg:bg-blue-50/60">
            <!-- Page Sidebar -->
            <x-hive-display-sidebar-admin />
           </div>
             <!-- Page Content -->
            <div class="flex-1 flex-col lg:pl-64">
              <x-hive-display-na-adminv  />
              <main id="main">
              {{ $slot }}
              </main>
              <x-hive-display-footer-admin />
            </div>

        </div>
        @stack('modals')
        @livewireScripts
        @stack('scripts')
    </body>
</html>

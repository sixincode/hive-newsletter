@props([
    // title of the card
    'title' => '',
    // should the card be displayed with a shadow
    'has_shadow' => 'true',
    // for backward compatibility with Laravel 8
    'hasShadow' => 'true',
    // reduce padding within the card
    'reduce_padding' => 'false',
    // for backward compatibility with Laravel 8
    'reducePadding' => 'false',
    // content to display as card header
    'header' => '',
    // content to display as card footer
    'footer' => '',
    // additional css
    'class' => 'flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 p-4 transition-all duration-200 ease-in-out',
])
@php
    // reset variables for Laravel 8 support
    $has_shadow = $hasShadow;
    $reduce_padding = $reducePadding;
@endphp
<header class="sticky top-0 bg-white shadow-sm z-30">
   <div class="px-4 sm:px-6 lg:px-8">
       <div class="flex items-center justify-between h-16 -mb-px">

           <!-- Header: Left side -->
           <div class="flex">

               <!-- Hamburger button -->
               <button
                   class="text-slate-500 hover:text-slate-600 lg:hidden"
                   @click.stop="sidebarOpen = !sidebarOpen"
                   aria-controls="sidebar"
                   :aria-expanded="sidebarOpen"
               >
                   <span class="sr-only">Open sidebar</span>
                   <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                       <rect x="4" y="5"  width="16" height="2" />
                       <rect x="4" y="11" width="16" height="2" />
                       <rect x="4" y="17" width="16" height="2" />
                   </svg>
               </button>

           </div>

           <!-- Header: Right side -->
           <div class="flex items-center space-x-3">

               <!-- Search Button with Modal -->

               <!-- Notifications button -->

               <!-- Divider -->
               <hr class="w-px h-6 bg-slate-200" />

               <!-- User button -->
               <x-hive-display-card source='elements' component='auth.userDropdown' />
           </div>

       </div>
   </div>
</header>

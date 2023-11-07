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
    'class' => '',
])
@php
    // reset variables for Laravel 8 support
    $has_shadow = $hasShadow;
    $reduce_padding = $reducePadding;
@endphp
<aside id="sidebar" class=" {{$class}}">
      <div class="hidden h-screen lg:flex">
      <div class="lg:w-12">
        <div class="h-full flex flex-col justify-between">

          <div>

            <li class="w-full h-16 bg-white/10 p-1.5 flex justify-center items-center">
            <a href="#" x-tooltip.raw="logo">
              <x-hive-form-icon
              path='logo'
              width='6'
              height='6'
              class='m-0'
              margin='0'
              iconWidth='2'
              />
            </a>
            </li>

            <ul class="grid items-center px-1 mt-1.5 justify-center space-y-0.5">
            <x-hive-display-link
            icon='profile'
            component='west'
            title='{{__("Resume")}}'
            url='#'/>

             <x-hive-display-link
             icon='folder'
             component='west'
             title='{{__("My Folders")}}'
             url='#'/>

              <x-hive-display-link
              icon='community'
              component='west'
              title='{{__("My Circle")}}'
              url='#'/>

               <x-hive-display-link
               icon='finance'
               component='west'
               title='{{__("Finances")}}'
               url='#'/>

                <x-hive-display-link
                icon='message'
                component='west'
                title='{{__("Messagesy Circle")}}'
                url='#'/>

                 <x-hive-display-link
                 icon='event'
                 component='west'
                 title='{{__("Events")}}'
                 url='#'/>

                  <x-hive-display-link
                  icon='plus'
                  component='west'
                  title='{{__("Pin link")}}'
                  url='#'/>
                 </ul>
               </div>
       <ul class="grid">
       <x-hive-display-link
       icon='setting'
       component='west'
       title='{{__("Settings")}}'
       url='#'/>
      </ul>
          </div>
        </div>
        <div class="lg:w-52">
        <!-- Navigation -->
        <nav class="mt-4 px-3">
          <div class="space-y-1">
            <x-hive-display-link
            title='{{__("Dashboard")}}'
            url='#'
            icon='dashboard'
            iconWidth='2'/>
            <x-hive-display-link
            title='{{__("Starred")}}'
            url='#'
            icon='bookmark'
            iconWidth='2'/>
            <x-hive-display-link
            title='{{__("Posts")}}'
            url='#'
            icon='post'
            iconWidth='2'/>

            <x-hive-display-link
            title='{{__("Analytics")}}'
            url='#'
            icon='analytics'
            iconWidth='2'/>




          </div>
          <div class="mt-8">
            <!-- Secondary navigation -->
            <h3 class="px-3 text-sm font-medium text-gray-500" id="desktop-teams-headline">
              {{__("My board")}}
            </h3>
            <div class="mt-1 space-y-1" role="group" aria-labelledby="desktop-teams-headline">
                <x-hive-display-link
                color='indigo'
                component='slick'
                title='{{__("Resume")}}'
                url='#'/>

                <x-hive-display-link
                color='red'
                component='slick'
                title='{{__("Portfolio")}}'
                url='#'/>

            </div>
          </div>
        </nav>
      </div>

      </div>
</aside>

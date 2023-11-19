<x-hive-display-section component="dividedSection" gap="8">
  <div class="grid gap-8">
    <x-hive-display-card component="pollen" class="p-4 relative">
      <div class="">
       <span class="absolute inset-x-0 rounded-b-lg bottom-0 h-1 bg-gradient-to-r from-slate-300 via-slate-400 to-slate-300"></span>

        <header>
            <div class="">
              <div class="text-center">
                <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
                  {{$newsletter->name}}
                </h1>

                <span class="mt-2 block text-gray-400 text-xs">
                   Created <time>{{$newsletter->created_at->diffForHumans()}}</time>
               </span>
              </div>

            </div>
        </header>

        <div class="my-6 md:mt-10">
          <p class="text-sm md:text-md text-center text-gray-500">
            {{$newsletter->description}}
              </p>
        </div>

      </div>
    </x-hive-display-card>

      <div id="subscribers" class="">
        <h2 class="truncate text-base font-medium leading-7 text-slate-900">Subscribers</h2>
        <x-hive-display-card component="pollen" class="mt-4">
          <ul class="divide-y divide-slate-50">
            @foreach($newsletter->subscriptions as $subscription)
              <x-hive-newsletter-user-newsletter-subscriber :newsletter='$newsletter' :subscription='$subscription'/>
            @endforeach
          </ul>
        </x-hive-display-card>
      </div>

    </div>
    <x-slot name="secondSec">
      <div class="grid gap-4">
        <div class="flex gap-3">
         <x-hive-display-dropdown align="left">
           <x-slot name="trigger">
           <x-hive-form-button
            id="settings"
            name="settings"
            color="transparent"
            tag="button" class="bg-slate-200/60 text-slate-500 hover:bg-slate-200  flex gap-3"
            >
            <x-hive-form-icon
             path='settings'
             width='4'
             height='4'
             />
           </x-hive-form-button>
         </x-slot>
         <div class="">
           redddd
         </div>
         </x-hive-display-dropdown>

        <x-hive-form-button
          id="new_subscriber"
          name="new_subscriber"
          color="simple"
          tag="button" class="flex gap-3"
          >
          Add subscriber
          <x-hive-form-icon
           path='user-unblock'
           width='4'
           height='4'
           />
      </x-hive-form-button>
      <x-hive-form-button
          id="new_post"
          name="new_post"
          tag="button" class="flex flex-1 gap-3"
          >
          New Post
          <x-hive-form-icon
           path='post'
           width='4'
           height='4'
           />
      </x-hive-form-button>
    </div>

      <div class="rounded-lg bg-white/40 shadow-sm ring-1 ring-blue-900/5 p-3">
          <dl class="flex flex-wrap">
            <div class="flex items-center w-full flex-none gap-x-4">
              <dt class="flex-none">
                <span class="sr-only">Subscribers</span>
                <div class="inline-flex p-1.5 rounded-lg bg-blue-50">
                  <x-hive-form-icon
                   path='community'
                   width='5'
                   height='6'
                   class='text-gray-600'
                   />
                </div>

              </dt>
              <dd class="text-sm font-medium leading-6 text-gray-600">
                <a href="#susbcribers">
                  <span class="text-gray-800">{{$newsletter->subscriptions->count()}} </span>
                   Subscribers
                </a>
              </dd>
            </div>
            <div class="mt-4 flex items-center w-full flex-none gap-x-4">
              <dt class="flex-none">
                <span class="sr-only">Publications</span>
                <div class="inline-flex p-1.5 rounded-lg bg-blue-50">
                  <x-hive-form-icon
                   path='post'
                   width='5'
                   height='6'
                   class='text-gray-600'
                   />
                </div>

              </dt>
              <dd class="text-sm font-medium leading-6 text-gray-600">Publications</dd>

            </div>

          </dl>

        </div>
      </div>

    </x-slot>

</x-hive-display-section>

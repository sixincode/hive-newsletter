@props(['newsletter' => '', 'subscription' => '', ])
<li class="flex items-center justify-between gap-x-6 p-4 hover:bg-slate-50/80 rounded">
  <div class="flex min-w-0 gap-x-4">
    <div class="min-w-0 flex-auto">
      <p class="mt-1 truncate leading-5 text-gray-700">
        {{$subscription->email}}
      </p>
      <div class="flex gap-x-2 items-center mt-1 truncate text-xs leading-5 text-gray-500">
        <p>
          Suscribed <time>{{$subscription->created_at->diffForHumans()}}</time>
        </p>
        <svg viewBox="0 0 2 2" class="h-0.5 w-0.5 fill-current">
          <circle cx="1" cy="1" r="1"></circle>
        </svg>
        <p>
          {{$subscription->hasVerifiedEmail() ? 'verified' : 'not verified' }}
        </p>
        @if(! $subscription->isActive())
        <svg viewBox="0 0 2 2" class="h-0.5 w-0.5 fill-current">
          <circle cx="1" cy="1" r="1"></circle>
        </svg>
        <p class="text-red-700">
        not active
        </p>
        @endif
         </div>
      </div>
    </div>

  <div class="flex gap-x-4">
     <x-hive-display-menu-dots>
      <ul class="">
        <li>
          <a href="#" class="p-2 flex items-center gap-x-3 hover:bg-gray-50">
            <x-hive-form-icon
             path='email'
             width='5'
             height='5'
             class='text-gray-600'
             />
            message
          </a>
        </li>
        <li>
          @if(! $subscription->isActive())
          <a href="{{route('newsletters.user.show.subscription.deactivate', [$newsletter->slug, $subscription->global])}}" class="p-2 flex items-center gap-x-3 hover:bg-gray-50">
            <x-hive-form-icon
             path='user-unblock'
             width='5'
             height='5'
             class='text-gray-600'
             />
             activate
          </a>
          @else
          <a href="{{route('newsletters.user.show.subscription.deactivate', [$newsletter->slug, $subscription->global])}}"  class="p-2 flex items-center gap-x-3 hover:bg-gray-50">
            <x-hive-form-icon
             path='user-block'
             width='5'
             height='5'
             class='text-gray-600'

             />
             deactivate
          </a>
          @endif
        </li>
      </ul>
    </x-hive-display-menu-dots>
  </div>
</li>

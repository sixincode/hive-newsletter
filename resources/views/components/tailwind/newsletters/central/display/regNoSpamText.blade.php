@props([
'route',
'name' => '',
'description' => '',
'class' => '',
'color' => '',
'newsletter' => '',
])
<x-hive-display-section component='boxedXSection' class='p-0'>
<div {{ $attributes->merge(['class' => $class.' flex p-4 md:p-6 items-center justify-center w-full']) }}>
  <form wire:submit="{{ $route }}" class="max-w-5xl mx-auto w-full">
    <div class="">
    @if (isset($actions))
        <div class="flex items-center justify-center my-2">
            {{ $actions }}
        </div>
    @endif
    <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-12 gap-y-16 lg:max-w-none lg:grid-cols-2">
        <div class="max-w-xl lg:max-w-lg">
          <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{$name}}</h2>
          <p class="mt-2 text leading-8 text-gray-500">{{$description}}</p>
          <div class="mt-4 flex max-w-2xl gap-x-4">
            <div class="flex-1">
              <x-hive-form-input
               id="email"
               name="email"
               placeholder="{{__('Enter your email')}}"
               type="email"
               autocomplete="email"
               required
               class="flex-auto flex-1 w-full"
               wire:model="state.email"
               />
             </div>
             <x-input-error for="state.email" class="mt-2" />
             <x-hive-form-button tag="button" type="submit" color="{{$color}}" class="mt-2 flex-none group transition ease-in-out duration-200">
               {{__('hive-newsletter::main.joinNwsltr') }}
                 <span aria-hidden="true" class="inline-block ml-2 translate-x-0 group-hover:translate-x-1 transition-transform ease-in-out duration-200">
                   <svg class="h-5 w-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                   </svg>
                 </span>
             </x-hive-form-button>
          </div>
          <p class="mt-4 text-sm leading-6 text-gray-900">
            {!! __('#::main.weCareData',[
                     'p' => '<a target="_blank" href="'.route('privacy.show').'" class="font-semibold text-blue-600 hover:text-blue-500">'.__('#::main.privP').' </a> .',
             ]) !!}
          </p>
        </div>
        <dl class="grid grid-cols-1 gap-x-8 gap-y-10 sm:grid-cols-2 lg:pt-2">
          <div class="flex flex-col items-start">
            <div class="rounded-md bg-black/5 p-2 ring-1 ring-white/10">
              <svg class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"></path>
            </svg>
            </div>
            <dt class="mt-4 font-semibold text-gray-700">Weekly articles</dt>
            <dd class="mt-2 leading-7 text-sm text-gray-500">Non laboris consequat cupidatat laborum magna. Eiusmod non irure cupidatat duis commodo amet.</dd>
          </div>
          <div class="flex flex-col items-start">
            <div class="rounded-md bg-black/5 p-2 ring-1 ring-white/10">
            <svg class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.05 4.575a1.575 1.575 0 10-3.15 0v3m3.15-3v-1.5a1.575 1.575 0 013.15 0v1.5m-3.15 0l.075 5.925m3.075.75V4.575m0 0a1.575 1.575 0 013.15 0V15M6.9 7.575a1.575 1.575 0 10-3.15 0v8.175a6.75 6.75 0 006.75 6.75h2.018a5.25 5.25 0 003.712-1.538l1.732-1.732a5.25 5.25 0 001.538-3.712l.003-2.024a.668.668 0 01.198-.471 1.575 1.575 0 10-2.228-2.228 3.818 3.818 0 00-1.12 2.687M6.9 7.575V12m6.27 4.318A4.49 4.49 0 0116.35 15m.002 0h-.002"></path>
            </svg>
            </div>
            <dt class="mt-4 font-semibold text-gray-700">No spam</dt>
            <dd class="mt-2 leading-7 text-sm text-gray-500">Officia excepteur ullamco ut sint duis proident non adipisicing. Voluptate incididunt anim.</dd>
          </div>
        </dl>
      </div>
      </div>
  </form>
</div>
</x-hive-display-section>

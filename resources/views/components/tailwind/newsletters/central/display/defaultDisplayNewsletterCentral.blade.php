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
  <form wire:submit="{{ $route }}" class="max-w-2xl mx-auto w-full">
    <div class="px-4 py-5 bg-white  sm:p-6 rounded">
      <div class="">
        @if(isset($actions))
            <div class="flex items-center justify-center my-2">
                {{ $actions }}
            </div>
        @endif
          <div class="grid">
            <!-- Newsletter Name -->
            <div class="col-span-6 sm:col-span-4 text-center">
              <h2 class="text-2xl font-bold text-gray-900 md:text-3xl">
                {{$name}}
              </h2>
              <p class="my-2 text-gray-500">
                {{$description}}
              </p>
              @if(isset($form))
              <div class="">
                {{$form}}
              </div>
              @endif

              <div class="md:flex gap-x-4 mt-4">
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
                <x-input-error for="state.email" class="mt-2" />

                </div>


                <x-hive-form-button tag="button" type="submit" color="{{$color}}" class="mt-2  group transition ease-in-out duration-200">
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
          </div>
      </div>
    </div>
  </form>
</div>
</x-hive-display-section>

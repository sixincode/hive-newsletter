@props(['newsletter' => '', ])
<x-hive-display-card component="pollen" class="hover:bg-slate-50">
  <a href="{{route('newsletters.central.show', $newsletter->slug)}}">
<div class="p-4 sm:px-6 h-full flex flex-col">

    <div class="flex flex-col justify-between flex-1">
        <header>
            <div class="">
                <h1 class="text-lg font-bold text-gray-900 sm:text-xl">
                      {{shortLengthChar($newsletter->name, 80, '...')}}
                </h1>
            </div>
        </header>

        <div class="text-sm mt-4 space-y-4">
          {{shortLengthChar($newsletter->description, 180, '...')}}
        </div>

        <footer class="flex justify-between items-center mt-8 text-xs">
          <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
            <div class="inline-flex p-1.5 rounded-lg bg-blue-50">
              <x-hive-form-icon
               path='community'
               width='4'
               height='4'
               class='text-gray-600'
               />
            </div>
            <div class="mt-1.5 sm:mt-0">
              <p class="text-gray-500">Subscribers</p>
              <p class="font-medium">27</p>
            </div>
          </div>
          <div class="justify-between sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
            <div class="inline-flex p-1.5 rounded-lg bg-blue-50">
              <x-hive-form-icon
               path='calendar'
               width='4'
               height='4'
               class='text-gray-600'
               />
            </div>
            <div class="mt-1.5 sm:mt-0">
              <p class="text-gray-500">Frequence</p>
              <p class="font-medium">Weekly</p>
            </div>
          </div>
        </footer>
    </div>
</div>
</a>
</x-hive-display-card>

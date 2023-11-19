<div class="">
  <x-hive-display-section source='sections' component='dividedSection'>
    <x-slot name="mainSec">
      <x-hive-display-card component="pollen" class="p-4 sm:p-8 lg:p-12">
        <div class="">
          <h3 class="font-semibold leading-6 text-gray-900 text-lg">{{$newsletter->name}}</h3>
          <p class="mt-4 text-gray-500">
            {{$newsletter->description}}
          </p>

        <div class="mx-auto mt-8 max-w-xl">
            <form method="post" action="{{route('newsletters.central.store', $newsletter->slug)}}">
               @csrf
              <div class="sm:flex sm:gap-4">
              <div class="sm:flex-1">
                <label for="email" class="sr-only">Email</label>

                <input id="email" name="email" type="email" placeholder="Email address" class="w-full rounded-md border border-gray-200 bg-white p-3 text-gray-700 shadow-sm transition focus:border-white focus:outline-none focus:ring focus:red-red-400">
              </div>

              <button type="submit" class="group mt-4 flex w-full items-center justify-center gap-2 rounded-md bg-red-600 px-5 py-3 text-white transition focus:outline-none focus:ring focus:red-red-400 sm:mt-0 sm:w-auto">
                <span class="text-sm font-medium"> Join Newsletter </span>

                <svg class="h-5 w-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
              </button>
            </div>

          </div>
            </form>
          </div>

      </x-hive-display-card>

    </x-slot>
    <x-slot name="secondSec">

    </x-slot>
  </x-hive-display-section>
</div>

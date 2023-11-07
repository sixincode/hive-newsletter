<section>
  <div class="relative">
   <div class="">
    <div class="relative shadow sm:overflow-hidden h-screen flex items-center">
     <div class="absolute inset-0">
       <img class="h-full w-full object-cover"
        src="{{asset('/vendor/hive-newsletter/img/landing/topBgLanding.webp' )}}" class="bg-blue-200" alt="Landing Bg">
        <div class="absolute inset-0 bg-black bg-opacity-30 mix-blend-multiply"></div>
      </div>
      <div class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-32 lg:px-8 container mx-auto">
        <h1 class="tracking-tight mt-6">
          <span class="block text-white font-extrabold text-3xl sm:text-5xl lg:text-7xl">{!! config('hive-newsletter.title') !!}</span>
        </h1>
        <p class="text-slate-100 text-xl sm:text-2xl font-semibold mt-8">{!! config('hive-newsletter.slogan') !!}</p>


        </div>
      </div>
    </div>
  </div>
</section>

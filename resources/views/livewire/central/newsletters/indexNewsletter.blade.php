<div class="">
  <h1 class="text-xl font-semibold">{{ _('Newsletters') }}</h1>
  <hr class="my-6">
  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($newsletters as $newsletter)
      <x-hive-newsletter-central-newsletter :newsletter='$newsletter'/>
    @endforeach
  </div>
</div>

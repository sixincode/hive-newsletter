<?php

namespace Sixincode\HiveNewsletter\Http\Livewire\Central\Newsletters;

use Livewire\Component;
use Sixincode\HiveNewsletter\Actions\SubscribeToNewsletter;
use Sixincode\HiveNewsletter\Models\Newsletter;

class DisplayNewsletter extends Component
{
  public Newsletter $newsletter;
  public string $component;
  public string $color;
  public array  $state = [];

  public function mount(
    $newsletter = null,
    $component = 'defaultDisplayNewsletterCentral',
    $color = 'blue',
   )
  {
    $newsletter ?  $this->newsletter = $newsletter : $this->newsletter = Newsletter::whereSlug('main_newsletter')->first();
    $this->component = $component;
    $this->color = $color;
  }

  public function subscribeToNewsletter(SubscribeToNewsletter $creator)
  {
      $this->resetErrorBag();
      $creator->create($this->newsletter, $this->state);
      // $this->reset("state.email");
      // $this->state = [];
      $this->dispatch('subscribed');
      $this->dispatch('refresh-navigation-menu');
  }

  public function render()
  {
    return view('hive-newsletter::livewire.central.newsletters.displayNewsletter');
  }
}

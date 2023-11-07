<?php

namespace Sixincode\HiveNewsletter\Http\Livewire\User\Subscribers;

use Livewire\Component;
use Sixincode\HiveNewsletter\Models\Newsletter;

class IndexUserSubscriber extends Component
{
  public NewsletterSubscription $subscription;

  public function mount(
    Newsletter $newsletter
    )
  {
    $this->subscription = $subscription;
  }

  public function render()
  {
    return view('hive-newsletter::livewire.user.subscribers.indexUserSubscriber');
  }
}

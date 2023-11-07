<?php

namespace Sixincode\HiveNewsletter\Http\Livewire\User\Subscribers;

use Livewire\Component;
use Sixincode\HiveNewsletter\Models\NewsletterSubscription;

class ShowUserSubscriber extends Component
{
  public NewsletterSubscription $subscription;

  public function mount(
    NewsletterSubscription $subscription
    )
  {
    $this->subscription = $subscription;
  }

  public function render()
  {
    return view('hive-newsletter::livewire.user.subscribers.showUserSubscriber');
  }
}

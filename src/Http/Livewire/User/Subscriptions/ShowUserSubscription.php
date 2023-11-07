<?php

namespace Sixincode\HiveNewsletter\Http\Livewire\User\Subscriptions;

use Livewire\Component;
use Sixincode\HiveNewsletter\Models\NewsletterSubscription;

class ShowUserSubscription extends Component
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
    return view('hive-newsletter::livewire.user.subscriptions.showUserSubscription');
  }
}

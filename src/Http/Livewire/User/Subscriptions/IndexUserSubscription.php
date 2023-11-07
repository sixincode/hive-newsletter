<?php

namespace Sixincode\HiveNewsletter\Http\Livewire\User\Subscriptions;

use Livewire\Component;
use Sixincode\HiveNewsletter\Models\NewsletterSubscription;

class IndexUserSubscription extends Component
{
  public $subscriptions;

  public function mount(
     $subscriptions
    )
  {
    $this->subscriptions = $subscriptions;
  }

  public function render()
  {
    return view('hive-newsletter::livewire.user.subscriptions.indexUserSubscription');
  }
}

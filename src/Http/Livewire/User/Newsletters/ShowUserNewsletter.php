<?php

namespace Sixincode\HiveNewsletter\Http\Livewire\User\Newsletters;

use Livewire\Component;
use Sixincode\HiveNewsletter\Models\Newsletter;
use Sixincode\HiveNewsletter\Models\NewsletterSubscription;

class ShowUserNewsletter extends Component
{
  public Newsletter $newsletter;
  public NewsletterSubscription $subscription;

  public function mount(
    Newsletter $newsletter
  )
  {
    $this->newsletter = $newsletter;
  }

  public function deactivateSubscription($subscription)
  {
    $this->newsletter->subscriptions()->whereGlobal($subscription)->firstOrFail()->toggleIsActive();
    
  }

  public function render()
  {
    return view('hive-newsletter::livewire.user.newsletters.showUserNewsletter');
  }
}

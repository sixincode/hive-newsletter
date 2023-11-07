<?php

namespace Sixincode\HiveNewsletter\Components\User\Subscription;

use Illuminate\View\Component;
use Sixincode\HiveNewsletter\Models\NewsletterSubscription;

class DisplaySubscription extends Component
{
 public NewsletterSubscription $subscription;

 public function __construct(
    NewsletterSubscription $subscription
    )
  {
    $this->subscription = $subscription;
  }

  public function render()
  {
    return view('hive-newsletter::components.user.subscriptions.displaySubscription');
  }
}

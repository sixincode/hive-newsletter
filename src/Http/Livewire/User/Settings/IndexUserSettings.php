<?php

namespace Sixincode\HiveNewsletter\Http\Livewire\User\Settings;

use Livewire\Component;
use Sixincode\HiveNewsletter\Models\NewsletterSubscription;

class IndexUserSettings extends Component
{
  public NewsletterSubscription $subscription;

  public function mount(
    )
  {
    // 
  }

  public function render()
  {
    return view('hive-newsletter::livewire.user.settings.indexUserSettings');
  }
}

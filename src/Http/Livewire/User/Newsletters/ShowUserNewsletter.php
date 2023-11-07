<?php

namespace Sixincode\HiveNewsletter\Http\Livewire\User\Newsletters;

use Livewire\Component;
use Sixincode\HiveNewsletter\Models\Newsletter;

class ShowUserNewsletter extends Component
{
  public Newsletter $newsletter;

  public function mount(
    Newsletter $newsletter;
  )
  {
    $this->newsletter = $newsletter;
  }

  public function render()
  {
    return view('hive-newsletter::livewire.user.newsletters.showUserNewsletter');
  }
}

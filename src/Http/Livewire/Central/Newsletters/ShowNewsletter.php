<?php

namespace Sixincode\HiveNewsletter\Http\Livewire\Central\Newsletters;

use Livewire\Component;
use Sixincode\HiveNewsletter\Models\Newsletter;

class ShowNewsletter extends Component
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
    return view('hive-newsletter::livewire.central.newsletters.showNewsletter');
  }
}

<?php

namespace Sixincode\HiveNewsletter\Http\Livewire\User\Newsletters;

use Livewire\Component;
use Sixincode\HiveNewsletter\Models\Newsletter;

class IndexUserNewsletter extends Component
{
  public $newsletters;

  public function mount()
  {
    $this->newsletter = Newsletter::all();
  }

  public function render()
  {
    return view('hive-newsletter::livewire.user.newsletters.indexUserNewsletter');
  }
}

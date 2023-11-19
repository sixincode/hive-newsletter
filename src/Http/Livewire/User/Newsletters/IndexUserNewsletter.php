<?php

namespace Sixincode\HiveNewsletter\Http\Livewire\User\Newsletters;

use Livewire\Component;
use Sixincode\HiveNewsletter\Models\Newsletter;
use Illuminate\Database\Eloquent\Collection;

class IndexUserNewsletter extends Component
{
  public $newsletters;

  public function mount(Collection $newsletters)
  {
    $this->newsletters = $newsletters;
  }

  public function render()
  {
    return view('hive-newsletter::livewire.user.newsletters.indexUserNewsletter');
  }
}

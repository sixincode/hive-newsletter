<?php

namespace Sixincode\HiveNewsletter\Http\Livewire\Central\Newsletters;

use Livewire\Component;
use Sixincode\HiveNewsletter\Models\Newsletter;

class IndexNewsletter extends Component
{
    public array $newsletters;

    public function mount($newsletters = [])
    {
      $this->newsletters = $newsletters);
    }

    public function render()
    {
      return view('hive-newsletter::livewire.central.newsletters.indexNewsletter');
    }
}

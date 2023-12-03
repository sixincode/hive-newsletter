<?php

namespace Sixincode\HiveNewsletter\Http\Livewire\Central\Newsletters;

use Livewire\Component;
use Sixincode\HiveNewsletter\Models\Newsletter;
use Illuminate\Database\Eloquent\Collection;

class IndexNewsletter extends Component
{
    public $newsletters;

    public function mount(Collection $newsletters)
    {
      $this->newsletters = $newsletters;
    }

    public function render()
    {
      return view('hive-newsletter::livewire.central.newsletters.indexNewsletter');
    }
}

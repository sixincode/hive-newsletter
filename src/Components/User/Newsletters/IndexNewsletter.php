<?php

namespace Sixincode\HiveNewsletter\Components\User\Newsletters;

use Illuminate\View\Component;
use Sixincode\HiveNewsletter\Models\Newsletter;

class IndexNewsletter extends Component
{
  public $newsletters;

  public function __construct(
    $newsletters = []
    )
  {
    $this->newsletters = $newsletters;
  }

  public function render()
  {
    return view('hive-newsletter::components.user.newsletters.indexUserNewsletter');
  }
}
